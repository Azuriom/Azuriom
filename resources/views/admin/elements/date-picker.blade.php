@push('styles')
    <link href="{{ asset('vendor/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/flatpickr/js/flatpickr.min.js') }}"></script>
    <script>
        flatpickr('.date-picker', {
            time_24hr: true,
            enableTime: true,
            enableSeconds: true,
            minuteIncrement: 1,
            // Prevent error with MySQL
            minDate: '2000-01-01',
            maxDate: '2037-31-12',
        });
    </script>
@endpush
