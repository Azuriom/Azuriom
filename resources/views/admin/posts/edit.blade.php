@extends('admin.layouts.admin')

@section('title', trans('admin.posts.edit', ['post' => $post->title]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')

                @include('admin.elements.editor', ['imagesUploadUrl' => route('admin.posts.attachments.store', $post)])

                @include('admin.posts._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
                <a href="{{ route('admin.posts.destroy', $post) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
