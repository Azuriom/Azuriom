@extends('admin.layouts.admin')

@section('title', trans('admin.pages.edit', ['page' => $page->title]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                @method('PUT')

                @include('admin.elements.editor', ['imagesUploadUrl' => route('admin.pages.attachments.store', $page)])

                @include('admin.pages._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
                <a href="{{ route('admin.pages.destroy', $page) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
