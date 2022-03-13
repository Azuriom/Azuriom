<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('install.title') }} - Azuriom</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @stack('scripts')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #2b1954;
            background: linear-gradient(45deg, #161334 0%, #181438 36%, #201643 70%, #2b1954 100%);
            font-family: Avenir, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        #app {
            z-index: 5;
            min-height: 100vh;
        }

        #app::before {
            content: '';
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: url('https://azuriom.com/assets/svg/install.svg') no-repeat center / cover;
            z-index: -10;
        }

        .row {
            min-height: 100%;
        }

        .content {
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.2), 0 6px 3px rgba(0, 0, 0, 0.25);
            background: #eee;
            z-index: 15;
        }

        h1 {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        h1::after {
            content: '';
            width: 80px;
            height: 3px;
            bottom: 0;
            right: calc(50% - 40px);
            position: absolute;
            background: #034ce2;
        }

        .logo {
            width: 100%;
            max-width: 350px;
        }

        .btn:not(.btn-link) {
            border-radius: 50rem;
        }

        .btn:not(.btn-link) .spinner-border {
            vertical-align: middle;
        }
    </style>
    @stack('styles')
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-center align-items-center py-3 py-md-5">
            <div class="content col-xl-8 col-lg-10 col-12 p-3 px-md-5 py-md-4 rounded">
                <div class="text-center">
                    <svg viewBox="0 0 2038 500" xmlns="http://www.w3.org/2000/svg" class="mb-4">
                        <g fill="#0763e8">
                            <path d="M718.051,247.999l-132.349,190.174l130.555,0l0,33.812l-186.723,0l0,-18.355l132.9,-189.07l-122.688,0l0,-34.088l178.305,0l0,17.527Z"/>
                            <path d="M975.987,374.413c0,67.9 -32.156,101.712 -96.329,101.712c-61.551,0 -92.327,-32.57 -92.327,-97.847l0,-147.806l40.16,0l0,139.525c0,47.337 18.355,71.074 55.203,71.074c35.468,0 53.271,-22.909 53.271,-68.59l0,-142.009l40.16,0l0,143.941l-0.138,0Z"/>
                            <path d="M1253.93,472.123l-46.784,0l-38.642,-64.726c-3.45,-5.934 -6.901,-11.04 -10.213,-15.181c-3.312,-4.278 -6.624,-7.728 -10.074,-10.35c-3.45,-2.76 -7.177,-4.692 -11.179,-5.934c-4.002,-1.243 -8.556,-1.795 -13.663,-1.795l-16.146,0l0,97.986l-39.884,0l0,-241.651l79.492,0c11.316,0 21.805,1.38 31.327,4.002c9.523,2.76 17.803,6.763 24.98,12.145c7.038,5.382 12.558,12.282 16.56,20.425c4.003,8.142 5.935,17.665 5.935,28.567c0,8.557 -1.242,16.423 -3.726,23.462c-2.485,7.176 -6.073,13.524 -10.765,19.045c-4.692,5.52 -10.213,10.35 -16.837,14.214c-6.624,3.865 -13.939,6.901 -22.219,9.109l0,0.69c4.416,2.484 8.142,5.244 11.455,8.142c3.312,3.036 6.348,6.073 9.246,9.247c2.898,3.174 5.796,6.762 8.694,10.764c2.899,4.003 6.073,8.557 9.523,13.939l42.92,67.9Zm-146.701,-209.219l0,78.664l33.397,0c6.211,0 11.869,-0.966 17.113,-2.898c5.244,-1.932 9.799,-4.693 13.525,-8.281c3.864,-3.588 6.762,-8.004 8.97,-13.111c2.07,-5.106 3.175,-10.902 3.175,-17.388c0,-11.593 -3.589,-20.563 -10.903,-27.188c-7.314,-6.486 -17.803,-9.798 -31.466,-9.798l-33.811,0Z"/>
                            <rect x="1316.45" y="230.472" width="41.264" height="241.651"/>
                            <path d="M1551.2,476.125c-34.778,0 -62.656,-11.317 -83.633,-33.812c-20.977,-22.633 -31.465,-51.891 -31.465,-88.049c0,-38.918 10.626,-69.831 32.017,-93.016c21.391,-23.186 50.373,-34.64 86.945,-34.64c33.95,0 61.275,11.178 81.976,33.674c20.701,22.495 31.052,51.89 31.052,88.048c0,39.47 -10.627,70.522 -31.88,93.431c-21.253,22.909 -49.406,34.364 -85.012,34.364Zm1.932,-214.463c-22.081,0 -40.16,8.28 -53.961,24.703c-13.801,16.423 -20.839,38.228 -20.839,65.139c0,26.912 6.762,48.441 20.149,64.864c13.525,16.423 31.052,24.565 52.857,24.565c23.185,0 41.402,-7.866 54.789,-23.461c13.386,-15.595 20.011,-37.4 20.011,-65.554c0,-28.843 -6.487,-51.2 -19.459,-66.933c-12.835,-15.457 -30.776,-23.323 -53.547,-23.323Z"/>
                            <path d="M2006.35,472.123l-39.746,0l0,-156.363c0,-12.834 0.828,-28.429 2.346,-47.06l-0.69,0c-2.484,10.627 -4.692,18.079 -6.624,22.771l-72.04,180.652l-27.601,0l-72.316,-179.272c-2.07,-5.244 -4.14,-13.248 -6.348,-24.151l-0.69,0c0.966,9.66 1.38,25.393 1.38,47.336l0,155.949l-37.124,0l0,-241.513l56.445,0l63.483,160.916c4.83,12.421 8.004,21.529 9.385,27.602l0.828,0c4.14,-12.697 7.59,-22.081 10.074,-28.292l64.725,-160.226l54.375,0l0,241.651l0.138,0Z"/>
                        </g>
                        <path fill="#1a76fc" d="M202.871,43.058l85.564,0l166.023,429.065l-85.013,0l-166.574,-429.065Z"/>
                        <path fill="#0763e8" d="M245.791,153.326l-42.782,-110.268l-166.161,429.065l85.15,0l123.793,-318.797Z"/>
                        <path fill="#004ce3" d="M121.998,472.123l46.647,-120.343l125.172,-74.524l29.258,75.214l-201.077,119.653Z"/>
                    </svg>
                </div>

                <h1 class="text-center">{{ trans('install.title') }}</h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        {!! session('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')

                <hr>

                <footer class="text-center">
                    <form method="GET" class="d-inline-block mb-1 mx-1">
                        <input type="hidden" name="locale" value="en">
                        <button class="btn btn-link p-0" title="English">
                            <svg height="28" width="28" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
                                <path fill="#00247d" d="M0 9.059V13h5.628zM4.664 31H13v-5.837zM23 25.164V31h8.335zM0 23v3.941L5.63 23zM31.337 5H23v5.837zM36 26.942V23h-5.631zM36 13V9.059L30.371 13zM13 5H4.664L13 10.837z"/>
                                <path fill="#cf1b2b" d="M25.14 23l9.712 6.801c.471-.479.808-1.082.99-1.749L28.627 23H25.14zM13 23h-2.141l-9.711 6.8c.521.53 1.189.909 1.938 1.085L13 23.943V23zm10-10h2.141l9.711-6.8c-.521-.53-1.188-.909-1.937-1.085L23 12.057V13zm-12.141 0L1.148 6.2C.677 6.68.34 7.282.157 7.949L7.372 13h3.487z"/>
                                <path fill="#eee" d="M36 21H21v10h2v-5.836L31.335 31H32c1.117 0 2.126-.461 2.852-1.199L25.14 23h3.487l7.215 5.052c.093-.337.158-.686.158-1.052v-.058L30.369 23H36v-2zM0 21v2h5.63L0 26.941V27c0 1.091.439 2.078 1.148 2.8l9.711-6.8H13v.943l-9.914 6.941c.294.07.598.116.914.116h.664L13 25.163V31h2V21H0zM36 9c0-1.091-.439-2.078-1.148-2.8L25.141 13H23v-.943l9.915-6.942C32.62 5.046 32.316 5 32 5h-.663L23 10.837V5h-2v10h15v-2h-5.629L36 9.059V9zM13 5v5.837L4.664 5H4c-1.118 0-2.126.461-2.852 1.2l9.711 6.8H7.372L.157 7.949C.065 8.286 0 8.634 0 9v.059L5.628 13H0v2h15V5h-2z"/>
                                <path fill="#cf1b2b" d="M21 15V5h-6v10H0v6h15v10h6V21h15v-6z"/>
                            </svg>
                        </button>
                    </form>

                    <form method="GET" class="d-inline-block mb-1 mx-1">
                        <input type="hidden" name="locale" value="fr">
                        <button class="btn btn-link p-0" title="Français">
                            <svg height="28" width="28" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
                                <path fill="#ed2939" d="M36 27c0 2.209-1.791 4-4 4h-8V5h8c2.209 0 4 1.791 4 4v18z"/>
                                <path fill="#002495" d="M4 5C1.791 5 0 6.791 0 9v18c0 2.209 1.791 4 4 4h8V5H4z"/>
                                <path fill="#eee" d="M12 5h12v26H12z"/>
                            </svg>
                        </button>
                    </form>

                    <p class="mb-0">
                        {{ trans('seed.settings.copyright', ['year' => date('Y')]) }}
                    </p>
                </footer>
            </div>
        </div>
    </div>
</div>

<script>
    function updateToggleSelect(selector, el) {
        const value = el.value !== '' ? el.value : 'undefined';

        document.querySelectorAll('[' + selector + ']').forEach(function (el) {
            el.classList.add('d-none');
        });
        document.querySelectorAll('[' + selector + '~="' + value + '"]').forEach(function (el) {
            el.classList.remove('d-none');
        });
    }

    document.querySelectorAll('[data-toggle-select]').forEach(function (el) {
        const selector = 'data-' + el.dataset['toggleSelect'];

        updateToggleSelect(selector, el);

        el.addEventListener('change', function () {
            updateToggleSelect(selector, el);
        });
    });
</script>

</body>
</html>
