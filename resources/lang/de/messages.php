<?php

return [

    'lang' => 'Deutsch',

    'copyright' => 'Angetrieben von <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'date' => 'j F Y',
    'date-full' => 'j F Y \u\m G:i \U\h\r',
    'date-compact' => 'd/m/Y \u\m G:i \U\h\r',

    'nav' => [
        'toggle' => 'Navbar ein-/ausblenden',
        'profile' => 'Profil',
        'admin' => 'Administrationsbereich',
    ],

    'actions' => [
        'add' => 'hinzufügen',
        'show' => 'Siehe',
        'create' => 'erstellen',
        'close' => 'Schließen',
        'edit' => 'Bearbeiten',
        'update' => 'Update',
        'delete' => 'Löschen',
        'save' => 'Speichern',
        'continue' => 'Weiter',
        'browse' => 'Durchsuchen',
        'choose-file' => 'Wählen Sie die Datei',
        'download' => 'Herunterladen',
        'upload' => 'Uploader',
        'cancel' => 'Abbrechen',
        'enable' => 'Aktivieren Sie',
        'disable' => 'Deaktivieren Sie',
        'copy' => 'Kopieren',
        'comment' => 'Kommentar',
        'search' => 'Suche',
        'send' => 'Senden',
        'reload' => 'Neu laden',
        'refresh' => 'Aktualisieren',
        'duplicate' => 'Duplizieren',
        'remove' => 'entfernen',
        'back' => 'Zurück',
    ],

    'fields' => [
        'name' => 'Name',
        'title' => 'Titel',
        'action' => 'Aktion',
        'date' => 'Datum',
        'slug' => 'Link',
        'link' => 'Link',
        'enabled' => 'Aktiviert',
        'author' => 'Autor',
        'user' => 'Benutzer',
        'image' => 'Bild',
        'type' => 'Typ',
        'file' => 'Datei',
        'description' => 'Beschreibung',
        'short-description' => 'Kurzbeschreibung',
        'content' => 'Inhalt',
        'role' => 'Rolle',
        'quantity' => 'Menge',
        'money' => 'Silber',
        'color' => 'Farbe',
        'url' => 'URL',
        'status' => 'Status',
        'category' => 'Kategorie',
        'version' => 'Version',
        'game' => 'Spiel',
        'price' => 'Auszeichnungen',
        'icon' => 'Icon',
        'server' => 'Server',
    ],

    'range' => [
        'days' => 'Pro Tag',
        'months' => 'Pro Monat',
    ],

    'loading' => 'Laden...',

    'yes' => 'Ja',
    'no' => 'Nein',
    'unknown' => 'Unbekannt',
    'none' => 'Keine',
    'copied' => 'Kopiert',

    'home' => 'Startseite',
    'welcome' => 'Willkommen bei :name',

    'maintenance' => 'Wartung',
    'maintenance-message' => 'Die Seite befindet sich derzeit in der Wartung.',

    'status-success' => 'Die Aktion wurde erfolgreich abgeschlossen!',
    'status-error' => 'Es ist ein Fehler aufgetreten: :error',

    'theme' => [
        'light' => 'Klares Thema',
        'dark' => 'Dunkles Thema',
    ],

    'captcha' => 'Die Captcha-Prüfung ist fehlgeschlagen, bitte versuchen Sie es erneut.',

    'notifications' => [
        'notifications' => 'Benachrichtigungen',
        'read' => 'Als gelesen markieren',
        'empty' => 'Sie haben keine ungelesenen Benachrichtigungen.',
    ],

    'clipboard' => [
        'copied' => 'Kopiert!',
        'error' => 'CTRL + C zum Kopieren',
    ],

    'server' => [
        'online' => ':count player online|:count players online',
        'offline' => 'Der Server ist derzeit ausgeschaltet.',
    ],

    'profile' => [
        'title' => 'Mein Profil',
        'change-email' => 'Ändern der E-Mail Adresse',
        'change-password' => 'Passwort ändern',

        'not-verified' => 'Ihre E-Mail-Adresse ist nicht verifiziert. Bitte stellen Sie sicher, dass Sie keinen Verifizierungslink erhalten haben.',

        'updated' => 'Ihr Profil wurde aktualisiert.',

        'info' => [
            'role' => 'Rolle: :role',
            'register' => 'Anmeldung: :date',
            'money' => 'Geld: :money',
            '2fa' => 'Zwei-Faktor-Authentifizierung (2FA): :2fa',
        ],

        '2fa' => [
            'enable' => 'Aktivieren Sie das 2FA.',
            'disable' => 'Deaktivieren Sie das 2FA.',
            'info' => 'Scannen Sie den obigen QR-Code mit einer Zwei-Faktor-Authentifizierungsanwendung auf Ihrem Telefon, z. B. Authy oder Google Authenticator.',
            'secret' => 'Geheimschlüssel: :secret',
            'title' => 'Aktivieren der Zwei-Faktor-Authentifizierung',
            'code' => 'Code',
            'enabled' => 'Zwei-Faktor-Authentifizierung aktiviert.',
            'disabled' => 'Zwei-Faktor-Authentifizierung deaktiviert.',
        ],

        'email-not-verified' => 'Ihre E-Mail-Adresse ist nicht verifiziert, bitte prüfen Sie, ob Sie einen Verifizierungslink erhalten haben. Wenn Sie sie nicht erhalten haben, können Sie sie erneut senden.',

        'money-transfer' => [
            'title' => 'Geldtransfer',
            'self' => 'Sie können kein Geld an sich selbst senden.',
            'not-enough' => 'Sie haben nicht genug Geld, um die Überweisung zu tätigen.',
            'success' => 'Das Geld wurde erfolgreich gesendet.',
            'notification' => ':user schickt Ihnen :Geld.',
        ],
    ],

    'posts' => [
        'posts' => 'Artikel',
        'posted' => 'Geschrieben am :date von :user',
        'not-published' => 'Dieser Artikel wurde noch nicht veröffentlicht.',
        'read' => 'Mehr lesen',
    ],

    'comments' => [
        'create' => 'Laisser un commentaire',
        'guest' => 'Sie müssen eingeloggt sein, um einen Kommentar zu hinterlassen.',
        'author' => '<strong>:user</strong> kommentierte am :date',
        'your-comment' => 'Ihr Kommentar',
        'delete-title' => 'Löschen?',
        'delete-description' => 'Sind Sie sicher, dass Sie diesen Kommentar löschen möchten?',
    ],

    'likes' => 'Ich mag : :count',
];
