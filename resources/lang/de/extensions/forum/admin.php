<?php

return [

    'nav' => [
        'settings' => 'Einstellungen',
        'forums' => 'Foren',
        'tags' => 'Schlagwörter',
    ],

    'settings' => [
        'title' => 'Forum Einstellungen',
        'home_message' => 'Startseiten-Nachricht',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Über diesen Webhook wird eine Benachrichtigung gesendet, wenn eine neue Nachricht gepostet wird. Leer lassen, um zu deaktivieren',
    ],

    'categories' => [
        'title' => 'Kategorien',
        'edit' => 'Kategorie bearbeiten :category',
        'create' => 'Kategorie erstellen',

        'delete_error' => 'Diese Kategorie enthält Foren und kann nicht gelöscht werden.',
    ],

    'forums' => [
        'title' => 'Foren',
        'create' => 'Forum erstellen',
        'edit' => 'Forum bearbeiten :forum',

        'create_category' => 'Kategorie erstellen',
        'create_forum' => 'Forum erstellen',

        'parent' => 'Übergeordnetes Forum',
        'restricted' => 'Zugriff auf dieses Forum nur auf bestimmte Rollen beschränken',
        'default_tags' => 'Standard-Tags',
        'lock' => 'Dieses Forum sperren',
        'lock_info' => 'Benutzer, die keine Administratoren sind, können keine Diskussionen erstellen.',
        'private' => 'Privates Forum',
        'private_info' => 'Nutzer können nur ihre eigenen Diskussionen und gepinnten Beiträge sehen.',

        'updated' => 'Forenordnung aktualisiert.',
        'delete_error' => 'Ein Forum mit Diskussionen oder Unterforen kann nicht gelöscht werden.',
    ],

    'discussions' => [
        'card' => 'Forumsdiskussionen',
    ],

    'posts' => [
        'card' => 'Forenbeiträge',

        'recent' => 'Neueste Beiträge in Startseite',
        'delay' => 'Verzögerung zwischen den Beiträgen',
        'seconds' => 'Sekunden',
    ],

    'tags' => [
        'title' => 'Schlagwörter',
        'create' => 'Erstelle ein Schlagwort',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Diskussion gelöscht #:id',
            'pinned' => 'Angeheftete Diskussion #:id',
            'unpinned' => 'Ungeheftete Diskussion #:id',
            'locked' => 'Gesperrte Diskussion #:id',
            'unlocked' => 'Entsperrte Diskussion #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Gelöschter Beitrag #:id',
        ],

        'forum-categories' => [
            'created' => 'Forum Kategorie #:id erstellt',
            'updated' => 'Aktualisierte Forenkategorie #:id',
            'deleted' => 'Gelöschte Forenkategorie #:id',
        ],

        'forum-forums' => [
            'created' => 'Erstelltes Forum #:id',
            'updated' => 'Aktualisiertes Forum #:id',
            'deleted' => 'Forum gelöscht #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Foren und Kategorien verwalten',
        'discussions' => 'Forumsdiskussionen verwalten (verschieben, bearbeiten, löschen, anheften, sperren)',
        'private' => 'Diskussionen von anderen Nutzern in privaten Foren ansehen',
        'delete_own_posts' => 'Eigene Forenbeiträge löschen',
        'locked' => 'Erstelle eine Diskussion in einem geschlossenen Forum'
    ],
];
