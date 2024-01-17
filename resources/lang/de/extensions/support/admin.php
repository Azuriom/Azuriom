<?php

return [
    'title' => 'Support',

    'categories' => [
        'title' => 'Kategorien',
        'edit' => 'Kategorie #:category bearbeiten',
        'create' => 'Kategorie erstellen',

        'delete_empty' => 'Die Kategorie enthält Tickets und kann nicht gelöscht werden.',
    ],

    'tickets' => [
        'title' => 'Tickets',
        'show' => 'Ticket #:ticket - :name',
        'create' => 'Ticket erstellen',

        'open' => 'Tickets öffnen',
    ],

    'permissions' => [
        'tickets' => 'Anzeigen und Verwalten von Support-Tickets',
        'categories' => 'Anzeigen und Verwalten von Support Kategorien',
    ],

    'settings' => [
        'title' => 'Support-Einstellungen',
        'home_message' => 'Startseiten-Nachricht',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Wenn ein Benutzer ein Ticket erstellt oder einen Kommentar hinzufügt, wird eine Benachrichtigung auf diesem Webhook erstellt. Zum Deaktivieren leer lassen',
        'scheduler' => 'Wenn CRON-Aufgaben eingerichtet sind, können Tickets nach einer bestimmten Zeit automatisch geschlossen werden.',
        'auto_close' => 'Verzögerung vor dem automatischen Schließen von Tickets',
        'auto_close_info' => 'Wenn ein Ticket innerhalb dieser Zeit keine Antwort erhält, wird es automatisch geschlossen. Lass leer, um es zu deaktivieren.',
        'reopen' => 'Erlaube Benutzern, ein geschlossenes Ticket wieder zu öffnen.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Wiedereröffnetes Ticket #:id',
            'closed' => 'Ticket #:id geschlossen',
        ],
    ],
];
