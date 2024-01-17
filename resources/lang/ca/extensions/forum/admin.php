<?php

return [

    'nav' => [
        'settings' => 'Configuració',
        'forums' => 'Fòrums',
        'tags' => 'Etiquetes',
    ],

    'settings' => [
        'title' => 'Configuració del fòrum',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => 'Categories',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => 'Fòrums',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => 'Restringir accés a aquest fòrum a certs rols',
        'default_tags' => 'Etiquetes per defecte',
        'lock' => 'Tancar aquest fòrum',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => 'Discussions del fòrum',
    ],

    'posts' => [
        'card' => 'Missatges del fòrum',

        'recent' => 'Recent posts in home',
        'delay' => 'Retard entre missatges',
        'seconds' => 'segons',
    ],

    'tags' => [
        'title' => 'Etiquetes',
        'create' => 'Crear etiqueta',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Tòpic esborrat #:id',
            'pinned' => 'Tòpic fixat #:id',
            'unpinned' => 'Tòpic desenganxat #:id',
            'locked' => 'Tòpic tancat #:id',
            'unlocked' => 'Tòpic obert #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Missatge esborrat #:id',
        ],

        'forum-categories' => [
            'created' => 'Categoria fòrum creada #:id',
            'updated' => 'Categoria fòrum actualitzada #:id',
            'deleted' => 'Categoria fòrum esborrada #:id',
        ],

        'forum-forums' => [
            'created' => 'Fòrum creat #:id',
            'updated' => 'Fòrum actualitzat #:id',
            'deleted' => 'Fòrum esborrat #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Administrar Fòums i Categories',
        'discussions' => 'Administrar discussions del fòrum (moure, editar, esborrar, fixar, tancar)',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
