@push('styles')
    <link href="{{ asset('assets/admin/vendor/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/admin/vendor/flatpickr/js/flatpickr.min.js') }}"></script>
    <script>
        flatpickr('.date-picker', {
            time_24hr: true,
            enableTime: true,
            enableSeconds: true,
            minuteIncrement: 1
        });
    </script>
@endpush
