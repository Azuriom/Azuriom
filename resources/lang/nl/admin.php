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
        'dashboard' => 'Dashboard',
        'settings' => [
            'heading' => 'Instellingen',
            'settings' => [
                'settings' => 'Instellingen',
                'global' => 'Globaal',
                'security' => 'Veiligheid',
                'performances' => 'Prestatie',
                'seo' => 'SEO',
                'auth' => 'Authenticatie',
                'mail' => 'Mail',
                'maintenance' => 'Onderhoud',
            ],
            'navbar' => 'Navigatiebalk',
            'servers' => 'Servers',
        ],

        'users' => [
            'heading' => 'Gebruikers',
            'users' => 'Gebruikers',
            'roles' => 'Rollen',
            'bans' => 'verbannen',
        ],

        'content' => [
            'heading' => 'Inhoud',
            'pages' => 'Pagina\'s',
            'posts' => 'Berichten',
            'images' => 'Afbeeldingen',
        ],

        'extensions' => [
            'heading' => 'Extensies',
            'plugins' => 'plugins',
            'themes' => 'Thema\'s',
        ],

        'other' => [
            'heading' => 'Andere',
            'update' => 'Bijwerken',
            'logs' => 'Logboek',
        ],

        'profile' => [
            'profile' => 'Profiel',
        ],

        'back-website' => 'Ga terug naar de website',

        'support' => 'Ondersteuning',
        'documentation' => 'Documentatie',
    ],

    'confirm-delete' => [
        'title' => 'Verwijderen?',
        'description' => 'Weet u zeker dat u dit wilt verwijderen? U kunt niet meer terug!',
    ],

    'footer' => 'Mogelijk gemaakt door :azuriom &copy; :year. Paneel ontworpen door :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Dashboard',

        'new-update' => 'Er is een nieuwe versie van Azuriom beschikbaar: :version',
        'https-warning' => 'Uw website maakt geen gebruik van https, u moet dit inschakelen en forceren voor uw veiligheid en die van de gebruikers.',
        'proxy-warning' => 'Als u Cloudflare gebruikt, moet u de plugin Cloudflare Support installeren.',
        'recent-users' => 'Recente gebruikers',
        'active-users' => 'Actieve gebruikers',
        'emails-disabled' => 'E-mails zijn uitgeschakeld. Als een gebruiker zijn wachtwoord vergeet, kan hij het niet resetten. U kunt e-mails inschakelen in de <a href=":url">e-mailinstellingen</a>.',
        'users' => 'Gebruikers',
        'posts' => 'Berichten',
        'pages' => 'Pagina\'s',
        'images' => 'Afbeeldingen',
    ],

    'settings' => [
        'index' => [
            'title' => 'Algemene instellingen',

            'site-name' => 'Website naam',
            'site-url' => 'Website URL',
            'site-description' => 'Website Beschrijving',
            'meta' => 'Meta-trefwoorden',
            'meta-info' => 'De trefwoorden moeten worden gescheiden door een komma.',
            'favicon' => 'Favicon',
            'background' => 'Achtergrond',
            'logo' => 'Logo',
            'timezone' => 'Tijdzone',
            'locale' => 'Locale',
            'money' => 'Naam van de websitevaluta',
            'copyright' => 'Auteursrechten',
            'user-money-transfer' => 'Schakel geldoverboekingen tussen gebruikers in',
            'site-key' => 'Site sleutel voor azuriom.com',
            'site-key-label' => 'De Site-sleutel azuriom.com is vereist om premium extensies te installeren die op de markt zijn gekocht. U kunt uw site-sleutel verkrijgen in uw <a href="https://azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom-profiel</a>.',
        ],

        'security' => [
            'title' => 'Veiligheidsinstellingen',

            'captcha' => [
                'title' => 'Captcha',
                'site-key' => 'Site sleutel',
                'secret-key' => 'Geheime sleutel',
                'recaptcha' => 'U kunt reCaptcha-sleutels verkrijgen op de <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCaptcha-website</a>. U moet reCaptcha <strong>v2 onzichtbare</strong> -sleutel gebruiken.',
                'hcaptcha' => 'U kunt hCaptcha-sleutels verkrijgen op de <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">hCaptcha-website</a>.',
            ],

            'hash' => 'Hash-algoritme',
            'hash-info' => 'Argon2id is het veiligste algoritme, maar het vereist PHP 7.3 of hoger. Als u PHP 7.2 gebruikt, moet u Argon2i gebruiken.',
            'hash-error' => 'Dit hash-algoritme wordt niet ondersteund door uw huidige PHP-versie.',
        ],

        'performances' => [
            'title' => 'Prestatie-instellingen',

            'cache' => [
                'title' => 'Cache wissen',
                'description' => 'Wis de cache van de website.',

                'status' => [
                    'cleared' => 'Cache gewist met succes.',
                    'clear-error' => 'Fout bij het wissen van cache.',
                ],

                'actions' => [
                    'clear' => 'Cache wissen',
                ],
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost verbetert de prestaties van uw website door nog een exclusieve cachelaag toe te voegen.',
                'info' => 'Als u problemen ondervindt nadat u een extensie heeft ingeschakeld, moet u de cache opnieuw laden.',

                'current' => [
                    'status' => 'AzBoost is momenteel :status.',
                    'enabled' => '<span class="text-success">ingeschakeld</span>',
                    'disabled' => '<span class="text-danger">Uitgeschakeld</span>',
                ],

                'status' => [
                    'enabled' => 'AzBoost is nu ingeschakeld.',
                    'disabled' => 'AzBoost is nu uitgeschakeld.',
                    'reloaded' => 'AzBoost is opnieuw geladen.',

                    'enable-error' => 'Fout bij het inschakelen van AzBoost.',
                ],

                'actions' => [
                    'enable' => 'Schakel AzBoost in',
                    'disable' => 'Schakel AzBoost uit',
                    'reload' => 'Herlaad AzBoost',
                ],
            ],
        ],

        'seo' => [
            'title' => 'SEO instellingen',

            'html-head-code' => 'HTML-code om op te nemen in de <head> van alle pagina\'s.',
            'html-body-code' => 'HTML-code om op te nemen in de <body> van alle pagina\'s.',

            'html-code-info' => 'Bijv: Cookie-banner, Google Analytics, enz',

            'welcome-popup' => [
                'enable' => 'Welkomstpop-up inschakelen?',
                'message' => 'Welkomstpop-upbericht',
                'info' => 'Deze pop-up wordt weergegeven wanneer een gebruiker de site voor het eerst bezoekt.',
            ],
        ],

        'auth' => [
            'title' => 'Authenticatie',

            'conditions-url' => 'Voorwaarden URL',
            'conditions-info' => 'Gebruikers zullen deze voorwaarden moeten accepteren bij het registreren.',
            'enable-user-registration' => 'Schakel gebruikersregistratie in',
            'enable-user-registration-label' => 'Het kan nog steeds mogelijk zijn om via plugins te registreren.',
            'auth-api' => 'Schakel Auth API in',
            'auth-api-label' => 'Met deze API kun je een aangepaste authenticatie toevoegen aan je gameserver. Voor Minecraft-servers die een launcher gebruiken, kunt u <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> gebruiken voor een gemakkelijke en snelle integratie.',
            'minecraft-verification' => 'Schakel Minecraft-gebruikersnaamverificatie in met minecraft.net',
        ],

        'mail' => [
            'title' => 'Email instellingen',
            'from-address' => 'E-mailadres dat wordt gebruikt om e-mails te verzenden.',
            'driver' => 'E-mailtype',
            'driver-info' => 'Azuriom ondersteunt SMTP en Sendmail voor het verzenden van e-mails. U kunt meer informatie over de e-mailconfiguratie vinden in onze <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentatie</a>.',
            'disabled-warn' => 'Als e-mails zijn uitgeschakeld, kunnen gebruikers hun wachtwoord niet opnieuw instellen als ze het vergeten.',
            'sendmail-warn' => 'Het gebruik van Sendmail wordt niet aanbevolen en u dient in plaats daarvan indien mogelijk een SMTP-server te gebruiken.',
            'smtp' => [
                'host' => 'SMTP-hostadres',
                'port' => 'SMTP-hostpoort',
                'encryption' => 'Versleutelingsprotocol',
                'username' => 'SMTP-server gebruikersnaam',
                'password' => 'SMTP-server wachtwoord',
            ],
            'enable-users-verification' => 'Schakel verificatie van e-mailadres van gebruiker in',
            'send' => 'Stuur een testmail',
            'sent' => 'De testmail is succesvol verzonden.',
        ],

        'maintenance' => [
            'title' => 'Onderhoudsinstellingen',

            'enable' => 'Onderhoud inschakelen',
            'message' => 'Onderhoudsmelding',
        ],

        'status' => [
            'updated' => 'De instellingen zijn bijgewerkt.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navigatiebalk',
        'title-edit' => 'Bewerk navigatiebalkelement :element',
        'title-create' => 'Maak een navigatiebalkelement',

        'dropdown-info' => 'U kunt elementen aan deze vervolgkeuzelijst toevoegen wanneer dit element is opgeslagen.',

        'fields' => [
            'home' => 'Home',
            'link' => 'Externe link',
            'page' => 'Pagina',
            'post' => 'Berichten',
            'posts' => 'Lijst met berichten',
            'plugin' => 'Plugin',
            'dropdown' => 'vervolgkeuzelijst',
            'new-tab' => 'Openen in nieuw tabblad',
        ],

        'status' => [
            'nav-updated' => 'Navigatiebalk bijgewerkt.',

            'created' => 'Het navigatiebalkelement is gemaakt.',
            'updated' => 'Dit navigatiebalkelement is bijgewerkt.',
            'deleted' => 'Dit navigatiebalkelement is verwijderd.',

            'not-empty' => 'U kunt de vervolgkeuzelijst met elementen niet verwijderen.',
        ],
    ],

    'servers' => [
        'title' => 'Servers',
        'title-edit' => 'Bewerk server :server',
        'title-create' => 'Server toevoegen',

        'default' => 'Standaard server',
        'default-info' => 'Het aantal spelers dat is verbonden vanaf de standaardserver wordt weergegeven op de site van het huidige thema dat dit ondersteunt.',

        'ping-no-commands' => 'De ping-link heeft geen plugin nodig, maar je kunt het commando met deze link niet uitvoeren.',
        'query-no-commands' => 'Met een query-link is het niet mogelijk om commando\'s op de server uit te voeren.',

        'query-port-info' => 'Kan leeg zijn als deze hetzelfde is als de gamepoort.',

        'fields' => [
            'address' => 'Adres',
            'port' => 'Poort',

            'rcon-password' => 'Rcon wachtwoord',
            'rcon-port' => 'Rcon Poort',
            'query-port' => 'Source Query Port', // not sure about his one (non-translatable)

            'azlink-port' => 'AzLink Poort',
        ],

        'actions' => [
            'verify-connection' => 'Controleer de verbinding',
        ],

        'azlink' => [
            'link' => 'Om Minecraft met AzLink aan uw website te koppelen:',
            'link-1' => '<a href="https://azuriom.com/azlink">Download de plugin AzLink</a> en installeer deze op uw server.',
            'link-2' => 'Start de server opnieuw op.',
            'link-3' => 'Voer deze opdracht uit op de server: ',

            'link-info' => 'U kunt uw Minecraft-server aan uw website koppelen met de opdracht: ',
            'port-info' => 'Als u een andere AzLink-poort gebruikt dan de standaard, moet u deze configureren met de opdracht: ',

            'enable-ping' => 'Schakel directe opdrachten in (vereist een open poort op de server)',
            'ping-info' => 'Als directe opdrachten niet zijn ingeschakeld, worden opdrachten uitgevoerd met een vertraging van 30 seconden tot 1 minuut.',
            'custom-port' => 'Gebruik een aangepaste AzLink-poort',
        ],

        'players' => ':count speler|:count spelers',
        'offline' => 'Offline',

        'status' => [
            'created' => 'De server is toegevoegd.',
            'updated' => 'De server is bijgewerkt.',
            'deleted' => 'De server is verwijderd.',

            'connect-success' => 'De verbinding met de server is succesvol gemaakt!',
            'connect-error' => 'De verbinding met de server is mislukt: :error',

            'not-azlink' => 'Deze server is niet verbonden via AzLink.',
            'azlink-connect' => 'De verbinding met de server is mislukt, het adres en/of de poort zijn onjuist of de poort is gesloten.',
            'azlink-badresponse' => 'De verbinding met de server is mislukt (code :code), het token is ongeldig of de server is verkeerd geconfigureerd. U kunt de linkopdracht opnieuw uitvoeren om dit op te lossen.',
        ],

        'type' => [
            'mc-ping' => 'Minecraft Ping',          // (non-translatable)
            'mc-rcon' => 'Minecraft RCON',          // (non-translatable)
            'mc-azlink' => 'AzLink',                // (non-translatable)
            'source-query' => 'Source Query',       // (non-translatable)
            'source-rcon' => 'Source RCON',         // (non-translatable)
            'rust-rcon' => 'Rust RCON',             // (non-translatable)
            'flyff-server' => 'Flyff Server', // TODO make this dynamic     // (non-translatable)
        ],
    ],

    'users' => [
        'title' => 'Gebruikers',
        'title-edit' => 'Bewerk gebruiker :user',
        'title-create' => 'Maak een gebruiker aan',

        'fields' => [
            'register-date' => 'Geregistreerd op',
            'last-login' => 'Laatste login op',
            'email-verified' => 'Email-adres geverifieërd',
            '2fa' => 'Twee-factorenauthenticatie',
            'ip' => 'IP adres',
        ],

        'info' => [
            'admin' => 'Beheerder',
            'banned' => 'Verbannen',
            'deleted' => 'Verwijderd',
        ],

        'actions' => [
            'ban' => 'Deactiveren',
            'unban' => 'activeren',
            'delete' => 'Verwijderen',
            'verify-email' => 'Verifieer Email',
            'disable-2fa' => 'Schakel 2FA uit',
        ],

        'alert-deleted' => 'Deze gebruiker is verwijderd en kan niet worden bewerkt.',
        'alert-banned' => [
            'title' => 'Deze gebruiker is momenteel gedeactiveerd:',
            'banned-by' => 'Gedeactiveerd door: :author',
            'reason' => 'Reden: :reason',
            'date' => 'Datum: :date',
        ],

        'edit-profile' => 'Bewerk profiel',

        'user-info' => 'Gebruikers informatie',

        'ban-title' => 'Gedeactiveerd :user',
        'ban-description' => 'Weet u zeker dat u deze gebruiker wilt deactiveren?',

        'status' => [
            'created' => 'De gebruiker is aangemaakt.',
            'updated' => 'Deze gebruiker is geüpdatet.',
            'deleted' => 'Deze gebruiker is verwijderd.',

            'email-verified' => 'Het e-mailadres is geverifieerd.',
            '2fa-disabled' => 'De twee-factor-authenticatie is uitgeschakeld.',

            'banned' => 'Deze gebruiker is nu gedeactiveerd.',
            'unbanned' => 'Deze gebruiker is nu geactiveerd.',
        ],
    ],

    'roles' => [
        'title' => 'Rollen',
        'title-edit' => 'Rollen bewerken :role',
        'title-create' => 'Maak een rol',

        'permissions' => 'Rechten',
        'perm-admin' => [
            'label' => 'Beheerder',
            'info' => 'Als de groep beheerder is, heeft deze alle rechten.',
        ],

        'info' => [
            'default' => 'Gebruiker',
            'admin' => 'Beheerder',
        ],

        'status' => [
            'power-updated' => 'De rollen zijn bijgewerkt.',
            'created' => 'De rol is gemaakt.',
            'updated' => 'Deze rol is bijgewerkt.',
            'deleted' => 'Deze rol is verwijderd.',

            'add-admin' => 'U kunt de beheerdersmachtiging niet aan een rol toevoegen.',
            'remove-admin' => 'U kunt de beheerdersmachtiging van uw rol niet verwijderen.',
            'permanent-role' => 'Deze rol kan niet worden verwijderd.',
            'own-role' => 'U kunt uw rol niet verwijderen.',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Reageer op een bericht',
        'delete-other-comments' => 'Verwijder een berichtopmerking van een andere gebruiker',
        'maintenance-access' => 'Toegang tot de website tijdens onderhoud',
        'admin-access' => 'Toegang tot het admin-dashboard',
        'admin-logs' => 'Bekijk en beheer sitelogboek',
        'admin-images' => 'Bekijk en beheer afbeeldingen',
        'admin-navbar' => 'Bekijk en beheer de navigatiebalk',
        'admin-pages' => 'Bekijk en beheer pagina\'s',
        'admin-posts' => 'Bekijk en beheer berichten',
        'admin-settings' => 'Bekijk en beheer instellingen',
        'admin-themes' => 'Bekijk en beheer thema\'s',
        'admin-plugins' => 'Bekijk en beheer plugins',
    ],

    'bans' => [
        'title' => 'Verbannen',

        'fields' => [
            'banned-by' => 'gedeactiveerd door',
            'reason' => 'Reden',
        ],

        'removed' => 'Verwijder de :date door :user',
    ],

    'posts' => [
        'title' => 'Berichten',
        'title-edit' => 'Bewerk bericht :post',
        'title-create' => 'Maak een bericht',

        'published-info' => 'Dit bericht is tot deze datum niet openbaar zichtbaar.',

        'fields' => [
            'published-at' => 'Gepubliceerd op',
        ],

        'pin' => 'Maak dit bericht vast',

        'status' => [
            'created' => 'Het bericht is gemaakt.',
            'updated' => 'Dit bericht is gewijzigd.',
            'deleted' => 'Dit bericht is verwijderd.',
        ],

        'info' => [
            'pinned' => 'Vastgemaakt',
        ],
    ],

    'pages' => [
        'title' => 'Pagina\'s',
        'title-edit' => 'Bewerk pagina #:page',
        'title-create' => 'Creëer pagina',

        'enable' => 'Schakel de pagina in',

        'status' => [
            'created' => 'De pagina is aangemaakt.',
            'updated' => 'Deze pagina is bijgewerkt.',
            'deleted' => 'Deze pagina is verwijderd.',
        ],
    ],

    'images' => [
        'title' => 'Afbeeldingen',
        'title-edit' => 'Bewerk afbeelding :image',
        'title-create' => 'Afbeelding uploaden',

        'status' => [
            'created' => 'De afbeelding is aangemaakt.',
            'updated' => 'Deze afbeelding is bijgewerkt.',
            'deleted' => 'Deze afbeelding is verwijderd.',
        ],
    ],

    'extensions' => [
        'buy' => 'Kopen voor :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Geïnstalleerde plugins',
        'available' => 'Beschikbaare plugins',

        'azuriom-requirement' => 'Deze plugin is niet compatibel met uw Azuriom-versie.',
        'game-requirement' => 'Deze plugin is niet compatibel met het spel :game.',
        'plugin-requirement' => 'De plugin ":plugin" ontbreekt of de versie is niet compatibel met deze plugin.',

        'status' => [
            'reloaded' => 'De plugins zijn opnieuw geladen.',
            'enabled' => 'De plugin is ingeschakeld.',
            'disabled' => 'De plugin is uitgeschakeld.',
            'updated' => 'De plugin is bijgewerkt.',
            'installed' => 'De plugin is geïnstalleerd.',
            'deleted' => 'De plugin is verwijderd.',

            'error-delete' => 'De plugin moet worden uitgeschakeld voordat deze kan worden verwijderd.',
        ],
    ],

    'themes' => [
        'title' => 'Thema\'s',

        'current' => [
            'title' => 'Huidig thema',
            'author' => 'Author: :author',
            'version' => 'Versie: :version',
        ],
        'installed' => 'Geïnstalleerde thema\'s',
        'available' => 'Beschikbare thema\'s',
        'no-enabled' => 'U heeft geen thema ingeschakeld.',

        'actions' => [
            'edit-config' => 'Bewerk config',
            'disable' => 'Schakel thema uit',
        ],

        'status' => [
            'reloaded' => 'De thema\'s zijn opnieuw geladen.',
            'no-config' => 'Dit thema heeft geen configuratie.',
            'config-updated' => 'De thema-configuratie is bijgewerkt.',
            'invalid' => 'Dit thema is ongeldig (de naam van de themamap moet de thema-id zijn).',
            'updated' => 'Het thema is bijgewerkt.',
            'installed' => 'Het thema is geïnstalleerd.',
            'deleted' => 'Het thema is verwijderd.',

            'error-delete' => 'U kunt het huidige thema niet verwijderen.',
        ],
    ],

    'update' => [
        'title' => 'Bijwerken',

        'subtitle-update' => 'Update beschikbaar',
        'subtitle-no-update' => 'Geen updates beschikbaar',

        'update' => 'De versie <code>:last-version</code> van Azuriom is beschikbaar en u gebruikt versie <code>:version</code>',
        'download' => 'De nieuwste versie van Azuriom is klaar om te downloaden.',
        'install' => 'De laatste versie van Azuriom is gedownload en klaar om geïnstalleerd te worden.',

        'backup-info' => 'Voordat u Azuriom bijwerkt, Wordt u verzocht om een back-up van uw site maken!',

        'up-to-date' => 'U gebruikt de nieuwste versie van Azuriom: <code>:version</code>.',

        'status' => [
            'download-success' => 'De laatste versie is gedownload, u kunt deze nu installeren.',
            'install-success' => 'De update is succesvol geïnstalleerd.',

            'up-to-date' => 'U gebruikt de nieuwste versie van Azuriom.',
            'error-fetch' => 'Er is een fout opgetreden bij het ophalen van updates: :error',
            'error-download' => 'Er is een fout opgetreden tijdens het downloaden: :error',
            'error-install' => 'Er is een fout opgetreden tijdens het installeren: :error',
        ],

        'actions' => [
            'check' => 'Check updates',
            'install' => 'Installeren',
            'download' => 'Downloaden',
        ],
    ],

    'logs' => [
        'title' => 'Logboek',

        'actions' => [
            'clear' => 'Wis oude logboek (15d+)',
        ],

        'status' => [
            'cleared' => 'De oude logboek zijn verwijderd.',
        ],

        'pages' => [
            'created' => 'Aangemaakte pagina #:id',
            'updated' => 'Bijgewerkte pagina #:id',
            'deleted' => 'Verwijderde pagina #:id',
        ],

        'posts' => [
            'created' => 'Post gemaakt #:id',
            'updated' => 'Bijgewerkt bericht #:id',
            'deleted' => 'Post verwijderd #:id',
        ],

        'images' => [
            'created' => 'Gemaakt afbeelding #:id',
            'updated' => 'Bijgewerkte afbeelding #:id',
            'deleted' => 'Verwijderde afbeelding #:id',
        ],

        'roles' => [
            'created' => 'Gemaakt rol #:id',
            'updated' => 'Bijgewerkte rol #:id',
            'deleted' => 'Rol verwijderd #:id',
        ],

        'servers' => [
            'created' => 'Server gemaakt #:id',
            'updated' => 'Bijgewerkte server #:id',
            'deleted' => 'Verwijderde server #:id',
        ],

        'users' => [
            'updated' => 'Bijgewerkte gebruiker #:id',
            'deleted' => 'Verwijderde gebruiker #:id',
            'transfer' => 'Geld verzenden :money naar gebruiker #:id',
        ],

        'settings' => [
            'updated' => 'Bijgewerkte instellingen',
        ],

        'updates' => [
            'installed' => 'Azuriom-update geïnstalleerd',
        ],

        'plugins' => [
            'enabled' => 'Ingeschakelde plugin',
            'disabled' => 'Uitgeschakelde plugin',
        ],

        'themes' => [
            'changed' => 'Thema gewijzigd',
        ],
    ],

    'errors' => [
        'back' => 'Terug naar Dashboard',
        '404' => 'Pagina niet gevonden',
        'info' => 'Het lijkt erop dat u een storing in de matrix hebt gevonden...',
    ],
];
