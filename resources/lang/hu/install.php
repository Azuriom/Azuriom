<?php

return [
    'title' => 'Telepítés',

    'welcome' => 'Az Azuriom egy <strong>következő generációs</strong> játék CMS, <strong>ingyenes</strong> és <strong>nyílt forráskódú</strong>, valamint <strong>modern, megbízható, gyors és biztonságos</strong> alternatívája a meglévő CMS-nek, így a <strong>legjobb internetes élményben részesítheted</strong>.',

    'back' => 'Vissza',

    'requirements' => [
        'php' => 'PHP :version vagy magasabb',
        'writable' => 'Engedélyek írása',
        'rewrite' => 'URL átírás engedélyezve',
        'extension' => 'Bővítmény :extension',
        'function' => ':function funkció engedélyezve',
        '64bit' => '64-bit PHP',

        'refresh' => 'Frissítési követelmények',
        'success' => 'Az Azuriom készen áll a konfigurálásra!',
        'missing' => 'A szervered nem rendelkezik az Azuriom telepítéséhez szükséges követelményekkel.',

        'help' => [
            'writable' => 'Kipróbálhatod ezt a parancsot az írási engedély megadásához: <code>:command</code>.',
            'rewrite' => 'Az URL átírásának engedélyezéséhez követheted a <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">dokumentációnkban</a> található utasításokat.',
            'htaccess' => 'A <code>.htaccess</code> vagy a <code>public/.htaccess</code> fájl hiányzik. Győződjön meg arról, hogy engedélyezte a rejtett fájlokat, és hogy a fájl jelen van.',
            'extension' => 'Kipróbálhatod ezt a parancsot a hiányzó PHP-bővítmények telepítéséhez: <code>:command</code>.<br>Ha kész, indítsa újra az Apache-t vagy az Nginx-et.',
            'function' => 'Ezt a funkciót a PHP php.ini fájljában kell engedélyeznie a <code>disable_functions</code> értékének szerkesztésével.',
        ],
    ],

    'database' => [
        'title' => 'Adatbázis',

        'type' => 'Típus',
        'host' => 'Kiszolgáló',
        'port' => 'Port',
        'database' => 'Adatbázis',
        'user' => 'Felhasználó',
        'password' => 'Jelszó',

        'warn' => 'Ez az adatbázis-típus nem ajánlott, és csak akkor használható, ha másképp nem lehetséges.',
    ],

    'game' => [
        'title' => 'Játék',

        'locale' => 'Régió',

        'warn' => 'Legyen óvatos, ha a telepítés befejeződött, ezt nem lehet megváltoztatni az Azuriom teljes újratelepítése nélkül!',

        'install' => 'Telepítés',

        'user' => [
            'title' => 'Adminisztrátori fiók',

            'name' => 'Név',
            'email' => 'E-mail cím',
            'password' => 'Jelszó',
            'password_confirm' => 'Jelszó megerősítése',
        ],

        'minecraft' => [
            'premium' => 'Bejelentkezés Microsoft-fiókkal (a legbiztonságosabb, de a Minecraft megvásárlását igényli)',
        ],

        'steam' => [
            'profile' => 'Steam profil URL-je',
            'profile_info' => 'Ez a Steam felhasználó lesz az adminisztrátor az oldalon.',

            'key' => 'Steam API kulcs',
            'key_info' => 'Steam API-kulcsodat a <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a> oldalon találod.',
        ],
    ],

    'success' => [
        'thanks' => 'Köszönjük, hogy az Azuriomot válaszottad!',
        'success' => 'A weboldaladat sikeresen telepítettük, most már használhatod a weboldaladat és készíthetsz valami fantasztikusat!',
        'go' => 'Kezdjünk bele',
        'support' => 'Ha értékeled az Azuriomot és az általunk végzett munkát, kérjük, ne felejts el <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">támogatni minket</a>.',
    ],
];
