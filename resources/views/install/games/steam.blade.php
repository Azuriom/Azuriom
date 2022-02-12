@extends('install.games.layout')

@section('game')
    <div class="mb-3">
        <label class="form-label" for="steamProfile">{{ trans('install.game.steam.profile') }}</label>

        <input id="steamProfile" type="url" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="https://steamcommunity.com/id/****" required value="{{ old('url') }}">

        @error('url')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small class="form-text text-muted">{{ trans('install.game.steam.profile_info') }}</small>
    </div>

    <div class="mb-3">
        <label class="form-label" for="steamKey">{{ trans('install.game.steam.key') }}</label>

        <input id="steamKey" type="text" class="form-control @error('key') is-invalid @enderror" name="key" required value="{{ old('key') }}">

        @error('key')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small class="form-text text-muted">
            @lang('install.game.steam.key_info')
        </small>
    </div>
@endsection
