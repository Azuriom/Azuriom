@push('footer-scripts')
    <script>
        document.querySelectorAll('[data-image-preview]').forEach(function (el) {
            el.addEventListener('change', function (ev) {

                if (ev.target.files && ev.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const preview = document.getElementById(ev.target.dataset['imagePreview']);

                        if (preview) {
                            preview.src = e.target.result;
                            preview.classList.remove('d-none');
                        }
                    };

                    reader.readAsDataURL(ev.target.files[0]);
                }
            });
        });
    </script>
@endpush
