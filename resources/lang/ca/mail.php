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

    'hello' => 'Hola!',
    'whoops' => 'Vaja!',

    'regards' => 'Cordialment,',

    'link' => "Si teniu problemes per fer clic al botó \":actionText\", copieu i enganxeu l'URL següent al vostre navegador web: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Tots els drets reservats.',

    'test' => [
        'subject' => 'Provar correu electrònic en :name',
        'content' => 'Si pot veure aquest e-mail, significa que enviar correus des de :name funciona!',
    ],

    'delete' => [
        'subject' => 'Account deletion request',
        'line1' => 'You are receiving this email because we received a deletion request for your account.',
        'action' => 'Delete my account',
        'line2' => 'This action cannot be undone. This will permanently delete your account and associated data. This link will expire in :count minutes.',
        'line3' => 'If you did not request your account deletion, please make sure to review your security settings.',
    ],
];
