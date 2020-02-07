@if($analyticsId = setting('g-analytics-id')) @push('scripts')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $analyticsId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', '{{ $analyticsId }}');
    </script>
@endpush @endif

@if($htmlScriptsHead = setting('html-head')) @push('scripts')
    {!! $htmlScriptsHead !!}
@endpush @endif

@if($htmlScriptsBody = setting('html-body')) @push('footer-scripts')
    {!! $htmlScriptsBody !!}
@endpush @endif

@if($keywords = setting('keywords')) @push('meta')
    <meta name="keywords" content="{{ $keywords }}">
@endpush @endif
