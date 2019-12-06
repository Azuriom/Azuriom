@extends('admin.layouts.admin')

@section('title', trans('admin.servers.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('admin.servers.fields.address') }}</th>
                        <th scope="col">{{ trans('admin.servers.fields.status') }}</th>
                        <th scope="col">{{ trans('messages.fields.type') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($servers as $server)
                        <tr>
                            <th scope="row">{{ $server->id }}</th>
                            <td>{{ $server->name }}</td>
                            <td>{{ $server->fullAddress() }}</td>
                            <td>
                                @if(($players = $server->getOnlinePlayers()) >= 0)
                                    <span class="badge badge-success">{{ $players }} players</span>
                                @else
                                    <span class="badge badge-danger">Offline</span>
                                @endif
                            </td>
                            <td>{{ $server->type }}</td>
                            <td>
                                <a href="{{ route('admin.servers.edit', $server) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.servers.destroy', $server) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <a class="btn btn-primary" href="{{ route('admin.servers.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
