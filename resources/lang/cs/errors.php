<?php

return [
    'error' => 'Chyba',
    'code' => 'Chyba :error',
    'home' => 'Zpět na úvodní stránku',
    'whoops' => 'Jejda!',

    '401' => [
        'title' => 'Neoprávněný přístup',
        'message' => 'Nemáte dostatečná práva pro zobrazení této stránky.',
    ],
    '403' => [
        'title' => 'Zakázáno',
        'message' => 'Máte zakázaný vstup na tuto stránku.',
    ],
    '404' => [
        'title' => 'Nenalezeno',
        'message' => 'Stránka, kterou hledáte, nebyla nalezena.',
    ],
    '419' => [
        'title' => 'Stránka vypršela',
        'message' => 'Platnost vaší relace vypršela. Načtěte znovu stránku a zkuste to znovu.',
    ],
    '429' => [
        'title' => 'Příliš mnoho požadavků',
        'message' => 'Na naše servery máte příliš mnoho požadavků. Opakujte akci později.',
    ],
    '500' => [
        'title' => 'Chyba serveru',
        'message' => 'Jejda, něco se pokazilo na našich serverech. Zkuste to znovu později.',
    ],
    '503' => [
        'title' => 'Služba nedostupná',
        'message' => 'Provádíme nějakou údržbu. Zkuste to prosím později.',
    ],

    'fallback' => [
        'message' => 'Došlo k chybě. Zkuste to prosím znovu.',
    ],
];
