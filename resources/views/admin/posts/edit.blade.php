@extends('admin.layouts.admin')

@section('title', trans('admin.posts.title-edit', ['id' => $currentPost->id]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $currentPost) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')

                @include('admin.posts._form')

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('admin.actions.save') }}</button>
                <a href="{{ route('admin.posts.destroy', $currentPost) }}" class="btn btn-danger" data-confirm="delete"><i class="fas fa-trash"></i> {{ trans('admin.actions.delete') }}</a>
            </form>
        </div>
    </div>
@endsection
