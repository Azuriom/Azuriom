<li class="nav-item dropdown notifications-dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- Counter - Notifications -->
        <i class="bi bi-bell"></i>
        @if(! $notifications->isEmpty())
            <span class="badge bg-danger" id="notificationsCounter">{{ $notifications->count() }}</span>
        @endif
    </a>

    <!-- Dropdown - Notifications -->
    <div class="dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
        <h6 class="dropdown-header">{{ trans('messages.notifications.notifications') }}</h6>

        @if(! $notifications->isEmpty())
            <div id="notifications">
                @foreach($notifications as $notification)
                    <a href="{{ $notification->link ? url($notification->link) : '#' }}" class="dropdown-item d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle text-white p-1 bg-{{ $notification->level }}">
                                <i class="bi bi-{{ $notification->icon() }} m-1"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="small text-muted">{{ format_date($notification->created_at, true) }}</div>
                            {{ $notification->content }}
                        </div>
                    </a>
                @endforeach

                <a href="{{ route('notifications.read.all') }}" id="readNotifications" class="dropdown-item text-center small text-gray-500">
                    <span class="d-none spinner-border spinner-border-sm load-spinner" role="status"></span>
                    {{ trans('messages.notifications.read') }}
                </a>
            </div>
        @endif

        <div id="noNotificationsLabel" class="dropdown-item text-center small text-success @if(! $notifications->isEmpty()) d-none @endif">
            <i class="bi bi-check-lg"></i> {{ trans('messages.notifications.empty') }}
        </div>
    </div>
</li>
