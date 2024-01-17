<?php

return [
    'payment' => [
        'subject' => 'Danke für Ihren Einkauf',
        'intro' => 'Vielen Dank :user für Ihren Kauf! Deine Zahlung wurde bestätigt und du erhältst deine Einkäufe in wenigen Minuten.',
        'total' => 'Gesamt: :total',
        'transaction' => 'Transaktions-ID: :transaction (:gateway)',
        'date' => 'Datum: :date',
    ],

    'giftcard' => [
        'subject' => 'Dein Geschenkkarten-Code',
        'intro' => 'Vielen Dank für deinen Einkauf! Dein Geschenkgutschein ist jetzt verfügbar.',
        'code' => 'Code: :code',
        'balance' => 'Kontostand: :balance',
    ],
];
