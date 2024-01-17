<?php

return [
    'title' => 'Butik',
    'welcome' => 'Välkommen till butiken!',

    'buy' => 'Köpa',

    'free' => 'Gratis',

    'fields' => [
        'balance' => 'Saldo',
        'category' => 'Kategori',
        'code' => 'Rumskod',
        'commands' => 'Kommandon',
        'currency' => 'Valuta',
        'discount' => 'Rabatt',
        'expire_date' => 'Utgångsdatum',
        'gateways' => 'Gateways',
        'original_balance' => 'Ursprungligt saldo',
        'package' => 'Paket',
        'packages' => 'Paket',
        'payment_id' => 'Betalnings-ID',
        'payments' => 'Betalningar',
        'price' => 'Pris',
        'quantity' => 'Kvantitet',
        'required_packages' => 'Obligatoriska paket',
        'required_roles' => 'Nödvändig roll',
        'role' => 'Roll att ställa in efter köp',
        'servers' => 'Servrar',
        'start_date' => 'Startdatum',
        'status' => 'Status',
        'total' => 'Totalt',
        'user_id' => 'Användar-ID',
        'user_limit' => 'Inköpsgräns för användare',
    ],

    'actions' => [
        'duplicate' => 'Duplicera',
        'remove' => 'Ta bort',
    ],

    'goal' => [
        'title' => 'Månadens mål',
        'progress' => ':count% klart',
    ],

    'recent' => [
        'title' => 'Senaste betalningar',
        'empty' => 'Inga senaste betalningar',
    ],

    'top' => [
        'title' => 'Topp kund',
    ],

    'cart' => [
        'title' => 'Varukorg',
        'success' => 'Ditt köp har slutförts.',
        'guest' => 'Du måste vara inloggad för att göra ett köp.',
        'empty' => 'Din kundvagn är tom.',
        'checkout' => 'Kassa',
        'remove' => 'Ta bort',
        'clear' => 'Rensa varukorgen',
        'pay' => 'Betala',
        'back' => 'Tillbaka till butiken',
        'total' => 'Totalt: :total',
        'payable_total' => 'Totalt att betala: :total',
        'credit' => 'Kredit',

        'confirm' => [
            'title' => 'Betala?',
            'price' => 'Är du säker på att du vill köpa den här vagnen för :price.',
        ],

        'errors' => [
            'money' => 'Du har inte tillräckligt med pengar för att göra detta köp.',
            'execute' => 'Ett oväntat fel inträffade under betalningen, ditt köp fick återbetalning.',
        ],
    ],

    'coupons' => [
        'title' => 'Kuponger',
        'add' => 'Lägg till en kupong',
        'error' => 'Denna kupong finns inte, har löpt ut eller kan inte längre användas.',
        'cumulate' => 'Du kan inte använda denna kupong med en annan kupong.',
    ],

    'payment' => [
        'title' => 'Betalning',
        'manual' => 'Manuell betalning',

        'empty' => 'Inga betalningsmetoder är tillgängliga för närvarande.',

        'info' => 'Köp #:id på :website',
        'error' => 'Betalningen kunde inte slutföras.',

        'success' => 'Betalning slutförd, du kommer att få ditt köp i spelet på mindre än en minut.',

        'webhook' => 'Ny betalning i butiken',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Denna kategori är tom.',
    ],

    'packages' => [
        'limit' => 'Du har köpt det mesta möjliga för dessa paket.',
        'requirements' => 'Du har inga krav på att köpa detta paket.',
    ],

    'offers' => [
        'gateway' => 'Betalningssätt',
        'amount' => 'Belopp',

        'empty' => 'Inga erbjudanden är för närvarande tillgängliga.',
    ],

    'profile' => [
        'payments' => 'Betalningshistorik',
        'money' => 'Pengar: :balance',
    ],

    'giftcards' => [
        'title' => 'Presentkort',
        'success' => ':money har krediterats till ditt konto',
        'error' => 'Presentkortet finns inte, har löpt ut eller kan inte längre användas.',
        'add' => 'Lägg till ett presentkort',
        'notification' => 'Du fick ett presentkort, koden är :code (:balance).',
    ],
];
