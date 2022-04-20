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

    'failed' => 'Tyto přihlašovací údaje neodpovídají našim záznamům.',
    'throttle' => 'Příliš mnoho pokusů o přihlášení. Zkuste to prosím znovu za :seconds sekund.',

    'register' => 'Zaregistrovat se',
    'login' => 'Přihlásit se',
    'logout' => 'Odhlásit se',
    'verify' => 'Ověřte svou e-mailovou adresu',
    'passwords' => [
        'confirm' => 'Potvrdit heslo',
        'reset' => 'Obnovit heslo',
        'send' => 'Odeslat odkaz pro obnovení hesla',
    ],

    'name' => 'Uživatelské jméno',
    'email' => 'E-mailová adresa',
    'password' => 'Heslo',
    'confirm_password' => 'Potvrďte heslo',
    'current_password' => 'Současné heslo',

    'conditions' => 'Souhlasím s <a href=":url" target="_blank">podmínkami</a>.',

    '2fa' => [
        'code' => 'Kód dvoufázového ověření',
        'invalid' => 'Neplatný kód',
    ],

    'suspended' => 'Tento účet je pozastaven.',

    'maintenance' => 'Na webu probíhá údržba.',

    'remember' => 'Zapamatovat si mě',
    'forgot_password' => 'Zapomněli jste heslo?',

    'verification' => [
        'sent' => 'Na vaši e-mailovou adresu byl odeslán odkaz k ověření.',
        'check' => 'Před pokračováním zkontrolujte svůj e-mail pro ověřovací odkaz.',
        'request' => 'Pokud jste neobdrželi e-mail, můžete zažádat o jiný.',
        'resend' => 'Znovu odeslat e-mail',
    ],

    'confirmation' => 'Před pokračováním prosím potvrďte své heslo.',

    'mail' => [
        'reset' => [
            'subject' => 'Oznámení o obnově hesla',
            'line1' => 'Tento e-mail jste obdrželi, protože jsme obdrželi žádost o obnovení hesla k vašemu účtu.',
            'action' => 'Obnovit heslo',
            'line2' => 'Tento odkaz pro obnovení hesla vyprší za :count minut.',
            'line3' => 'Pokud jste o obnovení hesla nepožádali, není vyžadována žádná další akce.',
        ],

        'verify' => [
            'subject' => 'Ověřit e-mailovou adresu',
            'line1' => 'Pro ověření vaší e-mailové adresy klikněte na tlačítko níže.',
            'action' => 'Ověřit e-mailovou adresu',
            'line2' => 'Pokud jste si nevytvořili účet, není vyžadována žádná další akce.',
        ],
    ],
];
