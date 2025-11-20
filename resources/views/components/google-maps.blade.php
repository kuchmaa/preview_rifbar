@props([
    'apiKey',
    'center' => ['lat' => 40.7128, 'lng' => -74.0060], // NYC по умолчанию
    'zoom' => 12,
    'markers' => [],
    'routes' => [],
    'showUserLocation' => false,
    'showDriverTracking' => false,
    'orderId' => null,
    'vehicleId' => null,
    'height' => '500px',
    'width' => '100%',
    'showControls' => true,
    'showInfoPanels' => true,
    'autoUpdate' => false,
    'updateInterval' => 30000,
    'waypoints' => [],
    'routeGeometry' => null,
    'showLegend' => false,
    'showRouteInfo' => false,
])

<div id="google-maps-component" class="google-maps-container" style="width: {{ $width }}; height: {{ $height }};">
    @if($showControls)
        <div class="map-controls">
            @if($showUserLocation)
                <button id="get-user-location" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" fill="currentColor"/>
                    </svg>
                    My Location
                </button>
            @endif
            
            <button id="center-map" class="btn btn-secondary">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 2L2 8l6 6 6-6-6-6z" fill="currentColor"/>
                </svg>
                Center Map
            </button>
            
            @if($showDriverTracking)
                <button id="toggle-tracking" class="btn btn-info">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" fill="currentColor"/>
                    </svg>
                    <span id="tracking-status">Start Tracking</span>
                </button>
            @endif
        </div>
    @endif

    <div id="map" class="google-map"></div>

    @if($showInfoPanels)
        <div class="map-info-panels">
            @if($showDriverTracking)
                <div id="driver-info" class="info-card">
                    <h4>Driver Information</h4>
                    <div id="driver-status" class="status-indicator">
                        <span class="status-dot"></span>
                        <span class="status-text">Loading...</span>
                    </div>
                    <div id="driver-details" class="details">
                        <p><strong>Driver:</strong> <span id="driver-name">-</span></p>
                        <p><strong>Location:</strong> <span id="driver-address">-</span></p>
                        <p><strong>Last Update:</strong> <span id="driver-last-update">-</span></p>
                    </div>
                </div>
            @endif

            @if($showUserLocation)
                <div id="route-info" class="info-card">
                    <h4>Route Information</h4>
                    <div id="route-details" class="details">
                        <p><strong>Distance:</strong> <span id="route-distance">-</span></p>
                        <p><strong>Estimated Time:</strong> <span id="route-time">-</span></p>
                        <p><strong>Your Location:</strong> <span id="user-address">-</span></p>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

