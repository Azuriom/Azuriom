<?php

return [

    'nav' => [
        'settings' => 'Asetukset',
        'forums' => 'Foorumi',
        'tags' => 'Tagit',
    ],

    'settings' => [
        'title' => 'Foorumin asetukset',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => 'Kategoriat',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => 'Foorumi',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => 'Rajoita pääsyä tälle foorumille vain tiettyihin rooleihin',
        'default_tags' => 'Oletustagit',
        'lock' => 'Lukitse tämä keskustelu',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => 'Aihealueen keskustelut',
    ],

    'posts' => [
        'card' => 'Aihealueen julkaisut',

        'recent' => 'Recent posts in home',
        'delay' => 'Viive keskustelujen välissä',
        'seconds' => 'sekuntia',
    ],

    'tags' => [
        'title' => 'Tagit',
        'create' => 'Luo tagi',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Keskustelu poistettu #:id',
            'pinned' => 'Kiinnitetty keskustelu #:id',
            'unpinned' => 'Kiinnittämätön keskustelu #:id',
            'locked' => 'Lukittu keskustelu #:id',
            'unlocked' => 'Avattu keskustelu #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Poistettu viesti #:id',
        ],

        'forum-categories' => [
            'created' => 'Keskustelun kategoria luotu #:id',
            'updated' => 'Keskustelun kategoria päivitetty #:id',
            'deleted' => 'Keskustelun kategoria poistettu #:id',
        ],

        'forum-forums' => [
            'created' => 'Keskustelu luotu #:id',
            'updated' => 'Keskustelu päivitetty #:id',
            'deleted' => 'Keskustelu poistettu #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Hallinoi keskusteluja ja kategorioita',
        'discussions' => 'Hallinnoi keskusteluita (siirrä, muokaa, poista, kiinnitä, lukitse)',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
