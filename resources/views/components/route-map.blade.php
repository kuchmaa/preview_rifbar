@props([
    'waypoints' => [],
    'routeGeometry' => null,
    'mapboxApiKey' => '',
    'mapId' => 'map',
    'showLegend' => true,
    'showRouteInfo' => true,
    'enableTracking' => false,
    'vehicle' => null
])

<!-- Load Mapbox GL JS -->
<script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

<div id="{{ $mapId }}" style="width: 100%; height: 500px; position: relative;">
    @if($showLegend)
    <!-- Route Legend -->
    <div class="route-legend">
        <strong>Route Legend:</strong><br>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #28a745;"></div>
            <span>🔄 Pickup</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #dc3545;"></div>
            <span>📦 Delivery</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #007bff;"></div>
            <span>📦 Parcel</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #ffc107; width: 16px; height: 3px; border-radius: 1px;"></div>
            <span>→ Route</span>
        </div>
        <hr style="margin: 4px 0; border-color: #ddd;">
        <div class="legend-item">
            <div class="legend-color" style="background-color: #ff6b35; width: 12px; height: 2px; border-radius: 1px;"></div>
            <span>Pickup → Delivery</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #4ecdc4; width: 12px; height: 2px; border-radius: 1px;"></div>
            <span>Delivery → Pickup</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #45b7d1; width: 12px; height: 2px; border-radius: 1px;"></div>
            <span>Pickup → Pickup</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #96ceb4; width: 12px; height: 2px; border-radius: 1px;"></div>
            <span>Delivery → Delivery</span>
        </div>
        <div style="font-size: 8px; color: #666; margin-top: 2px;">
            <i class="fas fa-info-circle"></i> Parallel lines
        </div>
    </div>
    @endif
    
    @if($showRouteInfo)
    <!-- Route Info -->
    <div class="route-info">
        <strong>Route Information</strong><br>
        <span id="route-stats-{{ $mapId }}">Loading...</span>
    </div>
    @endif
</div>

