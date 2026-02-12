@extends('layouts.app')

@section('title', trans('auth.passwords.reset'))

@section('content')
<div class="auth row justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-4 title-no-bg">
                    {{ trans('auth.passwords.reset') }}
                </h1>

                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" id="captcha-form">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ trans('auth.email') }}</label>
                        <input
                          id="email"
                          type="email"
                          class="form-control @error('email') is-invalid @enderror"
                          name="email"
                          value="{{ old('email') }}"
                          required
                          autocomplete="email"
                          autofocus
                        >
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                      

                    @include('elements.captcha', ['center' => true])

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ trans('auth.passwords.send') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
