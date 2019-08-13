@extends('admin.layouts.admin')

@section('title', 'Pages')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td><a href="{{ route('pages.show', $page->slug) }}">{{ $page->slug }}</a></td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="mr-1 ml-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.pages.destroy', $page) }}" class="mr-1 ml-1" data-confirm="delete"><i class="fas fa-trash"></i></a>
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
