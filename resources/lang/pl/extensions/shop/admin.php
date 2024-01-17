<?php

return [
    'nav' => [
        'title' => 'Sklep',
        'settings' => 'Ustawienia',
        'packages' => 'Pakiety',
        'gateways' => 'Bramki',
        'offers' => 'Oferty',
        'coupons' => 'Kupony',
        'giftcards' => 'Karty podarunkowe',
        'discounts' => 'Zniżki',
        'payments' => 'Płatności',
        'purchases' => 'Zakupy',
        'statistics' => 'Statystyki',
    ],

    'permissions' => [
        'admin' => 'Zarządzaj wtyczką sklepu',
    ],

    'categories' => [
        'title' => 'Kategorie',
        'edit' => 'Edytuj kategorię :category',
        'create' => 'Utwórz kategorię',

        'parent' => 'Kategoria nadrzędna',
        'delete_error' => 'Kategoria z pakietami nie może zostać usunięta.',

        'cumulate' => 'Skumulowane zakupy w tej kategorii',
        'cumulate_info' => 'Użytkownicy, którzy już kupili pakiet w tej kategorii, otrzymają zniżkę i zapłacą różnicę tylko przy zakupie droższego pakietu.',
        'enable' => 'Włącz kategorię',
    ],

    'offers' => [
        'title' => 'Oferty',
        'edit' => 'Edytuj ofertę :offer',
        'create' => 'Utwórz ofertę',

        'enable' => 'Włącz tę ofertę',
    ],

    'coupons' => [
        'title' => 'Kupony',
        'edit' => 'Edytuj kupon :coupon',
        'create' => 'Utwórz kupon',

        'global' => 'Czy kupon powinien być aktywny w całym sklepie?',
        'cumulate' => 'Pozwól na korzystanie z tego kuponu z innymi kuponami',
        'user_limit' => 'Limit użytkowników',
        'global_limit' => 'Limit globalny',
        'active' => 'Aktywny',
        'usage' => 'Under usage limit',
        'enable' => 'Włącz kupon',
    ],

    'giftcards' => [
        'title' => 'Karty podarunkowe',
        'edit' => 'Edytuj kartę podarunkową :giftcard',
        'create' => 'Utwórz kartę podarunkową',

        'global_limit' => 'Limit globalny',
        'active' => 'Aktywny',
        'enable' => 'Włącz kartę podarunkową',
    ],

    'discounts' => [
        'title' => 'Zniżki',
        'edit' => 'Edytuj rabat :discount',
        'create' => 'Utwórz rabat',

        'global' => 'Czy zniżka powinna być aktywny we wszystkich sklepach?',
        'active' => 'Aktywny',
        'enable' => 'Włącz zniżkę',
    ],

    'packages' => [
        'title' => 'Pakiety',
        'edit' => 'Edytuj pakiet :package',
        'create' => 'Utwórz pakiet',

        'updated' => 'Pakiety zostały zaktualizowane.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Balance of the giftcard to create during the purchase',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Allow the user to choose the price to pay (the package price will then be the minimum)',
        'require_online' => 'Wykonaj polecenia, gdy użytkownik jest online na serwerze (dostępne tylko dla AzLink)',
        'enable_quantity' => 'Włącz ilość',

        'create_category' => 'Utwórz kategorię',
        'create_package' => 'Utwórz pakiet',

        'enable' => 'Włącz ten pakiet',
    ],

    'gateways' => [
        'title' => 'Bramki',
        'edit' => 'Edytuj bramę :gateway',
        'create' => 'Dodaj bramę',

        'current' => 'Bieżące bramy',
        'add' => 'Dodaj nową bramę',
        'info' => 'Jeśli masz problemy z płatnościami podczas korzystania z Cloudflare lub zapory, spróbuj wykonać kroki w <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'Kraj',
        'sandbox' => 'Sandbox',
        'api-key' => 'Klucz API',
        'public-key' => 'Klucz publiczny',
        'private-key' => 'Prywatny klucz',
        'secret-key' => 'Tajny klucz',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => 'Identyfikator usługi',
        'client-id' => 'Identyfikator klienta',
        'merchant-id' => 'Identyfikator sprzedawcy',
        'project-id' => 'Identyfikator projektu',
        'env' => 'Środowisko',

        'paypal_email' => 'Adres e-mail konta PayPal',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'Aby móc przyjmować płatności poprzez paysafecard, należy być <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">partnerem paysafecard</a>. Istnieją inne metody, ale tylko ta jest dopuszczona przez paysafecard.',
        'stripe_info' => 'Na pulpicie Stripe musisz ustawić adres URL webhooka na <code>:url</code> i wybrać <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'Na panelu PaymentWall musisz ustawić adres URL pingback na <code>:url</code>.',
        'xsolla' => 'Na panelu Xsolla musisz ustawić adres URL webhooka na <code>:url</code>, włączyć „Transaction external ID” w ustawieniach „Pay station”, przetestować webhooki, a następnie włączyć „Checkout” w „Pay Station” \'ustawienia.',

        'enable' => 'Włącz bramkę',
    ],

    'payments' => [
        'title' => 'Płatności',
        'show' => 'Płatność #:payment',

        'info' => 'Informacja o płatności',
        'items' => 'Zakupione przedmioty',

        'card' => 'Płatności w sklepie',

        'status' => [
            'pending' => 'Oczekujące',
            'expired' => 'Wygasły',
            'chargeback' => 'Chargeback',
            'completed' => 'Zakończone',
            'refunded' => 'Zwrócono',
            'error' => 'Błąd',
        ],
    ],

    'purchases' => [
        'title' => 'Zakupy',
    ],

    'settings' => [
        'title' => 'Ustawienia sklepu',
        'enable_home' => 'Włącz stronę główną sklepu',
        'home_message' => 'Wiadomość powitalna',
        'use_site_money' => 'Włącz zakupy z walutą witryny.',
        'use_site_money_info' => 'Po włączeniu pakietów w sklepie można kupić tylko za pieniądze na stronie internetowej. Aby użytkownicy mogli zasilić swoje konto, możesz skonfigurować oferty w sklepie.',
        'webhook' => 'Adres URL webhooka Discord',
        'webhook_info' => 'Kiedy użytkownik dokonuje płatności (z wyjątkiem zakupów za pomocą środków na stronie internetowej!), stworzy powiadomienie na tym webhooku. Pozostaw puste, aby wyłączyć.',
        'commands' => 'Globalne komendy',
        'recent_payments' => 'Limit ostatnich płatności do wyświetlenia na pasku bocznym (ustaw 0 aby wyłączyć)',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => 'Wyświetlaj najlepszego miesięcznego klienta na pasku bocznym',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Utworzono bramkę #:id',
            'updated' => 'Zaktualizowano bramkę #:id',
            'deleted' => 'Usunięto bramkę #:id',
        ],

        'shop-packages' => [
            'created' => 'Utworzono pakiet #:id',
            'updated' => 'Zaktualizowano pakiet #:id',
            'deleted' => 'Usunięto pakiet #:id',
        ],

        'shop-offers' => [
            'created' => 'Stworzono oferte #:id',
            'updated' => 'Zaktualizowano oferte #:id',
            'deleted' => 'Usunięto ofertę #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Used giftcard #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statystyki',
        'total' => 'Łącznie',
        'recent' => 'Ostatnie płatności',
        'count' => 'Liczba płatności',
        'estimated' => 'Szacowane zarobki',
        'month' => 'Płatności w tym miesiącu',
        'month_estimated' => 'Szacowane zarobki w tym miesiącu',
    ],

];
