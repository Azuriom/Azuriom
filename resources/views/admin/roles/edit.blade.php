@extends('admin.layouts.admin')

@section('title', trans('admin.roles.edit', ['role' => $role->name]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @method('PUT')

                @include('admin.roles._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>

                @if(! $role->isDefault())
                    @can('delete', $role)
                        <a href="{{ route('admin.roles.destroy', $role) }}" class="btn btn-danger" data-confirm="delete">
                            <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                        </a>
                    @endcan
                @endif
            </form>
        </div>
    </div>
@endsection
