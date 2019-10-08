@extends('admin.layouts.admin')

@section('title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                        <tr>
                            <th scope="row">
                                {{ $role->id }}
                                @if($role->isPermanent())
                                    <i class="fas fa-certificate text-primary" title="Permanent" data-toggle="tooltip"></i>
                                @endif
                                @if($role->isDefault())
                                    <i class="fas fa-star text-warning" title="Default" data-toggle="tooltip"></i>
                                @endif
                                @if($role->is_admin)
                                    <i class="fas fa-crown text-warning" title="Admin" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>
                                <span class="badge badge-label" style="{{ $role->getBadgeStyle() }}">{{ $role->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="mx-1" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.roles.destroy', $role) }}" class="mx-1 @if($role->isPermanent()) disabled @endif" @if(!$role->isPermanent()) title="Delete" data-confirm="delete" data-toggle="tooltip" @endif><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $roles->links() }}

            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
