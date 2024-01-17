<?php

return [
    'title' => 'Foro',

    'fields' => [
        'forum' => 'Foro',
        'tags' => 'Etiquetas',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Fijar',
        'unpin' => 'Dejar de fijar',
        'lock' => 'Bloquear',
        'unlock' => 'Desbloquear',
    ],

    'latest' => [
        'title' => 'Últimas entradas',
    ],

    'stats' => [
        'title' => 'Estadísticas',

        'discussions' => 'Discusiones: :count',
        'posts' => 'Publicaciones: :count',
        'users' => 'Usuarios: :count',
    ],

    'online' => [
        'title' => 'Usuarios en línea',

        'none' => 'No hay usuarios en línea...',
    ],

    'forums' => [
        'discussions' => ':count discusión|:count discusiones',

        'locked' => 'Este foro está bloqueado.',
    ],

    'discussions' => [
        'title' => 'Discusiones',
        'create' => 'Crear discusión',
        'edit' => 'Editar discusión',

        'pin' => 'Anclar esta discusión',
        'lock' => 'Bloquear esta discusión',

        'respond' => 'Respuesta',
        'views' => ':count vista|:count vistas',

        'locked' => 'Bloqueado',
        'pinned' => 'Fijado',

        'locked_info' => 'Este debate está bloqueado.',

        'posts' => ':count post|:count posts',

        'delete' => '¿Está seguro que desea eliminar este debate?',

        'status' => [
            'created' => 'El debate ha sido creado.',
            'updated' => 'Este debate ha sido modificado.',
            'deleted' => 'Este debate ha sido eliminado.',

            'pinned' => 'Este debate ha sido fijado.',
            'unpinned' => 'Este debate ha sido desfijado.',
            'locked' => 'Este debate ha sido bloqueado.',
            'unlocked' => 'Este debate ha sido desbloqueado.',
        ],
    ],

    'posts' => [
        'title' => 'Mensajes',
        'edit' => 'Editar post',

        'delay' => 'Puedes publicar de nuevo en :time.',

        'delete' => '¿Está seguro de que desea eliminar este mensaje?',

        'status' => [
            'created' => 'La publicación ha sido creada.',
            'updated' => 'Esta publicación ha sido modificada.',
            'deleted' => 'Esta publicación ha sido eliminada.',
        ],
    ],

    'notifications' => [
        'reply' => ':user ha respondido a tu discusión :discussion',
        'mention' => ':user te mencionó en :discussion',
    ],

    'profile' => [
        'likes' => 'Likes',
        'posts' => 'Mensajes',
        'discussions' => 'Discusiones',

        'information' => 'Información',
        'edit' => 'Editar perfil',

        'location' => 'Ubicación',
        'website' => 'Sitio web',
        'about' => 'Acerca de',
        'signature' => 'Firma',
        'registered' => 'Registrado',
        'last_seen' => 'Última vista',
        'display_last_seen' => 'Mostrar última visita',
    ],
];
