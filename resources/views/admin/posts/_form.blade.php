@include('admin.elements.editor')
@include('admin.elements.date-picker')
@include('admin.elements.image-upload')

@csrf

<div class="form-group">
    <label for="titleInput">{{ trans('admin.fields.title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" value="{{ old('title', $currentPost->title ?? '') }}" required>

    @error('title')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="descriptionInput">{{ trans('admin.fields.description') }}</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', $currentPost->description ?? '') }}" required>

    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="imageInput">{{ trans('admin.fields.image') }}</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="imageInput" name="image" accept=".jpg,.jpeg,.jpe,.png,.gif,.bmp,.svg,.webp" data-image-preview="imagePreview">
        <label class="custom-file-label" data-browse="{{ trans('admin.actions.browse') }}">Choose file</label>

        @error('image')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <img src="{{ ($currentPost->image ?? false) ? $currentPost->imageUrl() : '#' }}" class="mt-2 img-fluid rounded img-preview {{ ($currentPost->image ?? false) ? '' : 'd-none' }}" alt="Image" id="imagePreview">
</div>

<div class="form-group">
    <label for="slugInput">{{ trans('admin.fields.slug') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">{{ route('posts.index') }}/</div>
        </div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $currentPost->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="textArea">{{ trans('admin.fields.content') }}</label>
    <textarea class="form-control html-editor @error('content') is-invalid @enderror" id="textArea" name="content" rows="5">{{ old('content', $currentPost->content ?? '') }}</textarea>

    @error('content')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="publishedInput">{{ trans('admin.posts.fields.published-at') }}</label>
    <input type="text" class="form-control date-picker @error('published_at') is-invalid @enderror" id="publishedInput" name="published_at" value="{{ old('published_at', $currentPost->published_at ?? now()) }}" required>

    @error('published_at')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="pinnedSwitch" name="is_pinned" @if($currentPost->is_pinned ?? false) checked @endif>
    <label class="custom-control-label" for="pinnedSwitch">{{ trans('admin.posts.pin') }}</label>
</div>
