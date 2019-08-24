@extends('admin.layouts.admin')

@section('title', 'Security settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-security') }}" method="POST">
                @csrf

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="enable-recaptcha" data-toggle='collapse' data-target='#captchaGroup' @if($showReCaptcha) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">Enable reCaptcha bots protection</label>
                </div>

                <div id="captchaGroup" class="@if(!$showReCaptcha) collapse @else show @endif">
                    <div class="form-group">
                        <label for="descriptionInput">reCaptcha site key</label>
                        <input type="text" class="form-control @error('recaptcha-site-key') is-invalid @enderror" id="descriptionInput" name="recaptcha-site-key" value="{{ old('recaptcha-site-key', setting('recaptcha-site-key', '')) }}">

                        @error('recaptcha-site-key')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descriptionInput">reCaptcha secret key</label>
                        <input type="text" class="form-control @error('recaptcha-secret-key') is-invalid @enderror" id="descriptionInput" name="recaptcha-secret-key" value="{{ old('recaptcha-secret-key', setting('recaptcha-secret-key', '')) }}">

                        @error('recaptcha-secret-key')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <small>You can get reCaptcha keys on the
                            <a href="https://www.google.com/recaptcha/" target="_blank"> Google reCaptcha website</a>.</small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hashSelect">Hash algorithm</label>
                    <select class="form-control" id="hashSelect" name="hash" required>
                        @foreach($hashAlgorithms as $hash => $hashName)
                            <option value="{{ $hash }}" @if($currentHash == $hash) selected @endif>{{ $hashName }}</option>
                        @endforeach
                    </select>
                    <small>The Argon2id is the most secure algorithm but it requires PHP 7.3.0 or greater. If you are running PHP 7.2 you should use Argon since Bcrypt is less secure.</small>
                    <br>
                    <small class="text-danger">When changing the hash algorithm all the users need to reset their passwords !</small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
