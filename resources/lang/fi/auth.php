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

    'failed' => 'Nämä tiedot eivät vastaa tietojamme.',
    'throttle' => 'Liikaa kirjautumisyrityksiä. Yritä uudelleen :seconds sekunnin päästä.',

    'register' => 'Rekisteröidy',
    'login' => 'Kirjaudu',
    'logout' => 'Kirjaudu ulos',
    'verify' => 'Varmista sähköpostiosoitteesi',
    'passwords' => [
        'confirm' => 'Vahvista salasana',
        'reset' => 'Palauta salasana',
        'send' => 'Lähetä salasanan palautuslinkki',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => 'Käyttäjänimi',
    'email' => 'Sähköpostiosoite',
    'password' => 'Salasana',
    'confirm_password' => 'Vahvista salasana',
    'current_password' => 'Nykyinen salasana',

    'conditions' => 'Hyväksyn <a href=":url" target="_blank">ehdot</a>.',

    '2fa' => [
        'code' => 'Kaksivaiheisen vahvistuksen koodi',
        'invalid' => 'Virheellinen koodi',
    ],

    'suspended' => 'Käyttäjätili on jäädytetty.',

    'maintenance' => 'Sivustoa ylläpidetään parhaillaan.',

    'remember' => 'Muista minut',
    'forgot_password' => 'Unohditko salasanasi?',

    'verification' => [
        'sent' => 'Vahvistuslinkki on lähetetty antamaasi sähköpostiosoitteeseen.',
        'check' => 'Ennen kuin jatkat, varmista sähköpostisi.',
        'request' => 'Jos et saanut sähköpostia, voit pyytää toista.',
        'resend' => 'Lähetä sähköposti uudelleen',
    ],

    'confirmation' => 'Vahvista salasanasi jatkaaksesi.',

    'mail' => [
        'reset' => [
            'subject' => 'Nollaa Salasanan Ilmoitus',
            'line1' => 'Saat tämän sähköpostin sillä tilisi salasana pyydettiin palauttamaan.',
            'action' => 'Nollaa Salasana',
            'line2' => 'Tämä salasanan nollauslinkki vanhenee :count minuutissa.',
            'line3' => 'Jos et ole pyytänyt salasanan palauttamista, lisätoimia ei tarvita.',
        ],

        'verify' => [
            'subject' => 'Varmista sähköpostiosoite',
            'line1' => 'Kikkaa alla olevaa painiketta vahvistaaksesi sähköpostiosoitteesi.',
            'action' => 'Varmista sähköpostiosoite',
            'line2' => 'Jos et ole luonut tiliä, lisätoimia ei tarvita.',
        ],
    ],
];
