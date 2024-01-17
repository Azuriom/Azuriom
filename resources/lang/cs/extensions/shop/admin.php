<?php

return [
    'nav' => [
        'title' => 'Obchod',
        'settings' => 'Nastavení',
        'packages' => 'Balíčky',
        'gateways' => 'Brány',
        'offers' => 'Akční nabídky',
        'coupons' => 'Kupóny',
        'giftcards' => 'Dárkové karty',
        'discounts' => 'Slevy',
        'payments' => 'Platby',
        'purchases' => 'Objednávky',
        'statistics' => 'Statistiky',
    ],

    'permissions' => [
        'admin' => 'Spravovat doplněk obchodu',
    ],

    'categories' => [
        'title' => 'Kategorie',
        'edit' => 'Upravit kategoriii :category',
        'create' => 'Vytvořit kategorii',

        'parent' => 'Nadřazená kategorie',
        'delete_error' => 'Kategorie s balíčky nemůže být odstraněna.',

        'cumulate' => 'Kumulovat nákupy v této kategorii',
        'cumulate_info' => 'Uživatelé, kteří si již zakoupili balíček v této kategorii, získají slevu a zaplatí pouze rozdíl při kupování dražšího balíčku.',
        'enable' => 'Povolit kategorii',
    ],

    'offers' => [
        'title' => 'Akční nabídky',
        'edit' => 'Upravit nabídku :offer',
        'create' => 'Vytvořit nabídku',

        'enable' => 'Povolit tuto nabídku',
    ],

    'coupons' => [
        'title' => 'Kupóny',
        'edit' => 'Upravit kupón :coupon',
        'create' => 'Vytvořit kupón',

        'global' => 'Měl by být kupón aktivní po celém obchodě?',
        'cumulate' => 'Povolit použití tohoto kupónu s jinými kupóny',
        'user_limit' => 'Limit uživatelů',
        'global_limit' => 'Globální limit',
        'active' => 'Aktivní',
        'usage' => 'V limitu používání',
        'enable' => 'Povolit kupón',
    ],

    'giftcards' => [
        'title' => 'Dárkové karty',
        'edit' => 'Upravit dárkovou kartu :giftcard',
        'create' => 'Vytvořit dárkovou kartu',

        'global_limit' => 'Globální limit',
        'active' => 'Aktivní',
        'enable' => 'Povolit dárkovou kartu',
    ],

    'discounts' => [
        'title' => 'Slevy',
        'edit' => 'Upravit slevu :discount',
        'create' => 'Vytvořit slevu',

        'global' => 'Měla by být sleva aktivní po celém obchodě?',
        'active' => 'Aktivní',
        'enable' => 'Povolit slevu',
    ],

    'packages' => [
        'title' => 'Balíčky',
        'edit' => 'Upravit baklíček :package',
        'create' => 'Vytvořit balíček',

        'updated' => 'Balíčky byly aktualizovány.',

        'money' => 'Peníze k udělení uživateli po nákupu',
        'giftcard' => 'Zůstatek dárkové karty pro vytvoření při nákupu',
        'command' => 'Příkaz nesmí začínat znakem <code>/</code>. Pro jméno hráče můžete použít <code>{player}</code>. Pro hry ze služby Steam můžete použít také <code>{steam_id}</code> a <code>{steam_id_32}</code>. Další dostupné proměnné jsou: :placeholders.',

        'custom_price' => 'Umožnit uživateli zvolit si cenu (cena balíčku poté bude minimem)',
        'require_online' => 'Vykonávání příkazů, když je uživatel online na serveru (dostupné pouze s AzLink)',
        'enable_quantity' => 'Povolit množství',

        'create_category' => 'Vytvořit kategorii',
        'create_package' => 'Vytvořit balíček',

        'enable' => 'Povolit tento balíček',
    ],

    'gateways' => [
        'title' => 'Brány',
        'edit' => 'Úprava brány :gateway',
        'create' => 'Přidat bránu',

        'current' => 'Současné brány',
        'add' => 'Přidat novou bránu',
        'info' => 'Pokud máte problémy s platbou při používání Cloudflare nebo firewallu, zkuste následovat kroky v <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">často kladených dotazech</a>.',

        'country' => 'Země',
        'sandbox' => 'Volný režim',
        'api-key' => 'Klíč API',
        'public-key' => 'Veřejný klíč',
        'private-key' => 'Soukromý klíč',
        'secret-key' => 'Tajný klíč',
        'endpoint-secret' => 'Podpisový klíč',
        'service-id' => 'ID služby',
        'client-id' => 'ID klienta',
        'merchant-id' => 'ID obchodníka',
        'project-id' => 'ID projektu',
        'env' => 'Prostředí',

        'paypal_email' => 'E-mailová adresa PayPal účtu',
        'paypal_info' => 'Ujistěte se, že zadáváte <strong>hlavní</strong> e-mailovou adresu účtu PayPal.',
        'paysafecard_info' => 'Abyste mohli přijímat platby pomocí paysafecard, musíte být <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">partnerem paysafecard</a>. Existují i další metody, ale pouze tato je povolená společností paysafecard.',
        'stripe_info' => 'Na nástěnce Stripe musíte nastavit URL webhooku na <code>:url</code> a vybrat událost <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'Na nástěnce PaymentWall musíte nastavit pingback URL na <code>:url</code>.',
        'xsolla' => 'Na nástěnce Xsolla musíte nastavit URL webhooku na <code>:url</code>, povolit \'Transaction external ID\' v nastavení \'Pay Station\', otestovat webhooky a poté povolit \'Checkout\' v nastavení \'Pay Station\'.',

        'enable' => 'Povolit bránu',
    ],

    'payments' => [
        'title' => 'Platby',
        'show' => 'Platba č. :payment',

        'info' => 'Informace o platbě',
        'items' => 'Zakoupené položky',

        'card' => 'Platby v obchodě',

        'status' => [
            'pending' => 'Nevyřízeno',
            'expired' => 'Expirováno',
            'chargeback' => 'Zpětné zúčtování',
            'completed' => 'Dokončeno',
            'refunded' => 'Vráceno',
            'error' => 'Chyba',
        ],
    ],

    'purchases' => [
        'title' => 'Objednávky',
    ],

    'settings' => [
        'title' => 'Nastavení obchodu',
        'enable_home' => 'Povolit domovskou stránku obchodu',
        'home_message' => 'Zpráva na domovské obrazovce',
        'use_site_money' => 'Povolit nákupy pomocí měny webu.',
        'use_site_money_info' => 'Pokud je povoleno, lze si balíčky v obchodě zakoupit pouze pomocí webových peněz. Aby si uživatelé mohli připsat peníze na svůj účet, můžete nastavit nabídky v obchodě.',
        'webhook' => 'URL Discord webhooku',
        'webhook_info' => 'Když uživatel vykoná platbu, bude vytvořeno oznámení na tento webhook. Ponechte prázdné pro zakázání',
        'commands' => 'Globální příkazy',
        'recent_payments' => 'Limit nedávných plateb k zobrazení v postranní liště (nastavte na 0 pro zakázání)',
        'display_amount' => 'Zobrazit útratu v nedávných platbách a nejlepšího zákazníka',
        'top_customer' => 'Zobrazit nejlepšího měsíčního zákazníka v postranní liště',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Vytvořena brána #:id',
            'updated' => 'Upravena brána #:id',
            'deleted' => 'Odstraněna brána #:id',
        ],

        'shop-packages' => [
            'created' => 'Vytvořen balíček #:id',
            'updated' => 'Upraven balíček #:id',
            'deleted' => 'Odstraněn balíček #:id',
        ],

        'shop-offers' => [
            'created' => 'Vytvořena nabídka #:id',
            'updated' => 'Upravena nabídka #:id',
            'deleted' => 'Odstraněna nabídka #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Použita dárková karta #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statistiky',
        'total' => 'Celkem',
        'recent' => 'Nedávné platby',
        'count' => 'Počet plateb',
        'estimated' => 'Odhadované příjmy',
        'month' => 'Platby během tohoto měsíce',
        'month_estimated' => 'Odhadované příjmy tento měsíc',
    ],

];
