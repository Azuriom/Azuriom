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
        'show' => 'Zobrazit',
        'create' => 'Vytvořit',
        'close' => 'Zavřít',
        'edit' => 'Upravit',
        'update' => 'Potvrdit',
        'delete' => 'Odstranit',
        'save' => 'Uložit',
        'continue' => 'Pokračovat',
        'browse' => 'Procházet',
        'choose_file' => 'Vybrat soubor',
        'download' => 'Stáhnout',
        'install' => 'Nainstalovat',
        'upload' => 'Nahrát',
        'cancel' => 'Zrušit',
        'enable' => 'Povolit',
        'disable' => 'Zakázat',
        'copy' => 'Zkopírovat',
        'comment' => 'Potvrdit',
        'search' => 'Vyhledat',
        'send' => 'Potvrdit',
        'reload' => 'Znovu načíst',
        'refresh' => 'Znovu načíst',
        'duplicate' => 'Kopírovat',
        'remove' => 'Smazat',
        'back' => 'Zpět',
    ],

    'fields' => [
        'name' => 'Název',
        'title' => 'Nadpis',
        'action' => 'Akce',
        'date' => 'Datum',
        'slug' => 'Trvalý odkaz',
        'link' => 'Odkaz',
        'enabled' => 'Povoleno',
        'author' => 'Autor',
        'user' => 'Uživatel',
        'image' => 'Obrázek',
        'type' => 'Typ',
        'file' => 'Soubor',
        'description' => 'Popis',
        'short_description' => 'Krátký popis',
        'content' => 'Obsah',
        'role' => 'Role',
        'quantity' => 'Množství',
        'money' => 'Peníze',
        'color' => 'Barva',
        'url' => 'Adresa',
        'status' => 'Stav',
        'category' => 'Kategorie',
        'version' => 'Verze',
        'game' => 'Hra',
        'price' => 'Cena',
        'icon' => 'Ikona',
        'server' => 'Server',
        'value' => 'Hodnota',
        'published_at' => 'Zveřejněno',
        'permissions' => 'Oprávnění',
        'address' => 'Adresa',
        'port' => 'Port',
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

        'email_verification' => 'Váš e-mail není ověřen, zkontrolujte prosím svůj e-mail pro odkaz k ověření.',
        'updated' => 'Váš profil byl upraven.',

        'info' => [
            'role' => 'Role: :role',
            'register' => 'Zaregistrován: :date',
            'money' => 'Peníze: :money',
            '2fa' => 'Dvoufázové ověřování (2FA): :2fa',
        ],

        '2fa' => [
            'enable' => 'Povolit 2FA',
            'disable' => 'Zakázat 2FA',
            'manage' => 'Spravovat 2FA',
            'info' => 'Naskenujte výše uvedený QR kód s aplikací k dvoufázovému ověřování na vašem telefonu, jako je Authy, 1Password nebo Google Authenticator.',
            'secret' => 'Tajný klíč: :secret',
            'title' => 'Dvoufázové ověřování',
            'codes' => 'Zobrazit záložní kódy',
            'code' => 'Kód',
            'enabled' => 'Dvoufázové ověřování je momentálně povoleno. Nezapomeňte si uložit vaše obnovovací kódy!',
            'disabled' => 'Dvoufázové ověřování je zakázáno.',
        ],

        'money_transfer' => [
            'title' => 'Převod peněz',
            'self' => 'Nemůžete poslat peníze sami sobě.',
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
];
