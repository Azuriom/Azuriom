@extends('admin.layouts.admin')

@section('title', trans('admin.settings.index.title'))

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('[data-image-select]').on('change', function () {
                const preview = $('#' + $(this).data('image-select'));
                if ($(this).val().length === 0) {
                    preview.parent().addClass('d-none');
                } else {
                    preview.parent().removeClass('d-none');
                    preview.attr('src', '{{ image_url() }}/' + $(this).val());
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nameInput">{{ trans('admin.settings.index.site-name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', site_name()) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urlInput">{{ trans('admin.settings.index.site-url') }}</label>
                    <input type="url" class="form-control @error('url') is-invalid @enderror" id="urlInput" name="url" value="{{ old('url', config('app.url')) }}" required>

                    @error('url')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descriptionInput">{{ trans('admin.settings.index.site-description') }}</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', setting('description')) }}">

                    @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="imageSelect">{{ trans('admin.settings.index.favicon') }}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank"><i class="fas fa-upload"></i></a>
                            </div>
                            <select class="custom-select @error('icon') is-invalid @enderror" id="imageSelect" data-image-select="faviconPreview" name="icon">
                                <option value="" @if(!$icon) selected @endif>{{ trans('messages.none') }}</option>
                                @foreach($images as $image)
                                    <option value="{{ $image->file }}" @if($image->file === $icon) selected @endif>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 @if(!$icon) d-none @endif">
                            <img src="{{ $icon ? favicon() : '#' }}" class="img-fluid rounded img-preview-sm" alt="Favicon" id="faviconPreview">
                        </div>

                        @error('icon')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="logoSelect">{{ trans('admin.settings.index.logo') }}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank"><i class="fas fa-upload"></i></a>
                            </div>
                            <select class="custom-select @error('logo') is-invalid @enderror" id="logoSelect" data-image-select="logoPreview" name="logo">
                                <option value="" @if(!$logo) selected @endif>{{ trans('messages.none') }}</option>
                                @foreach($images as $image)
                                    <option value="{{ $image->file }}" @if($image->file === $logo) selected @endif>{{ $image->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 @if(!$logo) d-none @endif">
                            <img src="{{ $logo ? image_url($logo) : '#' }}" class="img-fluid rounded img-preview-sm" alt="Logo" id="logoPreview">
                        </div>

                        @error('logo')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="imageSelect">{{ trans('admin.settings.index.background') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank"><i class="fas fa-upload"></i></a>
                        </div>
                        <select class="custom-select @error('background') is-invalid @enderror" id="imageSelect" data-image-select="backgroundPreview" name="background">
                            <option value="" @if(!$background) selected @endif>{{ trans('messages.none') }}</option>
                            @foreach($images as $image)
                                <option value="{{ $image->file }}" @if($image->file === $background) selected @endif>{{ $image->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3 @if(!$background) d-none @endif">
                        <img src="{{ $background ? image_url($background) : '#' }}" class="img-fluid rounded img-preview-sm" alt="background" id="backgroundPreview">
                    </div>

                    @error('background')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="timezoneSelect">{{ trans('admin.settings.index.timezone') }}</label>
                        <select class="custom-select @error('timezone') is-invalid @enderror" id="timezoneSelect" name="timezone" required>
                            @foreach($timezones as $timezone)
                                <option value="{{ $timezone }}" @if($timezone === $currentTimezone) selected @endif>{{ $timezone }}</option>
                            @endforeach
                        </select>

                        @error('timezone')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="localeSelect">{{ trans('admin.settings.index.locale') }}</label>
                        <select class="custom-select @error('locale') is-invalid @enderror" id="localeSelect" name="locale" required>
                            @foreach($locales as $localeCode => $localeName)
                                <option value="{{ $localeCode }}" @if($localeCode === app()->getLocale()) selected @endif>{{ $localeName }}</option>
                            @endforeach
                        </select>

                        @error('locale')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="copyrightInput">{{ trans('admin.settings.index.copyright') }}</label>
                        <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyrightInput" name="copyright" value="{{ old('copyright', $copyright) }}">

                        @error('copyright')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="conditionsInput">{{ trans('admin.settings.index.conditions-url') }}</label>
                        <input type="text" class="form-control @error('conditions') is-invalid @enderror" id="conditionsInput" name="conditions" value="{{ old('conditions', $conditions) }}">

                        @error('conditions')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="moneyNameInput">Money</label>
                    <input type="text" class="form-control @error('money') is-invalid @enderror" id="copyrightInput" name="money" value="{{ old('money', $money) }}">

                    @error('money')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="siteKeyInput">{{ trans('admin.settings.index.site-key') }}</label>
                    <input type="text" class="form-control @error('site-key') is-invalid @enderror" id="siteKeyInput" name="site-key" value="{{ old('site-key', $siteKey) }}" aria-describedby="siteKeyInfo">

                    @error('site-key')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="siteKeyInfo" class="form-text">@lang('admin.settings.index.site-key-label')</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="registerInput" name="register" @if($register) checked @endif aria-describedby="registerInput">
                        <label class="custom-control-label" for="registerInput">{{ trans('admin.settings.index.enable-user-registration') }}</label>
                    </div>

                    <small id="registerInput" class="form-text">{{ trans('admin.settings.index.enable-user-registration-label') }}</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="authApiInput" name="auth-api" @if($authApi) checked @endif aria-describedby="authApiInfo">
                        <label class="custom-control-label" for="authApiInput">{{ trans('admin.settings.index.auth-api') }}</label>
                    </div>

                    <small id="authApiInfo" class="form-text">@lang('admin.settings.index.auth-api-label')</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="minecraftVerifInput" name="minecraft-verification" @if($minecraftVerification) checked @endif>
                        <label class="custom-control-label" for="minecraftVerifInput">{{ trans('admin.settings.index.minecraft-verification') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="userMoneySwitch" name="user_money_transfer" @if($userMoneyTransfer) checked @endif>
                        <label class="custom-control-label" for="userMoneySwitch">{{ trans('admin.settings.index.user-money-transfer') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
