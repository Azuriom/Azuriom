<?php

return [
    'title' => 'Dukungan',

    'fields' => [
        'subject' => 'Judul',
        'category' => 'Kategori',
        'ticket' => 'Tiket',
        'comment' => 'Kometar',
    ],

    'actions' => [
        'create' => 'Buka tiket baru',
        'reopen' => 'Buka kembali',
        'close' => 'Tutup',
    ],

    'state' => [
        'open' => 'Buka',
        'closed' => 'Ditutup',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => 'Tiket ini ditutup.',

        'open' => 'Buka tiket',

        'notification' => 'Tanggapan baru di tiket dukungan kamu.',

        'info' => '<strong>:author</strong> membuat tiket ini dalam kategori <strong>:category</strong> pada :date.',
    ],

    'webhook' => [
        'ticket' => 'Tiket baru di dukungan',
        'comment' => 'Komentar baru di dukungan',
        'closed' => 'Tiket ditutup',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Balasan baru di tiket dukungan kamu',
            'message' => 'Halo :user, tiket dukungan kamu #:id mendapat balasan baru dari :author.',
            'view' => 'Lihat tiket',
        ],
    ],

    'days' => 'days',
];
