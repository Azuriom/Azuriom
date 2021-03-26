@extends('admin.layouts.admin')

@section('title', trans('admin.settings.seo.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.seo.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="htmlHeadArea">{{ trans('admin.settings.seo.html-head-code') }}</label>
                    <textarea class="form-control @error('html-head') is-invalid @enderror" id="htmlHeadArea" name="html-head" rows="4">{{ old('html-head', $htmlHead) }}</textarea>

                    @error('html-head')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="htmlBodyArea">{{ trans('admin.settings.seo.html-body-code') }}</label>
                    <textarea class="form-control @error('html-body') is-invalid @enderror" id="htmlBodyArea" name="html-body" aria-describedby="htmlBodyInfo" rows="4">{{ old('html-body', $htmlBody) }}</textarea>

                    @error('html-body')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="htmlBodyInfo" class="form-text">{{ trans('admin.settings.seo.html-code-info') }}</small>
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
