<?php

return [
    'steam' => [
        'id' => 'SteamID',
        'commands' => 'Vous pouvez utiliser <code>{name}</code> pour le pseudo du joueur, <code>{steam_id}</code> pour le SteamID du joueur et <code>{steam_id_32}</code> pour le SteamID 32 du joueur.',
    ],

    'xbox' => [
        'missing' => 'Ce compte Microsoft ne possède pas de compte Xbox.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Ce compte Xbox ne possède pas de profile Minecraft.',
        'child' => 'Ce compte est un enfant (moins de 18 ans) et doit être ajouté à une famille par un adulte pour pouvoir se connecter.',
        'commands' => 'Vous pouvez utiliser <code>{name}</code> pour le pseudo du joueur et <code>{uuid}</code> pour l\'UUID du joueur.',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Vous pouvez utiliser <code>{name}</code> pour le pseudo du joueur et <code>{xuid}</code> pour l\'XUID du joueur.',
    ],
];
