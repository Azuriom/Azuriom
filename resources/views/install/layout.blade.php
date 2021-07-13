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
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-vue@2/dist/bootstrap-vue-icons.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-vue@2/dist/bootstrap-vue.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    @stack('scripts')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-vue@2/dist/bootstrap-vue.min.css" rel="stylesheet">
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
                    <img src="https://azuriom.com/assets/svg/logo-text.svg" alt="Azuriom" class="logo mb-4">
                </div>

                <h1 class="text-center">{{ trans('install.title') }}</h1>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')

                <hr>

                <footer class="text-center">
                    <form method="GET" class="d-inline-block mb-1 mx-1">
                        <input type="hidden" name="locale" value="en">
                        <button class="btn btn-link p-0" title="English">
                            <svg height="1.75rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
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
                            <svg height="1.75rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
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
