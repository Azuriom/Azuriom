<?php

return [
    'nav' => [
        'title' => 'Toko',
        'settings' => 'Pengaturan',
        'packages' => 'Paket',
        'gateways' => 'Gateaway',
        'offers' => 'Promo',
        'coupons' => 'Kupon',
        'giftcards' => 'Gift Card',
        'discounts' => 'Diskon',
        'payments' => 'Pembayaran',
        'purchases' => 'Pembelian',
        'statistics' => 'Statistik',
    ],

    'permissions' => [
        'admin' => 'Kelola plugin shop',
    ],

    'categories' => [
        'title' => 'Kategori',
        'edit' => 'Edit kategori :category',
        'create' => 'Buat kategori',

        'parent' => 'Induk Kategori',
        'delete_error' => 'Kategori dengan paket tidak dapat dihapus.',

        'cumulate' => 'Hitung pembelian di kategori ini',
        'cumulate_info' => 'User yang sudah membeli paket pada kategori ini akan mendapatkan diskon dan hanya akan membayar selisih jika pembelian paket lebih mahal.',
        'enable' => 'Aktifkan kategori',
    ],

    'offers' => [
        'title' => 'Promo',
        'edit' => 'Edit promo :offer',
        'create' => 'Buat promo',

        'enable' => 'Aktifkan promo ini',
    ],

    'coupons' => [
        'title' => 'Kupon',
        'edit' => 'Edit kupon :coupon',
        'create' => 'Buat kupon',

        'global' => 'Haruskah kupon aktif di semua toko?',
        'cumulate' => 'Ijinkan menggunakan kupon ini dengan kupon lainnya',
        'user_limit' => 'Batas pengguna',
        'global_limit' => 'Batas global',
        'active' => 'Aktif',
        'usage' => 'Under usage limit',
        'enable' => 'Aktifkan kupon',
    ],

    'giftcards' => [
        'title' => 'Gift Card',
        'edit' => 'Edit gift card :giftcard',
        'create' => 'Buat gift card',

        'global_limit' => 'Limitasi Global',
        'active' => 'Aktif',
        'enable' => 'Aktifkan gift card',
    ],

    'discounts' => [
        'title' => 'Diskon',
        'edit' => 'Edit diskon :discount',
        'create' => 'Buat diskon',

        'global' => 'Apakah diskon harus aktif di semua toko?',
        'active' => 'Aktif',
        'enable' => 'Aktifkan diskon',
    ],

    'packages' => [
        'title' => 'Paket',
        'edit' => 'Edit paket :package',
        'create' => 'Buat paket',

        'updated' => 'Paket telah di perbarui.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Balance of the giftcard to create during the purchase',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Allow the user to choose the price to pay (the package price will then be the minimum)',
        'require_online' => 'Jalankan perintah saat pengguna online di server (hanya tersedia dengan AzLink)',
        'enable_quantity' => 'Aktifkan Qty',

        'create_category' => 'Buat kategori',
        'create_package' => 'Buat paket',

        'enable' => 'Aktifkan paket ini',
    ],

    'gateways' => [
        'title' => 'Gateaway',
        'edit' => 'Edit gateway :gateway',
        'create' => 'Tambah gateway',

        'current' => 'Gateway sekarang',
        'add' => 'Tambah gateway baru',
        'info' => 'Jika kamu mendapati masalah dengan pembayaran ketika memakai Cloudflare atau firewall, coba ikuti beberapa langkah pada <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'Negara',
        'sandbox' => 'Sandbox',
        'api-key' => 'API key',
        'public-key' => 'Public key',
        'private-key' => 'Private key',
        'secret-key' => 'Secret key',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => 'Service ID',
        'client-id' => 'Client ID',
        'merchant-id' => 'Merchant ID',
        'project-id' => 'Project ID',
        'env' => 'Environment',

        'paypal_email' => 'Alamat Email PayPal',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'Untuk dapat menerima pembayaran dengan paysafecard, kamu harus menjadi <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">mitra paysafecard</a>. Ada metode lain tetapi hanya metode ini yang diizinkan oleh paysafecard.',
        'stripe_info' => 'Di dasbor Stripe kamu perlu mengatur URL webhook ke <code>:url</code> dan pilih event tersebut <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'Di dasbor PaymentWall kamu perlu mengatur URL pingback ke <code>:url</code>.',
        'xsolla' => 'Di dasbor Xsolla kamu perlu mengatur URL webhook ke <code>:url</code>, aktifkan \'Transaction external ID\' di pengaturan \'Pay station\', uji coba webhooks dan aktifkan \'Checkout di pengaturan \'Pay Station\'.',

        'enable' => 'Aktifkan gateway',
    ],

    'payments' => [
        'title' => 'Pembayaran',
        'show' => 'Pembayaran #:payment',

        'info' => 'Informasi pembayaran',
        'items' => 'Item yang dibeli',

        'card' => 'Pembayaran toko',

        'status' => [
            'pending' => 'Tertunda',
            'expired' => 'Kadaluwarsa',
            'chargeback' => 'Chargeback',
            'completed' => 'Selesai',
            'refunded' => 'Dikembalikan',
            'error' => 'Error',
        ],
    ],

    'purchases' => [
        'title' => 'Pembelian',
    ],

    'settings' => [
        'title' => 'Pengaturan toko',
        'enable_home' => 'Aktifkan halaman depan toko',
        'home_message' => 'Pesan halaman depan',
        'use_site_money' => 'Aktifkan pembelian dengan mata uang website.',
        'use_site_money_info' => 'Jika aktif, paket pada toko akan hanya bisa dibeli menggunakan uang virtual. Untuk meminta user memiliki saldo di akun mereka, kamu bisa memberikan penawaran di toko.',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'Saat pengguna melakukan pembayaran, notifikasi akan dibuat di webhook ini. Biarkan kosong untuk menonaktifkan',
        'commands' => 'Perintah global',
        'recent_payments' => 'Limit tampilan pembayaran terakhir di sidear (set ke 0 untuk menonaktifkan)',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => 'Tampilkan top user bulanan pada sidebar',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Gateway dibuat #:id',
            'updated' => 'Gateway diperbarui #:id',
            'deleted' => 'Gateway dihapus #:id',
        ],

        'shop-packages' => [
            'created' => 'Paket dibuat #:id',
            'updated' => 'Paket diperbarui #:id',
            'deleted' => 'Paket dihapus #:id',
        ],

        'shop-offers' => [
            'created' => 'Promo dibuat #:id',
            'updated' => 'Promo diperbarui #:id',
            'deleted' => 'Promo dihapus #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Used giftcard #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Statistik',
        'total' => 'Jumlah',
        'recent' => 'Pembayaran terakhir',
        'count' => 'Jumlah pembayaran',
        'estimated' => 'Perkiraan pendapatan',
        'month' => 'Pembayaran selama bulan ini',
        'month_estimated' => 'Estimasi penghasilan bulan ini',
    ],

];
