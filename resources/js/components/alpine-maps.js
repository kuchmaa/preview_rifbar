import { GoogleMapsTracker } from './GoogleMapsTracker.js';

/**
 * Alpine.js компонент для Google Maps
 * Использует существующую инфраструктуру Alpine.js
 */
export function createMapsComponent() {
    return {
        // Состояние компонента
        tracker: null,
        isLoading: true,
        error: null,
        userLocation: null,
        driverLocation: null,
        isTracking: false,

        // Конфигурация
        config: {
            apiKey: '',
            center: { lat: 40.7128, lng: -74.0060 },
            zoom: 12,
            markers: [],
            routes: [],
            showUserLocation: false,
            showDriverTracking: false,
            orderId: null,
            vehicleId: null,
            autoUpdate: false,
            updateInterval: 30000,
        },

        /**
         * Инициализация компонента
         */
        init() {
            // Получаем конфигурацию из data-атрибутов
            this.config = {
                apiKey: this.$el.dataset.apiKey || '',
                center: JSON.parse(this.$el.dataset.center || '{"lat": 40.7128, "lng": -74.0060}'),
                zoom: parseInt(this.$el.dataset.zoom || '12'),
                markers: JSON.parse(this.$el.dataset.markers || '[]'),
                routes: JSON.parse(this.$el.dataset.routes || '[]'),
                showUserLocation: this.$el.dataset.showUserLocation === 'true',
                showDriverTracking: this.$el.dataset.showDriverTracking === 'true',
                orderId: this.$el.dataset.orderId || null,
                vehicleId: this.$el.dataset.vehicleId || null,
                autoUpdate: this.$el.dataset.autoUpdate === 'true',
                updateInterval: parseInt(this.$el.dataset.updateInterval || '30000'),
            };

            // Проверяем обязательные параметры
            if (!this.config.apiKey) {
                this.error = 'Google Maps API key is required';
                this.isLoading = false;
                return;
            }

            // Инициализируем трекер
            this.initTracker();
        },

        /**
         * Инициализация трекера
         */
        async initTracker() {
            try {
                this.isLoading = true;
                this.error = null;

                // Создаем трекер
                this.tracker = new GoogleMapsTracker(this.$el, this.config);

                // Подписываемся на события трекера
                this.setupEventListeners();

                this.isLoading = false;
            } catch (error) {
                this.error = error.message;
                this.isLoading = false;
                console.error('Failed to initialize maps tracker:', error);
            }
        },

        /**
         * Настройка обработчиков событий
         */
        setupEventListeners() {
            if (!this.tracker) return;

            // Событие загрузки карты
            this.$el.addEventListener('mapLoaded', (event) => {
                console.log('Map loaded successfully');
                this.isLoading = false;
            });

            // Событие обновления позиции водителя
            this.$el.addEventListener('driverLocationUpdated', (event) => {
                this.driverLocation = event.detail;
                this.$dispatch('driver-location-updated', event.detail);
            });

            // Событие обновления позиции пользователя
            this.$el.addEventListener('userLocationUpdated', (event) => {
                this.userLocation = event.detail;
                this.$dispatch('user-location-updated', event.detail);
            });

            // Событие ошибки
            this.$el.addEventListener('error', (event) => {
                this.error = event.detail.error;
                this.$dispatch('maps-error', event.detail);
            });

            // Событие уничтожения
            this.$el.addEventListener('destroyed', (event) => {
                this.tracker = null;
                this.$dispatch('maps-destroyed');
            });
        },

        /**
         * Получение позиции пользователя
         */
        getUserLocation() {
            if (this.tracker) {
                this.tracker.getUserLocation();
            }
        },

        /**
         * Центрирование карты
         */
        centerMap() {
            if (this.tracker) {
                this.tracker.centerMap();
            }
        },

        /**
         * Переключение отслеживания
         */
        toggleTracking() {
            if (this.tracker) {
                this.tracker.toggleTracking();
                this.isTracking = !this.isTracking;
            }
        },

        /**
         * Добавление маркера
         */
        addMarker(markerData) {
            if (this.tracker) {
                this.tracker.addMarkers([markerData]);
            }
        },

        /**
         * Удаление маркера
         */
        removeMarker(markerId) {
            if (this.tracker) {
                const marker = this.tracker.markers.get(markerId);
                if (marker) {
                    marker.setMap(null);
                    this.tracker.markers.delete(markerId);
                }
            }
        },

        /**
         * Обновление маркера
         */
        updateMarker(markerId, newPosition) {
            if (this.tracker) {
                const marker = this.tracker.markers.get(markerId);
                if (marker) {
                    marker.setPosition(newPosition);
                }
            }
        },

        /**
         * Очистка ресурсов
         */
        destroy() {
            if (this.tracker) {
                this.tracker.destroy();
                this.tracker = null;
            }
        },

        /**
         * Получение текущего состояния
         */
        getState() {
            return {
                isLoading: this.isLoading,
                error: this.error,
                userLocation: this.userLocation,
                driverLocation: this.driverLocation,
                isTracking: this.isTracking,
                markersCount: this.tracker ? this.tracker.markers.size : 0,
            };
        },
    };
}

/**
 * Глобальная функция для создания компонента карты
 * Используется в Blade шаблонах
 */
window.createGoogleMapsComponent = createMapsComponent; 