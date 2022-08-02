@extends('layouts.app')

@section('title', trans('messages.profile.2fa.title'))

@section('content')
    <h1>{{ trans('messages.profile.2fa.title') }}</h1>

    <div class="card">
        <div class="card-body">
            <p>@lang('messages.profile.2fa.info')</p>

            <div class="text-center">
                {{ $qrCode }}
            </div>

            <p>@lang('messages.profile.2fa.secret', ['secret' => $secret])</p>

            <form method="POST" action="{{ route('profile.2fa.enable') }}">
                @csrf

                <input type="hidden" name="2fa_key" value="{{ $secret }}">

                <div class="mb-3">
                    <label class="form-label" for="codeInput">{{ trans('messages.profile.2fa.code') }}</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror " id="codeInput" name="code" placeholder="123 456">

                    @error('code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-shield-check"></i> {{ trans('messages.actions.enable') }}
                </button>

                <a class="btn btn-secondary" href="{{ route('profile.index') }}">
                    <i class="bi bi-x-lg"></i> {{ trans('messages.actions.cancel') }}
                </a>
            </form>
        </div>
    </div>
@endsection
