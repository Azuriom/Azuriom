<?php

return [
    'error' => 'Błąd',
    'code' => 'Błąd :code',
    'home' => 'Powrót do strony głównej',
    'whoops' => 'Ups!',

    '401' => [
        'title' => 'Nieautoryzowany',
        'message' => 'Nie masz wystarczających uprawnień, aby uzyskać dostęp do tej strony.',
    ],
    '403' => [
        'title' => 'Zbanowany',
        'message' => 'Nie masz dostępu do tej strony.',
    ],
    '404' => [
        'title' => 'Nie znaleziono',
        'message' => 'Nie znaleziono strony, której szukasz.',
    ],
    '419' => [
        'title' => 'Strona wygasła',
        'message' => 'Twoja sesja wygasła. Odśwież i spróbuj ponownie.',
    ],
    '429' => [
        'title' => 'Zbyt dużo próśb',
        'message' => 'Wysyłasz zbyt wiele żądań do naszych serwerów. Spróbuj ponownie później.',
    ],
    '500' => [
        'title' => 'Błąd Serwera',
        'message' => 'Ups, coś poszło nie tak na naszych serwerach. Spróbuj ponownie później.',
    ],
    '503' => [
        'title' => 'Serwis Niedostępny',
        'message' => 'Robimy przerwę techniczną. Zapraszamy wkrótce.',
    ],

    'fallback' => [
        'message' => 'Wystąpił błąd. Proszę spróbuj ponownie.',
    ],
];
