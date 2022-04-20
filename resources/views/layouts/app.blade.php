@extends('layouts.base')

@section('app')
    <main class="container content">
        @include('elements.session-alerts')

        @yield('content')
    </main>
@endsection
