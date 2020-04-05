@push('footer-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.html-editor',
            height: 350,
            min_height: 200,
            entity_encoding: 'raw',
            plugins: 'preview searchreplace autolink code image link media hr anchor advlist lists',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough forecolor | link image media | alignleft aligncenter alignright alignjustify | numlist bullist | removeformat code'
        });
    </script>
@endpush
