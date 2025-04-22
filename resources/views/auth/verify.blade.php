@extends('layouts.app')

@section('title', trans('auth.verify'))

@section('content')
<div class="auth container-fluid d-flex align-items-center justify-content-center py-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mb-4 title-no-bg">
                    {{ trans('auth.verify') }}
                </h3>

                @if(session('resent'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ trans('auth.verification.sent') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <p class="text-center text-muted mb-4">
                    {{ trans('auth.verification.check') }}
                </p>
                <p class="text-center text-muted mb-4">
                    {{ trans('auth.verification.request') }}
                </p>

                <form method="POST" action="{{ route('verification.resend') }}" class="d-grid">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-2">
                        {{ trans('auth.verification.resend') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
