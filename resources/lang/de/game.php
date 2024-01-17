<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Du kannst <code>{name}</code> für den Spielernamen verwenden, <code>{steam_id}</code> für den Spieler SteamID 64 und <code>{steam_id_32}</code> für den Spieler SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'Dieses Microsoft-Konto hat kein Xbox-Profil.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Dieses Xbox-Konto hat kein Minecraft-Profil.',
        'child' => 'Dieses Konto ist ein Kind (unter 18) und muss von einem Erwachsenen zu einer Familie hinzugefügt werden, um sich einzuloggen.',
        'commands' => 'Du kannst <code>{name}</code> für den Spielernamen und <code>{uuid}</code> für die UUID des Spielers verwenden',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Du kannst <code>{name}</code> für den Spielernamen und <code>{xuid}</code> für den Spieler XUID verwenden',
    ],
];
