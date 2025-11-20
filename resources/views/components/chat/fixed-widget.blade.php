{{-- Fixed Scalable Chat Widget --}}
<div id="scalable-chat-widget" class="chat-widget-container">
    {{-- Chat Toggle Button --}}
    <button id="chat-toggle-btn" class="chat-toggle-button" aria-label="Open chat">
        <div class="button-content">
            <i class="fas fa-comments chat-icon"></i>
            <span class="button-text">Онлайн-чат</span>
        </div>
        
        {{-- Notification Badge --}}
        <div id="notification-badge" class="notification-badge hidden">
            <span id="notification-count">0</span>
        </div>
    </button>

    {{-- Chat Window --}}
    <div id="chat-window" class="chat-window hidden">
        {{-- Header --}}
        <div class="chat-header">
            <div class="header-info">
                <i class="fas fa-comments header-icon"></i>
                <div class="header-text">
                    <h3>Онлайн-чат</h3>
                    <span id="connection-status">Підключення...</span>
                </div>
            </div>
            <div class="header-actions">
                <button id="close-btn" class="header-btn" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        {{-- Content Container --}}
        <div class="chat-content">
            {{-- Welcome Screen --}}
            <div id="welcome-screen" class="chat-screen active">
                <div class="welcome-content">
                    <div class="welcome-header">
                        <div class="welcome-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h2>Вітаємо в службі підтримки!</h2>
                        <p>Оберіть тип звернення для початку розмови</p>
                    </div>

                    {{-- Client Type Selection --}}
                    <div class="client-type-section">
                        <label class="form-label">Виберіть тип звернення:</label>
                        <div class="client-type-options">
                            <button id="select-personal" class="client-type-btn" data-type="personal">
                                <div class="client-icon personal">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="client-text">
                                    <h4>Персональне</h4>
                                    <p>Індивідуальні відправлення та послуги</p>
                                </div>
                            </button>

                            <button id="select-business" class="client-type-btn" data-type="business">
                                <div class="client-icon business">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="client-text">
                                    <h4>Бізнес</h4>
                                    <p>Корпоративні замовлення та логістика</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    {{-- Service Selection --}}
                    <div id="service-section" class="form-section hidden">
                        <label class="form-label">Виберіть послугу:</label>
                        <div class="select-wrapper">
                            <select id="service-select" class="form-select">
                                <option value="">Оберіть послугу</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>

                    {{-- Order Selection --}}
                    <div id="order-section" class="form-section hidden">
                        <label class="form-label">Пов'язати з замовленням (необов'язково):</label>
                        <div class="select-wrapper">
                            <select id="order-select" class="form-select">
                                <option value="">Оберіть замовлення</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>

                    {{-- Message Input --}}
                    <div id="message-section" class="form-section hidden">
                        <label class="form-label">Ваше повідомлення:</label>
                        <div class="message-input-container">
                            <textarea id="initial-message" class="message-textarea" 
                                placeholder="Опишіть вашу проблему або питання..." 
                                rows="3" maxlength="1000"></textarea>
                            <div class="message-actions">
                                <span id="char-count" class="char-counter">0/1000</span>
                                <button id="start-chat-btn" class="start-btn" disabled>
                                    <i class="fas fa-paper-plane"></i>
                                    <span>Розпочати чат</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- History Link --}}
                    <div class="history-section">
                        <button id="show-history-btn" class="history-link">
                            <i class="fas fa-history"></i>
                            Історія звернень
                        </button>
                    </div>
                </div>
            </div>

            {{-- Chat Screen --}}
            <div id="chat-screen" class="chat-screen">
                {{-- Chat Info Bar --}}
                <div id="chat-info-bar" class="chat-info-bar hidden">
                    <div class="info-items">
                        <span id="client-type-badge" class="info-badge"></span>
                        <span id="order-badge" class="info-badge hidden"></span>
                    </div>
                    <button id="back-to-welcome" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Назад
                    </button>
                </div>

                {{-- Messages Container --}}
                <div id="messages-container" class="messages-container">
                    {{-- Messages will be dynamically added here --}}
                </div>

                {{-- Input Area --}}
                <div class="input-area">
                    <div class="input-container">
                        <textarea id="message-input" class="message-input" 
                            placeholder="Введіть повідомлення..." 
                            rows="1" maxlength="1000"></textarea>
                        <button id="send-btn" class="send-btn" disabled>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="input-footer">
                        <span id="input-char-count" class="char-counter">0/1000</span>
                        <div class="connection-indicator">
                            <div id="connection-dot" class="status-dot online"></div>
                            <span id="connection-text">Онлайн</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- History Screen --}}
            <div id="history-screen" class="chat-screen">
                <div class="history-header">
                    <button id="back-from-history" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Назад
                    </button>
                    <h3>Історія звернень</h3>
                </div>

                {{-- History List --}}
                <div id="history-list" class="history-list">
                    <div class="loading-spinner hidden">
                        <div class="spinner"></div>
                        <span>Завантаження...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Error Toast --}}
    <div id="error-toast" class="error-toast hidden">
        <div class="toast-content">
            <i class="fas fa-exclamation-triangle toast-icon"></i>
            <span id="error-message"></span>
        </div>
        <button id="close-toast" class="close-toast">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

