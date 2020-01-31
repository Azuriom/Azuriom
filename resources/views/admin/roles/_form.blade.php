@include('admin.elements.color-picker')

@csrf


@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-role-permission]').forEach(function (el) {
            const perm = el.dataset['rolePermission'];

            if (! perm.includes('admin.') || perm === 'admin.access') {
                return;
            }

            el.addEventListener('change', function (ev) {
                if (el.checked) {
                    document.querySelector('[name="permissions[admin.access]"]').checked = true;
                }
            });
        });
    </script>
@endpush

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nameInput">{{ trans('messages.fields.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $role->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group col-md-6 mb-4">
        <label for="colorInput">{{ trans('messages.fields.color') }}</label>
        <input type="color" class="form-control color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $role->color ?? '#2196f3') }}" required>

        @error('color')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<h3>{{ trans('admin.roles.permissions') }}</h3>

<small class="text-info">{{ trans('admin.roles.perm-admin.info') }}</small>
<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="administratorSwitch" name="is_admin" data-toggle="collapse" data-target="#permissionsGroup" @if($role->is_admin ?? false) checked @endif>
    <label class="custom-control-label" for="administratorSwitch">{{ trans('admin.roles.perm-admin.label') }}</label>
</div>

<div id="permissionsGroup" class="{{ ($role->is_admin ?? false) ? 'collapse' : 'show' }}">
    <div class="card card-body mb-2">
        @foreach($permissions as $permission => $permissionDescription)
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="permission{{ $loop->index }}" name="permissions[{{ $permission }}]" @if(isset($role) && $role->hasRawPermission($permission) ?? false) checked @endif data-role-permission="{{ $permission }}">
                <label class="custom-control-label" for="permission{{ $loop->index }}">{{ trans($permissionDescription) }}</label>
            </div>
        @endforeach
    </div>
</div>
