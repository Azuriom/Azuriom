@if(setting('captcha.type') === 'recaptcha')
    @push('scripts')
        <script src="https://www.recaptcha.net/recaptcha/api.js?hl={{ app()->getLocale() }}" async defer></script>
    @endpush

    @push('footer-scripts')
        <script>
            const captchaForm = document.getElementById('captcha-form');

            function submitCaptchaForm() {
                captchaForm.submit();
            }

            if (captchaForm) {
                captchaForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    grecaptcha.execute();
                });
            }
        </script>
    @endpush

    <div class="g-recaptcha" data-sitekey="{{ setting('captcha.site_key') }}" data-callback="submitCaptchaForm" data-size="invisible"></div>

@elseif(setting('captcha.type') === 'hcaptcha')
    @push('scripts')
        <script src="https://hcaptcha.com/1/api.js?hl={{ app()->getLocale() }}" async defer></script>
    @endpush

    @push('footer-scripts')
        <script>
            const captchaForm = document.getElementById('captcha-form');

            if (captchaForm) {
                captchaForm.addEventListener('submit', function (e) {
                    const hCaptchaInput = captchaForm.querySelector('[name="h-captcha-response"]');

                    if (hCaptchaInput && hCaptchaInput.value === '') {
                        e.preventDefault();

                        hcaptcha.execute();
                    }
                });
            }
        </script>
    @endpush

    <div class="h-captcha mb-2 @if($center ?? false) text-center @endif" data-sitekey="{{ setting('captcha.site_key') }}" @if($dark ?? false) data-theme="dark" @endif></div>
@elseif(setting('captcha.type') === 'turnstile')
    @push('scripts')
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endpush

    <div class="cf-turnstile mb-2 @if($center ?? false) text-center @endif" data-sitekey="{{ setting('captcha.site_key') }}" data-theme="{{ ($dark ?? false) ? 'dark' : 'light' }}"></div>
@endif
