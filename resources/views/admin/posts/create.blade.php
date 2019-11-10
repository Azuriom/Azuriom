@extends('admin.layouts.admin')

@section('title', 'Create post')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">

                @include('admin.posts._form')

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
