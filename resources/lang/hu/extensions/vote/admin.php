<?php

return [
    'nav' => [
        'title' => 'Szavazás',
        'settings' => 'Beállítások',
        'sites' => 'Weboldalak',
        'rewards' => 'Jutalmak',
        'votes' => 'Szavazatok',
    ],

    'permission' => 'Szavazás plugin kezelése',

    'settings' => [
        'title' => 'Szavazás oldal beállítások',

        'count' => 'Legjobb játékosok száma',
        'display-rewards' => 'Jutalmak mutatása a szavazás oldalon',
        'ip_compatibility' => 'IPv4/IPv6 kompatibilitás engedélyezése',
        'ip_compatibility_info' => 'Ez a lehetőség lehetővé teszi, hogy javítsa azokat a szavazatokat, amelyeket nem hitelesítettek olyan szavazóhelyeken, amelyek nem fogadják el az IPv6-ot, míg az weboldalod elfogadja, vagy fordítva.',
        'commands' => 'Globális parancsok',
    ],

    'sites' => [
        'title' => 'Weboldalak',
        'edit' => ':site oldal szerkesztése',
        'create' => 'Oldal létrehozása',

        'enable' => 'Oldal engedélyezése',
        'delay' => 'Szavazások közötti késleltetés',
        'minutes' => 'perc',

        'list' => 'A szavazatok ellenőrzésére szolgáló oldalak',
        'variable' => 'A <code>{player}</code> használatával használhatod a játékos nevét.',

        'verifications' => [
            'title' => 'Hitelesítés',
            'enable' => 'Szavazások ellenőrzése engedélyezése',

            'disabled' => 'Az ezen a weboldalon leadott szavazatokat nem ellenőrzik.',
            'auto' => 'A szavazatokat ezen az oldalon automatikusan ellenőrzik.',
            'input' => 'Az ezen a weboldalon leadott szavazatok akkor lesznek ellenőrizve, ha az alábbi bejegyzések kitöltésre kerülnek.',

            'pingback' => 'Pingback URL: :url',
            'secret' => 'Titkos (Secret) kulcs',
            'server_id' => 'Szerver azonosító',
            'token' => 'Token',
            'api_key' => 'API kulcs',
        ],
    ],

    'rewards' => [
        'title' => 'Jutalmak',
        'edit' => ':reward jutalom szerkesztése',
        'create' => 'Jutalom létrehozása',

        'require_online' => 'Parancsok végrehajtása, amikor a felhasználó online van a szerveren (csak AzLink esetén elérhető)',
        'enable' => 'Jutalom engedélyezése',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => 'Szavazatok',

        'empty' => 'Nincs szavazat a hónapban.',
        'votes' => 'Szavazatok száma',
        'month' => 'Szavazatok száma a hónapban',
        'week' => 'Szavazatok száma a héten',
        'day' => 'Szavazatok száma ma',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => '#:id szavazási oldal létrehozva',
            'updated' => '#:id szavazási oldal frissítve',
            'deleted' => '#:id szavazási oldal törölve',
        ],

        'vote-rewards' => [
            'created' => '#:id szavazási jutalom létrehozva',
            'updated' => '#:id szavazási jutalom frissítve',
            'deleted' => '#:id szavazási jutalom törölve',
        ],
    ],
];
