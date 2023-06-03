@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('auth.fpc.title') }}</h1>

        <div class="card">
            <div class="card-body">
                <p>{{ trans('auth.fpc.line1') }}</p>
                <p>{{ trans('auth.fpc.line2') }}</p>
                <a href="{{ route('password.request') }}" class="btn btn-primary d-block">{{ trans('auth.fpc.action') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
