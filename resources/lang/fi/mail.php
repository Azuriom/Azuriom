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

    'hello' => 'Hei!',
    'whoops' => 'Hups!',

    'regards' => 'Terveisin,',

    'link' => "Jos sinulla on ongelmia klikkaamalla \":actionText\" -painiketta, kopioi ja liitä alla oleva URL selaimellasi: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Kaikki oikeudet pidätetään.',

    'test' => [
        'subject' => 'Testaa postia :name',
        'content' => 'Jos näet tämän sähköpostiviestin, se tarkoittaa, että sähköpostien lähettäminen :name toimii!',
    ],

    'delete' => [
        'subject' => 'Tilin poistopyyntö',
        'line1' => 'Saat tämän sähköpostin sillä tilisi pyydettiin poistamaan.',
        'action' => 'Poista tilini',
        'line2' => 'Tätä toimintoa ei voi peruuttaa. Tämä poistaa pysyvästi tilisi ja siihen liittyvät tiedot. Tämä linkki päättyy :count minuutissa.',
        'line3' => 'Jos et ole pyytänyt tilisi poistoa, ole hyvä ja tarkista turva-asetukset.',
    ],
];
