<?php

return [
    'title' => 'Installera',

    'welcome' => 'Azuriom är <strong>nästa generations</strong> spel CMS, det är <strong>gratis</strong> och <strong>öppen källkod</strong>, och är en <strong>modern, tillförlitliga, snabba och säkra</strong> alternativ till befintliga CMS så att du kan ha <strong>bästa webbupplevelse möjligt</strong>.',

    'back' => 'Tillbaka',

    'requirements' => [
        'php' => 'PHP {version} eller högre',
        'writable' => 'Skriva behörighet',
        'rewrite' => 'URL omskrivning aktiverad',
        'extension' => 'Förlängning :extension',
        'function' => 'Funktion :function aktiverad',
        '64bit' => '64-bit PHP',

        'refresh' => 'Uppdatera krav',
        'success' => 'Termostater redo för konfiguration',
        'missing' => 'Din server har inte de nödvändiga kraven för att installera Azuriom.',

        'help' => [
            'writable' => 'Du kan prova detta kommando för att bevilja skrivbehörighet: <code>:command</code>.',
            'rewrite' => 'Du kan följa instruktionerna i <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">vår dokumentation</a> för att aktivera URL-omskrivning.',
            'htaccess' => 'Filen <code>.htaccess</code> eller <code>public/.htaccess</code> saknas. Kontrollera att du har aktiverat dolda filer och att filen är närvarande.',
            'extension' => 'Du kan prova detta kommando för att installera de saknade PHP-tilläggen: <code>:command</code>.<br>När detta är gjort, starta om Apache eller Nginx.',
            'function' => 'Du måste aktivera denna funktion i php.ini filen PHP genom att redigera värdet <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Database',

        'type' => 'Typ',
        'host' => 'Värddator',
        'port' => 'Port',
        'database' => 'Database',
        'user' => 'Användare',
        'password' => 'Lösenord',

        'warn' => 'Denna databastyp rekommenderas inte och bör endast användas när det inte är möjligt att göra något annat.',
    ],

    'game' => [
        'title' => 'Spel',

        'locale' => 'Språk',

        'warn' => 'Var försiktig, när installationen är klar kommer det inte att vara möjligt att ändra detta utan att installera om Azuriom helt!',

        'install' => 'Installera',

        'user' => [
            'title' => 'Administratörskonto',

            'name' => 'Namn',
            'email' => 'E-postadress',
            'password' => 'Lösenord',
            'password_confirm' => 'Bekräfta lösenord',
        ],

        'minecraft' => [
            'premium' => 'Logga in med Microsoft-konto (säkrast men måste ha köpt Minecraft)',
        ],

        'steam' => [
            'profile' => 'Steam Profile URL',
            'profile_info' => 'Denna Steam-användare kommer att vara admin på webbplatsen.',

            'key' => 'Steam API-nyckel',
            'key_info' => 'Du kan hitta din Steam API-nyckel på <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Tack för att du väljer Azuriom !',
        'success' => 'Din webbplats har installerats framgångsrikt, du kan nu använda din webbplats och göra något häftigt !',
        'go' => 'Kom igång',
        'support' => 'Om du uppskattar Azuriom och det arbete vi tillhandahåller, glöm inte att <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">stödja oss</a>.',
    ],
];