{{-- Load external dependencies --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Include CSS --}}
@push('styles')
<style>
/* Chat Widget Styles */
.chat-widget-container {
    --primary-color: #4A90E2;
    --secondary-color: #7B68EE;
    --success-color: #10B981;
    --warning-color: #F59E0B;
    --danger-color: #EF4444;
    --gray-50: #F9FAFB;
    --gray-100: #F3F4F6;
    --gray-200: #E5E7EB;
    --gray-300: #D1D5DB;
    --gray-400: #9CA3AF;
    --gray-500: #6B7280;
    --gray-600: #4B5563;
    --gray-700: #374151;
    --gray-800: #1F2937;
    --gray-900: #111827;
    
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
    line-height: 1.5;
}

/* Toggle Button */
.chat-toggle-button {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border: none;
    border-radius: 28px;
    padding: 12px 20px;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(74, 144, 226, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1000;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    font-size: 14px;
    position: relative;
}

.chat-toggle-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(74, 144, 226, 0.4);
}

.button-content {
    display: flex;
    align-items: center;
    gap: 8px;
}

.chat-icon {
    width: 20px;
    height: 20px;
}

.notification-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: var(--danger-color);
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    animation: pulse 2s infinite;
}

/* Chat Window */
.chat-window {
    position: fixed;
    bottom: 100px;
    right: 24px;
    width: 400px;
    height: 600px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    z-index: 1001;
    overflow: hidden;
    border: 1px solid var(--gray-200);
}

/* Header */
.chat-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.header-icon {
    width: 24px;
    height: 24px;
}

.header-text h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.header-text span {
    font-size: 12px;
    opacity: 0.9;
}

.header-actions {
    display: flex;
    gap: 8px;
}

.header-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s;
}

.header-btn:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* Content */
.chat-content {
    flex: 1;
    position: relative;
    overflow: hidden;
}

.chat-screen {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    transform: translateX(100%);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
}

.chat-screen.active {
    opacity: 1;
    transform: translateX(0);
}

/* Welcome Screen */
.welcome-content {
    padding: 24px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.welcome-header {
    text-align: center;
    margin-bottom: 24px;
}

.welcome-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    color: white;
    font-size: 32px;
}

.welcome-header h2 {
    margin: 0 0 8px;
    font-size: 20px;
    font-weight: 700;
    color: var(--gray-900);
}

.welcome-header p {
    margin: 0;
    color: var(--gray-600);
    font-size: 14px;
}

/* Client Type Selection */
.client-type-section {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 12px;
}

.client-type-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.client-type-btn {
    background: white;
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 16px;
    text-align: left;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
}

.client-type-btn:hover {
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.15);
}

.client-type-btn.selected {
    border-color: var(--primary-color);
    background: rgba(74, 144, 226, 0.05);
}

