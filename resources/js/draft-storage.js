/**
 * Draft Storage Module
 * Автосохранение данных форм создания заказов в localStorage
 */

class DraftStorage {
    constructor() {
        this.storageKey = 'business_order_draft';
        this.autoSaveInterval = 1000; // 1 секунда для быстрого автосохранения
        this.autoSaveTimer = null;
        this.isFormSubmitting = false;
        this.storageAvailable = false;
        
        this.checkStorageAvailability();
        this.init();
    }

    /**
     * Проверить доступность localStorage
     */
    checkStorageAvailability() {
        try {
            const testKey = 'duma_storage_test';
            localStorage.setItem(testKey, 'test');
            localStorage.removeItem(testKey);
            this.storageAvailable = true;
            console.log('DraftStorage: localStorage is available');
        } catch (error) {
            this.storageAvailable = false;
            console.error('DraftStorage: localStorage is not available:', error);
            
            // Показываем предупреждение пользователю
            this.showStorageWarning();
        }
    }

    /**
     * Показать предупреждение о недоступности localStorage
     */
    showStorageWarning() {
        const warning = document.createElement('div');
        warning.className = 'alert alert-warning';
        warning.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
        warning.innerHTML = `
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Draft saving disabled</strong><br>
                    <small>Please enable cookies/localStorage to save form drafts</small>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        document.body.appendChild(warning);
        
        // Автоматически скрыть через 10 секунд
        setTimeout(() => {
            if (warning.parentElement) {
                warning.remove();
            }
        }, 10000);
    }

    init() {
        // Проверяем, что мы на странице создания заказа
        const currentPath = window.location.pathname;
        console.log('DraftStorage: Current path:', currentPath);
        
        if (!currentPath.includes('/business/orders/create')) {
            console.log('DraftStorage: Not on order creation page, skipping initialization');
            return;
        }

        console.log('DraftStorage: Initializing on order creation page');
        console.log('DraftStorage: Storage available:', this.storageAvailable);

        if (!this.storageAvailable) {
            console.log('DraftStorage: Skipping initialization due to unavailable storage');
            return;
        }

        // Добавляем UI для управления черновиками
        this.addDraftManagementUI();
        
        // Настраиваем автосохранение
        this.setupAutoSave();
        
        // Настраиваем очистку при отправке формы
        this.setupFormSubmitHandler();
        
        // Загружаем сохраненные данные с несколькими попытками
        this.loadDraftDataWithRetries();

        // Для create-manual страницы добавляем обработчик для кнопки "Add Another Parcel"
        if (currentPath.includes('create-manual')) {
            this.setupDynamicElementsHandler();
            
            // Добавляем первый parcel автоматически, если его нет
            setTimeout(() => {
                this.ensureInitialParcel();
            }, 1000);
        }
    }

    /**
     * Получить ключ для хранения на основе текущей страницы
     */
    getStorageKey() {
        const path = window.location.pathname;
        if (path.includes('create-manual')) {
            return `${this.storageKey}_manual`;
        }
        return `${this.storageKey}_products`;
    }

    /**
     * Собрать все данные формы
     */
    collectFormData() {
        const formData = {};
        
        // Основные поля формы
        const form = document.querySelector('form');
        if (!form) {
            console.log('DraftStorage: No form found');
            return null;
        }

        // Ищем элементы во всем документе, не только в форме
        const allElements = document.querySelectorAll('input, select, textarea');
        const formElements = form.querySelectorAll('input, select, textarea');
        
        // Используем все элементы документа вместо только элементов формы
        const elementsToProcess = allElements;
        
        let collectedCount = 0;
        elementsToProcess.forEach(element => {
            if (element.name && element.type !== 'submit' && element.type !== 'button' && element.type !== 'hidden') {
                let value;
                
                if (element.type === 'checkbox' || element.type === 'radio') {
                    value = element.checked;
                } else if (element.type === 'select-one' || element.type === 'select-multiple') {
                    // Специальная обработка для select элементов
                    value = element.value;
                } else {
                    value = element.value;
                }
                
                // Сохраняем все значения, даже пустые (для правильного восстановления)
                formData[element.name] = value;
                
                if (value && value !== '' && value !== false) {
                    collectedCount++;
                }
            }
        });

        // Добавляем timestamp
        formData._timestamp = new Date().toISOString();
        formData._page = window.location.pathname;

        return formData;
    }

    /**
     * Сохранить данные в localStorage
     */
    saveDraft() {
        if (!this.storageAvailable || this.isFormSubmitting) {
            return;
        }

        try {
            const formData = this.collectFormData();
            if (!formData) return;
            
            const storageKey = this.getStorageKey();
            localStorage.setItem(storageKey, JSON.stringify(formData));
            this.showDraftSavedIndicator();
        } catch (error) {
            console.warn('DraftStorage: Failed to save draft:', error);
            this.storageAvailable = false;
            this.showStorageWarning();
        }
    }

    /**
     * Загрузить сохраненные данные с несколькими попытками
     */
    loadDraftDataWithRetries() {
        let attempts = 0;
        const maxAttempts = 5;
        const delays = [100, 500, 1000, 2000, 3000]; // Увеличивающиеся задержки

        const tryLoad = () => {
            console.log(`DraftStorage: Loading attempt ${attempts + 1}/${maxAttempts}`);
            
            if (this.loadDraftData()) {
                console.log('DraftStorage: Successfully loaded draft data');
                return;
            }

            attempts++;
            if (attempts < maxAttempts) {
                setTimeout(tryLoad, delays[attempts - 1]);
            } else {
                console.log('DraftStorage: Failed to load draft data after all attempts');
            }
        };

        tryLoad();
    }

    /**
     * Загрузить сохраненные данные
     */
    loadDraftData() {
        if (!this.storageAvailable) {
            console.log('DraftStorage: Storage not available, skipping load');
            return false;
        }

        try {
            const storageKey = this.getStorageKey();
            const savedData = localStorage.getItem(storageKey);
            
            console.log('DraftStorage: Storage key:', storageKey);
            console.log('DraftStorage: Saved data exists:', !!savedData);
            
            if (!savedData) return false;

            const formData = JSON.parse(savedData);
            console.log('DraftStorage: Parsed form data:', formData);
            
            // Проверяем, что данные не слишком старые (24 часа)
            if (formData._timestamp) {
                const savedTime = new Date(formData._timestamp);
                const now = new Date();
                const hoursDiff = (now - savedTime) / (1000 * 60 * 60);
                
                if (hoursDiff > 24) {
                    console.log('DraftStorage: Data too old, clearing');
                    this.clearDraft();
                    return false;
                }
            }

            const restored = this.restoreFormData(formData);
            if (restored) {
                this.showDraftLoadedMessage();
                return true;
            }
            
            return false;
        } catch (error) {
            console.warn('DraftStorage: Failed to load draft:', error);
            this.storageAvailable = false; // Отмечаем, что storage недоступен
            this.showStorageWarning();
            return false;
        }
    }

    /**
     * Восстановить данные в форме
     */
    restoreFormData(formData) {
        console.log('DraftStorage: Restoring form data:', formData);
        
        let restoredCount = 0;
        const totalFields = Object.keys(formData).filter(key => !key.startsWith('_')).length;
        
        Object.keys(formData).forEach(name => {
            if (name.startsWith('_')) return; // Пропускаем служебные поля

            const elements = document.querySelectorAll(`[name="${name}"]`);
            if (elements.length === 0) {
                console.log(`DraftStorage: Element not found for name: ${name}`);
                return;
            }

            elements.forEach(element => {
                try {
                    if (element.type === 'checkbox' || element.type === 'radio') {
                        element.checked = formData[name];
                    } else if (element.type === 'select-one' || element.type === 'select-multiple') {
                        // Специальная обработка для select элементов
                        element.value = formData[name];
                        
                        // Если значение не установилось, попробуем найти опцию по тексту
                        if (element.value !== formData[name] && formData[name]) {
                            const options = element.querySelectorAll('option');
                            options.forEach(option => {
                                if (option.text === formData[name] || option.value === formData[name]) {
                                    option.selected = true;
                                }
                            });
                        }
                    } else {
                        element.value = formData[name];
                    }

                    // Триггерим события для обновления зависимых элементов
                    element.dispatchEvent(new Event('change', { bubbles: true }));
                    element.dispatchEvent(new Event('input', { bubbles: true }));
                    
                    restoredCount++;
                    console.log(`DraftStorage: Restored ${name} = ${formData[name]}`);
                } catch (error) {
                    console.warn(`DraftStorage: Failed to restore value for ${name}:`, error);
                }
            });
        });

        console.log(`DraftStorage: Restored ${restoredCount}/${totalFields} fields`);

        // Дополнительная попытка восстановления через 1 секунду для динамических элементов
        setTimeout(() => {
            this.restoreFormDataSecondPass(formData);
        }, 1000);

        return restoredCount > 0;
    }

    /**
     * Второй проход восстановления данных для элементов, которые могли загрузиться позже
     */
    restoreFormDataSecondPass(formData) {
        Object.keys(formData).forEach(name => {
            if (name.startsWith('_')) return;

            const elements = document.querySelectorAll(`[name="${name}"]`);
            elements.forEach(element => {
                // Восстанавливаем только если элемент пустой
                if (!element.value || (element.type === 'checkbox' && !element.checked)) {
                    try {
                        if (element.type === 'checkbox' || element.type === 'radio') {
                            element.checked = formData[name];
                        } else {
                            element.value = formData[name];
                        }
                        element.dispatchEvent(new Event('change', { bubbles: true }));
                    } catch (error) {
                        // Игнорируем ошибки во втором проходе
                    }
                }
            });
        });
    }

    /**
     * Очистить сохраненные данные
     */
    clearDraft() {
        if (!this.storageAvailable) {
            console.log('DraftStorage: Storage not available, skipping clear');
            return;
        }

        try {
            localStorage.removeItem(this.getStorageKey());
            console.log('DraftStorage: Draft cleared successfully');
        } catch (error) {
            console.warn('DraftStorage: Failed to clear draft:', error);
        }
    }

    /**
     * Показать сообщение об очистке черновика
     */
    showDraftClearedMessage() {
        // Создаем временное уведомление
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            font-size: 14px;
            font-weight: 500;
            animation: slideInRight 0.3s ease-out;
        `;
        notification.textContent = '✓ Draft cleared - form submitted successfully';

        // Добавляем анимацию
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        document.body.appendChild(notification);

        // Убираем уведомление через 3 секунды
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
                if (style.parentNode) {
                    style.parentNode.removeChild(style);
                }
            }, 300);
        }, 3000);
    }

    /**
     * Настроить автосохранение
     */
    setupAutoSave() {
        const form = document.querySelector('form');
        if (!form) {
            console.log('DraftStorage: No form found for auto-save setup');
            return;
        }

        // Проверяем, не настроены ли уже обработчики
        if (form.hasAttribute('data-draft-listeners')) {
            console.log('DraftStorage: Auto-save listeners already set up');
            return;
        }

        console.log('DraftStorage: Setting up auto-save listeners');

        // Сохраняем при изменении любого поля
        form.addEventListener('input', () => {
            this.debouncedSave();
        });

        form.addEventListener('change', () => {
            this.debouncedSave();
        });

        // Также слушаем события на всем документе для динамических элементов
        document.addEventListener('input', (e) => {
            if (e.target.name && (e.target.name.includes('parcels[') || e.target.name.includes('items['))) {
                this.debouncedSave();
            }
        });

        document.addEventListener('change', (e) => {
            if (e.target.name && (e.target.name.includes('parcels[') || e.target.name.includes('items['))) {
                this.debouncedSave();
            }
        });

        // Отмечаем, что обработчики настроены
        form.setAttribute('data-draft-listeners', 'true');

        // Добавляем UI панель управления черновиками (только в продакшене)
        this.addDraftManagementUI();
    }

    /**
     * Отложенное сохранение (debounce)
     */
    debouncedSave() {
        clearTimeout(this.autoSaveTimer);
        this.autoSaveTimer = setTimeout(() => {
            this.saveDraft();
        }, this.autoSaveInterval);
    }


    /**
     * Настроить обработчик отправки формы
     */
    setupFormSubmitHandler() {
        const form = document.querySelector('form');
        if (!form) return;

        // Обработчик отправки формы
        form.addEventListener('submit', (e) => {
            console.log('DraftStorage: Form submit detected, clearing draft');
            this.isFormSubmitting = true;
            
            // Немедленно очищаем черновик
            this.clearDraft();
            
            // Показываем сообщение об очистке
            this.showDraftClearedMessage();
        });

        // Обработчики для всех кнопок отправки
        const submitButtons = form.querySelectorAll('button[type="submit"], input[type="submit"]');
        submitButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                // Проверяем текст кнопки, чтобы убедиться, что это кнопка создания заказа
                const buttonText = button.textContent || button.value || '';
                if (buttonText.toLowerCase().includes('create') || buttonText.toLowerCase().includes('submit')) {
                    console.log('DraftStorage: Create Order button clicked, preparing to clear draft');
                    this.isFormSubmitting = true;
                    
                    // Очищаем черновик при нажатии на кнопку создания заказа
                    setTimeout(() => {
                        this.clearDraft();
                        this.showDraftClearedMessage();
                    }, 50);
                }
            });
        });

        // Дополнительно ищем кнопки по ID или классам
        const additionalButtons = document.querySelectorAll(
            '#create-order-btn, #submit-order-btn, .create-order-btn, .submit-order-btn'
        );
        
        additionalButtons.forEach(button => {
            button.addEventListener('click', () => {
                console.log('DraftStorage: Create/Submit Order button clicked (by ID/class)');
                this.isFormSubmitting = true;
                this.clearDraft();
                this.showDraftClearedMessage();
            });
        });

        // Ищем кнопки по тексту содержимого
        const allButtons = document.querySelectorAll('button');
        allButtons.forEach(button => {
            const buttonText = (button.textContent || button.innerText || '').toLowerCase();
            if (buttonText.includes('create order') || buttonText.includes('submit order')) {
                button.addEventListener('click', () => {
                    console.log('DraftStorage: Create/Submit Order button clicked (by text content)');
                    this.isFormSubmitting = true;
                    this.clearDraft();
                    this.showDraftClearedMessage();
                });
            }
        });
    }

    /**
     * Добавить UI для управления черновиками
     */
    addDraftManagementUI() {
        const form = document.querySelector('form');
        if (!form) return;

        // Создаем панель управления черновиками
        const draftPanel = document.createElement('div');
        draftPanel.className = 'draft-management-panel';
        draftPanel.innerHTML = `
            <div class="alert alert-info" style="margin-bottom: 20px; display: none;" id="draft-status">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-save"></i>
                        <span id="draft-message">Draft saved automatically</span>
                        <small id="draft-timestamp" class="text-muted ml-2"></small>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-outline-primary mr-2" id="restore-draft-btn">
                            <i class="fas fa-upload"></i> Restore Draft
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="clear-draft-btn">
                            <i class="fas fa-trash"></i> Clear Draft
                        </button>
                    </div>
                </div>
            </div>
        `;

        // Вставляем панель в начало формы
        form.insertBefore(draftPanel, form.firstChild);

        // Настраиваем кнопку очистки
        const clearBtn = document.getElementById('clear-draft-btn');
        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (confirm('Are you sure you want to clear the saved draft? This action cannot be undone.')) {
                    this.clearDraft();
                    this.hideDraftStatus();
                    
                    // Очищаем форму
                    form.reset();
                }
            });
        }

        // Настраиваем кнопку восстановления
        const restoreBtn = document.getElementById('restore-draft-btn');
        if (restoreBtn) {
            restoreBtn.addEventListener('click', () => {
                this.loadDraftData();
            });
        }
    }

    /**
     * Показать индикатор сохранения
     */
    showDraftSavedIndicator() {
        const statusPanel = document.getElementById('draft-status');
        const message = document.getElementById('draft-message');
        const timestamp = document.getElementById('draft-timestamp');
        
        if (statusPanel && message && timestamp) {
            message.textContent = 'Draft saved automatically';
            timestamp.textContent = `Last saved: ${new Date().toLocaleTimeString()}`;
            statusPanel.style.display = 'block';
            statusPanel.className = 'alert alert-success';
            
            // Возвращаем к обычному виду через 3 секунды
            setTimeout(() => {
                statusPanel.className = 'alert alert-info';
            }, 3000);
        }
    }

    /**
     * Показать сообщение о загрузке черновика
     */
    showDraftLoadedMessage() {
        const statusPanel = document.getElementById('draft-status');
        const message = document.getElementById('draft-message');
        const timestamp = document.getElementById('draft-timestamp');
        
        if (statusPanel && message && timestamp) {
            message.innerHTML = '<i class="fas fa-upload"></i> Draft data loaded from previous session';
            timestamp.textContent = '';
            statusPanel.style.display = 'block';
            statusPanel.className = 'alert alert-warning';
            
            // Возвращаем к обычному виду через 5 секунд
            setTimeout(() => {
                statusPanel.className = 'alert alert-info';
                message.textContent = 'Draft saved automatically';
            }, 5000);
        }
    }

    /**
     * Скрыть панель статуса
     */
    hideDraftStatus() {
        const statusPanel = document.getElementById('draft-status');
        if (statusPanel) {
            statusPanel.style.display = 'none';
        }
    }

    /**
     * Проверить, есть ли сохраненный черновик
     */
    hasDraft() {
        try {
            const savedData = localStorage.getItem(this.getStorageKey());
            return savedData !== null;
        } catch (error) {
            return false;
        }
    }

    /**
     * Получить информацию о черновике
     */
    getDraftInfo() {
        try {
            const savedData = localStorage.getItem(this.getStorageKey());
            if (!savedData) return null;

            const formData = JSON.parse(savedData);
            return {
                timestamp: formData._timestamp,
                page: formData._page,
                fieldsCount: Object.keys(formData).filter(key => !key.startsWith('_')).length
            };
        } catch (error) {
            return null;
        }
    }

    /**
     * Настроить обработчики для динамических элементов
     */
    setupDynamicElementsHandler() {
        // Наблюдаем за изменениями в DOM для новых элементов
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach((node) => {
                        if (node.nodeType === Node.ELEMENT_NODE) {
                            // Если добавлен новый parcel или item, пытаемся восстановить данные
                            const inputs = node.querySelectorAll('input, select, textarea');
                            if (inputs.length > 0) {
                                setTimeout(() => {
                                    this.tryRestoreForNewElements();
                                }, 100);
                            }
                        }
                    });
                }
            });
        });

        // Начинаем наблюдение за формой
        const form = document.querySelector('form');
        if (form) {
            observer.observe(form, {
                childList: true,
                subtree: true
            });
        }
    }

    /**
     * Попытаться восстановить данные для новых элементов
     */
    tryRestoreForNewElements() {
        try {
            const savedData = localStorage.getItem(this.getStorageKey());
            if (!savedData) return;

            const formData = JSON.parse(savedData);
            this.restoreFormDataSecondPass(formData);
        } catch (error) {
            console.warn('Failed to restore data for new elements:', error);
        }
    }

    /**
     * Убедиться, что есть хотя бы один parcel для заполнения
     */
    ensureInitialParcel() {
        const addParcelBtn = document.getElementById('add-parcel-btn');
        const parcelsContainer = document.getElementById('parcels-container');
        
        console.log('DraftStorage: Checking for initial parcel');
        console.log('DraftStorage: Add parcel button found:', !!addParcelBtn);
        console.log('DraftStorage: Parcels container found:', !!parcelsContainer);
        
        if (addParcelBtn && parcelsContainer) {
            const existingParcels = parcelsContainer.children.length;
            console.log(`DraftStorage: Found ${existingParcels} existing parcels`);
            
            if (existingParcels === 0) {
                console.log('DraftStorage: Adding initial parcel');
                addParcelBtn.click();
                
                // Перенастраиваем автосохранение после добавления parcel
                setTimeout(() => {
                    this.setupAutoSave();
                }, 500);
            }
        }
    }
}

// Инициализируем модуль при загрузке DOM
document.addEventListener('DOMContentLoaded', () => {
    window.draftStorage = new DraftStorage();
});

// Экспортируем для использования в других модулях
export default DraftStorage;
