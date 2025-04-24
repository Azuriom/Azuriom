@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="auth row justify-content-center py-5">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center mb-4 title-no-bg">{{ trans('auth.login') }}</h1>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-floating mb-3">
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder=""
              required
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
              type="password"
              class="form-control @error('password') is-invalid @enderror"
              id="password"
              name="password"
              placeholder=""
              show-password
              required
            >
            <label for="password">{{ trans('auth.password') }}</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember"
                @checked(old('remember'))
              >
              <label class="form-check-label" for="remember">
                {{ trans('auth.remember') }}
              </label>
            </div>

            @if(Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-decoration-none small">
                {{ trans('auth.forgot_password') }}
              </a>
            @endif
          </div>

          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">{{ trans('auth.login') }}</button>
          </div>
        </form>
        @if (Route::has('register'))
            <div class="text-center">
                <a href="{{ route('register') }}" class="text-decoration-none small">
                    {{ trans('auth.goto_register') }}
                </a>
            </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection