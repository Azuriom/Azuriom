@push('styles')
    <link href="{{ asset('vendor/easymde/easymde.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/easymde/easymde.min.js') }}"></script>
    <script>
        const easyMde = new EasyMDE({
            element: document.querySelector('.markdown-editor'),

            promptURLs: true,
            spellChecker: false,

            showIcons: ['strikethrough', 'code', '{{ isset($imagesUploadUrl) ? 'upload-image' : 'image' }}', 'table', 'horizontal-rule', 'undo', 'redo'],

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
        });
    </script>
@endpush
