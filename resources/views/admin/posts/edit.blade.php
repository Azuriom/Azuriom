@extends('admin.layouts.admin')

@section('title', 'Edit post '.$currentPost->id)

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $currentPost) }}" method="POST">
                @method('PUT')

                @include('admin.posts._form')

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.posts.destroy', $currentPost) }}" class="btn btn-danger" data-confirm="delete">Delete</a>
            </form>
        </div>
    </div>
@endsection
