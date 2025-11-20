/**
 * Chat WebSocket Manager
 * Handles real-time chat functionality using Pusher
 */
class ChatWebSocket {
    constructor(config = {}) {
        this.pusher = null;
        this.conversationChannel = null;
        this.operatorChannel = null;
        this.conversationId = null;
        this.isOperator = config.isOperator || false;
        this.userId = config.userId || null;
        this.pusherConfig = config.pusher || {};
        this.callbacks = {
            onMessageReceived: config.onMessageReceived || (() => {}),
            onConversationStatusChanged: config.onConversationStatusChanged || (() => {}),
            onOperatorAssigned: config.onOperatorAssigned || (() => {}),
            onConnectionError: config.onConnectionError || (() => {}),
        };
        
        this.init();
    }

    init() {
        if (!this.pusherConfig.key) {
            console.warn('Pusher key missing, falling back to HTTP polling');
            return false;
        }

        try {
            // Check if we're using local Soketi or external Pusher
            const isLocalSoketi = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
            
            console.log('WebSocket config:', {
                key: this.pusherConfig.key,
                cluster: this.pusherConfig.cluster,
                isLocalSoketi: isLocalSoketi,
                hostname: window.location.hostname
            });
            
            const pusherOptions = {
                authEndpoint: '/broadcasting/auth',
                auth: {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                        'Accept': 'application/json',
                    }
                }
            };

            if (isLocalSoketi) {
                // Local Soketi configuration
                pusherOptions.wsHost = window.location.hostname;
                pusherOptions.wsPort = 6001;
                pusherOptions.wssPort = 6001;
                pusherOptions.forceTLS = false;
                pusherOptions.encrypted = false;
                pusherOptions.disableStats = true;
                pusherOptions.enabledTransports = ['ws'];
                pusherOptions.cluster = 'mt1';
                pusherOptions.activityTimeout = 30000;
                pusherOptions.pongTimeout = 6000;
                pusherOptions.unavailableTimeout = 10000;
                console.log('Using local Soketi configuration:', pusherOptions);
            } else {
                // External Pusher configuration
                pusherOptions.cluster = this.pusherConfig.cluster;
                pusherOptions.encrypted = true;
                pusherOptions.forceTLS = true;
                console.log('Using external Pusher configuration:', pusherOptions);
            }

            console.log('Creating Pusher instance with key:', this.pusherConfig.key);
            console.log('Pusher options:', JSON.stringify(pusherOptions, null, 2));
            
            this.pusher = new Pusher(this.pusherConfig.key, pusherOptions);

            this.pusher.connection.bind('connected', () => {
                console.log('Connected to Pusher');
            });

            this.pusher.connection.bind('error', (error) => {
                console.error('Pusher connection error:', error);
                this.callbacks.onConnectionError(error);
            });

            this.pusher.connection.bind('connecting', () => {
                console.log('Connecting to WebSocket...');
            });

            this.pusher.connection.bind('disconnected', () => {
                console.log('Disconnected from WebSocket');
            });

            this.pusher.connection.bind('failed', () => {
                console.error('WebSocket connection failed');
            });

            this.pusher.connection.bind('state_change', (states) => {
                console.log(`WebSocket state changed: ${states.previous} → ${states.current}`);
            });

            return true;
        } catch (error) {
            console.error('Failed to initialize Pusher:', error);
            this.callbacks.onConnectionError(error);
            return false;
        }
    }

    subscribeToConversation(conversationId) {
        console.log('🔔 Attempting to subscribe to conversation:', conversationId);
        
        if (!this.pusher) {
            console.error('❌ Cannot subscribe: Pusher not initialized');
            return;
        }
        
        if (this.conversationId === conversationId) {
            console.log('✅ Already subscribed to conversation:', conversationId);
            return;
        }

        // Unsubscribe from previous conversation
        this.unsubscribeFromConversation();

        this.conversationId = conversationId;
        const channelName = `chat.conversation.${conversationId}`;
        console.log('📡 Subscribing to channel:', channelName);

        try {
            this.conversationChannel = this.pusher.subscribe(channelName);

            this.conversationChannel.bind('message.sent', (data) => {
                this.callbacks.onMessageReceived(data.message, data.conversation);
            });

            this.conversationChannel.bind('conversation.status.updated', (data) => {
                this.callbacks.onConversationStatusChanged(data.conversation);
            });

            this.conversationChannel.bind('operator.assigned', (data) => {
                this.callbacks.onOperatorAssigned(data.conversation, data.operator);
            });

            this.conversationChannel.bind('pusher:subscription_succeeded', () => {
                console.log('✅ Successfully subscribed to conversation channel:', channelName);
            });

            this.conversationChannel.bind('pusher:subscription_error', (error) => {
                console.error('❌ Failed to subscribe to conversation channel:', error);
                this.callbacks.onConnectionError(error);
            });

        } catch (error) {
            console.error('Failed to subscribe to conversation:', error);
            this.callbacks.onConnectionError(error);
        }
    }

    subscribeToOperators() {
        console.log('🔔 Attempting to subscribe to operators channel...', {
            hasPusher: !!this.pusher,
            isOperator: this.isOperator,
            hasOperatorChannel: !!this.operatorChannel
        });
        
        if (!this.pusher || !this.isOperator || this.operatorChannel) {
            console.log('❌ Cannot subscribe to operators channel:', {
                pusher: !!this.pusher,
                isOperator: this.isOperator,
                alreadySubscribed: !!this.operatorChannel
            });
            return;
        }

        try {
            console.log('📡 Subscribing to chat.operators channel...');
            this.operatorChannel = this.pusher.subscribe('chat.operators');

            this.operatorChannel.bind('message.sent', (data) => {
                console.log('📡 Received message.sent event on operators channel:', data);
                console.log('🔍 Message details:', {
                    conversation_id: data.conversation.id,
                    client_type: data.conversation.client_type,
                    current_conversation: this.conversationId,
                    will_handle: data.conversation.id !== this.conversationId
                });
                
                // Only handle messages from other conversations for operators
                if (data.conversation.id !== this.conversationId) {
                    this.callbacks.onMessageReceived(data.message, data.conversation);
                }
            });

            this.operatorChannel.bind('conversation.status.updated', (data) => {
                this.callbacks.onConversationStatusChanged(data.conversation);
            });

            this.operatorChannel.bind('pusher:subscription_succeeded', () => {
                console.log('✅ Successfully subscribed to operators channel: chat.operators');
                console.log('🎯 Ready to receive events: message.sent, conversation.status.updated, operator.assigned');
            });

        } catch (error) {
            console.error('Failed to subscribe to operators channel:', error);
            this.callbacks.onConnectionError(error);
        }
    }

    unsubscribeFromConversation() {
        if (this.conversationChannel) {
            this.pusher?.unsubscribe(`chat.conversation.${this.conversationId}`);
            this.conversationChannel = null;
            this.conversationId = null;
        }
    }

    unsubscribeFromOperators() {
        if (this.operatorChannel) {
            this.pusher?.unsubscribe('chat.operators');
            this.operatorChannel = null;
        }
    }

    disconnect() {
        this.unsubscribeFromConversation();
        this.unsubscribeFromOperators();
        
        if (this.pusher) {
            this.pusher.disconnect();
            this.pusher = null;
        }
    }

    isConnected() {
        return this.pusher && this.pusher.connection.state === 'connected';
    }

    getConnectionState() {
        return this.pusher ? this.pusher.connection.state : 'disconnected';
    }
}

// Export for global use
window.ChatWebSocket = ChatWebSocket;
