<?php

return [
    'title' => 'Forum',

    'fields' => [
        'forum' => 'Forum',
        'tags' => 'Tags',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Anheften',
        'unpin' => 'Loslösen',
        'lock' => 'Sperren',
        'unlock' => 'Freischalten',
    ],

    'latest' => [
        'title' => 'Neueste Beiträge',
    ],

    'stats' => [
        'title' => 'Statistiken',

        'discussions' => 'Diskussionen: :count',
        'posts' => 'Beiträge: :count',
        'users' => 'Benutzer: :count',
    ],

    'online' => [
        'title' => 'Online Benutzer',

        'none' => 'Zurzeit keine Benutzer online...',
    ],

    'forums' => [
        'discussions' => ':count Diskussion|:count Diskussionen',

        'locked' => 'Dieses Forum ist gesperrt.',
    ],

    'discussions' => [
        'title' => 'Diskussionen',
        'create' => 'Diskussion erstellen',
        'edit' => 'Diskussion bearbeiten',

        'pin' => 'Diese Diskussion anheften',
        'lock' => 'Diese Diskussion sperren',

        'respond' => 'Reagieren',
        'views' => ':count Aufruf|:count Aufrufe',

        'locked' => 'Gesperrt',
        'pinned' => 'Angeheftet',

        'locked_info' => 'Diese Diskussion ist gesperrt.',

        'posts' => ':count Beitrag|:count Beiträge',

        'delete' => 'Möchtest du diese Diskussion wirklich löschen?',

        'status' => [
            'created' => 'Die Diskussion wurde erstellt.',
            'updated' => 'Diese Diskussion wurde geändert.',
            'deleted' => 'Diese Diskussion wurde gelöscht.',

            'pinned' => 'Diese Diskussion wurde angeheftet.',
            'unpinned' => 'Diese Diskussion wurde losgelöst.',
            'locked' => 'Diese Diskussion wurde gesperrt.',
            'unlocked' => 'Diese Diskussion wurde freigeschaltet.',
        ],
    ],

    'posts' => [
        'title' => 'Beiträge',
        'edit' => 'Beitrag bearbeiten',

        'delay' => 'Du kannst in :time erneut posten.',

        'delete' => 'Möchtest du diesen Beitrag wirklich löschen?',

        'status' => [
            'created' => 'Der Beitrag wurde erstellt.',
            'updated' => 'Dieser Beitrag wurde geändert.',
            'deleted' => 'Dieser Beitrag wurde gelöscht.',
        ],
    ],

    'notifications' => [
        'reply' => ':user hat auf deine Diskussion :discussion geantwortet',
        'mention' => ':user hat dich in :discussion erwähnt',
    ],

    'profile' => [
        'likes' => 'Likes',
        'posts' => 'Beiträge',
        'discussions' => 'Diskussionen',

        'information' => 'Informationen',
        'edit' => 'Profil bearbeiten',

        'location' => 'Standort',
        'website' => 'Website',
        'about' => 'Über',
        'signature' => 'Signatur',
        'registered' => 'Registriert',
        'last_seen' => 'Zuletzt gesehen',
        'display_last_seen' => 'Letzter Besuch anzeigen',
    ],
];
