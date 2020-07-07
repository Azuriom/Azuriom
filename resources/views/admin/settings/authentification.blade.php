@extends('admin.layouts.admin')

@section('title', trans('admin.settings.auth.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.settings.auth.title') }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.auth.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="conditionsInput">{{ trans('admin.settings.auth.conditions-url') }}</label>
                    <input type="text" class="form-control @error('conditions') is-invalid @enderror" id="conditionsInput" name="conditions" value="{{ old('conditions', $conditions) }}">

                    @error('conditions')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="registerInput" name="register" @if($register) checked @endif aria-describedby="registerInput">
                        <label class="custom-control-label" for="registerInput">{{ trans('admin.settings.auth.enable-user-registration') }}</label>
                    </div>

                    <small id="registerInput" class="form-text">{{ trans('admin.settings.auth.enable-user-registration-label') }}</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="authApiInput" name="auth-api" @if($authApi) checked @endif aria-describedby="authApiInfo">
                        <label class="custom-control-label" for="authApiInput">{{ trans('admin.settings.auth.auth-api') }}</label>
                    </div>

                    <small id="authApiInfo" class="form-text">@lang('admin.settings.auth.auth-api-label')</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="minecraftVerifInput" name="minecraft-verification" @if($minecraftVerification) checked @endif>
                        <label class="custom-control-label" for="minecraftVerifInput">{{ trans('admin.settings.auth.minecraft-verification') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.settings.security.title') }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.security.update') }}" method="POST">
                @csrf

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="recaptcha" data-toggle="collapse" data-target="#captchaGroup" @if($showReCaptcha) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">{{ trans('admin.settings.security.recaptcha') }}</label>
                </div>

                <div id="captchaGroup" class="{{ $showReCaptcha ? 'show' : 'collapse' }}">
                    <div class="card card-body mb-2">
                        <div class="form-group">
                            <label for="siteKeyInput">{{ trans('admin.settings.security.recaptcha-site-key') }}</label>
                            <input type="text" class="form-control @error('recaptcha-site-key') is-invalid @enderror" id="siteKeyInput" name="recaptcha-site-key" value="{{ old('recaptcha-site-key', setting('recaptcha-site-key', '')) }}">

                            @error('recaptcha-site-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <label for="secretKeyInput">{{ trans('admin.settings.security.recaptcha-secret-key') }}</label>
                            <input type="text" class="form-control @error('recaptcha-secret-key') is-invalid @enderror" id="secretKeyInput" name="recaptcha-secret-key" value="{{ old('recaptcha-secret-key', setting('recaptcha-secret-key', '')) }}" aria-describedby="secretKeyInfo">

                            @error('recaptcha-secret-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small id="secretKeyInfo" class="form-text">@lang('admin.settings.security.recaptcha-info')</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hashSelect">{{ trans('admin.settings.security.hash') }}</label>
                    <select class="custom-select @error('hash') is-invalid @enderror" id="hashSelect" name="hash" required aria-describedby="hashInfo">
                        @foreach($hashAlgorithms as $hash => $hashName)
                            <option value="{{ $hash }}" @if($currentHash === $hash) selected @endif>{{ $hashName }}</option>
                        @endforeach
                    </select>

                    @error('hash')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="hashInfo" class="form-text">{{ trans('admin.settings.security.hash-info') }}</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
