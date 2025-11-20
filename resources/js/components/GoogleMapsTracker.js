/**
 * Простой трекер для Google Maps с реактивностью
 * Использует существующую инфраструктуру Vite + Alpine.js
 */
export class GoogleMapsTracker {
    constructor(container, options = {}) {
        this.container = container;
        this.options = {
            apiKey: options.apiKey,
            center: options.center || { lat: 40.7128, lng: -74.0060 },
            zoom: options.zoom || 12,
            markers: options.markers || [],
            routes: options.routes || [],
            showUserLocation: options.showUserLocation || false,
            showDriverTracking: options.showDriverTracking || false,
            orderId: options.orderId,
            vehicleId: options.vehicleId,
            autoUpdate: options.autoUpdate || false,
            updateInterval: options.updateInterval || 30000,
            ...options
        };

        this.map = null;
        this.markers = new Map();
        this.userLocation = null;
        this.driverLocation = null;
        this.updateInterval = null;
        this.eventSource = null;
        this.isTracking = false;
        this.directionsService = null;
        this.directionsRenderer = null;

        this.init();
    }

    /**
     * Инициализация карты
     */
    async init() {
        try {
            // Ждем загрузки Google Maps API
            await this.loadGoogleMapsAPI();
            
            this.initMap();
            this.addMarkers(this.options.markers);
            this.addRoutes(this.options.routes);
            
            if (this.options.showDriverTracking) {
                this.initDriverTracking();
            }

            if (this.options.autoUpdate) {
                this.startTracking();
            }

            this.setupEventListeners();
            this.dispatchEvent('mapLoaded', { map: this.map });
            
        } catch (error) {
            console.error('Failed to initialize Google Maps Tracker:', error);
            this.dispatchEvent('error', { error: error.message });
        }
    }

