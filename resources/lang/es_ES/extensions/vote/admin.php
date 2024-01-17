<?php

return [
    'nav' => [
        'title' => 'Votar',
        'settings' => 'Ajustes',
        'sites' => 'Sitios',
        'rewards' => 'Recompensas',
        'votes' => 'Votos',
    ],

    'permission' => 'Administrar el plugin de votos',

    'settings' => [
        'title' => 'Configuración de la página de votaciones',

        'count' => 'Podio de votaciones',
        'display-rewards' => 'Mostrar recompensas en la página de votacioes',
        'ip_compatibility' => 'Habilitar compatibilidad con IPv4/IPv6',
        'ip_compatibility_info' => 'Esta opción le permite corregir los votos que no están verificados en sitios de votación que no aceptan IPv6 mientras que su sitio lo hace, o viceversa.',
        'commands' => 'Comandos globales',
    ],

    'sites' => [
        'title' => 'Sitios',
        'edit' => 'Editar espacio :site',
        'create' => 'Crear espacio',

        'enable' => 'Habilitar el sitio',
        'delay' => 'Tiempo de espera entre votos',
        'minutes' => 'minutos',

        'list' => 'Sitios en los que se pueden verificar los votos',
        'variable' => 'Puedes usar <code>{player}</code> para usar el nombre del jugador.',

        'verifications' => [
            'title' => 'Verificación',
            'enable' => 'Habilitar la verificación de los votos',

            'disabled' => 'Los votos en este sitio web no serán verificados.',
            'auto' => 'Los votos en este sitio se verificarán automáticamente.',
            'input' => 'Los votos en este sitio web serán verificados cuando se llene la entrada a continuación.',

            'pingback' => 'URL de Pingback: :url',
            'secret' => 'Clave secreta',
            'server_id' => 'ID del servidor',
            'token' => 'Token',
            'api_key' => 'Clave API',
        ],
    ],

    'rewards' => [
        'title' => 'Recompensas',
        'edit' => 'Editar recompensa :reward',
        'create' => 'Crear recompensa',

        'require_online' => 'Ejecutar comandos cuando el usuario está conectado en el servidor (sólo disponible con AzLink)',
        'enable' => 'Habilitar recompensa',

        'commands' => 'Puedes usar <code>{player}</code> para usar el nombre del jugador, <code>{reward}</code> por el nombre de la recompensa y <code>{site}</code> por el sitio web de votación. Para los juegos de Steam, también puedes usar <code>{steam_id}</code> y <code>{steam_id_32}</code>. El comando no debe comenzar con <code>/</code>.',
        'monthly' => 'Clasificación de usuarios a los que dar esta recompensa al final del mes',
        'monthly_info' => 'Dar automáticamente esta recompensa, a finales de mes, a los usuarios en las posiciones dadas en la clasificación de los mejores votantes.',
        'cron' => 'Debes configurar tareas CRON para usar recompensas automáticas al final del mes.',
    ],

    'votes' => [
        'title' => 'Votos',

        'empty' => 'No hay votos para éste mes.',
        'votes' => 'Número de votos',
        'month' => 'Número de votos en este mes',
        'week' => 'Número de votos en esta semana',
        'day' => 'Número de votos de hoy',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Sitio de voto creado #:id',
            'updated' => 'Sitio de votación actualizado #:id',
            'deleted' => 'Sitio de voto eliminado #:id',
        ],

        'vote-rewards' => [
            'created' => 'Recompensa de voto creada #:id',
            'updated' => 'Recompensa de voto actualizado #:id',
            'deleted' => 'Recompensa de voto eliminada #:id',
        ],
    ],
];
