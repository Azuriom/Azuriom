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

    'hello' => 'Cześć!',
    'whoops' => 'Ups!',

    'regards' => 'Z poważaniem,',

    'link' => "Jeśli masz problem z kliknięciem przycisku \":actionText\", skopiuj poniższy adres URL i wklej go w przeglądarce internetowej: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Wszelkie prawa zastrzeżone.',

    'test' => [
        'subject' => 'Testowy e-mail :name',
        'content' => 'Jeżeli widzisz ten e-mail, oznacza to że wysyłanie e-mailów z :name działa!',
    ],

    'delete' => [
        'subject' => 'Prośba o usunięcie konta',
        'line1' => 'Otrzymujesz tę wiadomość, ponieważ otrzymaliśmy prośbę o usunięcie Twojego konta.',
        'action' => 'Usuń moje konto',
        'line2' => 'Tej akcji nie można cofnąć. Spowoduje to trwałe usunięcie Twojego konta i powiązanych danych. Link wygaśnie za :count minut.',
        'line3' => 'Jeżeli to nie ty prosiłeś o usunięcie konta, sprawdź swoje ustawienia bezpieczeństwa. ',
    ],
];
