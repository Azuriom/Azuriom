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
    <div class="card card-body mb-2" id="rolePermissions">
        <div class="row g-2 mb-3 align-items-center">
            <div class="col-md">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" id="permissionsSearch" placeholder="{{ trans('admin.roles.permissions_search') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-md-auto d-flex gap-2">
                <button type="button" class="btn btn-sm btn-secondary" data-permissions-action="select-all">
                    <i class="bi bi-check-all"></i> {{ trans('admin.roles.permissions_select_all') }}
                </button>
                <button type="button" class="btn btn-sm btn-secondary" data-permissions-action="deselect-all">
                    <i class="bi bi-x-lg"></i> {{ trans('admin.roles.permissions_deselect_all') }}
                </button>
            </div>
        </div>

        @foreach($groupedPermissions as $group => $permissions)
            <div class="permissions-group mb-3" data-permissions-group="{{ $group }}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <button type="button" class="btn btn-link text-decoration-none p-0 fw-bold permissions-group-toggle" data-bs-toggle="collapse" data-bs-target="#permissionsGroup_{{ $group }}" aria-expanded="true">
                        <i class="bi bi-chevron-down permissions-group-icon"></i>
                        {{ trans()->has('admin.roles.permission_groups.'.$group) ? trans('admin.roles.permission_groups.'.$group) : ucfirst($group) }}
                        <span class="badge bg-secondary ms-1">{{ count($permissions) }}</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary" data-permissions-action="toggle-group" data-group="{{ $group }}" title="{{ trans('admin.roles.permissions_select_group') }}">
                        <i class="bi bi-check2-square"></i>
                    </button>
                </div>

                <div class="collapse show" id="permissionsGroup_{{ $group }}">
                    <div class="row">
                        @foreach($permissions as $permission => $permissionDescription)
                            <div class="col-lg-6 permissions-item" data-permission-name="{{ $permission }}" data-permission-label="{{ trans($permissionDescription) }}">
                                <div class="mb-2 form-check">
                                    <input type="checkbox" class="form-check-input" id="permission_{{ md5($permission) }}" name="permissions[]" value="{{ $permission }}" @checked(isset($role) && $role->hasRawPermission($permission)) data-role-permission="{{ $permission }}" data-permissions-group="{{ $group }}">
                                    <label class="form-check-label" for="permission_{{ md5($permission) }}">
                                        <code class="small">{{ $permission }}</code>
                                        <span class="d-block text-body-secondary small">{{ trans($permissionDescription) }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-body-secondary small d-none" id="permissionsNoResults">
            <i class="bi bi-info-circle"></i> {{ trans('admin.roles.permissions_no_results') }}
        </div>
    </div>
</div>

@push('styles')
    <style>
        #rolePermissions .permissions-group-toggle { color: inherit; }
        #rolePermissions .permissions-group-toggle[aria-expanded="false"] .permissions-group-icon { transform: rotate(-90deg); }
        #rolePermissions .permissions-group-icon { transition: transform .15s ease-in-out; }
        #rolePermissions .permissions-item.d-none + .permissions-item { margin-top: 0; }
    </style>
@endpush

@push('footer-scripts')
    <script>
        const rolePermissionsBox = document.getElementById('rolePermissions');
        const adminAccessInput = rolePermissionsBox.querySelector('[data-role-permission="admin.access"]');

        rolePermissionsBox.addEventListener('click', function (event) {
            const action = event.target.closest('[data-permissions-action]');

            if (!action) {
                return;
            }

            if (action.dataset.permissionsAction === 'select-all') {
                rolePermissionsBox.querySelectorAll('input[name="permissions[]"]').forEach(function (input) { input.checked = true; });
            } else if (action.dataset.permissionsAction === 'deselect-all') {
                rolePermissionsBox.querySelectorAll('input[name="permissions[]"]').forEach(function (input) { input.checked = false; });
            } else if (action.dataset.permissionsAction === 'toggle-group') {
                const inputs = rolePermissionsBox.querySelectorAll('input[data-permissions-group="' + action.dataset.group + '"]');
                const allChecked = Array.from(inputs).every(function (input) { return input.checked; });
                inputs.forEach(function (input) { input.checked = !allChecked; });
            }
        });

        document.getElementById('permissionsSearch').addEventListener('input', function () {
            const query = this.value.trim().toLowerCase();
            let visible = 0;

            rolePermissionsBox.querySelectorAll('.permissions-item').forEach(function (item) {
                const matches = !query
                    || item.dataset.permissionName.toLowerCase().includes(query)
                    || item.dataset.permissionLabel.toLowerCase().includes(query);

                item.classList.toggle('d-none', !matches);

                if (matches) {
                    visible++;
                }
            });

            rolePermissionsBox.querySelectorAll('.permissions-group').forEach(function (group) {
                const any = group.querySelectorAll('.permissions-item:not(.d-none)').length > 0;
                group.classList.toggle('d-none', !any);
            });

            document.getElementById('permissionsNoResults').classList.toggle('d-none', visible !== 0);
        });

        if (adminAccessInput) {
            rolePermissionsBox.querySelectorAll('[data-role-permission^="admin."]').forEach(function (input) {
                if (input !== adminAccessInput) {
                    input.addEventListener('change', function () {
                        if (input.checked) {
                            adminAccessInput.checked = true;
                        }
                    });
                }
            });
        }
    </script>
@endpush
