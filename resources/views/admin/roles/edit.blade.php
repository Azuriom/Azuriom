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

                <div class="form-group">
                    <label for="colorInput">Color</label>
                    <input type="color" class="form-control color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', $role->colorHex()) }}" required>

                    @error('color')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.roles.destroy', $role) }}" class="btn btn-danger" data-confirm="delete" @if($role->isPermanent()) disabled @endif>Delete</a>
            </form>
        </div>
    </div>
@endsection
