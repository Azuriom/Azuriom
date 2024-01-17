<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the mail library to build
    | the mails layout.
    |
    */

    'hello' => 'Halo!',
    'whoops' => 'Ups!',

    'regards' => 'Salam hangat,',

    'link' => "Jika kamu mengalami masalah saat mengklik tombol \":actionText\", salin dan tempel URL di bawah ini ke browser web Anda: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. All rights reserved.',

    'test' => [
        'subject' => 'Uji email di :name',
        'content' => 'Jika kamu dapat melihat email ini, artinya mengirim email dari :name berfungsi!',
    ],

    'delete' => [
        'subject' => 'Request penghapusan akun',
        'line1' => 'Kamu menerima email ini karena kami menerima request penghapusan akun untuk kamu.',
        'action' => 'Hapus akun saya',
        'line2' => 'Aksi ini tidak dapat ubah. Ini akan menghapus akun dan data terkait secara permanen. Link ini akan kadaluwarsa dalam :count menit.',
        'line3' => 'Jika kamu tidak request penghapusan akun, tolong pastikan untuk mereview pengaturan keamanan.',
    ],
];
