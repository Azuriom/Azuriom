<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') | {{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/admin.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,800" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
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
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Azuriom <sup>{{ \Azuriom\Azuriom::version() }}</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <div class="nav-item {{ add_active('admin.dashboard') }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Settings
            </div>

            <div class="nav-item {{ add_active('admin.settings.*') }}">
                <a class="nav-link {{ Route::is('admin.settings.*') ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseSettings" class="collapse {{ Route::is('admin.settings.*') ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Settings</h6>
                        <a class="collapse-item" href="{{ route('admin.settings.index') }}">Global settings</a>
                        <a class="collapse-item" href="{{ route('admin.settings.security') }}">Security</a>
                        <a class="collapse-item" href="#">SEO</a>
                        <a class="collapse-item" href="#">Maintenance</a>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Users
            </div>

            <div class="nav-item {{ add_active('admin.users.*') }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </div>

            <div class="nav-item {{ add_active('admin.roles.*') }}">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                    <i class="fas fa-fw fa-user-tag"></i>
                    <span>Roles</span></a>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Content
            </div>

            <div class="nav-item {{ add_active('admin.pages.*') }}">
                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pages</span></a>
            </div>

            <div class="nav-item {{ add_active('admin.posts.*') }}">
                <a class="nav-link" href="{{ route('admin.posts.index') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>News</span></a>
            </div>

            <div class="nav-item {{ add_active('admin.images.*') }}">
                <a class="nav-link" href="{{ route('admin.images.index') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Images</span></a>
            </div>

            <div class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Navbar</span></a>
            </div>

            <!-- Divider -->
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Alerts</h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show all Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">Message</h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read all Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="https://www.gravatar.com/avatar/4998278afe6b74f3a24e89331ceea87c?size=512" alt="Avatar">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-route="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
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

                    @include('elements.session-alerts')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://azuriom.com" target="_blank" rel="noreferrer">Azuriom CMS</a> 2019. Template by <a href="https://startbootstrap.com" target="_blank">Start Bootstrap</a>.</span>
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
                <h2 class="modal-title" id="confirmDeleteLabel">Delete ?</h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete this element ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary d-inline-block" type="button" data-dismiss="modal">Cancel</button>
                <form id="confirmDeleteForm" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary" type="submit">Delete</button>
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
