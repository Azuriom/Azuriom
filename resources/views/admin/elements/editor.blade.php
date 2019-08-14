@section('styles')
    @parent
    <style>
        .tox-tinymce {
            border: 1px solid #d1d3e2!important;
            border-radius: .35rem!important;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('assets/admin/vendor/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('footer-scripts')
    @parent
    <script>
        tinymce.init({
            selector: '.html-editor',
            height: 350,
            plugins: 'preview searchreplace autolink code visualblocks image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough forecolor | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat code'
        });
    </script>
@endsection
