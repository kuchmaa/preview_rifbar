{{-- Scalable Chat Widget - Modern Design for High Traffic --}}
<div id="scalable-chat-widget" class="chat-widget-container">
    {{-- Chat Toggle Button --}}
    <button id="chat-toggle-btn" class="chat-toggle-button" aria-label="Open chat">
        <div class="button-content">
            <svg class="chat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
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
                <svg class="header-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <div class="header-text">
                    <h3>Онлайн-чат</h3>
                    <span id="connection-status">Підключення...</span>
                </div>
            </div>
            <div class="header-actions">
                <button id="minimize-btn" class="header-btn" aria-label="Minimize">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                </button>
                <button id="close-btn" class="header-btn" aria-label="Close">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
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
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
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
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="client-text">
                                    <h4>Персональне</h4>
                                    <p>Індивідуальні відправлення та послуги</p>
                                </div>
                            </button>

                            <button id="select-business" class="client-type-btn" data-type="business">
                                <div class="client-icon business">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
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
                            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Order Selection --}}
                    <div id="order-section" class="form-section hidden">
                        <label class="form-label">Пов'язати з замовленням (необов'язково):</label>
                        <div class="select-wrapper">
                            <select id="order-select" class="form-select">
                                <option value="">Оберіть замовлення</option>
                            </select>
                            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
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
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    <span>Розпочати чат</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- History Link --}}
                    <div class="history-section">
                        <button id="show-history-btn" class="history-link">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
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
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Назад
                    </button>
                </div>

                {{-- Messages Container --}}
                <div id="messages-container" class="messages-container">
                    {{-- Messages will be dynamically added here --}}
                </div>

                {{-- Typing Indicator --}}
                <div id="typing-indicator" class="typing-indicator hidden">
                    <div class="typing-avatar">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="typing-content">
                        <span class="typing-text">Оператор друкує</span>
                        <div class="typing-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                {{-- Input Area --}}
                <div class="input-area">
                    <div class="input-container">
                        <textarea id="message-input" class="message-input" 
                            placeholder="Введіть повідомлення..." 
                            rows="1" maxlength="1000"></textarea>
                        <button id="send-btn" class="send-btn" disabled>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
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
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Назад
                    </button>
                    <h3>Історія звернень</h3>
                </div>

                {{-- History Filters --}}
                <div class="history-filters">
                    <select id="history-filter-type" class="filter-select">
                        <option value="">Всі типи</option>
                        <option value="personal">Персональні</option>
                        <option value="business">Бізнес</option>
                    </select>
                    <select id="history-filter-status" class="filter-select">
                        <option value="">Всі статуси</option>
                        <option value="waiting">Очікує</option>
                        <option value="active">Активні</option>
                        <option value="closed">Закриті</option>
                    </select>
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

        {{-- Footer --}}
        <div class="chat-footer">
            <div class="footer-info">
                <span>Duma Shipping Support</span>
            </div>
            <div class="footer-actions">
                <button id="minimize-footer" class="footer-btn" title="Згорнути">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Error Toast --}}
    <div id="error-toast" class="error-toast hidden">
        <div class="toast-content">
            <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
            </svg>
            <span id="error-message"></span>
        </div>
        <button id="close-toast" class="close-toast">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Confirmation Modal --}}
    <div id="confirmation-modal" class="modal-overlay hidden">
        <div class="modal-content">
            <div class="modal-header">
                <svg class="modal-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 id="modal-title">Підтвердження</h3>
            </div>
            <div class="modal-body">
                <p id="modal-message"></p>
            </div>
            <div class="modal-actions">
                <button id="modal-confirm" class="btn-primary">Підтвердити</button>
                <button id="modal-cancel" class="btn-secondary">Скасувати</button>
            </div>
        </div>
    </div>
</div>

{{-- CSS Styles --}}
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

.chat-toggle-button:active {
    transform: translateY(0);
}

.button-content {
    display: flex;
    align-items: center;
    gap: 8px;
}

