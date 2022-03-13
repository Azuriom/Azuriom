@extends('admin.layouts.admin')

@section('title', trans('admin.settings.seo.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.seo.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="homeMessage">{{ trans('admin.settings.seo.home_message') }}</label>
                    <textarea class="form-control html-editor @error('home-message') is-invalid @enderror" id="homeMessage" name="home-message" rows="5">{{ old('home-message', $homeMessage) }}</textarea>

                    @error('home-message')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> @lang('admin.settings.seo.html')
                </div>

                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="welcomePopupSwitch" name="enable_welcome_popup" data-bs-toggle="collapse" data-bs-target="#welcomePopup" @if($welcomePopup) checked @endif>
                    <label class="form-check-label" for="welcomePopupSwitch">{{ trans('admin.settings.seo.welcome_alert.enable') }}</label>
                </div>

                <div id="welcomePopup" class="{{ $welcomePopup ? 'show' : 'collapse' }}">
                    <div class="card card-body mb-3">
                        <div class="mb-3 mb-0">
                            <label class="form-label" for="welcomePopupArea">{{ trans('admin.settings.seo.welcome_alert.message') }}</label>
                            <textarea class="form-control @error('welcome-popup') is-invalid @enderror" id="welcomePopupArea" name="welcome-popup" aria-describedby="welcomePopupInfo" rows="5">{{ old('welcome-popup', $welcomePopup) }}</textarea>

                            @error('welcome-popup')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small id="welcomePopupInfo" class="form-text">{{ trans('admin.settings.seo.welcome_alert.info') }}</small>
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
