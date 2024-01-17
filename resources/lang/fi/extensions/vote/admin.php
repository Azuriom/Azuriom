<?php

return [
    'nav' => [
        'title' => 'Äänestä',
        'settings' => 'Asetukset',
        'sites' => 'Sivustot',
        'rewards' => 'Palkinnot',
        'votes' => 'Äänet',
    ],

    'permission' => 'Hallitse äänestys lisä-osaa',

    'settings' => [
        'title' => 'Äänestä sivun asetukset',

        'count' => 'Top pelaajamäärä',
        'display-rewards' => 'Näytä palkinnot äänestys-sivulla',
        'ip_compatibility' => 'Ota IPv4/IPv6 yhteensopivuus käyttöön',
        'ip_compatibility_info' => 'Tämän vaihtoehdon avulla voit korjata äänet, joita ei ole vahvistettu äänestyssivustoilla, jotka eivät hyväksy IPv6 sivuston aikana tai päinvastoin.',
        'commands' => 'Globaalit komennot',
    ],

    'sites' => [
        'title' => 'Sivustot',
        'edit' => 'Muokkaa sivustoa :site',
        'create' => 'Luo sivusto',

        'enable' => 'Ota sivusto käyttöön',
        'delay' => 'Äänestysten välinen viive',
        'minutes' => 'minuuttia',

        'list' => 'Sivustot, joissa äänestykset voidaan tarkistaa',
        'variable' => 'Voit käyttää pelaajan nimeä käyttämällä <code>{player}</code>-komentoa.',

        'verifications' => [
            'title' => 'Vahvistus',
            'enable' => 'Ota äänten vahvistus käyttöön',

            'disabled' => 'Tällä sivustolla annettuja ääniä ei vahvisteta.',
            'auto' => 'Tämän sivuston äänestykset vahvistetaan automaattisesti.',
            'input' => 'Tämän sivuston äänestykset tarkistetaan, kun alla oleva syöte on täytetty.',

            'pingback' => 'Pingback URL: :url',
            'secret' => 'Salainen avain',
            'server_id' => 'Palvelimen ID',
            'token' => 'Tunniste (Token)',
            'api_key' => 'API-avain',
        ],
    ],

    'rewards' => [
        'title' => 'Palkinnot',
        'edit' => 'Muokkaa palkintoa :reward',
        'create' => 'Luo palkinto',

        'require_online' => 'Suorita komentoja, kun käyttäjä on paikalla palvelimella (käytettävissä vain AzLinkin kanssa)',
        'enable' => 'Ota palkinto käyttöön',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => 'Äänet',

        'empty' => 'Ei ääniä tässä kuussa.',
        'votes' => 'Äänten määrä',
        'month' => 'Äänten määrä tässä kuussa',
        'week' => 'Äänten määrä tällä viikolla',
        'day' => 'Äänten määrä tänään',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Luotu äänestyssivusto #:id',
            'updated' => 'Päivitetty äänestyssivusto #:id',
            'deleted' => 'Poistettu äänestyssivusto #:id',
        ],

        'vote-rewards' => [
            'created' => 'Luotu äänestyspalkinto #:id',
            'updated' => 'Päivitetty äänestyspalkinto #:id',
            'deleted' => 'Poistettu äänestyspalkinto #:id',
        ],
    ],
];
