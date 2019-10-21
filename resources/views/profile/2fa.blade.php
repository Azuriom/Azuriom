@extends('layouts.app')

@section('title', 'Enable 2fa')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <h4 class="card-header">
                Enable two factor auth
            </h4>
            <div class="card-body">
                <p>Scan the QR code above with an two-factor authentication app on your phone like Google Authenticator.</p>
                <p>If you can't scan the code you can directly enter the secret key below the code.</p>

                <div class="text-center">
                    <img src="{{ $qrCodeUrl }}" alt="Qr code">
                </div>

                <p>Secret key: {{ $secretKey }}</p>

                <form method="POST">
                    @csrf

                    <input type="hidden" name="2fa_key" value="{{ $secretKey }}">

                    <div class="form-group">
                        <label for="codeInput">Two factor auth code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror " id="codeInput" name="code" placeholder="123 456">

                        @error('code')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Enable</button>
                    <a class="btn btn-secondary float-md-right" href="{{ route('profile.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
