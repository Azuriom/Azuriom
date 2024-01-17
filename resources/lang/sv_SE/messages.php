<?php

return [

    'lang' => 'Svenska',

    'date' => [
        'default' => 'j F Y',
        'full' => 'j F Y \k\l G:i',
        'compact' => 'd/m/Y \k\l G:i',
    ],

    'nav' => [
        'toggle' => 'Visa/dölj navigering',
        'profile' => 'Profil',
        'admin' => 'Admin kontrollpanel',
    ],

    'actions' => [
        'add' => 'Lägg till',
        'back' => 'Tillbaka',
        'browse' => 'Bläddra',
        'cancel' => 'Avbryt',
        'choose_file' => 'Välj fil',
        'close' => 'Stäng',
        'comment' => 'Kommentarer',
        'continue' => 'Fortsätt',
        'copy' => 'Kopiera',
        'create' => 'Skapa',
        'delete' => 'Radera',
        'disable' => 'Inaktivera',
        'download' => 'Hämta',
        'duplicate' => 'Duplicera',
        'edit' => 'Editera',
        'enable' => 'Aktivera',
        'generate' => 'Generera',
        'install' => 'Installera',
        'refresh' => 'Uppdatera',
        'reload' => 'Ladda om',
        'remove' => 'Ta bort',
        'save' => 'Spara',
        'search' => 'Sök',
        'send' => 'Gönder',
        'show' => 'Visa',
        'update' => 'Uppdatera',
        'upload' => 'Ladda Upp',
    ],

    'fields' => [
        'action' => 'Action',
        'address' => 'Address',
        'author' => 'Författare',
        'category' => 'Kategori',
        'color' => 'Färg',
        'content' => 'Innehåll',
        'date' => 'Datum',
        'description' => 'Beskrivning',
        'enabled' => 'Aktiverad',
        'file' => 'Fil',
        'game' => 'Spel',
        'icon' => 'Ikon',
        'image' => 'Bilder',
        'link' => 'Länkar',
        'money' => 'Pengar',
        'name' => 'Namn',
        'permissions' => 'Rättigheter',
        'port' => 'Port',
        'price' => 'Pris',
        'published_at' => 'Publicerat kl',
        'quantity' => 'Kvantitet',
        'role' => 'Rättigheter',
        'server' => 'Server',
        'short_description' => 'Kort Beskrivning',
        'slug' => 'Permalänk',
        'status' => 'Status',
        'title' => 'Titel',
        'type' => 'Typ',
        'url' => 'URL',
        'user' => 'Användare',
        'value' => 'Värde',
        'version' => 'Version',
    ],

    'status' => [
        'success' => 'Åtgärden har slutförts!',
        'error' => 'Ett fel har uppstått: :error',
    ],

    'range' => [
        'days' => 'På dagen',
        'months' => 'Efter månader',
    ],

    'loading' => 'Laddar...',

    'yes' => 'Ja',
    'no' => 'Nej',
    'unknown' => 'Unknown',
    'other' => 'Övrigt',
    'none' => 'Inget',
    'copied' => 'Kopierad',
    'icons' => 'Du kan hitta listan över tillgängliga ikoner på <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Ikoner</a>.',

    'home' => 'Hem',
    'servers' => 'Servrar',
    'news' => 'Nyheter',
    'welcome' => 'Välkommen, :name',
    'copyright' => 'Drivs av <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Underhåll',
        'message' => 'Webbplatsen är för närvarande under underhåll.',
    ],

    'theme' => [
        'light' => 'Ljust tema',
        'dark' => 'Mörkt tema',
    ],

    'captcha' => 'Text verification failed. Please try again.',

    'notifications' => [
        'notifications' => 'Aviseringar',
        'read' => 'Markera som läst',
        'empty' => 'Du har inga nya notifieringar.',
        'level' => 'Nivå',
        'info' => 'Information',
        'warning' => 'Varning',
        'danger' => 'Fara',
        'success' => 'Klart',
    ],

    'clipboard' => [
        'copied' => 'Kopierad!',
        'error' => 'CTRL + C att kopiera',
    ],

    'server' => [
        'join' => 'Gå med',
        'total' => ':count/:max player|:count/:max online spelare',
        'online' => ':count onlinespelare|:count onlinespelare',
        'offline' => 'Servern är för tillfället offline.',
    ],

    'profile' => [
        'title' => 'Min profil',
        'change_email' => 'Verifiera e-postadress',
        'change_password' => 'Ändra lösenord',
        'change_name' => 'Byt Användarnamn',

        'delete' => [
            'btn' => 'Ta bort mitt konto',
            'title' => 'Kontot raderades',
            'info' => 'Detta kommer att permanent radera ditt konto och tillhörande data. Denna åtgärd kan inte ångras.',
            'email' => 'Vi kommer att skicka dig en bekräftelse e-post för att bekräfta denna operation.',
            'sent' => 'Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.',
            'success' => 'Ditt konto har raderats!',
        ],

        'email_verification' => 'Antes de continuar, consulte su correo electrónico para ver un enlace de verificación.',
        'updated' => 'Din profil har uppdaterats.',

        'info' => [
            'role' => 'Roll: :role',
            'register' => 'Registreringsdatum',
            'money' => 'Pengar: :money',
            '2fa' => 'Tvåfaktorautentisering (2FA)',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => 'Aktivera 2FA',
            'disable' => 'Inaktivera 2FA',
            'manage' => 'Manage 2FA',
            'info' => 'Skanna QR-koden ovan med en tvåfaktorsautentiseringsapp på din telefon som <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> eller Google Authenticator.',
            'secret' => 'Hemlig nyckel: :secret',
            'title' => 'Tvåfaktorsautentisering',
            'codes' => 'Hämta återställningskoder',
            'code' => 'Rumskod',
            'enabled' => 'Tvåfaktorsautentisering är för närvarande aktiverat. Glöm inte att spara dina återställningskoder!',
            'disabled' => 'Tvåfaktorsautentisering.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => 'Överföring av pengar',
            'user' => 'This user was not found.',
            'balance' => 'Du har inte tillräckligt med pengar för att göra denna överföring.',
            'success' => 'Pengarna har skickats.',
            'notification' => ':user skickade dig :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Inlägg',
        'posted' => 'Publicerat :date av :user',
        'unpublished' => 'Det här formuläret har inte publicerats än.',
        'read' => 'Läs mer',
    ],

    'comments' => [
        'create' => 'Lämna en kommentar',
        'guest' => 'Du måste vara inloggad för att lämna en kommentar.',
        'author' => '<strong>:user</strong> kommenterade :date',
        'content' => 'Din kommentar',
        'delete' => 'Radera?',
        'delete_confirm' => 'Är du säker på att du vill radera denna kommentar?',
    ],

    'likes' => 'Gillar: :count',

    'markdown' => [
        'init' => 'Bifoga filer genom att dra och släppa eller klistra in från urklipp.',
        'drag' => 'Släpp bilden för att ladda upp den.',
        'drop' => 'Laddar upp bild #images_names#...',
        'progress' => 'Laddar upp #file_name#: #progress#%',
        'uploaded' => 'Uppladdad #image_name#',

        'size' => 'Bild #image_name# är för stor (#image_size#).\nMaximal filstorlek är #image_max_size#.',
        'error' => 'Något gick fel när bilden laddades upp #image_name#.',
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
