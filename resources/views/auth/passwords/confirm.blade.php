@extends('layouts.app')

@section('title', trans('auth.passwords.confirm'))

@section('content')
<div class="auth row justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-2 title-no-bg">
                    {{ trans('auth.passwords.confirm') }}
                </h1>

                <p class="text-center text-muted mb-4">
                    {{ trans('auth.confirmation') }}
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ trans('auth.password') }}</label>
                        <input
                          id="password"
                          type="password"
                          class="form-control @error('password') is-invalid @enderror"
                          name="password"
                          required
                          show-password
                          autocomplete="current-password"
                        >
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                      

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ trans('auth.passwords.confirm') }}
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('password.request') }}">
                            {{ trans('auth.forgot_password') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
