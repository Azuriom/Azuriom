@extends('admin.layouts.admin')

@section('title', trans('admin.bans.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin.fields.user') }}</th>
                        <th scope="col">{{ trans('admin.bans.fields.banned-by') }}</th>
                        <th scope="col">{{ trans('admin.bans.fields.reason') }}</th>
                        <th scope="col">{{ trans('admin.fields.date') }}</th>
                        <th scope="col">{{ trans('admin.fields.action') }}</th>
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
                                    <a href="{{ route('admin.users.bans.destroy', [$ban->user, $ban]) }}" class="mx-1" title="{{ trans('admin.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                                @else
                                    <i>{{ trans('admin.bans.removed', ['user' => $ban->remover->name ?? '???', 'date' => $ban->deleted_at]) }}</i>
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
