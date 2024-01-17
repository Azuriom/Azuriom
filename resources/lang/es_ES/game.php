<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Puedes usar <code>{name}</code> para el nombre de usuario, <code>{steam_id}</code> para el jugador SteamID 64 y <code>{steam_id_32}</code> para el jugador SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'Esta cuenta de Microsoft no tiene un perfil Xbox.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Esta cuenta de Xbox no tiene un perfil de Minecraft.',
        'child' => 'Esta cuenta es un niño (menores de 18 años) y debe ser añadida a una familia por un adulto para poder iniciar sesión.',
        'commands' => 'Puedes usar <code>{name}</code> para el nombre de usuario del jugador y <code>{uuid}</code> para el UUID del jugador',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Puedes usar <code>{name}</code> para el nombre de usuario del jugador y <code>{xuid}</code> para el XUID del jugador',
    ],
];
