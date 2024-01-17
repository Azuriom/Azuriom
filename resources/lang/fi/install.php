<?php

return [
    'title' => 'Asennus',

    'welcome' => 'Azuriom on <strong>seuraavan sukupolven</strong> peli CMS, se on <strong>ilmainen</strong> ja <strong>avoimen lähdekoodin</strong>, ja on <strong>moderni, luotettava, nopea ja turvallinen</strong> vaihtoehto olemassa olevalle CMS-järjestelmälle, joten voit saada <strong>parhaan mahdollisen web-kokemuksen</strong>.',

    'back' => 'Takaisin',

    'requirements' => [
        'php' => 'PHP :version tai uudempi',
        'writable' => 'Kirjoita käyttöoikeus',
        'rewrite' => 'URL-uudelleenohjaus käytössä',
        'extension' => 'Laajennus :extension',
        'function' => 'Funktio :function käytössä',
        '64bit' => '64-bittinen PHP',

        'refresh' => 'Päivitys on tarpeen',
        'success' => 'Azuriom on valmis konfiguroitavaksi!',
        'missing' => 'Palvelimellasi ei ole Azuriomin asentamiseen tarvittavia vaatimuksia.',

        'help' => [
            'writable' => 'Voit kokeilla tätä komentoa myöntääksesi kirjoitusoikeuden: <code>:command</code>.',
            'rewrite' => 'Voit seurata ohjeita <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">meidän dokumentaatiossa</a> ottaaksesi URL-osoitteen uudelleenkirjoittamisen käyttöön.',
            'htaccess' => 'Tiedosto <code>.htaccess</code> tai <code>julkinen /.htaccess</code> puuttuu. Varmista, että olet ottanut käyttöön piilotetut tiedostot ja että tiedosto on läsnä.',
            'extension' => 'Voit kokeilla tätä komentoa asentaaksesi puuttuvat PHP-lisäosat: <code>:command</code>.<br>Kun olet valmis, käynnistä Apache tai Nginx.',
            'function' => 'Sinun täytyy ottaa tämä toiminto käyttöön PHP:n php.ini tiedostossa muokkaamalla arvoa <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Tietokanta',

        'type' => 'Tyyppi',
        'host' => 'Isäntä',
        'port' => 'Portti',
        'database' => 'Tietokanta',
        'user' => 'Käyttäjä',
        'password' => 'Salasana',

        'warn' => 'Tätä tietokantatyyppiä ei suositella, ja sitä tulisi käyttää vain, jos se ei ole mahdollista toisin.',
    ],

    'game' => [
        'title' => 'Peli',

        'locale' => 'Alueasetus',

        'warn' => 'Varo, kun asennus on valmis, tätä ei ole mahdollista muuttaa ilman Azuriomin uudelleenasennusta!',

        'install' => 'Asenna',

        'user' => [
            'title' => 'Ylläpitäjän tili',

            'name' => 'Nimi',
            'email' => 'Sähköpostiosoite',
            'password' => 'Salasana',
            'password_confirm' => 'Vahvista salasana',
        ],

        'minecraft' => [
            'premium' => 'Kirjaudu Microsoft-tilille (turvallisin mutta vaatii Minecraftin ostamisen)',
        ],

        'steam' => [
            'profile' => 'Steam Profiilin URL',
            'profile_info' => 'Tämä Steam-käyttäjä tulee olemaan ylläpitäjä sivustolla.',

            'key' => 'Steamin API-avain',
            'key_info' => 'Voit löytää Steam API avain <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steamistä</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Kiitos että valitsit Azuriomin!',
        'success' => 'Sivusto on asennettu onnistuneesti, voit nyt käyttää sivustoa ja tehdä jotain mahtavaa!',
        'go' => 'Aloita',
        'support' => 'Jos arvostat Azuriomia ja tarjoamaamme työtä, älä unohda <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">tukea meitä</a>.',
    ],
];
