@extends('admin.layouts.admin')

@section('title', trans('admin.servers.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.servers.default') }}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.servers.change-default') }}">
                @csrf

                <div class="form-group">
                    <label for="serverSelect">{{ trans('admin.servers.default') }}</label>
                    <select class="custom-select @error('server') is-invalid @enderror" id="serverSelect" name="server" aria-describedby="serverLabel">
                        <option value="">{{ trans('messages.none') }}</option>
                        @foreach($servers as $server)
                            <option value="{{ $server->id }}" @if($defaultServerId === $server->id) selected @endif>{{ $server->name }}</option>
                        @endforeach
                    </select>

                    <small id="serverLabel" class="form-text">{{ trans('admin.servers.default-info') }}</small>

                    @error('server')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.servers.title') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('admin.servers.fields.address') }}</th>
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
                                    <i class="fas fa-certificate text-primary" title="{{ trans('admin.servers.default') }}" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>{{ $server->name }}</td>
                            <td>{{ $server->fullAddress() }}</td>
                            <td>
                                @if($server->isOnline())
                                    <span class="badge badge-success">{{ trans_choice('admin.servers.players', $server->getOnlinePlayers()) }}</span>
                                @else
                                    <span class="badge badge-danger">{{ trans('admin.servers.offline') }}</span>
                                @endif
                            </td>
                            <td>{{ trans('admin.servers.type.'.$server->type) }}</td>
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
