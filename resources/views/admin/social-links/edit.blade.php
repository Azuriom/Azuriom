@extends('admin.layouts.admin')

@section('title', trans('admin.social-links.title-edit', ['link' => $link->id]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.social-links.update', $link) }}" method="POST">
                @method('PUT')

                @include('admin.social-links._form')

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
                <a href="{{ route('admin.social-links.destroy', $link) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="fas fa-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
