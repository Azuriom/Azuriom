<?php

return [
    'title' => 'Tuki',

    'fields' => [
        'subject' => 'Aihe',
        'category' => 'Kategoria',
        'ticket' => 'Tukipyyntö',
        'comment' => 'Kommentoi',
    ],

    'actions' => [
        'create' => 'Luo uusi tukipyyntö',
        'reopen' => 'Avaa uudelleen',
        'close' => 'Sulje',
    ],

    'state' => [
        'open' => 'Avaa',
        'closed' => 'Suljettu',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => 'Tämä tukipyyntö on suljettu.',

        'open' => 'Uusi tukipyyntö',

        'notification' => 'Uusi vastaus tukipyyntöösi.',

        'info' => '<strong>:author</strong> loi tämän tukipyynnön kategoriaan <strong>:category</strong> :date.',
    ],

    'webhook' => [
        'ticket' => 'Uusi tukipyyntö',
        'comment' => 'Uusi kommenti tuessa',
        'closed' => 'Tukipyyntö suljettu',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Uusi vastaus tukipyyntöösi',
            'message' => 'Hei :user, tukipyyntösi #:id sai uuden vastauksen käyttäjältä :author.',
            'view' => 'Näytä tukipyyntö',
        ],
    ],

    'days' => 'days',
];
