@extends('admin.layouts.admin')

@section('title', 'Posts')

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
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->slug }}</a></td>
                            <td>{{ $post->author->name }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="mx-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.posts.destroy', $post) }}" class="mx-1" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $posts->links() }}

            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
