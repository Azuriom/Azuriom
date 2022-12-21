<?php

return [
    'steam' => [
        'id' => 'SteamID',
        'commands' => 'You can use <code>{name}</code> for the player username, <code>{steam_id}</code> for the player SteamID 64 and <code>{steam_id_32}</code> for the player SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'This Microsoft account doesn\'t have a Xbox profile.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'This Xbox account doesn\'t have a Minecraft profile.',
        'child' => 'This account is a child (under 18) and must be added to a family by an adult in order to login.',
        'commands' => 'You can use <code>{name}</code> for the player username and <code>{uuid}</code> for the player UUID',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'You can use <code>{name}</code> for the player username and <code>{xuid}</code> for the player XUID',
    ],
];
