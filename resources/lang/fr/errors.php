<?php

return [
    'error' => 'Erreur',
    'home' => 'Page d\'accueil',
    'whoops' => 'Whoops !',

    '401' => [
        'title' => 'Non autorisé',
        'message' => 'Unauthorized',
    ],
    '403' => [
        'title' => 'Accès interdit',
        'message' => 'Forbidden',
    ],
    '404' => [
        'title' => 'Page non trouvée',
        'message' => 'Not Found',
    ],
    '419' => [
        'title' => 'Page expirée',
        'message' => 'Page Expired',
    ],
    '429' => [
        'title' => 'Trop de requêtes',
        'message' => 'Too Many Requests',
    ],
    '500' => [
        'title' => 'Erreur interne',
        'message' => 'Server Error',
    ],
    '503' => [
        'title' => 'Service indisponible',
        'message' => 'Service Unavailable',
    ],

    'fallback' => [
        'message' => 'An error occurred. HTTP code: :code',
    ],
];
