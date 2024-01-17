<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Girdiğiniz bilgiler kayıtlarımızla uyuşmuyor.',
    'throttle' => 'Çok fazla hatalı giriş yaptınız. Lütfen :seconds saniye sonra tekrar deneyiniz.',

    'register' => 'Kayıt Ol',
    'login' => 'Giriş Yap',
    'logout' => 'Çıkış Yap',
    'verify' => 'E Posta Adresini Doğrula',
    'passwords' => [
        'confirm' => 'Şifreyi Onayla',
        'reset' => 'Şifreyi Sıfırla',
        'send' => 'Şifre Sıfırlama Bağlantısı Gönder',
    ],
    'fpc' => [
        'title' => 'Zorunlu parola değişimi',
        'line1' => 'Güvenlik sebebi ile hesabın devre dışı bırakıldı. Aktif hale getirmek için lütfen parolanı değiştir.',
        'line2' => 'Eğer hesabını aktif hale getirmekte problem yaşıyorsan, web site yetkilileri ile iletişime geç.',
        'action' => 'Parolamı değiştir',
    ],
    'name' => 'Kullanıcı Adı',
    'email' => 'E-posta Adresi',
    'password' => 'Şifre',
    'confirm_password' => 'Şifreyi Onayla',
    'current_password' => 'Geçerli şifre',

    'conditions' => '<a href=":url" target="_blank">kondisyonlarını kabul ediyorum</a>.',

    '2fa' => [
        'code' => 'İki Faktörlü Doğrulama Kodu',
        'invalid' => 'Geçersiz kod',
    ],

    'suspended' => 'Bu hesap askıya alınmış.',

    'maintenance' => 'Web sitesi bakım altında.',

    'remember' => 'Beni hatırla',
    'forgot_password' => 'Şifrenizi Mi Unuttunuz?',

    'verification' => [
        'sent' => 'Yeni bir doğrulama bağlantısı e-posta adresinize gönderildi.',
        'check' => 'Devam etmeden önce lütfen doğrulama bağlantısı için e-postanızı kontrol edin.',
        'request' => 'E-postayı almadıysanız, başka bir e-posta isteyebilirsiniz.',
        'resend' => 'E-Postayı yeniden yolla',
    ],

    'confirmation' => 'Devam etmeden önce lütfen parolanızı onaylayın.',

    'mail' => [
        'reset' => [
            'subject' => 'Parola Sıfırlama Bildirimi',
            'line1' => 'Hesabınız için bir parola sıfırlama talebi aldığımız için bu e-postayı alıyorsunuz.',
            'action' => 'Şifreyi Sıfırla',
            'line2' => 'Bu parola sıfırlama linkinin geçerlilik süresi :count dakika içinde dolacaktır.',
            'line3' => 'Bir parola sıfırlama talebinde bulunmadıysanız, başka bir işlem yapmanıza gerek yoktur.',
        ],

        'verify' => [
            'subject' => 'E Posta Adresini Doğrula',
            'line1' => 'E-posta adresinizi doğrulamak için lütfen aşağıdaki düğmeye tıklayın.',
            'action' => 'E-Posta Adresini Doğrula',
            'line2' => 'Bir hesap oluşturmadıysanız, başka bir işlem yapmanıza gerek yoktur.',
        ],
    ],
];
