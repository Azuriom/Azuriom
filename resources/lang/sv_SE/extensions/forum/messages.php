<?php

return [
    'title' => 'Forum',

    'fields' => [
        'forum' => 'Forum',
        'tags' => 'Taggar',
        'editor' => 'Redigerare',
    ],

    'actions' => [
        'pin' => 'Fäst',
        'unpin' => 'Lossa från profil',
        'lock' => 'Lås',
        'unlock' => 'Lås upp',
    ],

    'latest' => [
        'title' => 'Senaste inlägg',
    ],

    'stats' => [
        'title' => 'Statistik',

        'discussions' => 'Diskussioner: :count',
        'posts' => 'Inlägg: :count',
        'users' => 'Användare: :count',
    ],

    'online' => [
        'title' => 'Användare online',

        'none' => 'Inga användare online nu...',
    ],

    'forums' => [
        'discussions' => ':count diskussion|:count diskussioner',

        'locked' => 'Detta forum är låst.',
    ],

    'discussions' => [
        'title' => 'Diskussioner',
        'create' => 'Skapa diskussion',
        'edit' => 'Redigera diskussion',

        'pin' => 'Fäst den här diskussionen',
        'lock' => 'Lås denna diskussion',

        'respond' => 'Svara',
        'views' => ':count view|:count vyer',

        'locked' => 'Låst',
        'pinned' => 'Fäst',

        'locked_info' => 'Denna diskussion är låst.',

        'posts' => ':count inlägg|:count inlägg',

        'delete' => 'Är du säker på att du vill ta bort denna diskussion?',

        'status' => [
            'created' => 'Diskussionen har skapats.',
            'updated' => 'Denna diskussion har ändrats.',
            'deleted' => 'Denna diskussion har tagits bort.',

            'pinned' => 'Denna diskussion har fastnats.',
            'unpinned' => 'Denna diskussion har tagits bort.',
            'locked' => 'Denna diskussion har låsts.',
            'unlocked' => 'Denna diskussion har låsts upp.',
        ],
    ],

    'posts' => [
        'title' => 'Inlägg',
        'edit' => 'Redigera inlägg',

        'delay' => 'Du kan lägga upp igen om :time.',

        'delete' => 'Är du säker på att du vill ta bort detta inlägg?',

        'status' => [
            'created' => 'Inlägget har skapats.',
            'updated' => 'Detta inlägg har ändrats.',
            'deleted' => 'Det här inlägget har tagits bort.',
        ],
    ],

    'notifications' => [
        'reply' => ':user har svarat på din diskussion :discussion',
        'mention' => ':user nämnde dig i :discussion',
    ],

    'profile' => [
        'likes' => 'Gillar',
        'posts' => 'Inlägg',
        'discussions' => 'Diskussioner',

        'information' => 'Information',
        'edit' => 'Redigera profil',

        'location' => 'Plats',
        'website' => 'Hemsida',
        'about' => 'Om',
        'signature' => 'Signatur',
        'registered' => 'Registrerad',
        'last_seen' => 'Sågs senast',
        'display_last_seen' => 'Visa senaste besök',
    ],
];
