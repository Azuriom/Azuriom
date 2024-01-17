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

    'hello' => 'Hallo!',
    'whoops' => 'Hoppla!',

    'regards' => 'Grüße,',

    'link' => "Wenn du Probleme beim Klicken auf die Schaltfläche \":actionText\" hast, kopiere die folgende URL und füge sie in deinen Webbrowser ein: [:displayableActionUrl] (:actionURL)",

    'copyright' => '&copy; :year :name. Alle Rechte vorbehalten.',

    'test' => [
        'subject' => 'Test Mail an :name',
        'content' => 'Wenn du diese E-Mail sehen kannst, bedeutet es, dass das Senden von E-Mails von :name funktioniert!',
    ],

    'delete' => [
        'subject' => 'Antrag auf Kontolöschung',
        'line1' => 'Du erhältst diese E-Mail, weil wir eine Löschanfrage für dein Konto erhalten haben.',
        'action' => 'Mein Konto löschen',
        'line2' => 'Diese Aktion kann nicht rückgängig gemacht werden. Dadurch werden dein Konto und die zugehörigen Daten dauerhaft gelöscht. Dieser Link läuft in :count Minuten ab.',
        'line3' => 'Wenn du die Löschung deines Kontos nicht angefordert hast, überprüfe bitte unbedingt deine Sicherheitseinstellungen.',
    ],
];
