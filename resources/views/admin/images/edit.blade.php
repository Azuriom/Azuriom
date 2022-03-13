@extends('admin.layouts.admin')

@section('title', trans('admin.images.edit', ['image' => $image->name]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.images.update', $image) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nameInput">{{ trans('messages.fields.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $image->name) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="slugInput">{{ trans('messages.fields.slug') }}</label>
                    <div class="input-group @error('slug') has-validation @enderror">
                        <span class="input-group-text">{{ image_url() }}/</span>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $image->getSlug()) }}" required>
                        <span class="input-group-text">.{{ $image->getExtension() }}</span>

                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="textArea">{{ trans('messages.fields.image') }}</label>

                    <div>
                        <img src="{{ $image->url() }}" class="img-fluid rounded img-preview" alt="{{ $image->name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>

                <a href="{{ route('admin.images.destroy', $image) }}" class="btn btn-danger" data-confirm="delete">
                    <i class="bi bi-trash"></i> {{ trans('messages.actions.delete') }}
                </a>
            </form>
        </div>
    </div>
@endsection
