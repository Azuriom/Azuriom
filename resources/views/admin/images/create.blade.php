@extends('admin.layouts.admin')

@section('title', 'Image upload')

@include('admin.elements.image-upload')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name') }}" required>

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
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">.(jpg|png|gif|svg|webp)</div>
                        </div>

                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="fileInput">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input  @error('file') is-invalid @enderror" id="fileInput" name="file" accept=".jpg,.jpeg,.jpe,.png,.gif,.bmp,.svg,.webp" data-image-preview="filePreview" required>
                        <label class="custom-file-label" for="customFile" data-browse="Browse">Choose file</label>

                        @error('file')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <img src="#" class="mt-2 img-fluid rounded img-preview d-none" alt="Image" id="filePreview">
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
@endsection
