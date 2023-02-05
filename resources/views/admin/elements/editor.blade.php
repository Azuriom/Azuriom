@push('footer-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.html-editor',
            promotion: false,
            height: 400,
            min_height: 200,
            entity_encoding: 'raw',
            plugins: 'searchreplace autolink code image link anchor lists table',
            toolbar: 'formatselect | bold italic underline strikethrough forecolor | link image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat code | undo redo',
            relative_urls : false,
            valid_children : "+body[style]",
            extended_valid_elements: 'i[class]',
            content_css: '{{ (dark_theme() ? 'dark,' : '').asset('vendor/bootstrap-icons/bootstrap-icons.css') }}',

            @if(dark_theme())
            skin: 'oxide-dark',
            @endif

            @isset($imagesUploadUrl)
            automatic_uploads: true,
            paste_data_images: true,
            images_replace_blob_uris: true,
            images_upload_handler: function (blobInfo, success, failure, progress) {
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                axios.post('{{ $imagesUploadUrl }}', formData, {
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
            @endisset
        });
    </script>
@endpush
