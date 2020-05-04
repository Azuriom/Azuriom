<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ site_name() }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach($navbar as $element)
                    @if(!$element->isDropdown())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $element->name }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $element->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($element->elements as $childElement)
                                    <a class="dropdown-item" href="{{ $childElement->getLink() }}" @if($childElement->new_tab) target="_blank" rel="noopener" @endif>{{ $childElement->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                    </li>

                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle no-arrow" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- Counter - Notifications -->
                        <i class="fas fa-bell fa-fw"></i>
                            <span class="badge badge-danger badge-counter">{{count(Auth::user()->unreadNotifications)}}</span>
                        </a>
                        <!-- Dropdown - Notifications -->
                        
                        @if (count(Auth::user()->notifications) != 0)
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notificationsDropdown">
                                <h6 class="dropdown-header">{{ trans('admin.notifications.notifications') }}</h6>
                                @foreach (Auth::user()->notifications()->take(5)->get() as $notification)
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('notifications.read_one', ['notification' => $notification->id]) }}">
                                    <div class="mr-3">
                                        <div class="{{ $notification->data['background'] }}">
                                            @if ($notification->read_at)
                                                <i class="{{ $notification->data['icon_read'] }}"></i>
                                            @else
                                                <i class="{{ $notification->data['icon_not_read'] }}"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{ $notification->created_at }}</div>
                                        <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
                                    </div>
                                </a>
                                @endforeach
                                
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifications.read_all') }}">{{ trans('admin.notifications.mark-as-read') }}</a>
                            </div>
                        @endif
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ trans('messages.nav.profile') }}
                            </a>

                            @if(Auth::user()->hasAdminAccess())
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ trans('messages.nav.admin') }}
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ trans('auth.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
