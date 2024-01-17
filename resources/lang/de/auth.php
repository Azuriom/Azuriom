<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Diese Zugangsdaten wurden nicht in unserer Datenbank gefunden.',
    'throttle' => 'Zu viele Anmeldeversuche. Versuche es in :seconds Sekunde(n) erneut.',

    'register' => 'Registrieren',
    'login' => 'Anmelden',
    'logout' => 'Abmelden',
    'verify' => 'E-Mail-Adresse verifizieren',
    'passwords' => [
        'confirm' => 'Passwort bestätigen',
        'reset' => 'Passwort zurücksetzen',
        'send' => 'Link zum Zurücksetzen des Passworts senden',
    ],
    'fpc' => [
        'title' => 'Erzwungene Passwortänderung',
        'line1' => 'Dein Konto ist aus Sicherheitsgründen vorübergehend gesperrt worden. Um es wieder freizugeben, ändere bitte dein Passwort.',
        'line2' => 'Wenn du weitere Informationen benötigst oder Probleme mit der Freischaltung deines Kontos hast, wende dich bitte an den Administrator der Website.',
        'action' => 'Mein Passwort ändern',
    ],
    'name' => 'Benutzername',
    'email' => 'E-Mail Addresse',
    'password' => 'Passwort',
    'confirm_password' => 'Passwort bestätigen',
    'current_password' => 'Aktuelles Passwort',

    'conditions' => 'Ich akzeptiere die  <a href=":url" target="_blank">Bedingungen </a>.',

    '2fa' => [
        'code' => 'Zwei-Faktor-Authentifizierungscode',
        'invalid' => 'Ungültiger Code',
    ],

    'suspended' => 'Dieses Konto ist gesperrt.',

    'maintenance' => 'Die Webseite wird gerade gewartet.',

    'remember' => 'Eingeloggt bleiben',
    'forgot_password' => 'Hast Du Dein Passwort vergessen?',

    'verification' => [
        'sent' => 'Ein neuer Bestätigungslink wurde an Deine E-Mail-Adresse gesendet.',
        'check' => 'Bevor Du fortfährst, überprüfe bitte Deine E-Mail auf einen Bestätigungslink.',
        'request' => 'Wenn Du die E-Mail nicht erhalten hast, kannst Du eine weitere anfordern.',
        'resend' => 'E-Mail erneut senden',
    ],

    'confirmation' => 'Bitte bestätige Dein Passwort, bevor Du fortfährst.',

    'mail' => [
        'reset' => [
            'subject' => 'Passwortbenachrichtigung zurücksetzen',
            'line1' => 'Du erhältst diese E-Mail, weil wir eine Anfrage zum Zurücksetzen des Passworts für Dein Konto erhalten haben.',
            'action' => 'Passwort zurücksetzen',
            'line2' => 'Dieser Link zum Zurücksetzen des Passworts läuft in :count Minuten ab.',
            'line3' => 'Wenn Du kein Zurücksetzen des Passworts angefordert hast, sind keine weiteren Maßnahmen erforderlich.',
        ],

        'verify' => [
            'subject' => 'Email Adresse bestätigen',
            'line1' => 'Bitte klicke auf die Schaltfläche unten, um Deine E-Mail-Adresse zu bestätigen.',
            'action' => 'Email Adresse bestätigen',
            'line2' => 'Wenn Du kein Konto erstellt hast, sind keine weiteren Maßnahmen erforderlich.',
        ],
    ],
];
