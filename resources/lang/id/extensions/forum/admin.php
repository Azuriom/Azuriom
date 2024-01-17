<?php

return [

    'nav' => [
        'settings' => 'Pengaturan',
        'forums' => 'Forum',
        'tags' => 'Tag',
    ],

    'settings' => [
        'title' => 'Pengaturan Forum',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => 'Kategori',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => 'Forum',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => 'Batasi akses ke forum ini hanya untuk peran tertentu',
        'default_tags' => 'Tags default',
        'lock' => 'Kunci forum ini',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => 'Diskusi forum',
    ],

    'posts' => [
        'card' => 'Postingan forum',

        'recent' => 'Recent posts in home',
        'delay' => 'Jeda antar postingan',
        'seconds' => 'detik',
    ],

    'tags' => [
        'title' => 'Tag',
        'create' => 'Buat Tag',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Hapus diskusi #:id',
            'pinned' => 'Sematkan diskusi #:id',
            'unpinned' => 'Hapus sematkan #:id',
            'locked' => 'Kunci diskusi #:id',
            'unlocked' => 'Buka diskusi #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Hapus postingan #:id',
        ],

        'forum-categories' => [
            'created' => 'Kategori forum yang dibuat #:id',
            'updated' => 'Kategori forum diperbarui #:id',
            'deleted' => 'Kategori forum dihapus #:id',
        ],

        'forum-forums' => [
            'created' => 'Forum dibuat #:id',
            'updated' => 'Forum diperbarui #:id',
            'deleted' => 'Forum dihapus #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Kelola forum dan kategori',
        'discussions' => 'Kelola forum diskusi (pindah, edit, hapus, sematkan, kunci)',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
