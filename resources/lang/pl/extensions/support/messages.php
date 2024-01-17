<?php

return [
    'title' => 'Pomoc',

    'fields' => [
        'subject' => 'Temat',
        'category' => 'Kategoria',
        'ticket' => 'Wątek',
        'comment' => 'Komentarz',
    ],

    'actions' => [
        'create' => 'Otwórz wątek',
        'reopen' => 'Otwórz ponownie',
        'close' => 'Zamknij',
    ],

    'state' => [
        'open' => 'Otwarty',
        'closed' => 'Zamknięty',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => 'Ten wątek jest zamknięty.',

        'open' => 'Otwórz zgłoszenie',

        'notification' => 'Nowa odpowiedź na Twoje zgłoszenie.',

        'info' => '<strong>:author</strong> utworzył to zgłoszenie w kategorii <strong>:category</strong> :date.',
    ],

    'webhook' => [
        'ticket' => 'Nowy wątek na pomocy',
        'comment' => 'Nowy komentarz odnośnie wątku',
        'closed' => 'Zgłoszenie zostało zamknięte',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Nowa odpowiedź na Twoje zgłoszenie',
            'message' => 'Witaj :user, otrzymałeś nową odpowiedź do twojego zgłoszenia #:id od administratora :author.',
            'view' => 'Pokaż wszystkie zgłoszenia',
        ],
    ],

    'days' => 'days',
];
