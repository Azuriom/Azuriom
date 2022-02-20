@push('scripts')@includeIf('custom.footer')@endpush

@push('footer-scripts')@includeIf('custom.body')@endpush

@if($keywords = setting('keywords')) @push('meta')
    <meta name="keywords" content="{{ $keywords }}">
@endpush @endif

@if(($welcomePopup = setting('welcome_alert')) && ! session()->has('welcome_popup'))
    @push('footer-scripts')
        <!-- Modal -->
        <div class="modal fade" id="welcomePopupModal" tabindex="-1" role="dialog" aria-labelledby="welcomePopupLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="welcomePopupLabel">{{ site_name() }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! $welcomePopup !!}
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', function () {
                setTimeout(function () {
                    new bootstrap.Modal(document.getElementById('welcomePopupModal')).show();
                }, 500);
            });
        </script>
    @endpush

    @php(session()->put('welcome_popup', true))
@endif
