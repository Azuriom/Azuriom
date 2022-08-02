@include('admin.elements.date-picker')

@csrf

<div class="mb-3">
    <label class="form-label" for="titleInput">{{ trans('messages.fields.title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" value="{{ old('title', $post->title ?? '') }}" required>

    @error('title')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="descriptionInput">{{ trans('messages.fields.description') }}</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', $post->description ?? '') }}" required>

    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="imageInput">{{ trans('messages.fields.image') }}</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" accept=".jpg,.jpeg,.jpe,.png,.gif,.bmp,.svg,.webp" data-image-preview="imagePreview">

    @error('image')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <img src="{{ ($post->image ?? false) ? $post->imageUrl() : '#' }}" class="mt-2 img-fluid rounded img-preview {{ ($post->image ?? false) ? '' : 'd-none' }}" alt="Image" id="imagePreview">
</div>

<div class="mb-3">
    <label class="form-label" for="slugInput">{{ trans('messages.fields.slug') }}</label>
    <div class="input-group">
        <span class="input-group-text">{{ route('posts.index') }}/</span>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $post->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="textArea">{{ trans('messages.fields.content') }}</label>
    <textarea class="form-control html-editor @error('content') is-invalid @enderror" id="textArea" name="content" rows="5">{{ old('content', $post->content ?? '') }}</textarea>

    @error('content')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="publishedInput">{{ trans('messages.fields.published_at') }}</label>
    <input type="text" class="form-control date-picker @error('published_at') is-invalid @enderror" id="publishedInput" name="published_at" value="{{ old('published_at', $post->published_at ?? now()) }}" required aria-describedby="publishedInfo">

    @error('published_at')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <small id="publishedInfo" class="form-text">{{ trans('admin.posts.published_info') }}</small>
</div>

<div class="mb-3 form-check form-switch">
    <input type="checkbox" class="form-check-input" id="pinnedSwitch" name="is_pinned" @checked($post->is_pinned ?? false)>
    <label class="form-check-label" for="pinnedSwitch">{{ trans('admin.posts.pin') }}</label>
</div>
