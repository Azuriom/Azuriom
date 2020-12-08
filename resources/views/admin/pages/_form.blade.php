@php
    $translations = $page->translations ?? [];
    $locales = array_keys($translations['title'] ?? []);
@endphp

@push('footer-scripts')
    <script>
        numberOfTranslatedElements = parseInt({{count($locales)}});

        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.command-remove').forEach(function (el) {
            addCommandListenerToTranslations(el);
            });

            document.getElementById('addCommandButton').addEventListener('click', function () {
            
            let form = `
            <div class="form-group">
                <label for="translationInput-`+numberOfTranslatedElements+`">Translation</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="translationInput-`+numberOfTranslatedElements+`" name="translations[`+numberOfTranslatedElements+`][locale]" value="" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-danger command-remove" type="button"><i class="fas fa-times"></i>
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
                <button class="btn btn-outline-danger command-remove" type="button"><i class="fas fa-times"></i>
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
    <label for="translationInput-0">Translation</label>
    <input type="text" class="form-control" id="translationInput-0" name="translations[0][locale]" value="{{ old('translations.0.locale', app()->getLocale()) }}" required>
</div>

<div class="form-group">
    <label for="titleInput-0">{{ trans('messages.fields.title') }}</label>
    <input type="text" class="form-control @error('title-0') is-invalid @enderror" id="titleInput-0" name="translations[0][title]" value="{{ old('translations.0.title', '') }}" required>

    @error('title-0')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="descriptionInput-0">{{ trans('messages.fields.description') }}</label>
    <input type="text" class="form-control @error('description-0') is-invalid @enderror" id="descriptionInput-0" name="translations[0][description]" value="{{ old('translations.0.description', '') }}" required>

    @error('description-0')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="textArea-0">{{ trans('messages.fields.content') }}</label>
    <textarea class="form-control html-editor @error('content-0') is-invalid @enderror" id="textArea-0" name="translations[0][content]" rows="5">{{ old('translations.0.content', '') }}</textarea>

    @error('content-0')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

@endforelse

</div>

<div class="form-group">
    <label for="slugInput">{{ trans('messages.fields.slug') }}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">{{ url('/') }}/</div>
        </div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugInput" name="slug" value="{{ old('slug', $page->slug ?? '') }}" required>

        @error('slug')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="enableSwitch" name="is_enabled" @if($page->is_enabled ?? true) checked @endif>
    <label class="custom-control-label" for="enableSwitch">{{ trans('admin.pages.enable') }}</label>
</div>

<button type="button" id="addCommandButton" class="btn btn-sm btn-success">
    <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
</button>