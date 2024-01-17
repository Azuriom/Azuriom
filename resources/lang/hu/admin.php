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
        'dashboard' => 'Irányítópult',
        'settings' => [
            'heading' => 'Beállítások',
            'settings' => 'Beállítások',
            'global' => 'Globális',
            'security' => 'Biztonság',
            'performances' => 'Teljesítmény',
            'seo' => 'SEO',
            'auth' => 'Hitelesítés',
            'mail' => 'E-Mail',
            'maintenance' => 'Karbantartás',
            'social' => 'Közösségi linkek',
            'navbar' => 'Navigációs sáv',
            'servers' => 'Szerverek',
        ],

        'users' => [
            'heading' => 'Felhasználók',
            'users' => 'Felhasználók',
            'roles' => 'Rangok',
            'bans' => 'Kitiltások',
        ],

        'content' => [
            'heading' => 'Tartalom',
            'pages' => 'Oldalak',
            'posts' => 'Bejegyzések',
            'images' => 'Képek',
            'redirects' => 'Átirányítás',
        ],

        'extensions' => [
            'heading' => 'Kiegészítők',
            'plugins' => 'Bővítmények',
            'themes' => 'Témák',
        ],

        'other' => [
            'heading' => 'Egyéb',
            'update' => 'Frissítés',
            'logs' => 'Napló',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Vissza a weboldalra',
        'support' => 'Támogatás',
        'documentation' => 'Dokumentáció',
    ],

    'delete' => [
        'title' => 'Törli?',
        'description' => 'Biztos vagy benne, hogy ezt törölni szeretnéd? Ezt nem vonhatod vissza!',
    ],

    'footer' => ':azuriom &copy; által :year. Panel kinézetét készítette :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Kezdőlap',

        'users' => 'Felhasználók',
        'posts' => 'Bejegyzések',
        'pages' => 'Oldalak',
        'images' => 'Képek',

        'update' => 'Az Azuriom új verziója elérhető: :version',
        'http' => 'A webhelyed nem https-t használ. Kapcsold be és kötelezd a használatát a saját és a felhasználók biztonsága érdekében.',
        'cloudflare' => 'Ha Cloudflare-t használsz, telepítsd a Cloudflare Support bővítményt.',
        'recent_users' => 'Legutóbbi felhasználók',
        'active_users' => 'Aktív felhasználók',
        'emails' => 'Az e-mailek ki vannak kapcsolva. Ha egy felhasználó elfelejti a jelszavát, nem tudja visszaállítani. Az e-maileket az <a href=":url"> e-mail beállításokban </a> kapcsolhatod be.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Globális beállítások',

            'name' => 'Weboldal neve',
            'url' => 'Weboldal URL',
            'description' => 'Oldal leírása',
            'meta' => 'Meta kulcsszavak',
            'meta_info' => 'A kulcsszavakat vesszővel kell elválasztani.',
            'favicon' => 'Favicon',
            'background' => 'Háttér',
            'logo' => 'Logó',
            'timezone' => 'Időzóna',
            'locale' => 'Régió',
            'money' => 'A webhely pénznemének neve',
            'copyright' => 'Minden jog fenntartva',
            'user_money_transfer' => 'Pénzátutalás engedélyezése a felhasználók között',
            'site_key' => 'Oldal kulcs az azuriom.com-hoz',
            'site_key_info' => 'Az azuriom.com webhelykulcs a boltban vásárolt prémium bővítmények telepítéséhez szükséges. A webhelykulcsot az <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer"> Azuriom profilodból </a> kérheted le.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => 'Biztonsági beállítások',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Webhelykulcs',
                'secret_key' => 'Titkos kulcs',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'A hCaptcha kulcsokat a <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha weboldalán </a> kérheted le.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Hash algoritmus',
            'hash_error' => 'Ezt a hash algoritmust ez a PHP verzió nem támogatja.',
            'force_2fa' => '2FA követelése az admin panelhez való hozzáféréshez',
        ],

        'performances' => [
            'title' => 'Teljesítménybeállítások',

            'cache' => [
                'title' => 'Gyorsítótár ürítése',
                'clear' => 'Gyorsítótár ürítése',
                'description' => 'Weboldal gyorsítótárának törlése.',
                'error' => 'Hiba történt a gyorsítótár törlésekor.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'Az AzBoost egy exkluzív gyorsítótár-réteg hozzáadásával javítja a weboldal teljesítményét.',
                'info' => 'Ha a bővítmény engedélyezése után probléma merül fel, töltsd újra a gyorsítótárat.',

                'enable' => 'AzBoost engedélyezése',
                'disable' => 'AzBoost letiltása',
                'reload' => 'AzBoost újratöltése',

                'status' => 'Az AzBoost jelenleg :status.',
                'enabled' => 'engedélyezve',
                'disabled' => 'letiltva',

                'error' => 'Hiba történt az AzBoost bekapcsolása közben.',
            ],
        ],

        'seo' => [
            'title' => 'SEO beállítások',

            'html' => 'A HTML-t az összes oldal <code>&lt;head&gt;</code> vagy <code>&lt;body&gt;</code> részébe beillesztheted (például cookie-szalaghirdetések vagy webhelyelemzések esetén), ha létrehoz egy <code>head.blade.php</code> vagy <code>body.blade.php</code> nevű fájlt a <code>resources/views/custom/</code> mappában.',
            'home_message' => 'Üdvözlő üzenet',

            'welcome_alert' => [
                'enable' => 'Engedélyezed az üdvözlő felugró ablakot?',
                'message' => 'Üdvözlő felugró üzenet',
                'info' => 'Ez a felugró ablak akkor jelenik meg, amikor a felhasználó először meglátogatja a webhelyet.',
            ],
        ],

        'auth' => [
            'title' => 'Hitelesítés',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Regisztráció engedélyezése',
            'registration_info' => 'Még mindig lehetséges a regisztráció, ha ezt egy bővítmény lehetővé teszi.',
            'api' => 'Bejelentkezési API engedélyezése',
            'api_info' => 'Ez az API lehetővé teszi, hogy saját bejelentkeztetést alkalmazz a szervereden. A launcheres Minecraft szerverek esetén használd az <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuthot</a> a gyors és egyszerű integrációhoz.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => 'Lehetővé teszi a felhasználók számára a fiókjuk törlését a profiljukból
',
        ],

        'mail' => [
            'title' => 'E-mail beállítások',
            'from' => 'Az e-mailek küldéséhez használt e-mail cím.',
            'mailer' => 'E-mail típus',
            'mailer_info' => 'Az Azuriom e-mailek küldéséhez támogatja az SMTP-t és a Sendmail-t. További információt az e-mail-beállításokról a <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentációnkban</a> találsz.',
            'disabled' => 'Amikor az e-mailek ki vannak kapcsolva, a felhasználók nem tudják megváltoztatni a jelszavukat ha elfelejtik azt.',
            'sendmail' => 'A Sendmail nem ajánlott. SMTP szervert kéne használnod, amikor lehetséges.',
            'smtp' => [
                'host' => 'SMTP Kiszolgáló Címe',
                'port' => 'SMTP Kiszolgáló Portja',
                'encryption' => 'Titkosítási protokoll',
                'username' => 'SMTP Szerver Felhasználónév',
                'password' => 'SMTP Szerver Jelszó',
            ],
            'verification' => 'E-mail címek megerősítésének bekapcsolása',
            'send' => 'Teszt e-mail küldése',
            'sent' => 'A teszt e-mail sikeresen elküldve.',
            'missing' => 'A fiókodban nincs e-mail cím megadva.',
        ],

        'maintenance' => [
            'title' => 'Karbantartási beállítások',

            'enable' => 'Karbantartás bekapcsolása',
            'message' => 'Karbantartási üzenet',
            'global' => 'Karbantartás engedélyezése az összes weboldalon',
            'paths' => 'Karbantartás során blokkolandó utak',
            'info' => 'A <code>/*</code> használatával blokkolhatod az összes azonos útvonallal kezdődő oldalt. Például a <code>/news/*</code> blokkolja a hozzáférést az összes hírhez.',
        ],

        'updated' => 'A beállítások frissítve lettek.',
    ],

    'navbar_elements' => [
        'title' => 'Navigációs sáv',
        'edit' => ':element navigációs elem szerkesztése',
        'create' => 'Navigációs elem létrehozása',

        'restrict' => 'Korlátozzd azokat a rangokat, amelyek láthatják ezt az elemet',
        'dropdown' => 'Miután ezt az elemet elmented, hozzá tudsz adni elemeket a legördülő listához.',

        'fields' => [
            'home' => 'Kezdőlap',
            'link' => 'Külső link',
            'page' => 'Oldal',
            'post' => 'Bejegyzés',
            'posts' => 'Bejegyzések listája',
            'plugin' => 'Bővítmény',
            'dropdown' => 'Legördülő lista',
            'new_tab' => 'Megnyitás új lapon',
        ],

        'updated' => 'Navigációs menü frissítve.',
        'not_empty' => 'Nem törölhetsz legördülő listákat, amik még listaelemeket tartalmaznak.',
    ],

    'social_links' => [
        'title' => 'Közösségi linkek',
        'edit' => ':link közösségi link szerkesztése',
        'create' => 'Közösségi link hozzáadása',
    ],

    'servers' => [
        'title' => 'Szerverek',
        'edit' => ':server szerver szerkesztése',
        'create' => 'Szerver hozzáadása',

        'default' => 'Alapértelmezett szerver',
        'default_info' => 'Az alapértelmezett szerveren levő játékosok száma fog megjelenni a weboldalon ha a jelenlegi téma ezt támogatja.',

        'home_display' => 'A szerver megjelenítése a kezdőlapon',
        'url' => 'Csatlakozás gomb URL címe',
        'url_info' => 'Hagyd üresen a szerver címének megjelenítéséhez. Lehet egy link a játék/indító letöltéséhez, vagy egy URL a szerverhez való csatlakozáshoz, például <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'A ping linkhez nem kell plugin, de nem lehet vele parancsokat végrehajtani.',
        'query_info' => 'Query linkkel nem lehet parancsokat futtatni a szerveren.',

        'query_port_info' => 'Üres lehet, ha megegyezik a játék portjával.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Rcon jelszó',
        'rcon_port' => 'Rcon Port',
        'query_port' => 'Query Port',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLink Port',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Töltsd le az AzLink plugint</a> és telepítsd a szerveredre.',
            'link2' => 'Szerver újraindítása.',
            'link3' => 'Fusson le ez a parancs a szerveren: ',

            'info' => 'Ha a Cloudflare vagy tűzfal használata esetén problémái vannak az AzLinkkel, próbálja meg követni a <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a> lépéseket.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => 'Ha az alapértelmezett-től eltérő AzLink portot használsz, ezzel a paranccsal be kell állítanod: ',
            'ping' => 'Azonnali parancsok bekapcsolása (szükséges hozzá egy nyitott port a szerveren)',
            'ping_info' => 'Amikor az azonnali parancsok nincsenek bekapcsolva, a parancsok 30 másodperc és 1 perc közti késéssel lesznek végrehajtva.',
            'custom_port' => 'Egyedi AzLink-port használata',

            'error' => 'A szerverhez való csatlakozás sikertelen, a cím és/vagy port helytelen, vagy a port le van zárva.',
            'badresponse' => 'A szerverhez való csatlakozás sikertelen (Kód: :code), a token érvénytelen vagy a szerver rosszul van beállítva. Újból futtathatod az összekötő parancsot a hiba elhárításához.',
        ],

        'players' => ':count játékos|:count játékos',
        'offline' => 'Nem elérhető',

        'connected' => 'A szerverrel való kapcsolat létrehozása sikeres!',
        'error' => 'A szerverhez való kapcsolat létrehozása sikertelen: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Query',
            'source-rcon' => 'RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM státusz',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff szerver', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Felhasználók',
        'edit' => ':user szerkesztése',
        'create' => 'Felhasználó létrehozása',

        'registered' => 'Regisztrált',
        'last_login' => 'Utolsó bejelentkezés',
        'ip' => 'IP cím',

        'admin' => 'Adminisztrátor',
        'banned' => 'Kitiltva',
        'deleted' => 'Törölve',

        'ban' => 'Kitiltás',
        'unban' => 'Kitiltás visszavonása',
        'delete' => 'Törlés',

        'alert-deleted' => 'Ez a felhasználó törölve lett, ezért nem szerkeszthető.',
        'alert-banned' => [
            'title' => 'Ez a felhasználó jelenleg ki van tiltva:',
            'banned-by' => 'Kitiltva :author által',
            'reason' => 'Oka: :reason',
            'date' => 'Dátum: :date',
        ],

        'edit_profile' => 'Profil szerkesztése',

        'info' => 'Felhasználó információi',

        'ban-title' => ':user kitiltása',
        'ban-description' => 'Biztosan ki akarod tiltani ezt a felhasználót?',

        'email' => [
            'verify' => 'E-mail cím megerősítése',
            'verified' => 'E-mail cím megerősítve',
            'date' => 'Igen, a :date -én/-án',
            'verify_success' => 'Az e-mail cím meg lett erősítve.',
        ],

        '2fa' => [
            'title' => 'Kétlépcsős hitelesítés',
            'secured' => '2FA enabled',
            'disable' => '2FA kikapcsolása',
            'disabled' => 'A kétfaktoros bejelentkeztetés ki lett kapcsolva.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'A felhasználó kitiltásra került.',
            'unbanned' => 'A felhasználó kitiltása feloldásra került.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Értesítés küldése
',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Rangok',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Új rang létrehozása',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Alapértelmezett',
        'admin' => 'Adminisztrátor',
        'admin_info' => 'Ha a rang adminisztrátor, mindenhez van joga.',

        'updated' => 'Rangok frissítve.',
        'unauthorized' => 'Ez a rang magasabb, mint a sajátod.',
        'add_admin' => 'Nem adhatsz hozzá adminisztrátori jogot a rangokhoz.',
        'remove_admin' => 'Nem vonhatod meg az adminisztrátori jogot a rangodtól.',
        'delete_default' => 'Ez a rang nem törölhető.',
        'delete_own' => 'Nem törölheted a saját rangodat.',

        'discord' => [
            'title' => 'Link Discord roles',
            'enable' => 'Enable Discord roles link',
            'enable_info' => 'Once enabled, edit the role on Discord, and add a requirement in the <b>Links</b> tab. Users can get their Discord role in the server menu, in <b>Linked Roles</b>.',
            'info' => 'You need to create an application on the <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> and set the <b>Linked Role Verification URL</b> to <code>:url</code>',
            'oauth' => 'Then, in <b>OAuth2</b> and in <b>General</b>, you need to add <code>:url</code> in the <b>Redirects</b>.',
            'token_info' => 'The Bot token can be obtained by creating a bot for your application, in the <b>Bot</b> tab on the left of the Discord developer dashboard.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Hozzászólás bejegyzésekhez',
        'delete-other-comments' => 'Másik felhasználó hozzászólásának törlése',
        'maintenance-access' => 'Hozzáférés a weboldalhoz karbantartás alatt',
        'admin-access' => 'Hozzáférés az adminisztrátori felülethez',
        'admin-logs' => 'Weboldal naplójának megtekintése és kezelése',
        'admin-images' => 'Képek megtekintése és kezelése',
        'admin-navbar' => 'Navigációs menü megtekintése és kezelése',
        'admin-pages' => 'Oldalak megtekintése és kezelése',
        'admin-redirects' => 'Beállítások megtekintése és kezelése',
        'admin-posts' => 'Bejegyzések megtekintése és kezelése',
        'admin-settings' => 'Beállítások megtekintése és kezelése',
        'admin-users' => 'Felhasználók megtekintése és kezelése',
        'admin-themes' => 'Témák megtekintése és kezelése',
        'admin-plugins' => 'Bővítmények megtekintése és kezelése',
    ],

    'bans' => [
        'title' => 'Kitiltások',

        'by' => 'Kitiltotta',
        'reason' => 'Indok',
        'removed' => 'Törölve ekkor: :date, :user által',
    ],

    'posts' => [
        'title' => 'Bejegyzések',
        'edit' => ':post bejegyzés szerkesztése',
        'create' => 'Bejegyzés létrehozása',

        'published_info' => 'Ez a bejegyzés nem lesz látható a publikum számára eddig a dátumig.',
        'pin' => 'Bejegyzés kitűzése',
        'pinned' => 'Rögzített',
        'feed' => 'A bejegyzésekhez RSS/Atom hírcsatorna érhető el az <code>:rss</code> és az <code>:atom</code> oldalon.',
    ],

    'pages' => [
        'title' => 'Oldalak',
        'edit' => ':page oldal szerkesztése',
        'create' => 'Oldal létrehozása',

        'enable' => 'Oldal engedélyezése',
        'restrict' => 'Korlátozzd azokat a rangokat, amelyek láthatják ezt az oldalt',
    ],

    'redirects' => [
        'title' => 'Átirányítás',
        'edit' => ':redirect átirányítás szerkesztése',
        'create' => 'Átirányítás létrehozása',

        'enable' => 'Átirányítás engedélyezése',
        'source' => 'Forrás',
        'destination' => 'Cél',
        'code' => 'Állapot kód',

        '301' => '301 - Állandó átirányítás',
        '302' => '302 - Ideiglenes átirányítás',
    ],

    'images' => [
        'title' => 'Képek',
        'edit' => ':image kép szerkesztése',
        'create' => 'Kép feltöltése',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Megveszem ennyiért: :price',
    ],

    'plugins' => [
        'title' => 'Bővítmények',

        'list' => 'Telepített bővítmények',
        'available' => 'Elérhető bővítmények',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => 'Ez a bővítmény nem kompatibilis az Azuriom-verzióddal.',
            'game' => 'Ez a bővítmény nem kompatibilis a :game játékkal.',
            'plugin' => 'A ":plugin" bővítmény hiányzik vagy a verziója nem kompatibilis ezzel a bővítménnyel.',
        ],

        'reloaded' => 'Bővítmények újratöltve.',
        'enabled' => 'Bővítmény bekapcsolva.',
        'disabled' => 'Bővítmény kikapcsolva.',
        'updated' => 'Bővítmény frissítve.',
        'installed' => 'Bővítmény telepítve.',
        'deleted' => 'Bővítmény törölve.',
        'delete_enabled' => 'A bővítményt ki kell kapcsolni, mielőtt törölhető.',
    ],

    'themes' => [
        'title' => 'Témák',

        'current' => 'Jelenlegi téma',
        'author' => 'Szerző: :author',
        'version' => 'Verzió: :version',
        'list' => 'Telepített témák',
        'available' => 'Elérhető témák',
        'no-enabled' => 'Nincs egy bekapcsolt téma sem.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => 'Beállítás szerkesztése',
        'disable' => 'Téma kikapcsolása',

        'reloaded' => 'Témák újratöltve.',
        'no_config' => 'Ennek a témának nincsenek beállításai.',
        'config_updated' => 'Téma beállításai frissítve.',
        'invalid' => 'Ez a téma érvénytelen (a téma mappájának kell a téma id-jének lennie).',
        'updated' => 'Téma frissítve.',
        'installed' => 'Téma telepítve.',
        'deleted' => 'Téma törölve.',
        'delete_current' => 'Nem törölheted az aktuális témát.',
    ],

    'update' => [
        'title' => 'Frissítés',

        'has_update' => 'Frissítés elérhető',
        'no_update' => 'Nincs elérhető frissítés',
        'check' => 'Frissítések keresése',

        'update' => 'Az Azuriom <code>:last-version</code> verziója elérhető. Ennek az oldalnak a verziója <code>:version</code>.',
        'changelog' => 'A változásnapló elérhető <a href=":url" target="_blank" rel="noopener noreferrer">itt</a>.',
        'download' => 'Az Azuriom legújabb verziója letöltésre kész.',
        'install' => 'Az Azuriom legújabb verziója le lett töltve, telepítésre kész.',

        'backup' => 'Az Azuriom frissítése előtt készíts biztonsági mentést a weboldalról!',

        'latest_version' => 'Az Azuriom legújabb verziója fut a weboldalon: <code>:version</code>.',
        'latest' => 'Az Azuriom legújabb verzióját használod.',

        'downloaded' => 'A legújabb verzió letöltése kész, most már telepíthető.',
        'installed' => 'Frissítés telepítése sikeres.',
    ],

    'logs' => [
        'title' => 'Napló',

        'clear' => 'Régi naplóbejegyzések törlése (15+ nap)',
        'cleared' => 'Régi naplóbejegyzések törölve.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => '#:id oldal létrehozva',
            'updated' => '#:id oldal frissítve',
            'deleted' => '#:id oldal törölve',
        ],

        'posts' => [
            'created' => '#:id bejegyzés létrehozva',
            'updated' => '#:id bejegyzés frissítve',
            'deleted' => '#:id bejegyzés törölve',
        ],

        'images' => [
            'created' => '#:id kép létrehozva',
            'updated' => '#:id kép frissítve',
            'deleted' => '#:id kép törölve',
        ],

        'redirects' => [
            'created' => '#:id átirányítás létrehozva',
            'updated' => '#:id átirányítás frissítve',
            'deleted' => '#:id átirányítás törölve',
        ],

        'roles' => [
            'created' => '#:id rang létrehozva',
            'updated' => '#:id rang frissítve',
            'deleted' => '#:id rang törölve',
        ],

        'servers' => [
            'created' => '#:id szerver létrehozva',
            'updated' => '#:id szerver frissítve',
            'deleted' => '#:id szerver törölve',
        ],

        'users' => [
            'updated' => '#:id felhasználó frissítve',
            'deleted' => '#:id felhasználó törölve',
            'transfer' => 'Pénz (:money) küldve neki: #:id',

            'login' => 'Sikeres bejelentkezés :ip -ről (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Kétlépcsős hitelesítés bekapcsolása',
                'disabled' => 'Kétlépcsős hitelesítés kikapcsolása',
            ],
        ],

        'settings' => [
            'updated' => 'Beállítások frissítve',
        ],

        'updates' => [
            'installed' => 'Azuriom frissítés telepítve',
        ],

        'plugins' => [
            'enabled' => 'Bővítmény bekapcsolva',
            'disabled' => 'Bővítmény kikapcsolva',
        ],

        'themes' => [
            'changed' => 'Téma megváltoztatva',
            'configured' => 'Frissített téma-konfiguráció',
        ],
    ],

    'errors' => [
        'back' => 'Vissza a kezelőfelületre',
        '404' => 'Oldal Nem Található',
        'info' => 'Úgy tűnik, hibát találtál a mátrixban...',
        '2fa' => 'Az oldal eléréséhez engedélyezned kell a kétlépcsős hitelesítést.',
    ],
];
