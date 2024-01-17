<?php

return [

    'nav' => [
        'settings' => 'Inställningar',
        'forums' => 'Forum',
        'tags' => 'Taggar',
    ],

    'settings' => [
        'title' => 'Inställningar för forum',
        'home_message' => 'Hem meddelande',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Ett meddelande kommer att skickas på denna webhook när ett nytt meddelande läggs upp. Lämna tomt för att inaktivera',
    ],

    'categories' => [
        'title' => 'Kategorier',
        'edit' => 'Redigera kategori :kategori',
        'create' => 'Skapa mapp',

        'delete_error' => 'Denna kategori innehåller forum och kan inte tas bort.',
    ],

    'forums' => [
        'title' => 'Forum',
        'create' => 'Skapa forum',
        'edit' => 'Redigera forum :forum',

        'create_category' => 'Skapa kategori',
        'create_forum' => 'Skapa forum',

        'parent' => 'Överordnat forum',
        'restricted' => 'Begränsa åtkomst till detta forum till endast vissa roller',
        'default_tags' => 'Förvalda taggar',
        'lock' => 'Lås detta forum',
        'lock_info' => 'Användare som inte är administratör kommer inte att kunna skapa diskussioner.',
        'private' => 'Privat forum',
        'private_info' => 'Användare kan bara se sina egna diskussioner och pinnedones.',

        'updated' => 'Forumsorder uppdaterad.',
        'delete_error' => 'Ett forum med diskussioner eller underforum kan inte raderas.',
    ],

    'discussions' => [
        'card' => 'Forum diskussioner',
    ],

    'posts' => [
        'card' => 'Foruminlägg',

        'recent' => 'Senaste inläggen i hemmet',
        'delay' => 'Fördröjning mellan inlägg',
        'seconds' => 'sekunder',
    ],

    'tags' => [
        'title' => 'Taggar',
        'create' => 'Skapa en tagg',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Tog bort diskussion #:id',
            'pinned' => 'Fäst diskussion #:id',
            'unpinned' => 'Ofäst diskussion #:id',
            'locked' => 'Låst diskussion #:id',
            'unlocked' => 'Upplåst diskussion #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Tog bort inlägg #:id',
        ],

        'forum-categories' => [
            'created' => 'Skapad forumkategori #:id',
            'updated' => 'Uppdaterade forumkategori #:id',
            'deleted' => 'Tog bort forumkategori #:id',
        ],

        'forum-forums' => [
            'created' => 'Skapat forum #:id',
            'updated' => 'Uppdaterad forum #:id',
            'deleted' => 'Tog bort forum #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Hantera forum och kategorier',
        'discussions' => 'Hantera forumdiskussioner (flytta, redigera, ta bort, klistra, låsa)',
        'private' => 'Visa diskussioner från andra användare i privata forum',
        'delete_own_posts' => 'Ta bort egna foruminlägg',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
