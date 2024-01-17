<?php

return [
    'title' => 'Soporte',

    'fields' => [
        'subject' => 'Asunto',
        'category' => 'Categoría',
        'ticket' => 'Ticket',
        'comment' => 'Comentario',
    ],

    'actions' => [
        'create' => 'Abrir un nuevo ticket',
        'reopen' => 'Volver a abrir',
        'close' => 'Marcar como resuelto',
    ],

    'state' => [
        'open' => 'Pendiente',
        'closed' => 'Resuelto',
        'replied' => 'Respondido',
    ],

    'tickets' => [
        'closed' => 'Éste ticket ya ha sido resuelto.',

        'open' => 'Abrir un ticket',

        'notification' => 'Has recibido una respuesta en tu ticket de ayuda.',

        'info' => '<strong>:author</strong> creó este ticket en la categoría <strong>:category</strong> el :date.',
    ],

    'webhook' => [
        'ticket' => 'Ticket abierto',
        'comment' => 'Hay nuevas respuestas a un ticket',
        'closed' => 'Ticket cerrado',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Has recibido una respuesta en tu ticket de ayuda',
            'message' => 'Hola :user, tu ticket de soporte #:id obtuvo una nueva respuesta de :author.',
            'view' => 'Ver el ticket',
        ],
    ],

    'days' => 'días',
];
