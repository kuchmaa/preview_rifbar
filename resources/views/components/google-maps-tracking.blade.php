@props(['order', 'apiKey'])

<div id="google-maps-tracking" class="google-maps-container">
    <div class="map-controls">
        <button id="get-user-location" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" fill="currentColor"/>
            </svg>
            My Location
        </button>
        <button id="center-map" class="btn btn-secondary">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 2L2 8l6 6 6-6-6-6z" fill="currentColor"/>
            </svg>
            Center Map
        </button>
    </div>

    <div id="map" class="google-map"></div>

    <div class="tracking-info">
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

        <div id="route-info" class="info-card">
            <h4>Route Information</h4>
            <div id="route-details" class="details">
                <p><strong>Distance:</strong> <span id="route-distance">-</span></p>
                <p><strong>Estimated Time:</strong> <span id="route-time">-</span></p>
                <p><strong>Your Location:</strong> <span id="user-address">-</span></p>
            </div>
        </div>
    </div>
</div>

<style>
.google-maps-container {
    position: relative;
    width: 100%;
    height: 500px;
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

.google-map {
    width: 100%;
    height: 100%;
    background-color: #f0f0f0;
}

.tracking-info {
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
    .tracking-info {
        position: relative;
        top: auto;
        right: auto;
        margin-top: 10px;
        max-width: none;
    }
    
    .google-maps-container {
        height: 400px;
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
        script.src = 'https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&libraries=geometry,places&language=en&loading=async&callback=initGoogleMapsTracking';
        script.async = true;
        script.defer = true;
        
        window.initGoogleMapsTracking = function() {
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
        orderId: {{ $orderId ?? 'null' }},
        vehicleId: {{ $vehicleId ?? 'null' }},
        autoUpdate: {{ $autoUpdate ? 'true' : 'false' }},
    };

    const orderId = {{ $order->id }};
    let map, driverMarker, userMarker, directionsService, directionsRenderer;
    let userLocation = null;
    let driverLocation = null;
    let updateInterval = null;

    // Инициализация карты
    function initMap() {
        const defaultCenter = { lat: 40.7128, lng: -74.0060 }; // NYC
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: defaultCenter,
            zoom: 12,
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

        // Создаем маркеры
        driverMarker = new google.maps.Marker({
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

        userMarker = new google.maps.Marker({
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
    }

    // Получение позиции пользователя
    function getUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    
                    userMarker.setPosition(userLocation);
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
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: location }, function(results, status) {
            if (status === 'OK' && results[0]) {
                document.getElementById('user-address').textContent = results[0].formatted_address;
            }
        });
    }

    // Получение позиции водителя через polling (fallback)
    async function getDriverLocation() {
        try {
            const response = await fetch(`/api/v1/public/tracking/orders/${orderId}/driver-location`);
            const data = await response.json();
            
            if (data.success && data.data) {
                driverLocation = {
                    lat: parseFloat(data.data.latitude),
                    lng: parseFloat(data.data.longitude)
                };
                
                driverMarker.setPosition(driverLocation);
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

    // Real-time отслеживание через SSE
    function startSSETracking() {
        const eventSource = new EventSource(`/api/v1/public/sse/orders/${orderId}/driver-location-ws`);
        
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
            
            driverMarker.setPosition(driverLocation);
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
            // Поддерживаем соединение активным
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

    // Обновление информации о водителе
    function updateDriverInfo(driverData) {
        document.getElementById('driver-name').textContent = driverData.driver_name || 'Unknown Driver';
        document.getElementById('driver-address').textContent = driverData.address || 'Location not available';
        document.getElementById('driver-last-update').textContent = new Date(driverData.timestamp).toLocaleTimeString();
        
        const statusDot = document.querySelector('.status-dot');
        const statusText = document.querySelector('.status-text');
        
        if (driverData.is_active) {
            statusDot.className = 'status-dot active';
            statusText.textContent = 'Active';
        } else {
            statusDot.className = 'status-dot inactive';
            statusText.textContent = 'Inactive';
        }
    }

    // Обновление статуса водителя
    function updateDriverStatus(status, message) {
        const statusDot = document.querySelector('.status-dot');
        const statusText = document.querySelector('.status-text');
        
        statusDot.className = `status-dot ${status}`;
        statusText.textContent = message;
    }

    // Расчет маршрута
    function calculateRoute() {
        if (!driverLocation || !userLocation) return;
        
        const request = {
            origin: driverLocation,
            destination: userLocation,
            travelMode: google.maps.TravelMode.DRIVING
        };
        
        directionsService.route(request, function(result, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(result);
                
                const route = result.routes[0].legs[0];
                document.getElementById('route-distance').textContent = route.distance.text;
                document.getElementById('route-time').textContent = route.duration.text;
            }
        });
    }

    // Центрирование карты
    function centerMap() {
        if (driverLocation && userLocation) {
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(driverLocation);
            bounds.extend(userLocation);
            map.fitBounds(bounds);
        } else if (driverLocation) {
            map.setCenter(driverLocation);
            map.setZoom(14);
        } else if (userLocation) {
            map.setCenter(userLocation);
            map.setZoom(14);
        }
    }

    // Показ ошибки
    function showError(message) {
        console.error(message);
        // Можно добавить уведомление пользователю
    }

    // Обработчики событий
    document.getElementById('get-user-location').addEventListener('click', getUserLocation);
    document.getElementById('center-map').addEventListener('click', centerMap);

    // Fallback polling
    function startPolling() {
        updateInterval = setInterval(getDriverLocation, 30000);
    }

    // Инициализация и периодическое обновление
    function startTracking() {
        initMap();
        getDriverLocation();
        
        // Пробуем SSE, если не работает - fallback на polling
        try {
            const eventSource = startSSETracking();
            
            // Если SSE не работает через 10 секунд, переключаемся на polling
            setTimeout(() => {
                if (eventSource.readyState === EventSource.CONNECTING) {
                    eventSource.close();
                    startPolling();
                }
            }, 10000);
        } catch (error) {
            console.log('SSE not supported, using polling');
            startPolling();
        }
    }

    // Очистка при размонтировании
    function cleanup() {
        if (updateInterval) {
            clearInterval(updateInterval);
        }
    }

    // Запуск отслеживания
    startTracking();

    // Очистка при уходе со страницы
    window.addEventListener('beforeunload', cleanup);
});
</script> 