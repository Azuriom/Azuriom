@extends('admin.layouts.admin')

@section('title', 'Posts')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user) }}" class="mr-1 ml-1"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="mr-1 ml-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.users.destroy', $user) }}" class="mr-1 ml-1"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $users->links() }}

            <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fas fa-plus"></i> Add</a>
        </div>
    </div>
@endsection
