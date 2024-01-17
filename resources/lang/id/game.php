<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Kamu dapat menggunakan <code>{name}</code> untuk nama pengguna pemain, <code>{steam_id}</code> untuk pemain SteamID 64 dan <code>{steam_id_32}</code> untuk pemain SteamID 32.',
    ],

    'xbox' => [
        'missing' => 'Akun Microsoft ini tidak mempunyai profil Xbox.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Akun Xbox ini tidak mempunyai profil Minecraft.',
        'child' => 'This account is a child (under 18) and must be added to a family by an adult in order to login.',
        'commands' => 'Kamu dapat menggunakan <code>{name}</code> untuk nama pengguna pemain dan <code>{uuid}</code> untuk pemain UUID',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Kamu dapat menggunakan <code>{name}</code> untuk nama pengguna pemain dan <code>{xuid}</code> untuk pemain XUID',
    ],
];
