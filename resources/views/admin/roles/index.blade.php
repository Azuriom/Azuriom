@extends('admin.layouts.admin')

@section('title', trans('admin.roles.title'))

@if(Auth::user()->isAdmin())
    @push('footer-scripts')
        <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
        <script>
            const sortable = Sortable.create(document.getElementById('roles'), {
                animation: 150,
                group: 'role',
                handle: '.sortable-handle',
            });

            function serialize(sortable) {
                return [].slice.call(sortable.children).map(function (child) {
                    return child.dataset['id'];
                });
            }

            const saveButton = document.getElementById('save');

            saveButton.addEventListener('click', function () {
                saveButton.setAttribute('disabled', '');

                axios.post('{{ route('admin.roles.update-power') }}', {
                    'roles': serialize(sortable.el).reverse()
                }).then(function (json) {
                    createAlert('success', json.data.message, true);
                }).catch(function (error) {
                    createAlert('danger', error.response.data.message ? error.response.data.message : error, true)
                }).finally(function () {
                    saveButton.removeAttribute('disabled');
                });
            });
        </script>
    @endpush
@endif

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <ol class="list-unstyled sortable mb-3" id="roles">
                @foreach($roles as $role)
                    <li class="sortable-item sortable-dropdown" data-id="{{ $role->id }}">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <span>
                                    @if(Auth::user()->isAdmin())
                                        <i class="bi bi-arrows-move sortable-handle"></i>
                                    @endif

                                    <span class="badge" style="{{ $role->getBadgeStyle() }}; font-size: 1.05em">
                                        @if($role->icon) <i class="{{ $role->icon }}"></i> @endif
                                        {{ $role->name }}
                                    </span>

                                    <span class="text-body-secondary">
                                        {{ trans('admin.roles.info', ['id' => $role->id, 'power' => $role->power]) }}
                                    </span>

                                    @if($role->isDefault())
                                        <i class="bi bi-star text-info" title="{{ trans('admin.roles.default') }}" data-bs-toggle="tooltip"></i>
                                    @endif
                                    @if($role->is_admin)
                                        <i class="bi bi-trophy text-warning" title="{{ trans('admin.roles.admin') }}" data-bs-toggle="tooltip"></i>
                                    @endif
                                </span>
                                <span>
                                    @can('update', $role)
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @if(! $role->isDefault())
                                        @can('delete', $role)
                                            <a href="{{ route('admin.roles.destroy', $role) }}" class="m-1 " title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                                        @endcan
                                    @endif
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            @if(Auth::user()->isAdmin())
                <button type="button" class="btn btn-success" id="save">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                    <span class="spinner-border spinner-border-sm btn-spinner" role="status"></span>
                </button>
            @endif

            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.roles.discord.title') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.settings') }}" method="POST">
                @csrf

                <div class="alert alert-info">
                    <p><i class="bi bi-info-circle"></i> @lang('admin.roles.discord.info', ['url' => route('profile.discord.link')])</p>
                    <p>@lang('admin.roles.discord.oauth', ['url' => route('profile.discord.callback')])</p>
                    <a href="https://azuriom.com/docs/discord-link" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                        <i class="bi bi-question-circle"></i> @lang('messages.info')
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="clientId" class="form-label">
                            {{ trans('admin.roles.discord.client_id') }}
                        </label>
                        <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="clientId" name="client_id" value="{{ old('client_id', setting('discord.client_id')) }}">

                        @error('client_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="clientSecret" class="form-label">
                            {{ trans('admin.roles.discord.client_secret') }}
                        </label>
                        <input type="text" class="form-control @error('client_secret') is-invalid @enderror" id="clientSecret" name="client_secret" value="{{ old('client_secret', setting('discord.client_secret')) }}">

                        @error('client_secret')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="token" class="form-label">
                        {{ trans('admin.roles.discord.token') }}
                    </label>
                    <input type="password" class="form-control @error('token') is-invalid @enderror" id="token" name="token" value="{{ old('token', setting('discord.token')) }}" aria-describedby="botInfo">

                    @error('token')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <small id="botInfo" class="form-text">
                        @lang('admin.roles.discord.token_info')
                    </small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="linkSwitch" name="link_roles" aria-describedby="enableInfo" @checked($linkRoles)>
                        <label class="form-check-label" for="linkSwitch">
                            {{ trans('admin.roles.discord.enable') }}
                        </label>
                    </div>

                    <small id="enableInfo" class="form-text">
                        @lang('admin.roles.discord.enable_info')
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
