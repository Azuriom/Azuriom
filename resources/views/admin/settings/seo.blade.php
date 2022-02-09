@extends('admin.layouts.admin')

@section('title', trans('admin.settings.seo.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.seo.update') }}" method="POST">
                @csrf

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> @lang('admin.settings.seo.html')
                </div>

                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="welcomePopupSwitch" name="enable_welcome_popup" data-toggle="collapse" data-target="#welcomePopup" @if($welcomePopup) checked @endif>
                    <label class="custom-control-label" for="welcomePopupSwitch">{{ trans('admin.settings.seo.welcome-popup.enable') }}</label>
                </div>

                <div id="welcomePopup" class="{{ $welcomePopup ? 'show' : 'collapse' }}">
                    <div class="card card-body mb-3">
                        <div class="form-group mb-0">
                            <label for="welcomePopupArea">{{ trans('admin.settings.seo.welcome-popup.message') }}</label>
                            <textarea class="form-control @error('welcome-popup') is-invalid @enderror" id="welcomePopupArea" name="welcome-popup" aria-describedby="welcomePopupInfo" rows="5">{{ old('welcome-popup', $welcomePopup) }}</textarea>

                            @error('welcome-popup')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            <small id="welcomePopupInfo" class="form-text">{{ trans('admin.settings.seo.welcome-popup.info') }}</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
