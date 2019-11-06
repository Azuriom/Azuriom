@if($reCaptchaKey = setting('recaptcha-site-key'))
    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

    <div class="g-recaptcha" data-sitekey="{{ $reCaptchaKey }}" data-callback="submitCaptchaForm" data-size="invisible"></div>
@endif
