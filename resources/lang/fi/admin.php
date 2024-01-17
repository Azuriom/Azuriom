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
        'dashboard' => 'Hallintapaneeli',
        'settings' => [
            'heading' => 'Asetukset',
            'settings' => 'Asetukset',
            'global' => 'Globaali',
            'security' => 'Turvallisuus',
            'performances' => 'Suorituskyky',
            'seo' => 'SEO',
            'auth' => 'Kirjautuminen',
            'mail' => 'Sähköposti',
            'maintenance' => 'Huoltokatko',
            'social' => 'Sosiaaliset linkit',
            'navbar' => 'Sivuston navigointipalkki',
            'servers' => 'Palvelimet',
        ],

        'users' => [
            'heading' => 'Käyttäjät',
            'users' => 'Käyttäjät',
            'roles' => 'Roolit',
            'bans' => 'Bannit',
        ],

        'content' => [
            'heading' => 'Sisältö',
            'pages' => 'Sivustot',
            'posts' => 'Julkaisut',
            'images' => 'Kuvat',
            'redirects' => 'Uudelleen ohjaukset',
        ],

        'extensions' => [
            'heading' => 'Laajennukset',
            'plugins' => 'Laajennukset',
            'themes' => 'Teemat',
        ],

        'other' => [
            'heading' => 'Muu',
            'update' => 'Päivitykset',
            'logs' => 'Logit',
        ],

        'profile' => [
            'profile' => 'Profiili',
        ],

        'back' => 'Siirry takaisin kotisivustolle',
        'support' => 'Tuki',
        'documentation' => 'Käyttöohjeet',
    ],

    'delete' => [
        'title' => 'Poista?',
        'description' => 'Oletko varma, että haluat poistaa tämän? Et voi palata takaisin!',
    ],

    'footer' => 'Tehty käyttäen :azuriom &copy; :year. Sivuston on suunnitellut :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Hallintapaneeli',

        'users' => 'Käyttäjät',
        'posts' => 'Julkaisut',
        'pages' => 'Sivustot',
        'images' => 'Kuvat',

        'update' => 'Azuriomin uusi versio on saatavilla: :version',
        'http' => 'Sivusto ei käytä https, sinun tulisi ottaa se käyttöön omasi ja muiden tietojen salaamiseksi.',
        'cloudflare' => 'Jos käytät Cloudflare-ohjelmaa, sinun tulisi asentaa Cloudflare Support lisäosa.',
        'recent_users' => 'Viimeaikaiset käyttäjät',
        'active_users' => 'Aktiiviset käyttäjät',
        'emails' => 'Sähköpostit on poistettu käytöstä. Jos käyttäjä unohtaa salasanansa, hän ei voi nollata sitä. Voit ottaa sähköpostit käyttöön <a href=":url">postiasetuksissa</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Yleiset asetukset',

            'name' => 'Sivuston nimi',
            'url' => 'Sivuston URL-osoite',
            'description' => 'Sivuston Kuvaus',
            'meta' => 'Metahakusanat',
            'meta_info' => 'Avainsanat on erotettava pilkulla.',
            'favicon' => 'Favicon',
            'background' => 'Taustakuva',
            'logo' => 'Logo',
            'timezone' => 'Aikavyöhyke',
            'locale' => 'Alueasetus',
            'money' => 'Sivuston valuutan nimi',
            'copyright' => 'Tekijänoikeus',
            'user_money_transfer' => 'Salli rahansiirto käyttäjien välillä',
            'site_key' => 'Sivuston avain azuriom.com',
            'site_key_info' => 'Azuriom.com sivuston avain on tarpeen asentaaksesi premium laajennuksia kauppapaikasta. Saat sivuston avaimen <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom profiili</a>.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => 'Turvallisuusasetukset',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Sivuston avain',
                'secret_key' => 'Salainen avain',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'SaathCaptcha avaimet <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha verkkosivuilta</a>.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Hash algoritmi',
            'hash_error' => 'Nykyinen PHP-versiosi ei tue tätä hash-algoritmia.',
            'force_2fa' => 'Vaadi 2FA järjestelmänvalvojan paneelin käyttöoikeudelle',
        ],

        'performances' => [
            'title' => 'Suorituskyvyn asetukset',

            'cache' => [
                'title' => 'Tyhjennä välimuisti',
                'clear' => 'Tyhjennä välimuisti',
                'description' => 'Tyhjennä verkkosivun välimuisti.',
                'error' => 'Virhe välimuistin tyhjentämisessä.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost parantaa sivuston suorituskykyä lisäämällä yhden eksklusiivisen välimuistin kerroksen.',
                'info' => 'Jos sinulla on ongelmia laajennuksen käyttöönoton jälkeen, sinun pitäisi ladata välimuisti uudelleen.',

                'enable' => 'Ota AzBoost Käyttöön',
                'disable' => 'Poista AzBoost Käytöstä',
                'reload' => 'Lataa AzBoost Uudelleen',

                'status' => 'AzBoost on tällä hetkellä :status.',
                'enabled' => 'käytössä',
                'disabled' => 'pois käytöstä',

                'error' => 'Virhe AzBoostin käyttöönotossa.',
            ],
        ],

        'seo' => [
            'title' => 'SEO asetukset',

            'html' => 'Voit sisällyttää HTML:n <code>&lt;head&gt;</code> tai <code>&lt;body&gt;</code> kaikista sivuista (e.. evästää bannerin tai sivuston analytiikan) luomalla tiedoston nimeltä <code>pää. lade.php</code> tai <code>body.blade.php</code> in <code>resources/views/custom/</code> kansio.',
            'home_message' => 'Koti viesti',

            'welcome_alert' => [
                'enable' => 'Ota käyttöön tervetuloponnahdusikkuna?',
                'message' => 'Tervetuloa Ponnahdusikkunan Viesti',
                'info' => 'Tämä ponnahdusikkuna näytetään kun käyttäjä vierailee sivustolla ensimmäisen kerran.',
            ],
        ],

        'auth' => [
            'title' => 'Tunnistautuminen',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Ota käyttöön rekisteröityminen',
            'registration_info' => 'Voi silti olla mahdollista rekisteröityä lisä-osien kautta.',
            'api' => 'Ota käyttöön Auth API',
            'api_info' => 'Tämä API sallii sinun lisätä mukautetun todennuksen pelipalvelimellesi. Minecraft-palvelimet, jotka käyttävät käynnistintä, voit käyttää <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuthia</a> helppoon ja nopeaan integrointiin.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => 'Salli käyttäjien poistaa tili heidän profiilistaan',
        ],

        'mail' => [
            'title' => 'Sähköpostin asetukset',
            'from' => 'Sähköpostiosoite, josta sähköposti lähetetään.',
            'mailer' => 'Sähköpostin tyyppi',
            'mailer_info' => 'Azuriom tukee SMTP:tä ja Sendmailia sähköpostien lähettämiseen. Löydät lisätietoja sähköpostiasetuksista <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentaatiosta</a>.',
            'disabled' => 'Kun sähköpostit on poistettu käytöstä, käyttäjät eivät voi nollata salasanaa, jos he unohtavat sen.',
            'sendmail' => 'Sendmailin käyttäminen ei ole suositeltavaa, vaan sinun tulisi käyttää SMTP-palvelinta mahdollisuuksien mukaan.',
            'smtp' => [
                'host' => 'SMTP Isäntäosoite',
                'port' => 'SMTP Isäntäportti',
                'encryption' => 'Salausprotokolla',
                'username' => 'SMTP Palvelimen Käyttäjätunnus',
                'password' => 'SMTP Palvelimen Salasana',
            ],
            'verification' => 'Ota käyttöön käyttäjän sähköpostiosoitteen vahvistus',
            'send' => 'Lähetä testiviesti',
            'sent' => 'Testiviesti on lähetetty onnistuneesti.',
            'missing' => 'Tiliisi ei ole määritetty sähköpostiosoitetta.',
        ],

        'maintenance' => [
            'title' => 'Huollon asetukset',

            'enable' => 'Huoltotila',
            'message' => 'Huoltotilan viesti',
            'global' => 'Ota huolto käyttöön kaikilla sivuilla',
            'paths' => 'Huollon aikana estettävät polut',
            'info' => 'Voit käyttää <code>/*</code> estääksesi kaikki sivut, jotka alkavat samalta polulta. Esimerkiksi, <code>/news/*</code> estää pääsyn kaikkiin uutisiin.',
        ],

        'updated' => 'Asetukset on päivitetty.',
    ],

    'navbar_elements' => [
        'title' => 'Sivuston navigointipalkki',
        'edit' => 'Muokkaa navigointipalkin elementtiä :element',
        'create' => 'Luo navigointipalkin elementti',

        'restrict' => 'Rajoita rooleja, jotka voivat nähdä tämän elementin',
        'dropdown' => 'Voit lisätä elementtejä tähän pudotusvalikkoon, kun tämä elementti on tallennettu.',

        'fields' => [
            'home' => 'Koti',
            'link' => 'Ulkoinen linkki',
            'page' => 'Sivu',
            'post' => 'Julkaisut',
            'posts' => 'Julkaisulista',
            'plugin' => 'Lisäosa',
            'dropdown' => 'Pudotusvalikko',
            'new_tab' => 'Avaa uudessa välilehdessä',
        ],

        'updated' => 'Navigointipalkki päivitetty.',
        'not_empty' => 'Et voi poistaa pudotusvalikkoa elementeillä.',
    ],

    'social_links' => [
        'title' => 'Sosiaaliset linkit',
        'edit' => 'Muokkaa sosiaalista linkkiä :link',
        'create' => 'Lisää sosiaalinen linkki',
    ],

    'servers' => [
        'title' => 'Palvelimet',
        'edit' => 'Muokkaa palvelinta :server',
        'create' => 'Lisää palvelin',

        'default' => 'Aseta oletuspalvelin',
        'default_info' => 'Oletuspalvelimeksi valitun palvelimen pelaajamäärä näytetään sivustolla, jos nykyinen teema tukee sitä.',

        'home_display' => 'Näytä tämä palvelin kotisivulla',
        'url' => 'Liity painikkeen URL',
        'url_info' => 'Jätä tyhjäksi näyttääksesi palvelimen osoitteen. Voi olla linkki ladataksesi pelin tai käynnistimen tai URL-osoitteen liittyäksesi palvelimeen kuten <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Ping linkki ei tarvitse lisäosaa, mutta et voi suorittaa komentoja sen kanssa.',
        'query_info' => 'Kyselylinkin avulla ei ole mahdollista suorittaa komentoja palvelimella.',

        'query_port_info' => 'Voi olla tyhjä, jos se on sama kuin pelin portti.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Rcon Salasana',
        'rcon_port' => 'Rcon portti',
        'query_port' => 'Lähdekyselyn portti',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLink portti',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Lataa AzLink</a> plugin ja asenna se palvelimelle.',
            'link2' => 'Käynnistä palvelin uudelleen.',
            'link3' => 'Suorita tämä komento palvelimella: ',

            'info' => 'Jos sinulla on ongelmia maksujen kanssa Cloudflarea tai palomuuria käytettäessä, yritä seurata <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a> -ohjeita.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => 'Jos käytät toista AzLink-porttia kuin oletusta, sinun täytyy määrittää se komennolla: ',
            'ping' => 'Ota pikakomennot käyttöön (vaatii avoimen portin palvelimella)',
            'ping_info' => 'Kun pikakomennot eivät ole käytössä, komennot suoritetaan 30 sekunnin - 1 minuutin viiveellä.',
            'custom_port' => 'Käytä mukautettua AzLink porttia',

            'error' => 'Yhteys palvelimeen on epäonnistunut, osoite ja/tai portti on virheellinen tai portti on suljettu.',
            'badresponse' => 'Yhteys palvelimeen on epäonnistunut (koodi :code), tunnus on virheellinen tai palvelin on määritetty väärin. Voit tehdä linkkikomennon uudelleen korjataksesi tämän.',
        ],

        'players' => ':count pelaaja|:count pelaajat',
        'offline' => 'Offline-tilassa',

        'connected' => 'Yhteys palvelimeen on tehty onnistuneesti!',
        'error' => 'Yhteys palvelimeen epäonnistui: :error',

        'type' => [
            'mc-ping' => 'Minecraft ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Lähdekysely',
            'source-rcon' => 'Lähde RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM tila',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff- Palvelin', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Käyttäjät',
        'edit' => 'Muokkaa käyttäjää :user',
        'create' => 'Luo käyttäjä',

        'registered' => 'Rekisteröitynyt',
        'last_login' => 'Viimeisin kirjautuminen',
        'ip' => 'IP-osoite',

        'admin' => 'Admin',
        'banned' => 'Käyttäjälle on asetettu porttikielto',
        'deleted' => 'Poistettu',

        'ban' => 'Anna porttikielto',
        'unban' => 'Poista porttikielto',
        'delete' => 'Poista',

        'alert-deleted' => 'Tämä käyttäjä on poistettu, sitä ei voi muokata.',
        'alert-banned' => [
            'title' => 'Käyttäjällä on parhaillaan porttikielto:',
            'banned-by' => 'Porttikiellon antaja: :author',
            'reason' => 'Syy: :reason',
            'date' => 'Päivämäärä: :date',
        ],

        'edit_profile' => 'Muokkaa profiilia',

        'info' => 'Käyttäjän tiedot',

        'ban-title' => 'Anna porttikielto käyttäjälle :user',
        'ban-description' => 'Oletko varma, että haluat asettaa porttikiellon tälle käyttäjälle?',

        'email' => [
            'verify' => 'Vahvista sähköpostiosoite',
            'verified' => 'Sähköpostiosoite vahvistettu',
            'date' => 'Kyllä, :date',
            'verify_success' => 'Sähköpostiosoite on vahvistettu.',
        ],

        '2fa' => [
            'title' => 'Kaksivaiheinen tunnistautuminen',
            'secured' => '2FA enabled',
            'disable' => 'Poista 2FA käytöstä',
            'disabled' => 'Kaksivaiheinen tunnistautuminen on otettu pois käytöstä.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'Tälle käyttäjälle on nyt asetettu porttikielto.',
            'unbanned' => 'Tämän käyttäjän porttikielto on poistettu.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Lähetä ilmoitus',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Roolit',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Luo rooli',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Oletus',
        'admin' => 'Admin',
        'admin_info' => 'Kun rooli on Admin, sillä on kaikki oikeudet.',

        'updated' => 'Roolit on päivitetty.',
        'unauthorized' => 'Tämä rooli on korkeampi kuin oma roolisi.',
        'add_admin' => 'Et voi lisätä pääkäyttäjän oikeuksia rooliin.',
        'remove_admin' => 'Et voi poistaa roolisi pääkäyttäjän asetusta.',
        'delete_default' => 'Tätä roolia ei voi poistaa.',
        'delete_own' => 'Et voi poistaa rooliasi.',

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
        'create-comments' => 'Kommentoi julkaisua',
        'delete-other-comments' => 'Poista julkaisun kommentti toiselta käyttäjältä',
        'maintenance-access' => 'Pääsy sivustoon huoltokatkon aikana',
        'admin-access' => 'Pääsy Admin hallintapaneeliin',
        'admin-logs' => 'Tarkastele ja hallitse sivuston logeja',
        'admin-images' => 'Tarkastele ja hallitse kuvia',
        'admin-navbar' => 'Tarkastele ja hallitse navigointipalkkia',
        'admin-pages' => 'Tarkastele ja hallitse sivuja',
        'admin-redirects' => 'Tarkastele ja hallitse uudelleenohjauksia',
        'admin-posts' => 'Näytä ja hallitse julkaisuja',
        'admin-settings' => 'Tarkastele ja hallitse asetuksia',
        'admin-users' => 'Tarkastele ja hallitse käyttäjiä',
        'admin-themes' => 'Tarkastele ja hallitse teemoja',
        'admin-plugins' => 'Tarkastele ja hallitse lisäosia',
    ],

    'bans' => [
        'title' => 'Porttikiellot',

        'by' => 'Porttikiellon antaja',
        'reason' => 'Syy',
        'removed' => 'Poistettu :user toimesta :date',
    ],

    'posts' => [
        'title' => 'Julkaisut',
        'edit' => 'Muokkaa julkaisua :post',
        'create' => 'Luo julkaisu',

        'published_info' => 'Tämä julkaisu näkyy julkisesti vasta tämän päivämäärän jälkeen.',
        'pin' => 'Kiinnitä tämä julkaisu',
        'pinned' => 'Kiinnitetty',
        'feed' => 'RSS/Atom -syöte viestejä varten on saatavilla <code>:rss</code> ja <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Sivut',
        'edit' => 'Muokkaa sivua #:page',
        'create' => 'Luo sivu',

        'enable' => 'Ota sivu käyttöön',
        'restrict' => 'Rajoita rooleja, jotka voivat käyttää tätä sivua',
    ],

    'redirects' => [
        'title' => 'Uudelleen ohjaukset',
        'edit' => 'Muokataan uudelleenohjausta :redirect',
        'create' => 'Luodaan uudelleenohjausta',

        'enable' => 'Ota uudelleenohjaus käyttöön',
        'source' => 'Lähde',
        'destination' => 'Kohde',
        'code' => 'Tilan koodi',

        '301' => '301 - Pysyvä uudelleenohjaus',
        '302' => '302 - Väliaikainen uudelleenohjaus',
    ],

    'images' => [
        'title' => 'Kuvat',
        'edit' => 'Muokkaa kuvaa :image',
        'create' => 'Lataa kuva',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Osta hintaan :price',
    ],

    'plugins' => [
        'title' => 'Lisäosat',

        'list' => 'Asennetut lisäosat',
        'available' => 'Saatavilla olevat lisäosat',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => 'Tämä lisäosa ei ole yhteensopiva Azuriomin version kanssa.',
            'game' => 'Tämä lisäosa ei ole yhteensopiva pelin :game kanssa.',
            'plugin' => 'Lisäosa ":plugin" puuttuu tai sen versio ei ole yhteensopiva tämän lisäosan kanssa.',
        ],

        'reloaded' => 'Lisäosat on ladattu uudelleen.',
        'enabled' => 'Lisäosa on otettu käyttöön.',
        'disabled' => 'Lisäosa on poistettu käytöstä.',
        'updated' => 'Lisäosa on päivitetty.',
        'installed' => 'Lisäosa on asennettu.',
        'deleted' => 'Lisäosa on poistettu.',
        'delete_enabled' => 'Lisäosa on otettava pois käytöstä, ennen kuin sen voi poistaa.',
    ],

    'themes' => [
        'title' => 'Teemat',

        'current' => 'Nykyinen teema',
        'author' => 'Tekijä: :author',
        'version' => 'Versio: :version',
        'list' => 'Asennetut teemat',
        'available' => 'Käytettävissä olevat teemat',
        'no-enabled' => 'Sinulla ei ole mitään teemoja käytössä.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => 'Muokkaa konfigurointia',
        'disable' => 'Poista teema käytöstä',

        'reloaded' => 'Teemat on ladattu uudelleen.',
        'no_config' => 'Tällä teemalla ei ole konfiguraatiota.',
        'config_updated' => 'Teeman konfigurointi on päivitetty.',
        'invalid' => 'Tämä teema on virheellinen (teeman kansion nimen on oltava teema id).',
        'updated' => 'Teema on päivitetty.',
        'installed' => 'Teema on asennettu.',
        'deleted' => 'Teema on poistettu.',
        'delete_current' => 'Et voi poistaa nykyistä teemaa.',
    ],

    'update' => [
        'title' => 'Päivitä',

        'has_update' => 'Päivitys saatavilla',
        'no_update' => 'Ei päivityksiä saatavilla',
        'check' => 'Tarkista päivitykset',

        'update' => 'Azuriomin versio <code>:last version</code> on saatavilla ja olet versiossa <code>:version</code>.',
        'changelog' => 'Muutosloki on saatavilla <a href=":url" target="_blank" rel="noopener noreferrer">täällä</a>.',
        'download' => 'Azuriomin uusin versio on valmis ladattavaksi.',
        'install' => 'Azuriomin uusin versio on ladattu ja se on valmis asennettavaksi.',

        'backup' => 'Ennen Azuriomin päivittämistä, sinun tulisi tehdä varmuuskopio sivustostasi!',

        'latest_version' => 'Käytössäsi on Azuriomin uusin versio: <code>:version</code>.',
        'latest' => 'Käytössäsi on Azuriomin uusin versio.',

        'downloaded' => 'Viimeisin versio on ladattu, voit nyt asentaa sen.',
        'installed' => 'Päivitys on asennettu onnistuneesti.',
    ],

    'logs' => [
        'title' => 'Logit',

        'clear' => 'Tyhjennä vanhat logit (15 päivää+)',
        'cleared' => 'Vanhat logit on poistettu.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => 'Luotu sivu #:id',
            'updated' => 'Päivitetty sivu #:id',
            'deleted' => 'Poistettu sivu #:id',
        ],

        'posts' => [
            'created' => 'Luotu julkaisu #:id',
            'updated' => 'Päivitetty julkaisu #:id',
            'deleted' => 'Poistettu julkaisu #:id',
        ],

        'images' => [
            'created' => 'Luotu kuva #:id',
            'updated' => 'Päivitetty kuva #:id',
            'deleted' => 'Poistettu kuva #:id',
        ],

        'redirects' => [
            'created' => 'Luotu uudelleenohjaus #:id',
            'updated' => 'Päivitetty uudelleenohjaus #:id',
            'deleted' => 'Poistettu uudelleenohjaus #:id',
        ],

        'roles' => [
            'created' => 'Luotu rooli #:id',
            'updated' => 'Päivitetty rooli #:id',
            'deleted' => 'Poistettu rooli #:id',
        ],

        'servers' => [
            'created' => 'Luotu palvelin #:id',
            'updated' => 'Päivitetty palvelin #:id',
            'deleted' => 'Poistettu palvelin #:id',
        ],

        'users' => [
            'updated' => 'Päivitetty käyttäjä #:id',
            'deleted' => 'Poistettu käyttäjä #:id',
            'transfer' => 'Lähetä rahaa :money käyttäjälle #:id',

            'login' => 'Onnistunut kirjautuminen :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Otettu käyttöön kaksivaiheinen tunnistautuminen',
                'disabled' => 'Poistettu käytöstä kaksivaiheinen tunnistautuminen',
            ],
        ],

        'settings' => [
            'updated' => 'Asetukset päivitetty',
        ],

        'updates' => [
            'installed' => 'Azuriom päivitys asennettu',
        ],

        'plugins' => [
            'enabled' => 'Lisäosa otettu käyttöön',
            'disabled' => 'Lisäosa poistettu käytöstä',
        ],

        'themes' => [
            'changed' => 'Muutettu teema',
            'configured' => 'Teeman asetukset päivitetty',
        ],
    ],

    'errors' => [
        'back' => 'Takaisin hallintapaneeliin',
        '404' => 'Sivua ei löytynyt',
        'info' => 'Näyttää siltä, että olet löytänyt virheen matrixista...',
        '2fa' => 'Sinun täytyy ottaa käyttöön kaksivaiheinen tunnistautuminen päästäksesi tälle sivulle.',
    ],
];
