<?php

return [

    'lang' => 'Čeština',

    'date' => [
        'default' => 'j. F Y',
        'full' => 'j. F Y \v G:i',
        'compact' => 'd. m. Y \v G:i',
    ],

    'nav' => [
        'toggle' => 'Přepnout navigaci',
        'profile' => 'Profil',
        'admin' => 'Ovládací panel',
    ],

    'actions' => [
        'add' => 'Přidat',
        'back' => 'Zpět',
        'browse' => 'Procházet',
        'cancel' => 'Zrušit',
        'choose_file' => 'Vybrat soubor',
        'close' => 'Zavřít',
        'comment' => 'Potvrdit',
        'continue' => 'Pokračovat',
        'copy' => 'Zkopírovat',
        'create' => 'Vytvořit',
        'delete' => 'Odstranit',
        'disable' => 'Zakázat',
        'download' => 'Stáhnout',
        'duplicate' => 'Kopírovat',
        'edit' => 'Upravit',
        'enable' => 'Povolit',
        'generate' => 'Vygenerovat',
        'install' => 'Nainstalovat',
        'refresh' => 'Znovu načíst',
        'reload' => 'Znovu načíst',
        'remove' => 'Smazat',
        'save' => 'Uložit',
        'search' => 'Vyhledat',
        'send' => 'Potvrdit',
        'show' => 'Zobrazit',
        'update' => 'Potvrdit',
        'upload' => 'Nahrát',
    ],

    'fields' => [
        'action' => 'Akce',
        'address' => 'Adresa',
        'author' => 'Autor',
        'category' => 'Kategorie',
        'color' => 'Barva',
        'content' => 'Obsah',
        'date' => 'Datum',
        'description' => 'Popis',
        'enabled' => 'Povoleno',
        'file' => 'Soubor',
        'game' => 'Hra',
        'icon' => 'Ikona',
        'image' => 'Obrázek',
        'link' => 'Odkaz',
        'money' => 'Peníze',
        'name' => 'Název',
        'permissions' => 'Oprávnění',
        'port' => 'Port',
        'price' => 'Cena',
        'published_at' => 'Zveřejněno',
        'quantity' => 'Množství',
        'role' => 'Role',
        'server' => 'Server',
        'short_description' => 'Krátký popis',
        'slug' => 'Trvalý odkaz',
        'status' => 'Stav',
        'title' => 'Nadpis',
        'type' => 'Typ',
        'url' => 'Adresa',
        'user' => 'Uživatel',
        'value' => 'Hodnota',
        'version' => 'Verze',
    ],

    'status' => [
        'success' => 'Akce byla úspěšně dokončena!',
        'error' => 'Došlo k chybě: :error',
    ],

    'range' => [
        'days' => 'Podle dnů',
        'months' => 'Podle měsíců',
    ],

    'loading' => 'Načítání...',

    'yes' => 'Ano',
    'no' => 'Ne',
    'unknown' => 'Neznámé',
    'other' => 'Ostatní',
    'none' => 'Žádný',
    'copied' => 'Zkopírováno',
    'icons' => 'Seznam dostupných ikon naleznete na <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.',

    'home' => 'Domů',
    'servers' => 'Servery',
    'news' => 'Novinky',
    'welcome' => 'Vítejte na :name',
    'copyright' => 'Běží na <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriomu</a>.',

    'maintenance' => [
        'title' => 'Údržba',
        'message' => 'Na webu momentálně probíhá údržba.',
    ],

    'theme' => [
        'light' => 'Světlý motiv',
        'dark' => 'Tmavý motiv',
    ],

    'captcha' => 'Ověření CAPTCHA selhalo, zkuste to prosím znovu.',

    'notifications' => [
        'notifications' => 'Upozornění',
        'read' => 'Označit jako přečtené',
        'empty' => 'Nemáte žádná nepřečtená oznámení.',
        'level' => 'Úroveň',
        'info' => 'Informace',
        'warning' => 'Varování',
        'danger' => 'Nebezpečí',
        'success' => 'Úspěch',
    ],

    'clipboard' => [
        'copied' => 'Zkopírováno!',
        'error' => 'CTRL + C pro zkopírování',
    ],

    'server' => [
        'join' => 'Připojit se',
        'total' => ':count/:max hráč|:count/:max online hráčů',
        'online' => ':count hráč online|:count hráčů online',
        'offline' => 'Server je momentálně offline.',
    ],

    'profile' => [
        'title' => 'Můj profil',
        'change_email' => 'Změnit e-mailovou adresu',
        'change_password' => 'Změnit heslo',
        'change_name' => 'Změnit uživatelské jméno',

        'delete' => [
            'btn' => 'Odstranit můj účet',
            'title' => 'Smazání účtu',
            'info' => 'Tato akce nevratně odstraní váš účet a související data. Tuto akci nelze vrátit zpět.',
            'email' => 'Pošleme vám potvrzovací e-mail pro potvrzení této operace.',
            'sent' => 'Na vaší e-mailovou adresu byl odeslán potvrzovací odkaz.',
            'success' => 'Váš účet byl úspěšně odstraněn!',
        ],

        'email_verification' => 'Váš e-mail není ověřen, zkontrolujte prosím svůj e-mail pro odkaz k ověření.',
        'updated' => 'Váš profil byl upraven.',

        'info' => [
            'role' => 'Role: :role',
            'register' => 'Zaregistrován: :date',
            'money' => 'Peníze: :money',
            '2fa' => 'Dvoufázové ověřování (2FA): :2fa',
            'discord' => 'Připojený účet Discord: :user',
        ],

        '2fa' => [
            'enable' => 'Povolit 2FA',
            'disable' => 'Zakázat 2FA',
            'manage' => 'Spravovat 2FA',
            'info' => 'Naskenujte QR kód výše pomocí dvoufaktorové ověřovací aplikace na vašem telefonu, například <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> nebo Google Authenticator.',
            'secret' => 'Tajný klíč: :secret',
            'title' => 'Dvoufázové ověřování',
            'codes' => 'Zobrazit záložní kódy',
            'code' => 'Kód',
            'enabled' => 'Dvoufázové ověřování je momentálně povoleno. Nezapomeňte si uložit vaše obnovovací kódy!',
            'disabled' => 'Dvoufázové ověřování je zakázáno.',
        ],

        'discord' => [
            'link' => 'Propojit s Discordem',
            'unlink' => 'Odpojit od Discordu',
            'linked' => 'Váš účet Discord byl úspěšně připojen.',
        ],

        'money_transfer' => [
            'title' => 'Převod peněz',
            'user' => 'Tento uživatel nebyl nalezen.',
            'balance' => 'Nemáte dost peněz pro tento převod.',
            'success' => 'Peníze úspěšně odeslány.',
            'notification' => ':user vám poslal :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Příspěvky',
        'posted' => 'Zveřejněno :date uživatelem :user',
        'unpublished' => 'Tento příspěvek ještě nebyl zveřejněn.',
        'read' => 'Přečíst více',
    ],

    'comments' => [
        'create' => 'Zanechat komentář',
        'guest' => 'Pro zanechání komentáře musíte být přihlášeni.',
        'author' => '<strong>:user</strong> komentoval :date',
        'content' => 'Váš komentář',
        'delete' => 'Odstranit?',
        'delete_confirm' => 'Opravdu chcete odstranit tento komentář?',
    ],

    'likes' => 'Líbí se mi: :count',

    'markdown' => [
        'init' => 'Připojte soubory přetažením nebo vložením ze schránky.',
        'drag' => 'Přetáhněte obrázek pro jeho nahrání.',
        'drop' => 'Nahrávání obrázku #images_names#...',
        'progress' => 'Nahrávání souboru #file_name#: #progress#%',
        'uploaded' => 'Obrázek #image_name# nahrán',

        'size' => 'Obrázek #image_name# je příliš velký (#image_size#).\nMaximální velikost souboru je #image_max_size#.',
        'error' => 'Při nahrávání obrázku #image_name# se něco pokazilo.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'ID role',
            'description' => 'ID role na webu.',
        ],

        'power' => [
            'name' => 'Moc role',
            'description' => 'Moc role na webu stejná nebo větší než',
        ],
    ],
];
