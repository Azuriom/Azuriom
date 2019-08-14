@extends('admin.layouts.admin')

@section('title', 'Add news')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="titleInput">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" value="{{ old('title') }}" required>

                    @error('title')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descriptionInput">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description') }}" required>

                    @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slugInput">Slug</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ route('posts.index') }}/</div>
                        </div>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug') }}" required>

                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="textArea">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="textArea" name="content" rows="5" required>{{ old('content') }}</textarea>

                    @error('content')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="publishedInput">Published At</label>
                    <input type="text" class="form-control @error('published_at') is-invalid @enderror" id="publishedInput" name="published_at" value="{{ old('published_at', now()) }}" required>

                    @error('published_at')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
