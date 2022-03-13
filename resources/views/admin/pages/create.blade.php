@extends('admin.layouts.admin')

@section('title', trans('admin.pages.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                <input type="hidden" name="pending_id" value="{{ $pendingId }}">

                @include('admin.elements.editor', ['imagesUploadUrl' => route('admin.pages.attachments.pending', $pendingId)])

                @include('admin.pages._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
