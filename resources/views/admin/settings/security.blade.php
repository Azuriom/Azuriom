@extends('admin.layouts.admin')

@section('title', 'Security settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-security') }}" method="POST">
                @csrf

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="enable-recaptcha" data-toggle="collapse" data-target="#captchaGroup" @if($showReCaptcha) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">Enable Google reCaptcha bots protection</label>
                </div>

                <div id="captchaGroup" class="{{ $showReCaptcha ? 'show' : 'collapse' }}">
                    <div class="card card-body mb-2">
                        <div class="form-group">
                            <label for="siteKeyInput">Site key</label>
                            <input type="text" class="form-control @error('recaptcha-site-key') is-invalid @enderror" id="siteKeyInput" name="recaptcha-site-key" value="{{ old('recaptcha-site-key', setting('recaptcha-site-key', '')) }}">

                            @error('recaptcha-site-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="secretKeyInput">Secret key</label>
                            <input type="text" class="form-control @error('recaptcha-secret-key') is-invalid @enderror" id="secretKeyInput" name="recaptcha-secret-key" value="{{ old('recaptcha-secret-key', setting('recaptcha-secret-key', '')) }}">

                            @error('recaptcha-secret-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small>You can get reCaptcha keys on the
                                <a href="https://www.google.com/recaptcha/" target="_blank"> Google reCaptcha website</a>.</small>
                            <small>You need to use reCaptcha <strong>v2 invisible</strong> keys.</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hashSelect">Hash algorithm</label>
                    <select class="custom-select @error('hash') is-invalid @enderror" id="hashSelect" name="hash" required>
                        @foreach($hashAlgorithms as $hash => $hashName)
                            <option value="{{ $hash }}" @if($currentHash === $hash) selected @endif>{{ $hashName }}</option>
                        @endforeach
                    </select>
                    @error('hash')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <small>Argon2id is the most secure algorithm but it requires PHP 7.3 or higher. If you are running PHP 7.2 you should use Argon2i.</small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
