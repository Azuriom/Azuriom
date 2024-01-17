<?php

return [
    'title' => 'Sklep',
    'welcome' => 'Witaj w sklepie!',

    'buy' => 'Kup',

    'free' => 'Darmowy',

    'fields' => [
        'balance' => 'Balance',
        'category' => 'Kategoria',
        'code' => 'Kod',
        'commands' => 'Komendy',
        'currency' => 'Waluta',
        'discount' => 'Zniżka',
        'expire_date' => 'Data ważności',
        'gateways' => 'Bramki',
        'original_balance' => 'Original Balance',
        'package' => 'Pakiet',
        'packages' => 'Pakiety',
        'payment_id' => 'ID płatności',
        'payments' => 'Payments',
        'price' => 'Cena',
        'quantity' => 'Ilość',
        'required_packages' => 'Wymagane pakiety',
        'required_roles' => 'Wymagana rola',
        'role' => 'Ustawienie roli po zakupie',
        'servers' => 'Serwery',
        'start_date' => 'Data rozpoczęcia',
        'status' => 'Status',
        'total' => 'Łącznie',
        'user_id' => 'ID użytkownika',
        'user_limit' => 'Limit zakupów użytkownika',
    ],

    'actions' => [
        'duplicate' => 'Duplikuj',
        'remove' => 'Usunąć',
    ],

    'goal' => [
        'title' => 'Cel miesiąca',
        'progress' => ':count% ukończone',
    ],

    'recent' => [
        'title' => 'Ostatnie płatności',
        'empty' => 'Brak ostatnich płatności',
    ],

    'top' => [
        'title' => 'Najlepszy klient',
    ],

    'cart' => [
        'title' => 'Wózek',
        'success' => 'Twój zakup został ukończony pomyślnie.',
        'guest' => 'Musisz być zalogowany, aby dokonać zakupu.',
        'empty' => 'Twój koszyk jest pusty.',
        'checkout' => 'Kasa',
        'remove' => 'Usunąć',
        'clear' => 'Wyczyść koszyk',
        'pay' => 'Zapłać',
        'back' => 'Wróć do sklepu',
        'total' => 'Łącznie: :total',
        'payable_total' => 'Total to pay: :total',
        'credit' => 'Kredyt',

        'confirm' => [
            'title' => 'Zapłacić?',
            'price' => 'Czy na pewno chcesz to zakupić za :price',
        ],

        'errors' => [
            'money' => 'Nie masz wystarczającej ilości środków na dokonanie tego zakupu.',
            'execute' => 'Wystąpił nieznany błąd podczas płatności, a Twój zakup został odwołany.',
        ],
    ],

    'coupons' => [
        'title' => 'Kupony',
        'add' => 'Dodaj kupon',
        'error' => 'Taki kupon nie istnieje, stracił ważność lub nie może być już użyty.',
        'cumulate' => 'Tego kuponu nie można łączyć z innymi.',
    ],

    'payment' => [
        'title' => 'Zapłata',
        'manual' => 'Płatność ręczna',

        'empty' => 'Obecnie brak dostępnych metod płatności.',

        'info' => 'Kupiono #:id na :website',
        'error' => 'Nie udało się zrealizować płatności.',

        'success' => 'Płatność zakończona, zakupy w grze w ciągu mniej niż minuty.',

        'webhook' => 'Nowa płatność w sklepie',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Ta kategoria jest pusta.',
    ],

    'packages' => [
        'limit' => 'Kupiłeś maksymalnie możliwe dla tych pakietów.',
        'requirements' => 'Nie posiadasz uprawnień do zakupu tego pakietu.',
    ],

    'offers' => [
        'gateway' => 'Rodzaj płatności',
        'amount' => 'Kwota',

        'empty' => 'Obecnie nie są dostępne żadne oferty.',
    ],

    'profile' => [
        'payments' => 'Twoje płatności',
        'money' => 'Pieniądze: :balance',
    ],

    'giftcards' => [
        'title' => 'Giftcards',
        'success' => ':money zostało przelane na twoje konto',
        'error' => 'Ta karta podarunkowa nie istnieje, straciła ważność lub jest wykorzystana.',
        'add' => 'Add a gift card',
        'notification' => 'You received a giftcard, the code is :code (:balance).',
    ],
];
