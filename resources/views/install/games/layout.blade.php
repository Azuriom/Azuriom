@extends('install.layout')

@section('content')
    <form method="POST">
        @csrf

        <a href="{{ route('install.games') }}" class="btn btn-secondary rounded-pill mb-3">
            <i class="bi bi-arrow-left"></i> {{ trans('install.back') }}
        </a>

        <h2>{{ $gameName }}</h2>

        <div class="mb-3 mb-4">
            <label class="form-label" for="locale">{{ trans('install.game.locale') }}</label>

            <select name="locale" class="form-select @error('locale') is-invalid @enderror" id="locale" required>
                @foreach($locales as $localeId => $localeName)
                    <option value="{{ $localeId }}" @selected($localeId === old('locale', app()->getLocale()))>{{ $localeName }}</option>
                @endforeach
            </select>

            @error('locale')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        @yield('game')

        <div class="text-center">
            <button type="submit" class="btn btn-primary rounded-pill">
                {{ trans('install.game.install') }} <i class="bi bi-check-lg"></i>
            </button>
        </div>
    </form>
@endsection
