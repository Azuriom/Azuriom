<?php

return [
    'nav' => [
        'title' => 'Kauppa',
        'settings' => 'Asetukset',
        'packages' => 'Tuotteet',
        'gateways' => 'Maksutavat',
        'offers' => 'Tarjoukset',
        'coupons' => 'Alennuskupongit',
        'giftcards' => 'Lahjakortit',
        'discounts' => 'Alennukset',
        'payments' => 'Maksut',
        'purchases' => 'Ostot',
        'statistics' => 'Tilastot',
    ],

    'permissions' => [
        'admin' => 'Hallitse kauppa lisä-osaa',
    ],

    'categories' => [
        'title' => 'Kategoriat',
        'edit' => 'Muokkaa kategoriaa :category',
        'create' => 'Luo kategoria',

        'parent' => 'Isäntäkategoria',
        'delete_error' => 'Kategoriaa jossa on tuotteita, ei voi poistaa.',

        'cumulate' => 'Kumulatisoi ostokset tässä kategoriassa',
        'cumulate_info' => 'Käyttäjät, jotka ovat jo ostaneet paketin tässä kategoriassa saavat alennuksen ja maksavat ainoastaan erotuksen ostaessaan kalliimpaa pakettia.',
        'enable' => 'Ota kategoria käyttöön',
    ],

    'offers' => [
        'title' => 'Tarjoukset',
        'edit' => 'Muokkaa tarjousta :offer',
        'create' => 'Luo tarjous',

        'enable' => 'Ota tämä tarjous käyttöön',
    ],

    'coupons' => [
        'title' => 'Alennuskupongit',
        'edit' => 'Muokkaa alennuskuponkia :coupon',
        'create' => 'Luo alennuskuponki',

        'global' => 'Pitäisikö alennukuponki olla aktiivinen koko kaupassa?',
        'cumulate' => 'Salli käyttää tätä kuponkia muiden kuponkien kanssa',
        'user_limit' => 'Rajoitus käyttäjää kohden',
        'global_limit' => 'Yleinen käyttörajoitus',
        'active' => 'Aktiivinen',
        'usage' => 'Under usage limit',
        'enable' => 'Ota alennuskuponki käyttöön',
    ],

    'giftcards' => [
        'title' => 'Lahjakortit',
        'edit' => 'Muokkaa lahjakorttia :giftcard',
        'create' => 'Luo lahjakortti',

        'global_limit' => 'Yleinen käyttörajoitus',
        'active' => 'Aktiivinen',
        'enable' => 'Ota lahjakortti käyttöön',
    ],

    'discounts' => [
        'title' => 'Alennukset',
        'edit' => 'Muokkaa alennusta :discount',
        'create' => 'Luo alennus',

        'global' => 'Pitäisikö alennukuponki olla aktiivinen koko kaupassa?',
        'active' => 'Aktiivinen',
        'enable' => 'Ota alennus käyttöön',
    ],

    'packages' => [
        'title' => 'Tuotteet',
        'edit' => 'Muokkaa tuotetta :package',
        'create' => 'Luo tuote',

        'updated' => 'Tuotteet on päivitetty.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Balance of the giftcard to create during the purchase',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Allow the user to choose the price to pay (the package price will then be the minimum)',
        'require_online' => 'Suorita komentoja, kun käyttäjä on paikalla palvelimella (käytettävissä vain AzLinkin kanssa)',
        'enable_quantity' => 'Ota määrä käyttöön',

        'create_category' => 'Luo kategoria',
        'create_package' => 'Luo tuote',

        'enable' => 'Ota käyttöön tämä tuote',
    ],

    'gateways' => [
        'title' => 'Maksutavat',
        'edit' => 'Muokkaa :gateway maksutapaa',
        'create' => 'Lisää maksutapa',

        'current' => 'Nykyiset maksutavat',
        'add' => 'Lisää uusi maksutapa',
        'info' => 'Jos sinulla on ongelmia maksujen kanssa Cloudflarea tai palomuuria käytettäessä, yritä seurata <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a> -ohjeita.',

        'country' => 'Maa',
        'sandbox' => 'Hiekkalaatikko',
        'api-key' => 'API-avain',
        'public-key' => 'Julkinen avain',
        'private-key' => 'Yksityinen avain',
        'secret-key' => 'Salainen avain',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => 'Palvelun tunnus',
        'client-id' => 'Asiakastunnus',
        'merchant-id' => 'Kauppiastunnus',
        'project-id' => 'Projektitunnus',
        'env' => 'Ympäristö',

        'paypal_email' => 'PayPal sähköpostiosoite',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'Jotta voit hyväksyä paysafecardin maksut, sinun täytyy olla <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard kumppani</a>. Muita menetelmiä on olemassa, mutta vain tämä on paysafecard:in sallima.',
        'stripe_info' => 'Stripe:n hallintapaneelissa sinun täytyy asettaa webhook URL osoitteeksi <code>:url</code> ja valita tapahtuma <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'PaymentWall:in hallintapaneelissa sinun täytyy asettaa pingback URL osoitteeksi <code>:url</code>.',
        'xsolla' => 'Xsolla:n hallintapaneelissa sinun täytyy asettaa webhookin URL osoitteeksi <code>:url</code>, Ota \'Transaction external ID\' käyttöön \'Pay station\' -asetuksissa, testaa webhookit ja ota \'Checkout\' käyttöön \'Pay Station\' -asetuksista.',

        'enable' => 'Ota maksutapa käyttöön',
    ],

    'payments' => [
        'title' => 'Maksut',
        'show' => 'Maksu #:payment',

        'info' => 'Maksutiedot',
        'items' => 'Ostetut kohteet',

        'card' => 'Kaupan maksut',

        'status' => [
            'pending' => 'Odottaa',
            'expired' => 'Vanhentunut',
            'chargeback' => 'Takaisinveloitus',
            'completed' => 'Suoritettu',
            'refunded' => 'Hyvitetty',
            'error' => 'Virhe',
        ],
    ],

    'purchases' => [
        'title' => 'Ostot',
    ],

    'settings' => [
        'title' => 'Kaupan asetukset',
        'enable_home' => 'Ota kaupan kotisivu käyttöön',
        'home_message' => 'Koti viesti',
        'use_site_money' => 'Ota käyttöön ostokset sivuston valuutalla.',
        'use_site_money_info' => 'Kun käytössä, kaupassa olevat tuotteet voidaan ostaa vain tämän verkkosivuston valuutalla (krediiteillä". Muista lisätä Tarjoukset kohtaan yksi tai useampi tuote, jotta asiakkaat voivat ostaa sivun omaa valuuttaa (krediittejä).',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Kun käyttäjä suorittaa maksun (lukuun ottamatta ostoksia sivuston valuutalla), se luo ilmoituksen tälle webhookille. Jätä tyhjäksi poistaaksesi käytöstä.',
        'commands' => 'Yleiset komennot',
        'recent_payments' => 'Viimeaikaiset maksut määräraja sivupalkissa (aseta 0 poistaaksesi käytöstä)',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => 'Näytä kuukausittainen top asiakas sivupalkissa',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Maksutapa #:id luotu',
            'updated' => 'Maksutapa #:id päivitetty',
            'deleted' => 'Maksutapa #:id poistettu',
        ],

        'shop-packages' => [
            'created' => 'Tuote #:id luotu',
            'updated' => 'Tuote #:id päivitetty',
            'deleted' => 'Tuote #:id poistettu',
        ],

        'shop-offers' => [
            'created' => 'Tarjous #:id luotu',
            'updated' => 'Tarjous #:id päivitetty',
            'deleted' => 'Tarjous #:id poistettu',
        ],

        'shop-giftcards' => [
            'used' => 'Used giftcard #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Tilastot',
        'total' => 'Yhteensä',
        'recent' => 'Viimeaikaiset maksut',
        'count' => 'Maksujen määrä',
        'estimated' => 'Arvioidut ansiot',
        'month' => 'Maksut tämän kuukauden aikana',
        'month_estimated' => 'Arvioidut ansiot tässä kuussa',
    ],

];
