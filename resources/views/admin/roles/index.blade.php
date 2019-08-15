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
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="#" class="mx-1"><i class="fas fa-edit"></i></a>
                                <a href="#" class="mx-1" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $roles->links() }}

            <a class="btn btn-primary" href="#"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
