@extends('admin.layouts.admin')

@section('title', trans('admin.plugins.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.plugins.installed') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
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
                            <td>{{ join(', ', $plugin->authors ?? []) }}</td>
                            <td>{{ $plugin->version }}</td>
                            <td>
                                <span class="badge badge-{{ plugins()->isEnabled($path) ? 'success' : 'danger' }}">
                                    {{ trans_bool(plugins()->isEnabled($path)) }}
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.plugins.' . (plugins()->isEnabled($path) ? 'disable' : 'enable'), $path) }}" class="d-inline-block">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-{{ plugins()->isEnabled($path)  ? 'times' : 'check' }}"></i> {{ trans('messages.actions.'.(plugins()->isEnabled($path) ? 'disable' : 'enable')) }}
                                    </button>
                                </form>
                                @if(! plugins()->isEnabled($path))
                                    <a href="{{ route('admin.plugins.delete', $path) }}" class="btn btn-danger" data-confirm="delete">
                                        <i class="fas fa-trash"></i> {{ trans('messages.actions.delete') }}
                                    </a>
                                @endif
                                @if($pluginsUpdates->has($path))
                                    <form method="POST" action="{{ route('admin.plugins.update', $path) }}" class="d-inline-block">
                                        @csrf

                                        <button type="submit" class="btn btn-info">
                                            <i class="fas fa-download"></i> {{ trans('messages.actions.update') }}
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

    @if(! $availablePlugins->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.plugins.available') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
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
                                    <a href="{{ $plugin['info_url'] }}" target="_blank" rel="noopener noreferrer">
                                        {{ $plugin['name'] }}
                                    </a>
                                </th>
                                <td>{{ $plugin['author']['name'] }}</td>
                                <td>{{ $plugin['version'] }}</td>
                                <td>
                                    @if($plugin['premium'] && ! $plugin['purchased'])
                                        <a href="{{ $plugin['info_url'] }}" class="btn btn-info" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-shopping-cart"></i> {{ trans('admin.extensions.buy', ['price' =>  $plugin['price']]) }}
                                        </a>
                                    @else
                                        <form method="POST" action="{{ route('admin.plugins.download', $plugin['id']) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-download"></i> {{ trans('messages.actions.download') }}
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <form method="POST" action="{{ route('admin.plugins.reload') }}">
                        @csrf

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-sync"></i> {{ trans('messages.actions.reload') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endif

@endsection
