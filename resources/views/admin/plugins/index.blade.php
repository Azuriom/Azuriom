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
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($plugins as $path => $plugin)
                        <tr>
                            <th scope="row">{{ $plugin->name }}</th>
                            <td>{{ join(', ', $plugin->authors) }}</td>
                            <td>{{ $plugin->version }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.plugins.' . (plugins()->isEnabled($path) ? 'disable' : 'enable'), $path) }}">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-{{ plugins()->isEnabled($path)  ? 'times' : 'check' }}"></i> {{ trans('messages.actions.'.(plugins()->isEnabled($path) ? 'disable' : 'enable')) }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <form method="POST" action="{{ route('admin.plugins.reload') }}">
                    @csrf

                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-sync"></i> {{ trans('admin.plugins.actions.reload') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
