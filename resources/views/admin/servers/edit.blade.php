@extends('admin.layouts.admin')

@section('title', trans('admin.servers.title-edit', ['server' => $server->name]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Status: <i class="fas fa-circle text-{{ $server->getOnlinePlayers() < 0 ? 'danger' : 'success' }}"> </i></h5>

            <form action="{{ route('admin.servers.update', $server) }}" method="POST" id="serverForm">
                @method('PUT')

                @include('admin.servers._form')

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('messages.actions.save') }}</button>
                <a href="{{ route('admin.servers.destroy', $server) }}" class="btn btn-danger" data-confirm="delete"><i class="fas fa-trash"></i> {{ trans('messages.actions.delete') }}</a>
            </form>
        </div>
    </div>
@endsection
