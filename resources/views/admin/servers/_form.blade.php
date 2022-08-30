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
    </script>
    @isset($server)
        <script>
            const azLinkPortInput = document.getElementById('azlinkPortInput');
            const verifyButton = document.getElementById('verifyAzLink');

            if (azLinkPortInput) {
                azLinkPortInput.addEventListener('input', function () {
                    let port = azLinkPortInput.value;

                    if (port < 1 || port > 65535) {
                        port = '25888';
                    }

                    document.getElementById('azLinkPortDisplay').innerText = port;
                });
            }

            if (verifyButton) {
                verifyButton.addEventListener('click', function () {
                    verifyButton.setAttribute('disabled', '');

                    const formData = new FormData(document.getElementById('serverForm'));
                    formData.delete('_method');

                    axios.post('{{ route('admin.servers.verify-azlink', $server) }}', formData)
                        .then(function (json) {
                            createAlert('success', json.data.message, true);
                        }).catch(function (error) {
                        createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                    }).finally(function () {
                        verifyButton.removeAttribute('disabled');
                    });
                });
            }
        </script>
    @endisset
@endpush

@csrf

<div class="row g-3">
    <div class="mb-3 col-md-6">
        <label class="form-label" for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $server->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label" for="typeSelect">{{ trans('messages.fields.type') }}</label>
        <select class="form-select @error('type') is-invalid @enderror" id="typeSelect" name="type" required v-model="type">
            @foreach($types as $type)
                <option value="{{ $type }}" @selected($type === old('type', $server->type ?? ''))>
                    {{ trans('admin.servers.type.'.$type) }}
                </option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="row g-3">
    <div class="mb-3 col-md-8">
        <label class="form-label" for="addressInput">{{ trans('messages.fields.address') }}</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="addressInput" name="address" value="{{ old('address', $server->address ?? '') }}" required>

        @error('address')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label" for="portInput">{{ trans('messages.fields.port') }}</label>
        <input type="number" min="1" max="65535" class="form-control @error('port') is-invalid @enderror" id="portInput" name="port" value="{{ old('port', $server->port ?? '') }}">

        @error('port')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

 <div v-show="type === 'mc-ping'" class="mb-3">
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info-circle"></i> {{ trans('admin.servers.ping_info') }}
    </div>
</div>

<div v-show="type === 'source-query' || type === 'source-rcon'">
    <div class="row g-3">
        <div class="mb-3 col-md-4">
            <label class="form-label" for="querySourcePortInput">{{ trans('admin.servers.query_port') }}</label>
            <input type="number" min="1" max="65535" class="form-control @error('query-port') is-invalid @enderror" id="querySourcePortInput" name="query-port" value="{{ old('query-port', $server->data['query-port'] ?? '') }}" aria-describedby="queryPortInfo">

            @error('query-port')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <small id="queryPortInfo" class="form-text">{{ trans('admin.servers.query_port_info') }}</small>
        </div>
    </div>
</div>

<div v-show="type === 'source-query'" class="mb-3">
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info-circle"></i> {{ trans('admin.servers.query_info') }}
    </div>
</div>

