{{-- Chat Unread Counter Component --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ChatUnreadCounter = {
        webSocket: null,
        isConnected: false,
        updateInterval: null,
        
        init() {
            // Only initialize WebSocket and periodic updates for real-time updates
            // Menu counter is now handled server-side for better performance
            this.initializeWebSocket();
            this.startPeriodicUpdate();
        },
        
        async initializeWebSocket() {
            try {
                // Initialize WebSocket if available
                if (typeof ChatWebSocket !== 'undefined') {
                    this.webSocket = new ChatWebSocket({
                        pusher: {
                            key: '{{ config("broadcasting.connections.pusher.key") }}',
                            cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}'
                        },
                        isOperator: true,
                        userId: {{ auth()->id() ?? 'null' }},
                        onMessageReceived: () => this.updateCount(),
                        onConversationStatusChanged: () => this.updateCount(),
                        onConnectionError: () => this.handleConnectionError()
                    });
                    
                    if (this.webSocket.isConnected()) {
                        this.webSocket.subscribeToOperators();
                        this.isConnected = true;
                        console.log('Chat counter WebSocket connected');
                    }
                }
            } catch (error) {
                console.warn('Chat counter WebSocket failed, using polling:', error);
                this.isConnected = false;
            }
        },
        
        startPeriodicUpdate() {
            // Update every 30 seconds as fallback
            this.updateInterval = setInterval(() => {
                if (!this.isConnected) {
                    this.updateCount();
                }
            }, 30000);
        },
        
        async updateCount() {
            try {
                const response = await fetch('/api/admin/chat/unread-count', {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Failed to fetch unread count');
                }
                
                const result = await response.json();
                
                if (result.success) {
                    const count = result.data.total_notifications;
                    this.updatePageTitle(count);
                    
                    // Trigger page refresh if count changed significantly (optional)
                    if (count > 0 && !this.lastKnownCount) {
                        this.lastKnownCount = count;
                        // Could trigger a soft refresh of menu here if needed
                    }
                }
                
            } catch (error) {
                console.error('Failed to update chat unread count:', error);
            }
        },
        
        updatePageTitle(count) {
            const originalTitle = document.title.replace(/^\(\d+\)\s*/, '');
            if (count > 0) {
                document.title = `(${count}) ${originalTitle}`;
            } else {
                document.title = originalTitle;
            }
        },
        
        handleConnectionError() {
            this.isConnected = false;
            console.warn('Chat counter WebSocket disconnected');
        }
    };
    
    // Initialize only if user has chat operator permissions
    @can('operate.chat')
        ChatUnreadCounter.init();
    @endcan
});
</script>
