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
        'dashboard' => 'Kontrollpanel',
        'settings' => [
            'heading' => 'Inställningar',
            'settings' => 'Inställningar',
            'global' => 'Globalt',
            'security' => 'Säkerhet',
            'performances' => 'Prestanda',
            'seo' => 'SEO',
            'auth' => 'Autentisering',
            'mail' => 'E-post',
            'maintenance' => 'Underhåll',
            'social' => 'Sociala länkar',
            'navbar' => 'Navbar',
            'servers' => 'Servrar',
        ],

        'users' => [
            'heading' => 'Användare',
            'users' => 'Användare',
            'roles' => 'Roller',
            'bans' => 'Bannlysningar',
        ],

        'content' => [
            'heading' => 'Innehåll',
            'pages' => 'Sidor',
            'posts' => 'Inlägg',
            'images' => 'Bilder',
            'redirects' => 'Omdirigeringar',
        ],

        'extensions' => [
            'heading' => 'Tillägg',
            'plugins' => 'Plugins',
            'themes' => 'Teman',
        ],

        'other' => [
            'heading' => 'Övrigt',
            'update' => 'Uppdatera',
            'logs' => 'Loggar',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Tillbaka till webbsidan',
        'support' => 'Stöd',
        'documentation' => 'Dokumentation',
    ],

    'delete' => [
        'title' => 'Radera?',
        'description' => 'Är du säker på att du vill ta bort detta? Du kommer inte att kunna gå tillbaka!',
    ],

    'footer' => 'Drivs av :azuriom &copy; :year. Panel designad av :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Kontrollpanel',

        'users' => 'Användare',
        'posts' => 'Inlägg',
        'pages' => 'Sidor',
        'images' => 'Bilder',

        'update' => 'En ny version av Azuriom finns: :version',
        'http' => 'Din webbplats använder inte https, du bör aktivera och tvinga den för din säkerhet och en av användarna.',
        'cloudflare' => 'Om du använder Cloudflare, bör du installera Cloudflare Support plugin.',
        'recent_users' => 'Senaste användare',
        'active_users' => 'Aktiva användare',
        'emails' => 'E-postmeddelanden är inaktiverade. Om en användare glömmer sitt lösenord kommer han inte att kunna återställa det. Du kan aktivera e-post i <a href=":url">e-postinställningar</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Globala inställningar',

            'name' => 'Sidans namn',
            'url' => 'Webbadress',
            'description' => 'Webbplatsens Beskrivning',
            'meta' => 'Meta-nyckelord',
            'meta_info' => 'Nyckelorden måste separeras med kommatecken.',
            'favicon' => 'Favicon',
            'background' => 'Bakgrund',
            'logo' => 'logotyp',
            'timezone' => 'Timezone',
            'locale' => 'Språk',
            'money' => 'Namnet på webbplatsens valuta',
            'copyright' => 'Upphovsrätt',
            'user_money_transfer' => 'Aktivera överföring av pengar mellan användare',
            'site_key' => 'Webbplatsnyckel för azuriom.com',
            'site_key_info' => 'Den azuriom.com webbplats nyckel krävs för att installera premium tillägg köpta på marknaden. Du kan få din webbplatsnyckel i din <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom-profil</a>.',
            'webhook' => 'Inlägg Discord Webhook URL',
            'webhook_info' => 'En Discord-webhook kommer att skickas till denna URL när du skapar ett nytt inlägg, om publiceringsdatumet inte är i framtiden. Lämna tomt för att inaktivera.',
        ],

        'security' => [
            'title' => 'Säkerhetsinställningar',

            'captcha' => [
                'title' => 'Robotfilter (Captcha)',
                'site_key' => 'Site key',
                'secret_key' => 'Hemlig nyckel',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'Du kan få hCaptcha nycklar på <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha webbplats</a>.',
                'turnstile' => 'Du kan få Turnstil nycklar på <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare instrumentpanelen</a>. Du måste välja "Managed" widget.',
            ],

            'hash' => 'Hash-algoritm',
            'hash_error' => 'Denna hash-algoritm stöds inte av din nuvarande PHP-version.',
            'force_2fa' => 'Kräv 2FA för åtkomst till administratörspanelen',
        ],

        'performances' => [
            'title' => 'Prestandainställningar',

            'cache' => [
                'title' => 'Rensa cache',
                'clear' => 'Rensa cache',
                'description' => 'Rensa cache för databasen.',
                'error' => 'Kunde inte rensa cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost förbättrar din webbplats prestanda genom att lägga till ett mer exklusivt cache-lager.',
                'info' => 'Om du har några problem efter aktivering av ett tillägg bör du ladda om cachen.',

                'enable' => 'Aktivera AzBoost',
                'disable' => 'Inaktivera AzBoost',
                'reload' => 'Ladda om AzBoost',

                'status' => 'AzBoost är för närvarande :status.',
                'enabled' => 'aktiverad',
                'disabled' => 'funktionshindrade',

                'error' => 'Fel vid aktivering av AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'SEO inställningar',

            'html' => 'Du kan inkludera HTML i <code>&lt;head&gt;</code> eller <code>&lt;body&gt;</code> av alla sidor (e.. för cookie banner eller webbplats analytiker) genom att skapa en fil som heter <code>huvudet. lade.php</code> eller <code>body.blade.php</code> i mappen <code>resurser/vyer/anpassa/</code>.',
            'home_message' => 'Hem meddelande',

            'welcome_alert' => [
                'enable' => 'Aktivera välkomstpopup?',
                'message' => 'Meddelande om välkomstpopup',
                'info' => 'Denna popup kommer att visas första gången en användare besöker webbplatsen.',
            ],
        ],

        'auth' => [
            'title' => 'Autentisering',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Habilitar registro de usuarios',
            'registration_info' => 'Det kan fortfarande vara möjligt att registrera sig via plugins.',
            'api' => 'Aktivera Auth API',
            'api_info' => 'Detta API låter dig lägga till en anpassad autentisering till din spelserver. För Minecraft-servrar som använder en bärraketer kan du använda <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> för en enkel och snabb integration.',
            'user_change_name' => 'Tillåt användare att ändra användarnamn från sin profil',
            'user_delete' => 'Tillåt användare att ändra användarnamn från sin profil',
        ],

        'mail' => [
            'title' => 'E-postinställningar',
            'from' => 'E-postadress att skicka e-post från.',
            'mailer' => 'E-posttyp',
            'mailer_info' => 'Azuriom stöder SMTP och Sendmail för att skicka e-post. Du kan hitta mer information om e-postkonfigurationen på vår <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentation</a>.',
            'disabled' => 'När e-post är inaktiverad, användare kommer inte att kunna återställa sitt lösenord om de glömmer det.',
            'sendmail' => 'Att använda Sendmail rekommenderas inte och du bör istället använda en SMTP server när det är möjligt.',
            'smtp' => [
                'host' => 'SMTP Värd-adress',
                'port' => 'SMTP Värd-port',
                'encryption' => 'Krypteringsprotokoll',
                'username' => 'SMTP Server Användarnamn',
                'password' => 'SMTP Server Lösenord',
            ],
            'verification' => 'Aktivera verifiering av användares e-postadress',
            'send' => 'Skicka ett testmail',
            'sent' => 'Testmeddelandet har skickats.',
            'missing' => 'Ingen e-postadress har angetts på ditt konto.',
        ],

        'maintenance' => [
            'title' => 'Inställningar för underhåll',

            'enable' => 'Aktivera underhållsläge',
            'message' => 'Underhållsmeddelande',
            'global' => 'Aktivera underhåll på hela webbplatsen',
            'paths' => 'Vägar att blockera under underhåll',
            'info' => 'Du kan använda <code>/*</code> för att blockera alla sidor som börjar med samma sökväg. Till exempel, <code>/news/*</code> kommer att blockera åtkomst till alla nyheter.',
        ],

        'updated' => 'Inställningarna har uppdaterats.',
    ],

    'navbar_elements' => [
        'title' => 'Navbar',
        'edit' => 'Redigera navigationsfält :element',
        'create' => 'Skapa nytt element',

        'restrict' => 'Begränsa roller som kommer att kunna se detta element',
        'dropdown' => 'Du kan lägga till element i den här rullgardinsmenyn när elementet är sparat.',

        'fields' => [
            'home' => 'Hem',
            'link' => 'Extern länk',
            'page' => 'Sida',
            'post' => 'Inlägg',
            'posts' => 'Lista över inlägg',
            'plugin' => 'Plugin',
            'dropdown' => 'Rullgardinsmeny',
            'new_tab' => 'Öppna i ny flik',
        ],

        'updated' => 'Navbar uppdaterad.',
        'not_empty' => 'Du kan inte ta bort rullgardinsmenyn med element.',
    ],

    'social_links' => [
        'title' => 'Sociala länkar',
        'edit' => 'Redigera social länk :link',
        'create' => 'Lägg till social länk',
    ],

    'servers' => [
        'title' => 'Servrar',
        'edit' => 'Redigera server :server',
        'create' => 'Lägg till server',

        'default' => 'Standardserver',
        'default_info' => 'Antalet spelare som är anslutna från standardservern kommer att visas på webbplatsen om det aktuella temat stöder det.',

        'home_display' => 'Visa denna server på hemsidan',
        'url' => 'Åtgärdsknappens URL',
        'url_info' => 'Lämna tomt för att visa serveradressen. Kan vara en länk för att ladda ner spelet/launcher eller en URL för att gå med i servern som <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Ping-länken behöver inte en plugin, men du kan inte köra kommandon med den.',
        'query_info' => 'Med frågelänk är det inte möjligt att köra kommandon på servern.',

        'query_port_info' => 'Kan vara tomt om det är samma som spelporten.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Lösenord för Rcon',
        'rcon_port' => 'Rcon port',
        'query_port' => 'Källans frågeport',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLinks port',

            'link' => 'För att länka din server till din webbplats med AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Ladda ner insticksmodulen AzLink</a> och installera den på din server.',
            'link2' => 'Starta om servern.',
            'link3' => 'Kör detta kommando på servern: ',

            'info' => 'Om du har problem med AzLink när du använder Cloudflare eller en brandvägg, prova att följa stegen i <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Du kan länka din server till din webbplats med kommandot: ',
            'port_command' => 'Om du använder en annan AzLink-port än standard måste du konfigurera den med kommandot: ',
            'ping' => 'Aktivera snabbkommandon (kräver en öppen port på servern)',
            'ping_info' => 'När snabbkommandon inte är aktiverade, kommer kommandon att köras med en fördröjning på 30 sekunder till 1 minut.',
            'custom_port' => 'Använd en anpassad AzLink-port',

            'error' => 'Anslutningen till servern har misslyckats, adressen och/eller porten är felaktig, eller så stängs porten.',
            'badresponse' => 'Anslutningen till servern har misslyckats (kod :code), token är ogiltig eller servern är felkonfigurerad. Du kan göra om länkkommandot för att åtgärda detta.',
        ],

        'players' => ':count spelare|:count spelare',
        'offline' => 'Offline',

        'connected' => 'Anslutningen till servern har gjorts framgångsrikt!',
        'error' => 'Anslutningen till servern misslyckades: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Källfråga',
            'source-rcon' => 'Källa RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM status',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff Server', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Användare',
        'edit' => 'Redigera användare :user',
        'create' => 'Skapa användare',

        'registered' => 'Registrerad den',
        'last_login' => 'Senaste inloggning på',
        'ip' => 'IP-adress',

        'admin' => 'Administratör',
        'banned' => 'Bannlyst',
        'deleted' => 'Borttagen',

        'ban' => 'Bannlys',
        'unban' => 'Avblockera',
        'delete' => 'Radera',

        'alert-deleted' => 'Den här användaren tas bort, den kan inte redigeras.',
        'alert-banned' => [
            'title' => 'Denna användare är för närvarande bannlyst:',
            'banned-by' => 'Bannad av: :author',
            'reason' => 'Orsak: :reason',
            'date' => 'Datum: :datum',
        ],

        'edit_profile' => 'Ändra profil',

        'info' => 'Användarinformation',

        'ban-title' => 'Ban :user',
        'ban-description' => 'Är du säker på att du vill bannlysa den här användaren?',

        'email' => [
            'verify' => 'Verifiera e-post',
            'verified' => 'E-postadress verifierad',
            'date' => 'Ja, vid :date',
            'verify_success' => 'E-postadressen har verifierats.',
        ],

        '2fa' => [
            'title' => 'Tvåfaktorsautentisering',
            'secured' => '2FA enabled',
            'disable' => 'Inaktivera 2FA',
            'disabled' => 'Tvåfaktorsautentisering har inaktiverats.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'Denna användare är nu bannlyst.',
            'unbanned' => 'Den här användaren har blivit bannlyst.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Skicka en avisering',
        'notify_info' => 'Skicka en e-postnotifiering till användaren',
        'notify_all' => 'Skicka en e-postnotifiering till användaren',
    ],

    'roles' => [
        'title' => 'Roller',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Skapa roll',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Standard',
        'admin' => 'Administratör',
        'admin_info' => 'När gruppen är admin har den alla behörigheter.',

        'updated' => 'Inställningarna har uppdaterats.',
        'unauthorized' => 'Denna roll är högre än din egen roll.',
        'add_admin' => 'Du kan inte lägga till administratörsbehörighet till en roll.',
        'remove_admin' => 'Du kan inte ta bort administratörsbehörigheten för din roll.',
        'delete_default' => 'Denna roll kan inte tas bort.',
        'delete_own' => 'Du kan inte ta bort din roll.',

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
        'create-comments' => 'Kommentera ett inlägg',
        'delete-other-comments' => 'Ta bort en inlägg kommentar från en annan användare',
        'maintenance-access' => 'Gå till webbplatsen under ett underhåll',
        'admin-access' => 'Åtkomst till admin-instrumentpanelen',
        'admin-logs' => 'Visa och hantera webbplatsloggar',
        'admin-images' => 'Visa och hantera webbplatsloggar',
        'admin-navbar' => 'Visa och hantera webbplatsloggar',
        'admin-pages' => 'Visa och hantera sidor',
        'admin-redirects' => 'Visa och hantera omdirigeringar',
        'admin-posts' => 'Visa och hantera inlägg',
        'admin-settings' => 'Visa och hantera inställningar',
        'admin-users' => 'Visa och hantera användare',
        'admin-themes' => 'Visa och hantera teman',
        'admin-plugins' => 'Visa och hantera plugins',
    ],

    'bans' => [
        'title' => 'Bannlysningar',

        'by' => 'Bannlyst av',
        'reason' => 'Anledning',
        'removed' => 'Tog bort :date av :user',
    ],

    'posts' => [
        'title' => 'Inlägg',
        'edit' => 'Redigera inlägg :post',
        'create' => 'Skapa inlägg',

        'published_info' => 'Det här inlägget kommer inte att synas offentligt förrän detta datum.',
        'pin' => 'Fäst detta inlägg',
        'pinned' => 'Fäst',
        'feed' => 'Ett RSS/Atom-flöde för inläggen finns tillgängligt på <code>:rss</code> och <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Sidor',
        'edit' => 'Redigera sida #:page',
        'create' => 'Skapa sida',

        'enable' => 'Aktivera sidan',
        'restrict' => 'Begränsa roller som kommer att kunna komma åt denna sida',
    ],

    'redirects' => [
        'title' => 'Omdirigeringar',
        'edit' => 'Redigerar omdirigering :redirect',
        'create' => 'Skapa omdirigering',

        'enable' => 'Aktivera omdirigering',
        'source' => 'Källa',
        'destination' => 'Mål',
        'code' => 'Statuskod',

        '301' => '301 - Permanent omdirigering',
        '302' => '302 - Tillfällig omdirigering',
    ],

    'images' => [
        'title' => 'Bilder',
        'edit' => 'Redigera bild :image',
        'create' => 'Ladda upp bild',
        'help' => 'Om bilderna inte laddas, prova att följa stegen i <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Köp för :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Installerade plugins',
        'available' => 'Tillgängliga plugins',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => 'Denna plugin är inte kompatibel med din Azuriom-version.',
            'game' => 'Denna plugin är inte kompatibel med spelet :game.',
            'plugin' => 'Pluginen ":plugin" saknas eller dess version är inte kompatibel med denna plugin.',
        ],

        'reloaded' => 'Pluginerna har laddats om.',
        'enabled' => 'Pluginen har aktiverats.',
        'disabled' => 'Pluginen har inaktiverats.',
        'updated' => 'Plugin uppdaterades framgångsrikt.',
        'installed' => 'Pluginet installerades.',
        'deleted' => 'Pluginet togs bort.',
        'delete_enabled' => 'Pluginen måste inaktiveras innan den kan tas bort.',
    ],

    'themes' => [
        'title' => 'Teman',

        'current' => 'Nuvarande tema',
        'author' => 'Författare: :author',
        'version' => 'Version: :version',
        'list' => 'Installerade teman',
        'available' => 'Tillgängliga teman',
        'no-enabled' => 'Du har inga teman aktiverade.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => 'Redigera konfiguration',
        'disable' => 'Inaktivera tema',

        'reloaded' => 'Teman har laddats om.',
        'no_config' => 'Detta tema har inte konfigurerats.',
        'config_updated' => 'Temakonfigurationen har uppdaterats.',
        'invalid' => 'Detta tema är ogiltigt (temamappens namn måste vara tema-id).',
        'updated' => 'Temat har uppdaterats.',
        'installed' => 'Temat har installerats.',
        'deleted' => 'Temat har tagits bort.',
        'delete_current' => 'Du kan inte ta bort det aktuella temat.',
    ],

    'update' => [
        'title' => 'Uppdatera',

        'has_update' => 'Uppdatering tillgänglig',
        'no_update' => 'Inga uppdateringar tillgängliga',
        'check' => 'Sök efter uppdateringar',

        'update' => 'Versionen <code>:last-version</code> av Azuriom är tillgänglig och du är på version <code>:version</code>.',
        'changelog' => 'Ändringsloggen är tillgänglig <a href=":url" target="_blank" rel="noopener noreferrer">här</a>.',
        'download' => 'Den senaste versionen av Azuriom är klar för nedladdning.',
        'install' => 'Den senaste versionen av Azuriom har laddats ner och är redo att installeras.',

        'backup' => 'Innan du uppdaterar Azuriom, bör du göra en säkerhetskopia av din webbplats!',

        'latest_version' => 'Du kör den senaste versionen av Azuriom: <code>:version</code>.',
        'latest' => 'Du använder den senaste versionen av Azuriom.',

        'downloaded' => 'Den senaste versionen har laddats ner, du kan nu installera den.',
        'installed' => 'Uppdateringen har installerats.',
    ],

    'logs' => [
        'title' => 'Loggar',

        'clear' => 'Rensa gamla loggar (15d+)',
        'cleared' => 'De gamla loggarna har tagits bort.',
        'changes' => 'Ändringar',
        'old' => 'Gammalt värde',
        'new' => 'Nytt värde',

        'pages' => [
            'created' => 'Skapad sida #:id',
            'updated' => 'Skapad sida #:id',
            'deleted' => 'Skapad sida #:id',
        ],

        'posts' => [
            'created' => 'Skapade inlägg #:id',
            'updated' => 'Uppdaterad inlägg #:id',
            'deleted' => 'Tog bort inlägg #:id',
        ],

        'images' => [
            'created' => 'Skapad bild #:id',
            'updated' => 'Uppdaterad bild #:id',
            'deleted' => 'Raderad bild #:id',
        ],

        'redirects' => [
            'created' => 'Skapad omdirigering #:id',
            'updated' => 'Uppdaterad omdirigering #:id',
            'deleted' => 'Raderad omdirigering #:id',
        ],

        'roles' => [
            'created' => 'Skapad roll #:id',
            'updated' => 'Uppdaterad roll #:id',
            'deleted' => 'Skapad roll #:id',
        ],

        'servers' => [
            'created' => 'Skapad server #:id',
            'updated' => 'Uppdaterad server #:id',
            'deleted' => 'Tog bort server #:id',
        ],

        'users' => [
            'updated' => 'Uppdaterad användare #:id',
            'deleted' => 'Raderad användare #:id',
            'transfer' => 'Skicka pengar :money till användare #:id',

            'login' => 'Lyckad inloggning från :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Aktivera tvåfaktorsautentisering',
                'disabled' => 'Inaktivera tvåfaktorsautentisering',
            ],
        ],

        'settings' => [
            'updated' => 'Uppdatera inställningar',
        ],

        'updates' => [
            'installed' => 'Installerad Azuriom-uppdatering',
        ],

        'plugins' => [
            'enabled' => 'Aktivera som plugin',
            'disabled' => 'Aktivera som plugin',
        ],

        'themes' => [
            'changed' => 'Ändra tema',
            'configured' => 'Uppdaterad temakonfiguration',
        ],
    ],

    'errors' => [
        'back' => 'Tillbaka till instrumentpanelen',
        '404' => 'Sidan hittades inte',
        'info' => 'Det ser ut som du hittade ett buller i matrisen...',
        '2fa' => 'Du måste aktivera tvåfaktorsauth för att komma åt denna sida.',
    ],
];
