@extends('layouts.app')

@section('title', trans('auth.passwords.confirm'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('auth.passwords.confirm') }}</h1>

        <div class="card">
            <div class="card-body">
                <p>{{ trans('auth.confirmation') }}</p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="password">{{ trans('auth.password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.passwords.confirm') }}
                        </button>
                    </div>

                    <div class="text-center">
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