<div v-show="type.includes('rcon')">
    <div class="row g-3">
        <div class="mb-3 col-md-8">
            <label class="form-label" for="rconPasswordInput">{{ trans('admin.servers.rcon_password') }}</label>

            <div class="input-group has-validation" v-scope="{toggle: false}">
                <input :type="toggle ? 'text' : 'password'" class="form-control @error('rcon-password') is-invalid @enderror" id="rconPasswordInput" name="rcon-password" value="{{ old('rcon-password', ! empty($server->data['rcon-password']) ? decrypt($server->data['rcon-password'], false) : '') }}">
                <button @click="toggle = !toggle" type="button" class="btn btn-outline-primary">
                    <i class="bi" :class="toggle ? 'bi-eye' : 'bi-eye-slash'"></i>
                </button>

                @error('rcon-password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label class="form-label" for="rconPortInput">{{ trans('admin.servers.rcon_port') }}</label>
            <input type="number" min="1" max="65535" class="form-control @error('rcon-port') is-invalid @enderror" id="rconPortInput" name="rcon-port" value="{{ old('rcon-port', $server->data['rcon-port'] ?? '') }}" aria-describedby="rconPortInfo">

            @error('rcon-port')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <small id="rconPortInfo" class="form-text">{{ trans('admin.servers.query_port_info') }}</small>
        </div>
    </div>
</div>

<div v-show="type === 'mc-azlink' || type === 'steam-azlink'">
    @unless(isset($server) && $server->isOnline())
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> @lang('admin.servers.azlink.info')
        </div>
    @endunless

    <div v-show="type === 'mc-azlink'" class="mb-3 form-check form-switch">
        <input type="checkbox" class="form-check-input" id="hasPingSwitch" name="azlink-ping" data-bs-toggle="collapse" data-bs-target="#hasPingGroup" @if(isset($server) && ($server->data['azlink-ping'] ?? false)) checked @endisset aria-describedby="pingInfo">
        <label class="form-check-label" for="hasPingSwitch">{{ trans('admin.servers.azlink.ping') }}</label>

        <small class="form-text" id="pingInfo">{{ trans('admin.servers.azlink.ping_info') }}</small>
    </div>

    <div id="hasPingGroup" v-show="type === 'mc-azlink'" class="@if(isset($server) && ($server->data['azlink-ping'] ?? false)) show @else collapse @endisset">
        <div class="mb-3 form-check form-switch">
            <input type="checkbox" class="form-check-input" id="customPortSwitch" name="azlink-custom-port" data-bs-toggle="collapse" data-bs-target="#customPortGroup" @isset($server->data['azlink-port']) checked @endisset>
            <label class="form-check-label" for="customPortSwitch">{{ trans('admin.servers.azlink.custom_port') }}</label>
        </div>

        <div id="customPortGroup" class="@isset($server->data['azlink-port']) show @else collapse @endisset">
            <div class="card card-body mb-3">
                <div class="mb-3">
                    <label class="form-label" for="azlinkPortInput">{{ trans('admin.servers.azlink.port') }}</label>
                    <input type="number" min="1" max="65535" class="form-control @error('azlink-port') is-invalid @enderror" id="azlinkPortInput" name="azlink-port" value="{{ old('azlink-port', $server->data['azlink-port'] ?? '') }}" placeholder="25588">

                    @error('azlink-port')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="alert alert-info mb-0" role="alert">
                    <i class="bi bi-info-circle"></i>
                    {{ trans('admin.servers.azlink.port_command') }}
                    <code id="portCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-bs-toggle="tooltip" data-clipboard-target="#portCommand">/azlink port
                        <span id="azLinkPortDisplay">{{ $server->data['azlink-port'] ?? '25588' }}</span></code>
                </div>
            </div>
        </div>

        @if(isset($server) && $server->isOnline())
            <button type="button" class="btn btn-success mb-4" id="verifyAzLink">
                <i class="bi bi-check-lg"></i> {{ trans('admin.servers.verify') }}
                <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
            </button>
        @endif
    </div>

    @isset($server)
        <div class="mb-3">
            @if($server->isOnline())
                <div class="alert alert-info" role="alert">
                    <i class="bi bi-info-circle"></i>
                    {{ trans('admin.servers.azlink.command') }}
                    <code id="linkCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-bs-toggle="tooltip" data-clipboard-target="#linkCommand">
                        {{ $server->getLinkCommand() }}
                    </code>
                    .
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    {{ trans('admin.servers.azlink.link') }}
                    <ol class="mb-0">
                        <li>@lang('admin.servers.azlink.link1')</li>
                        <li>{{ trans('admin.servers.azlink.link2') }}</li>
                        <li>
                            {{ trans('admin.servers.azlink.link3') }}
                            <code id="linkCommand" class="cursor-copy" title="{{ trans('messages.actions.copy') }}" data-copied="{{ trans('messages.copied') }}" data-bs-toggle="tooltip" data-clipboard-target="#linkCommand">
                                {{ $server->getLinkCommand() }}
                            </code>
                            .
                        </li>
                    </ol>
                </div>
            @endif
        </div>
    @else
        <button type="submit" name="redirect" value="edit" class="btn btn-success mb-2">
            <i class="bi bi-arrow-right"></i> {{ trans('messages.actions.continue') }}
        </button>
    @endisset
</div>

<div class="mb-3 form-check form-switch">
    <input type="checkbox" class="form-check-input" id="displaySwitch" name="home_display" @checked($server->home_display ?? true)>
    <label class="form-check-label" for="displaySwitch">{{ trans('admin.servers.home_display') }}</label>
</div>

<div class="mb-3">
    <label class="form-label" for="urlInput">{{ trans('admin.servers.url') }}</label>
    <input type="url" class="form-control @error('join_url') is-invalid @enderror" id="urlInput" name="join_url" value="{{ old('join_url', $server->join_url ?? '') }}">

    @error('join_url')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
    <label class="form-text">@lang('admin.servers.url_info')</label>
</div>
