<?php

return [
    'nav' => [
        'title' => 'Butik',
        'settings' => 'Inställningar',
        'packages' => 'Paket',
        'gateways' => 'Gateways',
        'offers' => 'Erbjudanden',
        'coupons' => 'Kuponger',
        'giftcards' => 'Presentkort',
        'discounts' => 'Rabatter',
        'payments' => 'Betalningar',
        'purchases' => 'Inköp',
        'statistics' => 'Statistik',
    ],

    'permissions' => [
        'admin' => 'Hantera butiksmodul',
    ],

    'categories' => [
        'title' => 'Kategorier',
        'edit' => 'Redigera kategori :category',
        'create' => 'Skapa kategori',

        'parent' => 'Överordnad kategori',
        'delete_error' => 'En kategori med paket kan inte tas bort.',

        'cumulate' => 'Samla inköp i denna kategori',
        'cumulate_info' => 'Användare som redan har köpt ett paket i denna kategori kommer att få en rabatt och kommer bara att betala skillnaden när de köper ett dyrare paket.',
        'enable' => 'Aktivera kategorin',
    ],

    'offers' => [
        'title' => 'Erbjudanden',
        'edit' => 'Redigera erbjudande:offer',
        'create' => 'Skapa erbjudande',

        'enable' => 'Aktivera detta erbjudande',
    ],

    'coupons' => [
        'title' => 'Kuponger',
        'edit' => 'Redigera kupong :coupon',
        'create' => 'Skapa kupong',

        'global' => 'Bör kupongen vara aktiv på hela butiken?',
        'cumulate' => 'Tillåt att använda denna kupong med andra kuponger',
        'user_limit' => 'Användargräns',
        'global_limit' => 'Global gräns',
        'active' => 'Aktiv',
        'usage' => 'Under usage limit',
        'enable' => 'Aktivera kupongen',
    ],

    'giftcards' => [
        'title' => 'Presentkort',
        'edit' => 'Redigera presentkortet :giftcard',
        'create' => 'Skapa ett presentkort',

        'global_limit' => 'Global gräns',
        'active' => 'Aktiv',
        'enable' => 'Aktivera presentkortet',
    ],

    'discounts' => [
        'title' => 'Rabatter',
        'edit' => 'Redigera rabatt :discount',
        'create' => 'Skapa rabatt',

        'global' => 'Ska rabatten vara aktiv på hela butiken?',
        'active' => 'Aktiv',
        'enable' => 'Aktivera rabatten',
    ],

    'packages' => [
        'title' => 'Paket',
        'edit' => 'Redigera paket :package',
        'create' => 'Skapa paket',

        'updated' => 'Paketen har uppdaterats.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Saldo av presentkortet att skapa under köpet',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Tillåt användaren att välja priset för att betala (paketpriset blir då det minsta)',
        'require_online' => 'Utför kommandon när användaren är online på servern (endast tillgänglig med AzLink)',
        'enable_quantity' => 'Aktivera kvantitet',

        'create_category' => 'Skapa kategori',
        'create_package' => 'Skapa paket',

        'enable' => 'Aktivera detta paket',
    ],

    'gateways' => [
        'title' => 'Gateways',
        'edit' => 'Redigera gateway :gateway',
        'create' => 'Lägg till gateway',

        'current' => 'Nuvarande gateways',
        'add' => 'Lägg till en ny gateway',
        'info' => 'Om du har problem med AzLink när du använder Cloudflare eller en brandvägg, prova att följa stegen i <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'Land',
        'sandbox' => 'Sandbox',
        'api-key' => 'API-nyckel',
        'public-key' => 'Publik nyckel',
        'private-key' => 'Privat nyckel',
        'secret-key' => 'Hemlig nyckel',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => 'Tjänst-ID',
        'client-id' => 'Klient-ID',
        'merchant-id' => 'Handlare-ID',
        'project-id' => 'Projekt-ID',
        'env' => 'Miljö',

        'paypal_email' => 'PayPal e-postadress',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'För att kunna ta emot betalningar med paysafecard måste du vara en <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard partner</a>. Andra metoder finns, men endast denna är tillåten av paysafecard.',
        'stripe_info' => 'På Stripe instrumentpanelen måste du ställa in webhook URL till <code>:url</code> och välj händelsen <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'På PaymentWall instrumentpanelen måste du ställa in pingback URL till <code>:url</code>.',
        'xsolla' => 'På Xsolla instrumentpanelen måste du ställa in webhook URL till <code>:url</code>, aktivera "Transaktions externa ID" i inställningarna för "Pay station", testa webbhookarna och aktivera sedan "Checkout" i inställningarna för "Pay Station".',

        'enable' => 'Aktivera gateway',
    ],

    'payments' => [
        'title' => 'Betalningar',
        'show' => 'Betalning #:payment',

        'info' => 'Betalningsinfo',
        'items' => 'Köpta artiklar',

        'card' => 'Handla betalningar',

        'status' => [
            'pending' => 'Väntar',
            'expired' => 'Utgått',
            'chargeback' => 'Återbetalning',
            'completed' => 'Slutförd',
            'refunded' => 'Refunded',
            'error' => 'Fel',
        ],
    ],

    'purchases' => [
        'title' => 'Inköp',
    ],

    'settings' => [
        'title' => 'Butikens inställningar',
        'enable_home' => 'Aktivera butikens hemsida',
        'home_message' => 'Hem meddelande',
        'use_site_money' => 'Aktivera köp med webbplatsens valuta.',
        'use_site_money_info' => 'När den är aktiverad kan paketen i butiken endast köpas med pengar från webbplatsen. För att användare ska kunna kreditera sitt konto kan du ställa in erbjudanden i butiken.',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'När en användare gör en betalning (förutom köp med pengar på webbplatsen!), kommer den att skapa ett meddelande på denna webhook. Lämna tomt för att inaktivera.',
        'commands' => 'Globala kommandon',
        'recent_payments' => 'Senaste betalningar gräns för att visas i sidofältet (satt till 0 för att inaktivera)',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => 'Visa toppkunder i sidofältet',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Skapad gateway #:id',
            'updated' => 'Uppdaterad gateway #:id',
            'deleted' => 'Borttagna gateway #:id',
        ],

        'shop-packages' => [
            'created' => 'Skapat paket #:id',
            'updated' => 'Uppdaterat paket #:id',
            'deleted' => 'Tog bort paket #:id',
        ],

        'shop-offers' => [
            'created' => 'Skapade erbjudande #:id',
            'updated' => 'Uppdaterat erbjudande #:id',
            'deleted' => 'Raderat erbjudande #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Använt presentkort #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statistik',
        'total' => 'Totalt',
        'recent' => 'Senaste betalningar',
        'count' => 'Antal betalningar',
        'estimated' => 'Beräknad lön',
        'month' => 'Betalningar under denna månad',
        'month_estimated' => 'Beräknad lön denna månad',
    ],

];
