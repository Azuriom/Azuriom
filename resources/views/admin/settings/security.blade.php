@extends('admin.layouts.admin')

@section('title', trans('admin.settings.security.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-security') }}" method="POST">
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

                        <div class="form-group">
                            <label for="secretKeyInput">{{ trans('admin.settings.security.recaptcha-secret-key') }}</label>
                            <input type="text" class="form-control @error('recaptcha-secret-key') is-invalid @enderror" id="secretKeyInput" name="recaptcha-secret-key" value="{{ old('recaptcha-secret-key', setting('recaptcha-secret-key', '')) }}">

                            @error('recaptcha-secret-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            @lang('admin.settings.security.recaptcha-info')
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hashSelect">{{ trans('admin.settings.security.hash') }}</label>
                    <select class="custom-select @error('hash') is-invalid @enderror" id="hashSelect" name="hash" required>
                        @foreach($hashAlgorithms as $hash => $hashName)
                            <option value="{{ $hash }}" @if($currentHash === $hash) selected @endif>{{ $hashName }}</option>
                        @endforeach
                    </select>
                    @error('hash')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <small>{{ trans('admin.settings.security.hash-info') }}</small>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('messages.actions.save') }}</button>
            </form>
        </div>
    </div>
@endsection
