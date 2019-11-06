@extends('admin.layouts.admin')

@section('title', 'Edit page #'.$page->id)

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                @method('PUT')

                @include('admin.pages._form')

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.pages.destroy', $page) }}" class="btn btn-danger" data-confirm="delete">Delete</a>
            </form>
        </div>
    </div>
@endsection
