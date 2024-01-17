<?php

return [
    'error' => 'Fehler',
    'code' => 'Fehler :code',
    'home' => 'Zurück zur Startseite',
    'whoops' => 'Hoppla!',

    '401' => [
        'title' => 'Unautorisiert',
        'message' => 'Du bist nicht autorisiert auf diese Seite zuzugreifen.',
    ],
    '403' => [
        'title' => 'Verboten',
        'message' => 'Der Zugriff auf diese Seite ist Ihnen untersagt.',
    ],
    '404' => [
        'title' => 'Nicht gefunden',
        'message' => 'Die gesuchte Seite wurde nicht gefunden.',
    ],
    '419' => [
        'title' => 'Seite erloschen',
        'message' => 'Deine Sitzung ist abgelaufen. Bitte aktualisieren und erneut versuchen.',
    ],
    '429' => [
        'title' => 'Zu viele Anfragen',
        'message' => 'Du stellst zu viele Anfragen an unsere Server. Bitte versuche es später noch einmal.',
    ],
    '500' => [
        'title' => 'Serverfehler',
        'message' => 'Hoppla, auf unseren Servern ist etwas schief gelaufen. Bitte versuche es später noch einmal.',
    ],
    '503' => [
        'title' => 'Server nicht verfügbar',
        'message' => 'Wir führen einige Wartungsarbeiten. Bitte schaue bald wieder vorbei.',
    ],

    'fallback' => [
        'message' => 'Ein Fehler ist aufgetreten. Bitte versuche es erneut.',
    ],
];
