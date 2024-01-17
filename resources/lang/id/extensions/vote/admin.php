<?php

return [
    'nav' => [
        'title' => 'Voting',
        'settings' => 'Pengaturan',
        'sites' => 'Website',
        'rewards' => 'Hadiah',
        'votes' => 'Suara',
    ],

    'permission' => 'Kelola plugin Voting',

    'settings' => [
        'title' => 'Pengaturan halaman voting',

        'count' => 'Hitungan Pemain Teratas',
        'display-rewards' => 'Tampilkan hadiah di halaman voting',
        'ip_compatibility' => 'Aktifkan kompabilitas IPv4/IPv6',
        'ip_compatibility_info' => 'Opsi ini memungkinkan kamu untuk mengoreksi voting yang tidak diverifikasi di situs voting yang tidak menerima IPv6 saat situs Anda melakukannya, atau sebaliknya.',
        'commands' => 'Perintah global',
    ],

    'sites' => [
        'title' => 'Website',
        'edit' => 'Edit website :site',
        'create' => 'Buat website',

        'enable' => 'Aktifkan website',
        'delay' => 'Jeda antar voting',
        'minutes' => 'menit',

        'list' => 'Situs tempat voting dapat diverifikasi',
        'variable' => 'Kamu dapat menggunakan <code>{player}</code> untuk menggunakan nama pemain.',

        'verifications' => [
            'title' => 'Verifikasi',
            'enable' => 'Aktifkan verifikasi voting',

            'disabled' => 'Voting di website ini tidak akan diverifikasi.',
            'auto' => 'Voting di website ini otomatis diverifikasi.',
            'input' => 'Voting di website ini akan diverifikasi ketika isian dibawah ini diisi.',

            'pingback' => 'Ping balik URL: :url',
            'secret' => 'Secret Key',
            'server_id' => 'ID Server',
            'token' => 'Token',
            'api_key' => 'API key',
        ],
    ],

    'rewards' => [
        'title' => 'Hadiah',
        'edit' => 'Edit hadiah :reward',
        'create' => 'Buat hadiah',

        'require_online' => 'Jalankan perintah saat pengguna online di server (hanya tersedia dengan AzLink)',
        'enable' => 'Aktifkan hadiah',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => 'Voting',

        'empty' => 'Tidak ada voting dibulan ini.',
        'votes' => 'Penghitung Voting',
        'month' => 'Voting bulan ini',
        'week' => 'Voting minggu ini',
        'day' => 'Voting hari ini',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Membuat situs voting #:id',
            'updated' => 'Perbarui situs voting #:id',
            'deleted' => 'Hapus situs voting #:id',
        ],

        'vote-rewards' => [
            'created' => 'Membuat hadiah voting #:id',
            'updated' => 'Perbarui hadiah voting #:id',
            'deleted' => 'Hapus hadiah voting #:id',
        ],
    ],
];
