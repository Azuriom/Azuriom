<?php

return [
    'steam' => [
        'id' => 'SteamID',
        'commands' => 'Pot utilitzar <code>{name}</code> pel nom d\'usuari, <code>{steam_id}</code> pel SteamID 64 del jugador, i <code>{steam_id_32}</code> pel SteamID 32 del jugador.',
    ],

    'xbox' => [
        'missing' => 'Aquest compte Microsoft no té perfil Xbox.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Aquest compte Xbox no té perfil Minecraft.',
        'commands' => 'Pot utilitzar <code>{name}</code> pel nom d\'usuari del jugador, i <code>{uuid}</code> pel UUID del jugador',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Pot utilitzar <code>{name}</code> pel nom d\'usuari del jugador, i <code>{xuid}</code> pel XUID del jugador',
    ],
];
