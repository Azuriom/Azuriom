<?php

return [
    'title' => 'Fórum',

    'fields' => [
        'forum' => 'Fórum',
        'tags' => 'Tags',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Fixar',
        'unpin' => 'Desfixar',
        'lock' => 'Travar',
        'unlock' => 'Destravar',
    ],

    'latest' => [
        'title' => 'Ultimas postagens',
    ],

    'stats' => [
        'title' => 'Estatísticas',

        'discussions' => 'Discussões: :count',
        'posts' => 'Postagens: :count',
        'users' => 'Usuários: :count',
    ],

    'online' => [
        'title' => 'Membros online',

        'none' => 'Nenhum membro online agora...',
    ],

    'forums' => [
        'discussions' => ':count discussão|:count discussões',

        'locked' => 'Este fórum está trancado.',
    ],

    'discussions' => [
        'title' => 'Discussões',
        'create' => 'Criar discussão',
        'edit' => 'Editar discussão',

        'pin' => 'Fixar esta discussão',
        'lock' => 'Travar essa discussão',

        'respond' => 'Responder',
        'views' => ':count visualização|:count visualizações',

        'locked' => 'Trancado',
        'pinned' => 'Fixado',

        'locked_info' => 'Esta discussão está bloqueada.',

        'posts' => ':count postagem|:count postagens',

        'delete' => 'Você tem certeza que quer deletar esta discussão?',

        'status' => [
            'created' => 'A discussão foi criada.',
            'updated' => 'A discussão foi modificada.',
            'deleted' => 'A discussão foi deletada.',

            'pinned' => 'A discussão foi fixada.',
            'unpinned' => 'A discussão foi desfixada.',
            'locked' => 'A discussão foi trancada.',
            'unlocked' => 'A discussão foi destrancada.',
        ],
    ],

    'posts' => [
        'title' => 'Postagens',
        'edit' => 'Editar publicação',

        'delay' => 'Você pode postar novamente em :time.',

        'delete' => 'Você tem certeza que quer deletar este post?',

        'status' => [
            'created' => 'Postagem criada.',
            'updated' => 'Esta postagem foi modificada.',
            'deleted' => 'A postagem foi deletada.',
        ],
    ],

    'notifications' => [
        'reply' => ':user respondeu sua discussão :discussion',
        'mention' => ':user mencionou você em :discussion',
    ],

    'profile' => [
        'likes' => 'Gosteis',
        'posts' => 'Postagens',
        'discussions' => 'Discussões',

        'information' => 'Informação',
        'edit' => 'Editar perfil',

        'location' => 'Local',
        'website' => 'Site',
        'about' => 'Sobre',
        'signature' => 'Assinatura',
        'registered' => 'Registrado',
        'last_seen' => 'Visto pela última vez',
        'display_last_seen' => 'Mostrar última visita',
    ],
];
