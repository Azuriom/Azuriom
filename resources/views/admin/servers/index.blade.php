@extends('admin.layouts.admin')

@section('title', trans('admin.servers.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.servers.default') }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.servers.change-default') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="serverSelect">{{ trans('admin.servers.default') }}</label>
                    <select class="form-select @error('server') is-invalid @enderror" id="serverSelect" name="server" aria-describedby="serverLabel">
                        <option value="">{{ trans('messages.none') }}</option>
                        @foreach($servers as $server)
                            <option value="{{ $server->id }}" @selected($defaultServerId === $server->id)>
                                {{ $server->name }}
                            </option>
                        @endforeach
                    </select>

                    <small id="serverLabel" class="form-text">{{ trans('admin.servers.default_info') }}</small>

                    @error('server')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.servers.title') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.address') }}</th>
                        <th scope="col">{{ trans('messages.fields.status') }}</th>
                        <th scope="col">{{ trans('messages.fields.type') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($servers as $server)
                        <tr>
                            <th scope="row">
                                {{ $server->id }}
                                @if($server->id === $defaultServerId)
                                    <i class="bi bi-star text-primary" title="{{ trans('admin.servers.default') }}" data-bs-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>{{ $server->name }}</td>
                            <td>{{ $server->fullAddress() }}</td>
                            <td>
                                @if($server->isOnline())
                                    <span class="badge bg-success">{{ trans_choice('admin.servers.players', $server->getOnlinePlayers()) }}</span>
                                @else
                                    <span class="badge bg-danger">{{ trans('admin.servers.offline') }}</span>
                                @endif
                            </td>
                            <td>{{ trans('admin.servers.type.'.$server->type) }}</td>
                            <td>
                                <a href="{{ route('admin.servers.edit', $server) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.servers.destroy', $server) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <a class="btn btn-primary" href="{{ route('admin.servers.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
