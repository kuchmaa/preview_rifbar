@props(['tasks'])

<x-adminlte-datatable id="tasksTable" :heads="[
    ['label' => '#', 'width' => 5],
    ['label' => 'Type', 'width' => 8],
    'Task',
    'Point Type',
    'Address',
    ['label' => 'Status', 'width' => 10],
    ['label' => 'Actions', 'width' => 8, 'no-export' => true],
]" theme="light" striped hoverable>
    @foreach($tasks as $index => $taskData)
        @php
            $task = $taskData['task'];
            $type = $taskData['type'];
            $scanUrl = $type === 'parcel' ? route('driver.parcels.scan', $task->id) : route('driver.orders.scan', $task->id);
        @endphp
        <tr>
            <td>
                <span class="badge badge-primary mr-2" style="font-size: 1.1em;">{{ $index + 1 }}</span>
            </td>
            <td>
                @if($type === 'parcel')
                    <span class="badge badge-info">📦 Parcel</span>
                @else
                    <span class="badge badge-success">🛒 Order</span>
                @endif
            </td>
            <td><strong>#{{ $task->id }}</strong></td>
            <td>
                @if($type === 'parcel')
                    <span class="badge badge-danger">📦 Delivery</span>
                @else
                    <div>
                        <span class="badge badge-success">🔄 Pickup</span><br>
                        <span class="badge badge-danger">📦 Delivery</span>
                    </div>
                @endif
            </td>
            <td>
                @if($type === 'parcel')
                    {{ $task->delivery_address }}
                @else
                    <strong>Pickup:</strong> {{ $task->up_address }}<br>
                    <strong>Delivery:</strong> {{ $task->deliver_address }}
                @endif
            </td>
            <td>
                <span class="badge badge-{{$task->status->getBadgeClass()}}">{{ $task->status->getDisplayName() }}</span>
            </td>
            <td>
                <a href="{{ $scanUrl }}" class="btn btn-sm btn-outline-primary" title="Scan">
                    <i class="fas fa-qrcode"></i>
                </a>
                @if($task->delivery_latitude && $task->delivery_longitude)
                    <a href="https://maps.google.com/maps?q={{ $task->delivery_latitude }},{{ $task->delivery_longitude }}"
                       target="_blank" class="btn btn-sm btn-outline-success" title="Open in Google Maps">
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>
