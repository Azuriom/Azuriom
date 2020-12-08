@php
    $translations = $page->translations ?? [];
    $locales = array_keys($translations['title'] ?? []);
@endphp


@push('footer-scripts')
    <script>
      function addCommandListener(el) {
        el.addEventListener('click', function () {
          const element = el.parentNode.parentNode.parentNode.parentNode;

          element.parentNode.removeChild(element);
          numberOfPages--;
        });
      }

      var numberOfPages = parseInt({{count($locales)}});

      document.querySelectorAll('.command-remove').forEach(function (el) {
        addCommandListener(el);
      });

      document.getElementById('addCommandButton').addEventListener('click', function () {
        
        let form = `
        <div class="form-group">
            <label for="translationInput-`+numberOfPages+`">Translation</label>
            <div class="input-group">
                <input type="text" class="form-control" id="translationInput-`+numberOfPages+`" name="translations[`+numberOfPages+`][locale]" value="" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-danger command-remove" type="button"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="titleInput-`+numberOfPages+`">{{ trans('messages.fields.title') }}</label>
            <input type="text" class="form-control" id="titleInput-`+numberOfPages+`" name="translations[`+numberOfPages+`][title]" value="" required>
        </div>

        <div class="form-group">
            <label for="descriptionInput-`+numberOfPages+`">{{ trans('messages.fields.description') }}</label>
            <input type="text" class="form-control" id="descriptionInput-`+numberOfPages+`" name="translations[`+numberOfPages+`][description]" value="" required>
        </div>

        <div class="form-group">
            <label for="textArea-`+numberOfPages+`">{{ trans('messages.fields.content') }}</label>
            <textarea class="form-control" id="textArea-`+numberOfPages+`" name="translations[`+numberOfPages+`][content]" rows="5"></textarea>
        </div>
        `;

        const newElement = document.createElement('div');
        newElement.innerHTML = form;

        addCommandListener(newElement.querySelector('.command-remove'));
        
        document.getElementById('translations').appendChild(newElement);
        
        tinymce.init({
            selector: '#textArea-'+numberOfPages,
            height: 400,
            min_height: 200,
            entity_encoding: 'raw',
            plugins: 'preview searchreplace autolink code image link hr anchor lists paste',
            toolbar: 'formatselect | bold italic underline strikethrough forecolor | link image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat code | undo redo',
            relative_urls : false,

                        automatic_uploads: true,
            paste_data_images: true,
            images_replace_blob_uris: true,
            images_upload_handler: function (blobInfo, success, failure, progress) {
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                axios.post('http://azuriom.test/admin/pages/1/attachments', formData, {
                    onUploadProgress: function (progressEvent) {
                        if (progressEvent.lengthComputable) {
                            progress(progressEvent.loaded / progressEvent.total * 100);
                        }
                    },
                }).then(function (response) {
                    success(response.data.location);
                }).catch(function (error) {
                    tinymce.activeEditor.dom.doc.querySelectorAll('img[src^="blob:"]').forEach(function (img) {
                        tinymce.activeEditor.execCommand('mceRemoveNode', false, img);
                    });

                    if (error.response) {
                        failure(error.response.data.message);
                        return;
                    }

                    failure(error);
                });
            },
        });
        numberOfPages++;
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
    <input type="text" class="form-control" id="translationInput-0" name="translations[0][locale]" value="{{ old('translations.0.locale','') }}" required>
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