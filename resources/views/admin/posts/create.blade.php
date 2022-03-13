@extends('admin.layouts.admin')

@section('title', trans('admin.posts.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pending_id" value="{{ $pendingId }}">

                @include('admin.elements.editor', ['imagesUploadUrl' => route('admin.posts.attachments.pending', $pendingId)])

                @include('admin.posts._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
