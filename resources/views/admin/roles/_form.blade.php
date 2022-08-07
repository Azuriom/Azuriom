@include('admin.elements.color-picker')

@csrf

@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-role-permission]').forEach(function (el) {
            const perm = el.dataset['rolePermission'];

            if (!perm.includes('admin.') || perm === 'admin.access') {
                return;
            }

            el.addEventListener('change', function () {
                if (el.checked) {
                    document.querySelector('[name="permissions[admin.access]"]').checked = true;
                }
            });
        });
    </script>
@endpush

<div class="row g-3">
    <div class="mb-3 col-md-6">
        <label class="form-label" for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $role->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3 col-md-6 mb-4">
        <label class="form-label" for="colorInput">{{ trans('messages.fields.color') }}</label>
        <input type="color" class="form-control form-control-color color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $role->color ?? '#2196f3') }}" required>

        @error('color')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<h3>{{ trans('messages.fields.permissions') }}</h3>

<div class="mb-3 mb-2">
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="adminSwitch" name="is_admin" data-bs-toggle="collapse" data-bs-target="#permissionsGroup" @checked($role->is_admin ?? false) aria-describedby="adminInfo">
        <label class="form-check-label" for="adminSwitch">{{ trans('admin.roles.admin') }}</label>
    </div>

    <small id="adminInfo" class="form-text text-info">{{ trans('admin.roles.admin_info') }}</small>
</div>

<div id="permissionsGroup" class="{{ ($role->is_admin ?? false) ? 'collapse' : 'show' }}">
    <div class="card card-body mb-2 pb-0">
        <div class="row">
            @foreach($permissions as $permission => $permissionDescription)
                <div class="col-lg-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="permission{{ $loop->index }}" name="permissions[]" value="{{ $permission }}" @checked(isset($role) && $role->hasRawPermission($permission)) data-role-permission="{{ $permission }}">
                        <label class="form-check-label" for="permission{{ $loop->index }}">{{ trans($permissionDescription) }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
