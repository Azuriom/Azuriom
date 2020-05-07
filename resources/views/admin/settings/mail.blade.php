@extends('admin.layouts.admin')

@section('title', trans('admin.settings.mail.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('admin.settings.update-mail') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="mailerSelect">{{ trans('admin.settings.mail.driver') }}</label>

                        <select class="custom-select" id="mailerSelect" name="mailer" data-toggle-select="mail-type">
                            <option value="" @if(config('mail.default') === 'array') selected @endif>{{ trans('messages.none') }}</option>
                            @foreach($mailers as $mailer => $mailerName)
                                <option value="{{ $mailer }}" @if(config('mail.default') === $mailer) selected @endif>{{ $mailerName }}</option>
                            @endforeach
                        </select>

                        <small>@lang('admin.settings.mail.driver-info')</small>
                    </div>

                    <div class="form-group col-md-8">
                        <label for="fromAddressInput">{{ trans('admin.settings.mail.from-address') }}</label>
                        <input type="email" class="form-control @error('from-address') is-invalid @enderror" id="fromAddressInput" name="from-address" value="{{ old('from-address', config('mail.from.address')) }}">

                        @error('from-address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div data-mail-type="smtp">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="smtpHostInput">{{ trans('admin.settings.mail.smtp.host') }}</label>
                            <input type="text" class="form-control @error('smtp-host') is-invalid @enderror" id="smtpHostInput" name="smtp-host" value="{{ old('smtp-host', $smtpConfig['host']) }}" required>

                            @error('smtp-host')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="smtpPortInput">{{ trans('admin.settings.mail.smtp.port') }}</label>
                            <input type="number" min="1" max="65535" class="form-control @error('smtp-port') is-invalid @enderror" id="smtpPortInput" name="smtp-port" value="{{ old('smtp-port', $smtpConfig['port']) }}" required>

                            @error('smtp-port')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="smtpEncryptionSelect">{{ trans('admin.settings.mail.smtp.encryption') }}</label>

                            <select class="custom-select" id="smtpEncryptionSelect" name="smtp-encryption">
                                <option value="" @if(config('mail.encryption') === null) selected @endif>{{ trans('messages.none') }}</option>

                                @foreach($encryptionTypes as $encryption => $encryptionName)
                                    <option value="{{ $encryption }}" @if($smtpConfig['encryption'] === $encryption) selected @endif>{{ $encryptionName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="smtpUsernameInput">{{ trans('admin.settings.mail.smtp.username') }}</label>
                            <input type="text" class="form-control @error('smtp-username') is-invalid @enderror" id="smtpUsernameInput" name="smtp-username" value="{{ old('smtp-username', $smtpConfig['username']) }}">

                            @error('smtp-username')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="smtpPasswordInput">{{ trans('admin.settings.mail.smtp.password') }}</label>

                            <div class="input-group">
                                <input type="password" class="form-control @error('smtp-password') is-invalid @enderror" id="smtpPasswordInput" name="smtp-password" value="{{ old('smtp-password', $smtpConfig['password']) }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" data-password-toggle="smtpPasswordInput">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>

                                @error('smtp-password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
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
