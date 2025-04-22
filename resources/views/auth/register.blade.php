@extends('layouts.app')

@section('title', trans('auth.register'))

@section('content')
<div class="auth container-fluid d-flex align-items-center justify-content-center py-5">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
    <div class="card">
      <div class="card-body p-4">
        <h1 class="text-center mb-4 title-no-bg">{{ trans('auth.register') }}</h1>

        <form method="POST" action="{{ route('register') }}" id="captcha-form">
          @csrf

          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control @error('name') is-invalid @enderror"
              id="name"
              name="name"
              placeholder=""
              value="{{ old('name') }}"
              required
              autofocus
            >
            <label for="name">{{ trans('auth.name') }}</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              name="email"
              placeholder=""
              value="{{ old('email') }}"
              required
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
              type="password"
              class="form-control"
              id="password-confirm"
              name="password_confirmation"
              placeholder=""
              show-password
              required
              autocomplete="new-password"
            >
            <label for="password-confirm">{{ trans('auth.confirm_password') }}</label>
          </div>

          @if($registerConditions !== null)
            <div class="mb-4 form-check">
              <input
                class="form-check-input @error('conditions') is-invalid @enderror"
                type="checkbox"
                name="conditions"
                id="conditions"
                required
                @checked(old('conditions'))
              >
              <label class="form-check-label" for="conditions">
                {!! $registerConditions !!}
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
