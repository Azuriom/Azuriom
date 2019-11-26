@extends('admin.layouts.admin')

@section('title', trans('admin.settings.performances.title'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.settings.performances.cache.title') }}</h4>
                    <p class="card-subtitle">{{ trans('admin.settings.performances.cache.description') }}</p>

                    <form class="mt-3" action="{{ route('admin.settings.cache.clear') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-warning"><i class="fas fa-times"></i> {{ trans('admin.settings.performances.cache.actions.clear') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.settings.performances.boost.title') }} <i class="text-primary fas fa-rocket"></i></h4>
                    <p class="card-subtitle">{{ trans('admin.settings.performances.boost.description') }}</p>
                    <small>{{ trans('admin.settings.performances.boost.info') }}</small>

                    <p class="mb-3">@lang('admin.settings.performances.boost.current.status', ['status' => trans('admin.settings.performances.boost.current.' . ($cacheStatus ? 'enabled' : 'disabled'))])</p>

                    <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.enable') }}" method="POST">
                        @csrf

                        @if($cacheStatus)
                            <button class="btn btn-primary"><i class="fas fa-sync"></i> {{ trans('admin.settings.performances.boost.actions.reload') }}</button>
                        @else
                            <button class="btn btn-primary"><i class="fas fa-check"></i> {{ trans('admin.settings.performances.boost.actions.enable') }}</button>
                        @endif
                    </form>

                    @if($cacheStatus)
                        <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.clear') }}" method="POST">
                            @csrf

                            <button class="btn btn-warning"><i class="fas fa-times"></i> {{ trans('admin.settings.performances.boost.actions.disable') }}</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
