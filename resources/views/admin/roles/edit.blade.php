@extends('admin.layouts.admin')

@section('title', 'Edit role')

@include('admin.elements.color-picker')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $role->name) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="colorInput">Color</label>
                    <input type="color" class="form-control color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $role->color) }}" required>

                    @error('color')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <h3>Permissions</h3>

                <small class="text-info">When the group is admin it has all the permissions.</small>
                <div class="form-group custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="administratorSwitch" name="is_admin" data-toggle="collapse" data-target="#permissionsGroup" @if($role->is_admin) checked @endif>
                    <label class="custom-control-label" for="administratorSwitch">Administrator</label>
                </div>

                <div id="permissionsGroup" class="{{ $role->is_admin ? 'collapse' : 'show' }}">
                    <div class="card card-body mb-2">
                        @foreach($permissions as $permission)
                            <div class="form-group custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="permission{{ $permission->id }}" name="permissions[{{ $permission->id }}]" @if($role->hasRawPermission($permission)) checked @endif>
                                <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.roles.destroy', $role) }}" class="btn btn-danger @if($role->isPermanent()) disabled @endif" data-confirm="delete" @if($role->isPermanent()) disabled @endif>Delete</a>
            </form>
        </div>
    </div>
@endsection
