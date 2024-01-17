<?php

return [

    'lang' => 'Suomi',

    'date' => [
        'default' => 'F j, Y',
        'full' => 'F j, Y \a\t G.i',
        'compact' => 'd/m/Y \a\t G.i',
    ],

    'nav' => [
        'toggle' => 'Näytä/piilota navigointi',
        'profile' => 'Profiili',
        'admin' => 'Admin paneeli',
    ],

    'actions' => [
        'add' => 'Lisää',
        'back' => 'Takaisin',
        'browse' => 'Selaa',
        'cancel' => 'Peruuta',
        'choose_file' => 'Valitse tiedosto',
        'close' => 'Sulje',
        'comment' => 'Kommentoi',
        'continue' => 'Jatka',
        'copy' => 'Kopioi',
        'create' => 'Luo',
        'delete' => 'Poista',
        'disable' => 'Poista käytöstä',
        'download' => 'Lataa',
        'duplicate' => 'Luo kopio',
        'edit' => 'Muokkaa',
        'enable' => 'Ota käyttöön',
        'generate' => 'Luo',
        'install' => 'Asenna',
        'refresh' => 'Päivitä',
        'reload' => 'Lataa uudelleen',
        'remove' => 'Poista',
        'save' => 'Tallenna',
        'search' => 'Hae',
        'send' => 'Lähetä',
        'show' => 'Näytä',
        'update' => 'Päivitä',
        'upload' => 'Lähetä',
    ],

    'fields' => [
        'action' => 'Toiminto',
        'address' => 'Osoite',
        'author' => 'Tekijä',
        'category' => 'Kategoria',
        'color' => 'Väri',
        'content' => 'Sisältö',
        'date' => 'Päivämäärä',
        'description' => 'Kuvaus',
        'enabled' => 'Käytössä',
        'file' => 'Tiedosto',
        'game' => 'Peli',
        'icon' => 'Kuvake',
        'image' => 'Kuva',
        'link' => 'Linkki',
        'money' => 'Raha',
        'name' => 'Nimi',
        'permissions' => 'Käyttöoikeudet',
        'port' => 'Portti',
        'price' => 'Hinta',
        'published_at' => 'Julkaistu',
        'quantity' => 'Määrä',
        'role' => 'Rooli',
        'server' => 'Palvelin',
        'short_description' => 'Lyhyt kuvaus',
        'slug' => 'Tunniste',
        'status' => 'Tila',
        'title' => 'Otsikko',
        'type' => 'Tyyppi',
        'url' => 'URL-osoite',
        'user' => 'Käyttäjä',
        'value' => 'Arvo',
        'version' => 'Versio',
    ],

    'status' => [
        'success' => 'Toiminto suoritettiin onnistuneesti!',
        'error' => 'Tapahtui virhe: :error',
    ],

    'range' => [
        'days' => 'Päivien mukaan',
        'months' => 'Kuukausien mukaan',
    ],

    'loading' => 'Ladataan...',

    'yes' => 'Kyllä',
    'no' => 'Ei',
    'unknown' => 'Tuntematon',
    'other' => 'Muu',
    'none' => 'Ei mitään',
    'copied' => 'Kopioitu',
    'icons' => 'Löydät luettelon käytettävissä olevista kuvakkeista <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">FontAwesome</a>.',

    'home' => 'Koti',
    'servers' => 'Palvelimet',
    'news' => 'Uutiset',
    'welcome' => 'Tervetuloa, :name',
    'copyright' => 'Palvelun tarjoaa <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Huoltokatko',
        'message' => 'Sivustoa remontoidaan parhaillaan.',
    ],

    'theme' => [
        'light' => 'Vaalea teema',
        'dark' => 'Tumma teema',
    ],

    'captcha' => 'Captcha-vahvistus epäonnistui, yritä uudelleen.',

    'notifications' => [
        'notifications' => 'Ilmoitukset',
        'read' => 'Merkitse luetuksi',
        'empty' => 'Sinulla ei ole lukemattomia ilmoituksia.',
        'level' => 'Taso',
        'info' => 'Tietoa',
        'warning' => 'Varoitus',
        'danger' => 'Vaara',
        'success' => 'Onnistui',
    ],

    'clipboard' => [
        'copied' => 'Kopioitu!',
        'error' => 'CTRL + C kopioidaksesi',
    ],

    'server' => [
        'join' => 'Liity',
        'total' => ':count/:max player|:count/:max online players',
        'online' => ':count online-pelaaja:count online-pelaajat',
        'offline' => 'Palvelin on tällä hetkellä pois käytöstä.',
    ],

    'profile' => [
        'title' => 'Profiilini',
        'change_email' => 'Vaihda sähköpostiosoite',
        'change_password' => 'Vaihda salasana',
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => 'Poista tilini',
            'title' => 'Tilin poisto',
            'info' => 'Tämä poistaa pysyvästi tilisi ja siihen liittyvät tiedot. Tätä toimintoa ei voi peruuttaa.',
            'email' => 'Lähetämme sinulle vahvistuksen sähköpostiisi vahvistaaksemme tämän toiminnon.',
            'sent' => 'Vahvistuslinkki on lähetetty sähköpostiosoitteeseen %s.',
            'success' => 'Tilisi on poistettu!',
        ],

        'email_verification' => 'Ennen kuin jatkat, varmista sähköpostisi.',
        'updated' => 'Profiilisi on päivitetty.',

        'info' => [
            'role' => 'Rooli: %%role%%',
            'register' => 'Rekisteröitynyt: :date',
            'money' => 'Raha: :money',
            '2fa' => 'Kaksivaiheinen todennus (2FA)',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => 'Ota 2FA käyttöön',
            'disable' => 'Poista 2FA käytöstä',
            'manage' => 'Hallitse 2FA:ta',
            'info' => 'Skannaa yllä oleva QR-koodi puhelimesi kaksivaiheisella autentikointisovelluksella, kuten <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> tai Google Authenticator.',
            'secret' => 'Salainen avain: :secret',
            'title' => 'Kaksivaiheinen tunnistautuminen',
            'codes' => 'Näytä palautuskoodi',
            'code' => 'Koodi',
            'enabled' => 'Kaksivaiheinen todennus on tällä hetkellä käytössä. Älä unohda tallentaa palautuskoodeja!',
            'disabled' => 'Kaksivaiheinen tunnistautuminen pois käytöstä.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => 'Rahan siirto',
            'user' => 'This user was not found.',
            'balance' => 'Sinulla ei ole tarpeeksi rahaa tämän siirron tekemiseen.',
            'success' => 'Raha lähetettiin onnistuneesti.',
            'notification' => ':user lähetti sinulle :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Julkaisut',
        'posted' => 'Julkaistu :date käyttäjältä :user',
        'unpublished' => 'Tätä postausta ei ole vielä julkaistu.',
        'read' => 'Lue lisää',
    ],

    'comments' => [
        'create' => 'Jätä kommentti',
        'guest' => 'Sinun täytyy olla kirjautunut sisään lisätäksesi kommentteja.',
        'author' => '<strong>:user</strong> kommentoi :date',
        'content' => 'Kommenttisi',
        'delete' => 'Poista?',
        'delete_confirm' => 'Oletko varma, että haluat poistaa tämän kommentin?',
    ],

    'likes' => 'Tykkäykset :count',

    'markdown' => [
        'init' => 'Attach files by drag and dropping or pasting from clipboard.',
        'drag' => 'Drop image to upload it.',
        'drop' => 'Uploading image #images_names#...',
        'progress' => 'Uploading #file_name#: #progress#%',
        'uploaded' => 'Uploaded #image_name#',

        'size' => 'Image #image_name# is too big (#image_size#).\nMaximum file size is #image_max_size#.',
        'error' => 'Something went wrong when uploading the image #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Role ID',
            'description' => 'ID of the role on the website.',
        ],

        'power' => [
            'name' => 'Role Power',
            'description' => 'Power of the role on the website equal or greater than',
        ],
    ],
];
