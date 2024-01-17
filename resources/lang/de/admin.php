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
            'heading' => 'Einstellungen',
            'settings' => 'Einstellungen',
            'global' => 'Global',
            'security' => 'Sicherheit',
            'performances' => 'Leistung',
            'seo' => 'SEO',
            'auth' => 'Authentifizierung',
            'mail' => 'Mail',
            'maintenance' => 'Wartungsmodus',
            'social' => 'Soziale Links',
            'navbar' => 'Navigationsleiste',
            'servers' => 'Server',
        ],

        'users' => [
            'heading' => 'Benutzer',
            'users' => 'Benutzer',
            'roles' => 'Rollen',
            'bans' => 'Banns',
        ],

        'content' => [
            'heading' => 'Inhalt',
            'pages' => 'Seiten',
            'posts' => 'Beiträge',
            'images' => 'Bilder',
            'redirects' => 'Umleitungen',
        ],

        'extensions' => [
            'heading' => 'Erweiterungen',
            'plugins' => 'Plugins',
            'themes' => 'Designs',
        ],

        'other' => [
            'heading' => 'Anderes',
            'update' => 'Aktualisierung',
            'logs' => 'Protokolle',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Zurück zur Webseite',
        'support' => 'Hilfe',
        'documentation' => 'Dokumentation',
    ],

    'delete' => [
        'title' => 'Löschen?',
        'description' => 'Möchtest du das wirklich löschen? Dieser Vorgang kann nicht rückgängig gemacht werden!',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel entworfen von :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Dashboard',

        'users' => 'Benutzer',
        'posts' => 'Beiträge',
        'pages' => 'Seiten',
        'images' => 'Bilder',

        'update' => 'Eine neue Version von Azuriom ist verfügbar: :version',
        'http' => 'Deine Website verwendet kein HTTPS! Du solltest es für die Sicherheit und die der Benutzer aktivieren und erzwingen.',
        'cloudflare' => 'Wenn du Cloudflare verwendest, solltest du das Cloudflare Support-Plugin installieren.',
        'recent_users' => 'Neuste User',
        'active_users' => 'Aktive User',
        'emails' => 'E-Mails sind deaktiviert. Wenn ein Benutzer sein Passwort vergisst, kann er es nicht zurücksetzen. Du kannst E-Mails in den <a href=":url">E-Mail-Einstellungen</a> aktivieren.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Globale Einstellungen',

            'name' => 'Seitenname',
            'url' => 'Seiten URL',
            'description' => 'Seitenbeschreibung',
            'meta' => 'Meta-Keywords',
            'meta_info' => 'Die Schlüsselwörter müssen durch ein Komma getrennt werden.',
            'favicon' => 'Favicon',
            'background' => 'Hintergrund',
            'logo' => 'Logo',
            'timezone' => 'Zeitzone',
            'locale' => 'Sprache',
            'money' => 'Name der Seitenwährung',
            'copyright' => 'Copyright',
            'user_money_transfer' => 'Geldtransfer zwischen Benutzern aktivieren',
            'site_key' => 'Seiten-Schlüssel für azuriom.com',
            'site_key_info' => 'Der azuriom.com Seitenschlüssel ist erforderlich, um auf dem Markt gekaufte Premium Erweiterungen zu installieren. Du erhältst deinen Seiten-Schlüssel in deinem <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom Profil</a>.',
            'webhook' => 'Beiträge Discord Webhook URL',
            'webhook_info' => 'Ein Discord-Webhook wird beim Erstellen eines neuen Beitrags an diese URL gesendet, wenn das Veröffentlichungsdatum nicht in der Zukunft liegt. Leer lassen, um zu deaktivieren.',
        ],

        'security' => [
            'title' => 'Sicherheitseinstellungen',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Seitenschlüssel',
                'secret_key' => 'Geheimschlüssel',
                'recaptcha' => 'Du kannst reCAPTCHA-Schlüssel auf der <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCAPTCHA-Website</a> erhalten. Du musst reCAPTCHA <strong>v2 unsichtbar</strong> Schlüssel verwenden.',
                'hcaptcha' => 'Du kannst hCaptcha Schlüssel auf der <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha Webseite</a> erhalten.',
                'turnstile' => 'Du kannst Turnstil-Schlüssel auf dem <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare Dashboard</a> erhalten. Du musst das Widget "Managed" auswählen.',
            ],

            'hash' => 'Hash-Algorithmus',
            'hash_error' => 'Dieser Hash-Algorithmus wird von deiner aktuellen PHP-Version nicht unterstützt.',
            'force_2fa' => '2FA für Administrator-Panel-Zugriff erforderlich',
        ],

        'performances' => [
            'title' => 'Leistungseinstellungen',

            'cache' => [
                'title' => 'Cache löschen',
                'clear' => 'Cache löschen',
                'description' => 'Website Cache löschen.',
                'error' => 'Fehler beim löschen des Caches.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost verbessert die Leistung Ihrer Website durch Hinzufügen einer weiteren exklusiven Cache-Ebene.',
                'info' => 'Wenn du Probleme nach dem Hinzufügen von Erweiterungen hast, erneuere bitte den Cache.',

                'enable' => 'AzBoost aktivieren',
                'disable' => 'AzBoost deaktivieren',
                'reload' => 'AzBoost neu laden',

                'status' => 'AzBoost ist derzeit :status.',
                'enabled' => 'aktiviert',
                'disabled' => 'deaktiviert',

                'error' => 'Fehler beim Aktivieren von AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'SEO-Einstellungen',

            'html' => 'Du kannst HTML in den <code>&lt;head&gt;</code> oder <code>&lt;body&gt;</code> aller Seiten einfügen (z.B. für Cookie-Banner oder Website-Analyse), indem du eine Datei namens <code>head.blade.php</code> oder <code>body.blade.php</code> im Ordner <code>resources/views/custom/</code> erstellst.',
            'home_message' => 'Willkommensnachricht',

            'welcome_alert' => [
                'enable' => 'Begrüßungs-Popup aktivieren?',
                'message' => 'Willkommens-Popup-Nachricht',
                'info' => 'Dieses Popup wird angezeigt, wenn ein Benutzer die Seite zum ersten Mal besucht.',
            ],
        ],

        'auth' => [
            'title' => 'Authentifizierung',

            'conditions' => 'Bedingungen, die bei der Anmeldung akzeptiert werden müssen',
            'conditions_info' => 'Links im Markdown-Format, zum Beispiel: <code>Ich akzeptiere die [Bedingungen](/conditions-link) und [Datenschutzrichtlinie](/privacy-policy)</code>',
            'registration' => 'Registration neuer Benutzer erlauben',
            'registration_info' => 'Es kann weiterhin möglich sein, sich über Plugins zu registrieren.',
            'api' => 'Auth-API aktivieren',
            'api_info' => 'Diese API ermöglicht es dir, eine benutzerdefinierte Authentifizierung zu deinem Spieleserver hinzuzufügen. Für Minecraft-Server, die einen Launcher verwenden, kannst du <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> für eine einfache und schnelle Integration verwenden.',
            'user_change_name' => 'Benutzern erlauben, ihren Benutzernamen im Profil zu ändern',
            'user_delete' => 'Benutzern erlauben, ihr Konto aus ihrem Profil zu löschen',
        ],

        'mail' => [
            'title' => 'Mail-Einstellungen',
            'from' => 'E-Mail-Adresse, die zum Senden von E-Mails verwendet wird.',
            'mailer' => 'E-Mail-Typ',
            'mailer_info' => 'Azuriom unterstützt SMTP und Sendmail zum Senden von E-Mails. Weitere Informationen zur Mail-Konfiguration findest du in unserer <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">Dokumentation</a>.',
            'disabled' => 'Wenn E-Mails deaktiviert sind, können Benutzer ihr Passwort nicht zurücksetzen, wenn sie es vergessen.',
            'sendmail' => 'Die Verwendung von Sendmail wird nicht empfohlen. Verwende wenn möglich einen SMTP-Server.',
            'smtp' => [
                'host' => 'SMTP-Hostadresse',
                'port' => 'SMTP-Host-Port',
                'encryption' => 'Verschlüsselungsprotokoll',
                'username' => 'SMTP-Server-Benutzername',
                'password' => 'SMTP-Server-Passwort',
            ],
            'verification' => 'Überprüfung der Benutzer-E-Mail-Adresse aktivieren',
            'send' => 'Sende eine Testmail',
            'sent' => 'Die Testmail wurde erfolgreich gesendet.',
            'missing' => 'In deinem Konto wurde keine E-Mail-Adresse angegeben.',
        ],

        'maintenance' => [
            'title' => 'Wartungseinstellungen',

            'enable' => 'Wartung aktivieren',
            'message' => 'Meldung zur Wartung',
            'global' => 'Wartungsmodus auf allen Websites aktivieren',
            'paths' => 'Zu blockierende Pfade während der Wartung',
            'info' => 'Du kannst <code>/*</code> verwenden, um alle Seiten zu blockieren, die mit demselben Pfad beginnen. Beispielsweise blockiert <code>/news/*</code> den Zugriff auf alle Neuigkeiten.',
        ],

        'updated' => 'Die Einstellungen wurden aktualisiert.',
    ],

    'navbar_elements' => [
        'title' => 'Navigationsleiste',
        'edit' => 'Navigationsleisten-Element :element bearbeiten',
        'create' => 'Navigationsleistenelement erstellen',

        'restrict' => 'Beschränke Rollen, die dieses Element sehen können',
        'dropdown' => 'Du kannst dieser Dropdown-Liste Elemente hinzufügen, wenn dieses Element gespeichert ist.',

        'fields' => [
            'home' => 'Startseite',
            'link' => 'Externer Link',
            'page' => 'Seite',
            'post' => 'Beitrag',
            'posts' => 'Beitragsliste',
            'plugin' => 'Plugin',
            'dropdown' => 'Dropdown',
            'new_tab' => 'In neuem Tab öffnen',
        ],

        'updated' => 'Navigationsleiste aktualisiert.',
        'not_empty' => 'Du kannst Dropdowns mit Elementen nicht löschen.',
    ],

    'social_links' => [
        'title' => 'Soziale Links',
        'edit' => 'Sozialen Link :link bearbeiten',
        'create' => 'Sozialen Link hinzufügen',
    ],

    'servers' => [
        'title' => 'Server',
        'edit' => 'Server :server bearbeiten',
        'create' => 'Server hinzufügen',

        'default' => 'Standardserver',
        'default_info' => 'Die Anzahl der vom Standardserver verbundenen Spieler wird auf der Seite angezeigt, wenn das aktuelle Theme dies unterstützt.',

        'home_display' => 'Zeige diesen Server auf der Startseite an',
        'url' => 'URL der Beitrittsschaltfläche',
        'url_info' => 'Leer lassen, um die Serveradresse anzuzeigen. Kann ein Link zum Herunterladen des Spiels/Launchers oder eine URL zum Beitritt zum Server sein, z. B. <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Der Ping-Link benötigt kein Plugin, aber Du kannst damit keine Befehle ausführen.',
        'query_info' => 'Mit Query Link ist es nicht möglich, Befehle auf dem Server auszuführen.',

        'query_port_info' => 'Kann leer sein, wenn es mit dem Gameport identisch ist.',

        'verify' => 'Sofortige Befehle testen',

        'rcon_password' => 'Rcon Passwort',
        'rcon_port' => 'Rcon-Port',
        'query_port' => 'Quellabfrageport',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLink-Port',

            'link' => 'So verlinkst du deinen Server mit deiner Website mit AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Lade das Plugin AzLink</a> herunter und installiere es auf deinem Server.',
            'link2' => 'Server neustarten.',
            'link3' => 'Führe diesen Befehl auf dem Server aus: ',

            'info' => 'Wenn du Probleme mit AzLink bei der Verwendung von Cloudflare oder einer Firewall hast, folge den Schritten in der <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Mit dem Befehl kannst du deinen Server mit deiner Website verknüpfen: ',
            'port_command' => 'Wenn Du einen anderen AzLink-Port als den Standardport verwendest, musst Du ihn mit dem folgenden Befehl konfigurieren: ',
            'ping' => 'Sofortbefehle aktivieren (erfordert einen offenen Port auf dem Server)',
            'ping_info' => 'Wenn Sofortbefehle nicht aktiviert sind, werden Befehle mit einer Verzögerung von 30 Sekunden bis 1 Minute ausgeführt.',
            'custom_port' => 'Einen benutzerdefinierten AzLink-Port verwenden',

            'error' => 'Die Verbindung zum Server ist fehlgeschlagen, die Adresse und/oder der Port sind falsch oder der Port ist geschlossen.',
            'badresponse' => 'Die Verbindung zum Server ist fehlgeschlagen (Code :code), der Token ist ungültig oder der Server ist falsch konfiguriert. Du kannst den Verknüpfungsbefehl wiederholen, um dies zu beheben.',
        ],

        'players' => ':count Spieler|:count Spieler',
        'offline' => 'Offline',

        'connected' => 'Die Verbindung zum Server wurde erfolgreich hergestellt!',
        'error' => 'Die Verbindung zum Server ist fehlgeschlagen: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'Source RCON',
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
        'title' => 'Benutzer',
        'edit' => 'Benutzer :user bearbeiten',
        'create' => 'Benutzer erstellen',

        'registered' => 'Registriert am',
        'last_login' => 'Letzte Anmeldung um',
        'ip' => 'IP Adresse',

        'admin' => 'Admin',
        'banned' => 'Gesperrt',
        'deleted' => 'Gelöscht',

        'ban' => 'Sperren',
        'unban' => 'Entsperren',
        'delete' => 'Löschen',

        'alert-deleted' => 'Dieser Benutzer wurde entfernt und kann nicht bearbeitet werden.',
        'alert-banned' => [
            'title' => 'Benutzer ist momentan gesperrt:',
            'banned-by' => 'Gesperrt von: :author',
            'reason' => 'Grund: :reason',
            'date' => 'Datum: :date',
        ],

        'edit_profile' => 'Profil bearbeiten',

        'info' => 'Benutzerinformation',

        'ban-title' => ':user sperren',
        'ban-description' => 'Bist du sicher, dass du diesen Benutzer sperren möchtest?',

        'email' => [
            'verify' => 'E-Mail bestätigen',
            'verified' => 'Email Adresse verifiziert',
            'date' => 'Ja, um :date',
            'verify_success' => 'Die E-Mail-Adresse wurde verifiziert.',
        ],

        '2fa' => [
            'title' => 'Zwei-Faktor-Authentifizierung',
            'secured' => '2FA enabled',
            'disable' => '2FA deaktivieren',
            'disabled' => 'Die Zwei-Faktor-Authentifizierung wurde deaktiviert.',
        ],

        'password' => [
            'title' => 'Letzte Passwortänderung',
            'force' => 'Änderung erzwingen',
            'forced' => 'Muss Passwort ändern',
        ],

        'status' => [
            'banned' => 'Benutzer ist jetzt gesperrt.',
            'unbanned' => 'Sperre des Benutzers wurde aufgehoben.',
        ],

        'discord' => 'Verlinkter Discord-Account',

        'notify' => 'Eine Mitteilung senden',
        'notify_info' => 'Eine Benachrichtigung an diesen Benutzer senden',
        'notify_all' => 'Eine Benachrichtigung an alle Nutzer senden',
    ],

    'roles' => [
        'title' => 'Rollen',
        'edit' => 'Rolle bearbeiten :role (#:id)',
        'create' => 'Rolle erstellen',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Standard',
        'admin' => 'Admin',
        'admin_info' => 'Wenn die Gruppe Administrator ist, hat sie alle Berechtigungen.',

        'updated' => 'Die Rollen wurden aktualisiert.',
        'unauthorized' => 'Diese Rolle ist höher als deine eigene Rolle.',
        'add_admin' => 'Du kannst die Administratorberechtigung nicht zu einer Rolle hinzufügen.',
        'remove_admin' => 'Du kannst die Administratorberechtigung deiner Rolle nicht entfernen.',
        'delete_default' => 'Diese Rolle kann nicht gelöscht werden.',
        'delete_own' => 'Du kannst deine Rolle nicht löschen.',

        'discord' => [
            'title' => 'Discord Rollen verlinken',
            'enable' => 'Discord Rollen Link aktivieren',
            'enable_info' => 'Once enabled, edit the role on Discord, and add a requirement in the <b>Links</b> tab. Users can get their Discord role in the server menu, in <b>Linked Roles</b>.',
            'info' => 'Du musst eine Anwendung auf dem <a href="https://discord.com/developers/applications" target="_blank">Discord-Entwickler-Dashboard</a> erstellen und die <b>Verknüpfte URL zur Rollenüberprüfung</b> auf <code>:url</code> setzen',
            'oauth' => 'Dann musst du in <b>OAuth2</b> und in <b>Allgemein</b> <code>:url</code> in den <b>Redirects</b> hinzufügen.',
            'token_info' => 'Den Bot-Token erhältst du, indem du einen Bot für deine Anwendung erstellst, und zwar auf der Registerkarte <b>Bot</b> auf der linken Seite des Discord-Entwickler-Dashboards.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Beitrag kommentieren',
        'delete-other-comments' => 'Kommentar eines anderen Benutzers löschen',
        'maintenance-access' => 'Webseite während Wartungsmodus besuchen',
        'admin-access' => 'Zugriff zum Admin-Dashboard',
        'admin-logs' => 'Anzeigen und Verwalten von Website-Protokollen',
        'admin-images' => 'Bilder ansehen und verwalten',
        'admin-navbar' => 'Navigationsleiste ansehen und verwalten',
        'admin-pages' => 'Seiten ansehen und verwalten',
        'admin-redirects' => 'Anzeigen und Verwalten von Weiterleitungen',
        'admin-posts' => 'Beiträge ansehen und verwalten',
        'admin-settings' => 'Einstellungen ansehen und verwalten',
        'admin-users' => 'Benutzer anzeigen und verwalten',
        'admin-themes' => 'Designs ansehen und verwalten',
        'admin-plugins' => 'Plugins ansehen und verwalten',
    ],

    'bans' => [
        'title' => 'Sperren',

        'by' => 'Gesperrt von',
        'reason' => 'Grund',
        'removed' => 'Entfernte die :date von :user',
    ],

    'posts' => [
        'title' => 'Beiträge',
        'edit' => 'Beitrag :post bearbeiten',
        'create' => 'Beitrag erstellen',

        'published_info' => 'Dieser Beitrag wird bis zu diesem Datum nicht öffentlich sichtbar sein.',
        'pin' => 'Beitrag anheften',
        'pinned' => 'Angepinnt',
        'feed' => 'Ein RSS/Atom-Feed für die Beiträge ist unter <code>:rss</code> und <code>:atom</code> verfügbar.',
    ],

    'pages' => [
        'title' => 'Seiten',
        'edit' => 'Seite #:page bearbeiten',
        'create' => 'Seite erstellen',

        'enable' => 'Seite aktivieren',
        'restrict' => 'Rollen beschränken, die auf diese Seite zugreifen können',
    ],

    'redirects' => [
        'title' => 'Weiterleitungen',
        'edit' => 'Weiterleitung :redirect bearbeiten',
        'create' => 'Weiterleitung erstellen',

        'enable' => 'Weiterleitung aktivieren',
        'source' => 'Quelle',
        'destination' => 'Ziel',
        'code' => 'Statuscode',

        '301' => '301 - Permanente Weiterleitung',
        '302' => '302 - Temporäre Weiterleitung',
    ],

    'images' => [
        'title' => 'Bilder',
        'edit' => 'Bild :image bearbeiten',
        'create' => 'Bild hochladen',
        'help' => 'Wenn die Bilder nicht geladen werden, versuche die Schritte in den <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a> zu befolgen.',
    ],

    'extensions' => [
        'buy' => 'Kaufen für :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Installierte Plugins',
        'available' => 'Verfügbare Plugins',

        'requirements' => [
            'api' => 'Diese Plugin-Version ist nicht kompatibel mit Azuriom v:version.',
            'azuriom' => 'Dieses Plugin ist nicht mit deiner Azariom-Version kompatibel.',
            'game' => 'Dieses Plugin ist nicht kompatibel mit dem Spiel :game.',
            'plugin' => 'Das Plugin ":plugin" fehlt oder seine Version ist mit diesem Plugin nicht kompatibel.',
        ],

        'reloaded' => 'Die Plugins wurden neu geladen.',
        'enabled' => 'Das Plugin wurde aktiviert.',
        'disabled' => 'Das Plugin wurde deaktiviert.',
        'updated' => 'Das Plugin wurde aktualisiert.',
        'installed' => 'Das Plugin wurde installiert.',
        'deleted' => 'Das Plugin wurde gelöscht.',
        'delete_enabled' => 'Das Plugin muss deaktiviert werden, bevor es gelöscht werden kann.',
    ],

    'themes' => [
        'title' => 'Designs',

        'current' => 'Aktuelles Theme',
        'author' => 'Autor: :author',
        'version' => 'Version: :version',
        'list' => 'Installierte Themes',
        'available' => 'Verfügbare Designs',
        'no-enabled' => 'Kein Design aktiviert.',
        'legacy' => 'Diese Theme-Version ist nicht mit Azuriom v:version kompatibel.',

        'config' => 'Konfig bearbeiten',
        'disable' => 'Theme deaktivieren',

        'reloaded' => 'Die Themes wurden neu geladen.',
        'no_config' => 'Dieses Theme hat keine Konfiguration.',
        'config_updated' => 'Die Theme-Konfiguration wurde aktualisiert.',
        'invalid' => 'Dieses Theme ist ungültig (der Name des Themeordners muss die Theme-Id sein).',
        'updated' => 'Das Theme wurde aktualisiert.',
        'installed' => 'Das Theme wurde installiert.',
        'deleted' => 'Das Theme wurde gelöscht.',
        'delete_current' => 'Du kannst das aktuelle Theme nicht löschen.',
    ],

    'update' => [
        'title' => 'Aktualisierung',

        'has_update' => 'Update verfügbar',
        'no_update' => 'Keine Updates verfügbar',
        'check' => 'Auf Updates prüfen',

        'update' => 'Die Version <code>:last-version</code> von Azuriom ist verfügbar. Du verwendest gerade die Version <code>:version</code>.',
        'changelog' => 'Das Änderungsprotokoll ist <a href=":url" target="_blank" rel="noopener noreferrer">hier</a> verfügbar.',
        'download' => 'Die neueste Version von Azuriom kann heruntergeladen werden.',
        'install' => 'Die neueste Version von Azuriom wurde heruntergeladen und kann installiert werden.',

        'backup' => 'Bevor Du Azuriom aktualisierst, solltest Du ein Backup deiner Website erstellen!',

        'latest_version' => 'Du führst die neueste Version von Azuriom aus:
<code>:version</code>.',
        'latest' => 'Du verwendest die neueste Version von Azariom.',

        'downloaded' => 'Die neueste Version wurde heruntergeladen, Du kannst sie jetzt installieren.',
        'installed' => 'Das Update wurde erfolgreich installiert.',
    ],

    'logs' => [
        'title' => 'Protokolle',

        'clear' => 'Alte Logs löschen (15d+)',
        'cleared' => 'Die alten Protokolle wurden gelöscht.',
        'changes' => 'Änderungen',
        'old' => 'Alter Wert',
        'new' => 'Neuer Wert',

        'pages' => [
            'created' => 'Seite #:id erstellt',
            'updated' => 'Seite #:id aktualisiert',
            'deleted' => 'Seite #:id gelöscht',
        ],

        'posts' => [
            'created' => 'Beitrag #:id erstellt',
            'updated' => 'Beitrag #:id aktualisiert',
            'deleted' => 'Beitrag #:id gelöscht',
        ],

        'images' => [
            'created' => 'Bild #:id erstellt',
            'updated' => 'Bild #:id aktualisiert',
            'deleted' => 'Bild #:id gelöscht',
        ],

        'redirects' => [
            'created' => 'Weiterleitung #:id erstellt',
            'updated' => 'Weiterleitung #:id aktualisiert',
            'deleted' => 'Weiterleitung #:id gelöscht',
        ],

        'roles' => [
            'created' => 'Rolle #:id erstellt',
            'updated' => 'Rolle #:id aktualisiert',
            'deleted' => 'Rolle #:id gelöscht',
        ],

        'servers' => [
            'created' => 'Server #:id erstellt',
            'updated' => 'Server #:id aktualisiert',
            'deleted' => 'Server #:id gelöscht',
        ],

        'users' => [
            'updated' => 'Benutzer #:id aktualisiert',
            'deleted' => 'Benutzer #:id gelöscht',
            'transfer' => 'Guthaben :money an den Benutzer #:id senden',

            'login' => 'Erfolgreiche Anmeldung von :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Zwei-Faktor-Authentifizierung aktiviert',
                'disabled' => 'Zwei-Faktor-Authentifizierung deaktiviert',
            ],
        ],

        'settings' => [
            'updated' => 'Einstellungen aktualisiert',
        ],

        'updates' => [
            'installed' => 'Azuriom-Update installiert',
        ],

        'plugins' => [
            'enabled' => 'Plugin aktiviert',
            'disabled' => 'Plugin deaktiviert',
        ],

        'themes' => [
            'changed' => 'Design geändert',
            'configured' => 'Aktualisierte Theme-Konfiguration',
        ],
    ],

    'errors' => [
        'back' => 'Zurück zum Dashboard',
        '404' => 'Seite nicht gefunden',
        'info' => 'Es sieht so aus, als hättest Du einen Fehler in der Matrix gefunden...',
        '2fa' => 'Du musst die Zwei-Faktor-Authentifizierung aktivieren, um auf diese Seite zugreifen zu können.',
    ],
];
