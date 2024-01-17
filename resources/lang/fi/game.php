<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Voit käyttää <code>{name}</code> pelaajan käyttäjänimeä, <code>{steam_id}</code> pelaajalle SteamID 64 ja <code>{steam_id_32}</code> pelaajalle SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'Tällä Microsoft-tilillä ei ole Xbox profiilia.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Tällä Xbox-tilillä ei ole Minecraft-profiilia.',
        'child' => 'This account is a child (under 18) and must be added to a family by an adult in order to login.',
        'commands' => 'Voit käyttää pelaajan käyttäjänimeä <code>{name}</code> ja pelaajan UUID <code>{uuid}</code>',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Voit käyttää pelaajan käyttäjänimeä <code>{name}</code> ja pelaajan UUID <code>{xuid}</code>',
    ],
];