<style>
    .google-maps-container {
        width: 100%;
        height: 100%;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .custom-marker {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .marker-label {
        background: #304FFF;
        color: white;
        padding: 2px 6px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: bold;
        margin-bottom: 2px;
        white-space: nowrap;
    }

    .marker-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .default-marker {
        width: 20px;
        height: 20px;
        background-color: #304FFF;
        border: 2px solid white;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .map-info-window {
        padding: 8px;
        font-family: Arial, sans-serif;
    }

    .map-info-window strong {
        color: #304FFF;
    }

.google-maps-container {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.map-controls {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1000;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.btn-primary {
    background-color: #304FFF;
    color: white;
}

.btn-primary:hover {
    background-color: #1a3fd8;
}

.btn-secondary {
    background-color: white;
    color: #333;
    border: 1px solid #ddd;
}

.btn-secondary:hover {
    background-color: #f5f5f5;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-info.active {
    background-color: #dc3545;
}

.google-map {
    width: 100%;
    height: 100%;
    background-color: #f0f0f0;
}

.map-info-panels {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 300px;
}

.info-card {
    background: white;
    border-radius: 8px;
    padding: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.info-card h4 {
    margin: 0 0 12px 0;
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.status-indicator {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #ccc;
}

.status-dot.active {
    background-color: #4CAF50;
    animation: pulse 2s infinite;
}

.status-dot.inactive {
    background-color: #f44336;
}

.details p {
    margin: 4px 0;
    font-size: 14px;
    color: #666;
}

.details strong {
    color: #333;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

@media (max-width: 768px) {
    .map-info-panels {
        position: relative;
        top: auto;
        right: auto;
        margin-top: 10px;
        max-width: none;
    }
    
    .map-controls {
        flex-direction: column;
        gap: 4px;
    }
    
    .btn {
        font-size: 12px;
        padding: 6px 8px;
    }
}
</style>

<script>
// Загружаем Google Maps API
function loadGoogleMapsAPI() {
    return new Promise((resolve, reject) => {
        if (window.google && window.google.maps) {
            resolve();
            return;
        }

        const script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&libraries=geometry,places&language=en&loading=async&callback=initGoogleMaps';
        script.async = true;
        script.defer = true;
        
        window.initGoogleMaps = function() {
            resolve();
        };
        
        script.onerror = reject;
        document.head.appendChild(script);
    });
}

// Основной код компонента
loadGoogleMapsAPI().then(() => {
    // Конфигурация компонента
    const config = {
        apiKey: '{{ $apiKey }}',
        center: @json($center),
        zoom: {{ $zoom }},
        markers: @json($markers),
        routes: @json($routes),
        showUserLocation: {{ $showUserLocation ? 'true' : 'false' }},
        showDriverTracking: {{ $showDriverTracking ? 'true' : 'false' }},
        orderId: {{ $orderId ?? 'null' }},
        vehicleId: {{ $vehicleId ?? 'null' }},
        autoUpdate: {{ $autoUpdate ? 'true' : 'false' }},
        waypoints: @json($waypoints ?? []),
        routeGeometry: @json($routeGeometry ?? null),
        showLegend: {{ $showLegend ? 'true' : 'false' }},
        showRouteInfo: {{ $showRouteInfo ? 'true' : 'false' }},
    };

    // Глобальные переменные
    let map, directionsService, directionsRenderer;
    let markers = [];
    let userLocation = null;
    let driverLocation = null;
    let updateInterval = null;
    let eventSource = null;
    let isTracking = false;

    // Инициализация карты
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: config.center,
            zoom: config.zoom,
            styles: [
                {
                    featureType: 'poi',
                    elementType: 'labels',
                    stylers: [{ visibility: 'off' }]
                }
            ]
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({
            suppressMarkers: true,
            polylineOptions: {
                strokeColor: '#304FFF',
                strokeWeight: 4
            }
        });
        directionsRenderer.setMap(map);

        // Добавляем начальные маркеры
        addMarkers(config.markers);
        
        // Добавляем маршруты
        if (config.routes && config.routes.length > 0) {
            addRoutes(config.routes);
        }
    }

    // Добавляем маркеры на карту
    function addMarkers(markersData) {
        if (!markersData || !Array.isArray(markersData)) {
            console.log('No markers data provided or invalid format');
            return;
        }

        markersData.forEach((markerData, index) => {
            const position = new google.maps.LatLng(
                markerData.position.lat,
                markerData.position.lng
            );

            // Используем обычные маркеры для стабильности
            const marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markerData.title || `Marker ${index + 1}`,
                icon: markerData.icon || null,
                label: markerData.label || null
            });

            // Добавляем обработчик клика
            marker.addListener('click', () => {
                if (markerData.title) {
                    const infoWindow = new google.maps.InfoWindow({
                        content: `<div class="map-info-window"><strong>${markerData.title}</strong></div>`
                    });
                    infoWindow.open(map, marker);
                }
            });

            markers.push(marker);
        });
    }

    // Создаем содержимое для маркера
    function createMarkerContent(markerData) {
        try {
            const container = document.createElement('div');
            container.className = 'custom-marker';
            
            if (markerData.label) {
                const label = document.createElement('div');
                label.className = 'marker-label';
                label.textContent = markerData.label;
                container.appendChild(label);
            }
            
            if (markerData.icon && markerData.icon !== 'http://maps.google.com/mapfiles/ms/icons/red-dot.png') {
                const icon = document.createElement('img');
                icon.src = markerData.icon;
                icon.className = 'marker-icon';
                container.appendChild(icon);
            } else {
                // Создаем стандартный маркер с цветом
                const defaultMarker = document.createElement('div');
                defaultMarker.className = 'default-marker';
                defaultMarker.style.cssText = `
                    width: 20px;
                    height: 20px;
                    background-color: #304FFF;
                    border: 2px solid white;
                    border-radius: 50%;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
                `;
                container.appendChild(defaultMarker);
            }
            
            return container;
        } catch (error) {
            console.error('Error creating marker content:', error);
            // Fallback - возвращаем простой div
            const fallback = document.createElement('div');
            fallback.className = 'fallback-marker';
            fallback.style.cssText = `
                width: 20px;
                height: 20px;
                background-color: #304FFF;
                border: 2px solid white;
                border-radius: 50%;
            `;
            return fallback;
        }
    }

    // Добавление маршрутов
    function addRoutes(routesData) {
        if (!routesData || !Array.isArray(routesData)) {
            console.log('No routes data provided or invalid format');
            return;
        }
        
        routesData.forEach((route, index) => {
            if (route.origin && route.destination) {
                const request = {
                    origin: route.origin,
                    destination: route.destination,
                    travelMode: google.maps.TravelMode.DRIVING
                };

                directionsService.route(request, function(result, status) {
                    if (status === 'OK') {
                        directionsRenderer.setDirections(result);
                    }
                });
            }
        });
    }

    // Получение позиции пользователя
    function getUserLocation() {
        if (!config.showUserLocation) return;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    
                    // Создаем маркер пользователя
                    const userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
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

                    markers.push(userMarker);
                    updateUserAddress(userLocation);
                    
                    if (driverLocation) {
                        calculateRoute();
                    }
                },
                function(error) {
                    console.error('Error getting user location:', error);
                    showError('Unable to get your location. Please check your browser settings.');
                }
            );
        } else {
            showError('Geolocation is not supported by this browser.');
        }
    }

    // Обновление адреса пользователя
    function updateUserAddress(location) {
        if (!config.showUserLocation) return;

        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: location }, function(results, status) {
            if (status === 'OK' && results[0]) {
                const userAddressElement = document.getElementById('user-address');
                if (userAddressElement) {
                    userAddressElement.textContent = results[0].formatted_address;
                }
            }
        });
    }

    // Получение позиции водителя через API
    async function getDriverLocation() {
        if (!config.showDriverTracking || !config.orderId) return;

        try {
            const response = await fetch(`/api/v1/public/tracking/orders/${config.orderId}/driver-location`);
            const data = await response.json();
            
            if (data.success && data.data) {
                driverLocation = {
                    lat: parseFloat(data.data.latitude),
                    lng: parseFloat(data.data.longitude)
                };
                
                updateDriverMarker(driverLocation);
                updateDriverInfo(data.data);
                
                if (userLocation) {
                    calculateRoute();
                }
                
                return true;
            } else {
                updateDriverStatus('inactive', 'Driver location not available');
                return false;
            }
        } catch (error) {
            console.error('Error fetching driver location:', error);
            updateDriverStatus('inactive', 'Error loading driver location');
            return false;
        }
    }

    // Обновление маркера водителя
    function updateDriverMarker(location) {
        let driverMarker = markers.find(m => m.title === 'Driver');
        
        if (!driverMarker) {
            driverMarker = new google.maps.Marker({
                position: location,
                map: map,
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
            markers.push(driverMarker);
        } else {
            driverMarker.setPosition(location);
        }
    }

    // Обновление информации о водителе
    function updateDriverInfo(driverData) {
        if (!config.showDriverTracking) return;

        const driverNameElement = document.getElementById('driver-name');
        const driverAddressElement = document.getElementById('driver-address');
        const driverLastUpdateElement = document.getElementById('driver-last-update');
        
        if (driverNameElement) driverNameElement.textContent = driverData.driver_name || 'Unknown Driver';
        if (driverAddressElement) driverAddressElement.textContent = driverData.address || 'Location not available';
        if (driverLastUpdateElement) driverLastUpdateElement.textContent = new Date(driverData.timestamp).toLocaleTimeString();
        
        const statusDot = document.querySelector('.status-dot');
        const statusText = document.querySelector('.status-text');
        
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

    // Обновление статуса водителя
    function updateDriverStatus(status, message) {
        if (!config.showDriverTracking) return;

        const statusDot = document.querySelector('.status-dot');
        const statusText = document.querySelector('.status-text');
        
        if (statusDot && statusText) {
            statusDot.className = `status-dot ${status}`;
            statusText.textContent = message;
        }
    }

    // Расчет маршрута
    function calculateRoute() {
        if (!driverLocation || !userLocation || !config.showUserLocation) return;
        
        const request = {
            origin: driverLocation,
            destination: userLocation,
            travelMode: google.maps.TravelMode.DRIVING
        };
        
        directionsService.route(request, function(result, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(result);
                
                const route = result.routes[0].legs[0];
                const routeDistanceElement = document.getElementById('route-distance');
                const routeTimeElement = document.getElementById('route-time');
                
                if (routeDistanceElement) routeDistanceElement.textContent = route.distance.text;
                if (routeTimeElement) routeTimeElement.textContent = route.duration.text;
            }
        });
    }

    // Центрирование карты
    function centerMap() {
        const bounds = new google.maps.LatLngBounds();
        
        markers.forEach(marker => {
            bounds.extend(marker.getPosition());
        });
        
        if (!bounds.isEmpty()) {
            map.fitBounds(bounds);
        }
    }

    // SSE отслеживание
    function startSSETracking() {
        if (!config.showDriverTracking || !config.orderId) return null;

        const eventSource = new EventSource(`/api/v1/public/sse/orders/${config.orderId}/driver-location-ws`);
        
        eventSource.onopen = function(event) {
            console.log('SSE connection established');
            updateDriverStatus('active', 'Connected');
        };
        
        eventSource.addEventListener('driver_location', function(event) {
            const data = JSON.parse(event.data);
            
            driverLocation = {
                lat: parseFloat(data.latitude),
                lng: parseFloat(data.longitude)
            };
            
            updateDriverMarker(driverLocation);
            updateDriverInfo({
                latitude: data.latitude,
                longitude: data.longitude,
                timestamp: data.timestamp,
                driver_name: data.driver_name,
                is_active: data.is_active
            });
            
            if (userLocation) {
                calculateRoute();
            }
        });
        
        eventSource.addEventListener('heartbeat', function(event) {
            console.log('SSE heartbeat received');
        });
        
        eventSource.onerror = function(event) {
            console.error('SSE connection error:', event);
            updateDriverStatus('inactive', 'Connection lost');
            
            // Fallback на polling
            setTimeout(() => {
                getDriverLocation();
                startPolling();
            }, 5000);
        };
        
        return eventSource;
    }

    // Polling fallback
    function startPolling() {
        if (updateInterval) {
            clearInterval(updateInterval);
        }
        updateInterval = setInterval(getDriverLocation, config.updateInterval);
    }

    // Переключение отслеживания
    function toggleTracking() {
        if (!config.showDriverTracking) return;

        const toggleButton = document.getElementById('toggle-tracking');
        const statusSpan = document.getElementById('tracking-status');

        if (!isTracking) {
            // Начинаем отслеживание
            isTracking = true;
            if (statusSpan) statusSpan.textContent = 'Stop Tracking';
            if (toggleButton) toggleButton.classList.add('active');

            // Пробуем SSE, если не работает - fallback на polling
            try {
                eventSource = startSSETracking();
                
                setTimeout(() => {
                    if (eventSource && eventSource.readyState === EventSource.CONNECTING) {
                        eventSource.close();
                        startPolling();
                    }
                }, 10000);
            } catch (error) {
                console.log('SSE not supported, using polling');
                startPolling();
            }
        } else {
            // Останавливаем отслеживание
            isTracking = false;
            if (statusSpan) statusSpan.textContent = 'Start Tracking';
            if (toggleButton) toggleButton.classList.remove('active');

            if (eventSource) {
                eventSource.close();
                eventSource = null;
            }

            if (updateInterval) {
                clearInterval(updateInterval);
                updateInterval = null;
            }
        }
    }

    // Показ ошибки
    function showError(message) {
        console.error(message);
        // Можно добавить уведомление пользователю
    }

    // Обработчики событий
    if (config.showUserLocation) {
        const getUserLocationButton = document.getElementById('get-user-location');
        if (getUserLocationButton) {
            getUserLocationButton.addEventListener('click', getUserLocation);
        }
    }

    const centerMapButton = document.getElementById('center-map');
    if (centerMapButton) {
        centerMapButton.addEventListener('click', centerMap);
    }

    if (config.showDriverTracking) {
        const toggleTrackingButton = document.getElementById('toggle-tracking');
        if (toggleTrackingButton) {
            toggleTrackingButton.addEventListener('click', toggleTracking);
        }
    }

    // Инициализация
    function init() {
        initMap();
        
        if (config.showDriverTracking) {
            getDriverLocation();
        }
        
        if (config.autoUpdate && config.showDriverTracking) {
            toggleTracking();
        }
    }

    // Очистка при размонтировании
    function cleanup() {
        if (updateInterval) {
            clearInterval(updateInterval);
        }
        if (eventSource) {
            eventSource.close();
        }
    }

    // Запуск
    init();

    // Очистка при уходе со страницы
    window.addEventListener('beforeunload', cleanup);
});
</script> 