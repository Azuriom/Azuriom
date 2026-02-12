@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="auth row justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-4 title-no-bg">
                    {{ trans('auth.login') }}
                </h1>

                <form method="POST" action="{{ route('login.2fa') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="code" class="form-label">{{ trans('auth.2fa.code') }}</label>
                        <input
                          id="code"
                          type="text"
                          class="form-control @error('code') is-invalid @enderror"
                          name="code"
                          required
                          autocomplete="one-time-code"
                          autofocus
                        >
                        @error('code')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ trans('auth.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
