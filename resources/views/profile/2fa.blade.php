@extends('layouts.app')

@section('title', trans('messages.profile.2fa.title'))

@section('content')
    <div class="container content">
        <div class="card mb-4">
            <div class="card-header">{{ trans('messages.profile.2fa.title') }}</div>

            <div class="card-body">
                <p>{{ trans('messages.profile.2fa.info') }}</p>

                <div class="text-center">
                    <img src="{{ $qrCodeUrl }}" alt="Qr code">
                </div>

                <p>{{ trans('messages.profile.2fa.secret', ['secret' => $secretKey]) }}</p>

                <form method="POST">
                    @csrf

                    <input type="hidden" name="2fa_key" value="{{ $secretKey }}">

                    <div class="form-group">
                        <label for="codeInput">{{ trans('messages.profile.2fa.code') }}</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror " id="codeInput" name="code" placeholder="123 456">

                        @error('code')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('messages.actions.enable') }}</button>
                    <a class="btn btn-secondary float-md-right" href="{{ route('profile.index') }}">{{ trans('messages.actions.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection
