@push('footer-scripts')
    <script src="{{ asset('vendor/clipboard/clipboard.min.js') }}"></script>
    <script>
        const clipboardJs = new ClipboardJS('[data-clipboard-target]');

        clipboardJs.on('success', function (e) {
            e.clearSelection();

            const oldTitle = e.trigger.dataset['originalTitle'];

            if ($.fn.tooltip) {
                e.trigger.setAttribute('data-original-title', e.trigger.dataset['copied']);
                $(e.trigger).tooltip('show');
                e.trigger.setAttribute('data-original-title', oldTitle === undefined ? '' : oldTitle);
            }
        });

        const azLinkPortInput = document.getElementById('azlinkPortInput');

        if (azLinkPortInput) {
            azLinkPortInput.addEventListener('input', function (e) {
                let port = azLinkPortInput.value;

                if (port < 1 || port > 65535) {
                    port = '25888';
                }

                document.getElementById('azLinkPortDisplay').innerText = port;
            });
        }
    </script>
    @isset($server)
        <script>
            const verifyButton = document.getElementById('verifyAzLink');
            const verifyButtonIcon = verifyButton.querySelector('.btn-spinner');

            verifyButton.addEventListener('click', function () {
                verifyButton.setAttribute('disabled', '');
                verifyButtonIcon.classList.remove('d-none');

                const formData = new FormData(document.getElementById('serverForm'));
                formData.delete('_method');

                axios.post('{{ route('admin.servers.verify-azlink', $server) }}', formData)
                    .then(function (json) {
                        createAlert('success', json.data.message, true);
                    }).catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                }).finally(function () {
                    verifyButton.removeAttribute('disabled');
                    verifyButtonIcon.classList.add('d-none');
                });
            });
        </script>
    @endisset
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
        <select class="custom-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required data-toggle-select="server-type">
            @foreach($types as $type)
                <option value="{{ $type }}" @if($type === old('type', $server->type ?? '')) selected @endif>{{ trans('admin.servers.type.'.$type) }}</option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label for="addressInput">{{ trans('admin.servers.fields.address') }}</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="addressInput" name="address" value="{{ old('address', $server->address ?? '') }}" required>

        @error('address')
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
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle"></i>
        {{ trans('admin.servers.ping-no-commands') }}
    </div>
</div>

<div data-server-type="source-query source-rcon" class="form-group d-none">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="querySourcePortInput">{{ trans('admin.servers.fields.query-port') }}</label>
            <input type="number" min="1" max="65535" class="form-control @error('query-port') is-invalid @enderror" id="querySourcePortInput" name="query-port" value="{{ old('query-port', $server->data['query-port'] ?? '') }}" aria-describedby="queryPortInfo">

            @error('query-port')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <small id="queryPortInfo" class="form-text">{{ trans('admin.servers.query-port-info') }}</small>
        </div>
    </div>
</div>

<div data-server-type="mc-rcon source-rcon rust-rcon" class="form-group d-none">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="rconPasswordInput">{{ trans('admin.servers.fields.rcon-password') }}</label>

            <div class="input-group">
                <input type="password" class="form-control @error('rcon-password') is-invalid @enderror" id="rconPasswordInput" name="rcon-password" value="{{ old('rcon-password', ! empty($server->data['rcon-password']) ? decrypt($server->data['rcon-password'], false) : '') }}">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary" data-password-toggle="rconPasswordInput">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                </div>

                @error('rcon-password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="rconPortInput">{{ trans('admin.servers.fields.rcon-port') }}</label>
            <input type="number" min="1" max="65535" class="form-control @error('rcon-port') is-invalid @enderror" id="rconPortInput" name="rcon-port" value="{{ old('rcon-port', $server->data['rcon-port'] ?? '') }}" aria-describedby="rconPortInfo">

            @error('rcon-port')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <small id="rconPortInfo" class="form-text">{{ trans('admin.servers.query-port-info') }}</small>
        </div>
    </div>
</div>

<div data-server-type="mc-azlink" class="d-none">
    <div class="form-group custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="hasPingSwitch" name="azlink-ping" data-toggle="collapse" data-target="#hasPingGroup" @if(isset($server) && ($server->data['azlink-ping'] ?? true)) checked @endisset aria-describedby="pingInfo">
        <label class="custom-control-label" for="hasPingSwitch">{{ trans('admin.servers.azlink.enable-ping') }}</label>

        <small class="form-text" id="pingInfo">{{ trans('admin.servers.azlink.ping-info') }}</small>
    </div>

    <div id="hasPingGroup" class="@if(isset($server) && ($server->data['azlink-ping'] ?? true)) show @else collapse @endisset">
        <div class="form-group custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customPortSwitch" name="azlink-custom-port" data-toggle="collapse" data-target="#customPortGroup" @isset($server->data['azlink-port']) checked @endisset>
            <label class="custom-control-label" for="customPortSwitch">{{ trans('admin.servers.azlink.custom-port') }}</label>
        </div>

        <div id="customPortGroup" class="@isset($server->data['azlink-port']) show @else collapse @endisset">
            <div class="card card-body mb-3">
                <div class="form-group">
                    <label for="azlinkPortInput">{{ trans('admin.servers.fields.azlink-port') }}</label>
                    <input type="number" min="1" max="65535" class="form-control @error('azlink-port') is-invalid @enderror" id="azlinkPortInput" name="azlink-port" value="{{ old('azlink-port', $server->data['azlink-port'] ?? '') }}" placeholder="25588">

                    @error('azlink-port')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="alert alert-info mb-0" role="alert">
                    <i class="fas fa-info-circle"></i>
                    {{ trans('admin.servers.azlink.port-info') }}
                    <code id="portCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-toggle="tooltip" data-clipboard-target="#portCommand">/azlink port
                        <span id="azLinkPortDisplay">{{ $server->data['azlink-port'] ?? '25588' }}</span></code>
                </div>
            </div>
        </div>

        @isset($server)
            <button type="button" class="btn btn-success mb-4" id="verifyAzLink">
                <i class="fas fa-check"></i> {{ trans('admin.servers.actions.verify-connection') }}
                <span class="spinner-border spinner-border-sm btn-spinner d-none" role="status"></span>
            </button>
        @endisset
    </div>

    @isset($server)
        <div class="form-group">
            @if($server->isOnline())
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    {{ trans('admin.servers.azlink.link-info') }}
                    <code id="linkCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-toggle="tooltip" data-clipboard-target="#linkCommand">{{ $server->getLinkCommand() }}</code>
                    .
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    {{ trans('admin.servers.azlink.link') }}
                    <ol class="mb-0">
                        <li>@lang('admin.servers.azlink.link-1')</li>
                        <li>{{ trans('admin.servers.azlink.link-2') }}</li>
                        <li>
                            {{ trans('admin.servers.azlink.link-3') }}
                            <code id="linkCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-toggle="tooltip" data-clipboard-target="#linkCommand">{{ $server->getLinkCommand() }}</code>
                            .
                        </li>
                    </ol>
                </div>
            @endif
        </div>
    @else
        <button type="submit" name="redirect" value="edit" class="btn btn-success mb-2">
            <i class="fas fa-arrow-right"></i> {{ trans('messages.actions.continue') }}
        </button>
    @endisset
</div>
