@extends('admin.layouts.admin')

@section('title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                                    <i class="fas fa-certificate text-primary" title="Permanent role" data-toggle="tooltip"></i>
                                @endif
                                @if($role->isDefault())
                                    <i class="fas fa-star text-warning" title="Default role" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>
                                <span class="rounded-sm px-1" style="color: {{ contrast_color($role->colorHex()) }}; background: {{ $role->colorHex() }}">{{ $role->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="mx-1" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.roles.destroy', $role) }}" class="mx-1 @if($role->isPermanent()) text-muted @endif" @if(!$role->isPermanent()) title="Delete" @else disabled @endif data-confirm="delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
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
