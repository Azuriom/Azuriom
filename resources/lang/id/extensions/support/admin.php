<?php

return [
    'title' => 'Dukungan',

    'categories' => [
        'title' => 'Kategori',
        'edit' => 'Ubah kategori #:category',
        'create' => 'Buat kategori',

        'delete_empty' => 'Kategori ini berisi tiket dan tidak bisa dihapus.',
    ],

    'tickets' => [
        'title' => 'Tiket',
        'show' => 'Tiket #:ticket - :name',
        'create' => 'Buat tiket',

        'open' => 'Tiket terbuka',
    ],

    'permissions' => [
        'tickets' => 'Lihat dan kelola dukungan tiket',
        'categories' => 'Lihat dan kelola dukungan kategori',
    ],

    'settings' => [
        'title' => 'Pengaturan dukungan',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Saat user membuat tiket atau menambahkan komentar notifikasi akan dibuat pada webhook. Kosongkan untuk menonaktifkan',
        'scheduler' => 'When CRON tasks are setup, tickets can be automatically closed after a certain time.',
        'auto_close' => 'Delay before automatically closing tickets',
        'auto_close_info' => 'When a ticket doesn\'t receive any answer during this time, it will be automatically closed. Leave empty to disable.',
        'reopen' => 'Allow users to reopen a closed ticket.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Reopened ticket #:id',
            'closed' => 'Tiket ditutup #:id',
        ],
    ],
];
