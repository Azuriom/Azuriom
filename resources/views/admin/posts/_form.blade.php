@include('admin.elements.date-picker')

@php
    $translations = $post->translations ?? [];
    $locales = array_keys($translations['title'] ?? []);
@endphp

@push('footer-scripts')
    <script>
        numberOfTranslatedElements = parseInt({{count($locales)}});

        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.translation-remove').forEach(function (el) {
                addCommandListenerToTranslations(el);
            });

            document.getElementById('addCommandButton').addEventListener('click', function () {
                let form = `
                <div class="form-group">
                    <label for="translationInput-`+numberOfTranslatedElements+`">Translation</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="translationInput-`+numberOfTranslatedElements+`" name="translations[`+numberOfTranslatedElements+`][locale]" value="" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger translation-remove" type="button"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="titleInput-`+numberOfTranslatedElements+`">{{ trans('messages.fields.title') }}</label>
                    <input type="text" class="form-control" id="titleInput-`+numberOfTranslatedElements+`" name="translations[`+numberOfTranslatedElements+`][title]" value="" required>
                </div>

                <div class="form-group">
                    <label for="descriptionInput-`+numberOfTranslatedElements+`">{{ trans('messages.fields.description') }}</label>
                    <input type="text" class="form-control" id="descriptionInput-`+numberOfTranslatedElements+`" name="translations[`+numberOfTranslatedElements+`][description]" value="" required>
                </div>

                <div class="form-group">
                    <label for="textArea-`+numberOfTranslatedElements+`">{{ trans('messages.fields.content') }}</label>
                    <textarea class="form-control" id="textArea-`+numberOfTranslatedElements+`" name="translations[`+numberOfTranslatedElements+`][content]" rows="5"></textarea>
                </div>
                `;
                addNodeToTranslationsDom(form);
            });
        });
    </script>
@endpush

@csrf

<div id="translations">

@forelse ($locales as $locale)
    <div>
        <div class="form-group">
            <label for="translationInput-{{$loop->index}}">Translation</label>
            <div class="input-group">
                <input type="text" class="form-control" id="translationInput-{{$loop->index}}" name="translations[{{$loop->index}}][locale]" value="{{ old('translations.'.$loop->index.'.locale', $locale ?? '') }}" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-danger translation-remove" type="button"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="titleInput-{{$loop->index}}">{{ trans('messages.fields.title') }}</label>
            <input type="text" class="form-control @error('title-'.$loop->index) is-invalid @enderror" id="titleInput-{{$loop->index}}" name="translations[{{$loop->index}}][title]" value="{{ old('translations.'.$loop->index.'.title', $translations['title'][$locale] ?? '') }}" required>
    
            @error('title-'.$loop->index)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="descriptionInput-{{$loop->index}}">{{ trans('messages.fields.description') }}</label>
            <input type="text" class="form-control @error('description-'.$loop->index) is-invalid @enderror" id="descriptionInput-{{$loop->index}}" name="translations[{{$loop->index}}][description]" value="{{ old('translations.'.$loop->index.'.description', $translations['description'][$locale] ?? '') }}" required>
    
            @error('description-'.$loop->index)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="textArea-{{$loop->index}}">{{ trans('messages.fields.content') }}</label>
            <textarea class="form-control html-editor @error('content-'.$loop->index) is-invalid @enderror" id="textArea-{{$loop->index}}" name="translations[{{$loop->index}}][content]" rows="5">{{ old('translations.'.$loop->index.'.content', $translations['content'][$locale] ?? '') }}</textarea>
    
            @error('content-'.$loop->index)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
@empty
    <div class="form-group">
        <label for="translationInput-default">Translation</label>
        <input type="text" class="form-control" id="translationInput-default" name="translations[default][locale]" value="{{ old('translations.default.locale', app()->getLocale()) }}" required>
    </div>

    <div class="form-group">
        <label for="titleInput-default">{{ trans('messages.fields.title') }}</label>
        <input type="text" class="form-control @error('title-default') is-invalid @enderror" id="titleInput-default" name="translations[default][title]" value="{{ old('translations.default.title', '') }}" required>
    
        @error('title-default')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="descriptionInput-default">{{ trans('messages.fields.description') }}</label>
        <input type="text" class="form-control @error('description-default') is-invalid @enderror" id="descriptionInput-default" name="translations[default][description]" value="{{ old('translations.default.description', '') }}" required>
    
        @error('description-default')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="textArea-default">{{ trans('messages.fields.content') }}</label>
        <textarea class="form-control html-editor @error('content-default') is-invalid @enderror" id="textArea-default" name="translations[default][content]" rows="5">{{ old('translations.default.content', '') }}</textarea>
    
        @error('content-default')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
@endforelse
</div>

<button type="button" id="addCommandButton" class="btn btn-sm btn-success my-2">
    <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
</button>

<div class="form-group">
    <label for="slugInput">{{ trans('messages.fields.slug') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">{{ route('posts.index') }}/</div>
        </div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $post->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="imageInput">{{ trans('messages.fields.image') }}</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="imageInput-default" name="image" accept=".jpg,.jpeg,.jpe,.png,.gif,.bmp,.svg,.webp" data-image-preview="imagePreview">
        <label class="custom-file-label" data-browse="{{ trans('messages.actions.browse') }}">{{ trans('messages.actions.choose-file') }}</label>

        @error('image')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <img src="{{ ($post->image ?? false) ? $post->imageUrl() : '#' }}" class="mt-2 img-fluid rounded img-preview {{ ($post->image ?? false) ? '' : 'd-none' }}" alt="Image" id="imagePreview">
</div>

<div class="form-group">
    <label for="publishedInput">{{ trans('admin.posts.fields.published-at') }}</label>
    <input type="text" class="form-control date-picker @error('published_at') is-invalid @enderror" id="publishedInput" name="published_at" value="{{ old('published_at', $post->published_at ?? now()) }}" required aria-describedby="publishedInfo">

    @error('published_at')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <small id="publishedInfo" class="form-text">{{ trans('admin.posts.published-info') }}</small>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="pinnedSwitch" name="is_pinned" @if($post->is_pinned ?? false) checked @endif>
    <label class="custom-control-label" for="pinnedSwitch">{{ trans('admin.posts.pin') }}</label>
</div>
