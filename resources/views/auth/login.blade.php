@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="auth row justify-content-center py-5">
  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center mb-4 title-no-bg">{{ trans('auth.login') }}</h1>

<<<<<<< HEAD
        <form method="POST" action="{{ route('login') }}">
          @csrf
          
          <div class="mb-3">
            <label for="email" class="form-label">{{ trans('auth.email') }}</label>
            <input
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              name="email"
              value="{{ old('email') }}"
              required
              autofocus
            >
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
=======
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" id="captcha-form">
                    @csrf
>>>>>>> upstream/master

          <div class="mb-3">
            <label for="password" class="form-label">{{ trans('auth.password') }}</label>
            <input
              type="password"
              class="form-control @error('password') is-invalid @enderror"
              id="password"
              name="password"
              required
              show-password
            >
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          

<<<<<<< HEAD
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
=======
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">{{ trans('auth.password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row gy-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" @checked(old('remember'))>

                                <label class="form-check-label" for="remember">
                                    {{ trans('auth.remember') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if(Route::has('password.request'))
                                <a class="float-md-end" href="{{ route('password.request') }}">
                                    {{ trans('auth.forgot_password') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    @includeWhen($captcha, 'elements.captcha', ['center' => true])

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary d-block">
                            {{ trans('auth.login') }}
                        </button>
                    </div>
                </form>
>>>>>>> upstream/master
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