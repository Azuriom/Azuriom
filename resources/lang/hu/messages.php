<?php

return [

    'lang' => 'Magyar',

    'date' => [
        'default' => 'Y. F j',
        'full' => 'Y. F j, G:i',
        'compact' => 'Y.m.d, G:i',
    ],

    'nav' => [
        'toggle' => 'Navigáció bezárása/kinyitása',
        'profile' => 'Profil',
        'admin' => 'Admin vezérlőpult',
    ],

    'actions' => [
        'add' => 'Hozzáadás',
        'back' => 'Vissza',
        'browse' => 'Böngészés',
        'cancel' => 'Mégse',
        'choose_file' => 'Fájl kiválasztása',
        'close' => 'Bezárás',
        'comment' => 'Megjegyzés',
        'continue' => 'Folytatni',
        'copy' => 'Másolás',
        'create' => 'Létrehozás',
        'delete' => 'Törlés',
        'disable' => 'Kikapcsolás',
        'download' => 'Letöltés',
        'duplicate' => 'Duplikálás',
        'edit' => 'Szerkesztés',
        'enable' => 'Bekapcsolás',
        'generate' => 'Generálás',
        'install' => 'Telepítés',
        'refresh' => 'Frissítés',
        'reload' => 'Újratöltés',
        'remove' => 'Eltávolítás',
        'save' => 'Mentés',
        'search' => 'Keresés',
        'send' => 'Küldés',
        'show' => 'Megjelenítés',
        'update' => 'Frissítés',
        'upload' => 'Feltöltés',
    ],

    'fields' => [
        'action' => 'Művelet',
        'address' => 'Cím',
        'author' => 'Szerző',
        'category' => 'Kategória',
        'color' => 'Szín',
        'content' => 'Tartalom',
        'date' => 'Dátum',
        'description' => 'Leírás',
        'enabled' => 'Bekapcsolás',
        'file' => 'Fájl',
        'game' => 'Játék',
        'icon' => 'Ikon',
        'image' => 'Kép',
        'link' => 'Link',
        'money' => 'Pénz',
        'name' => 'Név',
        'permissions' => 'Engedélyek',
        'port' => 'Port',
        'price' => 'Ár',
        'published_at' => 'Közzétéve',
        'quantity' => 'Mennyiség',
        'role' => 'Rang',
        'server' => 'Szerver',
        'short_description' => 'Rövid leírás',
        'slug' => 'Keresőbarát név',
        'status' => 'Állapot',
        'title' => 'Cím',
        'type' => 'Típus',
        'url' => 'URL',
        'user' => 'Felhasználó',
        'value' => 'Érték',
        'version' => 'Verzió',
    ],

    'status' => [
        'success' => 'A művelet sikeresen befejeződött!',
        'error' => 'Hiba történt: :error',
    ],

    'range' => [
        'days' => 'Napok alapján',
        'months' => 'Hónapok alapján',
    ],

    'loading' => 'Betöltés...',

    'yes' => 'Igen',
    'no' => 'Nem',
    'unknown' => 'Ismeretlen',
    'other' => 'Egyéb',
    'none' => 'Nincs',
    'copied' => 'Kimásolva',
    'icons' => 'A rendelkezésre álló ikonok listáját a <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Iconok</a> oldalon találod.',

    'home' => 'Főoldal',
    'servers' => 'Szerverek',
    'news' => 'Hírek',
    'welcome' => 'Üdv a(z) :name weboldalán',
    'copyright' => 'Powered by <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Karbantartás',
        'message' => 'A weboldal jelenleg karbantartás alatt van.',
    ],

    'theme' => [
        'light' => 'Világos téma',
        'dark' => 'Sötét téma',
    ],

    'captcha' => 'A captcha érvényesítése sikertelen. Próbáld újra.',

    'notifications' => [
        'notifications' => 'Értesítések',
        'read' => 'Megjelölés olvasottként',
        'empty' => 'Nincs olvasatlan értesítésed.',
        'level' => 'Szint',
        'info' => 'Információ',
        'warning' => 'Figyelmeztetés',
        'danger' => 'Veszély',
        'success' => 'Sikeres',
    ],

    'clipboard' => [
        'copied' => 'Kimásolva!',
        'error' => 'CTRL + C a másoláshoz',
    ],

    'server' => [
        'join' => 'Csatlakozás',
        'total' => ':count/:max játékos|:count/:max elérhető játékos',
        'online' => ':count online játékos|:count online játékos',
        'offline' => 'A szerver jelenleg nem elérhető.',
    ],

    'profile' => [
        'title' => 'Profilom',
        'change_email' => 'E-mail cím módosítása',
        'change_password' => 'Jelszó módosítása',
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => 'Saját fiók törlése',
            'title' => 'A fiók törölve.',
            'info' => 'Ez véglegesen törli a fiókját és a kapcsolódó adatokat. Ezt a műveletet nem lehet visszacsinálni.
',
            'email' => 'A művelet megerősítésére visszaigazoló e-mailt küldünk Önnek.
',
            'sent' => 'Egy ellenőrző levelet küldtünk a megadott e-mail címre.',
            'success' => 'Fiókja sikeresen törölve!',
        ],

        'email_verification' => 'Az e-mail címed nincs megerősítve. Keresd meg az érvényesítő linket az e-mail fiókodban.',
        'updated' => 'Profilod frissítve.',

        'info' => [
            'role' => 'Rang: :role',
            'register' => 'Regisztrált ekkor: :date',
            'money' => 'Pénz: :money',
            '2fa' => 'Kétfaktoros bejelentkeztetés (2FA): :2fa',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => '2FA bekapcsolása',
            'disable' => '2FA kikapcsolása',
            'manage' => 'Kétlépcsős hitelesítés kezelése',
            'info' => 'Szkenneld be a fenti QR-kódot egy kétlépcsős hitelesítési alkalmazással a telefonodon, például <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> vagy Google Authenticator.',
            'secret' => 'Titkos kulcs: :secret',
            'title' => 'Kétlépcsős hitelesítés',
            'codes' => 'Visszaállítási kódok megjelenítése',
            'code' => 'Kód',
            'enabled' => 'A kétlépcsős hitelesítés jelenleg engedélyezve van. Ne felejtsd el elmenteni a helyreállítási kódokat!',
            'disabled' => 'Kétlépéses hitelesítés kikapcsolva.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => 'Pénz küldése',
            'user' => 'This user was not found.',
            'balance' => 'Nincs elég pénzed az utaláshoz.',
            'success' => 'A pénzt sikeresen elküldtük.',
            'notification' => ':user küldött neked :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Bejegyzések',
        'posted' => 'Közététel :date -án/-én :user által',
        'unpublished' => 'Ez a bejegyzés még nem jelent meg.',
        'read' => 'Tovább olvasom',
    ],

    'comments' => [
        'create' => 'Szólj hozzá',
        'guest' => 'Be kell jelentkezned, hogy hozzászólást írj.',
        'author' => '<strong>:user</strong> hozzászólt :date -án/-én',
        'content' => 'Hozzászólásod',
        'delete' => 'Törlöd?',
        'delete_confirm' => 'Biztos, hogy törölni akarod ezt a hozzászólást?',
    ],

    'likes' => 'Kedvelések: :count',

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
