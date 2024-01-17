<?php

return [

    'nav' => [
        'settings' => 'Ajustes',
        'forums' => 'Foros',
        'tags' => 'Etiquetas',
    ],

    'settings' => [
        'title' => 'Configuración del foro',
        'home_message' => 'Mensaje de inicio',
        'webhook' => 'URL del Webhook de Discord',
        'webhook_info' => 'Se enviará una notificación a este webhook cuando se publique un nuevo mensaje. Dejar en blanco para desactivar',
    ],

    'categories' => [
        'title' => 'Categorías',
        'edit' => 'Editar categoría :category',
        'create' => 'Crear categoría',

        'delete_error' => 'Esta categoría contiene foros y no puede ser eliminada.',
    ],

    'forums' => [
        'title' => 'Foros',
        'create' => 'Crear foro',
        'edit' => 'Editar foro :forum',

        'create_category' => 'Crear categoría',
        'create_forum' => 'Crear foro',

        'parent' => 'Foro padre',
        'restricted' => 'Restringir el acceso a este foro sólo a ciertos roles',
        'default_tags' => 'Etiquetas predeterminadas',
        'lock' => 'Bloquea este foro',
        'lock_info' => 'Los usuarios que no son administradores no podrán crear discusiones.',
        'private' => 'Foro privado',
        'private_info' => 'Los usuarios sólo pueden ver sus propias discusiones y fijas.',

        'updated' => 'Orden de los foros actualizado.',
        'delete_error' => 'Un foro con discusiones o subforos no puede ser eliminado.',
    ],

    'discussions' => [
        'card' => 'Discusiones en el foro',
    ],

    'posts' => [
        'card' => 'Mensajes del foro',

        'recent' => 'Mensajes recientes en casa',
        'delay' => 'Retraso entre publicaciones',
        'seconds' => 'segundos',
    ],

    'tags' => [
        'title' => 'Etiquetas',
        'create' => 'Crear una etiqueta',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Discusión eliminada #:id',
            'pinned' => 'Discusión fijada#:id',
            'unpinned' => 'Discusión sin fijar #:id',
            'locked' => 'Discusión bloqueada #:id',
            'unlocked' => 'Discusión desbloqueada #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Publicación eliminada #:id',
        ],

        'forum-categories' => [
            'created' => 'Categoría del foro creada #:id',
            'updated' => 'Categoría de foro actualizada #:id',
            'deleted' => 'Categoría de foro eliminada #:id',
        ],

        'forum-forums' => [
            'created' => 'Foro creado #:id',
            'updated' => 'Foro actualizado #:id',
            'deleted' => 'Foro eliminado #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Administrar foros y categorías',
        'discussions' => 'Ver y gestionar los debates del foro (mover, editar, borrar, fijar, bloquear)',
        'private' => 'Ver discusiones de otros usuarios en foros privados',
        'delete_own_posts' => 'Eliminar los mensajes propios del foro',
        'locked' => 'Crear una discusión en un foro bloqueado'
    ],
];
