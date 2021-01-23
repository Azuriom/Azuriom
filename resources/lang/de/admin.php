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
            'settings' => [
                'settings' => 'Einstellungen',
                'global' => 'Allgemein',
                'security' => 'Sicherheit',
                'performances' => 'Leistung',
                'seo' => 'SEO',
                'mail' => 'Mail',
                'maintenance' => 'Wartung',
            ],
            'navbar' => 'Navigation',
            'servers' => 'Server',
        ],

        'users' => [
            'heading' => 'Benutzer',
            'users' => 'Benutzer',
            'roles' => 'Rollen',
            'bans' => 'Verbote',
        ],

        'content' => [
            'heading' => 'Inhalt',
            'pages' => 'Seiten',
            'posts' => 'Artikel',
            'images' => 'Bilder',
        ],

        'extensions' => [
            'heading' => 'Erweiterungen',
            'plugins' => 'Plugins',
            'themes' => 'Themen',
        ],

        'other' => [
            'heading' => 'Andere',
            'update' => 'Aktualisierungen',
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back-website' => 'Zurück zur Seite',

        'support' => 'Unterstützung',
        'documentation' => 'Dokumentation',
    ],

    'confirm-delete' => [
        'title' => 'Löschen?',
        'description' => 'Sind Sie sicher, dass Sie das löschen wollen? Sie werden nicht mehr zurückgehen können!',
    ],

    'footer' => 'Angetrieben von :azuriom &copy; :year. Panel von :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Administrationsbereich',

        'new-update' => 'Eine neue Version von Azuriom ist verfügbar: :version',
        'https-warning' => 'Ihre Website verwendet nicht das https-Protokoll. Es wird empfohlen, es zu aktivieren und zu erzwingen, um die Sicherheit Ihrer Website zu verbessern.',
        'proxy-warning' => 'Wenn Sie Cloudflare verwenden, wird empfohlen, das Plugin Cloudflare Support zu installieren.',
        'recent-users' => 'Aktuelle Benutzer',
        'active-users' => 'Aktive Benutzer',
        'emails-disabled' => 'Der E-Mail-Versand ist deaktiviert. Wenn ein Benutzer sein Passwort vergisst, kann er es nicht zurücksetzen. Sie können die Mail in den <a href=":url">Mail-Einstellungen</a> aktivieren.',
        'users' => 'Benutzer',
        'posts' => 'Artikel',
        'pages' => 'Seiten',
        'images' => 'Bilder',
    ],

    'settings' => [
        'index' => [
            'title' => 'Allgemeine Einstellungen',

            'site-name' => 'Name des Standorts',
            'site-url' => 'Website-URL',
            'site-description' => 'Beschreibung des Standorts',
            'meta' => 'Schlüsselwörter der Seite',
            'meta-info' => 'Schlüsselwörter müssen durch ein Komma getrennt werden.',
            'favicon' => 'Favicon',
            'background' => 'Hintergrundbild',
            'logo' => 'Logo',
            'timezone' => 'Zeitzone',
            'locale' => 'Sprache',
            'copyright' => 'Copyright',
            'money' => 'Name der Standortwährung',
            'user-money-transfer' => 'Geldtransfer zwischen Benutzern ermöglichen',
            'site-key' => 'Seitenschlüssel für azuriom.com',
            'site-key-label' => 'Der azuriom.com-Site-Schlüssel wird für die Installation von kostenpflichtigen Erweiterungen verwendet, die auf dem Markt erworben wurden. Sie ist in Ihrem <a href="https://azuriom.com/profile" target="_blank" rel="noopener norefferer">Profil Azuriom</a> zu finden.',
        ],

        'security' => [
            'title' => 'Sicherheitsparameter',

            'captcha' => [
                'title' => 'Captcha (Anti-Bot-Schutz)',
                'site-key' => 'Standort Taste',
                'secret-key' => 'Geheimschlüssel',
                'recaptcha' => 'Sie können die Google reCaptcha-Schlüssel von <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCaptcha</a> erhalten. Sie müssen reCaptcha-Schlüssel <strong>v2 unsichtbar</strong> verwenden.',
                'hcaptcha' => 'Sie können die hCaptcha-Schlüssel von <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">hCaptcha</a> erhalten.',
            ],

            'hash' => 'Hash-Algorithmus',
            'hash-info' => 'Argon2id ist der sicherste Algorithmus, aber er erfordert PHP 7.3 oder höher. Wenn Sie PHP 7.2 verwenden, sollten Sie Argon2i verwenden.',
            'hash-error' => 'Dieser Algorithmus wird von Ihrer Version von PHP nicht unterstützt.',
        ],

        'performances' => [
            'title' => 'Leistungsparameter',

            'cache' => [
                'title' => 'Leeren Sie den Cache',
                'description' => 'Ermöglicht es Ihnen, den Cache der Website zu leeren.',

                'status' => [
                    'cleared' => 'Der Cache wurde geleert.',
                    'clear-error' => 'Beim Leeren des Caches ist ein Fehler aufgetreten.',
                ],

                'actions' => [
                    'clear' => 'Leeren Sie den Cache',
                ],
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'Mit AzBoost können Sie die Leistung Ihrer Website verbessern, indem Sie ein neues und einzigartiges Caching-System hinzufügen.',
                'info' => 'Wenn Sie nach der Installation einer Erweiterung Probleme haben, können Sie AzBoost neu laden.',

                'current' => [
                    'status' => 'AzBoost ist derzeit :status.',
                    'enabled' => '<span class="text-success">aktiviert</span>',
                    'disabled' => '<span class="text-danger">deaktiviert</span>',
                ],

                'status' => [
                    'enabled' => 'AzBoost wurde aktiviert.',
                    'disabled' => 'AzBoost wurde deaktiviert.',
                    'reloaded' => 'AzBoost wurde neu aufgeladen.',

                    'enable-error' => 'Beim Aktivieren von AzBoost ist ein Fehler aufgetreten.',
                ],

                'actions' => [
                    'enable' => 'AzBoost aktivieren',
                    'disable' => 'AzBoost deaktivieren',
                    'reload' => 'AzBoost neu laden',
                ],
            ],
        ],

        'seo' => [
            'title' => 'SEO-Parameter',

            'html-head-code' => 'HTML-Code, der in den <head> aller Seiten aufzunehmen ist.',
            'html-body-code' => 'HTML-Code, der im Textkörper aller Seiten enthalten sein muss.',

            'html-code-info' => 'Beispiel: Banner-Cookies, Google Analytics, etc',

            'welcome-popup' => [
                'enable' => 'Das Willkommens-Popup aktivieren?',
                'message' => 'Willkommens-Popup-Meldung',
                'info' => 'Dieses Popup wird angezeigt, wenn ein Benutzer die Website zum ersten Mal besucht.',
            ],
        ],

        'auth' => [
            'title' => 'Authentifizierung',

            'conditions-url' => 'TOS-Links',
            'conditions-info' => 'Die Benutzer müssen diese Bedingungen bei der Registrierung akzeptieren.',
            'enable-user-registration' => 'Aktivieren Sie die Benutzerregistrierung.',
            'enable-user-registration-label' => 'Es wird immer möglich sein, sich z.B. mit Plugins zu registrieren.',
            'auth-api' => 'Aktivieren Sie die Auth-API.',
            'auth-api-label' => 'Mit dieser API können Sie eine benutzerdefinierte Authentifizierung zu Ihrem Spielserver hinzufügen. Für Minecraft-Server, die einen Launcher verwenden, können Sie <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> zur schnellen und einfachen Integration verwenden.',
            'minecraft-verification' => 'Aktivieren der Minecraft-Nickname-Prüfung mit minecraft.net',
        ],

        'mail' => [
            'title' => 'Mail-Einstellungen',
            'from-address' => 'E-Mail-Adresse, die zum Senden von E-Mails verwendet wird.',
            'driver' => 'Mail-Typ',
            'driver-info' => 'Azuriom unterstützt SMTP und Sendmail für den Versand von E-Mails. Weitere Informationen zum Versand von E-Mails finden Sie in unserer <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">Dokumentation</a>.',
            'disabled-warn' => 'Wenn der E-Mail-Versand deaktiviert ist, können Benutzer ihre Kennwörter nicht zurücksetzen, wenn sie sie vergessen haben.',
            'sendmail-warn' => 'Die Verwendung von Sendmail wird nicht empfohlen und es wird empfohlen, stattdessen einen SMTP-Server zu verwenden, wenn möglich.',
            'smtp' => [
                'host' => 'SMTP-Host-Adresse',
                'port' => 'SMTP-Host-Port',
                'encryption' => 'Verschlüsselungsprotokoll',
                'username' => 'SMTP-Server-Benutzer',
                'password' => 'SMTP-Server-Kennwort',
            ],
            'enable-users-verification' => 'Aktivieren Sie die Überprüfung der Benutzer-E-Mail-Adresse',
            'send' => 'Senden Sie eine Test-Mail',
            'sent' => 'Die Testmail wurde gesendet.',
        ],

        'maintenance' => [
            'title' => 'Wartung',

            'enable' => 'Wartung aktivieren',
            'message' => 'Wartungsmeldung',
        ],

        'status' => [
            'updated' => 'Die Einstellungen wurden aktualisiert.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navigationsleiste',
        'title-edit' => 'Ausgabe des Elements der Navbar :element',
        'title-create' => 'Hinzufügen eines Eintrags in die Navigationsleiste',

        'dropdown-info' => 'Sobald das Element gespeichert ist, können Sie weitere Elemente hinzufügen.',

        'fields' => [
            'home' => 'Home Page',
            'link' => 'Externer Link',
            'page' => 'Seite',
            'post' => 'Artikel',
            'posts' => 'Liste der Artikel',
            'plugin' => 'Plugin',
            'dropdown' => 'Dropdown-Menü',
            'new-tab' => 'In einer neuen Registerkarte öffnen',
        ],

        'status' => [
            'nav-updated' => 'Aktualisierte Navigation',

            'created' => 'Element der erstellten Navbar.',
            'updated' => 'Navbar-Element aktualisiert.',
            'deleted' => 'Element der Navbar gelöscht.',

            'not-empty' => 'Sie können ein Dropdown-Menü, das Einträge enthält, nicht löschen.',
        ],
    ],

    'servers' => [
        'title' => 'Server',
        'title-edit' => 'Server-Ausgabe :server',
        'title-create' => 'Hinzufügen eines Servers',

        'default' => 'Standard-Server',
        'default-info' => 'Die Anzahl der Spieler, die über den Standardserver verbunden sind, wird auf der Website angezeigt, wenn das aktuelle Thema dies unterstützt.',

        'ping-no-commands' => 'Die Ping-Verknüpfung erfordert kein Plugin, allerdings können Sie mit dieser Verknüpfung keine Befehle ausführen.',
        'query-no-commands' => 'Die Abfrageverknüpfung erlaubt es nicht, dass Befehle auf dem Server ausgeführt werden.',

        'query-port-info' => 'Kann leer sein, wenn der Port mit dem Port des Spiel-Servers identisch ist.',

        'fields' => [
            'address' => 'Adresse',
            'port' => 'Hafen',

            'rcon-password' => 'Passwort Rcon',
            'rcon-port' => 'Hafen Rcon',
            'query-port' => 'Hafen Source Query',

            'azlink-port' => 'Hafen AzLink',
        ],

        'actions' => [
            'verify-connection' => 'Prüfen Sie den Anschluss',
        ],

        'azlink' => [
            'link' => 'Um Ihren Minecraft-Server mit Ihrer Website zu verknüpfen, müssen Sie AzLink verwenden:',
            'link-1' => '<a href="https://azuriom.com/azlink">Laden Sie das AzLink-Plugin herunter</a> und installieren Sie es auf Ihrem Server.',
            'link-2' => 'Starten Sie Ihren Server neu.',
            'link-3' => 'Führen Sie diesen Befehl auf Ihrem Server aus: ',

            'link-info' => 'Mit dem Befehl können Sie Ihren Minecraft-Server mit Ihrer Website verknüpfen: ',
            'port-info' => 'Wenn Sie einen anderen AzLink-Port als den Standard verwenden, müssen Sie ihn mit dem Befehl konfigurieren: ',

            'enable-ping' => 'Aktivieren von Sofortbefehlen (erfordert einen freien, offenen Port auf dem Server)',
            'ping-info' => 'Wenn Sofortbefehle nicht aktiviert sind, werden die Befehle mit einer Verzögerung von 30 Sekunden bis 1 Minute ausgeführt.',
            'custom-port' => 'Verwendung eines benutzerdefinierten AzLink-Anschlusses',
        ],

        'players' => ':count player|:count players',
        'offline' => 'Offline',

        'status' => [
            'created' => 'Der Server ist hinzugefügt worden.',
            'updated' => 'Der Server wurde aktualisiert.',
            'deleted' => 'Der Server wurde gelöscht.',

            'connect-success' => 'Die Verbindung zum Server war erfolgreich!',
            'connect-error' => 'Die Verbindung zum Server ist fehlgeschlagen: :error',

            'not-azlink' => 'Dieser Server ist nicht über AzLink verbunden.',
            'azlink-connect' => 'Die Verbindung zum Server ist fehlgeschlagen, die Adresse und/oder der Port sind falsch, oder der Port ist geschlossen.',
            'azlink-badresponse' => 'Die Verbindung zum Server ist fehlgeschlagen (Code :code), das Token ist ungültig oder der Server ist falsch konfiguriert. Sie können den Link-Befehl erneut ausführen, um dies zu beheben.',
        ],

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'Source RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff Server',
        ],
    ],

    'users' => [
        'title' => 'Benutzer',
        'title-edit' => 'Benutzerausgabe :user',
        'title-create' => 'Anlegen eines Benutzers',

        'fields' => [
            'register-date' => 'Eingeschrieben am',
            'email-verified' => 'E-Mail Adresse verifiziert',
            'last-login' => 'Letzte Anmeldung',
            '2fa' => 'Zwei-Faktor-Authentifizierung',
            'ip' => 'IP-Adresse',
        ],

        'info' => [
            'admin' => 'Admin',
            'banned' => 'Verbannt',
            'deleted' => 'Gelöscht',
        ],

        'actions' => [
            'ban' => 'Verbot',
            'unban' => 'Fehlerbehebung',
            'delete' => 'Löschen',
            'verify-email' => 'Überprüfen Sie die E-Mail Adresse.',
            'disable-2fa' => 'Deaktivieren Sie das 2FA.',
        ],

        'alert-deleted' => 'Dieser Benutzer wurde gelöscht, er kann nicht bearbeitet werden.',
        'alert-banned' => [
            'title' => 'Dieser Benutzer ist derzeit gesperrt:',
            'banned-by' => 'Verboten durch: :author',
            'reason' => 'Grund: :reason',
            'date' => 'Datum: :date',
        ],

        'edit-profile' => 'Profil bearbeiten',

        'user-info' => 'Benutzerinformationen',

        'ban-title' => 'Verbot :user',
        'ban-description' => 'Sind Sie sicher, dass Sie diesen Benutzer sperren wollen?',

        'status' => [
            'created' => 'Der Benutzer wurde angelegt.',
            'updated' => 'Der Benutzer wurde aktualisiert.',
            'deleted' => 'Der Benutzer wurde gelöscht.',

            'email-verified' => 'Die E-Mail-Adresse ist korrekt.',
            '2fa-disabled' => 'Die Zwei-Faktor-Authentifizierung wurde deaktiviert',

            'banned' => 'Gesperrter Benutzer',
            'unbanned' => 'Kann nicht verwendet werden',
        ],
    ],

    'roles' => [
        'title' => 'Rollen',
        'title-edit' => 'Bearbeiten der Rolle :role',
        'title-create' => 'Erstellen einer Rolle',

        'permissions' => 'Berechtigungen',
        'perm-admin' => [
            'label' => 'Direktor',
            'info' => 'Wenn die Rolle Administrator ist, hat sie volle Berechtigungen.',
        ],

        'info' => [
            'default' => 'Standard-Rolle',
            'admin' => 'Rolle Administrator',
        ],

        'status' => [
            'power-updated' => 'Die Rollen wurden aktualisiert.',
            'created' => 'Die Rolle wurde angelegt.',
            'updated' => 'Die Rolle wurde aktualisiert.',
            'deleted' => 'Die Rolle wurde gelöscht.',

            'add-admin' => 'Sie können keine Administratorberechtigung für eine Rolle festlegen.',
            'remove-admin' => 'Sie können die Administratorberechtigung nicht aus Ihrer Rolle entfernen.',
            'permanent-role' => 'Diese Rolle kann nicht gelöscht werden.',
            'own-role' => 'Sie können Ihre Rolle nicht löschen.',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Kommentar zu einem Artikel',
        'delete-other-comments' => 'Einen Kommentar eines anderen Benutzers löschen',
        'maintenance-access' => 'Zugriff auf den Standort während der Wartung',
        'admin-access' => 'Zugriff auf das Administrator-Panel',
        'admin-logs' => 'Anzeigen und Verwalten von Standortprotokollen',
        'admin-images' => 'Bilder anzeigen und verwalten',
        'admin-navbar' => 'Anzeigen und Verwalten der Navigationsleiste',
        'admin-pages' => 'Seiten anzeigen und verwalten',
        'admin-posts' => 'Artikel anzeigen und verwalten',
        'admin-settings' => 'Einstellungen anzeigen und verwalten',
        'admin-themes' => 'Anzeigen und Verwalten von Themen',
        'admin-plugins' => 'Plugins anzeigen und verwalten',
    ],

    'bans' => [
        'title' => 'Verbote',

        'fields' => [
            'banned-by' => 'Verboten durch',
            'reason' => 'Grund',
        ],

        'removed' => 'Gelöscht am :date von :user',
    ],

    'posts' => [
        'title' => 'Artikel',
        'title-edit' => 'Ausgabe des Artikels :post',
        'title-create' => 'Erstellen eines Artikels',

        'published-info' => 'Dieser Artikel wird erst ab diesem Datum öffentlich sichtbar sein.',

        'fields' => [
            'published-at' => 'Veröffentlicht am',
        ],

        'pin' => 'Diesen Artikel anheften',

        'status' => [
            'created' => 'Der Artikel wurde erstellt.',
            'updated' => 'Der Artikel wurde aktualisiert.',
            'deleted' => 'Der Artikel wurde gelöscht.',
        ],

        'info' => [
            'pinned' => 'Abgesteckt',
        ],
    ],

    'pages' => [
        'title' => 'Seiten',
        'title-edit' => 'Editieren der Seite :page',
        'title-create' => 'Erstellen einer Seite',

        'enable' => 'Aktivieren Sie die Seite',

        'status' => [
            'created' => 'Die Seite wurde erstellt.',
            'updated' => 'Die Seite wurde aktualisiert.',
            'deleted' => 'Die Seite wurde gelöscht.',
        ],
    ],

    'images' => [
        'title' => 'Bilder',
        'title-edit' => 'Bearbeiten des Bildes :image',
        'title-create' => 'Ein Bild hochladen',

        'status' => [
            'created' => 'Das Bild wurde erstellt.',
            'updated' => 'Das Bild wurde aktualisiert.',
            'deleted' => 'Das Bild wurde gelöscht.',
        ],
    ],

    'extensions' => [
        'buy' => 'Kaufen für :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Installierte Plugins',
        'available' => 'Plugins verfügbar',

        'azuriom-requirement' => 'Dieses Plugin ist nicht mit Ihrer Version von Azuriom kompatibel.',
        'game-requirement' => 'Dieses Plugin ist nicht kompatibel mit :game.',
        'plugin-requirement' => 'Das ":plugin"-Plugin fehlt oder seine Version ist nicht mit diesem Plugin kompatibel.',

        'status' => [
            'reloaded' => 'Die Plugins wurden neu geladen.',
            'enabled' => 'Das Plugin wurde aktiviert.',
            'disabled' => 'Le plugin a été désactivé.',
            'updated' => 'Das Plugin wurde aktualisiert.',
            'installed' => 'Das Plugin wurde installiert.',
            'deleted' => 'Das Plugin wurde entfernt.',

            'error-delete' => 'Das Plugin muss deaktiviert werden, bevor es gelöscht werden kann.',
        ],
    ],

    'themes' => [
        'title' => 'Themen',

        'current' => [
            'title' => 'Aktuelles Thema',
            'author' => 'Autor: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Installierte Themen',
        'available' => 'Verfügbare Themen',
        'no-enabled' => 'Wenn Sie kein Thema aktiviert haben, wird automatisch das Standardthema eingestellt.',

        'actions' => [
            'edit-config' => 'Konfigurieren Sie',
            'disable' => 'Deaktivieren Sie das Thema',
        ],

        'status' => [
            'reloaded' => 'Die Themen wurden neu geladen.',
            'no-config' => 'Für dieses Thema gibt es keine Konfiguration.',
            'config-updated' => 'Die Konfiguration des Themas wurde aktualisiert.',
            'invalid' => 'Dieses Thema ist ungültig. Der Name des Themenordners muss die Themen-ID sein.',
            'updated' => 'Das Thema wurde aktualisiert.',
            'installed' => 'Das Theme wurde installiert.',
            'deleted' => 'Das Thema wurde gelöscht.',

            'error-delete' => 'Sie können das aktive Thema nicht löschen.',
        ],
    ],

    'update' => [
        'title' => 'Update',

        'subtitle-update' => 'Update verfügbar',
        'subtitle-no-update' => 'Keine Updates verfügbar',

        'update' => 'Azuriom ist in <code>:last-version</code> verfügbar und Sie haben derzeit die <code>:version</code>.',
        'download' => 'Die neueste Version von Azuriom steht zum Download bereit.',
        'install' => 'Die neueste Version von Azuriom wurde heruntergeladen und ist bereit zur Installation.',

        'backup-info' => 'Bevor Sie Azuriom aktualisieren, sollten Sie ein Backup Ihrer Seite erstellen!',

        'up-to-date' => 'Sie verwenden die neueste Version von Azuriom: <code>:version/code>.',

        'status' => [
            'download-success' => 'Die neueste Version von Azuriom wurde heruntergeladen. Sie können sie nun installieren.',
            'install-success' => 'Die neueste Version von Azuriom wurde erfolgreich installiert.',

            'up-to-date' => 'Sie verwenden die neueste Version von Azuriom.',
            'error-fetch' => 'Bei der Überprüfung des Updates ist ein Fehler aufgetreten: :error',
            'error-download' => 'Beim Herunterladen des Updates ist ein Fehler aufgetreten: :error',
            'error-install' => 'Bei der Installation des Updates ist ein Fehler aufgetreten: :error',
        ],

        'actions' => [
            'check' => 'Nach Updates suchen',
            'install' => 'Installieren Sie',
            'download' => 'Herunterladen',
        ],
    ],

    'logs' => [
        'title' => 'Protokolle',

        'actions' => [
            'clear' => 'Alte Protokolle löschen (+15 Tage)',
        ],

        'status' => [
            'cleared' => 'Die alten Protokolle sind gelöscht worden.',
        ],

        'pages' => [
            'created' => 'Erstellen der Seite #:id',
            'updated' => 'Seite aktualisieren #:id',
            'deleted' => 'Löschen der Seite #:id',
        ],

        'posts' => [
            'created' => 'Erstellung eines Artikels #:id',
            'updated' => 'Artikel-Update #:id',
            'deleted' => 'Element löschen #:id.',
        ],

        'images' => [
            'created' => 'Bild erstellen #:id',
            'updated' => 'Bild aktualisieren #:id',
            'deleted' => 'Bild löschen #:id',
        ],

        'roles' => [
            'created' => 'Anlegen der Rolle #:id',
            'updated' => 'Rolle aktualisieren #:id',
            'deleted' => 'Löschung der Rolle #:id',
        ],

        'servers' => [
            'created' => 'Erstellen des Servers #:id',
            'updated' => 'Server aktualisieren #:id',
            'deleted' => 'Löschen des Servers #:id',
        ],

        'users' => [
            'updated' => 'Benutzer Update #:id',
            'deleted' => 'Löschen des Benutzers #:id',
            'transfer' => 'Senden von :money an Benutzer #:id',
        ],

        'settings' => [
            'updated' => 'Parameter aktualisieren',
        ],

        'updates' => [
            'installed' => 'Installieren eines Upgrades auf Azuriom',
        ],

        'plugins' => [
            'enabled' => 'Plugin-Aktivierung',
            'disabled' => 'Plugin-Deaktivierung',
        ],

        'themes' => [
            'changed' => 'Wechsel des Themas',
        ],
    ],

    'errors' => [
        'back' => 'Zurück',
        '404' => 'Seite nicht gefunden',
        'info' => 'Sieht aus, als hätten Sie einen Fehler in der Matrix gefunden...',
    ],
];
