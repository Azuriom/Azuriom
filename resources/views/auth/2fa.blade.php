@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border-0">
            <div class="card-body p-4">
                <h3 class="text-center mb-4 fw-bold text-primary title-no-bg">
                    {{ trans('auth.login') }}
                </h3>

                <form method="POST" action="{{ route('login.2fa') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input
                            id="code"
                            type="text"
                            class="form-control @error('code') is-invalid @enderror"
                            name="code"
                            placeholder=""
                            required
                            autocomplete="one-time-code"
                            autofocus
                        >
                        <label for="code">{{ trans('auth.2fa.code') }}</label>
                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold mt-2">
                            {{ trans('auth.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
