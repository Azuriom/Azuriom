@extends('admin.layouts.admin')

@section('title', trans('admin.settings.mail.title'))

@push('footer-scripts')
    <script>
        function updateType(el) {
            document.querySelectorAll('[data-mail-type]').forEach(function (e) {
                e.classList.add('d-none');
            });

            const current = document.querySelector('[data-mail-type="' + el.value + '"]');
            if (current) {
                current.classList.remove('d-none');
            }
        }

        const typeSelect = document.getElementById('driverSelect');

        updateType(typeSelect);

        typeSelect.addEventListener('change', function (ev) {
            updateType(ev.target);
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('admin.settings.update-mail') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="fromAddressInput">{{ trans('admin.settings.mail.from-address') }}</label>
                    <input type="email" class="form-control @error('from-address') is-invalid @enderror" id="fromAddressInput" name="from-address" value="{{ old('from-address', config('mail.from.address')) }}">

                    @error('from-address')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="driverSelect">{{ trans('admin.settings.mail.driver') }}</label>

                        <select class="custom-select" id="driverSelect" name="driver">
                            @foreach($drivers as $driver => $driverName)
                                <option value="{{ $driver }}" @if(config('mail.driver') === $driver) selected @endif>{{ $driverName }}</option>
                            @endforeach
                        </select>

                        <small>@lang('admin.settings.mail.driver-info')</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="encryptionSelect">{{ trans('admin.settings.mail.encryption') }}</label>

                        <select class="custom-select" id="encryptionSelect" name="encryption">
                            <option value="" @if(config('mail.encryption') === null) selected @endif>{{ trans('messages.none') }}</option>

                            @foreach($encryptionTypes as $encryption => $encryptionName)
                                <option value="{{ $encryption }}" @if(config('mail.encryption') === $encryption) selected @endif>{{ $encryptionName }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div data-mail-type="smtp">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="hostInput">{{ trans('admin.settings.mail.host') }}</label>
                            <input type="text" class="form-control @error('host') is-invalid @enderror" id="hostInput" name="host" value="{{ old('host', config('mail.host')) }}" required>

                            @error('host')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="portInput">{{ trans('admin.settings.mail.port') }}</label>
                            <input type="number" min="1" max="65535" class="form-control @error('port') is-invalid @enderror" id="portInput" name="port" value="{{ old('port', config('mail.port', 2525)) }}" required>

                            @error('port')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="usernameInput">{{ trans('admin.settings.mail.username') }}</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="usernameInput" name="username" value="{{ old('username', config('mail.username')) }}">

                            @error('username')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="passwordInput">{{ trans('admin.settings.mail.password') }}</label>

                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" value="{{ old('password', config('mail.password')) }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" data-password-toggle="passwordInput">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div data-mail-type="sendmail">
                    <div class="form-group">
                        <label for="sendmail-pathInput">{{ trans('admin.settings.mail.sendmail-path') }}</label>
                        <input type="text" class="form-control @error('sendmail-path') is-invalid @enderror" id="sendmail-pathInput" name="sendmail-path" value="{{ old('sendmail-path', config('mail.sendmail-path', '/usr/sbin/sendmail -bs')) }}" required>

                        @error('sendmail-path')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <small>{{ trans('admin.settings.mail.sendmail-path-info') }}</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
