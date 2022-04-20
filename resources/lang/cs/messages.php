<?php

return [

    'lang' => 'Čeština',

    'copyright' => 'Běží na <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriomu</a>.',

    'date' => 'j. F Y',
    'date-full' => 'j. F Y \v G:i',
    'date-compact' => 'd. m. Y \v G:i',

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
        'choose-file' => 'Vybrat soubor',
        'download' => 'Stáhnout',
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
        'short-description' => 'Krátký popis',
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
    ],

    'range' => [
        'days' => 'Podle dnů',
        'months' => 'Podle měsíců',
    ],

    'loading' => 'Načítání...',

    'yes' => 'Ano',
    'no' => 'Ne',
    'unknown' => 'Neznámé',
    'none' => 'Žádný',
    'copied' => 'Zkopírováno',

    'home' => 'Domů',
    'welcome' => 'Vítejte na :name',

    'maintenance' => 'Údržba',
    'maintenance-message' => 'Na webu momentálně probíhá údržba.',

    'status-success' => 'Akce byla úspěšně dokončena!',
    'status-error' => 'Došlo k chybě: :error',

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
        'online' => ':count hráč online|:count hráčů online',
        'offline' => 'Server je momentálně offline.',
    ],

    'profile' => [
        'title' => 'Můj profil',
        'change-email' => 'Změnit e-mailovou adresu',
        'change-password' => 'Změnit heslo',

        'not-verified' => 'Váš e-mail není ověřen, zkontrolujte prosím svůj e-mail pro odkaz k ověření.',

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
            'info' => 'Naskenujte výše uvedený QR kód s aplikací k dvoufázovému ověřování na vašem telefonu, jako je Authy, 1Password nebo Google Authenticator.',
            'secret' => 'Tajný klíč: :secret',
            'title' => 'Povolit dvoufázové ověřování',
            'code' => 'Kód',
            'enabled' => 'Dvoufázové ověřování povoleno.',
            'disabled' => 'Dvoufázové ověřování je zakázáno.',
        ],

        'email-not-verified' => 'Váš e-mail není ověřen, zkontrolujte svou e-mailovou schránku pro ověřovací odkaz. Pokud jste neobdrželi e-mail, můžete jej nechat znovu odeslat',

        'money-transfer' => [
            'title' => 'Převod peněz',
            'self' => 'Nemůžete poslat peníze sami sobě.',
            'not-enough' => 'Nemáte dost peněz pro tento převod.',
            'success' => 'Peníze úspěšně odeslány.',
            'notification' => ':user vám poslal :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Příspěvky',
        'posted' => 'Zveřejněno :date uživatelem :user',
        'not-published' => 'Tento příspěvek ještě nebyl zveřejněn.',
        'read' => 'Přečíst více',
    ],

    'comments' => [
        'create' => 'Zanechat komentář',
        'guest' => 'Pro zanechání komentáře musíte být přihlášeni.',
        'author' => '<strong>:user</strong> komentoval :date',
        'your-comment' => 'Váš komentář',
        'delete-title' => 'Odstranit?',
        'delete-description' => 'Opravdu chcete odstranit tento komentář?',
    ],

    'likes' => 'Líbí se mi: :count',
];
