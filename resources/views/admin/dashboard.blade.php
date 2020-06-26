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
            <i class="fas fa-info-circle"></i> @lang('admin.dashboard.emails-disabled', ['url' => route('admin.settings.mail')])">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ trans($card['name']) }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $card['value'] }}</div>
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
                    <div class="chart-area">
                        <canvas id="newUsersChart"></canvas>
                    </div>
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
    <script>
        Chart.defaults.global.defaultFontColor = '#858796';

        const recentUsersKeys = @json($recentUsers->keys());
        const recentUsersValues = @json($recentUsers->values());
        const activeUsersKeys = @json($activeUsers->keys());
        const activeUsersValues = @json($activeUsers->values());

        new Chart(document.getElementById('newUsersChart'), {
            type: 'line',
            data: {
                labels: recentUsersKeys,
                datasets: [{
                    label: 'New users',
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: recentUsersValues,
                }],
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        /*time: {
                            unit: 'date'
                        },*/
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        /*ticks: {
                            maxTicksLimit: 7
                        }*/
                    }],
                    yAxes: [{
                        /*ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                        },*/
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });

        new Chart(document.getElementById('activeUsersChart'), {
            type: 'doughnut',
            data: {
                labels: activeUsersKeys,
                datasets: [{
                    data: activeUsersValues,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e9aa0b'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619'],
                    hoverBorderColor: 'rgba(234, 236, 244, 1)',
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: '#fff',
                    bodyFontColor: '#858796',
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 60,
            },
        });
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
