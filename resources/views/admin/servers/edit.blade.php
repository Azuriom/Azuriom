@extends('admin.layouts.admin')

@section('title', trans('admin.servers.title-edit', ['server' => $server->name]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>{{ trans('messages.fields.status') }}:
                @if($server->isOnline())
                    <span class="badge badge-success">{{ trans_choice('admin.servers.players', $server->getOnlinePlayers()) }}</span>
                @else
                    <span class="badge badge-danger">{{ trans('admin.servers.offline') }}</span>
                @endif
            </h5>

            <form action="{{ route('admin.servers.update', $server) }}" method="POST" id="serverForm">
                @method('PUT')

                @include('admin.servers._form')

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>

                <a href="{{ route('admin.servers.destroy', $server) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="fas fa-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
