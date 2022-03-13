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

                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-x-lg"></i> {{ trans('admin.settings.performances.cache.clear') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('admin.settings.performances.boost.title') }} <i class="text-primary bi bi-lightning"></i></h4>
                    <p class="card-subtitle">{{ trans('admin.settings.performances.boost.description') }}</p>
                    <small>{{ trans('admin.settings.performances.boost.info') }}</small>

                    <p class="mb-3">
                        @lang('admin.settings.performances.boost.status', [
                            'status' => '<span class="text-'.($cacheStatus ? 'success' : 'primary').'">'.trans('admin.settings.performances.boost.'.($cacheStatus ? 'enabled' : 'disabled')).'</span>',
                        ])
                    </p>

                    <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.enable') }}" method="POST">
                        @csrf

                        @if($cacheStatus)
                            <button class="btn btn-primary">
                                <i class="bi bi-arrow-repeat"></i> {{ trans('admin.settings.performances.boost.reload') }}
                            </button>
                        @else
                            <button class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> {{ trans('admin.settings.performances.boost.enable') }}
                            </button>
                        @endif
                    </form>

                    @if($cacheStatus)
                        <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.clear') }}" method="POST">
                            @csrf

                            <button class="btn btn-warning">
                                <i class="bi bi-x-lg"></i> {{ trans('admin.settings.performances.boost.disable') }}
                            </button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
