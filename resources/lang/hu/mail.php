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

    'hello' => 'Helló!',
    'whoops' => 'Hoppá!',

    'regards' => 'Üdvözlettel,',

    'link' => "Ha probléma merül fel a(z) \":actionButton\" gomb megnyomásakor, másold ki és illeszd be a lenti URL-t a böngésződbe: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Minden jog fenntartva.',

    'test' => [
        'subject' => ':name teszt e-mail',
        'content' => 'Ha látod ezt az e-mailt, az azt jelenti, hogy az e-mailek küldése a(z) :name weboldalról működik!',
    ],

    'delete' => [
        'subject' => 'Fiók törlési kérelem',
        'line1' => 'Azért kapja ezt az e-mailt, mert törlési kérelmet kaptunk a fiókjára vonatkozóan.
',
        'action' => 'Saját fiók törlése',
        'line2' => 'Ezt a műveletet nem lehet visszacsinálni. Ez véglegesen törli a fiókját és a kapcsolódó adatokat. Ez a link :count perc múlva lejár.
',
        'line3' => 'Ha nem kérte fiókja törlését, kérjük, ellenőrizze biztonsági beállításait.
',
    ],
];