<style>
    .route-legend {
        position: absolute;
        top: 10px;
        right: 10px;
        background: white;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        z-index: 1000;
        font-size: 11px;
        max-width: 200px;
    }
    .legend-item {
        display: flex;
        align-items: center;
        margin: 3px 0;
    }
    .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        margin-right: 6px;
        border: 2px solid white;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }
    .route-info {
        position: absolute;
        bottom: 10px;
        left: 10px;
        background: white;
        padding: 8px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        z-index: 1000;
        font-size: 11px;
        max-width: 250px;
    }
    .mapboxgl-marker-label {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        font-size: 11px;
        color: white;
    }
    .route-direction {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 10px;
        cursor: pointer;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .driver-marker {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23007bff" width="30px" height="30px"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2ZM12,10.5A1.5,1.5 0 0,1 13.5,12A1.5,1.5 0 0,1 12,13.5A1.5,1.5 0 0,1 10.5,12A1.5,1.5 0 0,1 12,10.5M5.8,10L4,10.9L5.1,13.5L6.9,12.8L5.8,10M18.2,10L17.1,12.8L18.9,13.5L20,10.9L18.2,10M12,5.8L12.8,4L13.5,5.1L12,6.9L10.5,5.1L11.2,4L12,5.8M12,18.2L11.2,20L10.5,18.9L12,17.1L13.5,18.9L12.8,20L12,18.2Z"/></svg>');
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const waypoints = @json($waypoints);
    const routeGeometry = @json($routeGeometry);
    const mapboxApiKey = '{{ $mapboxApiKey }}';
    const mapId = '{{ $mapId }}';

    // Ensure waypoints is an array
    if (!Array.isArray(waypoints) || waypoints.length === 0) {
        console.log('No waypoints available or waypoints is not an array');
        return;
    }

    mapboxgl.accessToken = mapboxApiKey;

    const map = new mapboxgl.Map({
        container: mapId,
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [waypoints[0].longitude, waypoints[0].latitude],
        zoom: 10
    });
    
    // Export map instance for external access
    const mapElement = document.getElementById(mapId);
    if (mapElement) {
        mapElement._mapInstance = map;
    }

    const bounds = new mapboxgl.LngLatBounds();
    const markers = [];
    let pickupCount = 0;
    let deliveryCount = 0;
    let parcelCount = 0;

    // Route segment colors for different types
    const routeColors = {
        'pickup_to_delivery': '#ff6b35',    // Orange for pickup to delivery
        'delivery_to_pickup': '#4ecdc4',    // Teal for delivery to pickup
        'pickup_to_pickup': '#45b7d1',      // Blue for pickup to pickup
        'delivery_to_delivery': '#96ceb4',  // Green for delivery to delivery
        'parcel': '#f7b731'                  // Yellow for parcels
    };

    map.on('load', function () {
        // Create segmented route with different colors using optimized route
        if (waypoints.length >= 2 && routeGeometry) {
            createSegmentedRoute();
        }

        // Initialize driver tracking if enabled
        @if($enableTracking && $vehicle)
        initializeDriverTracking();
        @endif

        // Add markers for each waypoint with improved styling
        waypoints.forEach((point, index) => {
            const el = document.createElement('div');
            el.className = 'mapboxgl-marker-label';
            
            // Different colors and styling for pickup and delivery points
            if (point.type === 'pickup') {
                el.style.backgroundColor = '#28a745'; // Green for pickup
                el.style.border = '3px solid #20c997';
                el.style.color = 'white';
                pickupCount++;
                el.innerText = 'P' + pickupCount;
            } else if (point.type === 'delivery') {
                el.style.backgroundColor = '#dc3545'; // Red for delivery
                el.style.border = '3px solid #c82333';
                el.style.color = 'white';
                deliveryCount++;
                el.innerText = 'D' + deliveryCount;
            } else {
                el.style.backgroundColor = '#007bff'; // Blue for parcels
                el.style.border = '3px solid #0056b3';
                el.style.color = 'white';
                parcelCount++;
                el.innerText = parcelCount;
            }

            // Enhanced popup content
            const popupContent = `
                <div style="min-width: 180px;">
                    <h6 style="margin: 0 0 8px 0; color: #333;">${point.details}</h6>
                    <div style="font-size: 10px; color: #666; margin-bottom: 6px;">
                        <strong>Coordinates:</strong> ${point.latitude.toFixed(6)}, ${point.longitude.toFixed(6)}
                    </div>
                    <div style="font-size: 10px; color: #666; margin-bottom: 6px;">
                        <strong>Order:</strong> ${index + 1} of ${waypoints.length}
                    </div>
                    <div style="font-size: 10px; color: #666;">
                        <strong>Type:</strong> ${point.type === 'pickup' ? '🔄 Pickup' : point.type === 'delivery' ? '📦 Delivery' : '📦 Parcel'}
                    </div>
                </div>
            `;

            const popup = new mapboxgl.Popup({ 
                offset: 25,
                closeButton: true,
                closeOnClick: false
            }).setHTML(popupContent);

            const marker = new mapboxgl.Marker(el)
                .setLngLat([point.longitude, point.latitude])
                .setPopup(popup)
                .addTo(map);
            
            markers.push(marker);
            bounds.extend([point.longitude, point.latitude]);
        });

        // Fit map to show all markers with padding
        if (bounds.isEmpty() === false) {
            map.fitBounds(bounds, { 
                padding: {top: 50, bottom: 50, left: 50, right: 50},
                maxZoom: 15
            });
        }

        // Update route statistics
        updateRouteStats();
    });

    function createSegmentedRoute() {
        // Extract coordinates from the optimized route geometry
        const routeCoordinates = routeGeometry.coordinates;
        
        // Create route segments between consecutive waypoints
        for (let i = 0; i < waypoints.length - 1; i++) {
            const currentPoint = waypoints[i];
            const nextPoint = waypoints[i + 1];
            
            // Determine route segment type and color
            let segmentType = 'pickup_to_delivery';
            if (currentPoint.type === 'delivery' && nextPoint.type === 'pickup') {
                segmentType = 'delivery_to_pickup';
            } else if (currentPoint.type === 'pickup' && nextPoint.type === 'pickup') {
                segmentType = 'pickup_to_pickup';
            } else if (currentPoint.type === 'delivery' && nextPoint.type === 'delivery') {
                segmentType = 'delivery_to_delivery';
            } else if (currentPoint.type === 'parcel' || nextPoint.type === 'parcel') {
                segmentType = 'parcel';
            }

            const color = routeColors[segmentType];
            
            // Find the segment of the optimized route between these two waypoints
            const segmentCoordinates = extractRouteSegment(routeCoordinates, currentPoint, nextPoint);
            
            if (segmentCoordinates.length > 1) {
                // Create parallel line with offset
                const parallelCoordinates = createParallelLine(segmentCoordinates, i);
                
                const routeSource = `route-segment-${i}`;
                const routeLayer = `route-layer-${i}`;

                map.addSource(routeSource, {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {
                            'segment-type': segmentType,
                            'from': currentPoint.label,
                            'to': nextPoint.label,
                            'segment-index': i
                        },
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': parallelCoordinates
                        }
                    }
                });
            
                // Add route border for better visibility
                map.addLayer({
                    'id': `route-border-${i}`,
                    'type': 'line',
                    'source': routeSource,
                    'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    'paint': {
                        'line-color': '#000',
                        'line-width': 6,
                        'line-opacity': 0.3
                    }
                });

                // Add main route line with segment color
                map.addLayer({
                    'id': routeLayer,
                    'type': 'line',
                    'source': routeSource,
                    'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    'paint': {
                        'line-color': color,
                        'line-width': 4,
                        'line-opacity': 0.9
                    }
                }, `route-border-${i}`);

                // Add direction arrow in the middle of the segment
                const midIndex = Math.floor(parallelCoordinates.length / 2);
                const midCoord = parallelCoordinates[midIndex];
                
                const arrowEl = document.createElement('div');
                arrowEl.className = 'route-direction';
                arrowEl.innerHTML = `→ ${i + 1}`;
                arrowEl.style.backgroundColor = color;
                arrowEl.style.color = 'white';

                new mapboxgl.Marker(arrowEl)
                    .setLngLat(midCoord)
                    .addTo(map);
            }
        }
    }

    function createParallelLine(coordinates, segmentIndex) {
        // Calculate offset based on segment index to create parallel lines
        const offsetDistance = 0.0003; // Increased offset in degrees for better visibility
        const offsetAngle = (segmentIndex % 3) * Math.PI / 6; // Vary angle for different segments
        
        const parallelCoordinates = coordinates.map((coord, index) => {
            const [lng, lat] = coord;
            
            // Calculate perpendicular direction
            let dx = 0;
            let dy = 0;
            
            if (index > 0 && index < coordinates.length - 1) {
                // Calculate direction from previous to next point
                const prev = coordinates[index - 1];
                const next = coordinates[index + 1];
                const dirLng = next[0] - prev[0];
                const dirLat = next[1] - prev[1];
                const length = Math.sqrt(dirLng * dirLng + dirLat * dirLat);
                
                if (length > 0) {
                    // Normalize and rotate 90 degrees
                    dx = -dirLat / length;
                    dy = dirLng / length;
                }
            } else if (coordinates.length > 1) {
                // For endpoints, use direction to/from neighbor
                const neighbor = index === 0 ? coordinates[1] : coordinates[index - 1];
                const dirLng = neighbor[0] - lng;
                const dirLat = neighbor[1] - lat;
                const length = Math.sqrt(dirLng * dirLng + dirLat * dirLat);
                
                if (length > 0) {
                    dx = -dirLat / length;
                    dy = dirLng / length;
                }
            }
            
            // Apply offset with rotation
            const offsetX = dx * Math.cos(offsetAngle) - dy * Math.sin(offsetAngle);
            const offsetY = dx * Math.sin(offsetAngle) + dy * Math.cos(offsetAngle);
            
            return [
                lng + offsetX * offsetDistance * (segmentIndex + 1),
                lat + offsetY * offsetDistance * (segmentIndex + 1)
            ];
        });
        
        return parallelCoordinates;
    }

    function extractRouteSegment(routeCoordinates, fromPoint, toPoint) {
        // Find the closest points in the route to our waypoints
        let startIndex = 0;
        let endIndex = routeCoordinates.length - 1;
        
        // Find the closest route point to the "from" waypoint
        let minDistance = Infinity;
        for (let i = 0; i < routeCoordinates.length; i++) {
            const distance = Math.sqrt(
                Math.pow(routeCoordinates[i][0] - fromPoint.longitude, 2) +
                Math.pow(routeCoordinates[i][1] - fromPoint.latitude, 2)
            );
            if (distance < minDistance) {
                minDistance = distance;
                startIndex = i;
            }
        }
        
        // Find the closest route point to the "to" waypoint
        minDistance = Infinity;
        for (let i = 0; i < routeCoordinates.length; i++) {
            const distance = Math.sqrt(
                Math.pow(routeCoordinates[i][0] - toPoint.longitude, 2) +
                Math.pow(routeCoordinates[i][1] - toPoint.latitude, 2)
            );
            if (distance < minDistance) {
                minDistance = distance;
                endIndex = i;
            }
        }
        
        // Extract the segment between these points
        if (startIndex <= endIndex) {
            return routeCoordinates.slice(startIndex, endIndex + 1);
        } else {
            return routeCoordinates.slice(endIndex, startIndex + 1).reverse();
        }
    }

    function updateRouteStats() {
        const statsElement = document.getElementById(`route-stats-${mapId}`);
        if (statsElement) {
            const totalStops = waypoints.length;
            const routeInfo = `
                Total Stops: ${totalStops}<br>
                Pickups: ${pickupCount}<br>
                Deliveries: ${deliveryCount}<br>
                Parcels: ${parcelCount}<br>
                ${routeGeometry ? '✅ Route Optimized' : '⚠️ Route Not Optimized'}
            `;
            statsElement.innerHTML = routeInfo;
        }
    }

    @if($enableTracking && $vehicle)
    let driverMarker = null;
    
    function initializeDriverTracking() {
        const vehicle = @json($vehicle);
        const pusherKey = '{{ config("broadcasting.connections.pusher.key") }}';
        const pusherCluster = '{{ config("broadcasting.connections.pusher.options.cluster") }}';

        if (!pusherKey || !pusherCluster) {
            console.warn('Pusher not configured. Real-time tracking disabled.');
            return;
        }

        // Show initial driver position if available
        if (vehicle.latest_location) {
            showDriverPosition(
                vehicle.latest_location.longitude, 
                vehicle.latest_location.latitude,
                vehicle.name,
                vehicle.driver?.name || 'Unknown'
            );
        }

        // Connect to Pusher
        const pusher = new Pusher(pusherKey, {
            cluster: pusherCluster,
            wsHost: '127.0.0.1',
            wsPort: 6001,
            forceTLS: false,
            disableStats: true,
            enabledTransports: ['ws', 'wss']
        });

        const channel = pusher.subscribe(`vehicle-location.${vehicle.id}`);

        channel.bind('App\\Events\\DriverLocationUpdated', function(data) {
            if (data.location && data.location.latitude && data.location.longitude) {
                showDriverPosition(
                    data.location.longitude,
                    data.location.latitude,
                    data.vehicle_name || vehicle.name,
                    data.driver_name || 'Unknown'
                );
                
                // Find next waypoint and draw dashed line
                const nextWaypoint = findNextWaypoint(
                    data.location.latitude,
                    data.location.longitude
                );
                
                if (nextWaypoint) {
                    drawDriverToNextStop(
                        [data.location.longitude, data.location.latitude],
                        [nextWaypoint.longitude, nextWaypoint.latitude]
                    );
                }
            }
        });
    }

    function showDriverPosition(lng, lat, vehicleName, driverName) {
        const coords = [lng, lat];
        
        if (driverMarker) {
            driverMarker.setLngLat(coords);
        } else {
            const el = document.createElement('div');
            el.className = 'driver-marker';
            
            driverMarker = new mapboxgl.Marker(el)
                .setLngLat(coords)
                .setPopup(new mapboxgl.Popup().setHTML(`
                    <div style="min-width: 150px;">
                        <h6 style="margin: 0 0 8px 0; color: #333;">Current Position</h6>
                        <div style="font-size: 10px; color: #666;">
                            <strong>Driver:</strong> ${driverName}<br>
                            <strong>Vehicle:</strong> ${vehicleName}<br>
                            <strong>Time:</strong> ${new Date().toLocaleTimeString()}
                        </div>
                    </div>
                `))
                .addTo(map);
        }
    }

    function findNextWaypoint(lat, lng) {
        let minDistance = Infinity;
        let closestWaypoint = null;
        let closestIndex = -1;
        
        waypoints.forEach((waypoint, index) => {
            const distance = getDistance(
                { lat: lat, lng: lng },
                { lat: waypoint.latitude, lng: waypoint.longitude }
            );
            
            if (distance < minDistance) {
                minDistance = distance;
                closestWaypoint = waypoint;
                closestIndex = index;
            }
        });
        
        // Return the next waypoint in sequence, or the closest if we're at the end
        if (closestIndex < waypoints.length - 1) {
            return waypoints[closestIndex + 1];
        }
        return closestWaypoint;
    }

    function getDistance(coords1, coords2) {
        const R = 6371; // Radius of the Earth in km
        const dLat = (coords2.lat - coords1.lat) * Math.PI / 180;
        const dLon = (coords2.lng - coords1.lng) * Math.PI / 180;
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(coords1.lat * Math.PI / 180) * Math.cos(coords2.lat * Math.PI / 180) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }

    function drawDriverToNextStop(startCoords, endCoords) {
        const sourceId = 'driver-route-source';
        const layerId = 'driver-route-layer';
        
        // Create a simple line from driver to next stop
        const routeData = {
            type: 'Feature',
            geometry: {
                type: 'LineString',
                coordinates: [startCoords, endCoords]
            },
            properties: {}
        };
        
        if (map.getSource(sourceId)) {
            map.getSource(sourceId).setData(routeData);
        } else {
            map.addSource(sourceId, {
                type: 'geojson',
                data: routeData
            });
            
            map.addLayer({
                id: layerId,
                type: 'line',
                source: sourceId,
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': '#ff7f50',
                    'line-width': 3,
                    'line-dasharray': [2, 2],
                    'line-opacity': 0.8
                }
            });
        }
    }
    @endif
});
</script> 
