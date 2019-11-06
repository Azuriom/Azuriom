@extends('admin.layouts.admin')

@section('title', 'Edit role #'.$role->id)

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @method('PUT')

                @include('admin.roles._form')

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.roles.destroy', $role) }}" class="btn btn-danger @if($role->isPermanent()) disabled @endif" data-confirm="delete" @if($role->isPermanent()) disabled @endif>Delete</a>
            </form>
        </div>
    </div>
@endsection
