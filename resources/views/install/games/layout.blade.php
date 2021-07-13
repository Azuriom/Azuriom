@extends('install.layout')

@section('content')
    <form method="POST">
        @csrf

        <a href="{{ route('install.games') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> {{ trans('install.back') }}
        </a>

        <h2>{{ $gameName }}</h2>

        <div class="form-group mb-4">
            <label for="locale">{{ trans('install.game.locale') }}</label>

            <select name="locale" class="custom-select @error('locale') is-invalid @enderror" id="locale" required>
                @foreach($locales as $localeId => $localeName)
                    <option value="{{ $localeId }}" @if($localeId === old('locale')) selected @endif>{{ $localeName }}</option>
                @endforeach
            </select>

            @error('locale')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        @yield('game')

        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                {{ trans('install.game.install') }} <i class="fas fa-check"></i>
            </button>
        </div>
    </form>
@endsection
