@extends('admin.layouts.admin')

@section('title', 'SEO settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update-seo') }}" method="POST">
                @csrf

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="enable-g-analytics" data-toggle='collapse' data-target='#gAnalyticsGroup' @if($enableAnalytics) checked @endif>
                    <label class="custom-control-label" for="enableSwitch">Enable Google Analytics</label>
                </div>

                <div id="gAnalyticsGroup" class="{{ $enableAnalytics ? 'show' : 'collapse' }}">
                    <div class="card card-body">
                        <div class="form-group mb-0">
                            <label for="keyInput">Google Analytics site key</label>
                            <input type="text" class="form-control @error('g-analytics-key') is-invalid @enderror" id="keyInput" name="g-analytics-key" value="{{ old('g-analytics-key', setting('g-analytics-key', '')) }}">

                            @error('g-analytics-key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small>You can get the site key on the
                                <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics website</a>.
                            </small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
