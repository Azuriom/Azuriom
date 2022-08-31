@extends('install.layout')

@section('content')
    <div class="text-center">
        <p>{{ trans('install.success.thanks') }}</p>

        <p>{{ trans('install.success.success') }}</p>

        <a href="{{ route('home') }}" class="btn btn-primary rounded-pill mb-3">
            {{ trans('install.success.go') }} <i class="bi bi-lightning"></i>
        </a>

        <p>@lang('install.success.support')</p>
    </div>
@endsection
