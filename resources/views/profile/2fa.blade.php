@extends('layouts.app')

@section('title', 'Enable 2fa')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Enable two factor auth</h4>
                <img src="{{ $qrCodeUrl }}" alt="Qr code">

                <p>Secret key: {{ $secretKey }}</p>

                <form method="POST">
                    @csrf

                    <input type="hidden" name="2fa_key" value="{{ $secretKey }}">

                    <div class="form-group">
                        <label for="codeInput">Two factor auth code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror " id="codeInput" name="code">

                        @error('code')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Enable 2fa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
