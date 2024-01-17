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
        'dashboard' => 'Tauler',
        'settings' => [
            'heading' => 'Configuració',
            'settings' => 'Configuració',
            'global' => 'Global',
            'security' => 'Seguretat',
            'performances' => 'Rendiment',
            'seo' => 'SEO',
            'auth' => 'Autenticació',
            'mail' => 'Correu electrònic',
            'maintenance' => 'Manteniment',
            'social' => 'Enllaços socials',
            'navbar' => 'Barra de Navegació',
            'servers' => 'Servidors',
        ],

        'users' => [
            'heading' => 'Usuaris',
            'users' => 'Usuaris',
            'roles' => 'Rols',
            'bans' => 'Prohibicions',
        ],

        'content' => [
            'heading' => 'Contingut',
            'pages' => 'Pàgines',
            'posts' => 'Entrades',
            'images' => 'Imatges',
            'redirects' => 'Redirigeix',
        ],

        'extensions' => [
            'heading' => 'Extensions',
            'plugins' => 'Mòduls',
            'themes' => 'Temes',
        ],

        'other' => [
            'heading' => 'Altres',
            'update' => 'Actualitzar',
            'logs' => 'Registres',
        ],

        'profile' => [
            'profile' => 'Perfil',
        ],

        'back' => 'Tornar al lloc web',
        'support' => 'Assistència',
        'documentation' => 'Documentació',
    ],

    'delete' => [
        'title' => 'Eliminar?',
        'description' => 'Estàs segur de que vols votar això? No podràs tornar enrere!',
    ],

    'footer' => 'Fet possible per :azuriom &copy; :year. Panel dissenyat per :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Quadre de Comandaments',

        'users' => 'Usuaris',
        'posts' => 'Entrades',
        'pages' => 'Pàgines',
        'images' => 'Imatges',

        'update' => 'Una nova versió de Azuriom està disponible. :version',
        'http' => 'El teu lloc web no està utilitzant https, hauries d\'activar i forçar-lo per la teva seguretat i la dels teus usuaris.',
        'cloudflare' => 'Si estàs utilitzant Cloudflare, hauries d’instal·lar el mòdul Cloudflare Support.',
        'recent_users' => 'Usuaris recents',
        'active_users' => 'Usuaris actius',
        'emails' => 'Els emails estan desactivats. Si un usuari se\'n oblida de la seva contrasenya, no serà capaç de restablir-la. Pot habilitar els emails en <a href=":url">configuració d\'emails</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Opcions globals',

            'name' => 'Nom del lloc',
            'url' => 'Enllaç del lloc',
            'description' => 'Descripció del lloc web',
            'meta' => 'Paraules clau',
            'meta_info' => 'Les paraules clau han d\'estar separades per coma.',
            'favicon' => 'Favicon',
            'background' => 'Fons',
            'logo' => 'Logo',
            'timezone' => 'Zona horària',
            'locale' => 'Configuració Regional',
            'money' => 'Nom de la moneda del lloc web',
            'copyright' => 'Copyright',
            'user_money_transfer' => 'Habilitar transferència de moneda entre usuaris',
            'site_key' => 'Clau del lloc web per azuriom.com',
            'site_key_info' => 'La clau del lloc web azuriom.com és requerida per instal·lar extensions prèmium. Pots obtenir-la en el teu <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">perfil Azuriom</a>.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => 'Opcions seguretat',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Clau Pública',
                'secret_key' => 'Clau Secreta',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'Pot obtenir claus hCaptcha en <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha</a>.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Algorisme de hash',
            'hash_error' => 'Aquest algorisme hash no està soportat per la vostra versió actual.',
            'force_2fa' => 'Requerir 2FA per l\'accés al panel',
        ],

        'performances' => [
            'title' => 'Configuració de rendiment',

            'cache' => [
                'title' => 'Netejar la cache',
                'clear' => 'Netejar la cache',
                'description' => 'Neteja la cache del lloc web.',
                'error' => 'Error al esborrar cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost millorar el rendiment del vostre lloc web afegint una capa més exlusiva de cache.',
                'info' => 'Si trobeu problemes després d\'activar l\'extensió, heu de refrescar la cache.',

                'enable' => 'Activar AzBoost',
                'disable' => 'Desactivar AzBoost',
                'reload' => 'Recarregar AzBoost',

                'status' => 'AzBoost està actualment :status.',
                'enabled' => 'activat',
                'disabled' => 'desactivat',

                'error' => 'Error habilitar AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Configuració de SEO',

            'html' => 'Pot incloure HTML en <code>&lt;head&gt;</code> o <code>&lt;body&gt;</code> a totes les pàgines (e.g. analytics) creant un fitxer anomenat <code>head.blade.php</code> o <code>body.blade.php</code> en la carpeta <code>resources/views/custom/</code>.',
            'home_message' => 'Missatge inici',

            'welcome_alert' => [
                'enable' => 'Habilitar popup benvinguda?',
                'message' => 'Missatge popup benvinguda',
                'info' => 'Aquest popup es mostrarà quan un usuari visiti la web per primer cop.',
            ],
        ],

        'auth' => [
            'title' => 'Autenticació',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Activa el registre d\'usuaris',
            'registration_info' => 'Serà possible registrar amb plugins.',
            'api' => 'Activar API Auth',
            'api_info' => 'Aquesta API us permet afegir una autenticació personalitzada al vostre servidor de jocs. Per als servidors de Minecraft que utilitzen un llançador, podeu utilitzar <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> per a una integració fàcil i ràpida.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => 'Allow users to delete their account from their profile',
        ],

        'mail' => [
            'title' => 'Configuració del correu',
            'from' => 'Adreça electrònica per enviar emails.',
            'mailer' => 'Tipus correu electrònic',
            'mailer_info' => 'Azuriom admet SMTP i Sendmail per enviar correus electrònics. Pots trobar més informació sobre la configuració del correu a la nostra <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentació</a>.',
            'disabled' => 'Quan els correus electrònics estan desactivats, els usuaris no podran restablir la seva contrasenya si l\'obliden.',
            'sendmail' => 'No es recomana utilitzar Sendmail i, en canvi, hauríeu d\'utilitzar un servidor SMTP quan sigui possible.',
            'smtp' => [
                'host' => 'SMTP Adreça Host',
                'port' => 'SMTP Port Host',
                'encryption' => 'Protocol d\'encriptació',
                'username' => 'SMTP Nom d\'usuari',
                'password' => 'SMTP Contrasenya',
            ],
            'verification' => 'Habilitar verificació de correu electrònic',
            'send' => 'Enviar correu electrònic de prova',
            'sent' => 'El correu electrònic s\'ha enviat correctament.',
            'missing' => 'No email address has been specified on your account.',
        ],

        'maintenance' => [
            'title' => 'Configuració de manteniment',

            'enable' => 'Activa el mode de manteniment',
            'message' => 'Missatge de manteniment',
            'global' => 'Habilitar mode manteniment en tot el lloc web',
            'paths' => 'Enllaços a bloquejar durant manteniment',
            'info' => 'Pots utilitzar <code>/*</code> per bloquejar totes les pàgines que tinguin el mateix camí. Per exemple, <code>/news/*</code> bloquejarà accés a totes les notícies.',
        ],

        'updated' => 'S\'ha actualitzat la configuració.',
    ],

    'navbar_elements' => [
        'title' => 'Barra de Navegació',
        'edit' => 'Editar element navbar :element',
        'create' => 'Crear element navbar',

        'restrict' => 'Limitar rols que poden veure aquest element',
        'dropdown' => 'Pot afegir elements a aquest dropdown quan aquest element s\'ha guardat.',

        'fields' => [
            'home' => 'Inici',
            'link' => 'Enllaç extern',
            'page' => 'Pàgina',
            'post' => 'Entrada',
            'posts' => 'Llista d\'entrades',
            'plugin' => 'Plugin',
            'dropdown' => 'Desplegable',
            'new_tab' => 'Open in new tab',
        ],

        'updated' => 'Navbar actualitzada.',
        'not_empty' => 'No pots esborrar dropdown amb elements.',
    ],

    'social_links' => [
        'title' => 'Enllaços socials',
        'edit' => 'Editar enllaç social :link',
        'create' => 'Afegir enllaç social',
    ],

    'servers' => [
        'title' => 'Servidors',
        'edit' => 'Editar servidor :server',
        'create' => 'Afegir servidor',

        'default' => 'Servidor per defecte',
        'default_info' => 'El nombre de jugadors connectats al servidor predeterminar es mostrarà al lloc web si el tema actual el suporta.',

        'home_display' => 'Mostrar aquest servidor a la pàgina d\'inici',
        'url' => 'URL botó unir',
        'url_info' => 'Deixar buit per mostrar l\'adreça del servidor. Pot ser una URL per baixar el joc/laucnher o per unir-se al servidor com <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'L\'enllaç ping no necessita cap plugin, però no podrà executar comandes.',
        'query_info' => 'Amb l\'enllaç query no és possible executar comandes en el servidor.',

        'query_port_info' => 'Pot estar buit si es el mateix que el port del joc.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Contrasenya Rcon',
        'rcon_port' => 'Port Rcon',
        'query_port' => 'Port Source Query',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'Port AzLink',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Baixa el plugin AzLink</a> i instal·la\'l el teu servidor.',
            'link2' => 'Reiniciar el servidor.',
            'link3' => 'Executar aquesta comanda en el servidor: ',

            'info' => 'If you are having problems with AzLink when using Cloudflare or a firewall, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => 'Si está utilitzat un port AzLink diferent al predeterminat, ha de configurar-lo amb la comanda: ',
            'ping' => 'Habilitar ordres instantanis (requereix un port obert al servidor)',
            'ping_info' => 'Quan les ordres instantànies no estan habilitades, les ordres s\'executaran amb un retard de 30 segons a 1 minut.',
            'custom_port' => 'Utilitzar un port AzLink personalitzat',

            'error' => 'La conexió al servidor ha fallat. L\'adreça i/o port son incorrectes, o el port està tancat.',
            'badresponse' => 'La conexió al servidor ha fallat (codi :code), el token es invalid o el servidor està mal configurat. Pot tornar a executar la comanda link per arreglar-ho.',
        ],

        'players' => ':count jugador|:count jugadors',
        'offline' => 'Offline',

        'connected' => 'S\'ha establert la conexió al servidor correctament!',
        'error' => 'Ha fallat la conexió al servidor: :error',

        'type' => [
            'mc-ping' => 'Ping Minecraft',
            'mc-rcon' => 'RCON Minecraft',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'RON Source',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Ping Bedrock',
            'bedrock-rcon' => 'RCON Bedrock',
            'fivem-status' => 'Estat FiveM',
            'fivem-rcon' => 'RCON FiveM',
            'rust-rcon' => 'RCON Rust',
            'flyff-server' => 'Servidor Flyff', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Usuaris',
        'edit' => 'Editar usuari :user',
        'create' => 'Crear usuari',

        'registered' => 'Registrat',
        'last_login' => 'Darrera connexió',
        'ip' => 'Adreça IP',

        'admin' => 'Admin',
        'banned' => 'Banejat',
        'deleted' => 'Eliminat',

        'ban' => 'Banejar',
        'unban' => 'Desbanejar',
        'delete' => 'Eliminar',

        'alert-deleted' => 'Aquest usuari s\'ha esborrat, no es pot modificar.',
        'alert-banned' => [
            'title' => 'Aquest usuari està actualment banejat:',
            'banned-by' => 'Banejat per: :author',
            'reason' => 'Motiu: :reason',
            'date' => 'Data: :date',
        ],

        'edit_profile' => 'Editar perfil',

        'info' => 'Informació d\'usuari',

        'ban-title' => 'Banejar :user',
        'ban-description' => 'Estàs segur de que vols banejar aquest usuari?',

        'email' => [
            'verify' => 'Verificar correu electrònic',
            'verified' => 'Adreça de correu electrònic verificada',
            'date' => 'Yes, at :date',
            'verify_success' => 'S\'ha verificat l\'adreça de correu electrònic amb èxit.',
        ],

        '2fa' => [
            'title' => 'Autenticació en dos passos',
            'secured' => '2FA enabled',
            'disable' => 'Desactivar 2FA',
            'disabled' => 'Autenticació de dos factors desactivada.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'Usuari està banejat.',
            'unbanned' => 'Usuari desbanjeat.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Send a notification',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Rols',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Crear rol',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Predeterminat',
        'admin' => 'Admin',
        'admin_info' => 'Quan el grup és admin té tots els permisos.',

        'updated' => 'Rols creats amb èxit.',
        'unauthorized' => 'Aquest rol és superior al teu rol.',
        'add_admin' => 'No pots afegir el permís d\'admin a un rol.',
        'remove_admin' => 'No pots treure el permís d\'admin al teu rol.',
        'delete_default' => 'Aquest rol no es pot eliminar.',
        'delete_own' => 'No pots esborrar el teu rol.',

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
        'create-comments' => 'Comentar una entrada',
        'delete-other-comments' => 'Esborrar un comentari d\'entrada d\'un altre usuari',
        'maintenance-access' => 'Accedir el lloc web durant manteniment',
        'admin-access' => 'Accdir el panel d\'admin',
        'admin-logs' => 'Veure i administrar els registres del lloc web',
        'admin-images' => 'Veure i administrar les imatges',
        'admin-navbar' => 'Veure i administrar navbar',
        'admin-pages' => 'Veure i administrar pàgines',
        'admin-redirects' => 'Mostra i gestiona les redireccions',
        'admin-posts' => 'Veure i administrar entrades',
        'admin-settings' => 'Veure i administrar configuració',
        'admin-users' => 'Veure i administrar usuaris',
        'admin-themes' => 'Veure i administrar temes',
        'admin-plugins' => 'Veure i administrar plugins',
    ],

    'bans' => [
        'title' => 'Bans',

        'by' => 'Banejar per',
        'reason' => 'Raó',
        'removed' => 'Eliminat el :date per :user',
    ],

    'posts' => [
        'title' => 'Entrades',
        'edit' => 'Editar entrada :post',
        'create' => 'Crear entrada',

        'published_info' => 'Aquesta entrada no serà visibles fins aquesta data.',
        'pin' => 'Fixa entrada',
        'pinned' => 'Fixat',
        'feed' => 'An RSS/Atom feed for the posts is available on <code>:rss</code> and <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Pàgines',
        'edit' => 'Editar pàgina #:page',
        'create' => 'Crear pàgina',

        'enable' => 'Activar la pàgina',
        'restrict' => 'Limit roles that will be able to access this page',
    ],

    'redirects' => [
        'title' => 'Redireccions',
        'edit' => 'Editant redirecció :redirect',
        'create' => 'Creant redirecció',

        'enable' => 'Activar redirecció',
        'source' => 'Origen',
        'destination' => 'Destinació',
        'code' => 'Codi d\'estat',

        '301' => '301 - Redirecció permanent',
        '302' => '302 - Redirecció temporal',
    ],

    'images' => [
        'title' => 'Imatges',
        'edit' => 'Editar imatge :image',
        'create' => 'Pujar imatge',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Comprar per :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Installed plugins',
        'available' => 'Plugins disponibles',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => 'Aquest plugin no és compatible amb la vostra versió d\'Azuriom.',
            'game' => 'Aquest plugin no és compatible em el joc :game.',
            'plugin' => 'Falta el plugin ":plugin" o les seves versions no són compatibles amb aquest plugin.',
        ],

        'reloaded' => 'Plugin refrescat amb èxit.',
        'enabled' => 'Plugin habilitat amb èxit.',
        'disabled' => 'Plugin desactivat amb èxit.',
        'updated' => 'Plugin actualitzat amb èxit.',
        'installed' => 'Plugin instal·lat amb èxit.',
        'deleted' => 'Plugin eliminat amb èxit.',
        'delete_enabled' => 'Aquest plugin ha d\'estar desactivat abans de poder esborrar-lo.',
    ],

    'themes' => [
        'title' => 'Temes',

        'current' => 'Tema actual',
        'author' => 'Autor: :author',
        'version' => 'Versió: :version',
        'list' => 'Installed themes',
        'available' => 'Temes disponibles',
        'no-enabled' => 'No tens cap temes activats.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => 'Editar opcions',
        'disable' => 'Desactivar tema',

        'reloaded' => 'Tema refrescada amb èxit.',
        'no_config' => 'Aquest tema no té cap configuració.',
        'config_updated' => 'Tema actualitzat amb èxit.',
        'invalid' => 'Aquest tema es invalid (el nom de la carpeta ha de ser l\'id del tema).',
        'updated' => 'Aquest tema s\'ha actualitzat.',
        'installed' => 'Aquest tema s\'ha instal·lat.',
        'deleted' => 'Aquest tema s\'ha eliminat.',
        'delete_current' => 'No podeu eliminar el tema actiu.',
    ],

    'update' => [
        'title' => 'Actualitzar',

        'has_update' => 'Actualització disponible',
        'no_update' => 'No hi ha actualitzacions disponibles',
        'check' => 'Comprovar actualitzacions',

        'update' => 'La versió <code>:last-version</code> d\'Azuriom està disponible i aquest lloc web és <code>:version</code>.',
        'changelog' => 'El registre de canvis està disponible <a href=":url" target="_blank" rel="noopener noreferrer">aquí</a>.',
        'download' => 'Hi ha una versió més nova disponible per baixar.',
        'install' => 'Última versió d\'Azorium s\'ha baixat i està preparada per instal·lar.',

        'backup' => 'Abans d\'actualitzar Azuriom, és aconsellable fer una còpia de seguretat del seu lloc web!',

        'latest_version' => 'Té la versió més recent de Azuriom: <code>:version</code>.',
        'latest' => 'Està fent anar l\'última versió d\'Azuriom.',

        'downloaded' => 'S\'ha baixat l\'última versió, ja la pot instal·lar.',
        'installed' => 'S\'ha actualitzat el lloc web correctament.',
    ],

    'logs' => [
        'title' => 'Registres',

        'clear' => 'Eliminar registres antics (15d+)',
        'cleared' => 'Registres antics eliminats.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => 'Pàgina creada #:id',
            'updated' => 'Pàgina actualitzada #:id',
            'deleted' => 'Pàgina esborrada #:id',
        ],

        'posts' => [
            'created' => 'Entrada creada #:id',
            'updated' => 'Entrada actualitzada #:id',
            'deleted' => 'Entrada esborrada #:id',
        ],

        'images' => [
            'created' => 'Imatge creada #:id',
            'updated' => 'Imatge actualitzada #:id',
            'deleted' => 'Imatge esborrada #:id',
        ],

        'redirects' => [
            'created' => 'Redirecció creada amb èxit #:id',
            'updated' => 'Redirecció actualitzada amb èxit #:id',
            'deleted' => 'Redirecció eliminada amb èxit #:id',
        ],

        'roles' => [
            'created' => 'Rol creat #:id',
            'updated' => 'Rol actualitzat #:id',
            'deleted' => 'Rol esborrat #:id',
        ],

        'servers' => [
            'created' => 'Servidor creat #:id',
            'updated' => 'Servidor actualitzat #:id',
            'deleted' => 'Servidor esborrat #:id',
        ],

        'users' => [
            'updated' => 'Usuari creat #:id',
            'deleted' => 'Usuari actualitzat #:id',
            'transfer' => 'Enviar diners :money al usuari #:id',

            'login' => 'Inici de sessió correcte des de :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Habilitar l\'autenticació en dos passos',
                'disabled' => 'Desactivar l\'autenticació en dos passos',
            ],
        ],

        'settings' => [
            'updated' => 'Actualitza la configuració',
        ],

        'updates' => [
            'installed' => 'Actualització Azuriom instal·lada',
        ],

        'plugins' => [
            'enabled' => 'Habilitar plugin',
            'disabled' => 'Desactivar plugin',
        ],

        'themes' => [
            'changed' => 'Tema canviat',
            'configured' => 'Updated theme configuration',
        ],
    ],

    'errors' => [
        'back' => 'Torna al panell de control',
        '404' => 'Pàgina no trobada',
        'info' => 'Sembla que has trobat un glix en el matrix...',
        '2fa' => 'Ha d\'habilitar l\'autenticació en dos passos per accedir aquesta pàgina web.',
    ],
];
