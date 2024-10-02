@push('styles')
    <link href="{{ asset('vendor/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('vendor/flatpickr/js/flatpickr.min.js') }}"></script>
    @if(app()->getLocale() !== 'en')
        <script src="{{ asset('vendor/flatpickr/js/l10n/'.Str::beforeLast(app()->getLocale(), '_').'.js') }}"></script>
        <script>
            flatpickr.localize(flatpickr.l10ns.{{ Str::beforeLast(app()->getLocale(), '_') }});
        </script>
    @endif
    <script>
        flatpickr('.date-picker', {
            time_24hr: {{ Str::endsWith(trans('messages.date.compact'), 'A') ? 'false' : 'true' }},
            enableTime: true,
            enableSeconds: true,
            minuteIncrement: 1,
            // Prevent error with MySQL
            minDate: '2000-01-01',
            maxDate: '2037-31-12',
        });
    </script>
@endpush
