@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin.users.fields.name') }}</th>
                        <th scope="col">{{ trans('admin.users.fields.email') }}</th>
                        <th scope="col">{{ trans('admin.users.fields.role') }}</th>
                        <th scope="col">{{ trans('admin.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">
                                {{ $user->id }}

                                @if($user->is_deleted)
                                    <i class="fas fa-user-slash text-dark" title="Deleted" data-toggle="tooltip"></i>
                                @elseif($user->isAdmin())
                                    <i class="fas fa-crown text-warning" title="Admin" data-toggle="tooltip"></i>
                                @endif
                                @if($user->is_banned)
                                    <i class="fas fa-ban text-danger" title="Banned" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td @if($user->is_deleted) class="text-strikethrough" @endif>{{ $user->name }}</td>
                            <td @if($user->is_deleted) class="text-strikethrough" @endif>{{ $user->email }}</td>
                            <td>
                                <span class="badge badge-label" style="{{ $user->role->getBadgeStyle() }}">{{ $user->role->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="mx-1" title="{{ trans('admin.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $users->links() }}

            <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fas fa-plus"></i> {{ trans('admin.actions.create') }}</a>
        </div>
    </div>
@endsection
