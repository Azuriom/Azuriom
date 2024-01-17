<?php

return [
    'title' => 'Kauppa',
    'welcome' => 'Tervetuloa kauppaan!',

    'buy' => 'Osta',

    'free' => 'Ilmainen',

    'fields' => [
        'balance' => 'Balance',
        'category' => 'Kategoria',
        'code' => 'Koodi',
        'commands' => 'Komennot',
        'currency' => 'Valuutta',
        'discount' => 'Alennus',
        'expire_date' => 'Vanhenemispäivä',
        'gateways' => 'Maksutavat',
        'original_balance' => 'Original Balance',
        'package' => 'Tuote',
        'packages' => 'Tuotteet',
        'payment_id' => 'Maksutunnus',
        'payments' => 'Payments',
        'price' => 'Hinta',
        'quantity' => 'Määrä',
        'required_packages' => 'Vaaditut tuotteet',
        'required_roles' => 'Vaadittu rooli',
        'role' => 'Asetettu rooli oston jälkeen',
        'servers' => 'Palvelimet',
        'start_date' => 'Aloituspäivä',
        'status' => 'Tila',
        'total' => 'Yhteensä',
        'user_id' => 'Käyttäjätunniste',
        'user_limit' => 'Käyttäjän ostoraja',
    ],

    'actions' => [
        'duplicate' => 'Luo kopio',
        'remove' => 'Poista',
    ],

    'goal' => [
        'title' => 'Kuukauden tavoite',
        'progress' => ':count% valmis',
    ],

    'recent' => [
        'title' => 'Viimeaikaiset maksut',
        'empty' => 'Ei viimeaikaisia maksuja',
    ],

    'top' => [
        'title' => 'Top asiakas',
    ],

    'cart' => [
        'title' => 'Ostoskori',
        'success' => 'Ostoksesi on suoritettu onnistuneesti.',
        'guest' => 'Sinun täytyy olla kirjautunut sisään tehdäksesi ostoksen.',
        'empty' => 'Ostoskorisi on tyhjä.',
        'checkout' => 'Kassa',
        'remove' => 'Poista',
        'clear' => 'Tyhjennä ostoskori',
        'pay' => 'Maksa',
        'back' => 'Takaisin kauppaan',
        'total' => 'Yhteensä: :Total',
        'payable_total' => 'Total to pay: :total',
        'credit' => 'Krediitit',

        'confirm' => [
            'title' => 'Maksa?',
            'price' => 'Oletko varma, että haluat ostaa ostoskorisi tuotteet hintaan :price.',
        ],

        'errors' => [
            'money' => 'Sinulla ei ole riittävästi varoja suorittaaksesi ostoksen.',
            'execute' => 'Odottamaton virhe tapahtui maksun aikana, ostoksesi palautettiin.',
        ],
    ],

    'coupons' => [
        'title' => 'Alennuskoodi',
        'add' => 'Lisää kuponki',
        'error' => 'Tätä kuponkia ei ole joko olemassa, se on vanhentunut tai sitä ei voi enää käyttää.',
        'cumulate' => 'Tätä kuponkia ei voi käyttää toisen kupongin kanssa.',
    ],

    'payment' => [
        'title' => 'Maksu',
        'manual' => 'Manuaalinen maksu',

        'empty' => 'Maksutapoja ei ole tällä hetkellä saatavilla.',

        'info' => 'Osta #:id :website',
        'error' => 'Maksua ei voitu suorittaa.',

        'success' => 'Maksu suoritettu, saat ostoksesi pelissä alle minuutin kuluttua.',

        'webhook' => 'Uusi maksu kaupassa',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Kategoria on tyhjä.',
    ],

    'packages' => [
        'limit' => 'Olet ostanut enimmäismäärän tätä tuotetta.',
        'requirements' => 'Et täytä tarvittavia vaatimuksia ostaaksesi tämän tuotteen.',
    ],

    'offers' => [
        'gateway' => 'Maksutapa',
        'amount' => 'Määrä',

        'empty' => 'Tarjouksia ei ole tällä hetkellä saatavilla.',
    ],

    'profile' => [
        'payments' => 'Maksuhistoria',
        'money' => 'Varat: :balance',
    ],

    'giftcards' => [
        'title' => 'Giftcards',
        'success' => ':money on siirretty käyttäjätilillesi',
        'error' => 'Tätä lahjakorttia ei ole joko olemassa, se on vanhentunut tai sitä ei voi enää käyttää.',
        'add' => 'Add a gift card',
        'notification' => 'You received a giftcard, the code is :code (:balance).',
    ],
];
