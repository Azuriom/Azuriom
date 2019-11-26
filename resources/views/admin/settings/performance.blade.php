@extends('admin.layouts.admin')

@section('title', trans('admin.nav.settings.settings.performances'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.settings.performances.cache.name') }}</h4>
                    <p class="card-subtitle">{{ trans('admin.settings.performances.cache.description') }}</p>

                    <form class="mt-3" action="{{ route('admin.settings.cache.clear') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-warning">{{ trans('admin.settings.performances.cache.clear') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.settings.performances.rocketbooster.name') }} <i class="text-primary fas fa-rocket"></i></h4>
                    <p class="card-subtitle">{{ trans('admin.settings.performances.rocketbooster.description') }}</p>
                    <small>{{ trans('admin.settings.performances.rocketbooster.warn') }}</small>

                    <p class="mb-3">{{ trans('admin.settings.performances.rocketbooster.status.title') }}
                        <span class="text-{{ $cacheStatus ? 'success' : 'danger' }}">{{ $cacheStatus ? trans('admin.settings.performances.rocketbooster.status.enabled') : trans('admin.settings.performances.rocketbooster.status.disabled') }}</span>.
                    </p>

                    <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.enable') }}" method="POST">
                        @csrf

                        @if($cacheStatus)
                            <button class="btn btn-primary">{{ trans('admin.settings.performances.rocketbooster.reload') }}</button>
                        @else
                            <button class="btn btn-primary">{{ trans('admin.settings.performances.rocketbooster.enable') }}</button>
                        @endif
                    </form>

                    @if($cacheStatus)
                        <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.clear') }}" method="POST">
                            @csrf

                            <button class="btn btn-warning">{{ trans('admin.settings.performances.rocketbooster.disable') }}</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
