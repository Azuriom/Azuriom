@push('styles')
    <link href="{{ asset('assets/admin/vendor/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet">
    <style>
        .date-picker {
            background-color: #fff !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/vendor/flatpickr/js/flatpickr.min.js') }}"></script>
@endpush

@push('footer-scripts')
    <script>
        flatpickr('.date-picker', {
            time_24hr: true,
            enableTime: true,
            enableSeconds: true,
            minuteIncrement: 1
        });
    </script>
@endpush
