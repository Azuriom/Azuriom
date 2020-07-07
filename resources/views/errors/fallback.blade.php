<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <title>{{ trans('errors.error') }} | Azuriom</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html,
        body,
        #app {
            height: 100%;
        }

        body {
            color: #fff;
            background: linear-gradient(-75deg, #58c3ff, #004de6 55%, #003bb1);
        }

        .azuriom-logo {
            width: 100%;
            max-width: 300px;
        }
    </style>
</head>

<div id="app" class="d-flex align-items-center justify-content-center">
    <main class="text-center">
        <img src="{{ asset('svg/azuriom-text-white.svg') }}" class="azuriom-logo mb-3" alt="Azuriom">

        <h1 class="display-2">{{ trans('errors.code', ['code' => $code ?? 500]) }}</h1>
        <h2 class="mb-4">{{ trans('errors.fallback.message') }}</h2>

        <a href="{{ route('home') }}" class="btn btn-secondary">{{ trans('messages.home') }}</a>
    </main>
</div>

</html>
