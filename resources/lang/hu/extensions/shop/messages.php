<?php

return [
    'title' => 'Bolt',
    'welcome' => 'Üdvözlünk a boltban!',

    'buy' => 'Vásárlás',

    'free' => 'Ingyenes',

    'fields' => [
        'balance' => 'Balance',
        'category' => 'Kategória',
        'code' => 'Kód',
        'commands' => 'Parancsok',
        'currency' => 'Pénznem',
        'discount' => 'Kedvezmény',
        'expire_date' => 'Lejárati dátum',
        'gateways' => 'Fizetési módok',
        'original_balance' => 'Original Balance',
        'package' => 'Csomag',
        'packages' => 'Csomagok',
        'payment_id' => 'Fizetési azonosító',
        'payments' => 'Payments',
        'price' => 'Ár',
        'quantity' => 'Mennyiség',
        'required_packages' => 'Szükséges csomagok',
        'required_roles' => 'Szükséges rang',
        'role' => 'A vásárlás után beállítandó rang',
        'servers' => 'Szerverek',
        'start_date' => 'Kezdő dátum',
        'status' => 'Státusz',
        'total' => 'Összesen',
        'user_id' => 'Felhasználói azonosító',
        'user_limit' => 'Felhasználói vásárlási limit',
    ],

    'actions' => [
        'duplicate' => 'Duplikálás',
        'remove' => 'Eltávolítás',
    ],

    'goal' => [
        'title' => 'Havi cél',
        'progress' => ':count% kész',
    ],

    'recent' => [
        'title' => 'Legutóbbi kifizetések',
        'empty' => 'Nincsenek friss kifizetések
',
    ],

    'top' => [
        'title' => 'Legjobb vásárló
',
    ],

    'cart' => [
        'title' => 'Kosár',
        'success' => 'Vásárlása sikeresen befejeződött.',
        'guest' => 'Be kell jelentkeznek, hogy vásárolhass.',
        'empty' => 'Üres a kosarad.',
        'checkout' => 'Fizetés',
        'remove' => 'Eltávolítás',
        'clear' => 'Kosár kiürítése',
        'pay' => 'Fizetés',
        'back' => 'Vissza a bolthoz',
        'total' => 'Összesen: :total',
        'payable_total' => 'Total to pay: :total',
        'credit' => 'Kredit',

        'confirm' => [
            'title' => 'Fizetés?',
            'price' => 'Biztos vagy benne, hogy meg akarod venni ezt a kosarat :price-ért?',
        ],

        'errors' => [
            'money' => 'Nincs elég pénzed a vásárláshoz.',
            'execute' => 'Váratlan hiba történt a fizetés során, a vásárlásodat visszatérítettük.',
        ],
    ],

    'coupons' => [
        'title' => 'Kuponok',
        'add' => 'Kupon hozzáadása',
        'error' => 'Ez a kupon nem létezik, lejárt vagy már nem használható fel.',
        'cumulate' => 'Ez a kupon nem használható fel más kuponnal együtt.',
    ],

    'payment' => [
        'title' => 'Fizetés',
        'manual' => 'Manuális fizetés',

        'empty' => 'Nincs elérhető fizetési mód.',

        'info' => 'Vásárlás #:id a :website oldalon',
        'error' => 'A kifizetést nem lehetett teljesíteni.',

        'success' => 'A fizetés befejeződött, és kevesebb mint egy percen belül megkapod a vásárlásodat a játékban.',

        'webhook' => 'Új fizetés a boltban',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Ez a kategória üres.',
    ],

    'packages' => [
        'limit' => 'A lehető legtöbbet vásároltad meg ehhez a csomaghoz.',
        'requirements' => 'A csomag megvásárlásához nincsenek meg a szükséges feltételek.',
    ],

    'offers' => [
        'gateway' => 'Fizetés típusa',
        'amount' => 'Összeg',

        'empty' => 'Jelenleg nem állnak rendelkezésre ajánlatok.',
    ],

    'profile' => [
        'payments' => 'Kifizetéseid',
        'money' => 'Egyenleged: :balance',
    ],

    'giftcards' => [
        'title' => 'Giftcards',
        'success' => ':money jóváírtunk a fiókodon',
        'error' => 'Ez az ajándékkártya nem létezik, lejárt vagy már nem használható fel.',
        'add' => 'Add a gift card',
        'notification' => 'You received a giftcard, the code is :code (:balance).',
    ],
];
