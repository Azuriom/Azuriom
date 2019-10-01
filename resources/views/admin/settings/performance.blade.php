@extends('admin.layouts.admin')

@section('title', 'Performance settings')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Clear cache</h4>
                    <p class="card-subtitle">Clear the website cache.</p>

                    <form class="mt-3" action="{{ route('admin.settings.cache.clear') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-warning">Clear cache</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">RocketBooster <i class="text-primary fas fa-rocket"></i></h4>
                    <p class="card-subtitle">RocketBooster improves your website performances by adding one more exclusive cache layer.</p>
                    <small>If you have some issues after enabling an extension you should reload the cache.</small>

                    <p class="mb-3">RocketBooster is currently
                        <span class="text-{{ $cacheStatus ? 'success' : 'danger' }}">{{ $cacheStatus ? 'enabled' : 'disabled' }}</span>.
                    </p>

                    <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.enable') }}" method="POST">
                        @csrf

                        @if($cacheStatus)
                            <button class="btn btn-primary">Reload RocketBooster</button>
                        @else
                            <button class="btn btn-primary">Enable RocketBooster</button>
                        @endif
                    </form>

                    @if($cacheStatus)
                        <form class="d-inline-block" action="{{ route('admin.settings.cache.advanced.clear') }}" method="POST">
                            @csrf

                            <button class="btn btn-warning">Disable RocketBooster</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
