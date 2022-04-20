@extends('admin.layouts.admin')

@section('title', trans('errors.403.title'))

@section('content')
    <div class="text-center">
        <div class="error mx-auto" data-text="403">403</div>
        <p class="lead text-gray-800 mb-3">{{ trans('errors.403.title') }}</p>

        <p class="h4">{{ trans('admin.errors.2fa') }}</p>

        <a href="{{ route('profile.2fa.index') }}" class="btn btn-primary">
            <i class="bi bi-shield-check"></i> {{ trans('messages.actions.enable') }}
        </a>
    </div>
@endsection
