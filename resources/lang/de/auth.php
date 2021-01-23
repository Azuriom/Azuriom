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

    'failed' => 'Diese Kombination aus Zugangsdaten wurde nicht in unserer Datenbank gefunden.',
    'throttle' => 'Zu viele Loginversuche. Versuchen Sie es bitte in :seconds Sekunden nochmal.',

    'register' => 'Anmelden',
    'login' => 'Einloggen',
    'logout' => 'Abmelden',
    'verify' => 'Prüfen Sie Ihre E-Mail Adresse',
    'passwords' => [
        'confirm' => 'Bestätigen Sie das Passwort',
        'reset' => 'Passwort zurücksetzen',
        'send' => 'Senden',
    ],

    'name' => 'Benutzername',
    'email' => 'E-Mail Adresse ',
    'password' => 'Passwort',
    'confirm-password' => 'Passwort-Bestätigung',
    'current-password' => 'Aktuelles Passwort',

    'conditions' => 'Ich akzeptiere die <a href=":url" target="_blank">Bedingungen</a>.',

    '2fa-code' => 'Zwei-Faktor-Authentifizierungscode',
    '2fa-invalid' => 'Ungültiger Code',

    'suspended' => 'Dieses Konto ist derzeit gesperrt.',
    'maintenance' => 'Die Seite befindet sich derzeit in der Wartung.',

    'remember-me' => 'Erinnern Sie sich an mich',
    'forgot-password' => 'Haben Sie Ihr Passwort vergessen?',

    'verify-sent' => 'Es wurde ein neuer Verifizierungslink an Ihre E-Mail-Adresse gesendet.',
    'verify-check' => 'Bevor Sie fortfahren, überprüfen Sie bitte, ob Sie einen Verifizierungslink per E-Mail erhalten haben.',
    'verify-request' => 'Wenn Sie die E-Mail nicht erhalten haben, können Sie eine weitere anfordern.',
    'verify-resend' => 'Rückgabe',

    'need-confirm' => 'Bitte überprüfen Sie Ihr Passwort, bevor Sie fortfahren.',

    'mail' => [
        'reset' => [
            'subject' => 'Benachrichtigung beim Zurücksetzen des Passworts',
            'line-1' => 'Sie erhalten diese E-Mail, weil wir eine Anfrage zum Zurücksetzen des Passworts für Ihr Konto erhalten haben.',
            'action' => 'Passwort zurücksetzen',
            'line-2' => 'Dieser Link wird in :count Minuten ablaufen.',
            'line-3' => 'Wenn Sie keine Passwortrücksetzung angefordert haben, können Sie diese E-Mail ignorieren.',
        ],

        'verify' => [
            'subject' => 'Prüfen der E-Mail Adresse',
            'line-1' => 'Bitte klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu verifizieren.',
            'action' => 'Überprüfen Sie die E-Mail Adresse.',
            'line-2' => 'Wenn Sie noch kein Konto eingerichtet haben, können Sie diese E-Mail ignorieren.',
        ],
    ],
];
