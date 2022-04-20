@extends('admin.layouts.admin')

@section('title', trans('admin.redirects.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin.redirects.source') }}</th>
                        <th scope="col">{{ trans('admin.redirects.destination') }}</th>
                        <th scope="col">{{ trans('admin.redirects.code') }}</th>
                        <th scope="col">{{ trans('messages.fields.enabled') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($redirects as $redirect)
                        <tr>
                            <th scope="row">{{ $redirect->id }}</th>
                            <td>
                                <a href="{{ url($redirect->source) }}" target="_blank" rel="noopener noreferrer">
                                    {{ $redirect->source }}
                                </a>
                            </td>
                            <td>{{ $redirect->destination }}</td>
                            <td>
                                {{ $redirect->code }}
                            </td>
                            <td>
                                <span class="badge bg-{{ $redirect->is_enabled ? 'success' : 'danger' }}">
                                    {{ trans_bool($redirect->is_enabled) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.redirects.edit', $redirect) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.redirects.destroy', $redirect) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $redirects->links() }}

            <a class="btn btn-primary" href="{{ route('admin.redirects.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
