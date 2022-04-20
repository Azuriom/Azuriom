<?php

return [
    'title' => 'Instalace',

    'welcome' => 'Azuriom je herní CMS <strong>nové generace</strong>, je <strong>bezplatné</strong> a <strong>open-source</strong> a je <strong>moderní, spolehlivou, rychlou a bezpečnou</strong> alternativou k již existujícím CMS, takže můžete mít <strong>nejlepší možný zážitek z webu</strong>.',

    'back' => 'Zpět',

    'requirements' => [
        'php' => 'Verze PHP :version nebo vyšší',
        'writable' => 'Oprávnění k zápisu',
        'rewrite' => 'Přepis URL povolen',
        'extension' => 'Rozšíření :extension',
        'function' => 'Funkce :function povolena',
        '64bit' => '64bitové PHP',

        'refresh' => 'Požadavky k obnovení',
        'success' => 'Azuriom je připraven k nastavení!',
        'missing' => 'Váš server nemá potřebné požadavky na instalaci Azuriomu.',

        'help' => [
            'writable' => 'K udělení oprávnění k zápisu můžete vyzkoušet tento příkaz: <code>:command</code>.',
            'rewrite' => 'Můžete se řídit pokyny v <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">naší dokumentaci</a> pro povolení přepisu URL.',
            'htaccess' => 'Soubor <code>.htaccess</code> nebo <code>public/.htaccess</code> chybí. Ujistěte se, že jste povolili zobrazení skrytých souborů a že soubor existuje.',
            'extension' => 'Pro instalaci chybějících rozšíření PHP můžete vyzkoušet tento příkaz: <code>:command</code>.<br>Jakmile budete mít hotovo, restartujte Apache nebo Nginx.',
            'function' => 'Tuto funkci je třeba povolit v PHP souboru php.ini úpravou hodnoty <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Databáze',

        'type' => 'Typ',
        'host' => 'Hostitel',
        'port' => 'Port',
        'database' => 'Databáze',
        'user' => 'Uživatel',
        'password' => 'Heslo',

        'warn' => 'Tento typ databáze není doporučen a měl by být použit pouze v případě, že není k dispozici jiná možnost.',
    ],

    'game' => [
        'title' => 'Hra',

        'locale' => 'Jazyk',

        'warn' => 'Buďte opatrní, po dokončení instalace nebude možné toto nastavení změnit bez přeinstalování Azuriomu!',

        'install' => 'Nainstalovat',

        'user' => [
            'title' => 'Účet správce',

            'name' => 'Jméno',
            'email' => 'E-mailová adresa',
            'password' => 'Heslo',
            'password_confirm' => 'Potvrdit heslo',
        ],

        'minecraft' => [
            'premium' => 'Přihlásit se pomocí účtu Microsoft (nejbezpečnější metoda, ale vyžaduje zakoupenou verzi Minecraftu) ',
        ],

        'steam' => [
            'profile' => 'URL Steam profilu',
            'profile_info' => 'Tento uživatel Steamu bude správcem na webu.',

            'key' => 'Steam API klíč',
            'key_info' => 'Váš Steam API klíč naleznete na <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steamu</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Děkujeme, že jste si vybrali Azuriom!',
        'success' => 'Váš web byl úspěšně nainstalován, nyní jej můžete použít a udělat něco úžasného!',
        'go' => 'Začít',
        'support' => 'Pokud se vám líbí Azuriom a práce, kterou poskytujeme, nezapomeňte nás <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">podpořit</a>.',
    ],
];
