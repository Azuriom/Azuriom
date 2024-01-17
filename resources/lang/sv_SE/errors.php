<?php

return [
    'error' => 'Fel',
    'code' => 'Fel :code',
    'home' => 'Tillbaka till hemmet',
    'whoops' => 'Hoppsan!',

    '401' => [
        'title' => 'Obehörig',
        'message' => 'Du har inte behörighet att komma åt denna sida.',
    ],
    '403' => [
        'title' => 'Förbjuden',
        'message' => 'Du är förbjuden att komma åt den här sidan.',
    ],
    '404' => [
        'title' => 'Hittades inte',
        'message' => 'Sidan du letar efter kunde inte hittas.',
    ],
    '419' => [
        'title' => 'Sidan har löpt ut',
        'message' => 'Din session har gått ut. Ladda om sidan och försök igen.',
    ],
    '429' => [
        'title' => 'För många förfrågningar',
        'message' => 'Du gör för många förfrågningar till våra servrar. Försök igen senare.',
    ],
    '500' => [
        'title' => 'Serverfel',
        'message' => 'Hoppsan, något gick fel på våra servrar. Försök igen senare.',
    ],
    '503' => [
        'title' => 'Tjänst inte tillgänglig',
        'message' => 'Vi håller på med underhåll. Vänligen kom tillbaka snart.',
    ],

    'fallback' => [
        'message' => 'Ett fel uppstod. Försök igen.',
    ],
];
