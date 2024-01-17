<?php

return [
    'title' => 'Shop',
    'welcome' => 'Willkommen im Shop!',

    'buy' => 'Kaufen',

    'free' => 'Kostenlos',

    'fields' => [
        'balance' => 'Bilanz',
        'category' => 'Kategorie',
        'code' => 'Code',
        'commands' => 'Befehle',
        'currency' => 'Währung',
        'discount' => 'Rabatt',
        'expire_date' => 'Ablaufdatum',
        'gateways' => 'Zahlungsmittel',
        'original_balance' => 'Ursprüngliche Bilanz',
        'package' => 'Paket',
        'packages' => 'Pakete',
        'payment_id' => 'Zahlungs-ID',
        'payments' => 'Zahlungen',
        'price' => 'Preis',
        'quantity' => 'Anzahl',
        'required_packages' => 'Erforderliche Pakete',
        'required_roles' => 'Erforderliche Rolle',
        'role' => 'Nach Kauf zu setzende Rolle',
        'servers' => 'Server',
        'start_date' => 'Anfangsdatum',
        'status' => 'Status',
        'total' => 'Gesamt',
        'user_id' => 'Benutzer-ID',
        'user_limit' => 'Kauflimit für Benutzer',
    ],

    'actions' => [
        'duplicate' => 'Duplikat',
        'remove' => 'Entfernen',
    ],

    'goal' => [
        'title' => 'Ziel des Monats',
        'progress' => ':count% abgeschlossen',
    ],

    'recent' => [
        'title' => 'Letzte Zahlungen',
        'empty' => 'Keine kürzlichen Zahlungen',
    ],

    'top' => [
        'title' => 'Top Kunde',
    ],

    'cart' => [
        'title' => 'Warenkorb',
        'success' => 'Dein Kauf wurde erfolgreich abgeschlossen.',
        'guest' => 'Du musst angemeldet sein, um einen Kauf tätigen zu können.',
        'empty' => 'Dein Warenkorb ist leer.',
        'checkout' => 'Zur Kasse',
        'remove' => 'Entfernen',
        'clear' => 'Warenkorb leeren',
        'pay' => 'Zahlen',
        'back' => 'Zurück zum Shop',
        'total' => 'Gesamt: :total',
        'payable_total' => 'Zu zahlender Gesamtbetrag: :total',
        'credit' => 'Guthaben aufladen',

        'confirm' => [
            'title' => 'Bezahlen?',
            'price' => 'Bist Du sicher, dass Du diesen Wagen für :price kaufen möchtest.',
        ],

        'errors' => [
            'money' => 'Du hast nicht genug Guthaben, um diesen Kauf zu tätigen.',
            'execute' => 'Während der Zahlung ist ein unerwarteter Fehler aufgetreten, Dein Kauf wurde erstattet.',
        ],
    ],

    'coupons' => [
        'title' => 'Gutscheine',
        'add' => 'Gutschein hinzufügen',
        'error' => 'Dieser Gutschein existiert nicht, ist abgelaufen oder kann nicht mehr verwendet werden.',
        'cumulate' => 'Du kannst diesen Coupon nicht mit einem anderen Coupon verwenden.',
    ],

    'payment' => [
        'title' => 'Zahlung',
        'manual' => 'Manuelle Zahlung',

        'empty' => 'Derzeit sind keine Zahlungsmethoden verfügbar.',

        'info' => 'Kauf #:id auf :website',
        'error' => 'Die Zahlung konnte nicht abgeschlossen werden.',

        'success' => 'Nach Abschluss der Zahlung erhälst Du Deinen Kauf in weniger als einer Minute im Spiel.',

        'webhook' => 'Neue Zahlung im Shop',
        'webhook_info' => 'Gesamt: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Diese Kategorie ist leer.',
    ],

    'packages' => [
        'limit' => 'Du hast das maximal mögliche für diese Pakete gekauft.',
        'requirements' => 'Du hast nicht die Voraussetzungen, um dieses Paket zu kaufen.',
    ],

    'offers' => [
        'gateway' => 'Zahlungsart',
        'amount' => 'Menge',

        'empty' => 'Derzeit sind keine Angebote verfügbar.',
    ],

    'profile' => [
        'payments' => 'Deine Zahlungen',
        'money' => 'Guthaben: :balance',
    ],

    'giftcards' => [
        'title' => 'Geschenkkarten',
        'success' => ':money wurde Ihrem Konto gutgeschrieben',
        'error' => 'Dieser Gutschein existiert nicht, ist abgelaufen oder kann nicht mehr verwendet werden.',
        'add' => 'Eine Geschenkkarte hinzufügen',
        'notification' => 'Du hast eine Geschenkkarte erhalten, der Code lautet :code (:balance).',
    ],
];
