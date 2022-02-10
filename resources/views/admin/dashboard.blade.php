@extends('admin.layouts.admin')

@section('title', trans('admin.dashboard.title'))

@section('content')
    @if(! $secure)
        <div id="notHttpsAlert" class="alert alert-warning shadow-sm" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ trans('admin.dashboard.https-warning') }}
        </div>
        <div id="proxyAlert" class="alert alert-info shadow-sm d-none" role="alert">
            <i class="fas fa-info-circle"></i> {{ trans('admin.dashboard.proxy-warning') }}
        </div>
    @endif

    @if(config('mail.default') === 'array')
        <div class="alert alert-warning shadow-sm" role="alert">
            <i class="fas fa-info-circle"></i> @lang('admin.dashboard.emails-disabled', ['url' => route('admin.settings.mail')])
        </div>
    @endif

    @if($newVersion !== null)
        <div class="alert alert-info shadow-sm" role="alert">
            <i class="fas fa-plus"></i> {{ trans('admin.dashboard.new-update', ['version' => $newVersion]) }}.
            <a href="{{ route('admin.update.index') }}">{{ trans('admin.update.actions.install') }}</a>.
        </div>
    @endif

    @foreach($apiAlerts as $alertLevel => $alertMessage)
        <div class="alert alert-{{ $alertLevel }} shadow-sm" role="alert">
            {!! $alertMessage !!}
        </div>
    @endforeach

    <!-- Content Row -->
    <div class="row">

        <!-- Users card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ trans('admin.dashboard.users') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ trans('admin.dashboard.posts') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $postCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pages card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ trans('admin.dashboard.pages') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pageCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pages card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ trans('admin.dashboard.images') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $imageCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($cards ?? [] as $card)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-{{ $card['color'] }} shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $card['name'] }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $card['value'] }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="{{ $card['icon'] }} fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.dashboard.recent-users') }}</h6>
                </div>
                <div class="card-body">
                    <div class="tab-content mb-3">
                        <div class="tab-pane fade show active" id="monthlyChart" role="tabpanel" aria-labelledby="monthlyChartTab">
                            <div class="chart-area">
                                <canvas id="newUsersPerMonthsChart"></canvas>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dailyChart" role="tabpanel" aria-labelledby="dailyChartTab">
                            <div class="chart-area">
                                <canvas id="newUsersPerDaysChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="monthlyChartTab" data-toggle="pill" href="#monthlyChart" role="tab" aria-controls="monthlyChart" aria-selected="true">
                                {{ trans('messages.range.months') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="dailyChartTab" data-toggle="pill" href="#dailyChart" role="tab" aria-controls="dailyChart" aria-selected="false">
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
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.dashboard.active-users') }}</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="activeUsersChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-1">
                            <i class="fas fa-circle text-primary"></i> {{ now()->subDay()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="mr-1">
                            <i class="fas fa-circle text-success"></i> {{ now()->subWeek()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="mr-1">
                            <i class="fas fa-circle text-info"></i> {{ now()->subMonth()->longAbsoluteDiffForHumans() }}
                        </span>
                        <span class="mr-1">
                            <i class="fas fa-circle text-warning"></i> + {{ now()->subMonth()->longAbsoluteDiffForHumans() }}
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
        createLineChart('newUsersPerMonthsChart', @json($newUsersPerMonths), '{{ trans('admin.dashboard.recent-users') }}');
        createLineChart('newUsersPerDaysChart', @json($newUsersPerDays), '{{ trans('admin.dashboard.recent-users') }}');
        createPieChart('activeUsersChart', @json($activeUsers));
    </script>

    @if(! $secure)
        <script>
            // When using a proxy, if the traffic is encrypted only between the
            // proxy and the web server, the warn can be show even if the user use https
            // (like with Cloudflare flexible encryption). In this case we just
            // hide the warning and display an info text.
            if (window.location.protocol === 'https:') {
                document.getElementById('notHttpsAlert').classList.add('d-none');
                document.getElementById('proxyAlert').classList.remove('d-none');
            }
        </script>
    @endif
@endpush
