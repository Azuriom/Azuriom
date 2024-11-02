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

        <div class="modal fade" id="confirmModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans('install.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ trans('messages.actions.close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fw-bold">{{ trans('install.game.warn') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                            <i class="bi bi-arrow-left"></i> {{ trans('install.back') }}
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            {{ trans('install.game.install') }} <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#confirmModal">
                {{ trans('install.game.install') }} <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </form>
@endsection
