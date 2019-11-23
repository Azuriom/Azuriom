@extends('admin.layouts.admin')

@section('title', 'Bans')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Banned by</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($bans as $ban)
                        <tr @if($ban->trashed()) class="text-strikethrough" @endif>
                            <th scope="row">{{ $ban->id }}</th>
                            <td><a href="{{ route('admin.users.edit', $ban->user) }}">{{ $ban->user->name }}</a></td>
                            <td><a href="{{ route('admin.users.edit', $ban->author) }}">{{ $ban->author->name }}</a></td>
                            <td>{{ $ban->reason }}</td>
                            <td>{{ $ban->created_at }}</td>
                            <td>
                                @if(! $ban->trashed())
                                    <a href="{{ route('admin.users.bans.destroy', [$ban->user, $ban]) }}" class="mx-1" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                                @else
                                    <i>Removed the {{ $ban->removed_at }} by {{ $ban->remover->name ?? 'unknown' }}</i>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $bans->links() }}
        </div>
    </div>
@endsection
