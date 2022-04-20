<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on the admin dashboard
    |
    */

    'nav' => [
        'dashboard' => 'Nástěnka',
        'settings' => [
            'heading' => 'Nastavení',
            'settings' => [
                'settings' => 'Nastavení',
                'global' => 'Globální',
                'security' => 'Zabezpečení',
                'performances' => 'Výkon',
                'seo' => 'SEO',
                'auth' => 'Přihlašování',
                'mail' => 'E-maily',
                'maintenance' => 'Údržba',
            ],
            'navbar' => 'Navigace',
            'servers' => 'Servery',
        ],

        'users' => [
            'heading' => 'Uživatelé',
            'users' => 'Uživatelé',
            'roles' => 'Role',
            'bans' => 'Bany',
        ],

        'content' => [
            'heading' => 'Obsah',
            'pages' => 'Stránky',
            'posts' => 'Příspěvky',
            'images' => 'Obrázky',
        ],

        'extensions' => [
            'heading' => 'Rozšíření',
            'plugins' => 'Doplňky',
            'themes' => 'Témata',
        ],

        'other' => [
            'heading' => 'Ostatní',
            'update' => 'Aktualizace',
            'logs' => 'Protokoly',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back-website' => 'Zpět na web',

        'support' => 'Podpora',
        'documentation' => 'Dokumentace',
    ],

    'confirm-delete' => [
        'title' => 'Odstranit?',
        'description' => 'Opravdu to chcete odstranit? Tato akce je nevratná!',
    ],

    'footer' => 'Běží na :azuriom &copy; :year. Vzhled panelu od :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Nástěnka',

        'new-update' => 'Je dostupná nová verze Azuriomu: :version',
        'https-warning' => 'Váš web nepoužívá https, měli byste jej povolit a vynutit pro bezpečnost vás i ostatních uživatelů.',
        'proxy-warning' => 'Pokud používáte Cloudflare, měli byste si nainstalovat doplněk Cloudflare Support.',
        'recent-users' => 'Poslední uživatelé',
        'active-users' => 'Aktivní uživatelé',
        'emails-disabled' => 'E-maily jsou zakázány. Pokud uživatel zapomene své heslo, nebude si jej moci obnovit. E-maily můžete povolit v <a href=":url">nastavení e-mailů</a>.',
        'users' => 'Uživatelé',
        'posts' => 'Příspěvky',
        'pages' => 'Stránky',
        'images' => 'Obrázky',
    ],

    'settings' => [
        'index' => [
            'title' => 'Globální nastavení',

            'site-name' => 'Název webu',
            'site-url' => 'URL webu',
            'site-description' => 'Popis webu',
            'meta' => 'Meta klíčová slova',
            'meta-info' => 'Klíčová slova musí být oddělena čárkou.',
            'favicon' => 'Favikona',
            'background' => 'Pozadí',
            'logo' => 'Logo',
            'timezone' => 'Časové pásmo',
            'locale' => 'Jazyk',
            'money' => 'Název měny webu',
            'copyright' => 'Copyright',
            'user-money-transfer' => 'Povolit převod peněz mezi uživateli',
            'site-key' => 'Klíč webu pro azuriom.com',
            'site-key-label' => 'Klíč webu azuriom.com je vyžadován pro instalaci prémiových doplňků zakoupených v obchodě. Váš klíč získáte na vašem <a href="https://azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom profilu</a>.',
        ],

        'security' => [
            'title' => 'Nastavení zabezpečení',

            'captcha' => [
                'title' => 'Captcha',
                'site-key' => 'Klíč webu',
                'secret-key' => 'Tajný klíč',
                'recaptcha' => 'Klíče reCAPTCHA získáte <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">webu Google reCAPTCHA</a>. Musíte použít reCAPTCHA <strong>v2 viditelné</strong> klíče.',
                'hcaptcha' => 'Klíče hCaptcha získáte na <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> webu hCaptcha</a>.',
            ],

            'hash' => 'Šifrovací algoritmus',
            'hash-info' => 'Argon2id je nejbezpečnější algoritmus, ale vyžaduje PHP 7.3 nebo vyšší. Pokud používáte PHP 7.2, měli byste použít Argon2i.',
            'hash-error' => 'Tento šifrovací algoritmus není podporován vaší aktuální verzí PHP.',
        ],

        'performances' => [
            'title' => 'Nastavení výkonu',

            'cache' => [
                'title' => 'Vymazat mezipaměť',
                'description' => 'Vymazat mezipaměť webu.',

                'status' => [
                    'cleared' => 'Mezipaměť byla úspěšně vymazána.',
                    'clear-error' => 'Při mazání mezipaměti se vyskytla chyba.',
                ],

                'actions' => [
                    'clear' => 'Vymazat mezipaměť',
                ],
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost zlepší výkon vašeho webu přidáním další exkluzivní vrstvy mezipaměti.',
                'info' => 'Pokud máte po povolení rozšíření nějaké problémy, měli byste znovu načíst mezipaměť.',

                'current' => [
                    'status' => 'AzBoost je momentálně :status.',
                    'enabled' => '<span class="text-success">povolen</span>',
                    'disabled' => '<span class="text-danger">zakázán</span>',
                ],

                'status' => [
                    'enabled' => 'AzBoost je nyní povolen.',
                    'disabled' => 'AzBoost je nyní zakázán.',
                    'reloaded' => 'AzBoost byl znovu načten.',

                    'enable-error' => 'Chyba při povolování AzBoost.',
                ],

                'actions' => [
                    'enable' => 'Povolit AzBoost',
                    'disable' => 'Zakázat AzBoost',
                    'reload' => 'Znovu načíst AzBoost',
                ],
            ],
        ],

        'seo' => [
            'title' => 'Nastavení SEO',

            'html-head-code' => 'HTML kód pro zahrnutí do <head> všech stránek.',
            'html-body-code' => 'HTML kód pro zahrnutí do <body> všech stránek.',

            'html-code-info' => 'Např.: cookie banner, Google Analytics atd.',

            'welcome-popup' => [
                'enable' => 'Povolit uvítací vyskakovací okno?',
                'message' => 'Zpráva uvítacího okna',
                'info' => 'Toto vyskakovací okno bude zobrazeno, když uživatel poprvé navštíví web.',
            ],
        ],

        'auth' => [
            'title' => 'Přihlašování',

            'conditions-url' => 'URL podmínek',
            'conditions-info' => 'Uživatelé budou muset přijmout tyto podmínky při registraci.',
            'enable-user-registration' => 'Povolit registraci uživatelů',
            'enable-user-registration-label' => 'Může být stále možné zaregistrovat se pomocí pluginů.',
            'auth-api' => 'Povolit přihlašovací API',
            'auth-api-label' => 'Tato API umožňuje přidání vlastního přihlašování na váš herní server. Pro Minecraft servery používající launcher můžete použít <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> pro jednoduchou a rychlou integraci.',
            'minecraft-verification' => 'Povolit ověřování Minecraftových uživatelských jmen pomocí minecraft.net',
        ],

        'mail' => [
            'title' => 'Nastavení e-mailů',
            'from-address' => 'E-mailová adresa používaná k odesílání e-mailů.',
            'driver' => 'Typ e-mailu',
            'driver-info' => 'Azuriom podporuje SMTP a Sendmail pro odesílání e-mailů. Více informací naleznete v naší <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentaci</a>.',
            'disabled-warn' => 'Když jsou e-maily zakázány, uživatelé si nebudou moci obnovit své heslo, pokud ho zapomenou.',
            'sendmail-warn' => 'Použití Sendmailu není doporučeno a měli byste namísto toho používat SMTP server, pokud je to možné.',
            'smtp' => [
                'host' => 'Adresa SMTP hostitele',
                'port' => 'Port SMTP hostitele',
                'encryption' => 'Šifrovací protokol',
                'username' => 'Uživatelské jméno SMTP serveru',
                'password' => 'Heslo SMTP serveru',
            ],
            'enable-users-verification' => 'Povolit ověřování uživatelských e-mailových adres',
            'send' => 'Poslat testovací email',
            'sent' => 'Testovací e-mail byl úspěšně odeslán.',
        ],

        'maintenance' => [
            'title' => 'Nastavení údržby',

            'enable' => 'Povolit údržbu',
            'message' => 'Zpráva údržby',
        ],

        'status' => [
            'updated' => 'Nastavení byla aktualizována.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navigace',
        'title-edit' => 'Upravit prvek navigace :element',
        'title-create' => 'Vytvořit prvek navigace',

        'dropdown-info' => 'Po uložení tohoto prvku můžete přidávat další prvky do rozbalovací nabídky.',

        'fields' => [
            'home' => 'Domů',
            'link' => 'Externí odkaz',
            'page' => 'Stránka',
            'post' => 'Příspěvek',
            'posts' => 'Seznam příspěvků',
            'plugin' => 'Doplněk',
            'dropdown' => 'Rozbalovací nabídka',
            'new-tab' => 'Otevírat v nové kartě',
        ],

        'status' => [
            'nav-updated' => 'Navigace aktualizována.',

            'created' => 'Prvek navigace byl vytvořen.',
            'updated' => 'Prvek navigace byl upraven.',
            'deleted' => 'Prvek navigace byl odstraněn.',

            'not-empty' => 'Nemůžete odstranit rozbalovací nabídku s prvky.',
        ],
    ],

    'servers' => [
        'title' => 'Servery',
        'title-edit' => 'Úprava serveru :server',
        'title-create' => 'Přidat server',

        'default' => 'Výchozí server',
        'default-info' => 'Počet připojených hráčů na výchozí server bude zobrazen na webu, pokud jej aktuální téma podporuje.',

        'ping-no-commands' => 'Ping nepotřebuje plugin, ale nemůžete pomocí něj vykonávat příkazy.',
        'query-no-commands' => 'S query není možné vykonávat příkazy na serveru.',

        'query-port-info' => 'Může být prázdné, pokud je to stejné jako port hry.',

        'fields' => [
            'address' => 'Adresa',
            'port' => 'Port',

            'rcon-password' => 'Heslo RCON',
            'rcon-port' => 'Port RCON',
            'query-port' => 'Port zdrojové query',

            'azlink-port' => 'Port AzLink',
        ],

        'actions' => [
            'verify-connection' => 'Ověřit spojení',
        ],

        'azlink' => [
            'link' => 'Pro propojení vašeho webu pomocí AzLink:',
            'link-1' => '<a href="https://azuriom.com/azlink">Stáhněte si plugin AzLink</a> a nainstalujte jej na svůj server.',
            'link-2' => 'Restartovat server.',
            'link-3' => 'Vykonat tento příkaz na serveru: ',

            'link-info' => 'Minecraft server s vaším webem můžete propojit pomocí následujícího příkazu: ',
            'port-info' => 'Pokud používáte jiný port AzLink než výchozí, musíte jej nastavit příkazem: ',

            'enable-ping' => 'Povolit okamžité příkazy (vyžaduje otevřený port na serveru)',
            'ping-info' => 'Pokud nejsou okamžité příkazy povoleny, budou příkazy vykonávány se zpožděním od 30 sekund do 1 minuty.',
            'custom-port' => 'Použít vlastní port AzLink',
        ],

        'players' => ':count hráč|:count hráčů',
        'offline' => 'Offline',

        'status' => [
            'created' => 'Server byl přidán.',
            'updated' => 'Server byl upraven.',
            'deleted' => 'Server byl odstraněn.',

            'connect-success' => 'Spojení se serverem úspěšně navázáno!',
            'connect-error' => 'Spojení se serverem selhalo: :error',

            'not-azlink' => 'Tento server není spojen pomocí AzLink.',
            'azlink-connect' => 'Spojení se serverem selhalo, adresa a/nebo port jsou nesprávné, nebo je port uzavřen.',
            'azlink-badresponse' => 'Spojení se serverem selhalo (kód :code), token je neplatný, nebo je server špatně nakonfigurován. Pro opravení znovu vykonejte příkaz spojení.',
        ],

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Zdrojová query',
            'source-rcon' => 'Zdrojový RCON',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'Stav FiveM',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff server', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Uživatelé',
        'title-edit' => 'Úprava uživatele :user',
        'title-create' => 'Vytvořit uživatele',

        'fields' => [
            'register-date' => 'Zaregistrován',
            'last-login' => 'Poslední přihlášení',
            'email-verified' => 'E-mailová adresa ověřena',
            '2fa' => 'Dvoufázové ověřování',
            'ip' => 'IP adresa',
        ],

        'info' => [
            'admin' => 'Správce',
            'banned' => 'Zabanován',
            'deleted' => 'Odstraněn',
        ],

        'actions' => [
            'ban' => 'Zabanovat',
            'unban' => 'Odbanovat',
            'delete' => 'Odstranit',
            'verify-email' => 'Ověřit e-mail',
            'disable-2fa' => 'Zakázat 2FA',
        ],

        'alert-deleted' => 'Tento uživatel je odstraněn, nemůže být upraven.',
        'alert-banned' => [
            'title' => 'Tento uživatel je momentálně zabanován:',
            'banned-by' => 'Zabanován uživatelem :author',
            'reason' => 'Důvod: :reason',
            'date' => 'Datum: :date',
        ],

        'edit-profile' => 'Upravit profil',

        'user-info' => 'Informace o uživateli',

        'ban-title' => 'Zabanovat uživatele :user',
        'ban-description' => 'Opravdu chcete zabanovat tohoto uživatele?',

        'status' => [
            'created' => 'Uživatel byl vytvořen.',
            'updated' => 'Uživatel byl upraven.',
            'deleted' => 'Uživatel byl odstraněn.',

            'email-verified' => 'E-mailová adresa byla ověřena.',
            '2fa-disabled' => 'Dvoufázové ověřování bylo zakázáno.',

            'banned' => 'Uživatel je nyní zabanován.',
            'unbanned' => 'Uživatel byl odbanován.',
        ],
    ],

    'roles' => [
        'title' => 'Role',
        'title-edit' => 'Úprava role :role',
        'title-create' => 'Vytvořit roli',

        'permissions' => 'Oprávnění',
        'perm-admin' => [
            'label' => 'Správce',
            'info' => 'Když je skupina správce, bude mít všechna oprávnění.',
        ],

        'info' => [
            'default' => 'Výchozí',
            'admin' => 'Správce',
        ],

        'status' => [
            'power-updated' => 'Role byly aktualizovány.',
            'created' => 'Role byla vytvořena.',
            'updated' => 'Role byla aktualizována.',
            'deleted' => 'Role byla odstraněna.',

            'unauthorized' => 'Tato role je vyšší než vaše vlastní role.',
            'add-admin' => 'Nemůžete dát roli oprávnění ke správě.',
            'remove-admin' => 'Nemůžete vaší roli odebrat oprávnění ke správě.',
            'permanent-role' => 'Tato role nemůže být odstraněna.',
            'own-role' => 'Nemůžete odstranit vaší roli.',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Komentovat pod příspěvkem',
        'delete-other-comments' => 'Odstranit příspěvek jiného uživatele',
        'maintenance-access' => 'Přistupovat k webu při údržbě',
        'admin-access' => 'Přistupovat k nástěnce správce',
        'admin-logs' => 'Zobrazit a spravovat protokoly webu',
        'admin-images' => 'Zobrazit a spravovat obrázky',
        'admin-navbar' => 'Zobrazit a spravovat navigaci',
        'admin-pages' => 'Zobrazit a spravovat stránky',
        'admin-posts' => 'Zobrazit a spravovat příspěvky',
        'admin-settings' => 'Zobrazit a spravovat nastavení',
        'admin-users' => 'Zobrazit a spravovat uživatele',
        'admin-themes' => 'Zobrazit a spravovat témata',
        'admin-plugins' => 'Zobrazit a spravovat doplňky',
    ],

    'bans' => [
        'title' => 'Bany',

        'fields' => [
            'banned-by' => 'Zabanován uživatelem',
            'reason' => 'Důvod',
        ],

        'removed' => 'Zrušeno :date uživatelem :user',
    ],

    'posts' => [
        'title' => 'Příspěvky',
        'title-edit' => 'Upravit příspěvek :post',
        'title-create' => 'Vytvořit příspěvek',

        'published-info' => 'Tento příspěvek nebude veřejně viditelný do tohoto data.',

        'fields' => [
            'published-at' => 'Zveřejněno',
        ],

        'pin' => 'Připnout tento příspěvek',

        'status' => [
            'created' => 'Příspěvek byl vytvořen.',
            'updated' => 'Příspěvek byl upraven.',
            'deleted' => 'Příspěvek byl odstraněn.',
        ],

        'info' => [
            'pinned' => 'Připnuto',
        ],
    ],

    'pages' => [
        'title' => 'Stránky',
        'title-edit' => 'Úprava stránky :page',
        'title-create' => 'Vytvořit stránku',

        'enable' => 'Povolit stránku',

        'status' => [
            'created' => 'Stránka byla vytvořena.',
            'updated' => 'Stránka byla upravena.',
            'deleted' => 'Stránka byla odstraněna.',
        ],
    ],

    'images' => [
        'title' => 'Obrázky',
        'title-edit' => 'Úprava obrázku :image',
        'title-create' => 'Nahrát obrázek',

        'status' => [
            'created' => 'Obrázek byl vytvořen.',
            'updated' => 'Obrázek byl upraven.',
            'deleted' => 'Obrázek byl odstraněn.',
        ],
    ],

    'extensions' => [
        'buy' => 'Koupit za :price',
    ],

    'plugins' => [
        'title' => 'Doplňky',

        'installed' => 'Nainstalované doplňky',
        'available' => 'Dostupné doplňky',

        'azuriom-requirement' => 'Tento doplněk není kompatibilní s vaší verzí Azuriomu.',
        'game-requirement' => 'Tento doplněk není kompatibilní s hrou :game.',
        'plugin-requirement' => 'Doplněk ":plugin" nemá verzi nebo není jeho verze kompatibilní s tímto doplňkem.',

        'status' => [
            'reloaded' => 'Doplňky byly znovu načteny.',
            'enabled' => 'Doplněk byl povolen.',
            'disabled' => 'Doplněk byl zakázán.',
            'updated' => 'Doplněk byl upraven.',
            'installed' => 'Doplněk byl nainstalován.',
            'deleted' => 'Doplněk byl odstraněn.',

            'error-delete' => 'Před odstraněním musí být doplněk odstraněn.',
        ],
    ],

    'themes' => [
        'title' => 'Témata',

        'current' => [
            'title' => 'Aktuální téma',
            'author' => 'Autor: :author',
            'version' => 'Verze: :version',
        ],
        'installed' => 'Nainstalovaná témata',
        'available' => 'Dostupná témata',
        'no-enabled' => 'Nemáte povolena žádná témata.',

        'actions' => [
            'edit-config' => 'Upravit nastavení',
            'disable' => 'Zakázat téma',
        ],

        'status' => [
            'reloaded' => 'Témata byla znovu načtena.',
            'no-config' => 'Toto téma nemá nastavení.',
            'config-updated' => 'Nastavení tématu byla aktualizována.',
            'invalid' => 'Toto téma je neplatné (název složky tématu musí být ID tématu).',
            'updated' => 'Téma bylo upraveno.',
            'installed' => 'Téma bylo nainstalováno.',
            'deleted' => 'Téma bylo odstraněno.',

            'error-delete' => 'Nemůžete odstranit aktuální téma.',
        ],
    ],

    'update' => [
        'title' => 'Aktualizace',

        'subtitle-update' => 'Dostupná aktualizace',
        'subtitle-no-update' => 'Žádné dostupné aktualizace',

        'update' => 'Je dostupná verze <code>:last-version</code> a vy používáte verzi <code>:version</code>.',
        'download' => 'Nejnovější verze Azuriomu je připravena ke stažení.',
        'install' => 'Nejnovější verze Azuriomu byla stažena a je připravena k instalaci.',

        'backup-info' => 'Před aktualizací Azuriomu byste měli zálohovat svůj web!',

        'up-to-date' => 'Používáte nejnovější verzi Azuriomu: <code>:version</code>.',

        'status' => [
            'download-success' => 'Nejnovější verze byla stažena a je připravena k instalaci.',
            'install-success' => 'Aktualizace byla úspěšně nainstalována.',

            'up-to-date' => 'Používáte nejnovější verzi Azuriomu.',
            'error-fetch' => 'Při načítání aktualizací došlo k chybě: :error',
            'error-download' => 'Při stahování došlo k chybě: :error',
            'error-install' => 'Při instalaci došlo k chybě: :error',
        ],

        'actions' => [
            'check' => 'Zkontrolovat aktualizace',
            'install' => 'Nainstalovat',
            'download' => 'Stáhnout',
        ],
    ],

    'logs' => [
        'title' => 'Protokoly',

        'actions' => [
            'clear' => 'Vymazat staré protokoly (15d+)',
        ],

        'status' => [
            'cleared' => 'Staré záznamy byly odstraněny.',
        ],

        'pages' => [
            'created' => 'Vytvořena stránka #:id',
            'updated' => 'Upravena stránka #:id',
            'deleted' => 'Odstraněna stránka #:id',
        ],

        'posts' => [
            'created' => 'Vytvořen příspěvek #:id',
            'updated' => 'Upraven příspěvek #:id',
            'deleted' => 'Odstraněn příspěvek #:id',
        ],

        'images' => [
            'created' => 'Vytvořen obrázek #:id',
            'updated' => 'Upraven obrázek #:id',
            'deleted' => 'Odstraněn obrázek #:id',
        ],

        'roles' => [
            'created' => 'Vytvořena role #:id',
            'updated' => 'Upravena role #:id',
            'deleted' => 'Odstraněna role #:id',
        ],

        'servers' => [
            'created' => 'Vytvořen server #:id',
            'updated' => 'Upraven server #:id',
            'deleted' => 'Odstraněn server #:id',
        ],

        'users' => [
            'updated' => 'Upraven uživatel #:id',
            'deleted' => 'Odstraněn uživatel #:id',
            'transfer' => 'Posláno :money peněz uživateli #:id',
        ],

        'settings' => [
            'updated' => 'Upravena nastavení',
        ],

        'updates' => [
            'installed' => 'Nainstalována aktualizace Azuriomu',
        ],

        'plugins' => [
            'enabled' => 'Povolen doplněk',
            'disabled' => 'Zakázán doplněk',
        ],

        'themes' => [
            'changed' => 'Změněno téma',
        ],
    ],

    'errors' => [
        'back' => 'Zpět na nástěnku',
        '404' => 'Stránka nenalezena',
        'info' => 'Vypadá to, že jste našli chybu v matrixu...',
    ],
];
