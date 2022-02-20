<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        #app {
            flex-shrink: 0;
        }

        .content {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .user-html-content img {
            max-width: 100%;
            height: auto;
        }

        footer {
            background: #232323;
        }
    </style>
</head>

<body>
<div id="app">
    <header>
        @include('elements.navbar')
    </header>

    @yield('app')
</div>

<footer class="text-white mt-auto py-4 text-center">
    <div class="copyright">
        <div class="container">
            <p>{{ setting('copyright') }} | @lang('messages.copyright')</p>

            @foreach(social_links() as $link)
                <a href="{{ $link->value }}" title="{{ $link->title }}" target="_blank" rel="noopener noreferrer" class="btn">
                    <i class="{{ $link->icon }} fa-2x" style="color: {{ $link->color }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</footer>

@stack('footer-scripts')

</body>
</html>
