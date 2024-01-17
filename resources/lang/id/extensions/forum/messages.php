<?php

return [
    'title' => 'Forum',

    'fields' => [
        'forum' => 'Forum',
        'tags' => 'Tag',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Sematan',
        'unpin' => 'Lepas Sematan',
        'lock' => 'Kunci',
        'unlock' => 'Buka',
    ],

    'latest' => [
        'title' => 'Postingan terakhir',
    ],

    'stats' => [
        'title' => 'Statistik',

        'discussions' => 'Diskusi: :count',
        'posts' => 'Postingan: :count',
        'users' => 'Pengguna: :count',
    ],

    'online' => [
        'title' => 'Pengguna online',

        'none' => 'Tidak ada pengguna online sekarang...',
    ],

    'forums' => [
        'discussions' => ':count discussion|:count discussions',

        'locked' => 'Forum ini dikunci.',
    ],

    'discussions' => [
        'title' => 'Diskusi',
        'create' => 'Create discussion',
        'edit' => 'Edit discussion',

        'pin' => 'Sematkan diskusi ini',
        'lock' => 'Kunci diskusi ini',

        'respond' => 'Tanggapi',
        'views' => ':count dilihat|:count dilihat',

        'locked' => 'Terkunci',
        'pinned' => 'Disematkan',

        'locked_info' => 'This discussion is locked.',

        'posts' => ':count post|:count posts',

        'delete' => 'Apakah kamu yakin ingin menghapus diskusi ini?',

        'status' => [
            'created' => 'Diskusi telah dibuat.',
            'updated' => 'Diskusi telah dimodifikasi.',
            'deleted' => 'Diskusi telah dihapus.',

            'pinned' => 'Diskusi telah disematkan.',
            'unpinned' => 'Diskusi tidak lagi disematkan.',
            'locked' => 'Diskusi telah di kunci.',
            'unlocked' => 'Diskusi telah dibuka.',
        ],
    ],

    'posts' => [
        'title' => 'Postingan',
        'edit' => 'Edit post',

        'delay' => 'Kamu dapat posting lagi dalam :time.',

        'delete' => 'Apa kamu yakin ingin menghapus postingan ini?',

        'status' => [
            'created' => 'Postingan telah dibuat.',
            'updated' => 'Postingan telah dimodifikasi.',
            'deleted' => 'Postingan telah dihapus.',
        ],
    ],

    'notifications' => [
        'reply' => ':user telah membalas diskusimu :discussion',
        'mention' => ':user menyebut Kamu di :discussion',
    ],

    'profile' => [
        'likes' => 'Suka',
        'posts' => 'Postingan',
        'discussions' => 'Diskusi',

        'information' => 'Informasi',
        'edit' => 'Edit profil',

        'location' => 'Lokasi',
        'website' => 'Website',
        'about' => 'Tentang',
        'signature' => 'Tanda tangan',
        'registered' => 'Registered',
        'last_seen' => 'Last seen',
        'display_last_seen' => 'Display last visit',
    ],
];