.client-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.client-icon.personal {
    background: linear-gradient(135deg, var(--success-color), #059669);
}

.client-icon.business {
    background: linear-gradient(135deg, var(--secondary-color), #6d28d9);
}

.client-text h4 {
    margin: 0 0 4px;
    font-size: 16px;
    font-weight: 600;
    color: var(--gray-900);
}

.client-text p {
    margin: 0;
    font-size: 14px;
    color: var(--gray-600);
}

/* Form Sections */
.form-section {
    margin-bottom: 20px;
}

.select-wrapper {
    position: relative;
}

.form-select {
    width: 100%;
    padding: 12px 16px;
    padding-right: 40px;
    border: 2px solid var(--gray-300);
    border-radius: 8px;
    font-size: 14px;
    background: white;
    appearance: none;
    cursor: pointer;
    transition: border-color 0.2s;
}

.form-select:focus {
    outline: none;
    border-color: var(--primary-color);
}

.select-arrow {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    color: var(--gray-500);
    pointer-events: none;
}

/* Message Input */
.message-input-container {
    position: relative;
}

.message-textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--gray-300);
    border-radius: 8px;
    font-size: 14px;
    font-family: inherit;
    resize: vertical;
    min-height: 80px;
    transition: border-color 0.2s;
    box-sizing: border-box;
}

.message-textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.message-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 8px;
}

.char-counter {
    font-size: 12px;
    color: var(--gray-500);
}

.start-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    transition: all 0.2s;
}

.start-btn:hover:not(:disabled) {
    background: #3A7BC8;
    transform: translateY(-1px);
}

.start-btn:disabled {
    background: var(--gray-400);
    cursor: not-allowed;
    transform: none;
}

/* History Section */
.history-section {
    margin-top: auto;
    padding-top: 20px;
    border-top: 1px solid var(--gray-200);
    text-align: center;
}

.history-link {
    background: none;
    border: none;
    color: var(--primary-color);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    margin: 0 auto;
    padding: 8px;
    border-radius: 6px;
    transition: background-color 0.2s;
}

.history-link:hover {
    background: rgba(74, 144, 226, 0.1);
}

/* Chat Info Bar */
.chat-info-bar {
    padding: 12px 20px;
    background: var(--gray-50);
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info-items {
    display: flex;
    gap: 8px;
}

.info-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
}

.info-badge.personal {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success-color);
}

.info-badge.business {
    background: rgba(139, 92, 246, 0.1);
    color: var(--secondary-color);
}

.back-btn {
    background: none;
    border: none;
    color: var(--primary-color);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.back-btn:hover {
    background: rgba(74, 144, 226, 0.1);
}

/* Messages Container */
.messages-container {
    flex: 1;
    padding: 16px 20px;
    overflow-y: auto;
    background: var(--gray-50);
}

/* Input Area */
.input-area {
    padding: 16px 20px;
    background: white;
    border-top: 1px solid var(--gray-200);
}

.input-container {
    display: flex;
    gap: 8px;
    align-items: flex-end;
}

.message-input {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid var(--gray-300);
    border-radius: 20px;
    font-size: 14px;
    font-family: inherit;
    resize: none;
    max-height: 100px;
    outline: none;
    transition: border-color 0.2s;
}

.message-input:focus {
    border-color: var(--primary-color);
}

.send-btn {
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
    flex-shrink: 0;
}

.send-btn:hover:not(:disabled) {
    background: #3A7BC8;
    transform: scale(1.05);
}

.send-btn:disabled {
    background: var(--gray-400);
    cursor: not-allowed;
    transform: none;
}

.input-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 8px;
    font-size: 12px;
}

.connection-indicator {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--gray-500);
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.status-dot.online {
    background: var(--success-color);
}

.status-dot.offline {
    background: var(--danger-color);
}

/* History Screen */
.history-header {
    padding: 20px;
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    gap: 12px;
}

.history-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: var(--gray-900);
}

.history-list {
    flex: 1;
    padding: 16px 20px;
    overflow-y: auto;
}

/* Error Toast */
.error-toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border: 1px solid var(--danger-color);
    border-radius: 8px;
    padding: 16px;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
    z-index: 2000;
    display: flex;
    align-items: center;
    gap: 12px;
    max-width: 400px;
    animation: slideInRight 0.3s ease-out;
}

.toast-content {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
}

.toast-icon {
    width: 20px;
    height: 20px;
    color: var(--danger-color);
}

.close-toast {
    background: none;
    border: none;
    color: var(--gray-500);
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
}

