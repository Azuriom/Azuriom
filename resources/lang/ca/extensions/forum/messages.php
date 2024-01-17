<?php

return [
    'title' => 'Fòrum',

    'fields' => [
        'forum' => 'Fòrum',
        'tags' => 'Etiquetes',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Fixa',
        'unpin' => 'Desenganxa',
        'lock' => 'Bloqueja',
        'unlock' => 'Desbloqueja',
    ],

    'latest' => [
        'title' => 'Últims posts',
    ],

    'stats' => [
        'title' => 'Estadístiques',

        'discussions' => 'Discussions: :count',
        'posts' => 'Entrades: :count',
        'users' => 'Usuaris: :count',
    ],

    'online' => [
        'title' => 'Usuaris en línia',

        'none' => 'Cap usuari conectat...',
    ],

    'forums' => [
        'discussions' => ':count discussion|:count discussions',

        'locked' => 'Aquest fòrum està tancat.',
    ],

    'discussions' => [
        'title' => 'Discussions',
        'create' => 'Create discussion',
        'edit' => 'Edit discussion',

        'pin' => 'Fixar aquest tòpic',
        'lock' => 'Tancar tòpic',

        'respond' => 'Respondre',
        'views' => ':count vista|:count vistes',

        'locked' => 'Tancat',
        'pinned' => 'Fixat',

        'locked_info' => 'This discussion is locked.',

        'posts' => ':count post|:count posts',

        'delete' => 'Estàs segur d\'esborrar aquesta discussió?',

        'status' => [
            'created' => 'Tòpic creat amb èxit.',
            'updated' => 'Tòpic actualitzat amb èxit.',
            'deleted' => 'Tòpic esborrat amb èxit.',

            'pinned' => 'Tòpic fixat amb èxit.',
            'unpinned' => 'Tòpic desenganxat amb èxit.',
            'locked' => 'Tòpic tancat amb èxit.',
            'unlocked' => 'Tòpic desbloquejat amb èxit.',
        ],
    ],

    'posts' => [
        'title' => 'Missatges',
        'edit' => 'Edit post',

        'delay' => 'Pot publicar missatges en :time.',

        'delete' => 'Segur que vol esborrar aquest missatge?',

        'status' => [
            'created' => 'Missatge creat amb èxit.',
            'updated' => 'Missatge actualitzat amb èxit.',
            'deleted' => 'Missatge esborrat amb èxit.',
        ],
    ],

    'notifications' => [
        'reply' => ':user ha respost al seu tòpic :discussion',
        'mention' => ':user t\'ha mencionat en :discussion',
    ],

    'profile' => [
        'likes' => 'Likes',
        'posts' => 'Missatges',
        'discussions' => 'Discussions',

        'information' => 'Informació',
        'edit' => 'Editar perfil',

        'location' => 'Ubicació',
        'website' => 'Lloc web',
        'about' => 'Sobre',
        'signature' => 'Signatura',
        'registered' => 'Registered',
        'last_seen' => 'Last seen',
        'display_last_seen' => 'Display last visit',
    ],
];
