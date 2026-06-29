@extends('install.layout')

@section('content')
    <div id="gameSelect" class="text-center">
        <h2 class="mb-3">{{ trans('install.game.title') }}</h2>

        <p class="text-danger font-weight-bold">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('install.game.warn') }}
        </p>

        <div class="row g-md-5 g-4 justify-content-center">
            @foreach ($games as $key => $game)
                <div class="col-md-3 col-6">
                    <a href="{{ route('install.game', $key) }}">
                        <img src="{{ url($game['logo']) }}" alt="{{ $game['name'] }}" class="img-fluid rounded mb-1">

                        <p>{{ $game['name'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
