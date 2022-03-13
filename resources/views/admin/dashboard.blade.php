@extends('admin.layouts.admin')

@section('title', trans('admin.dashboard.title'))

@section('content')
    @if(! $secure)
        <div id="notHttpsAlert" class="alert alert-warning shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('admin.dashboard.http') }}
        </div>
        <div id="proxyAlert" class="alert alert-info shadow-sm d-none" role="alert">
            <i class="bi bi-info-circle"></i> {{ trans('admin.dashboard.cloudflare') }}
        </div>
    @endif

    @if(config('mail.default') === 'array')
        <div class="alert alert-warning shadow-sm" role="alert">
            <i class="bi bi-info-circle"></i> @lang('admin.dashboard.emails', ['url' => route('admin.settings.mail')])
        </div>
    @endif

    @if($newVersion !== null)
        <div class="alert alert-info shadow-sm" role="alert">
            <i class="bi bi-plus-lg"></i> {{ trans('admin.dashboard.update', ['version' => $newVersion]) }}.
            <a href="{{ route('admin.update.index') }}">
                {{ trans('messages.actions.install') }}
            </a>.
        </div>
    @endif

    @foreach($apiAlerts as $alertLevel => $alertMessage)
        <div class="alert alert-{{ $alertLevel }} shadow-sm" role="alert">
            {!! $alertMessage !!}
        </div>
    @endforeach

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title mb-0">{{ trans('admin.dashboard.users') }}</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $userCount }}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title mb-0">{{ trans('admin.dashboard.posts') }}</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="bi bi-newspaper"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $postCount }}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title mb-0">{{ trans('admin.dashboard.pages') }}</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="bi bi-file-earmark"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $pageCount }}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title mb-0">{{ trans('admin.dashboard.images') }}</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="bi bi-image"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $imageCount }}</h1>
                </div>
            </div>
        </div>

        @foreach($cards ?? [] as $card)
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title mb-0">{{ $card['name'] }}</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $card['value'] }}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <!-- Area Chart -->

        <div class="col-xl-8 col-lg-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        {{ trans('admin.dashboard.recent_users') }}
                    </h5>
                </div>
                <div class="card-body pt-2 pb-3">
                    <div class="tab-content mb-3">
                        <div class="tab-pane fade show active" id="monthlyChart" role="tabpanel" aria-labelledby="monthlyChartTab">
                            <div class="chart">
                                <canvas id="newUsersPerMonthsChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dailyChart" role="tabpanel" aria-labelledby="dailyChartTab">
                            <div class="chart">
                                <canvas id="newUsersPerDaysChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="monthlyChartTab" data-bs-toggle="pill" href="#monthlyChart" role="tab" aria-controls="monthlyChart" aria-selected="true">
                                {{ trans('messages.range.months') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="dailyChartTab" data-bs-toggle="pill" href="#dailyChart" role="tab" aria-controls="dailyChart" aria-selected="false">
                                {{ trans('messages.range.days') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="card-title mb-0">{{ trans('admin.dashboard.active_users') }}</h5>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="activeUsersChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="me-1">
                            <i class="bi bi-circle-fill text-primary"></i> {{ now()->subDay()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="me-1">
                            <i class="bi bi-circle-fill text-success"></i> {{ now()->subWeek()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="me-1">
                            <i class="bi bi-circle-fill text-info"></i> {{ now()->subMonth()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="me-1">
                            <i class="bi bi-circle-fill text-warning"></i> + {{ now()->subMonth()->longAbsoluteDiffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts.js') }}"></script>
    <script>
        createLineChart('newUsersPerMonthsChart', @json($newUsersPerMonths), '{{ trans('admin.dashboard.recent_users') }}');
        createLineChart('newUsersPerDaysChart', @json($newUsersPerDays), '{{ trans('admin.dashboard.recent_users') }}');
        createPieChart('activeUsersChart', @json($activeUsers));
    </script>

    @if(! $secure)
        <script>
            // When using a proxy, if the traffic is encrypted only between the
            // proxy and the web server, the warning can be show even if the user use https
            // (like with Cloudflare flexible encryption). In this case we just
            // hide the warning and display an info text.
            if (window.location.protocol === 'https:') {
                document.getElementById('notHttpsAlert').classList.add('d-none');
                document.getElementById('proxyAlert').classList.remove('d-none');
            }
        </script>
    @endif
@endpush
