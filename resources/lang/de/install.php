<?php

return [
    'title' => 'Installation',

    'welcome' => 'Azuriom ist das <strong>Spiele-CMS der nächsten Generation</strong>, es ist <strong>frei</strong> und <strong>quelloffen</strong> und ist eine <strong>moderne, zuverlässige, schnelle und sichere</strong> Alternative zu bestehenden CMS, damit Du das <strong>bestmögliche Web-Erlebnis</strong> haben kannst.',

    'back' => 'Zurück',

    'requirements' => [
        'php' => 'PHP :version oder höher',
        'writable' => 'Schreib-Berechtigung',
        'rewrite' => 'URL-Umschreiben aktiviert',
        'extension' => 'Erweiterung :extension',
        'function' => 'Funktion :function aktiviert',
        '64bit' => '64-bit PHP',

        'refresh' => 'Anforderungen aktualisieren',
        'success' => 'Azariom kann konfiguriert werden!',
        'missing' => 'Dein Server erfüllt nicht die erforderlichen Anforderungen, um Azuriom zu installieren.',

        'help' => [
            'writable' => 'Du kannst diesen Befehl ausprobieren, um Schreibrechte zu erteilen: <code>:command</code>.',
            'rewrite' => 'Du kannst den Anweisungen in <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">unserer Dokumentation</a> folgen, um das Umschreiben von URLs zu aktivieren.',
            'htaccess' => 'Die Datei <code>.htaccess</code> oder <code>public/.htaccess</code> fehlt. Stelle sicher, dass Du versteckte Dateien aktiviert hast und dass die Datei vorhanden ist.',
            'extension' => 'Du kannst diesen Befehl ausprobieren, um die fehlenden PHP-Erweiterungen zu installieren: <code>:command</code>.<br>Wenn Du fertig bist, starte Apache oder Nginx neu.',
            'function' => 'Du musst diese Funktion in der php.ini-Datei von PHP aktivieren, indem Du den Wert von <code>disable_functions</code> bearbeitest.',
        ],
    ],

    'database' => [
        'title' => 'Datenbank',

        'type' => 'Typ',
        'host' => 'Host',
        'port' => 'Port',
        'database' => 'Datenbank',
        'user' => 'Benutzer',
        'password' => 'Passwort',

        'warn' => 'Dieser Datenbanktyp wird nicht empfohlen und sollte nur verwendet werden, wenn es nicht anders möglich ist.',
    ],

    'game' => [
        'title' => 'Spiel',

        'locale' => 'Sprache',

        'warn' => 'Sei vorsichtig, sobald die Installation abgeschlossen ist, ist es nicht möglich, dies zu ändern, ohne Azuriom vollständig neu zu installieren!',

        'install' => 'Installieren',

        'user' => [
            'title' => 'Admin-Konto',

            'name' => 'Name',
            'email' => 'E-Mail-Adresse',
            'password' => 'Passwort',
            'password_confirm' => 'Passwort bestätigen',
        ],

        'minecraft' => [
            'premium' => 'Melde dich mit einem Microsoft-Konto an (am sichersten, erfordert jedoch den Kauf von Minecraft)',
        ],

        'steam' => [
            'profile' => 'Steam-Profil-URL',
            'profile_info' => 'Dieser Steam-Benutzer wird der Administrator der Seite sein.',

            'key' => 'Steam-API-Schlüssel',
            'key_info' => 'Du findest Deinen Steam-API-Schlüssel unter <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Danke, dass Du Dich für Azuriom entschieden hast!',
        'success' => 'Deine Website wurde erfolgreich installiert, Du kannst jetzt Deine Website verwenden und etwas Großartiges tun!',
        'go' => 'Loslegen',
        'support' => 'Wenn Du Azuriom und die Arbeit, die wir leisten, schätzt, vergesse bitte nicht, <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">uns zu unterstützen</a>.',
    ],
];
