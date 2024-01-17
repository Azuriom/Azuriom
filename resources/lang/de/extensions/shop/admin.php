<?php

return [
    'nav' => [
        'title' => 'Shop',
        'settings' => 'Einstellungen',
        'packages' => 'Pakete',
        'gateways' => 'Zahlungsmittel',
        'offers' => 'Angebote',
        'coupons' => 'Gutscheine',
        'giftcards' => 'Geschenkkarten',
        'discounts' => 'Rabatte',
        'payments' => 'Zahlungen',
        'purchases' => 'Einkäufe',
        'statistics' => 'Statistiken',
    ],

    'permissions' => [
        'admin' => 'Shop-Plugin verwalten',
    ],

    'categories' => [
        'title' => 'Kategorien',
        'edit' => 'Kategorie :category bearbeiten',
        'create' => 'Kategorie erstellen',

        'parent' => 'Übergeordnete Kategorie',
        'delete_error' => 'Eine Kategorie mit Paketen kann nicht gelöscht werden.',

        'cumulate' => 'Käufe in dieser Kategorie kumulieren',
        'cumulate_info' => 'Benutzer, die bereits ein Paket dieser Kategorie gekauft haben, erhalten einen Rabatt und zahlen beim Kauf eines teureren Pakets nur die Differenz.',
        'enable' => 'Kategorie aktivieren',
    ],

    'offers' => [
        'title' => 'Angebote',
        'edit' => 'Angebot :offer bearbeiten',
        'create' => 'Angebot erstellen',

        'enable' => 'Dieses Angebot aktivieren',
    ],

    'coupons' => [
        'title' => 'Gutscheine',
        'edit' => 'Gutschein :coupon bearbeiten',
        'create' => 'Gutschein erstellen',

        'global' => 'Soll der Gutschein im gesamten Shop aktiv sein?',
        'cumulate' => 'Erlauben, diesen Gutschein mit anderen Gutscheinen zu verwenden',
        'user_limit' => 'Benutzerlimit',
        'global_limit' => 'Globales Limit',
        'active' => 'Aktiv',
        'usage' => 'Unter Nutzungsgrenze',
        'enable' => 'Gutschein aktivieren',
    ],

    'giftcards' => [
        'title' => 'Geschenkkarten',
        'edit' => 'Die Geschenkkarte :giftcard bearbeiten',
        'create' => 'Eine Geschenkkarte erstellen',

        'global_limit' => 'Globale Grenze',
        'active' => 'Aktiv',
        'enable' => 'Geschenkkarte aktivieren',
    ],

    'discounts' => [
        'title' => 'Rabatte',
        'edit' => 'Rabatt :discount bearbeiten',
        'create' => 'Rabatt erstellen',

        'global' => 'Soll der Rabatt im gesamten Shop aktiv sein?',
        'active' => 'Aktiv',
        'enable' => 'Rabatt aktivieren',
    ],

    'packages' => [
        'title' => 'Pakete',
        'edit' => 'Paket :package bearbeiten',
        'create' => 'Paket erstellen',

        'updated' => 'Die Pakete wurden aktualisiert.',

        'money' => 'Geld, das der Nutzer nach dem Kauf erhält',
        'giftcard' => 'Guthaben der Geschenkkarte beim Kauf erstellen',
        'command' => 'Der Befehl darf nicht mit <code>/</code> beginnen. Du kannst <code>{player}</code> für den Spielernamen verwenden. Für Steam-Spiele kannst du zudem <code>{steam_id}</code> und <code>{steam_id_32}</code> verwenden. Die anderen verfügbaren Platzhalter sind: :Platzhalter.',

        'custom_price' => 'Erlaube dem Nutzer, den zu zahlenden Preis zu wählen (der Paketpreis ist dann das Minimum)',
        'require_online' => 'Befehle ausführen, wenn der Benutzer auf dem Server online ist (nur mit AzLink verfügbar)',
        'enable_quantity' => 'Menge aktivieren',

        'create_category' => 'Kategorie erstellen',
        'create_package' => 'Paket erstellen',

        'enable' => 'Paket aktivieren',
    ],

    'gateways' => [
        'title' => 'Gateways',
        'edit' => 'Gateway :gateway bearbeiten',
        'create' => 'Gateway hinzufügen',

        'current' => 'Aktuelle Gateways',
        'add' => 'Neues Gateway hinzufügen',
        'info' => 'Wenn du Probleme mit Zahlungen hast, wenn du Cloudflare oder eine Firewall verwendest, versuche es mit den Schritten in der <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'Land',
        'sandbox' => 'Testmodus',
        'api-key' => 'API-Schlüssel',
        'public-key' => 'Öffentlicher Schlüssel',
        'private-key' => 'Privater Schlüssel',
        'secret-key' => 'Geheimer Schlüssel',
        'endpoint-secret' => 'Unterzeichnung Geheimnis',
        'service-id' => 'Service-ID',
        'client-id' => 'Kunden-ID',
        'merchant-id' => 'Händler-ID',
        'project-id' => 'Projekt-ID',
        'env' => 'Umgebung',

        'paypal_email' => 'PayPal-E-Mail-Adresse',
        'paypal_info' => 'Bitte stelle sicher, dass du die <strong>Haupt</strong>-E-Mail-Adresse deines PayPal-Kontos eingibst.',
        'paysafecard_info' => 'Um Zahlungen per paysafecard akzeptieren zu können, musst Du <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard-Partner</a> sein. Es existieren andere Methoden, doch nur diese wird von paysafecard zugelassen.',
        'stripe_info' => 'Auf dem Stripe-Dashboard musst Du die Webhook-URL auf <code>:url</code> setzen und das Ereignis <code>checkout.session.completed</code> auswählen.',
        'paymentwall_info' => 'Auf dem PaymentWall-Dashboard musst Du die Pingback-URL auf <code>:url</code>.',
        'xsolla' => 'Im Xsolla-Dashboard musst du die Webhook-URL auf <code>:url</code> setzen, in den Einstellungen für \'Pay Station\' die Option \'Transaction external ID\' aktivieren, die Webhooks testen und dann in der \'Pay Station\' die Einstellungen für \'Checkout\' aktivieren.',

        'enable' => 'Gateway aktivieren',
    ],

    'payments' => [
        'title' => 'Zahlungen',
        'show' => 'Zahlung #:payment',

        'info' => 'Zahlungsinformationen',
        'items' => 'Gekaufte Artikel',

        'card' => 'Shop-Zahlungen',

        'status' => [
            'pending' => 'Ausstehend',
            'expired' => 'Abgelaufen',
            'chargeback' => 'Rückbuchung',
            'completed' => 'Abgeschlossen',
            'refunded' => 'Zurückerstattet',
            'error' => 'Fehler',
        ],
    ],

    'purchases' => [
        'title' => 'Einkäufe',
    ],

    'settings' => [
        'title' => 'Shop-Einstellungen',
        'enable_home' => 'Startseite des Shops aktivieren',
        'home_message' => 'Startseiten-Nachricht',
        'use_site_money' => 'Käufe mit der Site-Währung ermöglichen.',
        'use_site_money_info' => 'Wenn aktiviert, können die Pakete im Shop nur mit Website-Geld gekauft werden. Damit Nutzer ihr Konto gutschreiben können, kannst du Angebote im Shop einrichten.',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Wenn ein Benutzer eine Zahlung leistet, erstellt er eine Benachrichtigung auf diesem Webhook. Zum Deaktivieren leer lassen',
        'commands' => 'Globale Befehle',
        'recent_payments' => 'Limit für letzte Zahlungen zur Anzeige in der Seitenleiste (zum Deaktivieren auf 0 setzen)',
        'display_amount' => 'Anzeige der Ausgaben der letzten Zahlungen und des Top-Kunden',
        'top_customer' => 'Monatlichen Top-Kunden in der Seitenleiste anzeigen',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Gateway erstellt #:id',
            'updated' => 'Gateway aktualisiert #:id',
            'deleted' => 'Gateway gelöscht #:id',
        ],

        'shop-packages' => [
            'created' => 'Erstelltes Paket #:id',
            'updated' => 'Paket aktualisiert #:id',
            'deleted' => 'Paket gelöscht #:id',
        ],

        'shop-offers' => [
            'created' => 'Erstelltes Angebot #:id',
            'updated' => 'Aktualisierte Angebotsnummer #:id',
            'deleted' => 'Gelöschtes Angebot #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Verwendete Geschenkkarte #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statistiken',
        'total' => 'Gesamt',
        'recent' => 'Letzte Zahlungen',
        'count' => 'Anzahl Zahlungen',
        'estimated' => 'Geschätzte Einnahmen',
        'month' => 'Zahlungen in diesem Monat',
        'month_estimated' => 'Geschätzte Einnahmen in diesem Monat',
    ],

];
