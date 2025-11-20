{{--
This component needs two variables to be passed:
- $unreadCount: (integer) The number of unread notifications.
- $latestUnread: (collection) A collection of the latest 5 unread notifications.
--}}
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if($unreadCount > 0)
            <span class="badge badge-warning navbar-badge">{{ $unreadCount }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{ $unreadCount }} Unread Notifications</span>
        <div class="dropdown-divider"></div>

        @forelse($latestUnread as $notification)
            @php
                // Determine action URL & text dynamically
                $actionUrl = '#';
                $actionText = '';

                if (isset($notification->data['download_path'])) {
                    // Export download
                    $actionUrl = route('business.products.export.download', ['notification' => $notification->id]);
                    $actionText = 'Download';
                } elseif (isset($notification->data['report_path'])) {
                    // Import error report
                    $actionUrl = route('business.products.import.report', ['notification' => $notification->id]);
                    $actionText = 'Download Report';
                } elseif (isset($notification->data['action_url'])) {
                    // Fallback to provided URL in data
                    $actionUrl = $notification->data['action_url'];
                    $actionText = $notification->data['action_text'] ?? 'View';
                }

                $icon = $notification->data['icon'] ?? 'fas fa-file';
                $title = $notification->data['title'] ?? 'New Notification';
                $message = isset($notification->data['message']) ? Str::limit($notification->data['message'], 50) : '';
                $time = $notification->created_at->diffForHumans(null, true);
            @endphp
            <div class="dropdown-item">
                <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                             <i class="{{ $icon }} mr-2"></i> {{ $title }}
                            <span class="float-right text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ $time }}</span>
                        </h3>
                        <p class="text-sm" style="white-space: normal;">{{ $message }}</p>
                        @if($actionUrl !== '#')
                            <a href="{{ $actionUrl }}" class="btn btn-xs btn-primary mt-1"><i class="fas fa-download mr-1"></i>{{ $actionText }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        @empty
            <a href="#" class="dropdown-item text-center">
                No unread notifications
            </a>
            <div class="dropdown-divider"></div>
        @endforelse

        @if($unreadCount > 0)
            <a href="#" class="dropdown-item dropdown-footer" id="mark-all-notifications-as-read">Mark all as read</a>
        @endif
        <a href="{{ route('business.notifications.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>

@push('js')
<script>
    // Ensure the script is not duplicated
    if (!window.notificationScriptLoaded) {
        document.addEventListener('DOMContentLoaded', function() {
            const markAllReadButton = document.getElementById('mark-all-notifications-as-read');
            if (markAllReadButton) {
                markAllReadButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    fetch('{{ route("business.notifications.markAllRead") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert('Failed to mark notifications as read.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    });
                });
            }
        });
        window.notificationScriptLoaded = true;
    }
</script>
@endpush 