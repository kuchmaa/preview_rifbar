{{-- Simple Chat Widget for Testing --}}
<div id="simple-chat-widget" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    {{-- Chat Toggle Button --}}
    <button id="chat-toggle-btn" style="
        background: linear-gradient(135deg, #4A90E2, #7B68EE);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 15px 20px;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(74, 144, 226, 0.3);
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    ">
        <i class="fas fa-comments" style="font-size: 18px;"></i>
        <span>Онлайн-чат</span>
    </button>

    {{-- Chat Window --}}
    <div id="chat-window" style="
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 350px;
        height: 500px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        display: none;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    ">
        {{-- Header --}}
        <div style="
            background: linear-gradient(135deg, #4A90E2, #7B68EE);
            color: white;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        ">
            <div style="display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-comments" style="font-size: 20px;"></i>
                <div>
                    <h3 style="margin: 0; font-size: 16px; font-weight: 600;">Онлайн-чат</h3>
                    <span style="font-size: 12px; opacity: 0.9;">Підключено</span>
                </div>
            </div>
            <button id="close-chat" style="
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
            ">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Content --}}
        <div style="flex: 1; padding: 20px; display: flex; flex-direction: column;">
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #4A90E2, #7B68EE);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 16px;
                    color: white;
                ">
                    <i class="fas fa-headset" style="font-size: 24px;"></i>
                </div>
                <h2 style="margin: 0 0 8px; font-size: 18px; color: #1a202c;">Вітаємо!</h2>
                <p style="margin: 0; color: #718096; font-size: 14px;">Оберіть тип звернення</p>
            </div>

            {{-- Client Type Selection --}}
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 12px;">
                    Тип клієнта:
                </label>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button class="client-type-btn" data-type="personal" style="
                        background: white;
                        border: 2px solid #e5e7eb;
                        border-radius: 12px;
                        padding: 12px 16px;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        text-align: left;
                        transition: all 0.3s ease;
                        width: 100%;
                    ">
                        <div style="
                            width: 40px;
                            height: 40px;
                            background: linear-gradient(135deg, #10B981, #059669);
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                        ">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 4px; font-size: 14px; font-weight: 600; color: #1f2937;">Персональний</h4>
                            <p style="margin: 0; font-size: 12px; color: #6b7280;">Індивідуальні відправлення</p>
                        </div>
                    </button>

                    <button class="client-type-btn" data-type="business" style="
                        background: white;
                        border: 2px solid #e5e7eb;
                        border-radius: 12px;
                        padding: 12px 16px;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        text-align: left;
                        transition: all 0.3s ease;
                        width: 100%;
                    ">
                        <div style="
                            width: 40px;
                            height: 40px;
                            background: linear-gradient(135deg, #7B68EE, #6d28d9);
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                        ">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 4px; font-size: 14px; font-weight: 600; color: #1f2937;">Бізнес</h4>
                            <p style="margin: 0; font-size: 12px; color: #6b7280;">Корпоративні замовлення</p>
                        </div>
                    </button>
                </div>
            </div>

            {{-- Message Input --}}
            <div style="margin-top: auto;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                    Ваше повідомлення:
                </label>
                <div style="position: relative;">
                    <textarea id="message-input" placeholder="Опишіть вашу проблему..." style="
                        width: 100%;
                        padding: 12px;
                        border: 2px solid #d1d5db;
                        border-radius: 8px;
                        font-size: 14px;
                        font-family: inherit;
                        resize: vertical;
                        min-height: 80px;
                        box-sizing: border-box;
                    "></textarea>
                    <button id="start-chat" style="
                        background: #4A90E2;
                        color: white;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 16px;
                        cursor: pointer;
                        font-weight: 500;
                        margin-top: 8px;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                    ">
                        <i class="fas fa-paper-plane"></i>
                        <span>Розпочати чат</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Simple Chat Widget Loaded');
    
    const toggleBtn = document.getElementById('chat-toggle-btn');
    const chatWindow = document.getElementById('chat-window');
    const closeBtn = document.getElementById('close-chat');
    const clientTypeBtns = document.querySelectorAll('.client-type-btn');
    const messageInput = document.getElementById('message-input');
    const startChatBtn = document.getElementById('start-chat');
    
    let selectedClientType = null;
    
    // Toggle chat window
    toggleBtn.addEventListener('click', function() {
        if (chatWindow.style.display === 'none' || chatWindow.style.display === '') {
            chatWindow.style.display = 'flex';
            console.log('Chat opened');
        } else {
            chatWindow.style.display = 'none';
            console.log('Chat closed');
        }
    });
    
    // Close chat
    closeBtn.addEventListener('click', function() {
        chatWindow.style.display = 'none';
        console.log('Chat closed via close button');
    });
    
    // Client type selection
    clientTypeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove selection from all buttons
            clientTypeBtns.forEach(b => {
                b.style.borderColor = '#e5e7eb';
                b.style.backgroundColor = 'white';
            });
            
            // Select current button
            this.style.borderColor = '#4A90E2';
            this.style.backgroundColor = 'rgba(74, 144, 226, 0.05)';
            
            selectedClientType = this.dataset.type;
            console.log('Selected client type:', selectedClientType);
            
            validateForm();
        });
    });
    
    // Message input
    messageInput.addEventListener('input', validateForm);
    
    // Start chat
    startChatBtn.addEventListener('click', function() {
        if (!selectedClientType || !messageInput.value.trim()) {
            alert('Будь ласка, оберіть тип клієнта та введіть повідомлення');
            return;
        }
        
        console.log('Starting chat...', {
            clientType: selectedClientType,
            message: messageInput.value.trim()
        });
        
        // Here you would normally send the data to your API
        alert(`Чат розпочато!\nТип: ${selectedClientType}\nПовідомлення: ${messageInput.value.trim()}`);
    });
    
    function validateForm() {
        const hasClientType = selectedClientType !== null;
        const hasMessage = messageInput.value.trim().length > 0;
        
        if (hasClientType && hasMessage) {
            startChatBtn.style.opacity = '1';
            startChatBtn.style.cursor = 'pointer';
            startChatBtn.disabled = false;
        } else {
            startChatBtn.style.opacity = '0.5';
            startChatBtn.style.cursor = 'not-allowed';
            startChatBtn.disabled = true;
        }
    }
    
    // Initial validation
    validateForm();
    
    // Hover effects for toggle button
    toggleBtn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
        this.style.boxShadow = '0 8px 30px rgba(74, 144, 226, 0.4)';
    });
    
    toggleBtn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = '0 4px 20px rgba(74, 144, 226, 0.3)';
    });
    
    // Hover effects for client type buttons
    clientTypeBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.borderColor !== 'rgb(74, 144, 226)') {
                this.style.borderColor = '#9ca3af';
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.borderColor !== 'rgb(74, 144, 226)') {
                this.style.borderColor = '#e5e7eb';
                this.style.transform = 'translateY(0)';
            }
        });
    });
});
</script>

{{-- Load Font Awesome if not already loaded --}}
@if(!isset($fontAwesomeLoaded))
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @php $fontAwesomeLoaded = true; @endphp
@endif
