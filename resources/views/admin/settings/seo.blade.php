@extends('admin.layouts.admin')

@section('title', trans('admin.settings.seo.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.seo.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="homeMessage">{{ trans('admin.settings.seo.home_message') }}</label>
                    <textarea class="form-control html-editor @error('home_message') is-invalid @enderror" id="homeMessage" name="home_message" rows="5">{{ old('home_message', $homeMessage) }}</textarea>

                    @error('home_message')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> @lang('admin.settings.seo.html')
                </div>

                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="welcomeAlertSwitch" name="enable_welcome_alert" data-bs-toggle="collapse" data-bs-target="#welcomeAlert" @checked($welcomeAlert)>
                    <label class="form-check-label" for="welcomeAlertSwitch">{{ trans('admin.settings.seo.welcome_alert.enable') }}</label>
                </div>

                <div id="welcomeAlert" class="{{ $welcomeAlert ? 'show' : 'collapse' }}">
                    <div class="card card-body mb-3">
                        <div class="mb-0">
                            <label class="form-label" for="welcomeAlertArea">{{ trans('admin.settings.seo.welcome_alert.message') }}</label>
                            <textarea class="form-control @error('welcome_alert') is-invalid @enderror" id="welcomeAlertArea" name="welcome_alert" aria-describedby="welcomeAlertInfo" rows="5">{{ old('welcome_alert', $welcomeAlert) }}</textarea>

                            @error('welcome_alert')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small id="welcomeAlertInfo" class="form-text">{{ trans('admin.settings.seo.welcome_alert.info') }}</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
