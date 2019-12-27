<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <title>{{ trans('errors.error') }} | Azuriom</title>

    <!-- Styles -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html,
        body,
        #app {
            height: 100%;
        }

        body {
            color: #fff;
            background: linear-gradient(-75deg,#58c3ff,#004de6 55%,#003bb1);
        }

        .azuriom-logo {
            width: 100%;
            max-width: 500px;
            margin-bottom: 2rem;
        }

        .error-code {
            font-size: 5rem;
        }
    </style>
</head>

<div id="app" class="d-flex align-items-center justify-content-center">
    <main class="text-center">
        <img src="https://azuriom.com/assets/svg/logo-text-white.svg" class="azuriom-logo" alt="Azuriom logo">

        <h1>{{ trans('errors.whoops') }}</h1>
        <h2 class="mb-3">{{ trans('errors.fallback.message', ['code' => $code ?? 500]) }}</h2>

        <a href="{{ route('home') }}" class="btn btn-success">{{ trans('messages.home') }}</a>
    </main>
</div>

</html>
