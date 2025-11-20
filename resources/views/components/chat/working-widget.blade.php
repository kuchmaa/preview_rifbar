{{--
    TODO: Исправить ошибку в js при нажатии кнопок персонал и бизнес также после прехода на другие страници востанавливать сессию
--}}

{{-- Working Scalable Chat Widget --}}
<div id="scalable-chat-widget">
    {{-- Chat Toggle Button --}}
    <button id="chat-toggle-btn">
        <i class="fas fa-comments" style="width: 20px; height: 20px;"></i>
        <span>Online chat</span>
        <div id="notification-badge">
            <span id="notification-count">0</span>
        </div>
    </button>

    {{-- Chat Window --}}
    <div id="chat-window">
        {{-- Header --}}
        <div id="chat-window-header">
            <div>
                <i class="fas fa-comments" style="width: 24px; height: 24px;"></i>
                <div>
                    <div id="type-badge-wrapper"><h3>Online Chat </h3> <span id="client-type-badge" style="
                            padding: 4px 8px;
                            border-radius: 12px;
                            font-size: 12px;
                            font-weight: 500;
                        "></span></div>
                    <span id="connection-status">Connecting...</span>
                </div>
            </div>
            <button id="close-btn">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Content Container --}}
        <div id="chat-window-content">
            {{-- Welcome Screen --}}
            <div id="welcome-screen">
                <div id="welcome-header">
                    <div>
                        <i class="fas fa-comments"></i>
                    </div>
                    <h2>Welcome to Support!</h2>
                    <p>Choose your client type to start conversation</p>
                </div>

                {{-- Client Type Selection --}}
                <div id="chat-client-type">
                    <label>
                        Select client type:
                    </label>
                    <div>
                        <button class="client-type-btn" data-type="personal">
                            <div>
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4>Personal</h4>
                                <p >Individual shipments and services</p>
                            </div>
                        </button>

                        <button class="client-type-btn" data-type="business">
                            <div>
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <h4>Business</h4>
                                <p>Corporate solutions and bulk shipments</p>
                            </div>
                        </button>
                    </div>
                </div>




                {{-- History Link --}}
                <div id="history-link">
                    <button id="show-history-btn">
                        <i class="fas fa-history"></i>
                        Chat History
                    </button>
                </div>
            </div>

            {{-- Chat Screen --}}
            <div id="chat-screen">
                {{-- Chat Info Bar --}}
                <div id="chat-info-bar">
                    <div style="display: flex; gap: 8px;">
                        <span id="order-badge"></span>
                    </div>
                    <div id="info-bar-buttons">
                        <button id="back-to-welcome">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </button>
                        <button id="show-order-section-btn">
                            <i class="fas fa-link"></i>
                            Link Order
                        </button>
                    </div>
                </div>

                {{-- Order Selection in Chat --}}
                <div id="chat-order-section">
                    <div id="chat-order-section-header" >
                        <div>
                            <i class="fas fa-link"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #111827;">
                                Link Order (Optional)
                            </h4>
                            <p style="margin: 0; font-size: 12px; color: #6B7280;">
                                Help us provide better assistance
                            </p>
                        </div>
                    </div>

                    <div id="chat-order-authenticated">
                        <select id="chat-order-select">
                            <option value="">No order selected</option>
                        </select>
                    </div>

                    <div id="chat-login-prompt">
                        <div>
                            <p>
                                Login to link your orders for personalized support
                            </p>
                            <button id="chat-login-btn" >
                                <i class="fas fa-sign-in-alt" style="margin-right: 4px;"></i>
                                Login
                            </button>
                        </div>
                    </div>

                    <button id="dismiss-order-section" title="Dismiss">
                        <i class="fas fa-times"></i>
                    </button>
                </div>



                {{-- Messages Container --}}
                <div id="messages-container">
                    {{-- Linked Order Notification --}}
                    <div id="linked-order-notification">
                        <div id="linked-order-notification-h">
                            <div>
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <h4>
                                    Order Linked Successfully
                                </h4>
                                <p >
                                    Your order has been automatically linked to this chat
                                </p>
                            </div>
                        </div>

                        <div id="linked-order-details">
                            <!-- Order details will be populated here -->
                        </div>
                    </div>
                    {{-- Messages will be added here --}}
                </div>

                {{-- Input Area --}}
                <div id="input-area">
                    <div id="input-area-h" >
                        <textarea id="message-input" placeholder="Type your message..." rows="1" maxlength="1000"></textarea>
                        <button id="chat-send-btn" disabled>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div id="input-area-f">
                        <span id="input-char-count">0/1000</span>
                        <div>
                            <div id="connection-dot"></div>
                            <span id="connection-text">Онлайн</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- History Screen --}}
            <div id="history-screen">
                <div style="padding: 20px; border-bottom: 1px solid #E5E7EB; display: flex; align-items: center; gap: 12px;">
                    <button id="back-from-history">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </button>
                    <h3 style="margin: 0; font-size: 18px; font-weight: 600; color: #111827;">Chat History</h3>
                </div>

                <div id="history-list">
                    <div class="loading-spinner">
                        <div></div>
                        <span>Завантаження...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Error Toast --}}
    <div id="error-toast">
        <div style="">
            <i class="fas fa-exclamation-triangle" style="width: 20px; height: 20px; color: #EF4444;"></i>
            <span id="error-message"></span>
        </div>
        <button id="close-toast">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

