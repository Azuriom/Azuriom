@extends('admin.layouts.admin')

@section('title', trans('admin.settings.mail.title'))

@push('footer-scripts')
    <script>
        const sendTestMailButton = document.getElementById('sendTestMail');

        sendTestMailButton.addEventListener('click', function () {

            sendTestMailButton.setAttribute('disabled', '');

            axios.post('{{ route('admin.settings.mail.send') }}')
                .then(function (response) {
                    createAlert('success', response.data.message, true)
                })
                .catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                })
                .finally(function () {
                    sendTestMailButton.removeAttribute('disabled');
                });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('admin.settings.mail.update') }}" method="POST" v-scope="{ type: '{{ str_replace('array', '', config('mail.default')) }}' }">
                @csrf

                <div class="row g-3">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="mailerSelect">{{ trans('admin.settings.mail.mailer') }}</label>

                        <select class="form-select" id="mailerSelect" name="mailer" v-model="type" aria-describedby="mailerInfo">
                            <option value="" @selected(config('mail.default') === 'array')>
                                {{ trans('messages.none') }}
                            </option>
                            @foreach($mailers as $mailer => $mailerName)
                                <option value="{{ $mailer }}" @selected(config('mail.default') === $mailer)>
                                    {{ $mailerName }}
                                </option>
                            @endforeach
                        </select>

                        <small id="mailerInfo" class="form-text">@lang('admin.settings.mail.mailer_info')</small>
                    </div>

                    <div class="mb-3 col-md-8">
                        <label class="form-label" for="fromAddressInput">{{ trans('admin.settings.mail.from') }}</label>
                        <input type="email" class="form-control @error('from-address') is-invalid @enderror" id="fromAddressInput" name="from-address" value="{{ old('from-address', config('mail.from.address')) }}" required>

                        @error('from-address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div v-show="type === 'smtp'">
                    <div class="row g-3">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="smtpHostInput">{{ trans('admin.settings.mail.smtp.host') }}</label>
                            <input type="text" class="form-control @error('smtp-host') is-invalid @enderror" id="smtpHostInput" name="smtp-host" value="{{ old('smtp-host', $smtpConfig['host']) }}" required>

                            @error('smtp-host')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="smtpPortInput">{{ trans('admin.settings.mail.smtp.port') }}</label>
                            <input type="number" min="1" max="65535" class="form-control @error('smtp-port') is-invalid @enderror" id="smtpPortInput" name="smtp-port" value="{{ old('smtp-port', $smtpConfig['port']) }}" required>

                            @error('smtp-port')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="smtpEncryptionSelect">{{ trans('admin.settings.mail.smtp.encryption') }}</label>

                            <select class="form-select" id="smtpEncryptionSelect" name="smtp-encryption">
                                <option value="" @selected(config('mail.encryption') === null)>
                                    {{ trans('messages.none') }}
                                </option>

                                @foreach($encryptionTypes as $encryption => $encryptionName)
                                    <option value="{{ $encryption }}" @selected($smtpConfig['encryption'] === $encryption)>
                                        {{ $encryptionName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="smtpUsernameInput">{{ trans('admin.settings.mail.smtp.username') }}</label>
                            <input type="text" class="form-control @error('smtp-username') is-invalid @enderror" id="smtpUsernameInput" name="smtp-username" value="{{ old('smtp-username', $smtpConfig['username']) }}">

                            @error('smtp-username')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="smtpPasswordInput">{{ trans('admin.settings.mail.smtp.password') }}</label>

                            <div class="input-group has-validation" v-scope="{toggle: false}">
                                <input :type="toggle ? 'text' : 'password'" class="form-control @error('smtp-password') is-invalid @enderror" id="smtpPasswordInput" name="smtp-password" value="{{ old('smtp-password') }}">
                                <button @click="toggle = !toggle" type="button" class="btn btn-outline-primary">
                                    <i class="bi" :class="toggle ? 'bi-eye' : 'bi-eye-slash'"></i>
                                </button>

                                @error('smtp-password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div v-if="type === 'sendmail'" class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ trans('admin.settings.mail.sendmail') }}
                </div>

                <div v-if="!type" class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ trans('admin.settings.mail.disabled') }}
                </div>

                <div class="mb-3" data-mail-type="smtp sendmail">
                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="verificationSwitch" name="users_email_verification" @checked(setting('mail.users_email_verification'))>
                        <label class="form-check-label" for="verificationSwitch">{{ trans('admin.settings.mail.verification') }}</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>

                <button type="button" class="btn btn-success" id="sendTestMail" data-mail-type="smtp sendmail">
                    <i class="bi bi-send"></i>
                    {{ trans('admin.settings.mail.send') }}
                    <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
                </button>
            </form>
        </div>
    </div>
@endsection
