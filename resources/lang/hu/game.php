<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Használd a <code>{name}</code> -et a felhasználónév, a <code>{steam_id}</code> -t a SteamID és a <code>{steam_id_32}</code> a SteamID 32 behelyettesítésére.',
    ],

    'xbox' => [
        'missing' => 'Ez a Microsoft-fiók nem rendelkezik Xbox-profillal.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Ennek az Xbox-fióknak nincs Minecraft-profilja.',
        'child' => 'This account is a child (under 18) and must be added to a family by an adult in order to login.',
        'commands' => 'Használd a <code>{name}</code> -et a játékos felhasználóneve és a <code>{uuid}</code> -t a játékos UUID-ja helyettesítésére',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Használd a <code>{name}</code> -et a játékos felhasználóneve és a <code>{xuid}</code> -t a játékos XUID-ja helyettesítéséhez',
    ],
];
