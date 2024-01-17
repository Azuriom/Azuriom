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

    'failed' => 'Uppgifterna stämmer inte överrens med våra register.',
    'throttle' => 'För många inloggningsförsök. Vänligen försök igen om :seconds sekunder.',

    'register' => 'Registrera dig',
    'login' => 'Logga in',
    'logout' => 'Logga ut',
    'verify' => 'Verifiera Din E-postadress',
    'passwords' => [
        'confirm' => 'Bekräfta lösenord',
        'reset' => 'Återställ lösenord',
        'send' => 'Skicka länk för lösenordsåterställning',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => 'Användarnamn',
    'email' => 'Emailadress',
    'password' => 'Lösenord',
    'confirm_password' => 'Bekräfta lösenord',
    'current_password' => 'Nuvarande lösenord',

    'conditions' => 'Jag accepterar <a href=":url" target="_blank"> villkoren </a>.',

    '2fa' => [
        'code' => 'Tvåfaktorsautentisering',
        'invalid' => 'Ogiltig kod',
    ],

    'suspended' => 'Kontot är avstängt.',

    'maintenance' => 'Webbplatsen är under underhåll.',

    'remember' => 'Kom ihåg mig',
    'forgot_password' => 'Glömt lösenordet?',

    'verification' => [
        'sent' => 'En ny verifieringslänk har skickats till din e-postadress.',
        'check' => 'Innan du fortsätter, kontrollera din e-post efter en verifieringslänk.',
        'request' => 'Om du inte fick e-postmeddelandet kan du begära en annan.',
        'resend' => 'Skicka e-post igen',
    ],

    'confirmation' => 'Vänligen bekräfta ditt lösenord för att fortsätta.',

    'mail' => [
        'reset' => [
            'subject' => 'Återställ lösenordsnotifiering',
            'line1' => 'Du får detta mail eftersom vi fått en begäran om att återställa lösenordet till ditt konto.',
            'action' => 'Återställ lösenord',
            'line2' => 'Denna länk för återställning av lösenord kommer att löpa ut om :count minuter.',
            'line3' => 'Om du inte begärt att få ditt lösenord återställt behöver du inte göra någonting.',
        ],

        'verify' => [
            'subject' => 'Verifiera e-postadress',
            'line1' => 'Klicka på länken nedan för att validera din e-postadress.',
            'action' => 'Verifiera e-postadress',
            'line2' => 'Om du inte har skapat ett konto krävs inga ytterligare åtgärder.',
        ],
    ],
];
