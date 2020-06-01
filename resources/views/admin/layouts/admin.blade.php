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
    <link rel="shortcut icon" href="{{ asset('img/azuriom.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('vendor/sb-admin-2/js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/admin.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('svg/azuriom-white.svg') }}" alt="Azuriom">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="{{ asset('svg/azuriom-text-white.svg') }}" alt="Azuriom"><sup>{{ Azuriom::version() }}</sup>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <div class="nav-item {{ add_active('admin.dashboard') }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ trans('admin.nav.dashboard') }}</span></a>
            </div>

            @canany(['admin.settings', 'admin.navbar', 'admin.servers'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">{{ trans('admin.nav.settings.heading') }}</div>
            @endcanany

            @can('admin.settings')
                <div class="nav-item {{ add_active('admin.settings.*') }}">
                    <a class="nav-link {{ Route::is('admin.settings.*') ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>{{ trans('admin.nav.settings.heading') }}</span>
                    </a>
                    <div id="collapseSettings" class="collapse {{ Route::is('admin.settings.*') ? 'show' : ''}}" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">{{ trans('admin.nav.settings.settings.settings') }}</h6>
                            <a class="collapse-item {{ add_active('admin.settings.index') }}" href="{{ route('admin.settings.index') }}">{{ trans('admin.nav.settings.settings.global') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.security') }}" href="{{ route('admin.settings.security') }}">{{ trans('admin.nav.settings.settings.security') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.performance') }}" href="{{ route('admin.settings.performance') }}">{{ trans('admin.nav.settings.settings.performances') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.seo') }}" href="{{ route('admin.settings.seo') }}">{{ trans('admin.nav.settings.settings.seo') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.mail') }}" href="{{ route('admin.settings.mail') }}">{{ trans('admin.nav.settings.settings.mail') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.maintenance') }}" href="{{ route('admin.settings.maintenance') }}">{{ trans('admin.nav.settings.settings.maintenance') }}</a>
                            <a class="collapse-item {{ add_active('admin.settings.socials') }}" href="{{ route('admin.settings.socials') }}">{{ trans('admin.nav.settings.settings.socials') }}</a>
                        </div>
                    </div>
                </div>
            @endcan

            @can('admin.navbar')
                <div class="nav-item {{ add_active('admin.navbar-elements.*') }}">
                    <a class="nav-link" href="{{ route('admin.navbar-elements.index') }}">
                        <i class="fas fa-fw fa-bars"></i>
                        <span>{{ trans('admin.nav.settings.navbar') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.servers')
                <div class="nav-item {{ add_active('admin.servers.*') }}">
                    <a class="nav-link" href="{{ route('admin.servers.index') }}">
                        <i class="fas fa-fw fa-server"></i>
                        <span>{{ trans('admin.nav.settings.servers') }}</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.users', 'admin.roles'])
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">{{ trans('admin.nav.users.heading') }}</div>
            @endcanany

            @can('admin.users')
                <div class="nav-item {{ add_active('admin.users.*') }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>{{ trans('admin.nav.users.users') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.roles')
                <div class="nav-item {{ add_active('admin.roles.*') }}">
                    <a class="nav-link" href="{{ route('admin.roles.index') }}">
                        <i class="fas fa-fw fa-user-tag"></i>
                        <span>{{ trans('admin.nav.users.roles') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.users')
                <div class="nav-item {{ add_active('admin.bans.*') }}">
                    <a class="nav-link" href="{{ route('admin.bans.index') }}">
                        <i class="fas fa-fw fa-user-times"></i>
                        <span>{{ trans('admin.nav.users.bans') }}</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.pages', 'admin.posts', 'admin.images'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">{{ trans('admin.nav.content.heading') }}</div>
            @endcanany

            @can('admin.pages')
                <div class="nav-item {{ add_active('admin.pages.*') }}">
                    <a class="nav-link" href="{{ route('admin.pages.index') }}">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>{{ trans('admin.nav.content.pages') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.posts')
                <div class="nav-item {{ add_active('admin.posts.*') }}">
                    <a class="nav-link" href="{{ route('admin.posts.index') }}">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>{{ trans('admin.nav.content.posts') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.images')
                <div class="nav-item {{ add_active('admin.images.*') }}">
                    <a class="nav-link" href="{{ route('admin.images.index') }}">
                        <i class="fas fa-fw fa-image"></i>
                        <span>{{ trans('admin.nav.content.images') }}</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.plugins', 'admin.themes'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">{{ trans('admin.nav.extensions.heading') }}</div>
            @endcan

            @can('admin.plugins')
                <div class="nav-item {{ add_active('admin.plugins.*') }}">
                    <a class="nav-link" href="{{ route('admin.plugins.index') }}">
                        <i class="fas fa-fw fa-puzzle-piece"></i>
                        <span>{{ trans('admin.nav.extensions.plugins') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.themes')
                <div class="nav-item {{ add_active('admin.themes.*') }}">
                    <a class="nav-link" href="{{ route('admin.themes.index') }}">
                        <i class="fas fa-fw fa-paint-brush"></i>
                        <span>{{ trans('admin.nav.extensions.themes') }}</span>
                    </a>
                </div>
            @endcan

            @if(! plugins()->getAdminNavItems()->isEmpty())
                <hr class="sidebar-divider">

                <div class="sidebar-heading">Plugins</div>
            @endif

            @foreach(plugins()->getAdminNavItems() as $navId => $navItem)
                @if(! isset($navItem['permission']) || Gate::check($navItem['permission']))
                    @if($navItem['type'] ?? '' === 'dropdown')
                        <div class="nav-item @isset($navItem['route']) {{ add_active($navItem['route']) }} @endisset">
                            <a class="nav-link @if(! isset($navItem['route']) || ! Route::is($navItem['route'])) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapse{{ ucfirst($navId) }}" aria-expanded="true" aria-controls="collapse{{ ucfirst($navId) }}">
                                <i class="fa-fw {{ $navItem['icon'] }}"></i>
                                <span>{{ trans($navItem['name']) }}</span>
                            </a>
                            <div id="collapse{{ ucfirst($navId) }}" class="collapse @if(isset($navItem['route']) && Route::is($navItem['route'])) show @endif" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    @foreach($navItem['items'] ?? [] as $route => $name)
                                        <a class="collapse-item {{ add_active(str_replace('index', '*', $route)) }}" href="{{ route($route) }}">{{ trans($name) }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="nav-item {{ add_active($navItem['route']) }}">
                            <a class="nav-link" href="{{ route($navItem['route']) }}">
                                <i class="fa-fw {{ $navItem['icon'] }}"></i>
                                <span>{{ trans($navItem['name']) }}</span>
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach

            @canany(['admin.update', 'admin.logs'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">{{ trans('admin.nav.other.heading') }}</div>
            @endcanany

            @can('admin.update')
                <div class="nav-item {{ add_active('admin.update.*') }}">
                    <a class="nav-link" href="{{ route('admin.update.index') }}">
                        <i class="fas fa-fw fa-cloud-download-alt"></i>
                        <span>{{ trans('admin.nav.other.update') }}</span>
                    </a>
                </div>
            @endcan

            @can('admin.logs')
                <div class="nav-item {{ add_active('admin.logs.*') }}">
                    <a class="nav-link" href="{{ route('admin.logs.index') }}">
                        <i class="fas fa-fw fa-history"></i>
                        <span>{{ trans('admin.nav.other.logs') }}</span>
                    </a>
                </div>
            @endcan

            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </nav>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

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
                    <ul class="navbar-nav ml-auto">
                        @if($hasUpdate)
                            @can('admin.update')
                                <li class="nav-item mx-1">
                                    <a class="nav-link text-info" href="{{ route('admin.update.index') }}">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                </li>
                            @endcan
                        @endif

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Counter - Notifications -->
                                <i class="fas fa-bell fa-fw"></i>
                                @if(! $notifications->isEmpty())
                                    <span class="badge badge-danger badge-counter" id="notificationsCounter">{{ $notifications->count() }}</span>
                                @endif
                            </a>

                            <!-- Dropdown - Notifications -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notificationsDropdown">
                                <h6 class="dropdown-header">{{ trans('messages.notifications.notifications') }}</h6>

                                @if(! $notifications->isEmpty())
                                    <div id="notifications">
                                        @foreach($notifications as $notification)
                                            <a href="{{ $notification->link ? url($notification->link) : '#' }}" class="dropdown-item d-flex align-items-center">
                                                <div class="mr-3">
                                                    <div class="icon-circle text-white bg-{{ $notification->level }}">
                                                        <i class="fas fa-{{ $notification->icon() }} fa-fw"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">{{ format_date($notification->created_at, true) }}</div>
                                                    {{ $notification->content }}
                                                </div>
                                            </a>
                                        @endforeach

                                        <a href="{{ route('notifications.read.all') }}" id="readNotifications" class="dropdown-item text-center small text-gray-500">
                                            <span class="d-none spinner-border spinner-border-sm loader" role="status"></span>
                                            {{ trans('messages.notifications.read') }}
                                        </a>
                                    </div>
                                @endif

                                <div id="noNotificationsLabel" class="dropdown-item text-center small text-success @if(! $notifications->isEmpty()) d-none @endif">
                                    <i class="fas fa-check"></i> {{ trans('messages.notifications.empty') }}
                                </div>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ game()->getAvatarUrl(Auth::user()) }}" alt="Avatar">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ trans('admin.nav.profile.profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ trans('admin.nav.back-website') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-route="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ trans('auth.logout') }}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title', 'Admin')</h1>
                    </div>

                    @include('admin.elements.session-alerts')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>
                            @lang('admin.footer', [
                                'year' => '2019-'.now()->year,
                                'azuriom' => '<a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>',
                                'startbootstrap' => '<a href="https://startbootstrap.com" target="_blank" rel="noopener noreferrer">Start Bootstrap</a>'
                            ])
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#app">
        <i class="fas fa-angle-up"></i>
    </a>
</div>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="confirmDeleteLabel">{{ trans('admin.confirm-delete.title') }}</h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">{{ trans('admin.confirm-delete.description') }}</div>
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

<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@stack('footer-scripts')

</body>
</html>
