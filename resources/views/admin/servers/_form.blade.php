@push('footer-scripts')
    <script>
        function updateType(el) {
            document.querySelectorAll('[data-server-type]').forEach(function (e) {
                e.classList.add('d-none');
            });

            const current = document.querySelector('[data-server-type="' + el.value + '"]');
            if (current) {
                current.classList.remove('d-none');
            }
        }

        const typeSelect = document.getElementById('typeSelect');

        updateType(typeSelect);

        typeSelect.addEventListener('change', function (ev) {
            updateType(ev.target);
        });

        document.querySelectorAll('[data-password-toggle]').forEach(function (el) {
            el.addEventListener('click', function () {
                const input = document.getElementById(el.dataset['passwordToggle']);
                const icon = el.querySelector('.fas');

                if (! input) {
                    return;
                }

                if (input.getAttribute('type') === 'text') {
                    input.setAttribute('type', 'password');

                    if (icon) {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                } else {
                    input.setAttribute('type', 'text');

                    if (icon) {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                }
            });
        });
    </script>
@endpush

@csrf

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $server->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="custom-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required>
            @foreach($types as $type)
                <option value="{{ $type }}" @if($type === old('type', $server->type ?? '')) selected @endif>{{ $type }}</option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label for="ipInput">{{ trans('admin.servers.fields.address') }}</label>
        <input type="text" class="form-control @error('ip') is-invalid @enderror" id="ipInput" name="ip" value="{{ old('ip', $server->ip ?? '') }}" required>

        @error('ip')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="portInput">{{ trans('admin.servers.fields.port') }}</label>
        <input type="number" min="1" max="65535" class="form-control @error('port') is-invalid @enderror" id="portInput" name="port" value="{{ old('port', $server->port ?? '') }}">

        @error('port')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div data-server-type="mc-ping" class="form-group d-none">
    <small class="text-danger">{{ trans('admin.servers.ping-no-commands') }}</small>
</div>

<div data-server-type="mc-rcon" class="form-group d-none">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="rconPasswordInput">{{ trans('admin.servers.fields.rcon-password') }}</label>

            <div class="input-group">
                <input type="password" class="form-control @error('rcon-password') is-invalid @enderror" id="rconPasswordInput" name="rcon-password" value="{{ old('rcon-password', ! empty($server->data['rcon.password']) ? decrypt($server->data['rcon.password'], false) : '') }}">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary" data-password-toggle="rconPasswordInput"><i class="fas fa-eye"></i></button>
                </div>

                @error('rcon-password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="rconPortInput">{{ trans('admin.servers.fields.rcon-port') }}</label>
            <input type="number" min="1" max="65535" class="form-control @error('rcon-port') is-invalid @enderror" id="rconPortInput" name="rcon-port" value="{{ old('rcon-port', $server->data['rcon.port'] ?? '') }}">

            @error('rcon-port')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
</div>
