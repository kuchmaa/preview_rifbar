{{-- Simple Chat Widget --}}
<div id="chat-widget">
    {{-- Chat Button --}}
    <button id="chat-button" style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 24px;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    ">💬</button>

    {{-- Chat Window --}}
    <div id="chat-window" style="
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 350px;
        height: 450px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        display: none;
        flex-direction: column;
        z-index: 1001;
    ">
        {{-- Header --}}
        <div style="
            background: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        ">
            <span style="font-weight: bold;">Chat Support</span>
            <button id="chat-close" style="
                background: none;
                border: none;
                color: white;
                font-size: 20px;
                cursor: pointer;
            ">×</button>
        </div>

        {{-- Close Confirmation Modal --}}
        <div id="close-confirmation" style="
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            z-index: 9999;
        ">
            <div style="
                background: white;
                padding: 20px;
                border-radius: 8px;
                max-width: 300px;
                text-align: center;
                color: black;
            ">
                <h4 style="margin: 0 0 15px 0; color: #dc3545;">Close Chat?</h4>
                <p id="close-warning-text" style="margin: 0 0 20px 0; font-size: 14px; line-height: 1.4;">
                    <!-- Dynamic text will be inserted here -->
                </p>
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <button id="confirm-close" style="
                        background: #dc3545;
                        color: white;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 4px;
                        cursor: pointer;
                    ">Close Chat</button>
                    <button id="cancel-close" style="
                        background: #6c757d;
                        color: white;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 4px;
                        cursor: pointer;
                    ">Cancel</button>
                </div>
            </div>
        </div>

        {{-- FAQ Section --}}
        <div id="faq-section" style="
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: block;
        ">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                <p style="margin: 0; font-size: 14px;">Quick questions:</p>
                <button id="show-all-faq-btn" style="
                    background: #007bff;
                    color: white;
                    border: none;
                    padding: 4px 8px;
                    border-radius: 3px;
                    cursor: pointer;
                    font-size: 11px;
                ">All FAQ</button>
            </div>
            <div id="faq-list"></div>
        </div>

        {{-- FAQ Modal --}}
        <div id="faq-modal" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
        ">
            <div style="
                background: white;
                border-radius: 8px;
                width: 90%;
                max-width: 500px;
                max-height: 80%;
                display: flex;
                flex-direction: column;
                color: black;
            ">
                <div style="
                    padding: 20px 20px 10px 20px;
                    border-bottom: 1px solid #eee;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                ">
                    <h3 style="margin: 0; font-size: 18px;">Frequently Asked Questions</h3>
                    <button id="close-faq-modal" style="
                        background: none;
                        border: none;
                        font-size: 24px;
                        cursor: pointer;
                        color: #666;
                    ">&times;</button>
                </div>
                
                <div style="padding: 10px 20px;">
                    <input type="text" id="faq-search" placeholder="Search FAQ..." style="
                        width: 100%;
                        padding: 8px 12px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                        font-size: 14px;
                        box-sizing: border-box;
                    ">
                </div>

                <div style="
                    flex: 1;
                    overflow-y: auto;
                    padding: 0 20px 20px 20px;
                ">
                    <div id="faq-categories" style="margin-bottom: 15px;">
                        <div style="margin-bottom: 10px; font-size: 12px; color: #666;">Categories:</div>
                        <div id="faq-category-buttons" style="display: flex; flex-wrap: wrap; gap: 5px;"></div>
                    </div>
                    
                    <div id="all-faq-list"></div>
                </div>
            </div>
        </div>

        {{-- Messages --}}
        <div id="chat-messages" style="
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background: #f9f9f9;
        ">
            <div id="welcome-message" style="
                background: #e3f2fd;
                padding: 10px;
                border-radius: 8px;
                margin-bottom: 10px;
                font-size: 14px;
            ">
                Hello! How can I help you today?
            </div>
        </div>

        {{-- Input --}}
        <div style="
            padding: 15px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        ">
            <input id="chat-input" type="text" placeholder="Type a message..." style="
                flex: 1;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                outline: none;
            ">
            <button id="chat-send" style="
                background: #007bff;
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 4px;
                cursor: pointer;
            ">Send</button>
        </div>
    </div>
</div>