    /**
     * Загрузка Google Maps API
     */
    loadGoogleMapsAPI() {
        return new Promise((resolve, reject) => {
            if (window.google && window.google.maps) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=${this.options.apiKey}&libraries=geometry,places`;
            script.async = true;
            script.defer = true;
            
            script.onload = () => resolve();
            script.onerror = () => reject(new Error('Failed to load Google Maps API'));
            
            document.head.appendChild(script);
        });
    }

    /**
     * Инициализация карты
     */
    initMap() {
        this.map = new google.maps.Map(this.container.querySelector('#map'), {
            center: this.options.center,
            zoom: this.options.zoom,
            styles: [
                {
                    featureType: 'poi',
                    elementType: 'labels',
                    stylers: [{ visibility: 'off' }]
                }
            ]
        });

        this.directionsService = new google.maps.DirectionsService();
        this.directionsRenderer = new google.maps.DirectionsRenderer({
            suppressMarkers: true,
            polylineOptions: {
                strokeColor: '#304FFF',
                strokeWeight: 4
            }
        });
        this.directionsRenderer.setMap(this.map);
    }

    /**
     * Добавление маркеров
     */
    addMarkers(markersData) {
        markersData.forEach((markerData, index) => {
            const marker = new google.maps.Marker({
                position: { lat: markerData.lat, lng: markerData.lng },
                map: this.map,
                title: markerData.title || `Marker ${index + 1}`,
                icon: markerData.icon || null,
            });

            if (markerData.info) {
                const infoWindow = new google.maps.InfoWindow({
                    content: markerData.info
                });
                
                marker.addListener('click', () => {
                    infoWindow.open(this.map, marker);
                });
            }

            this.markers.set(markerData.id || index, marker);
        });
    }

    /**
     * Добавление маршрутов
     */
    addRoutes(routesData) {
        routesData.forEach((route, index) => {
            if (route.origin && route.destination) {
                const request = {
                    origin: route.origin,
                    destination: route.destination,
                    travelMode: google.maps.TravelMode.DRIVING
                };

                this.directionsService.route(request, (result, status) => {
                    if (status === 'OK') {
                        this.directionsRenderer.setDirections(result);
                    }
                });
            }
        });
    }

    /**
     * Инициализация отслеживания водителя
     */
    initDriverTracking() {
        if (!this.options.orderId) return;

        // Создаем маркер водителя
        this.driverMarker = new google.maps.Marker({
            map: this.map,
            title: 'Driver',
            icon: {
                url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#304FFF"/>
                        <path d="M16 8C18.2 8 20 9.8 20 12C20 14.2 18.2 16 16 16C13.8 16 12 14.2 12 12C12 9.8 13.8 8 16 8ZM16 18C19.3 18 22 20.7 22 24V26H10V24C10 20.7 12.7 18 16 18Z" fill="white"/>
                    </svg>
                `),
                scaledSize: new google.maps.Size(32, 32),
                anchor: new google.maps.Point(16, 16)
            }
        });

        this.markers.set('driver', this.driverMarker);
    }

    /**
     * Получение позиции пользователя
     */
    getUserLocation() {
        if (!this.options.showUserLocation) return;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    this.userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    
                    this.updateUserMarker();
                    this.updateUserAddress();
                    
                    if (this.driverLocation) {
                        this.calculateRoute();
                    }

                    this.dispatchEvent('userLocationUpdated', this.userLocation);
                },
                (error) => {
                    console.error('Error getting user location:', error);
                    this.dispatchEvent('error', { error: 'Unable to get user location' });
                }
            );
        } else {
            this.dispatchEvent('error', { error: 'Geolocation not supported' });
        }
    }

    /**
     * Обновление маркера пользователя
     */
    updateUserMarker() {
        if (!this.userLocation) return;

        let userMarker = this.markers.get('user');
        
        if (!userMarker) {
            userMarker = new google.maps.Marker({
                position: this.userLocation,
                map: this.map,
                title: 'Your Location',
                icon: {
                    url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="16" fill="#4CAF50"/>
                            <path d="M16 8C18.2 8 20 9.8 20 12C20 14.2 18.2 16 16 16C13.8 16 12 14.2 12 12C12 9.8 13.8 8 16 8ZM16 18C19.3 18 22 20.7 22 24V26H10V24C10 20.7 12.7 18 16 18Z" fill="white"/>
                        </svg>
                    `),
                    scaledSize: new google.maps.Size(32, 32),
                    anchor: new google.maps.Point(16, 16)
                }
            });
            this.markers.set('user', userMarker);
        } else {
            userMarker.setPosition(this.userLocation);
        }
    }

    /**
     * Обновление адреса пользователя
     */
    updateUserAddress() {
        if (!this.userLocation) return;

        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: this.userLocation }, (results, status) => {
            if (status === 'OK' && results[0]) {
                const userAddressElement = this.container.querySelector('#user-address');
                if (userAddressElement) {
                    userAddressElement.textContent = results[0].formatted_address;
                }
            }
        });
    }

    /**
     * Получение позиции водителя через API
     */
    async getDriverLocation() {
        if (!this.options.showDriverTracking || !this.options.orderId) return;

        try {
            const response = await fetch(`/api/v1/public/tracking/orders/${this.options.orderId}/driver-location`);
            const data = await response.json();
            
            if (data.success && data.data) {
                this.driverLocation = {
                    lat: parseFloat(data.data.latitude),
                    lng: parseFloat(data.data.longitude)
                };
                
                this.updateDriverMarker();
                this.updateDriverInfo(data.data);
                
                if (this.userLocation) {
                    this.calculateRoute();
                }

                this.dispatchEvent('driverLocationUpdated', data.data);
                return true;
            } else {
                this.updateDriverStatus('inactive', 'Driver location not available');
                return false;
            }
        } catch (error) {
            console.error('Error fetching driver location:', error);
            this.updateDriverStatus('inactive', 'Error loading driver location');
            return false;
        }
    }

    /**
     * Обновление маркера водителя
     */
    updateDriverMarker() {
        if (!this.driverLocation || !this.driverMarker) return;
        this.driverMarker.setPosition(this.driverLocation);
    }

    /**
     * Обновление информации о водителе
     */
    updateDriverInfo(driverData) {
        const driverNameElement = this.container.querySelector('#driver-name');
        const driverAddressElement = this.container.querySelector('#driver-address');
        const driverLastUpdateElement = this.container.querySelector('#driver-last-update');
        
        if (driverNameElement) driverNameElement.textContent = driverData.driver_name || 'Unknown Driver';
        if (driverAddressElement) driverAddressElement.textContent = driverData.address || 'Location not available';
        if (driverLastUpdateElement) driverLastUpdateElement.textContent = new Date(driverData.timestamp).toLocaleTimeString();
        
        const statusDot = this.container.querySelector('.status-dot');
        const statusText = this.container.querySelector('.status-text');
        
        if (statusDot && statusText) {
            if (driverData.is_active) {
                statusDot.className = 'status-dot active';
                statusText.textContent = 'Active';
            } else {
                statusDot.className = 'status-dot inactive';
                statusText.textContent = 'Inactive';
            }
        }
    }

    /**
     * Обновление статуса водителя
     */
    updateDriverStatus(status, message) {
        const statusDot = this.container.querySelector('.status-dot');
        const statusText = this.container.querySelector('.status-text');
        
        if (statusDot && statusText) {
            statusDot.className = `status-dot ${status}`;
            statusText.textContent = message;
        }
    }

    /**
     * Расчет маршрута
     */
    calculateRoute() {
        if (!this.driverLocation || !this.userLocation) return;
        
        const request = {
            origin: this.driverLocation,
            destination: this.userLocation,
            travelMode: google.maps.TravelMode.DRIVING
        };
        
        this.directionsService.route(request, (result, status) => {
            if (status === 'OK') {
                this.directionsRenderer.setDirections(result);
                
                const route = result.routes[0].legs[0];
                const routeDistanceElement = this.container.querySelector('#route-distance');
                const routeTimeElement = this.container.querySelector('#route-time');
                
                if (routeDistanceElement) routeDistanceElement.textContent = route.distance.text;
                if (routeTimeElement) routeTimeElement.textContent = route.duration.text;
            }
        });
    }

    /**
     * Центрирование карты
     */
    centerMap() {
        const bounds = new google.maps.LatLngBounds();
        
        this.markers.forEach(marker => {
            bounds.extend(marker.getPosition());
        });
        
        if (!bounds.isEmpty()) {
            this.map.fitBounds(bounds);
        }
    }

    /**
     * SSE отслеживание
     */
    startSSETracking() {
        if (!this.options.showDriverTracking || !this.options.orderId) return null;

        this.eventSource = new EventSource(`/api/v1/public/sse/orders/${this.options.orderId}/driver-location-ws`);
        
        this.eventSource.onopen = (event) => {
            console.log('SSE connection established');
            this.updateDriverStatus('active', 'Connected');
        };
        
        this.eventSource.addEventListener('driver_location', (event) => {
            const data = JSON.parse(event.data);
            
            this.driverLocation = {
                lat: parseFloat(data.latitude),
                lng: parseFloat(data.longitude)
            };
            
            this.updateDriverMarker();
            this.updateDriverInfo({
                latitude: data.latitude,
                longitude: data.longitude,
                timestamp: data.timestamp,
                driver_name: data.driver_name,
                is_active: data.is_active
            });
            
            if (this.userLocation) {
                this.calculateRoute();
            }

            this.dispatchEvent('driverLocationUpdated', data);
        });
        
        this.eventSource.addEventListener('heartbeat', (event) => {
            console.log('SSE heartbeat received');
        });
        
        this.eventSource.onerror = (event) => {
            console.error('SSE connection error:', event);
            this.updateDriverStatus('inactive', 'Connection lost');
            
            // Fallback на polling
            setTimeout(() => {
                this.getDriverLocation();
                this.startPolling();
            }, 5000);
        };
        
        return this.eventSource;
    }

    /**
     * Polling fallback
     */
    startPolling() {
        if (this.updateInterval) {
            clearInterval(this.updateInterval);
        }
        this.updateInterval = setInterval(() => {
            this.getDriverLocation();
        }, this.options.updateInterval);
    }

    /**
     * Переключение отслеживания
     */
    toggleTracking() {
        const toggleButton = this.container.querySelector('#toggle-tracking');
        const statusSpan = this.container.querySelector('#tracking-status');

        if (!this.isTracking) {
            // Начинаем отслеживание
            this.isTracking = true;
            if (statusSpan) statusSpan.textContent = 'Stop Tracking';
            if (toggleButton) toggleButton.classList.add('active');

            // Пробуем SSE, если не работает - fallback на polling
            try {
                this.eventSource = this.startSSETracking();
                
                setTimeout(() => {
                    if (this.eventSource && this.eventSource.readyState === EventSource.CONNECTING) {
                        this.eventSource.close();
                        this.startPolling();
                    }
                }, 10000);
            } catch (error) {
                console.log('SSE not supported, using polling');
                this.startPolling();
            }
        } else {
            // Останавливаем отслеживание
            this.isTracking = false;
            if (statusSpan) statusSpan.textContent = 'Start Tracking';
            if (toggleButton) toggleButton.classList.remove('active');

            if (this.eventSource) {
                this.eventSource.close();
                this.eventSource = null;
            }

            if (this.updateInterval) {
                clearInterval(this.updateInterval);
                this.updateInterval = null;
            }
        }
    }

    /**
     * Настройка обработчиков событий
     */
    setupEventListeners() {
        // Кнопка получения позиции пользователя
        const getUserLocationButton = this.container.querySelector('#get-user-location');
        if (getUserLocationButton) {
            getUserLocationButton.addEventListener('click', () => {
                this.getUserLocation();
            });
        }

        // Кнопка центрирования карты
        const centerMapButton = this.container.querySelector('#center-map');
        if (centerMapButton) {
            centerMapButton.addEventListener('click', () => {
                this.centerMap();
            });
        }

        // Кнопка переключения отслеживания
        const toggleTrackingButton = this.container.querySelector('#toggle-tracking');
        if (toggleTrackingButton) {
            toggleTrackingButton.addEventListener('click', () => {
                this.toggleTracking();
            });
        }
    }

    /**
     * Отправка кастомных событий
     */
    dispatchEvent(eventName, data) {
        const event = new CustomEvent(eventName, {
            detail: data,
            bubbles: true
        });
        this.container.dispatchEvent(event);
    }

    /**
     * Очистка ресурсов
     */
    destroy() {
        if (this.updateInterval) {
            clearInterval(this.updateInterval);
        }
        if (this.eventSource) {
            this.eventSource.close();
        }
        
        this.markers.forEach(marker => {
            marker.setMap(null);
        });
        this.markers.clear();
        
        this.dispatchEvent('destroyed', {});
    }
} 