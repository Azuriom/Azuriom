<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the mail library to build
    | the mails layout.
    |
    */

    'hello' => 'Dobrý den!',
    'whoops' => 'Jejda!',

    'regards' => 'S pozdravem,',

    'link' => "Pokud máte problémy s kliknutím na tlačítko \":actionText\", zkopírujte a vložte URL níže do vašeho webového prohlížeče: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Všechna práva vyhrazena.',

    'test' => [
        'subject' => 'Testovací e-mail na :name',
        'content' => 'Pokud vidíte tento e-mail, znamená to, že odesílání e-mailů z :name funguje!',
    ],

    'delete' => [
        'subject' => 'Žádost o odstranění účtu',
        'line1' => 'Tento e-mail jste obdrželi, protože jsme obdrželi žádost o odstranění vašeho účtu.',
        'action' => 'Odstranit můj účet',
        'line2' => 'Tuto akci nelze vrátit zpět. Tato akce nevratně odstraní váš účet a související data. Tento odkaz vyprší za :count minut.',
        'line3' => 'Pokud jste nepožádali o odstranění svého účtu, zkontrolujte prosím nastavení zabezpečení vašeho účtu.',
    ],
];
