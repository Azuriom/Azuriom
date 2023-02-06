@extends('admin.layouts.admin')

@section('title', trans('admin.settings.auth.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.settings.auth.title') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.auth.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="conditionsInput">{{ trans('admin.settings.auth.conditions') }}</label>
                    <input type="text" class="form-control @error('conditions') is-invalid @enderror" id="conditionsInput" name="conditions" value="{{ old('conditions', $conditions) }}" aria-describedby="conditionsLabel">

                    @error('conditions')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="conditionsLabel" class="form-text">{{ trans('admin.settings.auth.conditions_info') }}</small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="registerInput" name="register" @checked($register) aria-describedby="registerInput">
                        <label class="form-check-label" for="registerInput">{{ trans('admin.settings.auth.registration') }}</label>
                    </div>

                    <small id="registerInput" class="form-text">{{ trans('admin.settings.auth.registration_info') }}</small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="authApiInput" name="auth_api" @checked($authApi) aria-describedby="authApiInfo">
                        <label class="form-check-label" for="authApiInput">{{ trans('admin.settings.auth.api') }}</label>
                    </div>

                    <small id="authApiInfo" class="form-text">@lang('admin.settings.auth.api_info')</small>
                </div>

                @unless(oauth_login())
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="userChangeName" name="user_change_name" @checked($userNameChange)>
                            <label class="form-check-label" for="userChangeName">{{ trans('admin.settings.auth.user_change_name') }}</label>
                        </div>
                    </div>
                @endunless

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="userDelete" name="user_delete" @checked($userDelete)>
                        <label class="form-check-label" for="userDelete">{{ trans('admin.settings.auth.user_delete') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.settings.security.title') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.security.update') }}" method="POST" v-scope="{ type: '{{ $captchaType }}' }">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="captchaSelect">{{ trans('admin.settings.security.captcha.title') }}</label>
                    <select class="form-select @error('captcha') is-invalid @enderror" id="captchaSelect" name="captcha" v-model="type">
                        <option value="">{{ trans('messages.none') }}</option>
                        <option value="hcaptcha" @selected($captchaType === 'hcaptcha')>
                            hCaptcha
                        </option>
                        <option value="turnstile" @selected($captchaType === 'turnstile')>
                            Cloudflare Turnstile
                        </option>
                        <option value="recaptcha" @selected($captchaType === 'recaptcha')>
                            Google reCaptcha
                        </option>
                    </select>

                    @error('captcha')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div v-show="type">
                    <div class="card card-body mb-2">
                        <div class="row g-3">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="siteKeyInput">{{ trans('admin.settings.security.captcha.site_key') }}</label>
                                <input type="text" class="form-control @error('site_key') is-invalid @enderror" id="siteKeyInput" name="site_key" value="{{ old('captcha.site_key', setting('captcha.site_key', '')) }}">

                                @error('site_key')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <small class="form-text" v-if="type === 'recaptcha'">
                                    @lang('admin.settings.security.captcha.recaptcha')
                                </small>

                                <small class="form-text" v-if="type === 'hcaptcha'">
                                    @lang('admin.settings.security.captcha.hcaptcha')
                                </small>

                                <small class="form-text" v-if="type === 'turnstile'">
                                    @lang('admin.settings.security.captcha.turnstile')
                                </small>
                            </div>

                            <div class="mb-3 col-md-6 mb-0">
                                <label class="form-label" for="secretKeyInput">{{ trans('admin.settings.security.captcha.secret_key') }}</label>
                                <input type="text" class="form-control @error('secret_key') is-invalid @enderror" id="secretKeyInput" name="secret_key" value="{{ old('secret_key', setting('captcha.secret_key', '')) }}">

                                @error('secret_key')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="hashSelect">{{ trans('admin.settings.security.hash') }}</label>
                    <select class="form-select @error('hash') is-invalid @enderror" id="hashSelect" name="hash" required>
                        @foreach($hashAlgorithms as $hash => $hashName)
                            <option value="{{ $hash }}" @selected($currentHash === $hash)>
                                {{ $hashName }}
                            </option>
                        @endforeach
                    </select>

                    @error('hash')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                @if($canForce2fa)
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="force2faInput" name="force_2fa" @checked($force2fa)>
                            <label class="form-check-label" for="force2faInput">{{ trans('admin.settings.security.force_2fa') }}</label>
                        </div>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
