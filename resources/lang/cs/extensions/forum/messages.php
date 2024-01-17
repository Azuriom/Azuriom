<?php

return [
    'title' => 'Fórum',

    'fields' => [
        'forum' => 'Fórum',
        'tags' => 'Štítky',
        'editor' => 'Editor',
    ],

    'actions' => [
        'pin' => 'Připnout',
        'unpin' => 'Odepnout',
        'lock' => 'Uzamknout',
        'unlock' => 'Odemknout',
    ],

    'latest' => [
        'title' => 'Poslední příspěvky',
    ],

    'stats' => [
        'title' => 'Statistiky',

        'discussions' => 'Diskuze: :count',
        'posts' => 'Příspěvky: :count',
        'users' => 'Uživatelé: :count',
    ],

    'online' => [
        'title' => 'Online uživatelé',

        'none' => 'Žádní online uživatelé...',
    ],

    'forums' => [
        'discussions' => ':count diskuze|:count diskuzí',

        'locked' => 'Toto fórum je uzamčeno.',
    ],

    'discussions' => [
        'title' => 'Diskuze',
        'create' => 'Vytvořit diskuzi',
        'edit' => 'Upravit diskuzi',

        'pin' => 'Připnout tuto diskuzi',
        'lock' => 'Uzamknout tuto diskuzi',

        'respond' => 'Odpovědět',
        'views' => ':count zobrazení|:count zobrazení',

        'locked' => 'Uzamčeno',
        'pinned' => 'Připnuto',

        'locked_info' => 'Tato diskuze je uzamčena.',

        'posts' => ':count příspěvek|:count příspěvků',

        'delete' => 'Opravdu chcete odstranit tuto diskuzi?',

        'status' => [
            'created' => 'Diskuze byla vytvořena.',
            'updated' => 'Diskuze byla upravena.',
            'deleted' => 'Diskuze byla odstraněna.',

            'pinned' => 'Diskuze byla připnuta.',
            'unpinned' => 'Diskuze byla odepnuta.',
            'locked' => 'Diskuze byla uzamknuta.',
            'unlocked' => 'Diskuze byla odemknuta.',
        ],
    ],

    'posts' => [
        'title' => 'Příspěvky',
        'edit' => 'Upravit příspěvek',

        'delay' => 'Můžete psát znovu za :time.',

        'delete' => 'Opravdu chcete odstranit tento příspěvek?',

        'status' => [
            'created' => 'Příspěvek byl vytvořen.',
            'updated' => 'Příspěvek byl upraven.',
            'deleted' => 'Příspěvek byl odstraněn.',
        ],
    ],

    'notifications' => [
        'reply' => 'Uživatel :user odpověděl na vaši diskuzi :discussion',
        'mention' => 'Uživatel :user vás zmínil v diskuzi :discussion',
    ],

    'profile' => [
        'likes' => 'Líbí se mi',
        'posts' => 'Příspěvky',
        'discussions' => 'Diskuze',

        'information' => 'Informace',
        'edit' => 'Upravit profil',

        'location' => 'Lokace',
        'website' => 'Web',
        'about' => 'O mně',
        'signature' => 'Podpis',
        'registered' => 'Registrován',
        'last_seen' => 'Naposledy spatřen',
        'display_last_seen' => 'Zobrazit poslední návštěvu',
    ],
];
