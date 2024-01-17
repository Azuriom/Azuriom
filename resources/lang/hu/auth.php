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

    'failed' => 'Ezek a hitelesítő adatok nem egyeznek meg a tároltakkal.',
    'throttle' => 'Túl sok bejelentkezési kísérlet. Kérlek, próbáld újra :seconds másodperc múlva.',

    'register' => 'Regisztráció',
    'login' => 'Bejelentkezés',
    'logout' => 'Kijelentkezés',
    'verify' => 'Erõsítsd meg az e-mail-címed',
    'passwords' => [
        'confirm' => 'Jelszó megerősítése',
        'reset' => 'Jelszó visszaállítása',
        'send' => 'Jelszó-visszaállítási link küldése',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => 'Felhasználónév',
    'email' => 'E-mail cím',
    'password' => 'Jelszó',
    'confirm_password' => 'Jelszó megerősítése',
    'current_password' => 'Jelenlegi jelszó',

    'conditions' => 'Elfogadom a <a href=":url" target="_blank">feltételeket</a>.',

    '2fa' => [
        'code' => 'Kétlépcsős hitelesítő kód',
        'invalid' => 'Érvénytelen kód',
    ],

    'suspended' => 'Ez a fiók fel van függesztve.',

    'maintenance' => 'A weboldal jelenleg karbantartás alatt van.',

    'remember' => 'Emlékezzen rám',
    'forgot_password' => 'Elfelejtetted a jelszavad?',

    'verification' => [
        'sent' => 'Egy új megerősítő linket küldtünk az e-mail címedre.',
        'check' => 'Mielőtt folytatnád, nézd meg az e-mailjeidet és keresd meg a megerősítő linket, amit küldtünk.',
        'request' => 'Ha nem kaptad meg az e-mailt, kérhetsz újat.',
        'resend' => 'E-mail újraküldése',
    ],

    'confirmation' => 'Erősítsd meg a jelszavadat a folytatáshoz.',

    'mail' => [
        'reset' => [
            'subject' => 'Jelszó-visszaállítási Emlékeztető',
            'line1' => 'Azért kaptad ezt az e-mailt, mert valaki jelszó-visszaállítást kért a fiókodra.',
            'action' => 'Jelszó visszaállítása',
            'line2' => 'Ez a jelszó-visszaállítási link :count perc múlva lejár.',
            'line3' => 'Ha nem kértél jelszó-visszaállítást, nincs további teendőd.',
        ],

        'verify' => [
            'subject' => 'E-mail Cím Megerősítése',
            'line1' => 'Kattints a lenti gombra az e-mail címed megerősítéséhez.',
            'action' => 'E-mail Cím Megerősítése',
            'line2' => 'Ha nem hoztál létre fiókot, nincs további teendőd.',
        ],
    ],
];
