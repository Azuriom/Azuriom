<?php

return [
    'title' => 'Fórum',

    'fields' => [
        'forum' => 'Fórum',
        'tags' => 'Címkék',
        'editor' => 'Szerkesztő',
    ],

    'actions' => [
        'pin' => 'Rögzítés',
        'unpin' => 'Rögzítés feloldása',
        'lock' => 'Zárolás',
        'unlock' => 'Zárolás feloldása',
    ],

    'latest' => [
        'title' => 'Legutóbbi bejegyzések',
    ],

    'stats' => [
        'title' => 'Statisztikák',

        'discussions' => 'Megbeszélések: :count',
        'posts' => 'Bejegyzések: :count',
        'users' => 'Felhasználók: :count',
    ],

    'online' => [
        'title' => 'Elérhető felhasználók',

        'none' => 'Nincs elérhető felhasználó most...',
    ],

    'forums' => [
        'discussions' => ':count discussion|:count discussions',

        'locked' => 'A fórum levan zárva.',
    ],

    'discussions' => [
        'title' => 'Megbeszélések',
        'create' => 'Create discussion',
        'edit' => 'Edit discussion',

        'pin' => 'Tűzd ki ezt a beszélgetést',
        'lock' => 'Zárd le ezt a beszélgetést',

        'respond' => 'Válaszolj',
        'views' => ':count megtekintés|:count megtekintés',

        'locked' => 'Lezárva',
        'pinned' => 'Kitűzve',

        'locked_info' => 'This discussion is locked.',

        'posts' => ':count post|:count posts',

        'delete' => 'Biztos, hogy törölni akarod ezt a megbeszélést?',

        'status' => [
            'created' => 'A megbeszélés létrejött.',
            'updated' => 'A megbeszélés módosítva lett.',
            'deleted' => 'A megbeszélés törölve lett.',

            'pinned' => 'A megbeszélés rögzítve lett.',
            'unpinned' => 'A megbeszélés rögzítése megszűnt.',
            'locked' => 'A megbeszélés le lett zárva.',
            'unlocked' => 'A megbeszélés fel lett oldva.',
        ],
    ],

    'posts' => [
        'title' => 'Bejegyzések',
        'edit' => 'Edit post',

        'delay' => ':time múlva újra írhatsz újra bejegyzést.',

        'delete' => 'Biztos, hogy törölni szeretnéd ezt a bejegyzést?',

        'status' => [
            'created' => 'Bejegyzés létrehozva.',
            'updated' => 'Bejegyzés frissítve.',
            'deleted' => 'Bejegyzés törölve.',
        ],
    ],

    'notifications' => [
        'reply' => ':user válaszolt a bejegyzésedre :discussion',
        'mention' => ':user megemlített téged :discussion',
    ],

    'profile' => [
        'likes' => 'Kedvelések',
        'posts' => 'Bejegyzések',
        'discussions' => 'Megbeszélések',

        'information' => 'Információ',
        'edit' => 'Profil szerkesztése',

        'location' => 'Hely',
        'website' => 'Weboldal',
        'about' => 'Névjegy',
        'signature' => 'Aláírás',
        'registered' => 'Registered',
        'last_seen' => 'Last seen',
        'display_last_seen' => 'Display last visit',
    ],
];
