<?php

return [
    'title' => 'Instalacja',

    'welcome' => 'Azuriom to <strong>następna generacja</strong> gry CMS, <strong>darmowy</strong> i <strong>open-source</strong>, i jest nowoczesny <strong>, niezawodna, szybka i bezpieczna</strong> alternatywa dla istniejącego CMS, dzięki czemu możesz mieć <strong>najlepsze możliwości korzystania z internetu</strong>.',

    'back' => 'Powrót',

    'requirements' => [
        'php' => 'PHP :version lub nowszy',
        'writable' => 'Uprawnienia zapisu',
        'rewrite' => 'Przepisywanie URL włączone',
        'extension' => 'Rozszerzenie :extension',
        'function' => 'Funkcja :function włączona',
        '64bit' => '64-bitowy PHP',

        'refresh' => 'Wymagane odświeżenie',
        'success' => 'Azuriom jest gotowy do skonfigurowania!',
        'missing' => 'Twój serwer nie spełnia wymagań do zainstalowania oprogramowania Azuriom.',

        'help' => [
            'writable' => 'Możesz spróbować tej komendy aby przyznać uprawnienia do zapisu: <code>:command</code>.',
            'rewrite' => 'Możesz postępować zgodnie z instrukcjami w <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">naszej dokumentacji</a> , aby włączyć przepisywanie URL.',
            'htaccess' => 'Brakuje pliku <code>.htaccess</code> lub <code>public/.htaccess</code> . Upewnij się, że włączyłeś ukryte pliki i że plik jest obecny.',
            'extension' => 'Możesz spróbować tej komendy aby zainstalować brakujące rozszerzenia PHP: <code>:command</code>.<br>Po zakończeniu zrestartuj Apache lub Nginx.',
            'function' => 'Musisz włączyć tę funkcję w pliku php.ini PHP poprzez edycję wartości <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Baza danych',

        'type' => 'Rodzaj',
        'host' => 'Host',
        'port' => 'Port',
        'database' => 'Baza danych',
        'user' => 'Użytkownik',
        'password' => 'Hasło',

        'warn' => 'Ten typ bazy danych nie jest zalecany i powinien być używany tylko wtedy, gdy nie można wybrać innego.',
    ],

    'game' => [
        'title' => 'Gra',

        'locale' => 'Język',

        'warn' => 'Zachowaj ostrożność, gdy instalacja zostanie zakończona, nie będzie możliwości wprowadzania zmian bez ponownej instalacji oprogramowania Azuriom!',

        'install' => 'Zainstaluj',

        'user' => [
            'title' => 'Konto Administratora',

            'name' => 'Nazwa',
            'email' => 'Adres e-mail',
            'password' => 'Hasło',
            'password_confirm' => 'Potwierdź hasło',
        ],

        'minecraft' => [
            'premium' => 'Zaloguj przez konto Microsoft (najbezpieczniejsza metoda, ale wymaga zakupu Minecrafta)',
        ],

        'steam' => [
            'profile' => 'Adres URL profilu Steam',
            'profile_info' => 'Ten użytkownik Steam będzie administratorem na stronie.',

            'key' => 'Klucz API Steam',
            'key_info' => 'Klucz API Steam znajdziesz na <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Dziękujemy za wybór Azuriom!',
        'success' => 'Twoja strona została pomyślnie zainstalowana, możesz teraz użyć swojej strony i zrobić coś niesamowitego!',
        'go' => 'Pierwsze kroki',
        'support' => 'Jeśli doceniasz Azuriom i wykonaną przez nas pracę, nie zapomnij nas <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">wspierać</a>.',
    ],
];
