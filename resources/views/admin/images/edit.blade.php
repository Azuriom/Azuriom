@extends('admin.layouts.admin')

@section('title', trans('admin.images.title-edit', ['id' => $image->id]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.images.update', $image) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="nameInput">{{ trans('admin.fields.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $image->name) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slugInput">{{ trans('admin.fields.slug') }}</label>
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
                    <label for="textArea">{{ trans('admin.fields.image') }}</label>

                    <div>
                        <img src="{{ $image->url() }}" class="img-fluid rounded img-preview" alt="{{ $image->name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('admin.actions.save') }}</button>

                <a href="{{ route('admin.images.destroy', $image) }}" class="btn btn-danger" data-confirm="delete"><i class="fas fa-trash"></i> {{ trans('admin.actions.delete') }}</a>
            </form>
        </div>
    </div>
@endsection
