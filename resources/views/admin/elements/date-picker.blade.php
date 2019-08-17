@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/flatpickr/css/flatpickr.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/vendor/flatpickr/js/flatpickr.min.js') }}"></script>
@endpush

@push('footer-scripts')
    <script>
        flatpickr('.date-picker', {
            enableTime: true,
            altInput: true,
            time_24hr: true,
            altFormat: "d/m/Y H:i",
            dateFormat: "Y-m-d H:i:S",
        });
    </script>
@endpush
