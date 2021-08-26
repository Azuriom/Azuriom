@extends('admin.layouts.admin')

@section('title', trans('admin.redirects.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin.redirects.target') }}</th>
                        <th scope="col">{{ trans('messages.fields.slug') }}</th>
                        <th scope="col">{{ trans('messages.fields.enabled') }}</th>
                        <th scope="col">{{ trans('admin.redirects.permanently') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($redirects as $redirect)
                        <tr>
                            <th scope="row">{{ $redirect->id }}</th>
                            <td>{{ $redirect->target }}</td>
                            <td>
                                <a href="../{{ $redirect->slug }}" target="_blank" rel="noopener noreferrer">
                                    {{ $redirect->slug }}
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-{{ $redirect->is_enabled ? 'success' : 'danger' }}">
                                    {{ trans_bool($redirect->is_enabled) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $redirect->moved_permanently ? 'success' : 'danger' }}">
                                    {{ trans_bool($redirect->moved_permanently) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.redirects.edit', $redirect) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.redirects.destroy', $redirect) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $redirects->links() }}

            <a class="btn btn-primary" href="{{ route('admin.redirects.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
