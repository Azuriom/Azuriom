<?php

return [
    'nav' => [
        'title' => 'Votar',
        'settings' => 'Configuració',
        'sites' => 'Llocs web',
        'rewards' => 'Recompenses',
        'votes' => 'Vots',
    ],

    'permission' => 'Manage vote plugin',

    'settings' => [
        'title' => 'Configuració de la pàgina de vots',

        'count' => 'Total Jugadors top',
        'display-rewards' => 'Mostrar recompenses en la pàgina de vots',
        'ip_compatibility' => 'Enable IPv4/IPv6 compatibility',
        'ip_compatibility_info' => 'This option allows you to correct votes that are not verified on voting sites that don\'t accept IPv6 while your site does, or vice versa.',
        'commands' => 'Global commands',
    ],

    'sites' => [
        'title' => 'Llocs web',
        'edit' => 'Edit site :site',
        'create' => 'Crear lloc',

        'enable' => 'Activar el lloc',
        'delay' => 'Retard entre vots',
        'minutes' => 'minuts',

        'list' => 'Sites on which votes can be verified',
        'variable' => 'You can use <code>{player}</code> to use the player name.',

        'verifications' => [
            'title' => 'Verificació',
            'enable' => 'Activa la verificació de vots',

            'disabled' => 'The votes on this website will not be verified.',
            'auto' => 'The votes on this site will be automatically verified.',
            'input' => 'The votes on this website will be verified when the input below is filled.',

            'pingback' => 'Pingback URL: :url',
            'secret' => 'Clau Secreta',
            'server_id' => 'ID del servidor',
            'token' => 'Token',
            'api_key' => 'Clau API',
        ],
    ],

    'rewards' => [
        'title' => 'Recompenses',
        'edit' => 'Modificar recompensa :reward',
        'create' => 'Crear recompensa',

        'require_online' => 'Execute commands when the user is online on the server (only available with AzLink)',
        'enable' => 'Habilitar la recompensa',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => 'Vots',

        'empty' => 'Sense vots aquest mes.',
        'votes' => 'Recompte de vots',
        'month' => 'Votes count this month',
        'week' => 'Votes count this week',
        'day' => 'Votes count today',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Created vote site #:id',
            'updated' => 'Updated vote site #:id',
            'deleted' => 'Deleted vote site #:id',
        ],

        'vote-rewards' => [
            'created' => 'Created vote reward #:id',
            'updated' => 'Updated vote reward #:id',
            'deleted' => 'Deleted vote reward #:id',
        ],
    ],
];
