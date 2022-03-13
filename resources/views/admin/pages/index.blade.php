@extends('admin.layouts.admin')

@section('title', trans('admin.pages.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.title') }}</th>
                        <th scope="col">{{ trans('messages.fields.slug') }}</th>
                        <th scope="col">{{ trans('messages.fields.enabled') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ route('pages.show', $page->slug) }}" target="_blank" rel="noopener noreferrer">
                                    {{ $page->slug }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-{{ $page->is_enabled ? 'success' : 'danger' }}">
                                    {{ trans_bool($page->is_enabled) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-bs-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.pages.destroy', $page) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-bs-toggle="tooltip" data-confirm="delete"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $pages->links() }}

            <a class="btn btn-primary" href="{{ route('admin.pages.create') }}">
                <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
