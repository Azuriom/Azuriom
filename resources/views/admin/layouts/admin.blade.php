<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/admin.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,600,800&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/admin.css') }}" rel="stylesheet">
    @if(dark_theme())
        <link href="{{ asset('admin/css/dark.css') }}" rel="stylesheet">
    @endif
    @stack('styles')
</head>
<body>
    <!-- Page Wrapper -->
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                    <div class="sidebar-brand-text mx-3">
                        <img src="{{ asset('svg/azuriom-text-white.svg') }}" alt="Azuriom">

                        <small class="d-block text-center font-weight-bold">
                            {{ game()->name() }} - v{{ Azuriom::version() }}
                        </small>
                    </div>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item {{ add_active('admin.dashboard') }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-fw fa-tachometer-alt"></i> {{ trans('admin.nav.dashboard') }}
                        </a>
                    </li>

                    @canany(['admin.settings', 'admin.navbar', 'admin.servers'])
                        <li class="sidebar-header">
                            {{ trans('admin.nav.settings.heading') }}
                        </li>
                    @endcanany

                    @can('admin.settings')
                        <li class="sidebar-item {{ add_active('admin.settings.*', 'admin.social-links.*') }}">
                            <a class="sidebar-link {{ Route::is('admin.settings.*', 'admin.social-links.*') ? '' : 'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
                                <i class="fas fa-fw fa-cogs"></i>
                                <span>{{ trans('admin.nav.settings.heading') }}</span>
                            </a>
                            <ul id="collapseSettings" class="sidebar-dropdown list-unstyled collapse {{ Route::is('admin.settings.*', 'admin.social-links.*') ? 'show' : ''}}" data-parent="#accordionSidebar">
                                <li class="sidebar-item {{ add_active('admin.settings.index') }}">
                                    <a class="sidebar-link" href="{{ route('admin.settings.index') }}">
                                        {{ trans('admin.nav.settings.global') }}
                                    </a>
                                </li>
                                <li class="sidebar-item {{ add_active('admin.settings.seo') }}">
                                    <a class="sidebar-link" href="{{ route('admin.settings.seo') }}">
                                        {{ trans('admin.nav.settings.seo') }}
                                    </a>
                                </li>
                                @if(! oauth_login())
                                    <li class="sidebar-item {{ add_active('admin.settings.auth') }}">
                                        <a class="sidebar-link" href="{{ route('admin.settings.auth') }}">
                                            {{ trans('admin.nav.settings.auth') }}
                                        </a>
                                    </li>
                                @endif
                                <li class="sidebar-item {{ add_active('admin.settings.mail') }}">
                                    <a class="sidebar-link" href="{{ route('admin.settings.mail') }}">
                                        {{ trans('admin.nav.settings.mail') }}
                                    </a>
                                </li>
                                <li class="sidebar-item {{ add_active('admin.settings.performance') }}">
                                    <a class="sidebar-link" href="{{ route('admin.settings.performance') }}">
                                        {{ trans('admin.nav.settings.performances') }}
                                    </a>
                                </li>
                                <li class="sidebar-item {{ add_active('admin.settings.maintenance') }}">
                                    <a class="sidebar-link" href="{{ route('admin.settings.maintenance') }}">
                                        {{ trans('admin.nav.settings.maintenance') }}
                                    </a>
                                <li class="sidebar-item {{ add_active('admin.social-links.*') }}">
                                    <a class="sidebar-link" href="{{ route('admin.social-links.index') }}">
                                        {{ trans('admin.nav.settings.social') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('admin.navbar')
                        <li class="sidebar-item {{ add_active('admin.navbar-elements.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.navbar-elements.index') }}">
                                <i class="fas fa-fw fa-bars"></i>
                                <span>{{ trans('admin.nav.settings.navbar') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.servers')
                        <li class="sidebar-item {{ add_active('admin.servers.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.servers.index') }}">
                                <i class="fas fa-fw fa-server"></i>
                                <span>{{ trans('admin.nav.settings.servers') }}</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['admin.users', 'admin.roles'])
                        <!-- Heading -->
                        <li class="sidebar-header">{{ trans('admin.nav.users.heading') }}</li>
                    @endcanany

                    @can('admin.users')
                        <li class="sidebar-item {{ add_active('admin.users.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                                <i class="fas fa-fw fa-users"></i>
                                <span>{{ trans('admin.nav.users.users') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.roles')
                        <li class="sidebar-item {{ add_active('admin.roles.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.roles.index') }}">
                                <i class="fas fa-fw fa-user-tag"></i>
                                <span>{{ trans('admin.nav.users.roles') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.users')
                        <li class="sidebar-item {{ add_active('admin.bans.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.bans.index') }}">
                                <i class="fas fa-fw fa-user-times"></i>
                                <span>{{ trans('admin.nav.users.bans') }}</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['admin.pages', 'admin.posts', 'admin.images', 'admin.redirects'])
                        <li class="sidebar-header">{{ trans('admin.nav.content.heading') }}</li>
                    @endcanany

                    @can('admin.pages')
                        <li class="sidebar-item {{ add_active('admin.pages.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.pages.index') }}">
                                <i class="fas fa-fw fa-file-alt"></i>
                                <span>{{ trans('admin.nav.content.pages') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.posts')
                        <li class="sidebar-item {{ add_active('admin.posts.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.posts.index') }}">
                                <i class="fas fa-fw fa-newspaper"></i>
                                <span>{{ trans('admin.nav.content.posts') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.images')
                        <li class="sidebar-item {{ add_active('admin.images.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.images.index') }}">
                                <i class="fas fa-fw fa-image"></i>
                                <span>{{ trans('admin.nav.content.images') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.redirects')
                        <li class="sidebar-item {{ add_active('admin.redirects.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.redirects.index') }}">
                                <i class="fas fa-fw fa-directions"></i>
                                <span>{{ trans('admin.nav.content.redirects') }}</span>
                            </a>
                        </li>
                    @endcan

                    @canany(['admin.plugins', 'admin.themes'])
                        <li class="sidebar-header">{{ trans('admin.nav.extensions.heading') }}</li>
                    @endcan

                    @can('admin.plugins')
                        <li class="sidebar-item {{ add_active('admin.plugins.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.plugins.index') }}">
                                <i class="fas fa-fw fa-puzzle-piece"></i>
                                <span>{{ trans('admin.nav.extensions.plugins') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.themes')
                        <li class="sidebar-item {{ add_active('admin.themes.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.themes.index') }}">
                                <i class="fas fa-fw fa-paint-brush"></i>
                                <span>{{ trans('admin.nav.extensions.themes') }}</span>
                            </a>
                        </li>
                    @endcan

                    @if(! plugins()->getAdminNavItems()->isEmpty())
                        <li class="sidebar-header">Plugins</li>
                    @endif

                    @foreach(plugins()->getAdminNavItems() as $navId => $navItem)
                        @if(! isset($navItem['permission']) || Gate::check($navItem['permission']))
                            @if($navItem['type'] ?? '' === 'dropdown')
                                <li class="sidebar-item @isset($navItem['route']) {{ add_active($navItem['route']) }} @endisset">
                                    <a class="sidebar-link @if(! isset($navItem['route']) || ! Route::is($navItem['route'])) collapsed @endif" href="#" data-bs-toggle="collapse" data-bs-target="#collapse{{ ucfirst($navId) }}" aria-expanded="true" aria-controls="collapse{{ ucfirst($navId) }}">
                                        <i class="fa-fw {{ $navItem['icon'] }}"></i>
                                        <span>{{ $navItem['name'] }}</span>
                                    </a>
                                    <ul id="collapse{{ ucfirst($navId) }}" class="sidebar-dropdown list-unstyled collapse @if(isset($navItem['route']) && Route::is($navItem['route'])) show @endif" data-parent="#accordionSidebar">
                                        @foreach($navItem['items'] ?? [] as $route => $name)
                                            <li class="sidebar-item {{ add_active(str_replace('index', '*', $route)) }}">
                                                <a class="sidebar-link" href="{{ route($route) }}">
                                                    {{ $name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item {{ add_active($navItem['route']) }}">
                                    <a class="sidebar-link" href="{{ route($navItem['route']) }}">
                                        <i class="fa-fw {{ $navItem['icon'] }}"></i>
                                        <span>{{ $navItem['name'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach

                    @canany(['admin.update', 'admin.logs'])
                        <li class="sidebar-header">{{ trans('admin.nav.other.heading') }}</li>
                    @endcanany

                    @can('admin.update')
                        <li class="sidebar-item {{ add_active('admin.update.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.update.index') }}">
                                <i class="fas fa-fw fa-cloud-download-alt"></i>
                                <span>{{ trans('admin.nav.other.update') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin.logs')
                        <li class="sidebar-item {{ add_active('admin.logs.*') }}">
                            <a class="sidebar-link" href="{{ route('admin.logs.index') }}">
                                <i class="fas fa-fw fa-history"></i>
                                <span>{{ trans('admin.nav.other.logs') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </nav>

        <!-- Content Wrapper -->
        <div class="main">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light navbar-bgw">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <a href="https://azuriom.com/discord" class="btn btn-outline-primary mx-1" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-question-circle"></i>
                            {{ trans('admin.nav.support') }}
                        </a>

                        <a href="https://azuriom.com/docs" class="btn btn-outline-secondary mx-1" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-book"></i>
                            {{ trans('admin.nav.documentation') }}
                        </a>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav navbar-align">
                        @if($hasUpdate)
                            @can('admin.update')
                                <li class="nav-item">
                                    <a class="nav-icon text-info" href="{{ route('admin.update.index') }}">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                </li>
                            @endcan
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="position-relative">
                                    <!-- Counter - Notifications -->
                                    <i class="fas fa-bell fa-xs fa-fw"></i>
                                    @if(! $notifications->isEmpty())
                                        <span class="indicator" id="notificationsCounter">{{ $notifications->count() }}</span>
                                    @endif
                                </div>
                            </a>

                            <!-- Dropdown - Notifications -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="notificationsDropdown">
                                <div class="dropdown-menu-header">
                                    {{ trans('messages.notifications.notifications') }}
                                </div>

                                @if(! $notifications->isEmpty())
                                    <div id="notifications" class="list-group">
                                        @foreach($notifications as $notification)
                                            <a href="{{ $notification->link ? url($notification->link) : '#' }}" class="list-group-item">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-2 text-{{ $notification->level }}">
                                                        <span class="d-inline-block rounded-circle border border-{{ $notification->level }}">
                                                            <i class="fas fa-{{ $notification->icon() }} fa-fw m-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="text-dark">
                                                            {{ $notification->content }}
                                                        </p>
                                                        <small class="text-muted">
                                                            {{ format_date($notification->created_at, true) }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                        <div class="dropdown-menu-footer">
                                            <a href="{{ route('notifications.read.all') }}" id="readNotifications" class="text-muted">
                                                <span class="d-none spinner-border spinner-border-sm loader" role="status"></span>
                                                {{ trans('messages.notifications.read') }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <div id="noNotificationsLabel" class="dropdown-menu-footer text-success @if(! $notifications->isEmpty()) d-none @endif">
                                    <i class="fas fa-check"></i> {{ trans('messages.notifications.empty') }}
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('profile.theme') }}" class="nav-icon" data-route="theme">
                                <i class="fas fa-xs fa-fw fa-{{ dark_theme() ? 'sun' : 'moon' }}" title="{{ trans('messages.theme.'.(dark_theme() ? 'light' : 'dark')) }}" data-bs-toggle="tooltip"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="avatar img-fluid rounded me-1" src="{{ auth()->user()->getAvatar() }}" alt="Avatar">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw me-1"></i>
                                    {{ trans('admin.nav.profile.profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fas fa-home fa-sm fa-fw me-1"></i>
                                    {{ trans('admin.nav.back') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-route="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-1"></i>
                                    {{ trans('auth.logout') }}
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>

            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">@yield('title', 'Admin')</h1>

                    @include('admin.elements.session-alerts')

                    @yield('content')
                </div>

                <!-- Delete confirm modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="confirmDeleteLabel">{{ trans('admin.delete.title') }}</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">{{ trans('admin.delete.description') }}</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                    <i class="fas fa-arrow-left"></i> {{ trans('messages.actions.cancel') }}</button>
                                <form id="confirmDeleteForm" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-exclamation-triangle"></i> {{ trans('messages.actions.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <p class="mb-0 py-2 text-center text-muted">
                        @lang('admin.footer', [
                            'year' => '2019-'.now()->year,
                            'azuriom' => '<a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>',
                            'startbootstrap' => '<a href="https://adminkit.io/" target="_blank" rel="noopener noreferrer">AdminKit</a>'
                        ])
                    </p>
                </div>
            </footer>
        </div>
    </div>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<form id="themeForm" action="{{ route('profile.theme') }}" method="POST" class="d-none">
    @csrf

    <input type="hidden" name="theme" value="{{ dark_theme() ? 'light' : 'dark' }}">
</form>

@stack('footer-scripts')

</body>
</html>
