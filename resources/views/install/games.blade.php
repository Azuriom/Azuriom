@extends('install.layout')

@section('content')
    <div id="gameSelect" class="text-center">
        <div class="text-left">
            <a href="{{ route('install.database') }}" class="btn btn-secondary rounded-pill mb-3">
                <i class="bi bi-arrow-left"></i> {{ trans('install.back') }}
            </a>
        </div>

        <h2 class="mb-3">{{ trans('install.game.title') }}</h2>

        <div class="row justify-content-center mb-3">
            @foreach ($games as $key => $game)
                <div class="col-md-3">
                    <a href="{{ route('install.game', $key) }}">
                        <img src="{{ url($game['logo']) }}" alt="{{ $game['name'] }}" class="img-fluid rounded mb-1">

                        <p>{{ $game['name'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <p class="text-danger font-weight-bold mb-0">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('install.game.warn') }}
        </p>
    </div>
@endsection
