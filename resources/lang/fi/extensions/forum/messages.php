<?php

return [
    'title' => 'Foorumi',

    'fields' => [
        'forum' => 'Foorumi',
        'tags' => 'Tagit',
        'editor' => 'Editori',
    ],

    'actions' => [
        'pin' => 'Kiinnitä',
        'unpin' => 'Poista kiinnitys',
        'lock' => 'Lukitse',
        'unlock' => 'Poista lukitus',
    ],

    'latest' => [
        'title' => 'Uusimmat viestit',
    ],

    'stats' => [
        'title' => 'Tilastot',

        'discussions' => 'Keskustelut: :count',
        'posts' => 'Julkaisujen määrä :count',
        'users' => 'Käyttäjien määrä :count',
    ],

    'online' => [
        'title' => 'Käyttäjiä paikalla',

        'none' => 'Ei paikalla olevia käyttäjiä...',
    ],

    'forums' => [
        'discussions' => ':count discussion|:count discussions',

        'locked' => 'Tämä aihealue on lukittu.',
    ],

    'discussions' => [
        'title' => 'Keskustelut',
        'create' => 'Create discussion',
        'edit' => 'Edit discussion',

        'pin' => 'Kiinnitä tämä keskustelu',
        'lock' => 'Lukitse tämä keskustelu',

        'respond' => 'Vastaa',
        'views' => ':count view|:count views',

        'locked' => 'Lukittu',
        'pinned' => 'Kiinnitetty',

        'locked_info' => 'This discussion is locked.',

        'posts' => ':count post|:count posts',

        'delete' => 'Oletko varma, että haluat poistaa tämän keskustelun?',

        'status' => [
            'created' => 'Keskustelu luotu.',
            'updated' => 'Tätä keskustelua on muokattu.',
            'deleted' => 'Tämä keskustelu on poistettu.',

            'pinned' => 'Tämä keskustelu on kiinnitetty.',
            'unpinned' => 'Tämän keskustelun kiinnitys on poistettu.',
            'locked' => 'Tämä keskustelu on lukittu.',
            'unlocked' => 'Tämän keskustelun lukitus on poistettu.',
        ],
    ],

    'posts' => [
        'title' => 'Julkaisut',
        'edit' => 'Edit post',

        'delay' => 'Voit julkaista uudelleen :time kuluttua.',

        'delete' => 'Oletko varma että haluat poistaa tämän julkaisun?',

        'status' => [
            'created' => 'Julkaisu luotu.',
            'updated' => 'Tätä julkaisua on muokattu.',
            'deleted' => 'Tämä julkaisu on poistettu.',
        ],
    ],

    'notifications' => [
        'reply' => ':user on vastannut keskusteluusi :discussion',
        'mention' => ':user mainitsi sinut keskustelussa :discussion',
    ],

    'profile' => [
        'likes' => 'Tykkäykset',
        'posts' => 'Julkaisut',
        'discussions' => 'Keskustelut',

        'information' => 'Tietoa',
        'edit' => 'Muokkaa profiilia',

        'location' => 'Sijainti',
        'website' => 'Verkkosivusto',
        'about' => 'Tietoa',
        'signature' => 'Allekirjoitus',
        'registered' => 'Registered',
        'last_seen' => 'Last seen',
        'display_last_seen' => 'Display last visit',
    ],
];
