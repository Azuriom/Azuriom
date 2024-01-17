<?php

return [
    'error' => 'Virhe',
    'code' => 'Virhe :code',
    'home' => 'Takaisin kotisivulle',
    'whoops' => 'Hups!',

    '401' => [
        'title' => 'Ei sallittu',
        'message' => 'Sinulla ei ole käyttöoikeutta tälle sivulle.',
    ],
    '403' => [
        'title' => 'Estetty',
        'message' => 'Sinulta on kielletty pääsy tälle sivulle.',
    ],
    '404' => [
        'title' => 'Ei löytynyt',
        'message' => 'Etsimääsi sivua ei löytynyt.',
    ],
    '419' => [
        'title' => 'Sivu vanhentunut',
        'message' => 'Istuntosi on vanhentunut. Ole hyvä ja päivitä sivu.',
    ],
    '429' => [
        'title' => 'Liian monta pyyntöä',
        'message' => 'Olet tekemässä liikaa pyyntöjä palvelimmillemme. Yritä myöhemmin uudelleen.',
    ],
    '500' => [
        'title' => 'Palvelinvirhe',
        'message' => 'Hups! Jokin meni vikaan. Yritä myöhemmin uudelleen.',
    ],
    '503' => [
        'title' => 'Palvelu ei ole käytettävissä',
        'message' => 'Teemme huoltotöitä sivustollamme. Tule takaisin myöhemmin.',
    ],

    'fallback' => [
        'message' => 'Tapahtui virhe. Yritä myöhemmin uudelleen.',
    ],
];
