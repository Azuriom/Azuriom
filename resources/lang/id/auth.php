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

    'failed' => 'Kredensial tidak cocok dengan data kami.',
    'throttle' => 'Terlalu banyak upaya masuk. Silahkan mencoba lagi dalam :seconds detik.',

    'register' => 'Daftar',
    'login' => 'Login',
    'logout' => 'Logout',
    'verify' => 'Verifikasi Alamat Email Kamu',
    'passwords' => [
        'confirm' => 'Konfirmasi kata sandi',
        'reset' => 'Atur ulang kata sandi',
        'send' => 'Kirim tautan reset kata sandi',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => 'Pengguna',
    'email' => 'Alamat Email',
    'password' => 'Kata Sandi',
    'confirm_password' => 'Konfirmasi Kata Sandi',
    'current_password' => 'Kata sandi sekarang',

    'conditions' => 'Saya menyetujui <a href=":url" target="_blank">peraturan ini</a>.',

    '2fa' => [
        'code' => 'Kode keamanan dua faktor',
        'invalid' => 'Kode tidak valid',
    ],

    'suspended' => 'Akun ini ditangguhkan.',

    'maintenance' => 'Website sedang dalam pemeliharaan.',

    'remember' => 'Ingatkan saya',
    'forgot_password' => 'Lupa kata sandi?',

    'verification' => [
        'sent' => 'Tautan verifikasi baru telah dikirim ke alamat email kamu.',
        'check' => 'Sebelum melanjutkan, periksa email kamu untuk tautan verifikasi.',
        'request' => 'Jika kamu tidak menerima email, kamu dapat meminta lagi.',
        'resend' => 'Kirim ulang email',
    ],

    'confirmation' => 'Harap konfirmasi kata sandi kamu sebelum melanjutkan.',

    'mail' => [
        'reset' => [
            'subject' => 'Atur Ulang Pemberitahuan Kata Sandi',
            'line1' => 'Kamu menerima email ini karena kami menerima permintaan pengaturan ulang kata sandi untuk akun kamu.',
            'action' => 'Atur ulang kata sandi',
            'line2' => 'Tautan pengaturan ulang kata sandi ini akan kedaluwarsa dalam :count menit.',
            'line3' => 'Jika kamu tidak meminta pengaturan ulang kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.',
        ],

        'verify' => [
            'subject' => 'Verifikasi Alamat Email',
            'line1' => 'Silahkan klik tombol di bawah ini untuk memverifikasi alamat email kamu.',
            'action' => 'Verifikasi Alamat Email',
            'line2' => 'Jika kamu tidak membuat akun, tidak diperlukan tindakan lebih lanjut.',
        ],
    ],
];
