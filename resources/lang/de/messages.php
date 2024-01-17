<?php

return [

    'lang' => 'Deutsch',

    'date' => [
        'default' => 'j. F Y',
        'full' => 'j. F Y \u\m G:i \U\h\r',
        'compact' => 'd.m.Y \u\m G:i \U\h\r',
    ],

    'nav' => [
        'toggle' => 'Navigation umschalten',
        'profile' => 'Profil',
        'admin' => 'Admin Dashboard',
    ],

    'actions' => [
        'add' => 'Hinzufügen',
        'back' => 'Zurück',
        'browse' => 'Durchsuchen',
        'cancel' => 'Abbrechen',
        'choose_file' => 'Datei wählen',
        'close' => 'Schließen',
        'comment' => 'Kommentieren',
        'continue' => 'Fortfahren',
        'copy' => 'Kopieren',
        'create' => 'Erstellen',
        'delete' => 'Löschen',
        'disable' => 'Ausschalten',
        'download' => 'Herunterladen',
        'duplicate' => 'Duplizieren',
        'edit' => 'Bearbeiten',
        'enable' => 'Einschalten',
        'generate' => 'Generieren',
        'install' => 'Installieren',
        'refresh' => 'Aktualisieren',
        'reload' => 'Neu laden',
        'remove' => 'Entfernen',
        'save' => 'Speichern',
        'search' => 'Suchen',
        'send' => 'Senden',
        'show' => 'Anzeigen',
        'update' => 'Aktualisieren',
        'upload' => 'Hochladen',
    ],

    'fields' => [
        'action' => 'Aktion',
        'address' => 'Adresse',
        'author' => 'Author',
        'category' => 'Kategorie',
        'color' => 'Farbe',
        'content' => 'Inhalt',
        'date' => 'Datum',
        'description' => 'Beschreibung',
        'enabled' => 'Aktiv',
        'file' => 'Datei',
        'game' => 'Spiel',
        'icon' => 'Symbol',
        'image' => 'Bilder',
        'link' => 'Link',
        'money' => 'Guthaben',
        'name' => 'Name',
        'permissions' => 'Berechtigungen',
        'port' => 'Port',
        'price' => 'Preis',
        'published_at' => 'Veröffentlicht unter',
        'quantity' => 'Menge',
        'role' => 'Rolle',
        'server' => 'Server',
        'short_description' => 'Kurze Beschreibung',
        'slug' => 'Slug',
        'status' => 'Status',
        'title' => 'Titel',
        'type' => 'Art',
        'url' => 'URL',
        'user' => 'Benutzer',
        'value' => 'Wert',
        'version' => 'Version',
    ],

    'status' => [
        'success' => 'Die Aktion wurde erfolgreich abgeschlossen!',
        'error' => 'Ein Fehler ist aufgetreten: :error',
    ],

    'range' => [
        'days' => 'Nach Tagen',
        'months' => 'Nach Monaten',
    ],

    'loading' => 'Wird geladen...',

    'yes' => 'Ja',
    'no' => 'Nein',
    'unknown' => 'Unbekannt',
    'other' => 'Anderes',
    'none' => 'Keines',
    'copied' => 'Kopiert',
    'icons' => 'Die Liste der verfügbaren Symbole findest Du unter <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.',

    'home' => 'Startseite',
    'servers' => 'Server',
    'news' => 'Neuigkeiten',
    'welcome' => 'Wilkommen auf :name',
    'copyright' => 'Unterstützt von <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Wartung',
        'message' => 'Die Website wird derzeit gewartet.',
    ],

    'theme' => [
        'light' => 'Helles Design',
        'dark' => 'Dunkles Design',
    ],

    'captcha' => 'Die Captcha-Überprüfung ist fehlgeschlagen. Bitte versuche es erneut.',

    'notifications' => [
        'notifications' => 'Benachrichtigungen',
        'read' => 'Als gelesen markieren',
        'empty' => 'Du hast keine ungelesenen Benachrichtigungen.',
        'level' => 'Stufe',
        'info' => 'Informationen',
        'warning' => 'Warnung',
        'danger' => 'Achtung',
        'success' => 'Erfolgreich',
    ],

    'clipboard' => [
        'copied' => 'Kopiert!',
        'error' => 'STRG + C zum Kopieren',
    ],

    'server' => [
        'join' => 'Beitreten',
        'total' => ':count/:max Spieler|:count/:max Online-Spieler',
        'online' => ':count Online-Spieler|:count Online-Spieler',
        'offline' => 'Der Server ist derzeit offline.',
    ],

    'profile' => [
        'title' => 'Mein Profil',
        'change_email' => 'E-Mail Adresse ändern',
        'change_password' => 'Passwort ändern',
        'change_name' => 'Benutzername ändern',

        'delete' => [
            'btn' => 'Mein Konto löschen',
            'title' => 'Kontolöschung',
            'info' => 'Dadurch wird dein Konto und alle damit verbundenen Daten gelöscht. Dieser Vorgang kann nicht rückgängig gemacht werden.',
            'email' => 'Wir senden dir eine Bestätigungs-E-Mail zur Bestätigung dieser Operation.',
            'sent' => 'Ein Bestätigungslink wurde an deine E-Mail-Adresse gesendet.',
            'success' => 'Dein Konto wurde erfolgreich gelöscht!',
        ],

        'email_verification' => 'Deine E-Mail wurde nicht verifiziert, bitte überprüfe Deine E-Mail auf einen Bestätigungslink.',
        'updated' => 'Ihr Profil wurde aktualisiert.',

        'info' => [
            'role' => 'Rolle: :role',
            'register' => 'Registriert: :date',
            'money' => 'Guthaben: :money',
            '2fa' => 'Zwei-Faktor-Authentifizierung (2FA): :2FA',
            'discord' => 'Verlinkter Discord-Account: :user',
        ],

        '2fa' => [
            'enable' => '2FA einschalten',
            'disable' => '2FA ausschalten',
            'manage' => '2FA verwalten',
            'info' => 'Scanne den obigen QR-Code mit einer Zwei-Faktor-Authentifizierungs-App auf Deinem Telefon wie <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> oder Google Authenticator.',
            'secret' => 'Sicherheitsschlüssel: :secret',
            'title' => 'Zwei-Faktor-Authentifizierung',
            'codes' => 'Wiederherstellungscodes anzeigen',
            'code' => 'Code',
            'enabled' => 'Die Zwei-Faktor-Authentifizierung ist derzeit aktiviert. Vergesse nicht, Deine Wiederherstellungscodes zu speichern!',
            'disabled' => 'Zwei-Faktor-Authentifizierung deaktiviert.',
        ],

        'discord' => [
            'link' => 'Mit Discord verlinken',
            'unlink' => 'Von Discord entlinken',
            'linked' => 'Dein Discord-Konto wurde erfolgreich verlinkt.',
        ],

        'money_transfer' => [
            'title' => 'Geldüberweisung',
            'user' => 'This user was not found.',
            'balance' => 'Du hast nicht genug Geld, um diese Überweisung vorzunehmen.',
            'success' => 'Das Geld wurde erfolgreich gesendet.',
            'notification' => ':user hat dir :money geschickt.',
        ],
    ],

    'posts' => [
        'posts' => 'Beiträge',
        'posted' => 'Gepostet am :date von :user',
        'unpublished' => 'Dieser Beitrag ist noch nicht veröffentlicht.',
        'read' => 'Mehr anzeigen',
    ],

    'comments' => [
        'create' => 'Kommentieren',
        'guest' => 'Zum Kommentieren musst du angemeldet sein.',
        'author' => '<strong>:user</strong> kommentierte am :date',
        'content' => 'Dein Kommentar',
        'delete' => 'Löschen?',
        'delete_confirm' => 'Möchtest Du diesen Kommentar wirklich löschen?',
    ],

    'likes' => 'Likes: :count',

    'markdown' => [
        'init' => 'Füge Dateien durch Ziehen und Ablegen oder Einfügen aus der Zwischenablage an.',
        'drag' => 'Lass das Bild fallen, um es hochzuladen.',
        'drop' => 'Bild #images_names# hochladen...',
        'progress' => 'Hochladen von #file_name#: #progress#%',
        'uploaded' => 'Hochgeladen #Bild_name#',

        'size' => 'Bild #image_name# ist zu groß (#image_size#).\nDie maximale Dateigröße ist #image_max_size#.',
        'error' => 'Beim Hochladen des Bildes #image_name# ist etwas schief gelaufen.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Rollen-ID',
            'description' => 'ID der Rolle auf der Website.',
        ],

        'power' => [
            'name' => 'Rollen-Macht',
            'description' => 'Macht der Rolle auf der Website gleich oder größer als',
        ],
    ],
];
