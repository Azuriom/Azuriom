@extends('admin.layouts.admin')

@section('title', trans('admin.errors.404'))

@section('content')
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-3">{{ trans('admin.errors.404') }}</p>
        <p class="text-gray-500 mb-0">{{ trans('admin.errors.info') }}</p>
        <a href="{{ route('admin.dashboard') }}">&larr; {{ trans('admin.errors.back') }}</a>
    </div>
@endsection
