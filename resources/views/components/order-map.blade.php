@props([
    'order' => null,
    'mapboxApiKey' => '',
    'height' => '500px',
    'showDriverLocation' => true,
    'showRoute' => true,
    'showUserLocation' => false
])

<!-- Mapbox GL JS CDN -->
<link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>

<!-- Pusher JS for real-time updates -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<div id="order-map-container" style="position: relative;">
    <div id="order-map" style="width: 100%; height: {{ $height }}; border-radius: 8px; overflow: hidden;"></div>
    
    <!-- Map Legend -->
    <div class="map-legend">
        <strong>Map Legend:</strong><br>
        <div class="legend-item">
            <span class="legend-icon pickup"></span> 
            <span>Pickup Location</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon delivery"></span> 
            <span>Delivery Location</span>
        </div>
        @if($showDriverLocation)
        <div class="legend-item">
            <span class="legend-icon driver"></span> 
            <span>Driver Location</span>
        </div>
        @endif
        @if($showUserLocation)
        <div class="legend-item">
            <span class="legend-icon user"></span> 
            <span>Your Location</span>
        </div>
        @endif
        <div class="legend-item">
            <span class="legend-icon route"></span> 
            <span>Route</span>
        </div>
    </div>

    <!-- Driver Status Info -->
    @if($showDriverLocation && $order->vehicle)
    <div class="driver-status-info">
        <div class="status-header">
            <strong>Driver Status</strong>
        </div>
        <div class="status-content">
            <div class="status-item">
                <span class="label">Driver:</span>
                <span class="value">{{ $order->vehicle->driver->name ?? 'Not Assigned' }}</span>
            </div>
            <div class="status-item">
                <span class="label">Vehicle:</span>
                <span class="value">{{ $order->vehicle->name ?? 'Not Assigned' }}</span>
            </div>
            <div class="status-item">
                <span class="label">Status:</span>
                <span class="value status-{{ $order->vehicle->status->value ?? 'unknown' }}">
                    {{ ucfirst($order->vehicle->status->value ?? 'Unknown') }}
                </span>
            </div>
            <div class="status-item">
                <span class="label">Last Update:</span>
                <span class="value" id="last-update-time">Checking...</span>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .map-legend {
        position: absolute;
        top: 10px;
        right: 10px;
        background: white;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        z-index: 10;
        font-size: 12px;
        max-width: 200px;
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        margin: 4px 0;
        gap: 8px;
    }
    
    .legend-icon {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        flex-shrink: 0;
    }
    
    .legend-icon.pickup { background-color: #28a745; }
    .legend-icon.delivery { background-color: #dc3545; }
    .legend-icon.driver { background-color: #007bff; }
    .legend-icon.user { background-color: #ffc107; }
    .legend-icon.route { 
        background-color: #304FFF; 
        width: 20px;
        height: 4px;
        border-radius: 2px;
    }

    .driver-status-info {
        position: absolute;
        bottom: 10px;
        left: 10px;
        background: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        z-index: 10;
        font-size: 12px;
        max-width: 250px;
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .status-header {
        margin-bottom: 8px;
        color: #304FFF;
        font-weight: bold;
        font-size: 14px;
    }
    
    .status-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    
    .status-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .status-item .label {
        color: #666;
        font-weight: 500;
    }
    
    .status-item .value {
        color: #333;
        font-weight: 600;
    }
    
    .status-available { color: #28a745; }
    .status-in_trip { color: #007bff; }
    .status-maintenance { color: #ffc107; }
    .status-sleeping { color: #6c757d; }
    .status-on_break { color: #fd7e14; }
    .status-unknown { color: #6c757d; }

    .driver-marker {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23007bff" width="30px" height="30px"><path d="M0 0h24v24H0z" fill="none"/><path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4.37.8 6.5.8h.09c.32-.31.65-.6.91-.9L12 6.4V4.5c0-.83.67-1.5 1.5-1.5S15 3.67 15 4.5v2.88l1.42 1.42c.26.3.59.59.91.9H17.5c2.13 0 4.64-.3 6.5-.8l-.5-2zM12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-2 8c0 .55.45 1 1 1h2c.55 0 1-.45 1-1v-1H10v1zm10-6H4v4h16v-4z"/></svg>');
        background-size: cover;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        border: 3px solid #fff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 10px rgba(0, 123, 255, 0.7); }
        50% { box-shadow: 0 0 20px rgba(0, 123, 255, 0.9); }
        100% { box-shadow: 0 0 10px rgba(0, 123, 255, 0.7); }
    }
    
    .mapboxgl-popup {
        max-width: 250px;
    }
    
    .mapboxgl-popup-content {
        padding: 12px;
        border-radius: 8px;
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 12px;
    }
    
    .popup-title {
        font-weight: bold;
        color: #304FFF;
        margin-bottom: 6px;
    }
    
    .popup-content {
        color: #333;
        line-height: 1.4;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const order = @json($order);
    const mapboxApiKey = '{{ $mapboxApiKey }}';
    const showDriverLocation = {{ $showDriverLocation ? 'true' : 'false' }};
    const showRoute = {{ $showRoute ? 'true' : 'false' }};
    const showUserLocation = {{ $showUserLocation ? 'true' : 'false' }};

    if (!mapboxApiKey) {
        console.error('Mapbox API key is not configured');
        document.getElementById('order-map').innerHTML = '<div style="padding: 20px; text-align: center; color: #666;">Map cannot be displayed: API key is missing.</div>';
        return;
    }

    // Check if order has coordinates
    const hasPickupCoords = order.pickup_latitude && order.pickup_longitude;
    const hasDeliveryCoords = order.delivery_latitude && order.delivery_longitude;

    if (!hasPickupCoords || !hasDeliveryCoords) {
        console.warn('Order is missing pickup or delivery coordinates.');
        document.getElementById('order-map').innerHTML = '<div style="padding: 20px; text-align: center; color: #666;">Map cannot be displayed: Missing coordinates.</div>';
        return;
    }

    mapboxgl.accessToken = mapboxApiKey;

    const pickupCoords = [order.pickup_longitude, order.pickup_latitude];
    const deliveryCoords = [order.delivery_longitude, order.delivery_latitude];

    const map = new mapboxgl.Map({
        container: 'order-map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: pickupCoords,
        zoom: 10
    });

    let driverMarker = null;
    let userMarker = null;
    let routeSource = null;
    const bounds = new mapboxgl.LngLatBounds();

    map.on('load', function() {
        // Add Pickup Marker
        const pickupEl = document.createElement('div');
        pickupEl.className = 'mapboxgl-marker-label';
        pickupEl.style.backgroundColor = '#28a745';
        pickupEl.style.border = '3px solid #20c997';
        pickupEl.style.color = 'white';
        pickupEl.style.width = '24px';
        pickupEl.style.height = '24px';
        pickupEl.style.borderRadius = '50%';
        pickupEl.style.display = 'flex';
        pickupEl.style.justifyContent = 'center';
        pickupEl.style.alignItems = 'center';
        pickupEl.style.fontWeight = 'bold';
        pickupEl.style.fontSize = '12px';
        pickupEl.innerHTML = 'P';

        new mapboxgl.Marker(pickupEl)
            .setLngLat(pickupCoords)
            .setPopup(new mapboxgl.Popup().setHTML(`
                <div class="popup-title">Pickup Location</div>
                <div class="popup-content">${order.up_address}</div>
            `))
            .addTo(map);
        bounds.extend(pickupCoords);

        // Add Delivery Marker
        const deliveryEl = document.createElement('div');
        deliveryEl.className = 'mapboxgl-marker-label';
        deliveryEl.style.backgroundColor = '#dc3545';
        deliveryEl.style.border = '3px solid #c82333';
        deliveryEl.style.color = 'white';
        deliveryEl.style.width = '24px';
        deliveryEl.style.height = '24px';
        deliveryEl.style.borderRadius = '50%';
        deliveryEl.style.display = 'flex';
        deliveryEl.style.justifyContent = 'center';
        deliveryEl.style.alignItems = 'center';
        deliveryEl.style.fontWeight = 'bold';
        deliveryEl.style.fontSize = '12px';
        deliveryEl.innerHTML = 'D';

        new mapboxgl.Marker(deliveryEl)
            .setLngLat(deliveryCoords)
            .setPopup(new mapboxgl.Popup().setHTML(`
                <div class="popup-title">Delivery Location</div>
                <div class="popup-content">${order.deliver_address}</div>
            `))
            .addTo(map);
        bounds.extend(deliveryCoords);

        // Fetch and draw the route
        if (showRoute) {
            fetchRoute(pickupCoords, deliveryCoords);
        }

        // Get user's location if enabled
        if (showUserLocation) {
            getUserLocation();
        }

        // Initialize real-time driver tracking
        if (showDriverLocation && order.vehicle_id) {
            console.log('Initializing driver tracking for vehicle:', order.vehicle_id);
            console.log('Order vehicle data:', order.vehicle);
            initializeDriverTracking();
        }
        
        map.fitBounds(bounds, { padding: 70, maxZoom: 15 });
    });

    function fetchRoute(start, end) {
        const url = `https://api.mapbox.com/directions/v5/mapbox/driving/${start.join(',')};${end.join(',')}` +
                    `?geometries=geojson&access_token=${mapboxApiKey}`;
        
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.routes && data.routes.length > 0) {
                    const route = data.routes[0].geometry;
                    
                    // Add route source
                    map.addSource('route', { 
                        type: 'geojson', 
                        data: { 
                            type: 'Feature', 
                            geometry: route,
                            properties: {}
                        } 
                    });
                    
                    // Add route layer
                    map.addLayer({
                        id: 'route',
                        type: 'line',
                        source: 'route',
                        layout: { 
                            'line-join': 'round', 
                            'line-cap': 'round' 
                        },
                        paint: { 
                            'line-color': '#304FFF', 
                            'line-width': 5, 
                            'line-opacity': 0.8 
                        }
                    });
                    
                    routeSource = map.getSource('route');
                }
            })
            .catch(error => console.error('Error fetching route:', error));
    }

    function getUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const userCoords = [position.coords.longitude, position.coords.latitude];
                
                const userEl = document.createElement('div');
                userEl.style.backgroundColor = '#ffc107';
                userEl.style.border = '3px solid #e0a800';
                userEl.style.color = 'white';
                userEl.style.width = '20px';
                userEl.style.height = '20px';
                userEl.style.borderRadius = '50%';
                userEl.style.display = 'flex';
                userEl.style.justifyContent = 'center';
                userEl.style.alignItems = 'center';
                userEl.style.fontWeight = 'bold';
                userEl.style.fontSize = '10px';
                userEl.innerHTML = 'U';
                
                userMarker = new mapboxgl.Marker(userEl)
                    .setLngLat(userCoords)
                    .setPopup(new mapboxgl.Popup().setHTML(`
                        <div class="popup-title">Your Location</div>
                        <div class="popup-content">Current position</div>
                    `))
                    .addTo(map);
                bounds.extend(userCoords);
                map.fitBounds(bounds, { padding: 70, maxZoom: 15 });
            }, () => {
                console.warn('Could not get user location.');
            });
        }
    }

    function initializeDriverTracking() {
        // Initialize Pusher for real-time updates
        const pusherKey = '{{ config("broadcasting.connections.pusher.key") }}';
        const pusherCluster = '{{ config("broadcasting.connections.pusher.options.cluster") }}';
        
        if (!pusherKey || !pusherCluster) {
            console.warn('Pusher not configured. Real-time tracking disabled.');
            return;
        }

        // Check if we have a vehicle to track
        if (!order.vehicle_id) {
            console.warn('No vehicle assigned to this order. Real-time tracking disabled.');
            return;
        }

        const pusher = new Pusher(pusherKey, {
            cluster: pusherCluster,
            encrypted: true
        });

        // Subscribe to the canonical vehicle-based public channel
        const channel = pusher.subscribe(`vehicle-location.${order.vehicle_id}`);
        
        channel.bind('App\\Events\\DriverLocationUpdated', function(data) {
            console.log('Driver location update received:', data);
            
            if (data.location && data.location.latitude && data.location.longitude) {
                const driverCoords = [data.location.longitude, data.location.latitude];
                
                if (!driverMarker) {
                    const el = document.createElement('div');
                    el.className = 'driver-marker';
                    
                    driverMarker = new mapboxgl.Marker(el)
                        .setLngLat(driverCoords)
                        .setPopup(new mapboxgl.Popup().setHTML(`
                            <div class="popup-title">Driver Location</div>
                            <div class="popup-content">
                                <strong>Driver:</strong> ${data.location.driver_name || order.vehicle?.driver?.name || 'Unknown'}<br>
                                <strong>Vehicle:</strong> ${data.location.vehicle_name || order.vehicle?.name || 'Unknown'}<br>
                                <strong>Last Update:</strong> ${new Date(data.location.timestamp).toLocaleTimeString()}
                            </div>
                        `))
                        .addTo(map);
                } else {
                    driverMarker.setLngLat(driverCoords);
                }
                
                // Update last update time
                const lastUpdateElement = document.getElementById('last-update-time');
                if (lastUpdateElement) {
                    lastUpdateElement.textContent = new Date(data.location.timestamp).toLocaleTimeString();
                }
                
                // Extend bounds to include driver location
                bounds.extend(driverCoords);
                map.fitBounds(bounds, { padding: 70, maxZoom: 15, duration: 1000 });
            }
        });

        // Also listen for Laravel Echo if available
        if (window.Echo) {
            window.Echo.channel(`vehicle-location.${order.vehicle_id}`)
                .listen('DriverLocationUpdated', (e) => {
                    console.log('DriverLocationUpdated event received via Echo:', e);
                    
                    if (e.location && e.location.latitude && e.location.longitude) {
                        const driverCoords = [e.location.longitude, e.location.latitude];
                        
                        if (!driverMarker) {
                            const el = document.createElement('div');
                            el.className = 'driver-marker';
                            
                            driverMarker = new mapboxgl.Marker(el)
                                .setLngLat(driverCoords)
                                .setPopup(new mapboxgl.Popup().setHTML(`
                                    <div class="popup-title">Driver Location</div>
                                    <div class="popup-content">
                                        <strong>Driver:</strong> ${e.location.driver_name || order.vehicle?.driver?.name || 'Unknown'}<br>
                                        <strong>Vehicle:</strong> ${e.location.vehicle_name || order.vehicle?.name || 'Unknown'}<br>
                                        <strong>Last Update:</strong> ${new Date(e.location.timestamp).toLocaleTimeString()}
                                    </div>
                                `))
                                .addTo(map);
                        } else {
                            driverMarker.setLngLat(driverCoords);
                        }
                        
                        // Update last update time
                        const lastUpdateElement = document.getElementById('last-update-time');
                        if (lastUpdateElement) {
                            lastUpdateElement.textContent = new Date(e.location.timestamp).toLocaleTimeString();
                        }
                        
                        bounds.extend(driverCoords);
                        map.fitBounds(bounds, { padding: 70, maxZoom: 15, duration: 1000 });
                    }
                });
        }

        // Try to get initial driver location from the server-provided relations
        let initial = null;
        if (order.driver && order.driver.last_location) {
            initial = order.driver.last_location;
        } else if (order.vehicle && order.vehicle.latest_location) {
            initial = order.vehicle.latest_location;
        } else if (order.vehicle && Array.isArray(order.vehicle.locations) && order.vehicle.locations.length > 0) {
            // Fallback: pick the most recent by timestamp if available
            initial = [...order.vehicle.locations]
                .filter(l => l && l.timestamp)
                .sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp))[0] || order.vehicle.locations[0];
        }

        if (initial && initial.latitude && initial.longitude) {
            const driverCoords = [initial.longitude, initial.latitude];
            const el = document.createElement('div');
            el.className = 'driver-marker';

            driverMarker = new mapboxgl.Marker(el)
                .setLngLat(driverCoords)
                .setPopup(new mapboxgl.Popup().setHTML(`
                    <div class="popup-title">Driver Location</div>
                    <div class="popup-content">
                        <strong>Driver:</strong> ${order.vehicle?.driver?.name || 'Unknown'}<br>
                        <strong>Vehicle:</strong> ${order.vehicle?.name || 'Unknown'}<br>
                        <strong>Last Update:</strong> ${initial.timestamp ? new Date(initial.timestamp).toLocaleTimeString() : '—'}
                    </div>
                `))
                .addTo(map);

            bounds.extend(driverCoords);
            map.fitBounds(bounds, { padding: 70, maxZoom: 15, duration: 1000 });

            const lastUpdateElement = document.getElementById('last-update-time');
            if (lastUpdateElement && initial.timestamp) {
                lastUpdateElement.textContent = new Date(initial.timestamp).toLocaleTimeString();
            }
        } else {
            console.log('No initial driver location available');
        }
    }
});
</script> 