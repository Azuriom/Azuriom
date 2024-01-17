<?php

return [

    'nav' => [
        'settings' => 'Beállítások',
        'forums' => 'Fórumok',
        'tags' => 'Címkék',
    ],

    'settings' => [
        'title' => 'Fórum beállítások',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => 'Kategóriák',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => 'Fórumok',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => 'A fórumhoz való hozzáférés korlátozása csak bizonyos szerepkörök számára
',
        'default_tags' => 'Alapértelmezett címék',
        'lock' => 'Fórum zárolása',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => 'Fórumbeszélgetések
',
    ],

    'posts' => [
        'card' => 'Fórum megbeszélések',

        'recent' => 'Recent posts in home',
        'delay' => 'Késleltetés a hozzászólások között',
        'seconds' => 'másodperc',
    ],

    'tags' => [
        'title' => 'Címkék',
        'create' => 'Címke létrehozása',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Törölt vita #:id
',
            'pinned' => 'Kitűzött vita #:id',
            'unpinned' => 'Függetlenített vita #:id',
            'locked' => 'Lezárult vita #:id',
            'unlocked' => 'Feloldott vita #:id',
        ],

        'forum-posts' => [
            'deleted' => '#:id bejegyzés törölve',
        ],

        'forum-categories' => [
            'created' => 'Létrehozott fórum kategória #:id
',
            'updated' => 'Frissített fórum kategória #:id
',
            'deleted' => 'Törölt fórum kategória #:id',
        ],

        'forum-forums' => [
            'created' => 'Létrehozott fórum #:id',
            'updated' => 'Frissített fórum #:id
',
            'deleted' => 'Törölt fórum #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Fórumok és kategóriák kezelése
',
        'discussions' => 'Fórumbeszélgetések kezelése (áthelyezés, szerkesztés, törlés, kitűzés, zárolás)
',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
