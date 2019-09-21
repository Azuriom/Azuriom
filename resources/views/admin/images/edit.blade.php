@extends('admin.layouts.admin')

@section('title', 'Edit image')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.images.update', $image) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $image->name) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slugInput">Slug</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ image_url() }}/</div>
                        </div>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $image->getSlug()) }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">.{{ $image->getExtension() }}</div>
                        </div>

                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="textArea">Image</label>

                    <div>
                        <img src="{{ $image->url() }}" class="img-fluid rounded img-preview" alt="{{ $image->name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

                <a href="{{ route('admin.images.destroy', $image) }}" class="btn btn-danger" data-confirm="delete">Delete</a>
            </form>
        </div>
    </div>
@endsection
