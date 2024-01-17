<?php

return [
    'nav' => [
        'title' => 'Bolt',
        'settings' => 'Beállítások',
        'packages' => 'Csomagok',
        'gateways' => 'Fizetési módok',
        'offers' => 'Ajánlatok',
        'coupons' => 'Kuponok',
        'giftcards' => 'Ajándékkártyák',
        'discounts' => 'Kedvezmények',
        'payments' => 'Fizetések',
        'purchases' => 'Vásárlások',
        'statistics' => 'Statisztikák',
    ],

    'permissions' => [
        'admin' => 'Bolt plugin kezelése',
    ],

    'categories' => [
        'title' => 'Kategóriák',
        'edit' => ':category kategória szerkesztése',
        'create' => 'Kategória létrehozása',

        'parent' => 'Szülőkategória',
        'delete_error' => 'Azok a kategóriák amelyekben csomagok vannak nem törölhetőek.',

        'cumulate' => 'Összesített vásárlások ebben a kategóriában',
        'cumulate_info' => 'Azok a felhasználók, akik már vásároltak egy csomagot ebben a kategóriában, kedvezményt kapnak, és csak a különbözetet kell megfizetniük, ha drágább csomagot vásárolnak.
',
        'enable' => 'Kategória engedélyezése',
    ],

    'offers' => [
        'title' => 'Ajánlatok',
        'edit' => ':offer ajánlat szerkesztése',
        'create' => 'Ajánlat létrehozása',

        'enable' => 'Ajánlat engedélyezése',
    ],

    'coupons' => [
        'title' => 'Kuponok',
        'edit' => ':coupon kupon szerkesztése',
        'create' => 'Kupon létrehozás',

        'global' => 'A kupon legyen aktív az összes boltban ?',
        'cumulate' => 'Engedélyezi, hogy ezt a kupont más kuponokkal együtt használja fel',
        'user_limit' => 'Felhasználói korlát',
        'global_limit' => 'Globális korlát',
        'active' => 'Aktív',
        'usage' => 'Under usage limit',
        'enable' => 'Kupon engedélyezése',
    ],

    'giftcards' => [
        'title' => 'Ajándékkártyák',
        'edit' => ':giftcard ajándékkártya szerkesztése',
        'create' => 'Ajándékkártya létrehozása',

        'global_limit' => 'Globális korlát',
        'active' => 'Aktív',
        'enable' => 'Ajándékkártya engedélyezése',
    ],

    'discounts' => [
        'title' => 'Kedvezmények',
        'edit' => ':discount kedvezmény szerkesztése',
        'create' => 'Kedvezmény létrehozása',

        'global' => 'A kedvezménynek az összes boltban aktívnak kell lennie?',
        'active' => 'Aktív',
        'enable' => 'Kedvezmény engedélyezése',
    ],

    'packages' => [
        'title' => 'Csomagok',
        'edit' => ':package csomag szerkesztése',
        'create' => 'Csomag létrehozása',

        'updated' => 'Csomagok frissítve lettek.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Balance of the giftcard to create during the purchase',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Allow the user to choose the price to pay (the package price will then be the minimum)',
        'require_online' => 'Parancsok végrehajtása, amikor a felhasználó online van a szerveren (csak AzLink esetén elérhető)',
        'enable_quantity' => 'Engedélyezd a mennyiséget',

        'create_category' => 'Kategória létrehozása',
        'create_package' => 'Csomag létrehozása',

        'enable' => 'Csomag engedélyezése',
    ],

    'gateways' => [
        'title' => 'Fizetési módok',
        'edit' => ':gateway fizetési mód szerkesztése',
        'create' => 'Fizetési mód hozzáadása',

        'current' => 'Jelenlegi fizetési mód',
        'add' => 'Új fizetési mód hozzáadása',
        'info' => 'Ha a Cloudflare vagy tűzfal használata esetén problémái vannak a fizetésekkel, próbálja meg követni a <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>-ban található lépéseket.',

        'country' => 'Ország',
        'sandbox' => 'Sandbox',
        'api-key' => 'API kulcs',
        'public-key' => 'Nyilvános (Public) kulcs',
        'private-key' => 'Privát (Private) kulcs',
        'secret-key' => 'Titkos (Secret) kulcs',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => 'Szolgáltatás azonosító',
        'client-id' => 'Ügyfél azonosító',
        'merchant-id' => 'Kereskedő azonosító',
        'project-id' => 'Projekt azonosító',
        'env' => 'Környezet',

        'paypal_email' => 'PayPal e-mail cím',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'Ahhoz, hogy elfogadhasd a paysafecarddal történő fizetéseket, <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard partnernek</a> kell lenned. Léteznek más módszerek is, de a paysafecard csak ezt engedélyezi.',
        'stripe_info' => 'A Stripe kezelőfelületen be kell állítanod a webhook URL-címét a következőre: <code>:url</code>, és ki kell választanod a <code>checkout.session.completed</code> eseményt.',
        'paymentwall_info' => 'A PaymentWall kezelőfelületen a pingback URL címét a <code>:url</code> értékre kell beállítanod.',
        'xsolla' => 'Az Xsolla kezelőfelületen be kell állítanod a webhook URL-t <code>:url</code>-re, engedélyezni kell a "Tranzakció külső azonosítóját" a "Fizetőállomás" beállításoknál, tesztelni kell a webhookokat, majd engedélyezni kell a "Pénztár" opciót a "Fizetőállomás" beállításoknál.',

        'enable' => 'Fizetési mód engedélyezése',
    ],

    'payments' => [
        'title' => 'Fizetések',
        'show' => '#:payment fizetés',

        'info' => 'Fizetési információ',
        'items' => 'Vásárolt tárgyak',

        'card' => 'Bolti fizetések',

        'status' => [
            'pending' => 'Függő',
            'expired' => 'Lejárt',
            'chargeback' => 'Visszaterhelés',
            'completed' => 'Befejezett',
            'refunded' => 'Visszatérítve',
            'error' => 'Hiba',
        ],
    ],

    'purchases' => [
        'title' => 'Vásárlások',
    ],

    'settings' => [
        'title' => 'Bolt beállítások',
        'enable_home' => 'Kezdőlapon megjelenítés engedélyezése',
        'home_message' => 'Főoldal üzenet',
        'use_site_money' => 'Engedélyezd a vásárlást a webhely pénznemével.',
        'use_site_money_info' => 'Ha engedélyezve van, a boltban lévő csomagokat csak a weboldalon lévő pénzzel lehet megvásárolni. Annak érdekében, hogy a felhasználók jóváírják a számlájukat, ajánlatokat állíthat be a boltban.
',
        'webhook' => 'Discord Webhook URL-je',
        'webhook_info' => 'Amikor egy felhasználó fizetést végez, értesítést hoz létre ezen a webhookon. Üresen hagyva letiltod',
        'commands' => 'Globális parancsok',
        'recent_payments' => 'Legutóbbi fizetések limitje az oldalsávban való megjelenítéshez (0-ra állítva letiltható)
',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => 'Top havi ügyfél megjelenítése az oldalsávban',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => '#:id fizetési mód létrehozva',
            'updated' => '#:id fizetési mód frissítve',
            'deleted' => '#:id fizetési oldal törölve',
        ],

        'shop-packages' => [
            'created' => '#:id csomag létrehozva',
            'updated' => '#:id csomag frissítve',
            'deleted' => '#:id csomag törölve',
        ],

        'shop-offers' => [
            'created' => '#:id ajánlat létrehozva',
            'updated' => '#:id ajánlat frissítve',
            'deleted' => '#:id ajánlat törölve',
        ],

        'shop-giftcards' => [
            'used' => 'Used giftcard #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statisztikák',
        'total' => 'Összesen',
        'recent' => 'Legutóbbi kifizetések',
        'count' => 'Kifizetések száma',
        'estimated' => 'Becsült bevétel',
        'month' => 'Kifizetések ebben a hónapban',
        'month_estimated' => 'Becsült bevétel ebben a hónapban',
    ],

];
