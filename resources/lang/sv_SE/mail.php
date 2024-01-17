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

    'hello' => 'Hej!',
    'whoops' => 'Hoppsan!',

    'regards' => 'Hälsningar',

    'link' => "Om du har problem med att klicka på knappen \":actionText\", kopiera och klistra in URL:en nedan i din webbläsare: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Alla rättigheter reserverade.',

    'test' => [
        'subject' => 'Testa e-post på :name',
        'content' => 'Om du kan se detta e-postmeddelande innebär det att skicka e-post från :name fungerar!',
    ],

    'delete' => [
        'subject' => 'Begäran om borttagning av konto',
        'line1' => 'Du får detta e-postmeddelande eftersom vi fick en begäran om borttagning av ditt konto.',
        'action' => 'Ta bort mitt konto',
        'line2' => 'Denna åtgärd kan inte ångras. Detta kommer att permanent radera ditt konto och tillhörande data. Denna länk kommer att löpa ut om :count minuter.',
        'line3' => 'Om du inte har begärt borttagning av ditt konto, se till att kontrollera dina säkerhetsinställningar.',
    ],
];
