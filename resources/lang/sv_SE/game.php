<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Du kan använda <code>{name}</code> för spelarens användarnamn, <code>{steam_id}</code> för spelaren SteamID 64 och <code>{steam_id_32}</code> för spelaren SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'Detta Microsoft-konto har ingen Xbox-profil.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Det här Xbox-kontot har ingen Minecraft-profil.',
        'child' => 'Detta konto är ett barn (under 18) och måste läggas till i en familj av en vuxen för att kunna logga in.',
        'commands' => 'Du kan använda <code>{name}</code> för spelarens användarnamn och <code>{uuid}</code> för spelaren UUID',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Du kan använda <code>{name}</code> för spelarens användarnamn och <code>{xuid}</code> för spelaren UUID',
    ],
];
