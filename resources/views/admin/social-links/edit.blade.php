@extends('admin.layouts.admin')

@section('title', trans('admin.social_links.edit', ['link' => $link->id]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.social-links.update', $link) }}" method="POST" v-scope="{ type: '{{ $link->type }}' }">
                @method('PUT')

                @include('admin.social-links._form')

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
                <a href="{{ route('admin.social-links.destroy', $link) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
