@push('styles')
    <link href="{{ asset('vendor/easymde/easymde.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/easymde/easymde.min.js') }}"></script>
    <script>
        const easyMdeIcons = {
            'bold': 'bi bi-type-bold',
            'italic': 'bi bi-type-italic',
            'strikethrough': 'bi bi-type-strikethrough',
            'heading': 'bi bi-type-h1',
            'heading-smaller': 'bi bi-type-h1',
            'heading-bigger': 'bi bi-type-h1',
            'heading-1': 'bi bi-type-h1',
            'heading-2': 'bi bi-type-h2',
            'heading-3': 'bi bi-type-h3',
            'code': 'bi bi-code-slash',
            'quote': 'bi bi-quote',
            'ordered-list': 'bi bi-list-ol',
            'unordered-list': 'bi bi-list-ul',
            'clean-block': 'bi bi-eraser',
            'link': 'bi bi-link-45deg',
            'image': 'bi bi-image',
            'upload-image': 'bi bi-image',
            'table': 'bi bi-table',
            'horizontal-rule': 'bi bi-dash-lg',
            'preview': 'bi bi-easel',
            'side-by-side': 'bi bi-layout-split',
            'fullscreen': 'bi bi-fullscreen',
            'guide': 'bi bi-question-circle',
            'undo': 'bi bi-arrow-counterclockwise',
            'redo': 'bi bi-arrow-clockwise',
        };

        const easyMde = new EasyMDE({
            element: document.querySelector('.markdown-editor'),

            promptURLs: true,
            spellChecker: false,
            status: ['upload-image'],

            showIcons: ['strikethrough', 'code', '{{ isset($imagesUploadUrl) ? 'upload-image' : 'image' }}', 'table', 'horizontal-rule', 'undo', 'redo'],
            iconClassMap: easyMdeIcons,

            @isset($autosaveId)
            autosave: {
                enabled: true,
                uniqueId: '{{ $autosaveId }}',
            },
            @endisset

            @isset($imagesUploadUrl)
            hideIcons: ['image'],
            uploadImage: true,
            imageAccept: '.jpg,.jpeg,.jpe,.png,.gif,.bmp,.svg,.webp',
            imageUploadFunction: function (file, onSuccess, onError) {
                if (file.size > easyMde.options.imageMaxSize) {
                    onError(easyMde.options.errorMessages.fileTooLarge);
                    return;
                }

                const formData = new FormData();
                formData.append('file', file);

                axios.post('{{ $imagesUploadUrl }}', formData, {
                    onUploadProgress: function (progressEvent) {
                        if (progressEvent.lengthComputable) {
                            const progress = Math.round((progressEvent.loaded * 100) / progressEvent.total) + '';
                            easyMde.updateStatusBar('upload-image', easyMde.options.imageTexts.sbProgress.replace('#file_name#', file.name).replace('#progress#', progress));
                        }
                    }
                }).then(function (response) {
                    onSuccess(response.data.location);
                }).catch(function (error) {
                    if (error.response) {
                        onError(error.response.data.message);
                        return;
                    }

                    onError(easyMde.options.errorMessages.importError);

                    console.error('Image upload error: ' + error);
                });
            },
            @endisset

            imageTexts: {
                sbInit: '{{ trans('messages.markdown.init') }}',
                sbOnDragEnter: '{{ trans('messages.markdown.drag') }}',
                sbOnDrop: '{{ trans('messages.markdown.drop') }}',
                sbProgress: '{{ trans('messages.markdown.progress') }}',
                sbOnUploaded: '{{ trans('messages.markdown.uploaded') }}',
            },

            errorMessages: {
                fileTooLarge: '{{ trans('messages.markdown.size') }}',
                importError: '{{ trans('messages.markdown.error') }}',
            },
        });
    </script>
@endpush
