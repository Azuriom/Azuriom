@extends('admin.layouts.admin')

@section('title', trans('admin.plugins.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.plugins.list') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.author') }}</th>
                        <th scope="col">{{ trans('messages.fields.version') }}</th>
                        <th scope="col">{{ trans('messages.fields.enabled') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($plugins as $path => $plugin)
                        <tr>
                            <th scope="row">
                                @isset($plugin->url)
                                    <a href="{{ $plugin->url }}" target="_blank" rel="noopener noreferrer">
                                        {{ $plugin->name }}
                                    </a>
                                @else
                                    {{ $plugin->name }}
                                @endisset
                            </th>
                            <td>{{ implode(', ', $plugin->authors ?? []) }}</td>
                            <td>{{ $plugin->version }}</td>
                            <td>
                                <span class="badge bg-{{ plugins()->isEnabled($path) ? 'success' : 'danger' }}">
                                    {{ trans_bool(plugins()->isEnabled($path)) }}
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.plugins.' . (plugins()->isEnabled($path) ? 'disable' : 'enable'), $path) }}" class="d-inline-block">
                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-{{ plugins()->isEnabled($path)  ? 'x-lg' : 'check-lg' }}"></i> {{ trans('messages.actions.'.(plugins()->isEnabled($path) ? 'disable' : 'enable')) }}
                                    </button>
                                </form>
                                @if(! plugins()->isEnabled($path))
                                    <a href="{{ route('admin.plugins.delete', $path) }}" class="btn btn-danger btn-sm" data-confirm="delete">
                                        <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                                    </a>
                                @endif
                                @if($pluginsUpdates->has($path))
                                    <form method="POST" action="{{ route('admin.plugins.update', $path) }}" class="d-inline-block">
                                        @csrf

                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="bi bi-download"></i> {{ trans('messages.actions.update') }}
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.plugins.available') }}</h5>
        </div>
        <div class="card-body">
            @if(! $availablePlugins->isEmpty())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{ trans('messages.fields.name') }}</th>
                            <th scope="col">{{ trans('messages.fields.author') }}</th>
                            <th scope="col">{{ trans('messages.fields.version') }}</th>
                            <th scope="col">{{ trans('messages.fields.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($availablePlugins as $plugin)
                            <tr>
                                <th scope="row">
                                    <a href="{{ $plugin['info_url'] }}" target="_blank" rel="noopener noreferrer" class="me-2">
                                        {{ $plugin['name'] }}
                                    </a>

                                    <span class="badge bg-secondary text-white">
                                        <i class="bi bi-download"></i> {{ $plugin['downloads'] }}
                                    </span>

                                    <span class="badge bg-secondary text-white">
                                        <i class="bi bi-heart"></i> {{ $plugin['likes'] }}
                                    </span>
                                </th>
                                <td>{{ $plugin['author']['name'] }}</td>
                                <td>{{ $plugin['version'] }}</td>
                                <td>
                                    @if($plugin['premium'] && ! $plugin['purchased'])
                                        <a href="{{ $plugin['info_url'] }}" class="btn btn-info btn-sm" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-card"></i> {{ trans('admin.extensions.buy', ['price' =>  $plugin['price']]) }}
                                        </a>
                                    @else
                                        <form method="POST" action="{{ route('admin.plugins.download', $plugin['id']) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="bi bi-download"></i> {{ trans('messages.actions.download') }}
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.plugins.reload') }}">
                @csrf

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-repeat"></i> {{ trans('messages.actions.reload') }}
                </button>
            </form>
        </div>
    </div>
@endsection
