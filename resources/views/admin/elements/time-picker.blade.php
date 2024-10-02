@push('styles')
    <link href="{{ asset('vendor/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/flatpickr/js/flatpickr.min.js') }}"></script>
    <script>
        flatpickr('.time-picker', {
            time_24hr: {{ str_ends_with(trans('messages.date.compact'), 'A') ? 'false' : 'true' }},
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i',
        });
    </script>
@endpush
