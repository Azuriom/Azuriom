@include('admin.elements.color-picker')

@csrf

<div class="row gx-3">
    <div class="mb-3 col-md-5">
        <label class="form-label" for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $role->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-5">
        <label class="form-label" for="iconInput">{{ trans('messages.fields.icon') }}</label>

        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="iconInput" name="icon" value="{{ old('icon', $role->icon ?? '') }}" placeholder="bi bi-star" aria-labelledby="iconLabel">

        @error('icon')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small id="iconLabel" class="form-text">@lang('messages.icons')</small>
    </div>

    <div class="mb-3 col-md-2 mb-4">
        <label class="form-label" for="colorInput">{{ trans('messages.fields.color') }}</label>
        <input type="color" class="form-control form-control-color color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $role->color ?? '#2196f3') }}" required>

        @error('color')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<h3>{{ trans('messages.fields.permissions') }}</h3>

<div class="mb-3">
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="adminSwitch" name="is_admin" data-bs-toggle="collapse" data-bs-target="#permissionsGroup" @checked($role->is_admin ?? false) aria-describedby="adminInfo">
        <label class="form-check-label" for="adminSwitch">{{ trans('admin.roles.admin') }}</label>
    </div>

    <small id="adminInfo" class="form-text text-info">{{ trans('admin.roles.admin_info') }}</small>
</div>

<div id="permissionsGroup" class="{{ ($role->is_admin ?? false) ? 'collapse' : 'show' }}">
    <div class="card card-body mb-3 pb-0" id="rolePermissions">
        <div class="row g-2 mb-3 align-items-center">
            <div class="col-md">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" id="permissionsSearch" placeholder="{{ trans('messages.actions.search') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-md-auto d-flex gap-2">
                <button type="button" class="btn btn-danger" data-permissions-action="deselect-all">
                    <i class="bi bi-x-lg"></i> {{ trans('messages.actions.deselect_all') }}
                </button>
            </div>
        </div>

        @foreach($permissions as $group => $localPermissions)
            <div class="permissions-group mb-3" data-permissions-group="{{ $group }}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                        <button type="button" class="btn btn-link fw-bold link-body-emphasis p-0" data-bs-toggle="collapse" data-bs-target="#permissionsGroup{{ $loop->index }}" aria-expanded="true">
                        <i class="bi bi-chevron-down"></i>
                        {{ trans()->has('admin.roles.group.'.$group) ? trans('admin.roles.group.'.$group) : Str::title($group) }}
                        <span class="badge bg-secondary ms-1">{{ count($localPermissions) }}</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary" data-permissions-action="toggle-group" data-group="{{ $group }}"
                            title="{{ trans('messages.actions.select_all') }}" data-bs-toggle="tooltip">
                        <i class="bi bi-check2-square"></i>
                    </button>
                </div>

                <div class="collapse show" id="permissionsGroup{{ $loop->index }}">
                    <div class="row">
                        @foreach($localPermissions as $permission => $permissionDescription)
                            <div class="col-lg-6 permissions-item" data-permission-name="{{ $permission }}" data-permission-label="{{ trans($permissionDescription) }}">
                                <div class="mb-2 form-check">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ $loop->parent->index }}_{{ $loop->index }}"
                                           name="permissions[]" value="{{ $permission }}" @checked(isset($role) && $role->hasRawPermission($permission))
                                           data-role-permission="{{ $permission }}" data-permissions-group="{{ $group }}">

                                    <label class="form-check-label" for="permission_{{ $loop->parent->index }}_{{ $loop->index }}">
                                        <code>{{ $permission }}</code>
                                        <span class="d-block small">{{ trans($permissionDescription) }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <p class="d-none" id="permissionsNoResults">
            <i class="bi bi-info-circle"></i> {{ trans('messages.empty') }}
        </p>
    </div>
</div>

@push('styles')
    <style>
        #rolePermissions .bi::before {
            transition: transform .15s ease-in-out;
        }

        #rolePermissions [data-bs-toggle="collapse"][aria-expanded="false"] .bi::before {
            transform: rotate(-90deg);
        }
    </style>
@endpush

@push('footer-scripts')
    <script>
        const permissionInputs = Array.from(document.querySelectorAll('[data-role-permission]'));

        document.querySelector('[data-permissions-action="deselect-all"]')
            .addEventListener('click', function () {
                permissionInputs.forEach(function (input) {
                    input.checked = false;
                });
            });

        document.querySelectorAll('[data-permissions-action="toggle-group"]')
            .forEach(function (button) {
                button.addEventListener('click', function () {
                    const groupInputs = permissionInputs.filter(function (input) {
                        return input.dataset.permissionsGroup === button.dataset.group
                            && !input.closest('.permissions-item').classList.contains('d-none')
                    });

                    const allChecked = groupInputs.every((input) => input.checked);

                    groupInputs.forEach(function (input) {
                        input.checked = !allChecked;
                    });
                });
            });

        document.getElementById('permissionsSearch').addEventListener('input', function () {
            const query = this.value.trim().toLowerCase();
            let hasVisible = false;

            document.querySelectorAll('.permissions-group').forEach(function (group) {
                let groupHasVisible = false;

                group.querySelectorAll('[data-permission-name]').forEach(function (item) {
                    const visible = !query ||
                        item.dataset.permissionName.toLowerCase().includes(query) ||
                        item.dataset.permissionLabel.toLowerCase().includes(query);

                    item.classList.toggle('d-none', !visible);

                    if (visible) {
                        groupHasVisible = true;
                        hasVisible = true;
                    }
                });

                group.classList.toggle('d-none', !groupHasVisible);
            });

            document.getElementById('permissionsNoResults').classList.toggle('d-none', hasVisible);
        });

        const adminAccessInput = document.querySelector('[data-role-permission="admin.access"]');

        if (adminAccessInput) {
            permissionInputs
                .filter(function (input) {
                    return input !== adminAccessInput &&
                        input.dataset.rolePermission.startsWith('admin.');
                })
                .forEach(function (input) {
                    input.addEventListener('change', function () {
                        if (input.checked) {
                            adminAccessInput.checked = true;
                        }
                    });
                });
        }
    </script>
@endpush
