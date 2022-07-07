@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('auth.login') }}</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('login.2fa') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="code">{{ trans('auth.2fa.code') }}</label>
                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="one-time-code" autofocus>

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
