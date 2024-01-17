<?php

return [
    'nav' => [
        'title' => 'Abstimmung',
        'settings' => 'Einstellungen',
        'sites' => 'Seiten',
        'rewards' => 'Belohnungen',
        'votes' => 'Stimmen',
    ],

    'permission' => 'Vote-Plugin verwalten',

    'settings' => [
        'title' => 'Einstellungen der Voteseite',

        'count' => 'Top Spieler Anzahl',
        'display-rewards' => 'Zeige Belohnungen auf der Bewertungsseite',
        'ip_compatibility' => 'IPv4/IPv6-Kompatibilität aktivieren',
        'ip_compatibility_info' => 'Mit dieser Option kannst Du Stimmen korrigieren, die nicht auf Abstimmungsseiten verifiziert wurden, die IPv6 nicht akzeptieren, während Deine Seite dies tut, oder umgekehrt.',
        'commands' => 'Globale Befehle',
    ],

    'sites' => [
        'title' => 'Seiten',
        'edit' => 'Seite :site bearbeiten',
        'create' => 'Seite erstellen',

        'enable' => 'Seite aktivieren',
        'delay' => 'Verzögerung zwischen Votes',
        'minutes' => 'Minuten',

        'list' => 'Seiten, auf denen Stimmen überprüft werden können',
        'variable' => 'Du kannst <code>{player}</code> verwenden, um den Spielernamen zu verwenden.',

        'verifications' => [
            'title' => 'Verifizierung',
            'enable' => 'Voteüberprüfung aktivieren',

            'disabled' => 'Die Stimmen auf dieser Website werden nicht verifiziert.',
            'auto' => 'Die Stimmen auf dieser Seite werden automatisch verifiziert.',
            'input' => 'Die Stimmen auf dieser Website werden überprüft, wenn die Eingabe unten ausgefüllt ist.',

            'pingback' => 'Pingback-URL: :url',
            'secret' => 'Geheimer Schlüssel',
            'server_id' => 'Server ID',
            'token' => 'Token',
            'api_key' => 'API Schlüssel',
        ],
    ],

    'rewards' => [
        'title' => 'Belohnungen',
        'edit' => 'Belohnung :reward bearbeiten',
        'create' => 'Belohnung erstellen',

        'require_online' => 'Befehle ausführen, wenn der Benutzer auf dem Server online ist (nur mit AzLink verfügbar)',
        'enable' => 'Aktiviere die Belohnung',

        'commands' => 'Du kannst <code>{player}</code> verwenden, um den Spielernamen zu verwenden, <code>{reward}</code> für den Belohnungsnamen und <code>{site}</code> für die Website der Abstimmung. Für Steam-Spiele kannst du zudem <code>{steam_id}</code> und <code>{steam_id_32}</code> verwenden. Der Befehl darf nicht mit <code>/</code> beginnen.',
        'monthly' => 'Rangliste der Nutzer, die diese Belohnung am Ende des Monats erhalten sollen',
        'monthly_info' => 'Verteile diese Belohnung am Ende des Monats automatisch an die Nutzer/innen, die in der Rangliste der besten Wähler/innen an der entsprechenden Stelle stehen.',
        'cron' => 'Du musst CRON-Aufgaben einrichten, um automatische Belohnungen am Ende des Monats zu verwenden.',
    ],

    'votes' => [
        'title' => 'Votes',

        'empty' => 'Keine Votes in diesem Monat.',
        'votes' => 'Stimmen Anzahl',
        'month' => 'Stimmen Zahlen diesen Monat',
        'week' => 'Stimmen Zahlen diese Woche',
        'day' => 'Stimmen Zahlen Heute',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Abstimmungsseite #:id erstellt',
            'updated' => 'Abstimmungsseite #:id aktualisiert',
            'deleted' => 'Abstimmungsseite #:id gelöscht',
        ],

        'vote-rewards' => [
            'created' => 'Stimmbelohnung #:id erstellt',
            'updated' => 'Stimmbelohnung #:id aktualisiert',
            'deleted' => 'Stimmbelohnung #:id gelöscht',
        ],
    ],
];
