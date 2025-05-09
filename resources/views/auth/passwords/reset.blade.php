@extends('layouts.app')

@section('title', trans('auth.passwords.reset'))

@section('content')
<div class="auth row justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-4 title-no-bg">
                    {{ trans('auth.passwords.reset') }}
                </h1>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ trans('auth.email') }}</label>
                        <input
                          id="email"
                          type="email"
                          class="form-control @error('email') is-invalid @enderror"
                          name="email"
                          value="{{ $email ?? old('email') }}"
                          required
                          autocomplete="email"
                          autofocus
                        >
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                      
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ trans('auth.password') }}</label>
                        <input
                          id="password"
                          type="password"
                          class="form-control @error('password') is-invalid @enderror"
                          name="password"
                          required
                          show-password
                          autocomplete="new-password"
                        >
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                      
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ trans('auth.confirm_password') }}</label>
                        <input
                          id="password-confirm"
                          type="password"
                          class="form-control"
                          name="password_confirmation"
                          required
                          show-password
                          autocomplete="new-password"
                        >
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