{{-- Load Font Awesome --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Load Pusher and WebSocket --}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@vite('resources/js/chat-websocket.js')

{{-- CSS Animations --}}
<style>

</style>

{{-- JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Working Chat Widget Loaded');

    // Chat state
    const ChatState = {
        currentScreen: 'welcome',
        conversationId: null,
        visitorId: null,
        clientType: null,
        selectedOrder: null,
        isConnected: false,
        chatWebSocket: null,
        messagePolling: null,
        orders: null,

        init() {
            this.generateVisitorId();
            this.initializeWebSocket();
        },

        generateVisitorId() {
            if (!document.querySelector('meta[name="user-id"]')) {
                this.visitorId = 'visitor_' + Math.random().toString(36).substr(2, 20);
            }
        },

        initializeWebSocket() {
            try {
                // Check if Pusher is available
                if (typeof Pusher === 'undefined') {
                    console.warn('Pusher library not loaded, using polling mode');
                    throw new Error('Pusher not available');
                }

                // Check if we have valid Pusher config
                const pusherKey = '{{ config("broadcasting.connections.pusher.key") }}';
                if (!pusherKey) {
                    console.warn('Pusher key missing, using polling mode');
                    throw new Error('Pusher not configured');
                }

                console.log('🔧 Pusher config:', {
                    key: pusherKey,
                    cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}',
                    host: '{{ config("broadcasting.connections.pusher.options.host") }}',
                    port: '{{ config("broadcasting.connections.pusher.options.port") }}',
                    scheme: '{{ config("broadcasting.connections.pusher.options.scheme") }}'
                });

                // Initialize WebSocket connection
                this.chatWebSocket = new ChatWebSocket({
                    pusher: {
                        key: pusherKey,
                        cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}',
                        wsHost: '{{ config("broadcasting.connections.pusher.options.host") }}',
                        wsPort: {{ config("broadcasting.connections.pusher.options.port") }},
                        wssPort: {{ config("broadcasting.connections.pusher.options.port") }},
                        forceTLS: {{ config("broadcasting.connections.pusher.options.useTLS") ? 'true' : 'false' }},
                        encrypted: {{ config("broadcasting.connections.pusher.options.encrypted") ? 'true' : 'false' }},
                        enabledTransports: ['ws', 'wss']
                    },
                    isOperator: false,
                    userId: document.querySelector('meta[name="user-id"]')?.getAttribute('content'),
                    onMessageReceived: (message, conversation) => this.handleIncomingMessage(message, conversation),
                    onConversationStatusChanged: (conversation) => this.handleConversationStatusChange(conversation),
                    onOperatorAssigned: (conversation, operator) => this.handleOperatorAssigned(conversation, operator),
                    onConnectionError: (error) => this.handleWebSocketError(error)
                });

                this.isConnected = true;
                updateConnectionStatus(true);

                // Stop polling if WebSocket is working
                this.stopMessagePolling();

                console.log('✅ Chat WebSocket initialized successfully');
            } catch (error) {
                console.warn('WebSocket initialization failed, using polling:', error.message);
                this.isConnected = false;
                // Don't show offline immediately - polling might work
                updateConnectionStatus(true, 'Polling mode');
            }
        },

        handleIncomingMessage(message, conversation) {
            console.log('📨 Incoming WebSocket message:', message);

            // Check if message already exists to prevent duplicates
            const existingMessage = elements.messagesContainer.querySelector(`[data-message-id="${message.id}"]`);
            if (existingMessage) {
                console.log('🚫 Duplicate WebSocket message prevented:', message.id);
                return;
            }

            // Determine message type and sender
            let senderName = 'Unknown';
            let messageType = 'operator';

            const currentUserId = getCurrentUserId();

            if (message.is_system) {
                senderName = 'System';
                messageType = 'system';
            } else if (message.sender_type === 'visitor') {
                senderName = 'You';
                messageType = 'user';
            } else if (message.sender_type === 'client') {
                // Message from authenticated client
                if (currentUserId && message.sender_id && message.sender_id.toString() === currentUserId.toString()) {
                    // This is our own message as a client
                    const tempMessage = elements.messagesContainer.querySelector(`[data-message-id^="temp_"]`);
                    if (tempMessage && tempMessage.textContent.includes(message.message)) {
                        // Update temp message with real ID
                        tempMessage.setAttribute('data-message-id', message.id);
                        console.log('🔄 Updated temp message with real ID:', message.id);
                        return;
                    }
                    senderName = 'You';
                    messageType = 'user';
                } else {
                    // Message from another client
                    senderName = message.sender_name || 'Client';
                    messageType = 'user';
                }
            } else if (message.sender_type === 'App\\Models\\User') {
                if (currentUserId && message.sender_id && message.sender_id.toString() === currentUserId.toString()) {
                    // Check if this is our own message sent as a client (not as operator)
                    // If conversation has no operator assigned or we're not the operator, this is our client message
                    if (!conversation.operator_id || conversation.operator_id.toString() !== currentUserId.toString()) {
                        // This is our own message as a client - check if we already have it with temp ID
                        const tempMessage = elements.messagesContainer.querySelector(`[data-message-id^="temp_"]`);
                        if (tempMessage && tempMessage.textContent.includes(message.message)) {
                            // Update temp message with real ID
                            tempMessage.setAttribute('data-message-id', message.id);
                            console.log('🔄 Updated temp message with real ID:', message.id);
                            return;
                        }
                        senderName = 'You';
                        messageType = 'user';
                    } else {
                        // This is our own message as an operator
                        senderName = 'You (Operator)';
                        messageType = 'operator';
                    }
                } else {
                    senderName = message.sender_name || 'Operator';
                    messageType = 'operator';
                }
            }

            console.log('✅ Adding WebSocket message:', {
                id: message.id,
                sender: senderName,
                type: messageType,
                senderType: message.sender_type,
                senderId: message.sender_id,
                currentUserId
            });

            addMessage(message.message, messageType, senderName, message.id);

            // Show notification if chat is closed and it's not our own message
            if (messageType !== 'user' && (elements.chatWindow.style.display === 'none' || elements.chatWindow.style.display === '')) {
                showNotification();
            }
        },

        handleConversationStatusChange(conversation) {
            console.log('🔄 Conversation status changed:', conversation);

            if (conversation.status === 'closed') {
                addMessage('Conversation was closed by operator', 'system', 'System');
                elements.messageInput.disabled = true;
                elements.sendBtn.disabled = true;
            }
            // Don't add "Operator joined" message here - it's handled by handleOperatorAssigned
        },

        handleOperatorAssigned(conversation, operator) {
            console.log('👤 Operator assigned:', operator);
            // Don't add system message here - it's already sent via ChatMessageSent event from server
        },

        handleWebSocketError(error) {
            console.warn('WebSocket error:', error);
            this.isConnected = false;
            updateConnectionStatus(false);

            // Start polling as fallback ONLY if WebSocket completely fails
            if (this.conversationId && !this.messagePolling) {
                console.log('🔄 Starting polling fallback due to WebSocket error');
                this.startMessagePolling();
            }
        },

        startMessagePolling() {
            if (this.messagePolling || this.isConnected) {
                console.log('🚫 Polling not started - already running or WebSocket connected');
                return;
            }

            console.log('🔄 Starting message polling as fallback');
            this.messagePolling = setInterval(() => {
                if (this.conversationId && !this.isConnected) {
                    loadNewMessages();
                }
            }, 3000);
        },

        stopMessagePolling() {
            if (this.messagePolling) {
                clearInterval(this.messagePolling);
                this.messagePolling = null;
            }
        }
    };


    // Elements
    const elements = {
        toggleBtn: document.getElementById('chat-toggle-btn'),
        chatWindow: document.getElementById('chat-window'),
        closeBtn: document.getElementById('close-btn'),
        welcomeScreen: document.getElementById('welcome-screen'),
        chatScreen: document.getElementById('chat-screen'),
        historyScreen: document.getElementById('history-screen'),
        clientTypeBtns: document.querySelectorAll('.client-type-btn'),
        chatOrderSection: document.getElementById('chat-order-section'),
        chatOrderAuthenticated: document.getElementById('chat-order-authenticated'),
        chatOrderSelect: document.getElementById('chat-order-select'),
        chatLoginPrompt: document.getElementById('chat-login-prompt'),
        chatLoginBtn: document.getElementById('chat-login-btn'),
        dismissOrderSection: document.getElementById('dismiss-order-section'),
        showOrderSectionBtn: document.getElementById('show-order-section-btn'),
        showHistoryBtn: document.getElementById('show-history-btn'),
        backToWelcome: document.getElementById('back-to-welcome'),
        backFromHistory: document.getElementById('back-from-history'),
        messagesContainer: document.getElementById('messages-container'),
        messageInput: document.getElementById('message-input'),
        sendBtn: document.getElementById('chat-send-btn'),
        inputCharCount: document.getElementById('input-char-count'),
        errorToast: document.getElementById('error-toast'),
        errorMessage: document.getElementById('error-message'),
        closeToast: document.getElementById('close-toast'),
        connectionStatus: document.getElementById('connection-status'),
        chatInfoBar: document.getElementById('chat-info-bar'),
        clientTypeBadge: document.getElementById('client-type-badge'),
        orderBadge: document.getElementById('order-badge')
    };

    elements.messageInput

    // Event listeners
    elements.toggleBtn.addEventListener('click', toggleChat);
    elements.closeBtn.addEventListener('click', closeChat);
    elements.clientTypeBtns.forEach(btn => {
        btn.addEventListener('click', () => selectClientType(btn.dataset.type));
    });
    elements.chatOrderSelect.addEventListener('change', handleChatOrderChange);
    elements.dismissOrderSection.addEventListener('click', dismissOrderSection);
    elements.showOrderSectionBtn.addEventListener('click', showOrderSelection);
    elements.showHistoryBtn.addEventListener('click', () => switchScreen('history'));
    elements.backToWelcome.addEventListener('click', () => switchScreen('welcome'));
    elements.backFromHistory.addEventListener('click', () => switchScreen('welcome'));
    elements.messageInput.addEventListener('input', handleChatInput);
    elements.messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });
    elements.sendBtn.addEventListener('click', sendMessage);
    elements.closeToast.addEventListener('click', hideErrorToast);

    // Chat login button handler
    if (elements.chatLoginBtn) {
        elements.chatLoginBtn.addEventListener('click', () => {
            window.location.href = '/login';
        });
    }

    // Functions
    function toggleChat() {
        if (elements.chatWindow.style.display === 'none' || elements.chatWindow.style.display === '') {
            elements.chatWindow.style.display = 'flex';
            elements.connectionStatus.textContent = 'Online';
            const os = getOS();

            if (os === "Windows") {
                document.body.style.overflow = 'hidden';
                document.body.style.paddingRight = "15px";
            }
        } else {
            closeChat();
        }
    }

    function closeChat() {
        elements.chatWindow.style.display = 'none';

        const os = getOS();

        if (os === "Windows") {
            document.body.style.overflow = 'auto';
            document.body.style.paddingRight = "0px";
        }
    }

    function getOS() {
        const ua = navigator.userAgent.toLowerCase();

        if (/android/.test(ua)) return "Android";
        if (/iphone|ipad|ipod/.test(ua)) return "iOS";
        if (/win/.test(ua)) return "Windows";
        if (/mac/.test(ua)) return "MacOS";
        if (/linux/.test(ua)) return "Linux";

        return "Unknown";
    }

    function switchScreen(screen) {
        elements.welcomeScreen.style.display = 'none';
        elements.chatScreen.style.display = 'none';
        elements.historyScreen.style.display = 'none';

        ChatState.currentScreen = screen;
        switch (screen) {
            case 'welcome':
                elements.welcomeScreen.style.display = 'flex';
                break;
            case 'chat':
                elements.chatScreen.style.display = 'flex';
                elements.messageInput.focus();
                break;
            case 'history':
                elements.historyScreen.style.display = 'flex';
                loadHistory();
                break;
        }
    }

    function selectClientType(type) {
        ChatState.clientType = type;

        // Start chat immediately with a default message
        const defaultMessage = `Hello! I need help with ${type === 'personal' ? 'personal' : 'business'} services.`;

        startConversationWithMessage(defaultMessage);
    }


    async function startConversationWithMessage(message) {
        console.warn(message);

        try {
            const data = {
                message: message,
                client_type: ChatState.clientType,
                visitor_id: ChatState.visitorId
            };

            const response = await fetch('/api/chat/scalable/conversation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();


            if (result.success) {
                ChatState.conversationId = result.data.conversation_id;
                ChatState.visitorId = result.data.visitor_id || ChatState.visitorId;

                // Store linked order information if available
                if (result.data.linked_order) {
                    ChatState.linkedOrder = result.data.linked_order;
                    console.log('🔗 Order automatically linked:', ChatState.linkedOrder);
                }

                // Subscribe to WebSocket channel for this conversation
                if (ChatState.chatWebSocket) {
                    ChatState.chatWebSocket.subscribeToConversation(ChatState.conversationId);
                } else {
                    // Start polling as fallback
                    ChatState.startMessagePolling();
                }

                updateChatInfo();
                switchScreen('chat');
                addMessage(result.data.message.message, 'user', "You", result.data.message.id)

                // Don't add the message here - it will come via WebSocket
                // addMessage(message, 'user', 'You');

                // // Show order selection if user is authenticated and show linked order
                // if (document.querySelector('meta[name="user-id"]') && ChatState.linkedOrder) {
                //     showOrderSelection();
                // }

                showSuccessMessage('Chat started successfully!');
            } else {
                showErrorToast(result.message || 'Failed to start chat');
            }

        } catch (error) {
            console.error('Failed to start conversation:', error);
            showErrorToast('Connection error');
        }
    }

    function showOrderSelection() {
        elements.chatOrderSection.style.display = 'block';
        elements.showOrderSectionBtn.style.display = 'none'; // Hide the button after showing section

        if (document.querySelector('meta[name="user-id"]')) {
            elements.chatOrderAuthenticated.style.display = 'block';
            elements.chatLoginPrompt.style.display = 'none';
            loadChatOrderOptions(ChatState.clientType);
        } else {
            elements.chatOrderAuthenticated.style.display = 'none';
            elements.chatLoginPrompt.style.display = 'block';
        }
    }

    async function loadChatOrderOptions(clientType) {
        try {
            const response = await fetch(`/api/chat/scalable/orders?client_type=${clientType}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success && data.data.orders) {
                elements.chatOrderSelect.innerHTML = '<option value="">No order selected</option>';
                ChatState.orders = data.data.orders;
                ChatState.orders.forEach(order => {
                    const option = document.createElement('option');
                    option.value = order.id;
                    option.textContent = order.display_text;
                    elements.chatOrderSelect.appendChild(option);
                });

                // // Auto-select linked order if available
                // if (ChatState.linkedOrder) {
                //     const linkedOrderId = ChatState.linkedOrder.id || ChatState.linkedOrder.order_id || ChatState.linkedOrder.business_order_id;
                //     if (linkedOrderId) {
                //         elements.chatOrderSelect.value = linkedOrderId;
                //         ChatState.selectedOrder = linkedOrderId;
                //         console.log('🎯 Auto-selected linked order:', linkedOrderId);

                //         // Update the option text to show it's linked
                //         const selectedOption = elements.chatOrderSelect.querySelector(`option[value="${linkedOrderId}"]`);
                //         if (selectedOption) {
                //             selectedOption.textContent = selectedOption.textContent + ' (Linked)';
                //             selectedOption.style.fontWeight = 'bold';
                //             selectedOption.style.color = '#4A90E2';
                //         }

                //         // Show beautiful linked order notification
                //         showLinkedOrderNotification(ChatState.linkedOrder);
                //     }
                // }
            }
        } catch (error) {
            console.error('Failed to load orders:', error);
        }
    }

    function handleChatOrderChange() {
        ChatState.selectedOrder = elements.chatOrderSelect.value;

        if (ChatState.selectedOrder) {
            // Send system message about order linking
            addMessage(`Order #${ChatState.selectedOrder} has been linked to this conversation`, 'system', 'System');
            showLinkedOrderNotification(ChatState.linkedOrder);
            dismissOrderSection();
        }
    }

    function showLinkedOrderNotification(linkedOrder) {
        const notification = document.getElementById('linked-order-notification');
        const detailsContainer = document.getElementById('linked-order-details');

        if (!notification || !detailsContainer || !linkedOrder) return;

        // Create order details HTML
        const orderDetails = `
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-box" style="color: #4A90E2; font-size: 14px;"></i>
                    <span style="font-weight: 600; color: #1E40AF;">${linkedOrder.display_text}</span>
                </div>
                <span style="
                    background: ${getStatusColor(linkedOrder.status)};
                    color: white;
                    padding: 4px 8px;
                    border-radius: 12px;
                    font-size: 11px;
                    font-weight: 500;
                    text-transform: uppercase;
                ">${linkedOrder.status}</span>
            </div>
            ${linkedOrder.track_number ? `
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                    <i class="fas fa-shipping-fast" style="color: #64748B; font-size: 12px;"></i>
                    <span style="color: #64748B; font-size: 12px;">Track: ${linkedOrder.track_number}</span>
                </div>
            ` : ''}
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-clock" style="color: #64748B; font-size: 12px;"></i>
                <span style="color: #64748B; font-size: 12px;">Linked automatically based on your recent orders</span>
            </div>
        `;

        detailsContainer.innerHTML = orderDetails;
        notification.style.display = 'block';

        // Add smooth animation
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-10px)';

        setTimeout(() => {
            notification.style.transition = 'all 0.3s ease-out';
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 100);

        console.log('🎨 Linked order notification shown');
    }

    function getStatusColor(status) {
        const colors = {
            'pending': '#F59E0B',
            'confirmed': '#3B82F6',
            'in_progress': '#8B5CF6',
            'delivered': '#10B981',
            'paid': '#059669',
            'cancelled': '#EF4444'
        };
        return colors[status] || '#6B7280';
    }

    function dismissOrderSection() {
        elements.chatOrderSection.style.display = 'none';
        elements.showOrderSectionBtn.style.display = 'flex'; // Show the button again
    }

    function handleMessageInput() {
        const message = elements.initialMessage.value;
        elements.charCount.textContent = `${message.length}/1000`;
        validateForm();
    }

    function handleChatInput() {
        const message = elements.messageInput.value;
        elements.inputCharCount.textContent = `${message.length}/1000`;

        if (message.trim().length > 0) {
            elements.sendBtn.disabled = false;
            elements.sendBtn.style.background = '#4A90E2';
            elements.sendBtn.style.cursor = 'pointer';
        } else {
            elements.sendBtn.disabled = true;
            elements.sendBtn.style.background = '#9CA3AF';
            elements.sendBtn.style.cursor = 'not-allowed';
        }
    }

    function validateForm() {
        const hasClientType = ChatState.clientType !== null;
        const hasMessage = elements.initialMessage.value.trim().length > 0;

        if (hasClientType && hasMessage) {
            elements.startChatBtn.disabled = false;
            elements.startChatBtn.style.background = '#4A90E2';
            elements.startChatBtn.style.cursor = 'pointer';
        } else {
            elements.startChatBtn.disabled = true;
            elements.startChatBtn.style.background = '#9CA3AF';
            elements.startChatBtn.style.cursor = 'not-allowed';
        }
    }


    function updateChatInfo() {
        elements.chatInfoBar.style.display = 'flex';

        elements.clientTypeBadge.textContent = ChatState.clientType === 'business' ? 'Business' : 'Personal';
        elements.clientTypeBadge.style.background = ChatState.clientType === 'business' ?
            'rgba(139, 92, 246, 0.1)' : 'rgba(16, 185, 129, 0.1)';
        elements.clientTypeBadge.style.color = '#012E21';

        if (ChatState.selectedOrder) {
            // console.log(elements.orderSelect);

            const orderText = elements.chatOrderSelect.options[elements.chatOrderSelect.selectedIndex].text;
            console.warn(orderText);

            elements.orderBadge.textContent = orderText;
            elements.orderBadge.style.display = 'inline-block';
        }
    }

    async function sendMessage() {
        const message = elements.messageInput.value.trim();
        if (!message || !ChatState.conversationId) return;

        try {
            // Add message immediately to UI with temporary ID
            const tempId = 'temp_' + Date.now();
            addMessage(message, 'user', 'You', tempId);

            // Clear input immediately for better UX
            elements.messageInput.value = '';
            handleChatInput();

            console.log('📤 Sending message:', { message: message.substring(0, 50), conversationId: ChatState.conversationId });

            const response = await fetch('/api/chat/scalable/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    conversation_id: ChatState.conversationId,
                    message: message,
                    visitor_id: ChatState.visitorId
                })
            });

            const result = await response.json();

            if (result.success && result.data.message) {
                console.log('✅ Message sent successfully, ID:', result.data.message.id);

                // Replace temporary ID with real server ID
                const tempMessage = elements.messagesContainer.querySelector(`[data-message-id="${tempId}"]`);
                if (tempMessage) {
                    tempMessage.setAttribute('data-message-id', result.data.message.id);
                    console.log('🔄 Updated message ID from', tempId, 'to', result.data.message.id);
                }
            } else {
                // Remove failed message and restore input
                const tempMessage = elements.messagesContainer.querySelector(`[data-message-id="${tempId}"]`);
                if (tempMessage) {
                    tempMessage.remove();
                }
                showErrorToast(result.message || 'Failed to send message');
                elements.messageInput.value = message;
            }

        } catch (error) {
            console.error('Failed to send message:', error);

            // Remove failed message and restore input
            const tempMessage = elements.messagesContainer.querySelector(`[data-message-id="${tempId}"]`);
            if (tempMessage) {
                tempMessage.remove();
            }
            showErrorToast('Connection error');
            elements.messageInput.value = message;
        }
    }

    function addMessage(text, type, sender, messageId = null) {
        // Check for duplicates if messageId is provided
        if (messageId) {
            const existingMessage = elements.messagesContainer.querySelector(`[data-message-id="${messageId}"]`);
            if (existingMessage) {
                console.log('🚫 Duplicate message prevented:', messageId);
                return; // Don't add duplicate
            }
        }

        const messageDiv = document.createElement('div');
        messageDiv.style.cssText = `
            margin-bottom: 16px;
            display: flex;
            gap: 12px;
            ${type === 'user' ? 'flex-direction: row-reverse;' : ''}
        `;

        // Add message ID for duplicate prevention
        if (messageId) {
            messageDiv.setAttribute('data-message-id', messageId);
        }

        const avatarDiv = document.createElement('div');
        avatarDiv.style.cssText = `
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 12px;
            font-weight: 600;
            color: white;
            background: ${type === 'user' ? '#10B981' : type === 'system' ? '#F59E0B' : '#7B68EE'};
        `;
        avatarDiv.textContent = sender.charAt(0).toUpperCase();

        const bubbleDiv = document.createElement('div');
        bubbleDiv.style.cssText = `
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 16px;
            background: ${type === 'user' ? '#4A90E2' : type === 'system' ? '#FEF3C7' : 'white'};
            color: ${type === 'user' ? 'white' : type === 'system' ? '#92400E' : '#111827'};
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        `;

        const senderSpan = document.createElement('div');
        senderSpan.style.cssText = 'font-size: 11px; font-weight: 600; margin-bottom: 4px; opacity: 0.8;';
        senderSpan.textContent = sender;

        const textP = document.createElement('div');
        textP.style.cssText = 'font-size: 14px; line-height: 1.4; margin: 0; word-wrap: break-word;';
        textP.textContent = text;

        const timeSpan = document.createElement('div');
        timeSpan.style.cssText = 'font-size: 10px; opacity: 0.6; margin-top: 4px;';
        timeSpan.textContent = new Date().toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit'
        });

        bubbleDiv.appendChild(senderSpan);
        bubbleDiv.appendChild(textP);
        bubbleDiv.appendChild(timeSpan);

        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(bubbleDiv);

        elements.messagesContainer.appendChild(messageDiv);
        elements.messagesContainer.scrollTop = elements.messagesContainer.scrollHeight;

        console.log('✅ Message added:', { text: text.substring(0, 50), type, sender, messageId });
    }

    function addMessageWithId(text, type, sender, messageId) {
        addMessage(text, type, sender, messageId);
    }

    async function loadHistory() {
        try {
            const response = await fetch('/api/chat/scalable/history', {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success && data.data.conversations) {
                renderHistory(data.data.conversations);
            } else {
                elements.historyList.innerHTML = '<div style="text-align: center; padding: 40px; color: #6B7280;">Chat history is empty</div>';
            }

        } catch (error) {
            console.error('Failed to load history:', error);
            showErrorToast('Помилка завантаження історії');
        }
    }

    function renderHistory(conversations) {
        if (conversations.length === 0) {
            elements.historyList.innerHTML = '<div style="text-align: center; padding: 40px; color: #6B7280;">Chat history is empty</div>';
            return;
        }

        elements.historyList.innerHTML = '';

        conversations.forEach(conversation => {
            const item = document.createElement('div');
            item.style.cssText = `
                padding: 16px;
                background: white;
                border: 1px solid #E5E7EB;
                border-radius: 8px;
                margin-bottom: 12px;
                cursor: pointer;
                transition: all 0.2s;
            `;

            const clientTypeText = conversation.client_type === 'business' ? 'Business' : 'Personal';
            const statusText = {
                waiting: 'Waiting',
                active: 'Active',
                closed: 'Closed'
            }[conversation.status] || conversation.status;

            item.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span style="
                        font-size: 12px;
                        font-weight: 600;
                        padding: 4px 8px;
                        border-radius: 12px;
                        background: ${conversation.client_type === 'business' ? 'rgba(139, 92, 246, 0.1)' : 'rgba(16, 185, 129, 0.1)'};
                        color: ${conversation.client_type === 'business' ? '#7B68EE' : '#10B981'};
                    ">${clientTypeText}</span>
                    <span style="font-size: 12px; color: #6B7280;">${new Date(conversation.created_at).toLocaleDateString('uk-UA')}</span>
                </div>
                <div style="font-size: 14px; color: #374151; line-height: 1.4; margin-bottom: 8px;">${conversation.first_message}</div>
                <span style="
                    display: inline-block;
                    font-size: 11px;
                    font-weight: 600;
                    padding: 2px 6px;
                    border-radius: 8px;
                    background: ${conversation.status === 'waiting' ? 'rgba(245, 158, 11, 0.1)' :
                                conversation.status === 'active' ? 'rgba(16, 185, 129, 0.1)' : 'rgba(107, 114, 128, 0.1)'};
                    color: ${conversation.status === 'waiting' ? '#F59E0B' :
                            conversation.status === 'active' ? '#10B981' : '#6B7280'};
                ">${statusText}</span>
            `;

            item.addEventListener('mouseenter', () => {
                item.style.borderColor = '#4A90E2';
                item.style.boxShadow = '0 2px 8px rgba(74, 144, 226, 0.1)';
            });

            item.addEventListener('mouseleave', () => {
                item.style.borderColor = '#E5E7EB';
                item.style.boxShadow = 'none';
            });

            item.addEventListener('click', () => openHistoryConversation(conversation));
            elements.historyList.appendChild(item);
        });
    }

    function openHistoryConversation(conversation) {
        ChatState.conversationId = conversation.id;
        ChatState.clientType = conversation.client_type;

        // Subscribe to WebSocket channel for this conversation
        if (ChatState.chatWebSocket) {
            ChatState.chatWebSocket.subscribeToConversation(ChatState.conversationId);
        } else {
            // Start polling as fallback
            ChatState.startMessagePolling();
        }

        elements.messagesContainer.innerHTML = '';
        loadConversationMessages(conversation.id);
        updateChatInfo();
        switchScreen('chat');
    }

    async function loadConversationMessages(conversationId) {
        try {
            const response = await fetch(`/api/chat/scalable/messages?conversation_id=${conversationId}&visitor_id=${ChatState.visitorId}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success && data.data.messages) {
                data.data.messages.forEach(message => {
                    let sender = 'System';
                    let type = 'system';

                    if (message.sender_type === 'visitor' ||
                        (message.sender_type === 'App\\Models\\User' && message.sender_id === getCurrentUserId())) {
                        sender = 'You';
                        type = 'user';
                    } else if (message.sender_type === 'App\\Models\\User') {
                        sender = message.sender_name || 'Operator';
                        type = 'operator';
                    }

                    addMessage(message.message, type, sender, message.id);
                });
            }
        } catch (error) {
            console.error('Failed to load conversation messages:', error);
            showErrorToast('Помилка завантаження повідомлень');
        }
    }

    function getCurrentUserId() {
        return document.querySelector('meta[name="user-id"]')?.getAttribute('content') || null;
    }

    function showErrorToast(message) {
        elements.errorMessage.textContent = message;
        elements.errorToast.style.display = 'flex';

        setTimeout(() => {
            hideErrorToast();
        }, 5000);
    }

    function hideErrorToast() {
        elements.errorToast.style.display = 'none';
    }

    function showSuccessMessage(message) {
        console.log('✅', message);
    }

    function updateConnectionStatus(connected, customText = null) {
        const statusText = customText || (connected ? 'Online' : 'Offline');
        elements.connectionStatus.textContent = statusText;

        const connectionDot = document.getElementById('connection-dot');
        const connectionText = document.getElementById('connection-text');

        if (connectionDot) {
            // Show green for connected or polling mode, red only for completely offline
            connectionDot.style.background = connected ? '#10B981' : '#EF4444';
        }

        if (connectionText) {
            connectionText.textContent = statusText;
        }
    }

    function showNotification(count = 1) {
        const badge = document.getElementById('notification-badge');
        const countEl = document.getElementById('notification-count');

        if (badge && countEl) {
            countEl.textContent = count;
            badge.style.display = 'flex';
        }
    }

    function hideNotification() {
        const badge = document.getElementById('notification-badge');
        if (badge) {
            badge.style.display = 'none';
        }
    }

    async function loadNewMessages() {
        if (!ChatState.conversationId || ChatState.isConnected) return; // Don't poll if WebSocket is working

        try {
            // Get the last message ID to avoid duplicates
            const lastMessage = elements.messagesContainer.querySelector('[data-message-id]:last-child');
            const afterId = lastMessage ? lastMessage.dataset.messageId : 0;

            const params = new URLSearchParams({
                conversation_id: ChatState.conversationId,
                after: afterId
            });

            if (ChatState.visitorId) {
                params.append('visitor_id', ChatState.visitorId);
            }

            const response = await fetch(`/api/chat/scalable/messages?${params}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success && data.data.messages) {
                data.data.messages.forEach(message => {
                    // Check if message already exists
                    const existingMessage = elements.messagesContainer.querySelector(`[data-message-id="${message.id}"]`);
                    if (existingMessage) {
                        return; // Skip duplicate
                    }

                    // Don't show our own messages
                    if (message.sender_type === 'visitor' ||
                        (message.sender_type === 'App\\Models\\User' && message.sender_id === getCurrentUserId())) {
                        return;
                    }

                    let sender = 'Operator';
                    let type = 'operator';

                    if (message.is_system) {
                        sender = 'System';
                        type = 'system';
                    } else if (message.sender_name) {
                        sender = message.sender_name;
                    }

                    addMessageWithId(message.message, type, sender, message.id);
                });
            }
        } catch (error) {
            console.error('Failed to load new messages:', error);
        }
    }

    // Initialize
    ChatState.init();

    // Hide notification when chat is opened
    elements.toggleBtn.addEventListener('click', hideNotification);

    console.log('✅ Chat widget initialized successfully');

    // Cleanup on page unload
    window.addEventListener('beforeunload', function() {
        if (ChatState.messagePolling) {
            clearInterval(ChatState.messagePolling);
        }
        if (ChatState.chatWebSocket) {
            ChatState.chatWebSocket.disconnect();
        }
    });
});
</script>
