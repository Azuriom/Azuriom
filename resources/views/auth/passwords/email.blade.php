@extends('layouts.app')

@section('title', trans('auth.passwords.reset'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('auth.passwords.reset') }}</h1>

        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" id="captcha-form">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="email">{{ trans('auth.email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @include('elements.captcha', ['center' => true])

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.passwords.send') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