{{-- Load WebSocket support --}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@vite('resources/js/chat-websocket.js')

{{-- Enhanced JavaScript with WebSocket --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chat state
    let chatOpen = false;
    let conversationId = null;
    let visitorId = null;
    let messagePolling = null;
    let chatSettings = {};
    let chatWebSocket = null;
    let useWebSocket = true;
    let allFAQs = [];
    let filteredFAQs = [];
    let selectedCategory = null;

    // Elements
    const chatButton = document.getElementById('chat-button');
    const chatWindow = document.getElementById('chat-window');
    const chatClose = document.getElementById('chat-close');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const faqSection = document.getElementById('faq-section');
    const faqList = document.getElementById('faq-list');
    const closeConfirmation = document.getElementById('close-confirmation');
    const closeWarningText = document.getElementById('close-warning-text');
    const confirmClose = document.getElementById('confirm-close');
    const cancelClose = document.getElementById('cancel-close');
    const showAllFaqBtn = document.getElementById('show-all-faq-btn');
    const faqModal = document.getElementById('faq-modal');
    const closeFaqModal = document.getElementById('close-faq-modal');
    const faqSearch = document.getElementById('faq-search');
    const allFaqList = document.getElementById('all-faq-list');
    const faqCategoryButtons = document.getElementById('faq-category-buttons');

    // Initialize WebSocket
    initializeWebSocket();

    // Initialize
    loadChatSettings();

    // Event listeners
    chatButton.addEventListener('click', toggleChat);
    chatClose.addEventListener('click', showCloseConfirmation);
    confirmClose.addEventListener('click', confirmCloseChat);
    cancelClose.addEventListener('click', cancelCloseChat);
    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') sendMessage();
    });
    showAllFaqBtn.addEventListener('click', showFAQModal);
    closeFaqModal.addEventListener('click', hideFAQModal);
    faqModal.addEventListener('click', function(e) {
        if (e.target === faqModal) hideFAQModal();
    });
    faqSearch.addEventListener('input', searchFAQs);

    function toggleChat() {
        if (chatOpen) {
            closeChat();
        } else {
            openChat();
        }
    }

    function openChat() {
        chatWindow.style.display = 'flex';
        chatOpen = true;
        chatInput.focus();
    }

    function showCloseConfirmation() {
        // Check if user is authenticated
        const isAuthenticated = document.querySelector('meta[name="user-id"]');
        
        if (isAuthenticated) {
            closeWarningText.innerHTML = `
                <strong>Close this chat?</strong><br><br>
                Don't worry! As a registered user, you can find this conversation in your chat history later.
                You can access your chat history from your account dashboard.
            `;
        } else {
            closeWarningText.innerHTML = `
                <strong>Close this chat?</strong><br><br>
                ⚠️ <strong>Warning:</strong> As an anonymous user, you won't be able to return to this conversation once closed.
                Consider creating an account to save your chat history.
            `;
        }
        
        closeConfirmation.style.display = 'flex';
    }

    function confirmCloseChat() {
        closeConfirmation.style.display = 'none';
        
        // If there's an active conversation, mark it as closed on the server
        if (conversationId) {
            closeChatOnServer();
        }
        
        closeChat();
    }

    function cancelCloseChat() {
        closeConfirmation.style.display = 'none';
    }

    function closeChat() {
        chatWindow.style.display = 'none';
        chatOpen = false;
        if (messagePolling) {
            clearInterval(messagePolling);
            messagePolling = null;
        }
    }

    async function loadChatSettings() {
        try {
            const response = await fetch('/api/chat/settings');
            const data = await response.json();
            
            chatSettings = data.settings;
            
            // Update welcome message
            if (chatSettings.welcome_message) {
                document.getElementById('welcome-message').textContent = chatSettings.welcome_message;
            }

            // Store all FAQs
            if (data.faqs && data.faqs.length > 0) {
                allFAQs = data.faqs;
                filteredFAQs = [...allFAQs];
                loadFAQs(data.faqs);
                initializeFAQCategories();
            } else {
                faqSection.style.display = 'none';
            }
        } catch (error) {
            console.error('Failed to load chat settings:', error);
        }
    }

    function loadFAQs(faqs) {
        faqList.innerHTML = '';
        faqs.slice(0, 3).forEach(faq => {
            const button = document.createElement('button');
            button.textContent = faq.question;
            button.style.cssText = `
                display: block;
                width: 100%;
                padding: 8px;
                margin-bottom: 5px;
                background: #f0f0f0;
                border: 1px solid #ddd;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;
                text-align: left;
            `;
            button.addEventListener('click', () => selectFAQ(faq));
            faqList.appendChild(button);
        });
    }

    async function selectFAQ(faq) {
        // Add FAQ question to chat
        addMessage(faq.question, 'user', 'You');
        
        // Hide FAQ section
        faqSection.style.display = 'none';
        
        // Start conversation with FAQ
        await startConversation(faq.question);
        
        // Mark FAQ as used
        markFAQAsUsed(faq.id);
        
        // Check if it's a chain and start the chain process
        if (faq.is_chain) {
            await startFAQChain(faq.id);
        } else {
            // For regular FAQ, show the answer
            addMessage(faq.answer, 'operator', 'Support');
        }
    }

    async function startConversation(message) {
        if (conversationId) return; // Already started

        try {
            const formData = new FormData();
            formData.append('message', message);
            if (visitorId) formData.append('visitor_id', visitorId);

            const response = await fetch('/api/chat/conversation', {
                method: 'POST',
                body: formData,
            });

            const data = await response.json();
            
            if (response.ok) {
                conversationId = data.conversation_id;
                visitorId = data.visitor_id || visitorId;
                
                console.log('🎯 Conversation started with ID:', conversationId);
                console.log('📊 WebSocket status:', { useWebSocket, chatWebSocket: !!chatWebSocket });
                
                // Subscribe to WebSocket or start polling
                if (useWebSocket && chatWebSocket) {
                    console.log('🚀 Subscribing to WebSocket channel...');
                    chatWebSocket.subscribeToConversation(conversationId);
                } else {
                    console.log('📞 Starting HTTP polling fallback...');
                    console.log('   useWebSocket:', useWebSocket);
                    console.log('   chatWebSocket:', !!chatWebSocket);
                    startMessagePolling();
                }
            }
        } catch (error) {
            console.error('Failed to start conversation:', error);
        }
    }

    async function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        // Add to UI immediately
        addMessage(message, 'user', 'You');
        chatInput.value = '';

        try {
            if (!conversationId) {
                await startConversation(message);
            } else {
                const formData = new FormData();
                formData.append('conversation_id', conversationId);
                formData.append('message', message);
                if (visitorId) formData.append('visitor_id', visitorId);

                await fetch('/api/chat/message', {
                    method: 'POST',
                    body: formData,
                });
            }
        } catch (error) {
            console.error('Failed to send message:', error);
            addMessage('Failed to send message. Please try again.', 'error', 'System');
        }
    }

    function addMessage(text, type, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.style.cssText = `
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            ${type === 'user' ? 'background: #007bff; color: white; margin-left: 20%; text-align: right;' : ''}
            ${type === 'operator' ? 'background: white; border: 1px solid #ddd; margin-right: 20%;' : ''}
            ${type === 'error' ? 'background: #ffe6e6; border: 1px solid #ffcdd2;' : ''}
        `;
        
        messageDiv.innerHTML = `
            <div style="font-size: 12px; opacity: 0.7; margin-bottom: 2px;">${sender}</div>
            <div>${text}</div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function initializeWebSocket() {
        console.log('🔌 Initializing WebSocket...');
        try {
            chatWebSocket = new ChatWebSocket({
                pusher: {
                    key: '{{ config("broadcasting.connections.pusher.key") }}',
                    cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}'
                },
                isOperator: false,
                userId: document.querySelector('meta[name="user-id"]')?.getAttribute('content'),
                onMessageReceived: handleWebSocketMessage,
                onConversationStatusChanged: handleConversationStatusChange,
                onConnectionError: handleWebSocketError
            });
            
            // WebSocket created successfully, assume it will connect
            useWebSocket = true;
            console.log('✅ WebSocket initialized. useWebSocket:', useWebSocket);
        } catch (error) {
            console.warn('❌ WebSocket initialization failed, falling back to polling:', error);
            useWebSocket = false;
        }
    }

    function handleWebSocketMessage(message, conversation) {
        // Don't show our own messages (already added immediately)
        if (message.sender_type === 'visitor' || 
            (message.sender_type === 'App\\Models\\User' && message.sender_id === getCurrentUserId())) {
            return;
        }
        
        addMessageFromAPI(message);
    }

    function handleConversationStatusChange(conversation) {
        if (conversation.status === 'closed') {
            addMessage('Conversation has been closed', 'system', 'System');
            chatInput.disabled = true;
            chatSend.disabled = true;
        }
    }

    function handleWebSocketError(error) {
        console.warn('❌ WebSocket error, falling back to polling:', error);
        useWebSocket = false;
        
        // Only start polling if we have an active conversation
        if (conversationId) {
            console.log('🔄 Starting HTTP polling due to WebSocket error...');
            startMessagePolling();
        }
    }

    function getCurrentUserId() {
        return document.querySelector('meta[name="user-id"]')?.getAttribute('content') || null;
    }

    function startMessagePolling() {
        if (messagePolling || useWebSocket) return;
        
        messagePolling = setInterval(async () => {
            await loadNewMessages();
        }, 3000);
    }

    async function loadNewMessages() {
        if (!conversationId || useWebSocket) return;

        try {
            const lastMessage = chatMessages.querySelector('[data-message-id]:last-child');
            const afterId = lastMessage ? lastMessage.dataset.messageId : 0;

            const params = new URLSearchParams({
                conversation_id: conversationId,
                after: afterId,
            });
            if (visitorId) params.append('visitor_id', visitorId);

            const response = await fetch('/api/chat/messages?' + params);
            const data = await response.json();
            
            if (data.messages && data.messages.length > 0) {
                data.messages.forEach(message => {
                    // Skip user's own messages and only show others
                    if (message.sender !== 'user' && message.sender !== 'visitor') {
                        addMessageFromAPI(message);
                    }
                });
            }
        } catch (error) {
            console.error('Failed to load new messages:', error);
        }
    }

    function addMessageFromAPI(message) {
        // Check if message already exists to prevent duplicates
        const existingMessage = chatMessages.querySelector(`[data-message-id="${message.id}"]`);
        if (existingMessage) {
            return; // Message already exists, don't add duplicate
        }

        const messageDiv = document.createElement('div');
        messageDiv.dataset.messageId = message.id;
        messageDiv.style.cssText = `
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            border: 1px solid #ddd;
            margin-right: 20%;
        `;
        
        messageDiv.innerHTML = `
            <div style="font-size: 12px; opacity: 0.7; margin-bottom: 2px;">${message.sender_name}</div>
            <div>${message.message}</div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    async function markFAQAsUsed(faqId) {
        try {
            await fetch('/api/chat/faq/used', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ faq_id: faqId }),
            });
        } catch (error) {
            console.error('Failed to mark FAQ as used:', error);
        }
    }

    async function startFAQChain(faqId) {
        try {
            const response = await fetch(`/api/chat/chain/${faqId}`);
            const data = await response.json();
            
            if (response.ok && data.faq && data.faq.steps.length > 0) {
                // Show the first step
                const firstStep = data.faq.steps[0];
                await showChainStep(firstStep);
            } else {
                addMessage('Sorry, this option is not available right now.', 'operator', 'Support');
            }
        } catch (error) {
            console.error('Failed to start FAQ chain:', error);
            addMessage('Sorry, there was an error processing your request.', 'operator', 'Support');
        }
    }

    async function showChainStep(step) {
        // Show step content
        if (step.content) {
            addMessage(step.content, 'operator', 'Support');
        }

        // Handle different step types
        switch (step.type) {
            case 'text':
                // Just showing text, nothing more needed
                if (!step.is_final) {
                    setTimeout(() => {
                        // Auto-advance after showing text
                        processChainStepResponse(step.id, 'continue');
                    }, 1000);
                }
                break;
                
            case 'options':
                showChainOptions(step);
                break;
                
            case 'input':
                showChainInput(step);
                break;
                
            case 'redirect':
                if (step.is_final) {
                    handleFinalAction(step.final_action, step.final_message);
                }
                break;
        }
    }

    function showChainOptions(step) {
        if (!step.options || step.options.length === 0) return;

        // Create options container
        const optionsDiv = document.createElement('div');
        optionsDiv.style.cssText = `
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        `;

        step.options.forEach(option => {
            const button = document.createElement('button');
            button.textContent = option.text || option.value;
            button.style.cssText = `
                display: block;
                width: 100%;
                margin-bottom: 5px;
                padding: 8px 12px;
                background: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                text-align: left;
            `;
            button.addEventListener('click', () => {
                // Remove options after selection
                optionsDiv.remove();
                // Show selected option as user message
                addMessage(option.text || option.value, 'user', 'You');
                // Process the response
                processChainStepResponse(step.id, null, option.value);
            });
            optionsDiv.appendChild(button);
        });

        chatMessages.appendChild(optionsDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function showChainInput(step) {
        const inputDiv = document.createElement('div');
        inputDiv.style.cssText = `
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        `;

        const input = document.createElement('input');
        input.type = step.input_type || 'text';
        input.placeholder = step.input_placeholder || 'Enter your response...';
        input.style.cssText = `
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 14px;
        `;

        const submitBtn = document.createElement('button');
        submitBtn.textContent = 'Submit';
        submitBtn.style.cssText = `
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        `;

        submitBtn.addEventListener('click', () => {
            const value = input.value.trim();
            if (!value && step.input_required) {
                alert('This field is required');
                return;
            }
            
            // Remove input after submission
            inputDiv.remove();
            // Show user input as message
            addMessage(value || 'No response', 'user', 'You');
            // Process the response
            processChainStepResponse(step.id, value);
        });

        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                submitBtn.click();
            }
        });

        inputDiv.appendChild(input);
        inputDiv.appendChild(submitBtn);
        chatMessages.appendChild(inputDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        input.focus();
    }

    async function processChainStepResponse(stepId, response, optionValue) {
        try {
            const requestData = {
                conversation_id: conversationId,
                step_id: stepId
            };
            
            if (response) requestData.response = response;
            if (optionValue) requestData.option_value = optionValue;
            if (visitorId) requestData.visitor_id = visitorId;

            const apiResponse = await fetch('/api/chat/chain/step', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(requestData),
            });

            const data = await apiResponse.json();
            
            if (apiResponse.ok) {
                if (data.next_step) {
                    // Show next step
                    await showChainStep(data.next_step);
                } else if (data.final_action) {
                    handleFinalAction(data.final_action);
                }
            } else {
                addMessage('Sorry, there was an error processing your response.', 'operator', 'Support');
            }
        } catch (error) {
            console.error('Failed to process chain step:', error);
            addMessage('Sorry, there was an error processing your response.', 'operator', 'Support');
        }
    }

    function handleFinalAction(action, message) {
        switch (action) {
            case 'redirect_to_operator':
                if (message) {
                    addMessage(message, 'operator', 'Support');
                }
                addMessage('You are now connected to a live operator. Please wait for a response.', 'system', 'System');
                break;
                
            case 'close_chat':
                if (message) {
                    addMessage(message, 'operator', 'Support');
                }
                chatInput.disabled = true;
                chatSend.disabled = true;
                break;
                
            default:
                if (message) {
                    addMessage(message, 'operator', 'Support');
                }
        }
    }

    async function closeChatOnServer() {
        try {
            const formData = new FormData();
            formData.append('conversation_id', conversationId);
            if (visitorId) formData.append('visitor_id', visitorId);

            await fetch('/api/chat/close', {
                method: 'POST',
                body: formData,
            });
            
            console.log('Chat closed on server');
        } catch (error) {
            console.error('Failed to close chat on server:', error);
        }
    }

    // Cleanup on page unload
    window.addEventListener('beforeunload', function() {
        if (messagePolling) {
            clearInterval(messagePolling);
        }
        if (chatWebSocket) {
            chatWebSocket.disconnect();
        }
    });

    // Generate visitor ID if not logged in
    if (!document.querySelector('meta[name="user-id"]')) {
        visitorId = 'visitor_' + Math.random().toString(36).substr(2, 20);
    }

    // FAQ Modal functions
    function showFAQModal() {
        faqModal.style.display = 'flex';
        loadAllFAQs();
        faqSearch.focus();
    }

    function hideFAQModal() {
        faqModal.style.display = 'none';
        faqSearch.value = '';
        selectedCategory = null;
        filteredFAQs = [...allFAQs];
    }

    function initializeFAQCategories() {
        const categories = new Set();
        
        allFAQs.forEach(faq => {
            if (faq.keywords) {
                const keywords = faq.keywords.split(',').map(k => k.trim()).filter(k => k);
                keywords.forEach(keyword => categories.add(keyword));
            }
            
            // Add category based on FAQ type
            categories.add(faq.is_chain ? 'Interactive' : 'Quick Answer');
        });

        // Add "All" category
        categories.add('All');

        faqCategoryButtons.innerHTML = '';
        
        // Sort categories, with "All" first
        const sortedCategories = Array.from(categories).sort((a, b) => {
            if (a === 'All') return -1;
            if (b === 'All') return 1;
            return a.localeCompare(b);
        });

        sortedCategories.forEach(category => {
            const button = document.createElement('button');
            button.textContent = category;
            button.style.cssText = `
                padding: 4px 8px;
                background: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 3px;
                cursor: pointer;
                font-size: 11px;
                color: #495057;
            `;
            
            button.addEventListener('click', () => filterByCategory(category));
            faqCategoryButtons.appendChild(button);
        });
    }

    function filterByCategory(category) {
        selectedCategory = category === 'All' ? null : category;
        
        // Update button styles
        Array.from(faqCategoryButtons.children).forEach(btn => {
            if (btn.textContent === category) {
                btn.style.background = '#007bff';
                btn.style.color = 'white';
                btn.style.borderColor = '#007bff';
            } else {
                btn.style.background = '#f8f9fa';
                btn.style.color = '#495057';
                btn.style.borderColor = '#dee2e6';
            }
        });

        applyFilters();
    }

    function searchFAQs() {
        applyFilters();
    }

    function applyFilters() {
        const searchTerm = faqSearch.value.toLowerCase();
        
        filteredFAQs = allFAQs.filter(faq => {
            // Category filter
            if (selectedCategory) {
                const matchesCategory = 
                    (selectedCategory === 'Interactive' && faq.is_chain) ||
                    (selectedCategory === 'Quick Answer' && !faq.is_chain) ||
                    (faq.keywords && faq.keywords.toLowerCase().includes(selectedCategory.toLowerCase()));
                
                if (!matchesCategory) return false;
            }
            
            // Search filter
            if (searchTerm) {
                const question = faq.question.toLowerCase();
                const answer = (faq.answer || '').toLowerCase();
                const keywords = (faq.keywords || '').toLowerCase();
                const description = (faq.chain_description || '').toLowerCase();
                
                return question.includes(searchTerm) || 
                       answer.includes(searchTerm) || 
                       keywords.includes(searchTerm) ||
                       description.includes(searchTerm);
            }
            
            return true;
        });

        loadAllFAQs();
    }

    function loadAllFAQs() {
        allFaqList.innerHTML = '';
        
        if (filteredFAQs.length === 0) {
            allFaqList.innerHTML = '<div style="text-align: center; color: #666; padding: 20px;">No FAQs found</div>';
            return;
        }

        filteredFAQs.forEach(faq => {
            const faqItem = document.createElement('div');
            faqItem.style.cssText = `
                border: 1px solid #eee;
                border-radius: 4px;
                margin-bottom: 10px;
                overflow: hidden;
                cursor: pointer;
                transition: background-color 0.2s;
            `;
            
            faqItem.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f8f9fa';
            });
            
            faqItem.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'white';
            });

            const header = document.createElement('div');
            header.style.cssText = `
                padding: 12px 15px;
                font-weight: 500;
                font-size: 14px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            `;
            
            const questionText = document.createElement('span');
            questionText.textContent = faq.question;
            questionText.style.flex = '1';
            
            const badge = document.createElement('span');
            badge.textContent = faq.is_chain ? '🔗 Interactive' : '💬 Quick';
            badge.style.cssText = `
                font-size: 10px;
                padding: 2px 6px;
                background: ${faq.is_chain ? '#e3f2fd' : '#f3e5f5'};
                border-radius: 10px;
                color: ${faq.is_chain ? '#1976d2' : '#7b1fa2'};
                margin-left: 10px;
            `;
            
            header.appendChild(questionText);
            header.appendChild(badge);

            if (!faq.is_chain && faq.answer) {
                const content = document.createElement('div');
                content.style.cssText = `
                    padding: 0 15px 12px 15px;
                    font-size: 13px;
                    color: #666;
                    max-height: 60px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                `;
                content.textContent = faq.answer.length > 100 ? 
                    faq.answer.substring(0, 100) + '...' : faq.answer;
                faqItem.appendChild(content);
            } else if (faq.is_chain && faq.chain_description) {
                const content = document.createElement('div');
                content.style.cssText = `
                    padding: 0 15px 12px 15px;
                    font-size: 13px;
                    color: #666;
                    font-style: italic;
                `;
                content.textContent = faq.chain_description;
                faqItem.appendChild(content);
            }

            faqItem.appendChild(header);
            
            faqItem.addEventListener('click', () => {
                hideFAQModal();
                selectFAQ(faq);
            });
            
            allFaqList.appendChild(faqItem);
        });
    }
});
</script>