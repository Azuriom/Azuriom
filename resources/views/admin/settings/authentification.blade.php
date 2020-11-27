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
                    <input type="text" class="form-control @error('conditions') is-invalid @enderror" id="conditionsInput" name="conditions" value="{{ old('conditions', $conditions) }}" aria-describedby="conditionsLabel">

                    @error('conditions')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="conditionsLabel" class="form-text">{{ trans('admin.settings.auth.conditions-info') }}</small>
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

                <div class="form-group">
                    <label for="captchaSelect">{{ trans('admin.settings.security.captcha.title') }}</label>
                    <select class="custom-select @error('captcha') is-invalid @enderror" id="captchaSelect" name="captcha" data-toggle-select="captcha-type">
                        <option value="">{{ trans('messages.none') }}</option>
                        <option value="hcaptcha" @if($captchaType === 'hcaptcha') selected @endif>hCaptcha</option>
                        <option value="recaptcha" @if($captchaType === 'recaptcha') selected @endif>reCaptcha</option>
                    </select>

                    @error('captcha')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div data-captcha-type="recaptcha hcaptcha">
                    <div class="card card-body mb-2">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="siteKeyInput">{{ trans('admin.settings.security.captcha.site-key') }}</label>
                                <input type="text" class="form-control @error('site_key') is-invalid @enderror" id="siteKeyInput" name="site_key" value="{{ old('captcha.site_key', setting('captcha.site_key', '')) }}">

                                @error('site_key')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <small class="form-text" data-captcha-type="recaptcha">
                                    @lang('admin.settings.security.captcha.recaptcha')
                                </small>

                                <small class="form-text" data-captcha-type="hcaptcha">
                                    @lang('admin.settings.security.captcha.hcaptcha')
                                </small>
                            </div>

                            <div class="form-group col-md-6 mb-0">
                                <label for="secretKeyInput">{{ trans('admin.settings.security.captcha.secret-key') }}</label>
                                <input type="text" class="form-control @error('secret_key') is-invalid @enderror" id="secretKeyInput" name="secret_key" value="{{ old('secret_key', setting('captcha.secret_key', '')) }}">

                                @error('secret_key')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
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
