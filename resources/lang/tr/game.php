<?php

return [
    'steam' => [
        'id' => 'SteamID 64',
        'commands' => 'Oyuncu kullanıcı adı için <code>{name}</code> komutunu, oyuncu SteamID 64\'ü için <code>{steam_id} ve oyuncu SteamID 32\'si için <code>{steam_id_32}</code> komutlarını kullanabilirsiniz.',
    ],

    'xbox' => [
        'missing' => 'Bu Microsoft hesabının bir Xbox profili yok.',
    ],

    'minecraft' => [
        'id' => 'UUID',
        'missing' => 'Bu Xbox hesabının bir Minecraft profili yok.',
        'child' => 'Bu hesap bir çocuktur (18 yaş altı) ve giriş yapabilmek için bir yetişkin tarafından bir aileye eklenmelidir.',
        'commands' => '<code>{name}</code> kodunu oyuncu kullanıcı adı için ve <code>{uuid}</code> kodunu oyuncu UUID için kullanabilirsin',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => '<code>{name}</code> kodunu oyuncu kullanıcı adı için ve <code>{xuid}</code> kodunu oyuncu XUID için kullanabilirsin',
    ],
];
