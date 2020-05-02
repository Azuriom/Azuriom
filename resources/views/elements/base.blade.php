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

@if(($welcomePopup = setting('welcome-popup')) && ! session()->has('welcome_popup'))
    @push('footer-scripts')
        <!-- Modal -->
        <div class="modal fade" id="welcomePopupModal" tabindex="-1" role="dialog" aria-labelledby="welcomePopupLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="welcomePopupLabel">{{ site_name() }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $welcomePopup }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', function () {
                setTimeout(function () {
                    $('#welcomePopupModal').modal('show');

                    console.log('load');
                }, 1000);
            });
        </script>
    @endpush

    @php
        session()->put('welcome_popup', true);
    @endphp
@endif
