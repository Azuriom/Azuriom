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
            'settings' => 'Nastavení',
            'global' => 'Globální',
            'security' => 'Zabezpečení',
            'performances' => 'Výkon',
            'seo' => 'SEO',
            'auth' => 'Přihlašování',
            'mail' => 'E-maily',
            'maintenance' => 'Údržba',
            'social' => 'Sociální sítě',
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
            'redirects' => 'Přesměrování',
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

        'back' => 'Zpět na web',
        'support' => 'Podpora',
        'documentation' => 'Dokumentace',
    ],

    'delete' => [
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

        'users' => 'Uživatelé',
        'posts' => 'Příspěvky',
        'pages' => 'Stránky',
        'images' => 'Obrázky',

        'update' => 'Je dostupná nová verze Azuriomu: :version',
        'http' => 'Váš web nepoužívá https, měli byste jej povolit a vynutit pro bezpečnost vás i ostatních uživatelů.',
        'cloudflare' => 'Pokud používáte Cloudflare, měli byste si nainstalovat doplněk Cloudflare Support.',
        'recent_users' => 'Poslední uživatelé',
        'active_users' => 'Aktivní uživatelé',
        'emails' => 'E-maily jsou zakázány. Pokud uživatel zapomene své heslo, nebude si jej moci obnovit. E-maily můžete povolit v <a href=":url">nastavení e-mailů</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Globální nastavení',

            'name' => 'Název webu',
            'url' => 'URL webu',
            'description' => 'Popis webu',
            'meta' => 'Meta klíčová slova',
            'meta_info' => 'Klíčová slova musí být oddělena čárkou.',
            'favicon' => 'Favikona',
            'background' => 'Pozadí',
            'logo' => 'Logo',
            'timezone' => 'Časové pásmo',
            'locale' => 'Jazyk',
            'money' => 'Název měny webu',
            'copyright' => 'Copyright',
            'user_money_transfer' => 'Povolit převod peněz mezi uživateli',
            'site_key' => 'Klíč webu pro azuriom.com',
            'site_key_info' => 'Klíč webu azuriom.com je vyžadován pro instalaci prémiových doplňků zakoupených v obchodě. Váš klíč získáte na vašem <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom profilu</a>.',
            'webhook' => 'URL příspěvků Discord webhooku',
            'webhook_info' => 'Na tuto adresu URL bude odeslán Discord webhook při vytvoření nového příspěvku, pokud není datum zveřejnění v budoucnu. Ponechte prázdné pro zakázání.',
        ],

        'security' => [
            'title' => 'Nastavení zabezpečení',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Klíč webu',
                'secret_key' => 'Tajný klíč',
                'recaptcha' => 'Klíče reCAPTCHA získáte <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">webu Google reCAPTCHA</a>. Musíte použít klíče reCAPTCHA <strong>v2 neviditelné</strong>.',
                'hcaptcha' => 'Klíče hCaptcha získáte na <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> webu hCaptcha</a>.',
                'turnstile' => 'Klíče Turnstil získáte v <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">panelu Cloudflare</a>. Je potřeba vyprat widget "Managed".',
            ],

            'hash' => 'Šifrovací algoritmus',
            'hash_error' => 'Tento šifrovací algoritmus není podporován vaší aktuální verzí PHP.',
            'force_2fa' => 'Vyžadovat 2FA pro přístup do panelu',
        ],

        'performances' => [
            'title' => 'Nastavení výkonu',

            'cache' => [
                'title' => 'Vymazat mezipaměť',
                'clear' => 'Vymazat mezipaměť',
                'description' => 'Vymazat mezipaměť webu.',
                'error' => 'Při mazání mezipaměti se vyskytla chyba.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost zlepší výkon vašeho webu přidáním další exkluzivní vrstvy mezipaměti.',
                'info' => 'Pokud máte po povolení rozšíření nějaké problémy, měli byste znovu načíst mezipaměť.',

                'enable' => 'Povolit AzBoost',
                'disable' => 'Zakázat AzBoost',
                'reload' => 'Znovu načíst AzBoost',

                'status' => 'AzBoost je momentálně :status.',
                'enabled' => 'povolen',
                'disabled' => 'zakázán',

                'error' => 'Chyba při povolování AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Nastavení SEO',

            'html' => 'Do <code>&lt;záhlaví&gt;</code> nebo <code>&lt;těla&gt;</code> všech stránek můžete zahrnout kód HTML (například pro cookie banner nebo analytika webu) vytvořením souboru pojmenovaného <code>head.blade.php</code> nebo <code>body.blade.php</code> ve složce <code>resources/views/custom/</code>.',
            'home_message' => 'Zpráva na domovské obrazovce',

            'welcome_alert' => [
                'enable' => 'Povolit uvítací vyskakovací okno?',
                'message' => 'Zpráva uvítacího okna',
                'info' => 'Toto vyskakovací okno bude zobrazeno, když uživatel poprvé navštíví web.',
            ],
        ],

        'auth' => [
            'title' => 'Přihlašování',

            'conditions' => 'Podmínky, které mají být přijaty při registraci',
            'conditions_info' => 'Odkazy ve formátu Markdown, například: <code>Přijímám [podmínky](/conditions-link) a [zásady ochrany osobních údajů](/privacy-policy)</code>',
            'registration' => 'Povolit registraci uživatelů',
            'registration_info' => 'Může být stále možné zaregistrovat se pomocí pluginů.',
            'api' => 'Povolit přihlašovací API',
            'api_info' => 'Tato API umožňuje přidání vlastního přihlašování na váš herní server. Pro Minecraft servery používající launcher můžete použít <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> pro jednoduchou a rychlou integraci.',
            'user_change_name' => 'Umožnit uživatelům změnit uživatelské jméno z jejich profilu',
            'user_delete' => 'Umožnit uživatelům odstranit svůj účet z jejich profilu',
        ],

        'mail' => [
            'title' => 'Nastavení e-mailů',
            'from' => 'E-mailová adresa používaná k odesílání e-mailů.',
            'mailer' => 'Typ e-mailu',
            'mailer_info' => 'Azuriom podporuje SMTP a Sendmail pro odesílání e-mailů. Více informací naleznete v naší <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentaci</a>.',
            'disabled' => 'Když jsou e-maily zakázány, uživatelé si nebudou moci obnovit své heslo, pokud ho zapomenou.',
            'sendmail' => 'Použití Sendmailu není doporučeno a měli byste namísto toho používat SMTP server, pokud je to možné.',
            'smtp' => [
                'host' => 'Adresa SMTP hostitele',
                'port' => 'Port SMTP hostitele',
                'encryption' => 'Šifrovací protokol',
                'username' => 'Uživatelské jméno SMTP serveru',
                'password' => 'Heslo SMTP serveru',
            ],
            'verification' => 'Povolit ověřování uživatelských e-mailových adres',
            'send' => 'Poslat testovací email',
            'sent' => 'Testovací e-mail byl úspěšně odeslán.',
            'missing' => 'U vašeho účtu nebyla zadána žádná e-mailová adresa.',
        ],

        'maintenance' => [
            'title' => 'Nastavení údržby',

            'enable' => 'Povolit údržbu',
            'message' => 'Zpráva údržby',
            'global' => 'Povolit údržbu na celém webu',
            'paths' => 'Cesty k zablokování během údržby',
            'info' => 'K blokování všech stránek začínajících stejnou cestou můžete použít <code>/*</code>. Například <code>/news/*</code> zablokuje přístup ke všem novinkám.',
        ],

        'updated' => 'Nastavení byla aktualizována.',
    ],

    'navbar_elements' => [
        'title' => 'Navigace',
        'edit' => 'Upravit prvek navigace :element',
        'create' => 'Vytvořit prvek navigace',

        'restrict' => 'Omezit role, které mohou vidět tento prvek',
        'dropdown' => 'Po uložení tohoto prvku můžete přidávat další prvky do rozbalovací nabídky.',

        'fields' => [
            'home' => 'Domů',
            'link' => 'Externí odkaz',
            'page' => 'Stránka',
            'post' => 'Příspěvek',
            'posts' => 'Seznam příspěvků',
            'plugin' => 'Doplněk',
            'dropdown' => 'Rozbalovací nabídka',
            'new_tab' => 'Otevírat v nové kartě',
        ],

        'updated' => 'Navigace aktualizována.',
        'not_empty' => 'Nemůžete odstranit rozbalovací nabídku s prvky.',
    ],

    'social_links' => [
        'title' => 'Sociální sítě',
        'edit' => 'Upravit odkaz na sociální síť :link',
        'create' => 'Přidat odkaz na sociální síť',
    ],

    'servers' => [
        'title' => 'Servery',
        'edit' => 'Upravit server :server',
        'create' => 'Přidat server',

        'default' => 'Výchozí server',
        'default_info' => 'Počet připojených hráčů na výchozí server bude zobrazen na webu, pokud jej aktuální téma podporuje.',

        'home_display' => 'Zobrazit tento server na domovské stránce',
        'url' => 'Adresa URL tlačítka připojení se',
        'url_info' => 'Ponechte prázdné pro zobrazení adresy serveru. Může být odkaz ke stažení hry/launcheru nebo URL k připojení na server, jako <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Ping nepotřebuje plugin, ale nemůžete pomocí něj vykonávat příkazy.',
        'query_info' => 'S query není možné vykonávat příkazy na serveru.',

        'query_port_info' => 'Může být prázdné, pokud je to stejné jako port hry.',

        'verify' => 'Otestovat okamžité příkazy',

        'rcon_password' => 'Heslo RCON',
        'rcon_port' => 'Port RCON',
        'query_port' => 'Port zdrojové query',
        'unturned_info' => 'V OpenModu musíte použít SRCDS RCON. RocketMod RCON není kompatibilní!',

        'azlink' => [
            'port' => 'Port AzLink',

            'link' => 'Pro propojení serveru s vaším webem pomocí AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Stáhněte si plugin AzLink</a> a nainstalujte jej na svůj server.',
            'link2' => 'Restartovat server.',
            'link3' => 'Vykonat tento příkaz na serveru: ',

            'info' => 'Pokud máte problémy s AzLinkem při používání Cloudflare nebo firewallu, zkuste následovat kroky v <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">často kladených dotazech</a>.',
            'command' => 'Server s vaším webem můžete propojit pomocí následujícího příkazu: ',
            'port_command' => 'Pokud používáte jiný port AzLink než výchozí, musíte jej nastavit příkazem: ',
            'ping' => 'Povolit okamžité příkazy (vyžaduje otevřený port na serveru)',
            'ping_info' => 'Pokud nejsou okamžité příkazy povoleny, budou příkazy vykonávány se zpožděním od 30 sekund do 1 minuty.',
            'custom_port' => 'Použít vlastní port AzLink',

            'error' => 'Spojení se serverem selhalo, adresa a/nebo port jsou nesprávné, nebo je port uzavřen.',
            'badresponse' => 'Spojení se serverem selhalo (kód :code), token je neplatný, nebo je server špatně nakonfigurován. Pro opravení znovu vykonejte příkaz spojení.',
        ],

        'players' => ':count hráč|:count hráčů',
        'offline' => 'Offline',

        'connected' => 'Spojení se serverem úspěšně navázáno!',
        'error' => 'Spojení se serverem selhalo: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Zdrojová query',
            'source-rcon' => 'Zdrojový RCON',
            'steam-azlink' => 'AzLink',
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
        'edit' => 'Úprava uživatele :user',
        'create' => 'Vytvořit uživatele',

        'registered' => 'Zaregistrován',
        'last_login' => 'Poslední přihlášení',
        'ip' => 'IP adresa',

        'admin' => 'Správce',
        'banned' => 'Zabanován',
        'deleted' => 'Odstraněn',

        'ban' => 'Zabanovat',
        'unban' => 'Odbanovat',
        'delete' => 'Odstranit',

        'alert-deleted' => 'Tento uživatel je odstraněn, nemůže být upraven.',
        'alert-banned' => [
            'title' => 'Tento uživatel je momentálně zabanován:',
            'banned-by' => 'Zabanován uživatelem :author',
            'reason' => 'Důvod: :reason',
            'date' => 'Datum: :date',
        ],

        'edit_profile' => 'Upravit profil',

        'info' => 'Informace o uživateli',

        'ban-title' => 'Zabanovat uživatele :user',
        'ban-description' => 'Opravdu chcete zabanovat tohoto uživatele?',

        'email' => [
            'verify' => 'Ověřit e-mail',
            'verified' => 'E-mailová adresa ověřena',
            'date' => 'Ano, :date',
            'verify_success' => 'E-mailová adresa byla ověřena.',
        ],

        '2fa' => [
            'title' => 'Dvoufázové ověřování',
            'secured' => '2FA zapnuto',
            'disable' => 'Zakázat 2FA',
            'disabled' => 'Dvoufázové ověřování bylo zakázáno.',
        ],

        'password' => [
            'title' => 'Poslední změna hesla',
            'force' => 'Vynutit změnu',
            'forced' => 'Musí si změnit heslo',
        ],

        'status' => [
            'banned' => 'Uživatel je nyní zabanován.',
            'unbanned' => 'Uživatel byl odbanován.',
        ],

        'discord' => 'Připojený účet Discord',

        'notify' => 'Poslat upozornění',
        'notify_info' => 'Poslat upozornění tomuto uživateli',
        'notify_all' => 'Poslat upozornění všem uživatelům',
    ],

    'roles' => [
        'title' => 'Role',
        'edit' => 'Úprava role :role (#:id)',
        'create' => 'Vytvořit roli',

        'info' => '(ID: :id, váha: :power)',

        'default' => 'Výchozí',
        'admin' => 'Správce',
        'admin_info' => 'Když je skupina správce, bude mít všechna oprávnění.',

        'updated' => 'Role byly aktualizovány.',
        'unauthorized' => 'Tato role je vyšší než vaše vlastní role.',
        'add_admin' => 'Nemůžete dát roli oprávnění ke správě.',
        'remove_admin' => 'Nemůžete vaší roli odebrat oprávnění ke správě.',
        'delete_default' => 'Tato role nemůže být odstraněna.',
        'delete_own' => 'Nemůžete odstranit vaší roli.',

        'discord' => [
            'title' => 'Připojit Discord role',
            'enable' => 'Povolit připojení Discord rolí',
            'enable_info' => 'Jakmile bude možnost povolena, upravte roli na Discordu a přidejte požadavek na kartě <b>Propojení</b>. Uživatelé mohou získat svou roli na Discordu v nabídce serveru v <b>Propojených rolích</b>.',
            'info' => 'Ve <a href="https://discord.com/developers/applications" target="_blank">vývojářském panelu Discord</a> musíte vytvořit aplikaci a nastavit <b>Linked Role Verification URL</b> na <code>:url</code>',
            'oauth' => 'Poté v <b>OAuth2</b> a na kartě <b>General</b> musíte do pole <b>Redirects</b> přidat <code>:url</code>.',
            'token_info' => 'Token bota lze získat vytvořením bota pro vaši aplikaci na kartě <b>Bot</b> v levé části vývojářského panelu Discord.',

            'token' => 'Token Discord bota',
            'client_id' => 'ID Discord klienta',
            'client_secret' => 'Tajný klíč Discord klienta',
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
        'admin-redirects' => 'Zobrazit a spravovat přesměrování',
        'admin-posts' => 'Zobrazit a spravovat příspěvky',
        'admin-settings' => 'Zobrazit a spravovat nastavení',
        'admin-users' => 'Zobrazit a spravovat uživatele',
        'admin-themes' => 'Zobrazit a spravovat témata',
        'admin-plugins' => 'Zobrazit a spravovat doplňky',
    ],

    'bans' => [
        'title' => 'Bany',

        'by' => 'Zabanován uživatelem',
        'reason' => 'Důvod',
        'removed' => 'Zrušeno :date uživatelem :user',
    ],

    'posts' => [
        'title' => 'Příspěvky',
        'edit' => 'Upravit příspěvek :post',
        'create' => 'Vytvořit příspěvek',

        'published_info' => 'Tento příspěvek nebude veřejně viditelný do tohoto data.',
        'pin' => 'Připnout tento příspěvek',
        'pinned' => 'Připnuto',
        'feed' => 'Zdroj RSS/Atom pro příspěvky je dostupný na <code>:rss</code> a <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Stránky',
        'edit' => 'Úprava stránky :page',
        'create' => 'Vytvořit stránku',

        'enable' => 'Povolit stránku',
        'restrict' => 'Omezit role, které mají přístup k této stránce',
    ],

    'redirects' => [
        'title' => 'Přesměrování',
        'edit' => 'Úprava přesměrování :redirect',
        'create' => 'Tvorba přesměrování',

        'enable' => 'Povolit přesměrování',
        'source' => 'Zdroj',
        'destination' => 'Cíl',
        'code' => 'Stavový kód',

        '301' => '301 - Trvalé přesměrování',
        '302' => '302 - Dočasné přesměrování',
    ],

    'images' => [
        'title' => 'Obrázky',
        'edit' => 'Úprava obrázku :image',
        'create' => 'Nahrát obrázek',
        'help' => 'Pokud se obrázky nenačítají, zkuste následovat kroky v sekci <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">Často kladené dotazy</a>.',
    ],

    'extensions' => [
        'buy' => 'Koupit za :price',
    ],

    'plugins' => [
        'title' => 'Doplňky',

        'list' => 'Nainstalované doplňky',
        'available' => 'Dostupné doplňky',

        'requirements' => [
            'api' => 'Tato verze doplňku není kompatibilní s Azuriomem v:version.',
            'azuriom' => 'Tento doplněk není kompatibilní s vaší verzí Azuriomu.',
            'game' => 'Tento doplněk není kompatibilní s hrou :game.',
            'plugin' => 'Doplněk ":plugin" nemá verzi nebo není jeho verze kompatibilní s tímto doplňkem.',
        ],

        'reloaded' => 'Doplňky byly znovu načteny.',
        'enabled' => 'Doplněk byl povolen.',
        'disabled' => 'Doplněk byl zakázán.',
        'updated' => 'Doplněk byl upraven.',
        'installed' => 'Doplněk byl nainstalován.',
        'deleted' => 'Doplněk byl odstraněn.',
        'delete_enabled' => 'Před odstraněním musí být doplněk zakázán.',
    ],

    'themes' => [
        'title' => 'Témata',

        'current' => 'Aktuální téma',
        'author' => 'Autor: :author',
        'version' => 'Verze: :version',
        'list' => 'Nainstalovaná témata',
        'available' => 'Dostupná témata',
        'no-enabled' => 'Nemáte povolena žádná témata.',
        'legacy' => 'Tato verze tématu není kompatibilní s Azuriom v:version.',

        'config' => 'Upravit nastavení',
        'disable' => 'Zakázat téma',

        'reloaded' => 'Témata byla znovu načtena.',
        'no_config' => 'Toto téma nemá nastavení.',
        'config_updated' => 'Nastavení tématu byla aktualizována.',
        'invalid' => 'Toto téma je neplatné (název složky tématu musí být ID tématu).',
        'updated' => 'Téma bylo upraveno.',
        'installed' => 'Téma bylo nainstalováno.',
        'deleted' => 'Téma bylo odstraněno.',
        'delete_current' => 'Nemůžete odstranit aktuální téma.',
    ],

    'update' => [
        'title' => 'Aktualizace',

        'has_update' => 'Dostupná aktualizace',
        'no_update' => 'Žádné dostupné aktualizace',
        'check' => 'Zkontrolovat aktualizace',

        'update' => 'Je dostupná verze <code>:last-version</code> a vy používáte verzi <code>:version</code>.',
        'changelog' => 'Seznam změn lze nalézt <a href=":url" target="_blank" rel="noopener noreferrer">zde</a>.',
        'download' => 'Nejnovější verze Azuriomu je připravena ke stažení.',
        'install' => 'Nejnovější verze Azuriomu byla stažena a je připravena k instalaci.',

        'backup' => 'Před aktualizací Azuriomu byste měli zálohovat svůj web!',

        'latest_version' => 'Používáte nejnovější verzi Azuriomu: <code>:version</code>.',
        'latest' => 'Používáte nejnovější verzi Azuriomu.',

        'downloaded' => 'Nejnovější verze byla stažena a je připravena k instalaci.',
        'installed' => 'Aktualizace byla úspěšně nainstalována.',
    ],

    'logs' => [
        'title' => 'Protokoly',

        'clear' => 'Vymazat staré protokoly (15d+)',
        'cleared' => 'Staré protokoly byly odstraněny.',
        'changes' => 'Změny',
        'old' => 'Původní hodnota',
        'new' => 'Nová hodnota',

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

        'redirects' => [
            'created' => 'Přesměrování č. :id vytvořeno',
            'updated' => 'Přesměrování č. :id aktualizováno',
            'deleted' => 'Přesměrování č. :id odstraněno',
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

            'login' => 'Úspěšné přihlášení z IP adresy :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Povoleno dvoufázové ověřování',
                'disabled' => 'Zakázáno dvoufázové ověřování',
            ],
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
            'configured' => 'Nastavení tématu aktualizováno',
        ],
    ],

    'errors' => [
        'back' => 'Zpět na nástěnku',
        '404' => 'Stránka nenalezena',
        'info' => 'Vypadá to, že jste našli chybu v matrixu...',
        '2fa' => 'Pro přístup na tuto stránku musíte povolit dvoufázové ověřování.',
    ],
];
