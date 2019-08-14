@section('scripts')
    @parent
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script defer>
        function submitCaptchaForm() {
            document.getElementById('captcha-form').submit();
        }
    </script>
@endsection

<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="submitCaptchaForm" data-size="invisible"></div>
