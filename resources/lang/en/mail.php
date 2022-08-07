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

    'hello' => 'Hello!',
    'whoops' => 'Whoops!',

    'regards' => 'Regards,',

    'link' => "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below into your web browser: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. All rights reserved.',

    'test' => [
        'subject' => 'Test mail on :name',
        'content' => 'If you can see this email, it means that sending emails from :name is working!',
    ],

    'delete' => [
        'subject' => 'Account deletion request',
        'line1' => 'You are receiving this email because we received a deletion request for your account.',
        'action' => 'Delete my account',
        'line2' => 'This action cannot be undone. This will permanently delete your account and associated data. This link will expire in :count minutes.',
        'line3' => 'If you did not request your account deletion, please make sure to review your security settings.',
    ],
];
