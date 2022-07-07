@extends('admin.layouts.admin')

@section('title', trans('admin.themes.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.themes.current') }}</h5>
        </div>
        <div class="card-body">
            @if($current)
                <h3 class="h5">{{ $current->name }}</h3>
                <ul>
                    <li>{{ trans('admin.themes.author', ['author' => implode(', ', $current->authors)]) }}</li>
                    <li>{{ trans('admin.themes.version', ['version' => $current->version]) }}</li>
                </ul>

                <form action="{{ route('admin.themes.change') }}" method="POST" class="d-inline-block">
                    @csrf

                    @if($currentHasConfig)
                        <a class="btn btn-primary" href="{{ route('admin.themes.edit', $currentPath) }}">
                            <i class="bi bi-sliders"></i> {{ trans('admin.themes.config') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-x-lg"></i> {{ trans('admin.themes.disable') }}
                    </button>
                </form>
                @if($themesUpdates->has($currentPath))
                    <form method="POST" action="{{ route('admin.themes.update', $currentPath) }}" class="d-inline-block">
                        @csrf

                        <button type="submit" class="btn btn-info">
                            <i class="bi bi-download"></i> {{ trans('messages.actions.update') }}
                        </button>
                    </form>
                @endif
            @else
                {{ trans('admin.themes.no-enabled') }}
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('admin.themes.list') }}</h5>
        </div>
        <div class="card-body">
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

                    @foreach($themes as $path => $theme)
                        <tr>
                            <th scope="row">
                                @isset($theme->url)
                                    <a href="{{ $theme->url }}" target="_blank" rel="noopener noreferrer">
                                        {{ $theme->name }}
                                    </a>
                                @else
                                    {{ $theme->name }}
                                @endisset
                            </th>
                            <td>{{ implode(', ', $theme->authors ?? []) }}</td>
                            <td>{{ $theme->version }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.themes.change', $path) }}" class="d-inline-block">
                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-check-lg"></i> {{ trans('messages.actions.enable') }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.themes.delete', $path) }}" class="btn btn-danger btn-sm" data-confirm="delete">
                                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                                </a>
                                @if($themesUpdates->has($path))
                                    <form method="POST" action="{{ route('admin.themes.update', $path) }}" class="d-inline-block">
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
            <h5 class="card-title mb-0">{{ trans('admin.themes.available') }}</h5>
        </div>
        <div class="card-body">
            @if(! $availableThemes->isEmpty())
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

                        @foreach($availableThemes as $theme)
                            <tr>
                                <th scope="row">
                                    <a href="{{ $theme['info_url'] }}" target="_blank" rel="noopener noreferrer" class="me-2">
                                        {{ $theme['name'] }}
                                    </a>

                                    <span class="badge bg-secondary text-white">
                                        <i class="bi bi-download"></i> {{ $theme['downloads'] }}
                                    </span>

                                    <span class="badge bg-secondary text-white">
                                        <i class="bi bi-heart"></i> {{ $theme['likes'] }}
                                    </span>
                                </th>
                                <td>{{ $theme['author']['name'] }}</td>
                                <td>{{ $theme['version'] }}</td>
                                <td>
                                    @if($theme['premium'] && ! $theme['purchased'])
                                        <a href="{{ $theme['info_url'] }}" class="btn btn-info btn-sm" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-card"></i> {{ trans('admin.extensions.buy', ['price' =>  $theme['price']]) }}
                                        </a>
                                    @else
                                        <form method="POST" action="{{ route('admin.themes.download', $theme['id']) }}">
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

            <form method="POST" action="{{ route('admin.themes.reload') }}">
                @csrf

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-repeat"></i> {{ trans('messages.actions.reload') }}
                </button>
            </form>
        </div>
    </div>
@endsection
