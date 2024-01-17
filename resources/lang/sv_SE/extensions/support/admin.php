<?php

return [
    'title' => 'Stöd',

    'categories' => [
        'title' => 'Kategorier',
        'edit' => 'Redigera kategori #:category',
        'create' => 'Skapa kategori',

        'delete_empty' => 'Kategorin innehåller ärenden och kan inte tas bort.',
    ],

    'tickets' => [
        'title' => 'Biljetter',
        'show' => 'Ärende #:ticket - :name',
        'create' => 'Skapa ärende',

        'open' => 'Öppna biljetter',
    ],

    'permissions' => [
        'tickets' => 'Visa och hantera supportärenden',
        'categories' => 'Visa och hantera supportkategorier',
    ],

    'settings' => [
        'title' => 'Inställningar för support',
        'home_message' => 'Hem meddelande',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'När en användare skapar ett ärende eller lägger till en kommentar kommer det att skapa ett meddelande på denna webhook. Lämna tomt för att inaktivera',
        'scheduler' => 'When CRON tasks are setup, tickets can be automatically closed after a certain time.',
        'auto_close' => 'Delay before automatically closing tickets',
        'auto_close_info' => 'When a ticket doesn\'t receive any answer during this time, it will be automatically closed. Leave empty to disable.',
        'reopen' => 'Allow users to reopen a closed ticket.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Reopened ticket #:id',
            'closed' => 'Stängt ärende #:id',
        ],
    ],
];
