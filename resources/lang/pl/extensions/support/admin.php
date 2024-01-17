<?php

return [
    'title' => 'Pomoc',

    'categories' => [
        'title' => 'Kategorie',
        'edit' => 'Edytuj kategorię #:category',
        'create' => 'Utwórz kategorię',

        'delete_empty' => 'Kategoria zawiera zgłoszenia i nie może zostać usunięta.',
    ],

    'tickets' => [
        'title' => 'Wątki',
        'show' => 'Zgłoszenie #:ticket - :name',
        'create' => 'Utwórz zgłoszenie',

        'open' => 'Otwórz zgłoszenie',
    ],

    'permissions' => [
        'tickets' => 'Wyświetl i zarządzaj wątkami',
        'categories' => 'Wyświetlaj kategorie i zarządzaj nimi',
    ],

    'settings' => [
        'title' => 'Ustawienia pomocy',
        'home_message' => 'Home message',
        'webhook' => 'Adres URL webhooka Discord',
        'webhook_info' => 'Gdy użytkownik utworzy zgłoszenie lub doda komentarz, to stworzy powiadomienie na tym webhooku. Pozostaw puste, aby wyłączyć',
        'scheduler' => 'When CRON tasks are setup, tickets can be automatically closed after a certain time.',
        'auto_close' => 'Delay before automatically closing tickets',
        'auto_close_info' => 'When a ticket doesn\'t receive any answer during this time, it will be automatically closed. Leave empty to disable.',
        'reopen' => 'Allow users to reopen a closed ticket.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Reopened ticket #:id',
            'closed' => 'Zamknięte zgłoszenie #:id',
        ],
    ],
];
