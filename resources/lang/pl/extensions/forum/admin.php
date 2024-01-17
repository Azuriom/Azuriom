<?php

return [

    'nav' => [
        'settings' => 'Ustawienia',
        'forums' => 'Forum',
        'tags' => 'Tagi',
    ],

    'settings' => [
        'title' => 'Ustawienia forum',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => 'Kategorie',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => 'Fora',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => 'Ogranicz dostęp do tego forum tylko do pewnych ról',
        'default_tags' => 'Domyślne tagi',
        'lock' => 'Zablokuj to forum',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => 'Dyskusje na forum',
    ],

    'posts' => [
        'card' => 'Posty na forum',

        'recent' => 'Recent posts in home',
        'delay' => 'Opóźnienie między postami',
        'seconds' => 'sekundy',
    ],

    'tags' => [
        'title' => 'Tagi',
        'create' => 'Stwórz tag',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Usunięto dyskusję #:id',
            'pinned' => 'Przypięto dyskusje #:id',
            'unpinned' => 'Odpięto dyskusje #:id',
            'locked' => 'Zamknięto dyskusje #:id',
            'unlocked' => 'Odblokowano dyskusje #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Usunięto post #:id',
        ],

        'forum-categories' => [
            'created' => 'Utworzono kategorię forum #:id',
            'updated' => 'Zaktualizowano kategorie forum #:id',
            'deleted' => 'Usunięto kategorie forum #:id',
        ],

        'forum-forums' => [
            'created' => 'Utworzono forum #:id',
            'updated' => 'Zaktualizowano forum #:id',
            'deleted' => 'Usunięto forum #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Zarządzaj forami i kategoriami',
        'discussions' => 'Zarządzaj dyskusjami na forum (przenoszenie, edycja, usuwanie, pin, blokada)',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
