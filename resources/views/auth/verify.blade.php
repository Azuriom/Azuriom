@extends('layouts.app')

@section('title', trans('auth.verify'))

@section('content')
<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('auth.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('auth.verify-sent') }}
                        </div>
                    @endif

                     <p>{{ trans('auth.verify-check') }}</p>
                     <p>{{ trans('auth.verify-request') }}</p>

                     <form method="POST" action="{{ route('verification.resend') }}">
                         @csrf
                         <button type="submit" class="btn btn-primary">{{ trans('auth.verify-resend') }}</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
