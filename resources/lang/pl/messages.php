<?php

return [

    'lang' => 'Polski',

    'date' => [
        'default' => 'j F Y',
        'full' => 'j F Y \o G:i',
        'compact' => 'm.d.Y \o G:i',
    ],

    'nav' => [
        'toggle' => 'Przełącz nawigację',
        'profile' => 'Profil',
        'admin' => 'Panel Administratora',
    ],

    'actions' => [
        'add' => 'Dodaj',
        'back' => 'Wróć',
        'browse' => 'Przeglądaj',
        'cancel' => 'Anuluj',
        'choose_file' => 'Wybierz plik',
        'close' => 'Zamknij',
        'comment' => 'Dodaj komentarz',
        'continue' => 'Kontyntynuj',
        'copy' => 'Kopiuj',
        'create' => 'Stwórz',
        'delete' => 'Usuń',
        'disable' => 'Wyłącz',
        'download' => 'Pobierz',
        'duplicate' => 'Duplikuj',
        'edit' => 'Edytuj',
        'enable' => 'Włącz',
        'generate' => 'Wygeneruj',
        'install' => 'Zainstaluj',
        'refresh' => 'Odśwież',
        'reload' => 'Przeładuj',
        'remove' => 'Usuń',
        'save' => 'Zapisz',
        'search' => 'Szukaj',
        'send' => 'Wyślij',
        'show' => 'Zobacz',
        'update' => 'Aktualizacje',
        'upload' => 'Prześlij plik',
    ],

    'fields' => [
        'action' => 'Akcja',
        'address' => 'Adres',
        'author' => 'Autor',
        'category' => 'Kategoria',
        'color' => 'Kolor',
        'content' => 'Wiadomość',
        'date' => 'Data',
        'description' => 'Opis',
        'enabled' => 'Włączone',
        'file' => 'Plik',
        'game' => 'Gra',
        'icon' => 'Ikona',
        'image' => 'Zdjęcie',
        'link' => 'Link',
        'money' => 'Monety',
        'name' => 'Nazwa',
        'permissions' => 'Uprawnienia',
        'port' => 'Port',
        'price' => 'Cena',
        'published_at' => 'Opublikowano w dniu',
        'quantity' => 'Ilość',
        'role' => 'Ranga',
        'server' => 'Serwer',
        'short_description' => 'Krótki opis',
        'slug' => 'Link',
        'status' => 'Status',
        'title' => 'Temat',
        'type' => 'Typ',
        'url' => 'URL',
        'user' => 'Użytkownik',
        'value' => 'Wartość',
        'version' => 'Wersja',
    ],

    'status' => [
        'success' => 'Czynność została wykonana!',
        'error' => 'Wystąpił błąd. :error',
    ],

    'range' => [
        'days' => 'Dni',
        'months' => 'Miesiącami',
    ],

    'loading' => 'Ładowanie...',

    'yes' => 'Tak',
    'no' => 'Nie',
    'unknown' => 'Nieznany',
    'other' => 'Inne',
    'none' => 'Brak',
    'copied' => 'Skopiowano',
    'icons' => 'Lista dostępnych ikon znajduje się na <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">ikonach Bootstrap</a>.',

    'home' => 'Strona Główna',
    'servers' => 'Serwery',
    'news' => 'Aktualności',
    'welcome' => 'Witamy na :name',
    'copyright' => 'Stworzone przez <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Przerwa techniczna',
        'message' => 'Obecnie na stronie są prowadzone prace techniczne.',
    ],

    'theme' => [
        'light' => 'Jasny styl',
        'dark' => 'Ciemny styl',
    ],

    'captcha' => 'Weryfikacja captcha nie powiodła się, spróbuj ponownie.',

    'notifications' => [
        'notifications' => 'Powiadomienia',
        'read' => 'Oznacz jako przeczytane',
        'empty' => 'Nie masz nieprzeczytanych powiadomień.',
        'level' => 'Poziom',
        'info' => 'Informacje',
        'warning' => 'Ostrzeżenie',
        'danger' => 'Niebezpieczeństwo',
        'success' => 'Zakończono pomyślnie',
    ],

    'clipboard' => [
        'copied' => 'Skopiowano!',
        'error' => 'CTRL + C, aby skopiować',
    ],

    'server' => [
        'join' => 'Dołącz',
        'total' => ':count/:max gracza|:count/:max graczy online',
        'online' => ':count online player|:count Graczy Online',
        'offline' => 'Serwer jest obecnie wyłączony.',
    ],

    'profile' => [
        'title' => 'Mój profil',
        'change_email' => 'Zmień adres e-mail',
        'change_password' => 'Zmień hasło',
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => 'Usuń moje konto',
            'title' => 'Konto zostało usunięte',
            'info' => 'To spowoduje trwałe usunięcie Twojego konta i powiązanych danych. Tej czynności nie można cofnąć.',
            'email' => 'Wyślemy Ci e-mail z potwierdzeniem, aby potwierdzić tę operację.',
            'sent' => 'Link potwierdzający został wysłany na Twój adres e-mail.',
            'success' => 'Twoje konto zostało pomyślnie usunięte!',
        ],

        'email_verification' => 'Twój e-mail nie jest zweryfikowany, sprawdź swój adres e-mail, aby uzyskać link weryfikacyjny.',
        'updated' => 'Twój profil został zaktualizowany.',

        'info' => [
            'role' => 'Ranga: :role',
            'register' => 'Zarejestrowany: :date',
            'money' => 'Monety: :money',
            '2fa' => 'Uwierzytelnianie dwuskładnikowe (2FA): :2fa',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => 'Włącz 2FA',
            'disable' => 'Wyłącz 2FA',
            'manage' => 'Zarządzaj 2FA',
            'info' => 'Zeskanuj powyższy kod QR za pomocą aplikacji uwierzytelniania dwuskładnikowego w telefonie, takiej jak <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> lub Google Authenticator.',
            'secret' => 'Sekretny klucz: :secret',
            'title' => 'Uwierzytelnianie dwuetapowe',
            'codes' => 'Pokaż kody odzyskiwania',
            'code' => 'Kod',
            'enabled' => 'Uwierzytelnianie dwuskładnikowe jest obecnie włączone. Nie zapomnij zapisać swoich kodów odzyskiwania!',
            'disabled' => 'Uwierzytelnianie dwuskładnikowe wyłączone.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => 'Przelew pieniężny',
            'user' => 'This user was not found.',
            'balance' => 'Nie masz wystarczającej ilości pieniędzy, aby wykonać tę płatność.',
            'success' => 'Pieniądze zostały pomyślnie wysłane.',
            'notification' => ':user wysłał Ci :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Posty',
        'posted' => 'Dodany dnia :date przez :user',
        'unpublished' => 'Ten post nie został jeszcze opublikowany.',
        'read' => 'Czytaj więcej',
    ],

    'comments' => [
        'create' => 'Zostaw komentarz',
        'guest' => 'Musisz być zalogowany, aby napisać komentarz.',
        'author' => '<strong>:user</strong> skomentował dnia :date',
        'content' => 'Twój komentarz',
        'delete' => 'Usunąć?',
        'delete_confirm' => 'Czy na pewno chcesz usunąć ten komentarz?',
    ],

    'likes' => 'Polubień: :count',

    'markdown' => [
        'init' => 'Attach files by drag and dropping or pasting from clipboard.',
        'drag' => 'Drop image to upload it.',
        'drop' => 'Uploading image #images_names#...',
        'progress' => 'Uploading #file_name#: #progress#%',
        'uploaded' => 'Uploaded #image_name#',

        'size' => 'Image #image_name# is too big (#image_size#).\nMaximum file size is #image_max_size#.',
        'error' => 'Something went wrong when uploading the image #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Role ID',
            'description' => 'ID of the role on the website.',
        ],

        'power' => [
            'name' => 'Role Power',
            'description' => 'Power of the role on the website equal or greater than',
        ],
    ],
];
