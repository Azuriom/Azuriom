@push('footer-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.html-editor',
            height: 400,
            min_height: 200,
            entity_encoding: 'raw',
            plugins: 'preview searchreplace autolink code image link hr anchor lists',
            toolbar: 'formatselect | bold italic underline strikethrough forecolor | link image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat code | undo redo'
        });
    </script>
@endpush
