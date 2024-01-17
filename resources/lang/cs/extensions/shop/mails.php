<?php

return [
    'payment' => [
        'subject' => 'Děkujeme za váš nákup',
        'intro' => 'Děkujeme za váš nákup, :user! Vaše platba byla potvrzena a za několik minut obdržíte váš nákup.',
        'total' => 'Celkem: :total',
        'transaction' => 'ID transakce: :transaction (:gateway)',
        'date' => 'Datum: :date',
    ],

    'giftcard' => [
        'subject' => 'Kód dárkového poukazu',
        'intro' => 'Děkujeme za váš nákup! Váš dárkový poukaz je nyní k dispozici.',
        'code' => 'Kód: :code',
        'balance' => 'Zůstatek: :balance',
    ],
];
