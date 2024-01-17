<?php

return [
    'title' => 'Obchod',
    'welcome' => 'Vítejte v obchodě!',

    'buy' => 'Zakoupit',

    'free' => 'Zdarma',

    'fields' => [
        'balance' => 'Zůstatek',
        'category' => 'Kategorie',
        'code' => 'Kód',
        'commands' => 'Příkazy',
        'currency' => 'Měna',
        'discount' => 'Sleva',
        'expire_date' => 'Platnost do',
        'gateways' => 'Brány',
        'original_balance' => 'Původní zůstatek',
        'package' => 'Balíček',
        'packages' => 'Balíčky',
        'payment_id' => 'ID platby',
        'payments' => 'Platby',
        'price' => 'Cena',
        'quantity' => 'Množství',
        'required_packages' => 'Vyžadované balíčky',
        'required_roles' => 'Požadovaná role',
        'role' => 'Role k nastavení po nákupu',
        'servers' => 'Servery',
        'start_date' => 'Platnost od',
        'status' => 'Stav',
        'total' => 'Celkem',
        'user_id' => 'ID uživatele',
        'user_limit' => 'Limit nákupů uživatele',
    ],

    'actions' => [
        'duplicate' => 'Kopírovat',
        'remove' => 'Odebrat',
    ],

    'goal' => [
        'title' => 'Cíl měsíce',
        'progress' => ':count% dokončeno',
    ],

    'recent' => [
        'title' => 'Nedávné platby',
        'empty' => 'Žádné nedávné platby',
    ],

    'top' => [
        'title' => 'Nejlepší zákazník',
    ],

    'cart' => [
        'title' => 'Košík',
        'success' => 'Vaše platba byla úspěšně dokončena.',
        'guest' => 'Pro nákup musíte být přihlášeni.',
        'empty' => 'Váš košík je prázdný.',
        'checkout' => 'Platba',
        'remove' => 'Odebrat',
        'clear' => 'Vymazat košík',
        'pay' => 'Zaplatit',
        'back' => 'Zpět do obchodu',
        'total' => 'Celkem: :total',
        'payable_total' => 'Celkem k platbě: :total',
        'credit' => 'Připsat',

        'confirm' => [
            'title' => 'Zaplatit?',
            'price' => 'Opravdu si chcete koupit obsah tohoto košíku za :price?',
        ],

        'errors' => [
            'money' => 'Nemáte dostatek peněz pro tento nákup.',
            'execute' => 'Při platbě došlo k neočekávané chybě, váš nákup byl vrácen.',
        ],
    ],

    'coupons' => [
        'title' => 'Kupóny',
        'add' => 'Přidat kupón',
        'error' => 'Tento kupón neexistuje, vypršel nebo již nemůže být použit.',
        'cumulate' => 'Tento kupón nelze použít s dalším kupónem.',
    ],

    'payment' => [
        'title' => 'Platba',
        'manual' => 'Manuální platba',

        'empty' => 'V současné době nejsou dostupné žádné platební metody.',

        'info' => 'Nákup #:id na :website',
        'error' => 'Platba nemohla být dokončena.',

        'success' => 'Platba byla dokončena, nákup byste měli obdržet ve hře do minuty.',

        'webhook' => 'Nová platba v obchodě',
        'webhook_info' => 'Celkem: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Tato kategorie je prázdná.',
    ],

    'packages' => [
        'limit' => 'Zakoupili jste si maximální možné množství těchto balíčků.',
        'requirements' => 'Nesplňujete požadavky k zakoupení tohoto balíčku.',
    ],

    'offers' => [
        'gateway' => 'Typ platby',
        'amount' => 'Částka',

        'empty' => 'Momentálně nejsou dostupné žádné nabídky.',
    ],

    'profile' => [
        'payments' => 'Vaše platby',
        'money' => 'Peníze: :balance',
    ],

    'giftcards' => [
        'title' => 'Dárkové karty',
        'success' => 'Na váš účet bylo připsáno :money',
        'error' => 'Tato dárková karta neexistuje, vypršela nebo již nemůže být použita.',
        'add' => 'Přidat dárkovou kartu',
        'notification' => 'Obdrželi jste dárkovou kartu, její kód je :code (:balance).',
    ],
];
