@extends('layouts.app')

@section('title', trans('auth.passwords.reset'))

@section('content')
<div class="auth container-fluid d-flex align-items-center justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mb-4 title-no-bg">
                    {{ trans('auth.passwords.reset') }}
                </h3>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-floating mb-3">
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ $email ?? old('email') }}"
                            placeholder=""
                            required
                            autocomplete="email"
                            autofocus
                        >
                        <label for="email">{{ trans('auth.email') }}</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder=""
                            required
                            show-password
                            autocomplete="new-password"
                        >
                        <label for="password">{{ trans('auth.password') }}</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder=""
                            required
                            show-password
                            autocomplete="new-password"
                        >
                        <label for="password-confirm">{{ trans('auth.confirm_password') }}</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ trans('auth.passwords.reset') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
