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
        'dashboard' => 'Panel Główny',
        'settings' => [
            'heading' => 'Ustawienia',
            'settings' => 'Ustawienia',
            'global' => 'Ogólne',
            'security' => 'Bezpieczeństwo',
            'performances' => 'Wydajność',
            'seo' => 'SEO',
            'auth' => 'Uwierzytelnianie',
            'mail' => 'E-mail',
            'maintenance' => 'Przerwa Techniczna',
            'social' => 'Linki społecznościowe',
            'navbar' => 'Pasek Nawigacji',
            'servers' => 'Serwery',
        ],

        'users' => [
            'heading' => 'Użytkownicy',
            'users' => 'Użytkownicy',
            'roles' => 'Role',
            'bans' => 'Bany',
        ],

        'content' => [
            'heading' => 'Treść',
            'pages' => 'Strony',
            'posts' => 'Posty',
            'images' => 'Zdjęcia',
            'redirects' => 'Przekierowania',
        ],

        'extensions' => [
            'heading' => 'Dodatki',
            'plugins' => 'Pluginy',
            'themes' => 'Motywy',
        ],

        'other' => [
            'heading' => 'Inne',
            'update' => 'Aktualizacje',
            'logs' => 'Wpisy',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Wróć na stronę główną',
        'support' => 'Pomoc',
        'documentation' => 'Dokumentacja',
    ],

    'delete' => [
        'title' => 'Usunąć?',
        'description' => 'Czy na pewno chcesz to usunąć? Nie można tego cofnąć!',
    ],

    'footer' => 'Stworzone przez :azuriom &copy; :year. Panel zaprojektowany przez :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Panel Główny',

        'users' => 'Użytkownicy',
        'posts' => 'Posty',
        'pages' => 'Strony',
        'images' => 'Zdjęcia',

        'update' => 'Dostępna jest nowa wersja Azuriom: :version',
        'http' => 'Twoja witryna nie korzysta z HTTPS, więc zalecamy jego włączenie dla bezpieczeństwa własnego i użytkowników.',
        'cloudflare' => 'Jeśli używasz Cloudflare, powinieneś zainstalować wtyczkę Cloudflare Support.',
        'recent_users' => 'Ostatni użytkownicy',
        'active_users' => 'Aktywni użytkownicy',
        'emails' => 'E-maile są wyłączone. Jeśli użytkownik zapomni swojego hasła, nie będzie mógł go zresetować. E-maile możesz włączyć w <a href=":url">ustawieniach poczty</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Ustawienia globalne',

            'name' => 'Nazwa witryny',
            'url' => 'Adres URL witryny',
            'description' => 'Opis witryny',
            'meta' => 'Słowa kluczowe meta',
            'meta_info' => 'Słowa kluczowe należy rozdzielić przecinkiem.',
            'favicon' => 'Ikona strony',
            'background' => 'Tło',
            'logo' => 'Logo',
            'timezone' => 'Strefa czasowa',
            'locale' => 'Język',
            'money' => 'Nazwa waluty strony',
            'copyright' => 'Prawa autorskie',
            'user_money_transfer' => 'Aktywuj transakcje pieniężne między użytkownikami',
            'site_key' => 'Klucz strony dla azuriom.com',
            'site_key_info' => 'Klucz strony azuriom.com jest wymagany do zainstalowania rozszerzeń premium zakupionych na rynku. Możesz uzyskać swój klucz strony na swoim <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">profilu Azuriom</a>.',
            'webhook' => 'Upublicznia Discord webhook URL',
            'webhook_info' => 'Webhook Discorda zostanie wysłany na ten adres URL podczas tworzenia nowego posta, jeśli data publikacji nie jest w przyszłości. Pozostaw puste, aby wyłączyć.',
        ],

        'security' => [
            'title' => 'Ustawienia bezpieczeństwa',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Klucz strony',
                'secret_key' => 'Sekretny klucz',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'Klucze hCaptcha można uzyskać na stronie <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha</a>.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Algorytm skrótu',
            'hash_error' => 'Ten algorytm haszujący nie jest obsługiwany przez aktualną wersję PHP.',
            'force_2fa' => 'Wymagaj 2FA aby uzyskać dostęp do panelu administratora',
        ],

        'performances' => [
            'title' => 'Ustawienia wydajności',

            'cache' => [
                'title' => 'Wyczyść pamięć podręczną',
                'clear' => 'Wyczyść pamięć podręczną',
                'description' => 'Wyczyść pamięć podręczną witryny.',
                'error' => 'Błąd podczas czyszczenia pamięci podręcznej.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost poprawia wydajność Twojej witryny, dodając jeszcze jedną ekskluzywną warstwę pamięci podręcznej.',
                'info' => 'Jeśli masz jakieś problemy po włączeniu rozszerzenia, przeładuj pamięć podręczną.',

                'enable' => 'Włącz AzBoost',
                'disable' => 'Wyłącz AzBoost',
                'reload' => 'Załaduj ponownie AzBoost',

                'status' => 'AzBoost jest obecnie :status.',
                'enabled' => 'włączone',
                'disabled' => 'wyłączony',

                'error' => 'Błąd podczas włączania AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Ustawienia SEO',

            'html' => 'Możesz umieścić kod HTML do <code>&lt;head&gt;</code> lub <code>&lt;body&gt;</code> wszystkich stron (np. dla banera cookie lub analizy strony internetowej) tworząc plik o nazwie <code>head.blade.php</code> lub <code>body.blade.php</code> w folderze  <code>resources/views/custom/</code>',
            'home_message' => 'Wiadomość powitalna',

            'welcome_alert' => [
                'enable' => 'Włączyć komunikat powitalny?',
                'message' => 'Wiadomość komunikatu powitalnego',
                'info' => 'Ten komunikat zostanie wyświetlony, gdy użytkownik po raz pierwszy odwiedza stronę.',
            ],
        ],

        'auth' => [
            'title' => 'Uwierzytelnianie',

            'conditions' => 'Warunki, które należy zaakceptować przy rejestracji',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Włącz rejestrację użytkowników',
            'registration_info' => 'Nadal będzie można zarejestrować za pośrednictwem pluginów.',
            'api' => 'Włącz interfejs API uwierzytelniania',
            'api_info' => 'Ten interfejs API umożliwia dodanie niestandardowego uwierzytelniania do serwera gry. W przypadku serwerów Minecraft korzystających z launcherów możesz użyć <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a>, aby zapewnić łatwą i szybką integrację.',
            'user_change_name' => 'Pozwól użytkownikom na zmianę nazwy użytkownika na ich profilu',
            'user_delete' => 'Pozwól użytkownikom usuwać swoje konto ze swojego profilu',
        ],

        'mail' => [
            'title' => 'Ustawienia poczty',
            'from' => 'Adres e-mail używany do wysyłania wiadomości e-mail.',
            'mailer' => 'Typ e-maila',
            'mailer_info' => 'Azuriom obsługuje SMTP oraz Sendmail do wysyłania wiadomości e-mail. Więcej informacji na temat konfiguracji poczty można znaleźć w naszej <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentacji</a>.',
            'disabled' => 'Gdy wiadomości e-mail są wyłączone, użytkownicy nie będą mogli zresetować hasła, jeśli je zapomną.',
            'sendmail' => 'Używanie Sendmaila nie jest zalecane i zamiast tego powinieneś używać serwera SMTP, jeżeli to możliwe.',
            'smtp' => [
                'host' => 'Adres hosta SMTP',
                'port' => 'Port hosta SMTP',
                'encryption' => 'Protokół szyfrowania',
                'username' => 'Nazwa użytkownika serwera SMTP',
                'password' => 'Hasło serwera SMTP',
            ],
            'verification' => 'Włącz weryfikację adresu e-mail użytkownika',
            'send' => 'Wyślij testową wiadomość e-mail',
            'sent' => 'Wiadomość testowa została pomyślnie wysłana.',
            'missing' => 'Nie podano adresu e-mail.',
        ],

        'maintenance' => [
            'title' => 'Ustawienia przerwy technicznej',

            'enable' => 'Włącz przerwę techniczną',
            'message' => 'Wiadomość przerwy technicznej',
            'global' => 'Włącz konserwację na całej stronie',
            'paths' => 'Ścieżki do zablokowania podczas konserwacji',
            'info' => 'Możesz użyć <code>/*</code> aby zablokować wszystkie strony zaczynające się od tej samej ścieżki. Na przykład, <code>/news/*</code> zablokuje dostęp do wszystkich wiadomości.',
        ],

        'updated' => 'Ustawienia zostały zaktualizowane.',
    ],

    'navbar_elements' => [
        'title' => 'Pasek Nawigacji',
        'edit' => 'Edytuj element paska nawigacji :element',
        'create' => 'Stwórz element paska nawigacji',

        'restrict' => 'Ogranicz role, które będą mogły zobaczyć ten element',
        'dropdown' => 'Możesz dodawać elementy do tego menu, gdy ten element jest zapisywany.',

        'fields' => [
            'home' => 'Strona Główna',
            'link' => 'Link zewnętrzny',
            'page' => 'Strona',
            'post' => 'Wpis',
            'posts' => 'Lista wpisów',
            'plugin' => 'Pluginy',
            'dropdown' => 'Lista rozwijana',
            'new_tab' => 'Otwórz w nowej karcie',
        ],

        'updated' => 'Zaktualizowano pasek nawigacji.',
        'not_empty' => 'Nie możesz usunąć listy rozwijanej z elementami.',
    ],

    'social_links' => [
        'title' => 'Linki społecznościowe',
        'edit' => 'Edytuj link społecznościowy :link',
        'create' => 'Dodaj link społecznościowy',
    ],

    'servers' => [
        'title' => 'Serwery',
        'edit' => 'Edytuj serwer :server',
        'create' => 'Dodaj serwer',

        'default' => 'Domyślny serwer',
        'default_info' => 'Liczba graczy połączonych z domyślnego serwera zostanie wyświetlona na stronie, jeśli aktualny motyw to obsługuje.',

        'home_display' => 'Wyświetl ten serwer na stronie głównej',
        'url' => 'Adres przycisku funkcyjnego',
        'url_info' => 'Pozostaw puste, aby wyświetlić adres serwera. Może być linkiem do pobrania gry/launchera lub adresem URL umożliwiającym dołączenie do serwera, np. <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Link ping nie wymaga pluginu, ale nie możesz wykonać komend z tym linkiem.',
        'query_info' => 'W przypadku łącza zapytania nie można wykonywać komend na serwerze.',

        'query_port_info' => 'Może być pusty, jeśli jest taki sam jak port gry.',

        'verify' => 'Przetestuj natychmiastowe komendy',

        'rcon_password' => 'Hasło Rcon',
        'rcon_port' => 'Port Rcon',
        'query_port' => 'Port Query',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'Port AzLink',

            'link' => 'Aby połączyć twój serwer z twoją stroną internetową przy użyciu AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Pobierz wtyczkę AzLink</a> i zainstaluj ją na swoim serwerze.',
            'link2' => 'Zrestartuj serwer.',
            'link3' => 'Wykonaj tą komendę na serwerze: ',

            'info' => 'Jeśli masz problemy z AzLink podczas używania Cloudflare lub zapory, spróbuj wykonać kroki znajdujące się na <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Możesz połączyć twój serwer z twoją stroną internetową przy użyciu komendy: ',
            'port_command' => 'Jeśli używasz innego portu AzLink niż domyślny, musisz go skonfigurować za pomocą komendy: ',
            'ping' => 'Włącz komendy natychmiastowe (wymaga otwartego portu na serwerze)',
            'ping_info' => 'Gdy komendy natychmiastowe nie są włączone, komendy będą wykonywane z opóźnieniem od 30 sekund do 1 minuty.',
            'custom_port' => 'Użyj niestandardowego portu AzLink',

            'error' => 'Połączenie z serwerem nie powiodło się, adres i/lub port są nieprawidłowe lub port jest zamknięty.',
            'badresponse' => 'Połączenie z serwerem nie powiodło się (kod błędu :code), token jest nieprawidłowy lub serwer jest źle skonfigurowany. Możesz spróbować naprawić ten problem, wywołując ponownie polecenie.',
        ],

        'players' => ':count player|:count players',
        'offline' => 'Offline',

        'connected' => 'Połączenie z serwerem zostało pomyślnie nawiązane!',
        'error' => 'Połączenie z serwerem nie powiodło się :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Zapytanie Query',
            'source-rcon' => 'Zapytanie RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Pingowanie skały',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM status',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Serwer flyff', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Użytkownicy',
        'edit' => 'Edytuj użytkownika :user',
        'create' => 'Utwórz użytkownika',

        'registered' => 'Zarejestrowano dnia',
        'last_login' => 'Ostatnie logowanie w dniu',
        'ip' => 'Adres IP',

        'admin' => 'Administrator',
        'banned' => 'Zbanowano',
        'deleted' => 'Usunięto',

        'ban' => 'Zbanuj',
        'unban' => 'Odbanuj',
        'delete' => 'Usuń',

        'alert-deleted' => 'Ten użytkownik został usunięty i nie można go edytować.',
        'alert-banned' => [
            'title' => 'Ten użytkownik jest obecnie zbanowany:',
            'banned-by' => 'Zbanowany przez: :author',
            'reason' => 'Powód: :reason',
            'date' => 'Data: :date',
        ],

        'edit_profile' => 'Edytuj profil',

        'info' => 'Dane użytkownika',

        'ban-title' => 'Zbanuj :user',
        'ban-description' => 'Czy na pewno chcesz zablokować tego użytkownika?',

        'email' => [
            'verify' => 'Zweryfikuj adres e-mail',
            'verified' => 'Adres e-mail zweryfikowany',
            'date' => 'Tak, o :date',
            'verify_success' => 'Adres e-mail został zweryfikowany.',
        ],

        '2fa' => [
            'title' => 'Uwierzytelnianie dwuetapowe',
            'secured' => '2FA włączone',
            'disable' => 'Wyłącz 2FA',
            'disabled' => 'Wyłączono uwierzytelnianie dwuetapowe.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'Ten użytkownik jest teraz zbanowany.',
            'unbanned' => 'Ten użytkownik został odbanowany.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Wyślij powiadomienie',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Rangi',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Stwórz rangę',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Domyślna',
        'admin' => 'Administracja',
        'admin_info' => 'Kiedy grupa jest administratorem, ma wszystkie uprawnienia.',

        'updated' => 'Rangi zostały zaktualizowane.',
        'unauthorized' => 'Ta ranga jest wyższa od Twojej rangi.',
        'add_admin' => 'Nie możesz dodać uprawnień administratora do rangi.',
        'remove_admin' => 'Nie możesz odebrać uprawnień administratora swojej rangi.',
        'delete_default' => 'Tej rangi nie można usunąć.',
        'delete_own' => 'Nie możesz usunąć swojej rangi.',

        'discord' => [
            'title' => 'Połącz role Discord',
            'enable' => 'Włącz link do ról Discorda',
            'enable_info' => 'Once enabled, edit the role on Discord, and add a requirement in the <b>Links</b> tab. Users can get their Discord role in the server menu, in <b>Linked Roles</b>.',
            'info' => 'You need to create an application on the <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> and set the <b>Linked Role Verification URL</b> to <code>:url</code>',
            'oauth' => 'Then, in <b>OAuth2</b> and in <b>General</b>, you need to add <code>:url</code> in the <b>Redirects</b>.',
            'token_info' => 'The Bot token can be obtained by creating a bot for your application, in the <b>Bot</b> tab on the left of the Discord developer dashboard.',

            'token' => 'Token bota Discord',
            'client_id' => 'ID klienta Discord',
            'client_secret' => 'Sekret klienta Discord',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Skomentuj post',
        'delete-other-comments' => 'Usuń komentarz do wpisu innego użytkownika',
        'maintenance-access' => 'Uzyskaj dostęp do strony internetowej podczas konserwacji',
        'admin-access' => 'Dostęp do panelu administratora',
        'admin-logs' => 'Wyświetlaj logi witryny i zarządzaj nimi',
        'admin-images' => 'Wyświetlaj obrazy i zarządzaj nimi',
        'admin-navbar' => 'Wyświetl pasek nawigacyjny i zarządzaj nim',
        'admin-pages' => 'Wyświetlaj strony i zarządzaj nimi',
        'admin-redirects' => 'Wyświetl i zarządzaj przekierowaniami',
        'admin-posts' => 'Wyświetlaj posty i zarządzaj nimi',
        'admin-settings' => 'Wyświetl ustawienia i zarządzaj nimi',
        'admin-users' => 'Wyświetlaj i zarządzaj użytkownikami',
        'admin-themes' => 'Wyświetlaj motywy i zarządzaj nimi',
        'admin-plugins' => 'Wyświetlaj pluginy i zarządzaj nimi',
    ],

    'bans' => [
        'title' => 'Bany',

        'by' => 'Zbanowany przez',
        'reason' => 'Powód',
        'removed' => 'Usunięto :date przez :user',
    ],

    'posts' => [
        'title' => 'Posty',
        'edit' => 'Edytuj post :post',
        'create' => 'Stwórz post',

        'published_info' => 'Ten post nie będzie widoczny publicznie do tej daty.',
        'pin' => 'Przypnij ten post',
        'pinned' => 'Przypięty',
        'feed' => 'Kanał RSS/Atom dla wpisów jest dostępny na <code>:rss</code> i <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Strony',
        'edit' => 'Edytuj stronę #:page',
        'create' => 'Stwórz stronę',

        'enable' => 'Włącz stronę',
        'restrict' => 'Ogranicz role, które będą mogły uzyskać dostęp do tej strony',
    ],

    'redirects' => [
        'title' => 'Przekierowania',
        'edit' => 'Edycja przekierowania :redirect',
        'create' => 'Tworzenie przekierowania',

        'enable' => 'Włącz przekierowanie',
        'source' => 'Źródło',
        'destination' => 'Cel',
        'code' => 'Kod statusu',

        '301' => '301 - Trwałe przekierowanie',
        '302' => '302 - Tymczasowe przekierowanie',
    ],

    'images' => [
        'title' => 'Zdjęcia',
        'edit' => 'Edytuj zdjęcie :image',
        'create' => 'Prześlij obraz',
        'help' => 'Jeśli obrazy się nie ładują, spróbuj podążać za tymi krokami <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Kup za :price',
    ],

    'plugins' => [
        'title' => 'Pluginy',

        'list' => 'Zainstalowane wtyczki',
        'available' => 'Dostępne pluginy',

        'requirements' => [
            'api' => 'Wersja tej wtyczki nie jest kompatybilna z Azuriom v:wersja.',
            'azuriom' => 'Ten plugin nie jest kompatybilny z Twoją wersją Azuriom.',
            'game' => 'Ta wtyczka nie jest zgodna z grą :game.',
            'plugin' => 'Brak wtyczki ":plugin" lub jej wersja nie jest zgodna z tą wtyczką.',
        ],

        'reloaded' => 'Wtyczki zostały wczytane ponownie.',
        'enabled' => 'Wtyczka została włączona.',
        'disabled' => 'Wtyczka została wyłączona.',
        'updated' => 'Wtyczka została zaktualizowana.',
        'installed' => 'Wtyczka została zainstalowana.',
        'deleted' => 'Wtyczka została usunięta.',
        'delete_enabled' => 'Wtyczkę należy wyłączyć przed jej usunięciem.',
    ],

    'themes' => [
        'title' => 'Motywy',

        'current' => 'Bieżący motyw',
        'author' => 'Autor: :author',
        'version' => 'Wersja: :version',
        'list' => 'Zainstalowane motywy',
        'available' => 'Dostępne motywy',
        'no-enabled' => 'Nie masz włączonego żadnego motywu.',
        'legacy' => 'Ta wersja motywu nie jest kompatybilna z Azuriom v:wersja.',

        'config' => 'Edytuj konfigurację',
        'disable' => 'Wyłącz motyw',

        'reloaded' => 'Motywy zostały wczytane ponownie.',
        'no_config' => 'Ten motyw nie został skonfigurowany.',
        'config_updated' => 'Konfiguracja motywu została zaktualizowana.',
        'invalid' => 'Ten motyw nie jest prawidłowy (nazwa folderu motywu musi być identyczna z identyfikatorem motywu).',
        'updated' => 'Motyw został zaktualizowany.',
        'installed' => 'Motyw został zainstalowany.',
        'deleted' => 'Motyw został usunięty.',
        'delete_current' => 'Nie możesz usunąć bieżącego motywu.',
    ],

    'update' => [
        'title' => 'Aktualizacja',

        'has_update' => 'Dostępna aktualizacja',
        'no_update' => 'Brak dostępnych aktualizacji',
        'check' => 'Sprawdź aktualizacje',

        'update' => 'Wersja <code>:last-version</code> Azuriom jest dostępna i korzystasz z wersji <code>:version</code>.',
        'changelog' => 'Lista zmian jest dostępna <a href=":url" target="_blank" rel="noopener noreferrer">tutaj</a>.',
        'download' => 'Najnowsza wersja Azuriom jest gotowa do pobrania.',
        'install' => 'Najnowsza wersja Azuriom została pobrana i jest gotowa do zainstalowania.',

        'backup' => 'Przed aktualizacją Azuriom, zalecamy utworzenie kopii zapasowej swojej witryny!',

        'latest_version' => 'Korzystasz z najnowszej wersji Azuriom: <code>:version</code>.',
        'latest' => 'Używasz najnowszej wersji Azuriom.',

        'downloaded' => 'Najnowsza wersja została pobrana i możesz ją już zainstalować.',
        'installed' => 'Aktualizacja została pomyślnie zainstalowana.',
    ],

    'logs' => [
        'title' => 'Logi',

        'clear' => 'Wyczyść stare rejestry (15+ dni)',
        'cleared' => 'Stare rejestry zostały usunięte.',
        'changes' => 'Zmiany',
        'old' => 'Stara wartość',
        'new' => 'Nowa wartość',

        'pages' => [
            'created' => 'Stworzono stronę #:id',
            'updated' => 'Zaktualizowano stronę #:id',
            'deleted' => 'Usunięto stronę #:id',
        ],

        'posts' => [
            'created' => 'Stworzono post #:id',
            'updated' => 'Zaktualizowano post #:id',
            'deleted' => 'Usunięto post #:id',
        ],

        'images' => [
            'created' => 'Stworzono zdjęcie #:id',
            'updated' => 'Zaktualizowano zdjęcie #:id',
            'deleted' => 'Usunięto zdjęcie #:id',
        ],

        'redirects' => [
            'created' => 'Utworzono przekierowanie #:id',
            'updated' => 'Zaktualizowano przekierowanie #:id',
            'deleted' => 'Usunięto przekierowanie #:id',
        ],

        'roles' => [
            'created' => 'Utworzono rangę #:id',
            'updated' => 'Zaktualizowano rangę #:id',
            'deleted' => 'Usunięto rangę #:id',
        ],

        'servers' => [
            'created' => 'Stworzono serwer #:id',
            'updated' => 'Zaktualizowano serwer #:id',
            'deleted' => 'Usunięto serwer #:id',
        ],

        'users' => [
            'updated' => 'Zaktualizowano użytkownika #:id',
            'deleted' => 'Usunięto użytkownika #:id',
            'transfer' => 'Wysłano pieniądze :money do użytkownika #:id',

            'login' => 'Pomyślne logowanie z :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Włącz uwierzytelnianie dwuetapowe',
                'disabled' => 'Wyłącz uwierzytelnianie dwuskładnikowe',
            ],
        ],

        'settings' => [
            'updated' => 'Zaktualizowane ustawienia',
        ],

        'updates' => [
            'installed' => 'Zainstalowano aktualizację Azuriom',
        ],

        'plugins' => [
            'enabled' => 'Włączono plugin',
            'disabled' => 'Wyłączono plugin',
        ],

        'themes' => [
            'changed' => 'Zmieniony motyw',
            'configured' => 'Zaktualizowano konfigurację motywu',
        ],
    ],

    'errors' => [
        'back' => 'Powrót do panelu głównego',
        '404' => 'Strona nie znaleziona',
        'info' => 'Wygląda na to, że znalazłeś usterkę w matrycy...',
        '2fa' => 'Musisz włączyć autoryzację dwuetapową, aby uzyskać dostęp do tej strony.',
    ],
];
