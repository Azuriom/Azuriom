<?php

return [
    'error' => 'Erreur',
    'code' => 'Erreur :code',
    'home' => 'Accueil',
    'whoops' => 'Oups !',

    '401' => [
        'title' => 'Non autorisé',
        'message' => 'Vous n\'êtes pas autorisé à accéder à cette page.',
    ],
    '403' => [
        'title' => 'Accès interdit',
        'message' => 'Vous n\'avez pas la permission d\'accéder à cette page.',
    ],
    '404' => [
        'title' => 'Page non trouvée',
        'message' => 'La page que vous cherchez n\'a pas pu être trouvée.',
    ],
    '419' => [
        'title' => 'Page expirée',
        'message' => 'Votre session est expirée. Veuillez rafraîchir la page et réessayer.',
    ],
    '429' => [
        'title' => 'Trop de requêtes',
        'message' => 'Vous envoyez trop de requêtes à nos serveurs. Veuillez réessayer plus tard.',
    ],
    '500' => [
        'title' => 'Erreur interne',
        'message' => 'Oups, une erreur interne est survenue. Veuillez réessayer plus tard.',
    ],
    '503' => [
        'title' => 'Service indisponible',
        'message' => 'Nous sommes actuellement en maintenance. Veuillez réessayer plus tard.',
    ],

    'fallback' => [
        'message' => 'Une erreur s\'est produite. Veuillez réessayer.',
    ],
];
