@extends('layouts.app')

@section('title', trans('messages.profile.2fa.title'))

@section('content')
    <div class="container content profile-2fa">
        <div class="card mb-4">
            <div class="card-header">{{ trans('messages.profile.2fa.title') }}</div>

            <div class="card-body">
                <p>{{ trans('messages.profile.2fa.info') }}</p>

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
                        {{ trans('messages.actions.enable') }}
                    </button>

                    <a class="btn btn-secondary float-md-right" href="{{ route('profile.index') }}">
                        {{ trans('messages.actions.cancel') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
