@push('footer-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.html-editor',
            height: 350,
            min_height: 200,
            entity_encoding : 'raw',
            plugins: 'preview searchreplace autolink code visualblocks image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough forecolor | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat code'
        });
    </script>
@endpush