/* Loading Spinner */
.loading-spinner {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 40px;
    color: var(--gray-500);
}

.spinner {
    width: 32px;
    height: 32px;
    border: 3px solid var(--gray-200);
    border-top: 3px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Utility Classes */
.hidden {
    display: none !important;
}

/* Responsive Design */
@media (max-width: 480px) {
    .chat-window {
        width: calc(100vw - 20px);
        height: calc(100vh - 120px);
        bottom: 10px;
        right: 10px;
    }
    
    .chat-toggle-button {
        bottom: 10px;
        right: 10px;
    }
    
    .welcome-content {
        padding: 20px;
    }
}

/* Animations */
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush

{{-- Include JavaScript --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Fixed Chat Widget Loaded');
    
    // Chat state management
    const ChatState = {
        currentScreen: 'welcome',
        conversationId: null,
        visitorId: null,
        clientType: null,
        selectedService: null,
        selectedOrder: null,
        isConnected: true,
        
        init() {
            this.generateVisitorId();
        },
        
        generateVisitorId() {
            if (!document.querySelector('meta[name="user-id"]')) {
                this.visitorId = 'visitor_' + Math.random().toString(36).substr(2, 20);
            }
        }
    };

    // UI management
    const ChatUI = {
        elements: {},
        services: {
            personal: [
                { value: 'dumashipping.com', text: 'dumashipping.com' },
                { value: 'package-delivery', text: 'Доставка посилок' },
                { value: 'express-shipping', text: 'Експрес доставка' },
                { value: 'tracking', text: 'Відстеження посилок' }
            ],
            business: [
                { value: 'dumashipping.com', text: 'dumashipping.com' },
                { value: 'freight-shipping', text: 'Вантажні перевезення' },
                { value: 'logistics', text: 'Логістичні послуги' },
                { value: 'warehousing', text: 'Складські послуги' }
            ]
        },
        
        init() {
            this.cacheElements();
            this.bindEvents();
        },
        
        cacheElements() {
            this.elements.toggleBtn = document.getElementById('chat-toggle-btn');
            this.elements.chatWindow = document.getElementById('chat-window');
            this.elements.closeBtn = document.getElementById('close-btn');
            this.elements.welcomeScreen = document.getElementById('welcome-screen');
            this.elements.chatScreen = document.getElementById('chat-screen');
            this.elements.historyScreen = document.getElementById('history-screen');
            this.elements.selectPersonal = document.getElementById('select-personal');
            this.elements.selectBusiness = document.getElementById('select-business');
            this.elements.serviceSection = document.getElementById('service-section');
            this.elements.serviceSelect = document.getElementById('service-select');
            this.elements.orderSection = document.getElementById('order-section');
            this.elements.orderSelect = document.getElementById('order-select');
            this.elements.messageSection = document.getElementById('message-section');
            this.elements.initialMessage = document.getElementById('initial-message');
            this.elements.charCount = document.getElementById('char-count');
            this.elements.startChatBtn = document.getElementById('start-chat-btn');
            this.elements.showHistoryBtn = document.getElementById('show-history-btn');
            this.elements.backToWelcome = document.getElementById('back-to-welcome');
            this.elements.backFromHistory = document.getElementById('back-from-history');
            this.elements.errorToast = document.getElementById('error-toast');
            this.elements.errorMessage = document.getElementById('error-message');
            this.elements.closeToast = document.getElementById('close-toast');
        },
        
        bindEvents() {
            this.elements.toggleBtn.addEventListener('click', () => this.toggleChat());
            this.elements.closeBtn.addEventListener('click', () => this.closeChat());
            this.elements.selectPersonal.addEventListener('click', () => this.selectClientType('personal'));
            this.elements.selectBusiness.addEventListener('click', () => this.selectClientType('business'));
            this.elements.serviceSelect.addEventListener('change', () => this.handleServiceChange());
            this.elements.orderSelect.addEventListener('change', () => this.handleOrderChange());
            this.elements.initialMessage.addEventListener('input', () => this.handleMessageInput());
            this.elements.startChatBtn.addEventListener('click', () => this.startConversation());
            this.elements.showHistoryBtn.addEventListener('click', () => this.switchScreen('history'));
            this.elements.backToWelcome.addEventListener('click', () => this.switchScreen('welcome'));
            this.elements.backFromHistory.addEventListener('click', () => this.switchScreen('welcome'));
            this.elements.closeToast.addEventListener('click', () => this.hideErrorToast());
        },
        
        toggleChat() {
            if (this.elements.chatWindow.classList.contains('hidden')) {
                this.elements.chatWindow.classList.remove('hidden');
            } else {
                this.closeChat();
            }
        },
        
        closeChat() {
            this.elements.chatWindow.classList.add('hidden');
        },
        
        switchScreen(screen) {
            this.elements.welcomeScreen.classList.remove('active');
            this.elements.chatScreen.classList.remove('active');
            this.elements.historyScreen.classList.remove('active');
            
            ChatState.currentScreen = screen;
            switch (screen) {
                case 'welcome':
                    this.elements.welcomeScreen.classList.add('active');
                    break;
                case 'chat':
                    this.elements.chatScreen.classList.add('active');
                    break;
                case 'history':
                    this.elements.historyScreen.classList.add('active');
                    break;
            }
        },
        
        selectClientType(type) {
            ChatState.clientType = type;
            
            document.querySelectorAll('.client-type-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            if (type === 'personal') {
                this.elements.selectPersonal.classList.add('selected');
            } else {
                this.elements.selectBusiness.classList.add('selected');
            }
            
            this.elements.serviceSection.classList.remove('hidden');
            this.loadServiceOptions(type);
            
            if (document.querySelector('meta[name="user-id"]')) {
                this.elements.orderSection.classList.remove('hidden');
            }
            
            this.elements.messageSection.classList.remove('hidden');
            this.validateForm();
        },
        
        loadServiceOptions(clientType) {
            const services = this.services[clientType] || [];
            this.elements.serviceSelect.innerHTML = '<option value="">Оберіть послугу</option>';
            
            services.forEach(service => {
                const option = document.createElement('option');
                option.value = service.value;
                option.textContent = service.text;
                this.elements.serviceSelect.appendChild(option);
            });
        },
        
        handleServiceChange() {
            ChatState.selectedService = this.elements.serviceSelect.value;
            this.validateForm();
        },
        
        handleOrderChange() {
            ChatState.selectedOrder = this.elements.orderSelect.value;
        },
        
        handleMessageInput() {
            const message = this.elements.initialMessage.value;
            this.elements.charCount.textContent = `${message.length}/1000`;
            this.validateForm();
        },
        
        validateForm() {
            const hasClientType = ChatState.clientType !== null;
            const hasMessage = this.elements.initialMessage.value.trim().length > 0;
            
            this.elements.startChatBtn.disabled = !(hasClientType && hasMessage);
        },
        
        async startConversation() {
            const message = this.elements.initialMessage.value.trim();
            if (!message || !ChatState.clientType) return;
            
            try {
                this.elements.startChatBtn.disabled = true;
                this.elements.startChatBtn.innerHTML = '<span>Підключення...</span>';
                
                console.log('Starting conversation...', {
                    message: message,
                    client_type: ChatState.clientType,
                    selected_service: ChatState.selectedService,
                    selected_order: ChatState.selectedOrder
                });
                
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1000));
                
                // Switch to chat screen
                this.switchScreen('chat');
                this.showSuccessMessage('Чат розпочато успішно!');
                
            } catch (error) {
                console.error('Failed to start conversation:', error);
                this.showErrorToast('Помилка створення чату');
            } finally {
                this.elements.startChatBtn.disabled = false;
                this.elements.startChatBtn.innerHTML = '<i class="fas fa-paper-plane"></i><span>Розпочати чат</span>';
            }
        },
        
        showErrorToast(message) {
            this.elements.errorMessage.textContent = message;
            this.elements.errorToast.classList.remove('hidden');
            
            setTimeout(() => {
                this.hideErrorToast();
            }, 5000);
        },
        
        hideErrorToast() {
            this.elements.errorToast.classList.add('hidden');
        },
        
        showSuccessMessage(message) {
            console.log('✅', message);
        }
    };

    // Initialize chat system
    ChatState.init();
    ChatUI.init();
    
    console.log('✅ Chat widget initialized successfully');
});
</script>
@endpush
