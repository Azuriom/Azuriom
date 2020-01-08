@extends('admin.layouts.admin')

@section('title', trans('admin.pages.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
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
                            <td><a href="{{ route('pages.show', $page->slug) }}" target="_blank">{{ $page->slug }}</a></td>
                            <td>{{ trans_bool($page->is_enabled) }}</td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="mx-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.pages.destroy', $page) }}" class="mx-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $pages->links() }}

            <a class="btn btn-primary" href="{{ route('admin.pages.create') }}">
                <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
            </a>
        </div>
    </div>
@endsection
