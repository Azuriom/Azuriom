<?php

return [
    'title' => 'Segítségnyújtás',

    'fields' => [
        'subject' => 'Tárgy',
        'category' => 'Kategória',
        'ticket' => 'Jegy',
        'comment' => 'Hozzászólás',
    ],

    'actions' => [
        'create' => 'Új jegy megnyitása',
        'reopen' => 'Újranyit',
        'close' => 'Bezárás',
    ],

    'state' => [
        'open' => 'Megnyit',
        'closed' => 'Zárt',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => 'Ez a jegy zárolva van.',

        'open' => 'Új jegy megnyitása',

        'notification' => 'Új válasz a segítségnyújtás jegyre.',

        'info' => '<strong>:author</strong> létrehozott egy új jegyet a(z) <strong>:category</strong> kategóriában :date -én/-án.',
    ],

    'webhook' => [
        'ticket' => 'Új jegy a segítségnyújtáson',
        'comment' => 'Új megjegyzés a segítségnyújtáson',
        'closed' => 'Jegy lezárva',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Új válasz a segítségnyújtás jegyre',
            'message' => 'Helló :user, a(z) #:id számú segítségnyújtás jegyedre új válasz érkezett :author-tól.',
            'view' => 'Jegy megtekintése',
        ],
    ],

    'days' => 'days',
];
