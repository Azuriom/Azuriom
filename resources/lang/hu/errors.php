<?php

return [
    'error' => 'Hiba',
    'code' => 'Hibakód :code',
    'home' => 'Vissza a főoldalra',
    'whoops' => 'Hoppá!',

    '401' => [
        'title' => 'Jogosulatlan hozzáférés',
        'message' => 'Nincs jogod az oldal megtekintéséhez.',
    ],
    '403' => [
        'title' => 'Nem engedélyezett',
        'message' => 'Nincs engedélyed az oldal megtekintéséhez.',
    ],
    '404' => [
        'title' => 'Nem található',
        'message' => 'A keresett oldal nem található.',
    ],
    '419' => [
        'title' => 'Oldal lejárt',
        'message' => 'A munkamenet lejárt. Frissítsd az oldalt és próbáld újra.',
    ],
    '429' => [
        'title' => 'Túl sok kérés',
        'message' => 'Túl sok kérést kapunk tőled. Kérlek, próbáld újra később.',
    ],
    '500' => [
        'title' => 'Szerverhiba',
        'message' => 'Ajjaj! Hiba történt. Kérjük, próbálkozz később.',
    ],
    '503' => [
        'title' => 'A szolgáltatás nem érhető el',
        'message' => 'Karbantartást végzünk. Kérlek, nézz vissza később.',
    ],

    'fallback' => [
        'message' => 'Hiba lépett fel. Kérlek, próbáld újra.',
    ],
];
