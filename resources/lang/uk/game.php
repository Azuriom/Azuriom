<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Ви можете використовувати <code>{name}</code> для імені гравця, <code>{steam_id}</code> для SteamID 64 гравця та <code>{steam_id_32}</code> для SteamID 32 гравця.',
    ],

    'xbox' => [
        'missing' => 'Цей обліковий запис Microsoft не має профілю Xbox.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Цей обліковий запис Xbox не має профілю Minecraft.',
        'child' => 'Цей обліковий запис є дитячим (до 18) і його потрібно додати до сім\'ї для того, щоб увійти.',
        'commands' => 'Ви можете використовувати <code>{name}</code> для користувача та <code>{uuid}</code> для UUID гравця',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'Ви можете використовувати <code>{name}</code> для користувача та <code>{xuid}</code> для XUID гравця',
    ],
];
