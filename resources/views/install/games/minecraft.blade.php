@extends('install.games.layout')

@section('game')
    <h3>{{ trans('install.game.user.title') }}</h3>

    <div class="mb-3">
        <label class="form-label" for="name">{{ trans('install.game.user.name') }}</label>

        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="name" required value="{{ old('name', '') }}">

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">{{ trans('install.game.user.email') }}</label>

        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required value="{{ old('email', '') }}">

        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">{{ trans('install.game.user.password') }}</label>

        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>

        @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="password-confirm">{{ trans('install.game.user.password_confirm') }}</label>

        <input name="password_confirmation" id="password-confirm" type="password" class="form-control" autocomplete="new-password" required>
    </div>

    @if($game !== 'mc-bedrock')
        <div class="form-check form-switch">
            <input name="minecraftPremium" type="checkbox" class="form-check-input" id="minecraftPremiumSwitch">
            <label class="form-check-label" for="minecraftPremiumSwitch">
                {{ trans('install.game.minecraft.premium') }}
            </label>
        </div>
    @endif

    <small class="form-text text-danger mb-3">{{ trans('install.game.warn') }}</small>
@endsection
