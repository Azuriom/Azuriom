<li class="nav-item dropdown notifications-dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- Counter - Notifications -->
        <i class="fas fa-bell fa-fw"></i>
        @if(! $notifications->isEmpty())
            <span class="badge badge-danger" id="notificationsCounter">{{ $notifications->count() }}</span>
        @endif
    </a>

    <!-- Dropdown - Notifications -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="notificationsDropdown">
        <h6 class="dropdown-header">{{ trans('messages.notifications.notifications') }}</h6>

        @if(! $notifications->isEmpty())
            <div id="notifications">
                @foreach($notifications as $notification)
                    <a href="#" class="dropdown-item media align-items-center">
                        <div class="mr-3">
                            <div class="rounded-circle text-white p-1 bg-{{ $notification->level }}">
                                <i class="fas fa-{{ $notification->icon() }} fa-fw m-2"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="small">{{ format_date($notification->created_at, true) }}</div>
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
            <i class="fas fa-check"></i> {{ trans('messages.notifications.empty') }}
        </div>
    </div>
</li>