.chat-icon {
    width: 20px;
    height: 20px;
    stroke-width: 2;
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

.header-btn svg {
    width: 16px;
    height: 16px;
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
}

.welcome-icon svg {
    width: 32px;
    height: 32px;
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

.client-icon svg {
    width: 24px;
    height: 24px;
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

.start-btn svg {
    width: 16px;
    height: 16px;
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

.history-link svg {
    width: 16px;
    height: 16px;
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

.back-btn svg {
    width: 14px;
    height: 14px;
}

/* Messages Container */
.messages-container {
    flex: 1;
    padding: 16px 20px;
    overflow-y: auto;
    background: var(--gray-50);
}

/* Message Styles */
.message {
    margin-bottom: 16px;
    display: flex;
    gap: 12px;
    animation: messageSlideIn 0.3s ease-out;
}

.message.user {
    flex-direction: row-reverse;
}

.message-avatar {
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
}

.message.system .message-avatar {
    background: var(--primary-color);
}

.message.user .message-avatar {
    background: var(--success-color);
}

.message.operator .message-avatar {
    background: var(--secondary-color);
}

.message-bubble {
    max-width: 70%;
    padding: 12px 16px;
    border-radius: 16px;
    background: white;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    position: relative;
}

.message.user .message-bubble {
    background: var(--primary-color);
    color: white;
}

.message-sender {
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 4px;
    opacity: 0.8;
}

.message-text {
    font-size: 14px;
    line-height: 1.4;
    margin: 0;
    word-wrap: break-word;
}

.message-time {
    font-size: 10px;
    opacity: 0.6;
    margin-top: 4px;
}

/* Typing Indicator */
.typing-indicator {
    padding: 16px 20px;
    display: flex;
    gap: 12px;
    align-items: center;
    background: var(--gray-50);
}

.typing-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--secondary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.typing-avatar svg {
    width: 16px;
    height: 16px;
}

.typing-content {
    display: flex;
    align-items: center;
    gap: 8px;
}

.typing-text {
    font-size: 14px;
    color: var(--gray-600);
}

.typing-dots {
    display: flex;
    gap: 2px;
}

.typing-dots span {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--gray-400);
    animation: typingDots 1.4s infinite ease-in-out;
}

.typing-dots span:nth-child(1) { animation-delay: -0.32s; }
.typing-dots span:nth-child(2) { animation-delay: -0.16s; }

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

.send-btn svg {
    width: 16px;
    height: 16px;
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

.history-filters {
    padding: 16px 20px;
    display: flex;
    gap: 12px;
    border-bottom: 1px solid var(--gray-200);
}

.filter-select {
    flex: 1;
    padding: 8px 12px;
    border: 1px solid var(--gray-300);
    border-radius: 6px;
    font-size: 14px;
    background: white;
}

.history-list {
    flex: 1;
    padding: 16px 20px;
    overflow-y: auto;
}

.history-item {
    padding: 16px;
    background: white;
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    margin-bottom: 12px;
    cursor: pointer;
    transition: all 0.2s;
}

.history-item:hover {
    border-color: var(--primary-color);
    box-shadow: 0 2px 8px rgba(74, 144, 226, 0.1);
}

.history-item-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.history-item-type {
    font-size: 12px;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 12px;
}

.history-item-type.personal {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success-color);
}

.history-item-type.business {
    background: rgba(139, 92, 246, 0.1);
    color: var(--secondary-color);
}

.history-item-date {
    font-size: 12px;
    color: var(--gray-500);
}

.history-item-preview {
    font-size: 14px;
    color: var(--gray-700);
    line-height: 1.4;
    margin-bottom: 8px;
}

.history-item-status {
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 8px;
}

.history-item-status.waiting {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning-color);
}

.history-item-status.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success-color);
}

.history-item-status.closed {
    background: rgba(107, 114, 128, 0.1);
    color: var(--gray-600);
}

/* Footer */
.chat-footer {
    padding: 12px 20px;
    background: var(--gray-50);
    border-top: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-info {
    font-size: 12px;
    color: var(--gray-500);
}

.footer-btn {
    background: none;
    border: none;
    color: var(--gray-500);
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.footer-btn:hover {
    background: var(--gray-200);
}

.footer-btn svg {
    width: 16px;
    height: 16px;
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

.close-toast svg {
    width: 16px;
    height: 16px;
}

/* Modal */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease-out;
}

.modal-content {
    background: white;
    border-radius: 12px;
    padding: 24px;
    max-width: 400px;
    margin: 20px;
    animation: scaleIn 0.3s ease-out;
}

.modal-header {
    text-align: center;
    margin-bottom: 16px;
}

.modal-icon {
    width: 48px;
    height: 48px;
    color: var(--warning-color);
    margin: 0 auto 12px;
}

.modal-header h3 {
    margin: 0 0 8px;
    font-size: 18px;
    font-weight: 600;
    color: var(--gray-900);
}

.modal-body p {
    margin: 0 0 24px;
    color: var(--gray-600);
    line-height: 1.5;
    text-align: center;
}

.modal-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
}

.btn-primary {
    padding: 10px 20px;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn-primary:hover {
    background: #3A7BC8;
}

.btn-secondary {
    padding: 10px 20px;
    background: var(--gray-500);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn-secondary:hover {
    background: var(--gray-600);
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
    
    .client-type-options {
        gap: 8px;
    }
    
    .client-type-btn {
        padding: 12px;
    }
    
    .client-icon {
        width: 40px;
        height: 40px;
    }
    
    .client-text h4 {
        font-size: 14px;
    }
    
    .client-text p {
        font-size: 12px;
    }
}

/* Animations */
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

@keyframes messageSlideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes typingDots {
    0%, 80%, 100% {
        transform: scale(0);
    }
    40% {
        transform: scale(1);
    }
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

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

{{-- Load WebSocket and Chat JavaScript --}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@vite('resources/js/chat-websocket.js')

{{-- Main Chat JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chat state management
    const ChatState = {
        currentScreen: 'welcome',
        conversationId: null,
        visitorId: null,
        clientType: null,
        selectedService: null,
        selectedOrder: null,
        isConnected: false,
        chatWebSocket: null,
        messagePolling: null,
        
        // Initialize state
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
                this.chatWebSocket = new ChatWebSocket({
                    pusher: {
                        key: '{{ config("broadcasting.connections.pusher.key") }}',
                        cluster: '{{ config("broadcasting.connections.pusher.options.cluster") }}'
                    },
                    isOperator: false,
                    userId: document.querySelector('meta[name="user-id"]')?.getAttribute('content'),
                    onMessageReceived: (message, conversation) => ChatUI.handleIncomingMessage(message, conversation),
                    onConversationStatusChanged: (conversation) => ChatUI.handleConversationStatusChange(conversation),
                    onConnectionError: (error) => this.handleWebSocketError(error)
                });
                
                this.isConnected = true;
                ChatUI.updateConnectionStatus(true);
            } catch (error) {
                console.warn('WebSocket initialization failed:', error);
                this.isConnected = false;
                ChatUI.updateConnectionStatus(false);
            }
        },
        
        handleWebSocketError(error) {
            console.warn('WebSocket error:', error);
            this.isConnected = false;
            ChatUI.updateConnectionStatus(false);
            
            if (this.conversationId) {
                this.startMessagePolling();
            }
        },
        
        startMessagePolling() {
            if (this.messagePolling || this.isConnected) return;
            
            this.messagePolling = setInterval(() => {
                ChatAPI.getMessages(this.conversationId, this.visitorId)
                    .then(response => {
                        if (response.success && response.data.messages) {
                            response.data.messages.forEach(message => {
                                if (message.sender_type !== 'visitor' && 
                                    !(message.sender_type === 'App\\Models\\User' && message.sender_id === this.getCurrentUserId())) {
                                    ChatUI.addMessage(message.message, 'operator', message.sender_name);
                                }
                            });
                        }
                    })
                    .catch(error => console.error('Polling error:', error));
            }, 3000);
        },
        
        getCurrentUserId() {
            return document.querySelector('meta[name="user-id"]')?.getAttribute('content') || null;
        }
    };

    // API communication
    const ChatAPI = {
        async request(endpoint, options = {}) {
            const defaultOptions = {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Accept': 'application/json'
                }
            };
            
            const response = await fetch(`/api/chat/${endpoint}`, {
                ...defaultOptions,
                ...options,
                headers: { ...defaultOptions.headers, ...options.headers }
            });
            
            return await response.json();
        },
        
        async startConversation(data) {
            return this.request('scalable/conversation', {
                method: 'POST',
                body: JSON.stringify({
                    ...data,
                    visitor_id: ChatState.visitorId
                })
            });
        },
        
        async sendMessage(conversationId, message) {
            return this.request('scalable/message', {
                method: 'POST',
                body: JSON.stringify({
                    conversation_id: conversationId,
                    message: message,
                    visitor_id: ChatState.visitorId
                })
            });
        },
        
        async getMessages(conversationId, visitorId, after = null) {
            const params = new URLSearchParams({
                conversation_id: conversationId,
                ...(visitorId && { visitor_id: visitorId }),
                ...(after && { after: after })
            });
            
            return this.request(`scalable/messages?${params}`);
        },
        
        async getHistory(filters = {}) {
            const params = new URLSearchParams(filters);
            return this.request(`scalable/history?${params}`);
        },
        
        async getUserOrders(clientType) {
            return this.request(`scalable/orders?client_type=${clientType}`);
        }
    };

    // UI management
    const ChatUI = {
        elements: {},
        
        init() {
            this.cacheElements();
            this.bindEvents();
            this.loadServices();
        },
        
        cacheElements() {
            // Main elements
            this.elements.toggleBtn = document.getElementById('chat-toggle-btn');
            this.elements.chatWindow = document.getElementById('chat-window');
            this.elements.closeBtn = document.getElementById('close-btn');
            this.elements.minimizeBtn = document.getElementById('minimize-btn');
            
            // Screens
            this.elements.welcomeScreen = document.getElementById('welcome-screen');
            this.elements.chatScreen = document.getElementById('chat-screen');
            this.elements.historyScreen = document.getElementById('history-screen');
            
            // Welcome screen elements
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
            
            // Chat screen elements
            this.elements.chatInfoBar = document.getElementById('chat-info-bar');
            this.elements.clientTypeBadge = document.getElementById('client-type-badge');
            this.elements.orderBadge = document.getElementById('order-badge');
            this.elements.backToWelcome = document.getElementById('back-to-welcome');
            this.elements.messagesContainer = document.getElementById('messages-container');
            this.elements.messageInput = document.getElementById('message-input');
            this.elements.sendBtn = document.getElementById('send-btn');
            this.elements.inputCharCount = document.getElementById('input-char-count');
            
            // History screen elements
            this.elements.backFromHistory = document.getElementById('back-from-history');
            this.elements.historyList = document.getElementById('history-list');
            
            // Status elements
            this.elements.connectionStatus = document.getElementById('connection-status');
            this.elements.connectionDot = document.getElementById('connection-dot');
            this.elements.connectionText = document.getElementById('connection-text');
            this.elements.notificationBadge = document.getElementById('notification-badge');
            this.elements.notificationCount = document.getElementById('notification-count');
            
            // Modal and toast
            this.elements.errorToast = document.getElementById('error-toast');
            this.elements.errorMessage = document.getElementById('error-message');
            this.elements.closeToast = document.getElementById('close-toast');
            this.elements.confirmationModal = document.getElementById('confirmation-modal');
        },
        
        bindEvents() {
            // Main controls
            this.elements.toggleBtn.addEventListener('click', () => this.toggleChat());
            this.elements.closeBtn.addEventListener('click', () => this.showCloseConfirmation());
            this.elements.minimizeBtn.addEventListener('click', () => this.showCloseConfirmation());
            
            // Client type selection
            this.elements.selectPersonal.addEventListener('click', () => this.selectClientType('personal'));
            this.elements.selectBusiness.addEventListener('click', () => this.selectClientType('business'));
            
            // Form interactions
            this.elements.serviceSelect.addEventListener('change', () => this.handleServiceChange());
            this.elements.orderSelect.addEventListener('change', () => this.handleOrderChange());
            this.elements.initialMessage.addEventListener('input', () => this.handleMessageInput());
            this.elements.startChatBtn.addEventListener('click', () => this.startConversation());
            
            // Navigation
            this.elements.showHistoryBtn.addEventListener('click', () => this.switchScreen('history'));
            this.elements.backToWelcome.addEventListener('click', () => this.switchScreen('welcome'));
            this.elements.backFromHistory.addEventListener('click', () => this.switchScreen('welcome'));
            
            // Chat interactions
            this.elements.messageInput.addEventListener('input', () => this.handleChatInput());
            this.elements.messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }
            });
            this.elements.sendBtn.addEventListener('click', () => this.sendMessage());
            
            // Toast and modal
            this.elements.closeToast.addEventListener('click', () => this.hideErrorToast());
        },
        
        loadServices() {
            const services = {
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
            };
            
            this.services = services;
        },
        
        toggleChat() {
            if (this.elements.chatWindow.classList.contains('hidden')) {
                this.openChat();
            } else {
                this.showCloseConfirmation();
            }
        },
        
        openChat() {
            this.elements.chatWindow.classList.remove('hidden');
            this.elements.notificationBadge.classList.add('hidden');
            this.updateConnectionStatus(ChatState.isConnected);
        },
        
        showCloseConfirmation() {
            const isAuthenticated = document.querySelector('meta[name="user-id"]');
            const message = isAuthenticated 
                ? 'Ви можете знайти цю розмову в історії звернень пізніше.'
                : 'Увага: Як анонімний користувач, ви не зможете повернутися до цієї розмови після закриття.';
            
            this.showModal('Закрити чат?', message, () => {
                this.elements.chatWindow.classList.add('hidden');
                this.hideModal();
            });
        },
        
        switchScreen(screen) {
            // Hide all screens
            this.elements.welcomeScreen.classList.remove('active');
            this.elements.chatScreen.classList.remove('active');
            this.elements.historyScreen.classList.remove('active');
            
            // Show selected screen
            ChatState.currentScreen = screen;
            switch (screen) {
                case 'welcome':
                    this.elements.welcomeScreen.classList.add('active');
                    break;
                case 'chat':
                    this.elements.chatScreen.classList.add('active');
                    this.elements.messageInput.focus();
                    break;
                case 'history':
                    this.elements.historyScreen.classList.add('active');
                    this.loadHistory();
                    break;
            }
        },
        
        selectClientType(type) {
            ChatState.clientType = type;
            
            // Update UI
            document.querySelectorAll('.client-type-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            if (type === 'personal') {
                this.elements.selectPersonal.classList.add('selected');
            } else {
                this.elements.selectBusiness.classList.add('selected');
            }
            
            // Show service section
            this.elements.serviceSection.classList.remove('hidden');
            this.loadServiceOptions(type);
            
            // Show order section if user is authenticated
            if (document.querySelector('meta[name="user-id"]')) {
                this.elements.orderSection.classList.remove('hidden');
                this.loadOrderOptions(type);
            }
            
            // Show message section
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
        
        async loadOrderOptions(clientType) {
            try {
                const response = await ChatAPI.getUserOrders(clientType);
                
                this.elements.orderSelect.innerHTML = '<option value="">Оберіть замовлення</option>';
                
                if (response.success && response.data.orders) {
                    response.data.orders.forEach(order => {
                        const option = document.createElement('option');
                        option.value = order.id;
                        option.textContent = order.display_text;
                        this.elements.orderSelect.appendChild(option);
                    });
                }
            } catch (error) {
                console.error('Failed to load orders:', error);
                this.showErrorToast('Помилка завантаження замовлень');
            }
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
        
        handleChatInput() {
            const message = this.elements.messageInput.value;
            this.elements.inputCharCount.textContent = `${message.length}/1000`;
            this.elements.sendBtn.disabled = message.trim().length === 0;
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
                
                const data = {
                    message: message,
                    client_type: ChatState.clientType
                };
                
                if (ChatState.selectedOrder) {
                    if (ChatState.clientType === 'business') {
                        data.business_order_id = ChatState.selectedOrder;
                    } else {
                        data.order_id = ChatState.selectedOrder;
                    }
                }
                
                const response = await ChatAPI.startConversation(data);
                
                if (response.success) {
                    ChatState.conversationId = response.data.conversation_id;
                    ChatState.visitorId = response.data.visitor_id || ChatState.visitorId;
                    
                    // Update UI
                    this.updateChatInfo();
                    this.switchScreen('chat');
                    this.addMessage(message, 'user', 'Ви');
                    
                    // Subscribe to updates
                    if (ChatState.chatWebSocket) {
                        ChatState.chatWebSocket.subscribeToConversation(ChatState.conversationId);
                    } else {
                        ChatState.startMessagePolling();
                    }
                    
                    // Clear form
                    this.elements.initialMessage.value = '';
                    this.validateForm();
                    
                } else {
                    this.showErrorToast(response.message || 'Помилка створення чату');
                }
                
            } catch (error) {
                console.error('Failed to start conversation:', error);
                this.showErrorToast('Помилка підключення до сервера');
            } finally {
                this.elements.startChatBtn.disabled = false;
                this.elements.startChatBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg><span>Розпочати чат</span>';
            }
        },
        
        updateChatInfo() {
            this.elements.chatInfoBar.classList.remove('hidden');
            
            // Update client type badge
            this.elements.clientTypeBadge.textContent = ChatState.clientType === 'business' ? 'Бізнес' : 'Персональне';
            this.elements.clientTypeBadge.className = `info-badge ${ChatState.clientType}`;
            
            // Update order badge if order is selected
            if (ChatState.selectedOrder) {
                const orderText = this.elements.orderSelect.options[this.elements.orderSelect.selectedIndex].text;
                this.elements.orderBadge.textContent = orderText;
                this.elements.orderBadge.classList.remove('hidden');
            }
        },
        
        async sendMessage() {
            const message = this.elements.messageInput.value.trim();
            if (!message || !ChatState.conversationId) return;
            
            try {
                // Add message to UI immediately
                this.addMessage(message, 'user', 'Ви');
                this.elements.messageInput.value = '';
                this.handleChatInput();
                
                const response = await ChatAPI.sendMessage(ChatState.conversationId, message);
                
                if (!response.success) {
                    this.showErrorToast(response.message || 'Помилка відправки повідомлення');
                }
                
            } catch (error) {
                console.error('Failed to send message:', error);
                this.showErrorToast('Помилка відправки повідомлення');
            }
        },
        
        addMessage(text, type, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            
            const avatarDiv = document.createElement('div');
            avatarDiv.className = 'message-avatar';
            avatarDiv.textContent = sender.charAt(0).toUpperCase();
            
            const bubbleDiv = document.createElement('div');
            bubbleDiv.className = 'message-bubble';
            
            const senderSpan = document.createElement('div');
            senderSpan.className = 'message-sender';
            senderSpan.textContent = sender;
            
            const textP = document.createElement('div');
            textP.className = 'message-text';
            textP.textContent = text;
            
            const timeSpan = document.createElement('div');
            timeSpan.className = 'message-time';
            timeSpan.textContent = new Date().toLocaleTimeString('uk-UA', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            
            bubbleDiv.appendChild(senderSpan);
            bubbleDiv.appendChild(textP);
            bubbleDiv.appendChild(timeSpan);
            
            messageDiv.appendChild(avatarDiv);
            messageDiv.appendChild(bubbleDiv);
            
            this.elements.messagesContainer.appendChild(messageDiv);
            this.elements.messagesContainer.scrollTop = this.elements.messagesContainer.scrollHeight;
        },
        
        handleIncomingMessage(message, conversation) {
            if (message.sender_type === 'visitor' || 
                (message.sender_type === 'App\\Models\\User' && message.sender_id === ChatState.getCurrentUserId())) {
                return;
            }
            
            this.addMessage(message.message, 'operator', message.sender_name || 'Оператор');
            
            // Show notification if chat is closed
            if (this.elements.chatWindow.classList.contains('hidden')) {
                this.showNotification();
            }
        },
        
        handleConversationStatusChange(conversation) {
            if (conversation.status === 'closed') {
                this.addMessage('Розмову було закрито оператором', 'system', 'Система');
                this.elements.messageInput.disabled = true;
                this.elements.sendBtn.disabled = true;
            }
        },
        
        async loadHistory() {
            try {
                this.showHistoryLoading(true);
                
                const response = await ChatAPI.getHistory();
                
                if (response.success && response.data.conversations) {
                    this.renderHistory(response.data.conversations);
                } else {
                    this.elements.historyList.innerHTML = '<div style="text-align: center; padding: 40px; color: var(--gray-500);">Історія звернень порожня</div>';
                }
                
            } catch (error) {
                console.error('Failed to load history:', error);
                this.showErrorToast('Помилка завантаження історії');
            } finally {
                this.showHistoryLoading(false);
            }
        },
        
        renderHistory(conversations) {
            if (conversations.length === 0) {
                this.elements.historyList.innerHTML = '<div style="text-align: center; padding: 40px; color: var(--gray-500);">Історія звернень порожня</div>';
                return;
            }
            
            this.elements.historyList.innerHTML = '';
            
            conversations.forEach(conversation => {
                const item = document.createElement('div');
                item.className = 'history-item';
                item.dataset.conversationId = conversation.id;
                
                const clientTypeText = conversation.client_type === 'business' ? 'Бізнес' : 'Персональне';
                const statusText = {
                    waiting: 'Очікує',
                    active: 'Активне',
                    closed: 'Закрите'
                }[conversation.status] || conversation.status;
                
                item.innerHTML = `
                    <div class="history-item-header">
                        <span class="history-item-type ${conversation.client_type}">${clientTypeText}</span>
                        <span class="history-item-date">${new Date(conversation.created_at).toLocaleDateString('uk-UA')}</span>
                    </div>
                    <div class="history-item-preview">${conversation.first_message}</div>
                    <span class="history-item-status ${conversation.status}">${statusText}</span>
                `;
                
                item.addEventListener('click', () => this.openHistoryConversation(conversation));
                this.elements.historyList.appendChild(item);
            });
        },
        
        openHistoryConversation(conversation) {
            ChatState.conversationId = conversation.id;
            ChatState.clientType = conversation.client_type;
            
            // Clear current messages
            this.elements.messagesContainer.innerHTML = '';
            
            // Load conversation messages
            this.loadConversationMessages(conversation.id);
            
            // Update UI
            this.updateChatInfo();
            this.switchScreen('chat');
        },
        
        async loadConversationMessages(conversationId) {
            try {
                const response = await ChatAPI.getMessages(conversationId, ChatState.visitorId);
                
                if (response.success && response.data.messages) {
                    response.data.messages.forEach(message => {
                        let sender = 'Система';
                        let type = 'system';
                        
                        if (message.sender_type === 'visitor' || 
                            (message.sender_type === 'App\\Models\\User' && message.sender_id === ChatState.getCurrentUserId())) {
                            sender = 'Ви';
                            type = 'user';
                        } else if (message.sender_type === 'App\\Models\\User') {
                            sender = message.sender_name || 'Оператор';
                            type = 'operator';
                        }
                        
                        this.addMessage(message.message, type, sender);
                    });
                }
            } catch (error) {
                console.error('Failed to load conversation messages:', error);
                this.showErrorToast('Помилка завантаження повідомлень');
            }
        },
        
        showHistoryLoading(show) {
            const spinner = this.elements.historyList.querySelector('.loading-spinner');
            if (show) {
                if (!spinner) {
                    this.elements.historyList.innerHTML = `
                        <div class="loading-spinner">
                            <div class="spinner"></div>
                            <span>Завантаження...</span>
                        </div>
                    `;
                }
            } else {
                if (spinner) {
                    spinner.remove();
                }
            }
        },
        
        updateConnectionStatus(connected) {
            this.elements.connectionStatus.textContent = connected ? 'Онлайн' : 'Офлайн';
            this.elements.connectionDot.className = `status-dot ${connected ? 'online' : 'offline'}`;
            this.elements.connectionText.textContent = connected ? 'Онлайн' : 'Офлайн';
        },
        
        showNotification(count = 1) {
            this.elements.notificationCount.textContent = count;
            this.elements.notificationBadge.classList.remove('hidden');
        },
        
        showErrorToast(message) {
            this.elements.errorMessage.textContent = message;
            this.elements.errorToast.classList.remove('hidden');
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                this.hideErrorToast();
            }, 5000);
        },
        
        hideErrorToast() {
            this.elements.errorToast.classList.add('hidden');
        },
        
        showModal(title, message, onConfirm) {
            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-message').textContent = message;
            
            const confirmBtn = document.getElementById('modal-confirm');
            const cancelBtn = document.getElementById('modal-cancel');
            
            confirmBtn.onclick = onConfirm;
            cancelBtn.onclick = () => this.hideModal();
            
            this.elements.confirmationModal.classList.remove('hidden');
        },
        
        hideModal() {
            this.elements.confirmationModal.classList.add('hidden');
        }
    };

    // Initialize chat system
    ChatState.init();
    ChatUI.init();
    
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
