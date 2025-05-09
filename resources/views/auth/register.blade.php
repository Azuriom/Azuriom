@extends('layouts.app')

@section('title', trans('auth.register'))

@section('content')
<div class="auth row justify-content-center py-5">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center mb-4 title-no-bg">{{ trans('auth.register') }}</h1>

        <form method="POST" action="{{ route('register') }}" id="captcha-form">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">{{ trans('auth.name') }}</label>
            <input
              type="text"
              class="form-control @error('name') is-invalid @enderror"
              id="name"
              name="name"
              value="{{ old('name') }}"
              required
              autofocus
            >
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">{{ trans('auth.email') }}</label>
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              name="email"
              value="{{ old('email') }}"
              required
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
              type="password"
              class="form-control @error('password') is-invalid @enderror"
              id="password"
              name="password"
              show-password
              required
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
              type="password"
              class="form-control"
              id="password-confirm"
              name="password_confirmation"
              show-password
              required
              autocomplete="new-password"
            >
          </div>
          
          @if($registerConditions !== null)
            <div class="form-check">
              <input
                class="form-check-input @error('conditions') is-invalid @enderror"
                type="checkbox"
                name="conditions"
                id="conditions"
                required
                @checked(old('conditions'))
              >
              <label class="form-check-label" for="conditions">
                {{ $registerConditions }}
              </label>
              @error('conditions')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          @endif

          {{-- Captcha Element --}}
          <div class="d-flex justify-content-center mb-3">
            @include('elements.captcha', ['center' => true])
          </div>

          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">{{ trans('auth.register') }}</button>
          </div>
        </form>
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-decoration-none small">
                {{ trans('auth.goto_login') }}
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
