@props(['vehicleData', 'mapboxApiKey'])

@php
    $vehicle = $vehicleData['vehicle'];
    $waypoints = $vehicleData['waypoints'];
    $routeGeometry = $vehicleData['routeGeometry'];
@endphp

<x-adminlte-card
    :title="'Vehicle: ' . $vehicle->name . ' (Driver: ' . ($vehicle->driver->name ?? 'N/A') . ')'"
    theme="lightblue"
    icon="fas fa-truck"
    collapsible
    collapsed
>
    <div class="vehicle-route-info">
        <div class="route-stats">
            <div class="stat-item">
                <span class="stat-badge" style="background-color: #28a745; color: white;">P</span>
                <span>Pickups: {{ $waypoints->where('type', 'pickup')->count() }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-badge" style="background-color: #dc3545; color: white;">D</span>
                <span>Deliveries: {{ $waypoints->where('type', 'delivery')->count() }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-badge" style="background-color: #007bff; color: white;">📦</span>
                <span>Parcels: {{ $waypoints->where('type', 'parcel')->count() }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-badge" style="background-color: #ffc107; color: black;">→</span>
                <span>Total Points: {{ $waypoints->count() }}</span>
            </div>
        </div>
    </div>

    <div class="route-container">
        <div class="map-wrapper">
            <x-route-map
                :waypoints="$waypoints"
                :routeGeometry="$routeGeometry"
                :mapboxApiKey="$mapboxApiKey"
                :mapId="'map-' . $vehicle->id"
                :showLegend="true"
                :showRouteInfo="true"
            />
        </div>
        <div class="stops-wrapper">
            <ul class="stops-list">
                @foreach($waypoints as $index => $waypoint)
                    <li>
                        <span class="stop-number">{{ $index + 1 }}.</span>
                        <span>{{ $waypoint['details'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <x-slot name="footerSlot">
        <button class="btn btn-primary save-route-btn" data-vehicle-id="{{ $vehicle->id }}" style="display: none;">
            <i class="fas fa-save"></i> Save New Order
        </button>
    </x-slot>
</x-adminlte-card>
