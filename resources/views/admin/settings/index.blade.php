@extends('admin.layouts.admin')

@section('title', trans('admin.settings.index.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="nameInput">{{ trans('admin.settings.index.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', site_name()) }}" required>

                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-7">
                        <label class="form-label" for="urlInput">{{ trans('admin.settings.index.url') }}</label>
                        <input type="url" class="form-control @error('url') is-invalid @enderror" id="urlInput" name="url" value="{{ old('url', config('app.url')) }}" required>

                        @error('url')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descriptionInput">{{ trans('admin.settings.index.description') }}</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', setting('description')) }}">

                    @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="keywordsInput">{{ trans('admin.settings.index.meta') }}</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywordsInput" name="keywords" placeholder="word1, word2" value="{{ old('keywords', setting('keywords', '')) }}" aria-describedby="keywordsInfo">

                    @error('keywords')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="keywordsInfo" class="form-text">{{ trans('admin.settings.index.meta_info') }}</small>
                </div>

                <div class="row g-3">
                    <div class="mb-3 col-md-6" v-scope="{ icon: '{{ $icon ?? '' }}' }">
                        <label class="form-label" for="imageSelect">{{ trans('admin.settings.index.favicon') }}</label>
                        <div class="input-group mb-3">
                            <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-upload"></i>
                            </a>
                            <select class="form-select @error('icon') is-invalid @enderror" id="imageSelect" v-model="icon" name="icon">
                                <option value="" @selected(!$icon)>
                                    {{ trans('messages.none') }}
                                </option>

                                @foreach($images as $image)
                                    <option value="{{ $image->file }}" @selected($image->file === $icon)>
                                        {{ $image->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <img v-if="icon" :src="icon ? '{{ image_url() }}/' + icon : '#'" class="img-fluid rounded img-preview-sm" alt="Favicon">

                        @error('icon')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6" v-scope="{ logo: '{{ $logo ?? '' }}' }">
                        <label class="form-label" for="logoSelect">{{ trans('admin.settings.index.logo') }}</label>
                        <div class="input-group mb-3">
                            <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-upload"></i>
                            </a>
                            <select class="form-select @error('logo') is-invalid @enderror" id="logoSelect" v-model="logo" name="logo">
                                <option value="" @selected(!$logo)>
                                    {{ trans('messages.none') }}
                                </option>

                                @foreach($images as $image)
                                    <option value="{{ $image->file }}" @selected($image->file === $logo)>
                                        {{ $image->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <img v-if="logo" :src="logo ? '{{ image_url() }}/' + logo : '#'" class="img-fluid rounded img-preview-sm" alt="Logo">

                        @error('logo')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3"  v-scope="{ background: '{{ $background ?? '' }}' }">
                    <label class="form-label" for="imageSelect">{{ trans('admin.settings.index.background') }}</label>
                    <div class="input-group mb-3">
                        <a class="btn btn-outline-success" href="{{ route('admin.images.create') }}" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-upload"></i>
                        </a>
                        <select class="form-select @error('background') is-invalid @enderror" id="imageSelect" v-model="background" name="background">
                            <option value="" @selected(!$background)>
                                {{ trans('messages.none') }}
                            </option>
                            @foreach($images as $image)
                                <option value="{{ $image->file }}" @selected($image->file === $background)>
                                    {{ $image->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <img :src="background ? '{{ image_url() }}/' + background : ''" class="img-fluid rounded img-preview-sm" alt="Background">

                    @error('background')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="timezoneSelect">{{ trans('admin.settings.index.timezone') }}</label>
                        <select class="form-select @error('timezone') is-invalid @enderror" id="timezoneSelect" name="timezone" required>
                            @foreach($timezones as $timezone)
                                <option value="{{ $timezone }}" @selected($timezone === $currentTimezone)>
                                    {{ $timezone }}
                                </option>
                            @endforeach
                        </select>

                        @error('timezone')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="localeSelect">{{ trans('admin.settings.index.locale') }}</label>
                        <select class="form-select @error('locale') is-invalid @enderror" id="localeSelect" name="locale" required>
                            @foreach($locales as $localeCode => $localeName)
                                <option value="{{ $localeCode }}" @selected($localeCode === app()->getLocale())>
                                    {{ $localeName }}
                                </option>
                            @endforeach
                        </select>

                        @error('locale')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row g-3">
                    <div class="mb-3 col-md-8">
                        <label class="form-label" for="copyrightInput">{{ trans('admin.settings.index.copyright') }}</label>
                        <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyrightInput" name="copyright" value="{{ old('copyright', $copyright) }}">

                        @error('copyright')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="moneyNameInput">{{ trans('admin.settings.index.money') }}</label>
                        <input type="text" class="form-control @error('money') is-invalid @enderror" id="copyrightInput" name="money" value="{{ old('money', $money) }}">

                        @error('money')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="siteKeyInput">{{ trans('admin.settings.index.site_key') }}</label>
                        <input type="text" class="form-control @error('site-key') is-invalid @enderror" id="siteKeyInput" name="site-key" value="{{ old('site-key', $siteKey) }}" aria-describedby="siteKeyInfo">

                        @error('site-key')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <small id="siteKeyInfo" class="form-text">@lang('admin.settings.index.site_key_info')</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="webhookInput">{{ trans('admin.settings.index.webhook') }}</label>
                        <input type="text" class="form-control @error('posts_webhook') is-invalid @enderror" id="webhookInput" name="posts_webhook" placeholder="https://discord.com/api/webhooks/.../..." value="{{ old('posts_webhook', $postsWebhook) }}" aria-describedby="webhookInfo">

                        @error('posts_webhook')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <small id="webhookInfo" class="form-text">{{ trans('admin.settings.index.webhook_info') }}</small>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="userMoneySwitch" name="user_money_transfer" @checked($userMoneyTransfer)>
                        <label class="form-check-label" for="userMoneySwitch">{{ trans('admin.settings.index.user_money_transfer') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
