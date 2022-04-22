<?php

return [
    'error' => 'Error',
    'code' => 'Error :code',
    'home' => 'Tornar a l\'inici',
    'whoops' => 'Vaja!',

    '401' => [
        'title' => 'No autoritzat',
        'message' => 'No teniu permís per accedir a aquesta pàgina.',
    ],
    '403' => [
        'title' => 'Prohibit',
        'message' => 'No teniu accés per accedir a aquesta pàgina.',
    ],
    '404' => [
        'title' => 'No trobat',
        'message' => 'No hem pogut trobar la pàgina que cerqueu.',
    ],
    '419' => [
        'title' => 'Pàgina caducada',
        'message' => 'La seva sessió ha caducat. Si us plau, accedeixi de nou.',
    ],
    '429' => [
        'title' => 'Massa soŀlicituds',
        'message' => 'Esteu fent massa sol·licituds als nostres servidors. Si us plau, intenta-ho més tard.',
    ],
    '500' => [
        'title' => 'Error del Servidor',
        'message' => 'S\'ha produït un error en la vostra sol·licitud. Si us plau, intenteu-ho més tard.',
    ],
    '503' => [
        'title' => 'Servei no disponible',
        'message' => 'Estem fent manteniment. Torneu a comprovar aviat.',
    ],

    'fallback' => [
        'message' => 'Hi ha hagut un error. Siusplau torna-ho a provar.',
    ],
];
