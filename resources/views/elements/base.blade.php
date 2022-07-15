@push('scripts')@includeIf('custom.head')@endpush

@push('footer-scripts')@includeIf('custom.body')@endpush

@if($keywords = setting('keywords')) @push('meta')
    <meta name="keywords" content="{{ $keywords }}">
@endpush @endif

@if(($welcomeAlert = setting('welcome_alert')) && ! session()->has('welcome_alert'))
    @push('footer-scripts')
        <!-- Modal -->
        <div class="modal fade" id="welcomeAlertModal" tabindex="-1" role="dialog" aria-labelledby="welcomeAlertLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="welcomeAlertLabel">{{ site_name() }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! $welcomeAlert !!}
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', function () {
                setTimeout(function () {
                    new bootstrap.Modal(document.getElementById('welcomeAlertModal')).show();
                }, 500);
            });
        </script>
    @endpush

    @php(session()->put('welcome_alert', true))
@endif
