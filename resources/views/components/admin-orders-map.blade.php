@props([
    'orders' => [],
    'mapboxApiKey' => '',
    'height' => '600px',
    'showLegend' => true,
    'showFilters' => true,
    'showStats' => true
])

<!-- Mapbox GL JS CDN -->
<link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>

<div id="admin-orders-map-container" style="position: relative;">
    <div id="admin-orders-map" style="width: 100%; height: {{ $height }}; border-radius: 8px; overflow: hidden;"></div>
    
    @if($showLegend)
    <!-- Map Legend -->
    <div class="admin-map-legend">
        <strong>Orders Map Legend:</strong><br>
        <div class="legend-item">
            <span class="legend-icon pickup"></span> 
            <span>Pickup Location</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon delivery"></span> 
            <span>Delivery Location</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon pending"></span> 
            <span>Pending Orders</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon in_progress"></span> 
            <span>In Progress</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon completed"></span> 
            <span>Completed</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon cancelled"></span> 
            <span>Cancelled</span>
        </div>
        <div class="legend-item">
            <span class="legend-icon route"></span> 
            <span>Route</span>
        </div>
    </div>
    @endif

    @if($showFilters)
    <!-- Filters Panel -->
    <div class="admin-map-filters">
        <strong>Filters:</strong><br>
        <div class="filter-group">
            <label><input type="checkbox" id="filter-pending" checked> Pending</label>
        </div>
        <div class="filter-group">
            <label><input type="checkbox" id="filter-in_progress" checked> In Progress</label>
        </div>
        <div class="filter-group">
            <label><input type="checkbox" id="filter-completed" checked> Completed</label>
        </div>
        <div class="filter-group">
            <label><input type="checkbox" id="filter-cancelled" checked> Cancelled</label>
        </div>
        <div class="filter-group">
            <label><input type="checkbox" id="filter-route" checked> Show Routes</label>
        </div>
        <button id="reset-filters" class="btn btn-sm btn-outline-secondary mt-2">Reset</button>
    </div>
    @endif

    @if($showStats)
    <!-- Statistics Panel -->
    <div class="admin-map-stats">
        <strong>Orders Overview</strong><br>
        <div class="stats-content">
            <div class="stat-item">
                <span class="label">Total:</span>
                <span class="value" id="total-orders">{{ count($orders) }}</span>
            </div>
            <div class="stat-item">
                <span class="label">Pending:</span>
                <span class="value" id="pending-count">0</span>
            </div>
            <div class="stat-item">
                <span class="label">In Progress:</span>
                <span class="value" id="in-progress-count">0</span>
            </div>
            <div class="stat-item">
                <span class="label">Completed:</span>
                <span class="value" id="completed-count">0</span>
            </div>
            <div class="stat-item">
                <span class="label">Cancelled:</span>
                <span class="value" id="cancelled-count">0</span>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .admin-map-legend {
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
    .legend-icon.pending { background-color: #ffc107; }
    .legend-icon.in_progress { background-color: #007bff; }
    .legend-icon.completed { background-color: #28a745; }
    .legend-icon.cancelled { background-color: #6c757d; }
    .legend-icon.route { 
        background-color: #304FFF; 
        width: 20px;
        height: 4px;
        border-radius: 2px;
    }

    .admin-map-filters {
        position: absolute;
        top: 10px;
        left: 10px;
        background: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        z-index: 10;
        font-size: 12px;
        max-width: 200px;
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .filter-group {
        margin: 6px 0;
    }
    
    .filter-group label {
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        font-size: 11px;
    }
    
    .filter-group input[type="checkbox"] {
        margin: 0;
    }

    .admin-map-stats {
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
    
    .stats-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-top: 8px;
    }
    
    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .stat-item .label {
        color: #666;
        font-weight: 500;
    }
    
    .stat-item .value {
        color: #333;
        font-weight: 600;
    }

    .order-marker {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 10px;
        color: white;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        cursor: pointer;
        transition: transform 0.2s;
    }
    
    .order-marker:hover {
        transform: scale(1.1);
    }
    
    .order-marker.pending { background-color: #ffc107; }
    .order-marker.in_progress { background-color: #007bff; }
    .order-marker.completed { background-color: #28a745; }
    .order-marker.cancelled { background-color: #6c757d; }
    
    .mapboxgl-popup {
        max-width: 300px;
    }
    
    .mapboxgl-popup-content {
        padding: 15px;
        border-radius: 8px;
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 12px;
    }
    
    .popup-title {
        font-weight: bold;
        color: #304FFF;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .popup-content {
        color: #333;
        line-height: 1.4;
    }
    
    .popup-actions {
        margin-top: 10px;
        display: flex;
        gap: 5px;
    }
    
    .popup-actions .btn {
        font-size: 10px;
        padding: 4px 8px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const orders = @json($orders);
    const mapboxApiKey = '{{ $mapboxApiKey }}';

    if (!mapboxApiKey) {
        console.error('Mapbox API key is not configured');
        document.getElementById('admin-orders-map').innerHTML = '<div style="padding: 20px; text-align: center; color: #666;">Map cannot be displayed: API key is missing.</div>';
        return;
    }

    // Filter orders with coordinates
    const ordersWithCoords = orders.filter(order => 
        order.pickup_latitude && order.pickup_longitude && 
        order.delivery_latitude && order.delivery_longitude
    );

    if (ordersWithCoords.length === 0) {
        document.getElementById('admin-orders-map').innerHTML = '<div style="padding: 20px; text-align: center; color: #666;">No orders with coordinates found.</div>';
        return;
    }

    mapboxgl.accessToken = mapboxApiKey;

    const map = new mapboxgl.Map({
        container: 'admin-orders-map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [ordersWithCoords[0].pickup_longitude, ordersWithCoords[0].pickup_latitude],
        zoom: 10
    });

    const bounds = new mapboxgl.LngLatBounds();
    const markers = [];
    const routeSources = [];
    let filteredOrders = [...ordersWithCoords];

    // Status colors
    const statusColors = {
        'pending': '#ffc107',
        'in_progress': '#007bff',
        'completed': '#28a745',
        'cancelled': '#6c757d'
    };

    map.on('load', function() {
        addOrderMarkers();
        updateStats();
        map.fitBounds(bounds, { padding: 70, maxZoom: 15 });
    });

    function addOrderMarkers() {
        // Clear existing markers
        markers.forEach(marker => marker.remove());
        markers.length = 0;
        
        // Clear existing routes
        routeSources.forEach(sourceId => {
            if (map.getSource(sourceId)) {
                map.removeLayer(sourceId + '-layer');
                map.removeSource(sourceId);
            }
        });
        routeSources.length = 0;

        bounds.empty();

        filteredOrders.forEach((order, index) => {
            const pickupCoords = [order.pickup_longitude, order.pickup_latitude];
            const deliveryCoords = [order.delivery_longitude, order.delivery_latitude];

            // Add pickup marker
            const pickupEl = document.createElement('div');
            pickupEl.className = 'order-marker pickup';
            pickupEl.innerHTML = 'P';
            pickupEl.title = `Pickup: ${order.up_address}`;

            const pickupMarker = new mapboxgl.Marker(pickupEl)
                .setLngLat(pickupCoords)
                .setPopup(createOrderPopup(order, 'pickup'))
                .addTo(map);
            
            markers.push(pickupMarker);
            bounds.extend(pickupCoords);

            // Add delivery marker
            const deliveryEl = document.createElement('div');
            deliveryEl.className = 'order-marker delivery';
            deliveryEl.innerHTML = 'D';
            deliveryEl.title = `Delivery: ${order.deliver_address}`;

            const deliveryMarker = new mapboxgl.Marker(deliveryEl)
                .setLngLat(deliveryCoords)
                .setPopup(createOrderPopup(order, 'delivery'))
                .addTo(map);
            
            markers.push(deliveryMarker);
            bounds.extend(deliveryCoords);

            // Add route if enabled
            if (document.getElementById('filter-route')?.checked) {
                addRoute(pickupCoords, deliveryCoords, order, index);
            }
        });

        if (!bounds.isEmpty()) {
            map.fitBounds(bounds, { padding: 70, maxZoom: 15 });
        }
    }

    function createOrderPopup(order, type) {
        const isPickup = type === 'pickup';
        const address = isPickup ? order.up_address : order.deliver_address;
        const city = isPickup ? order.up_city : order.deliver_city;
        const zipCode = isPickup ? order.up_zip_code : order.deliver_zip_code;
        
        return new mapboxgl.Popup().setHTML(`
            <div class="popup-title">
                ${isPickup ? '🔄 Pickup' : '📦 Delivery'} - Order #${order.id}
            </div>
            <div class="popup-content">
                <div style="margin-bottom: 8px;">
                    <strong>Client:</strong> ${order.name}<br>
                    <strong>Phone:</strong> ${order.phone}<br>
                    <strong>Email:</strong> ${order.email}
                </div>
                <div style="margin-bottom: 8px;">
                    <strong>Address:</strong><br>
                    ${address}<br>
                    ${city} ${zipCode}
                </div>
                <div style="margin-bottom: 8px;">
                    <strong>Status:</strong> 
                    <span class="badge badge-${getStatusBadgeClass(order.status)}">${order.status}</span><br>
                    <strong>Total:</strong> $${parseFloat(order.total_price).toFixed(2)}<br>
                    <strong>Track:</strong> ${order.track_number || 'N/A'}
                </div>
                <div class="popup-actions">
                    <a href="/admin/orders/${order.id}" class="btn btn-sm btn-primary">View</a>
                    <a href="/admin/orders/${order.id}/edit" class="btn btn-sm btn-info">Edit</a>
                </div>
            </div>
        `);
    }

    function getStatusBadgeClass(status) {
        switch(status) {
            case 'pending': return 'warning';
            case 'in_progress': return 'info';
            case 'completed': return 'success';
            case 'cancelled': return 'secondary';
            default: return 'secondary';
        }
    }

    function addRoute(start, end, order, index) {
        const sourceId = `route-${order.id}-${index}`;
        routeSources.push(sourceId);

        // Create a simple straight line route
        const routeData = {
            type: 'Feature',
            geometry: {
                type: 'LineString',
                coordinates: [start, end]
            },
            properties: {
                orderId: order.id,
                status: order.status
            }
        };

        map.addSource(sourceId, {
            type: 'geojson',
            data: routeData
        });

        map.addLayer({
            id: sourceId + '-layer',
            type: 'line',
            source: sourceId,
            layout: {
                'line-join': 'round',
                'line-cap': 'round'
            },
            paint: {
                'line-color': statusColors[order.status] || '#304FFF',
                'line-width': 3,
                'line-opacity': 0.7
            }
        });
    }

    function updateStats() {
        const total = filteredOrders.length;
        const pending = filteredOrders.filter(o => o.status === 'pending').length;
        const inProgress = filteredOrders.filter(o => o.status === 'in_progress').length;
        const completed = filteredOrders.filter(o => o.status === 'completed').length;
        const cancelled = filteredOrders.filter(o => o.status === 'cancelled').length;

        document.getElementById('total-orders').textContent = total;
        document.getElementById('pending-count').textContent = pending;
        document.getElementById('in-progress-count').textContent = inProgress;
        document.getElementById('completed-count').textContent = completed;
        document.getElementById('cancelled-count').textContent = cancelled;
    }

    // Filter event listeners
    document.getElementById('filter-pending')?.addEventListener('change', applyFilters);
    document.getElementById('filter-in_progress')?.addEventListener('change', applyFilters);
    document.getElementById('filter-completed')?.addEventListener('change', applyFilters);
    document.getElementById('filter-cancelled')?.addEventListener('change', applyFilters);
    document.getElementById('filter-route')?.addEventListener('change', applyFilters);

    document.getElementById('reset-filters')?.addEventListener('click', function() {
        document.querySelectorAll('.admin-map-filters input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = true;
        });
        applyFilters();
    });

    function applyFilters() {
        const showPending = document.getElementById('filter-pending')?.checked;
        const showInProgress = document.getElementById('filter-in_progress')?.checked;
        const showCompleted = document.getElementById('filter-completed')?.checked;
        const showCancelled = document.getElementById('filter-cancelled')?.checked;

        filteredOrders = ordersWithCoords.filter(order => {
            if (order.status === 'pending' && !showPending) return false;
            if (order.status === 'in_progress' && !showInProgress) return false;
            if (order.status === 'completed' && !showCompleted) return false;
            if (order.status === 'cancelled' && !showCancelled) return false;
            return true;
        });

        addOrderMarkers();
        updateStats();
    }
});
</script> 