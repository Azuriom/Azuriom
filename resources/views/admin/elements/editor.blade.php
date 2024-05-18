@push('footer-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.html-editor',
            license_key: 'gpl',
            promotion: false,
            height: 400,
            min_height: 200,
            entity_encoding: 'raw',
            plugins: 'searchreplace autolink code image link anchor lists table',
            toolbar: 'blocks | bold italic underline strikethrough forecolor | link image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat code | undo redo',
            relative_urls: false,
            valid_children: "+body[style]",
            extended_valid_elements: 'i[class]',
            content_css: '{{ (dark_theme() ? 'dark,' : '').asset('vendor/bootstrap-icons/bootstrap-icons.css') }}',

            @if(dark_theme())
            skin: 'oxide-dark',
            @endif

            @isset($imagesUploadUrl)
            images_upload_handler: function (blobInfo, progress) {
                return new Promise(function (resolve, reject) {
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    axios.post('{{ $imagesUploadUrl }}', formData, {
                        onUploadProgress: function (progressEvent) {
                            progress(progressEvent.progress * 100);
                        },
                    }).then(function (response) {
                        resolve(response.data.location);
                    }).catch(function (error) {
                        if (error.response) {
                            reject({ message: error.response.data.message, remove: true });
                            return;
                        }

                        reject({ message: error.toString(), remove: true });
                    });
                });
            },
            @else
            paste_data_images: false,
            @endisset
        });
    </script>
@endpush
