@extends('admin.layouts.admin')

@section('title', 'Pages')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Enabled</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td><a href="{{ route('pages.show', $page->slug) }}" target="_blank">{{ $page->slug }}</a></td>
                            <td>{{ $page->is_enabled ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="mx-1" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.pages.destroy', $page) }}" class="mx-1" title="Delete" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $pages->links() }}

            <a class="btn btn-primary" href="{{ route('admin.pages.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
