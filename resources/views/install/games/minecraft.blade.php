@extends('install.games.layout')

@section('game')
    @if($game !== 'mc-bedrock')
        <div class="mb-3">
            <label class="form-label" for="oauth">
                {{ trans('install.game.minecraft.premium') }}
            </label>

            <select name="oauth" class="form-select @error('oauth') is-invalid @enderror" id="oauth" data-toggle-select="oauth" required>
                <option value=""></option>
                <option value="1" @selected(old('oauth') === '1')>
                    {{ trans('messages.yes') }}
                </option>
                <option value="0" @selected(old('oauth') === '0')>
                    {{ trans('messages.no') }}
                </option>
            </select>

            @error('oauth')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <p class="form-text text-danger">
                <i class="bi bi-exclamation-triangle"></i> {{ trans('install.game.warn') }}
            </p>
        </div>

        <div data-oauth="1">
            <h3>{{ trans('install.game.user.title') }}</h3>

            <div class="mb-3">
                <label class="form-label" for="uuid">Minecraft UUID</label>

                <input name="uuid" id="uuid" type="text" class="form-control @error('uuid') is-invalid @enderror" value="{{ old('uuid', '') }}">

                @error('uuid')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div data-oauth="0">
            <h3>{{ trans('install.game.user.title') }}</h3>

            <div class="mb-3">
                <label class="form-label" for="name">{{ trans('install.game.user.name') }}</label>

                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{ old('name', '') }}">

                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">{{ trans('install.game.user.email') }}</label>

                <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" value="{{ old('email', '') }}">

                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">{{ trans('install.game.user.password') }}</label>

                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-confirm">{{ trans('install.game.user.password_confirm') }}</label>

                <input name="password_confirmation" id="password-confirm" type="password" class="form-control" autocomplete="new-password">
            </div>
        </div>
    @else
        <div data-game="mc-bedrock">
            <h3>{{ trans('install.game.user.title') }}</h3>

            <div class="mb-3">
                <label class="form-label" for="xuid">Xbox Live XUID</label>

                <input name="xuid" id="xuid" type="text" class="form-control @error('xuid') is-invalid @enderror" placeholder="0123456789012345" value="{{ old('xuid', '') }}">

                @error('xuid')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
    @endif
@endsection
