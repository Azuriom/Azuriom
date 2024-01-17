<?php

return [
    'error' => 'Error',
    'code' => 'Error :code',
    'home' => 'Volver al inicio',
    'whoops' => '¡Whoops!',

    '401' => [
        'title' => 'No autorizado',
        'message' => 'No está autorizado a acceder a esta página.',
    ],
    '403' => [
        'title' => 'Prohibido',
        'message' => 'Se le prohíbe acceder a esta página.',
    ],
    '404' => [
        'title' => 'No se encuentra',
        'message' => 'La página que está buscando no se ha podido encontrar.',
    ],
    '419' => [
        'title' => 'Página expirada',
        'message' => 'Su sesión ha expirado. Por favor, refresque e intente de nuevo.',
    ],
    '429' => [
        'title' => 'Demasiadas solicitudes',
        'message' => 'Estás haciendo demasiadas peticiones a nuestros servidores. Por favor, inténtelo de nuevo más tarde.',
    ],
    '500' => [
        'title' => 'Error del servidor',
        'message' => 'Whoops, algo salió mal en nuestros servidores. Por favor, inténtelo de nuevo más tarde.',
    ],
    '503' => [
        'title' => 'El servicio no está disponible',
        'message' => 'Estamos haciendo un poco de mantenimiento. Por favor, vuelva pronto.',
    ],

    'fallback' => [
        'message' => 'Ha ocurrido un error. Por favor, inténtalo de nuevo.',
    ],
];
