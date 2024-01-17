<?php

return [
    'title' => 'Stöd',

    'fields' => [
        'subject' => 'Ämne',
        'category' => 'Kategori',
        'ticket' => 'Biljett',
        'comment' => 'Kommentarer',
    ],

    'actions' => [
        'create' => 'Öppna ett nytt ärende',
        'reopen' => 'Återöppna',
        'close' => 'Stäng',
    ],

    'state' => [
        'open' => 'Öppna',
        'closed' => 'Stängd',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => 'Detta ärende är stängt.',

        'open' => 'Öppna ett ärende',

        'notification' => 'Nytt svar på ditt supportärende.',

        'info' => '<strong>:author</strong> skapade detta ärende i kategorin <strong>:category</strong> :date.',
    ],

    'webhook' => [
        'ticket' => 'Nytt ärende på supporten',
        'comment' => 'Ny kommentar på stödet',
        'closed' => 'Ärendet stängt',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Nytt svar på ditt supportärende',
            'message' => 'Hej :user, ditt supportärende #:id fick ett nytt svar från :author.',
            'view' => 'Visa ärendet',
        ],
    ],

    'days' => 'days',
];
