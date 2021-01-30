<?php

return [

    'lang' => 'Nederlands',

    'copyright' => 'Mogelijk gemaakt door <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'date' => 'j F Y',
    'date-full' => 'j F Y H:i:s',
    'date-compact' => 'd/m/Y H:i:s',

    'nav' => [
        'toggle' => 'Schakel tussen navigatie',
        'profile' => 'Profiel',
        'admin' => 'Beheerdersdashboard',
    ],

    'actions' => [
        'add' => 'Toevoegen',
        'show' => 'Tonen',
        'create' => 'Creëren',
        'close' => 'Sluiten',
        'edit' => 'Bewerken',
        'update' => 'Bijwerken',
        'delete' => 'Verwijderen',
        'save' => 'Opslaan',
        'continue' => 'Voorzetten',
        'browse' => 'Bladeren',
        'choose-file' => 'Kies bestand',
        'download' => 'Downloaden',
        'upload' => 'Uploaden',
        'cancel' => 'Annuleren',
        'enable' => 'Inschakelen',
        'disable' => 'Uitschakelen',
        'copy' => 'Kopiëren',
        'comment' => 'Commentaar', // not sure about this one
        'search' => 'Zoeken',
        'send' => 'Versturen',
        'reload' => 'Herlaad',
        'refresh' => 'Vernieuwen',
        'duplicate' => 'Dupliceren',
        'remove' => 'Verwijderen',
        'back' => 'Terug',
    ],

    'fields' => [
        'name' => 'Naame',
        'title' => 'Titel',
        'action' => 'Actie',
        'date' => 'Datum',
        'slug' => 'Slug (webpublicatie)', // not sure about this one
        'link' => 'Koppeling',
        'enabled' => 'Ingeschakeld',
        'author' => 'Schrijver',
        'user' => 'Gebruiker',
        'image' => 'Afbeelding',
        'type' => 'Type', // not sure about this one
        'file' => 'Bestand',
        'description' => 'Omschrijving',
        'short-description' => 'Korte beschrijving',
        'content' => 'Inhoud',
        'role' => 'Role',   // not sure about this one
        'quantity' => 'Hoeveelheid',
        'money' => 'Geld',
        'color' => 'Kleur',
        'url' => 'URL',     // not sure about this one
        'status' => 'Toestand',
        'category' => 'Categorie',
        'version' => 'Versie',
        'game' => 'Spel',
        'price' => 'Prijs',
        'icon' => 'Icoon',
        'server' => 'Server',
    ],

    'range' => [
        'days' => 'Per dagen',
        'months' => 'Per maanden',
    ],

    'loading' => 'laden...',

    'yes' => 'Ja',
    'no' => 'Nee',
    'unknown' => 'Onbekend',
    'none' => 'Geen',
    'copied' => 'Gekopieerd',

    'home' => 'Home',
    'welcome' => 'Welkom bij :name',

    'maintenance' => 'Onderhoud',
    'maintenance-message' => 'De website is momenteel in onderhoud.',

    'status-success' => 'De actie is met succes voltooid!',
    'status-error' => 'Er is een fout opgetreden: :error',

    'theme' => [
        'light' => 'Licht thema',
        'dark' => 'Donker thema',
    ],

    'captcha' => 'De captcha-verificatie is mislukt, probeer het opnieuw.',

    'notifications' => [
        'notifications' => 'Meldingen',
        'read' => 'Markeer als gelezen',
        'empty' => 'U heeft geen ongelezen meldingen.',
    ],

    'clipboard' => [
        'copied' => 'Gekopieerd!',
        'error' => 'CTRL + C om te kopiëren',
    ],

    'server' => [
        'online' => ':count online speler|:count online spelers',
        'offline' => 'De server is momenteel offline.',
    ],

    'profile' => [
        'title' => 'Mijn profiel',
        'change-email' => 'E-mailadres wijzigen',
        'change-password' => 'Wijzig wachtwoord',

        'not-verified' => 'Uw e-mail is niet geverifieerd. Controleer uw e-mail voor een verificatielink.',

        'updated' => 'Uw profiel is bijgewerkt.',

        'info' => [
            'role' => 'Rol: :role',
            'register' => 'Geregistreerd: :date',
            'money' => 'Geld: :money',
            '2fa' => 'Twee-factorenauthenticatie (2FA): :2fa',
        ],

        '2fa' => [
            'enable' => 'Schakel 2FA in',
            'disable' => 'Schakel 2FA uit',
            'info' => 'Scan de bovenstaande QR-code met een tweefactorauthenticatie-app op je telefoon zoals Authy of Google Authenticator.',
            'secret' => 'Geheime sleutel: :secret',
            'title' => 'Schakel tweefactorauthenticatie in',
            'code' => 'Geheime sleutel',
            'enabled' => 'Twee-factorenauthenticatie ingeschakeld.',
            'disabled' => 'Twee-factorenauthenticatie uitgeschakeld.',
        ],

        'email-not-verified' => 'Uw e-mail is niet geverifieerd. Controleer uw e-mail voor een verificatielink. Als u de e-mail niet heeft ontvangen, kunt u deze opnieuw verzenden',

        'money-transfer' => [
            'title' => 'Geld overboeken',
            'self' => 'U kunt geen geld naar uzelf sturen.',
            'not-enough' => 'U heeft niet genoeg geld om deze overboeking te doen.',
            'success' => 'Het geld is succesvol verzonden.',
            'notification' => ':user stuurde u :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Berichten',
        'posted' => 'Geplaatst op :date bij :user',
        'not-published' => 'Dit bericht is nog niet gepubliceerd.',
        'read' => 'Lees meer',
    ],

    'comments' => [
        'create' => 'laat een reactie achter',
        'guest' => 'U moet ingelogd zijn om een reactie achter te laten.',
        'author' => '<strong>:user</strong> Gereageerd op :date',
        'your-comment' => 'U opmerking',
        'delete-title' => 'Verwijderen?',
        'delete-description' => 'Weet u zeker dat u deze opmerking wilt verwijderen?',
    ],

    'likes' => 'Likes: :count',
];
