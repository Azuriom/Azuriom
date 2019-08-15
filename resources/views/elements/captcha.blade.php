@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@push('footer-scripts')
    <script>
        let captchaForm;

        function submitCaptchaForm() {
            captchaForm.submit();
        }

        captchaForm = document.getElementById('captcha-form');

        if (captchaForm) {
            captchaForm.addEventListener('submit', function (e) {
                e.preventDefault();

                grecaptcha.execute();
            });
        }
    </script>
@endpush

<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="submitCaptchaForm" data-size="invisible"></div>
