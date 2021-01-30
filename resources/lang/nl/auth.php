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

    'failed' => 'Deze gegevens komen niet overeen met onze gegevens.',
    'throttle' => 'Te veel inlogpogingen. Probeer het over :seconds seconden opnieuw.',

    'register' => 'Registreren',
    'login' => 'Log in',
    'logout' => 'Uitloggen',
    'verify' => 'Verifieer uw e-mailadres',
    'passwords' => [
        'confirm' => 'Bevestig wachtwoord',
        'reset' => 'Wachtwoord opnieuw instellen',
        'send' => 'Send Password Reset Link',
    ],

    'name' => 'Gebruikersnaam',
    'email' => 'E-mailadres',
    'password' => 'Wachtwoord',
    'confirm-password' => 'Bevestig wachtwoord',
    'current-password' => 'Huidig wachtwoord',

    'conditions' => 'Ik accepteer de <a href=":url" target="_blank">voorwaarden</a>.',

    '2fa-code' => 'Twee-factorenauthenticatiecode',
    '2fa-invalid' => 'Ongeldige code',

    'suspended' => 'Dit account is opgeschort.',

    'maintenance' => 'De website is in onderhoud.',

    'remember-me' => 'Onthoud me',
    'forgot-password' => 'Uw wachtwoord vergeten?',

    'verify-sent' => 'Er is een nieuwe verificatielink naar uw e-mailadres gestuurd.',
    'verify-check' => 'Controleer voordat u verder gaat uw e-mail voor een verificatielink.',
    'verify-request' => 'Als u de e-mail niet heeft ontvangen, kunt u een andere aanvragen.',
    'verify-resend' => 'E-mail opnieuw verzenden',

    'need-confirm' => 'Bevestig uw wachtwoord voordat u doorgaat.',

    'mail' => [
        'reset' => [
            'subject' => 'Wachtwoordmelding opnieuw instellen',
            'line-1' => 'U ontvangt deze e-mail omdat we een verzoek om het wachtwoord opnieuw in te stellen voor uw account hebben ontvangen.',
            'action' => 'Wachtwoord opnieuw instellen',
            'line-2' => 'Deze link voor het opnieuw instellen van het wachtwoord verloopt over :count minuten.',
            'line-3' => 'Als u geen wachtwoordreset heeft aangevraagd, hoeft u verder niets te doen.',
        ],

        'verify' => [
            'subject' => 'Bevestig e-mail adres',
            'line-1' => 'Klik op de onderstaande knop om uw e-mailadres te verifiëren.',
            'action' => 'Bevestig e-mail adres',
            'line-2' => 'Als u geen account heeft aangemaakt, hoeft u verder niets te doen.',
        ],
    ],
];
