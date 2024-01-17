<?php

return [
    'nav' => [
        'title' => 'Oyla',
        'settings' => 'Ayarlar',
        'sites' => 'Siteler',
        'rewards' => 'Ödüller',
        'votes' => 'Oylar',
    ],

    'permission' => 'Oy eklentisini yönet',

    'settings' => [
        'title' => 'Oylama sayfası ayarları',

        'count' => 'En çok Oynayanlar Sayısı',
        'display-rewards' => 'Oylama sayfasında ödülleri göster',
        'ip_compatibility' => 'IPv4/IPv6 uyumluluğunu etkinleştirin',
        'ip_compatibility_info' => 'Bu seçenek, siteniz IPv6 kabul ederken IPv6 kabul etmeyen oylama sitelerinde doğrulanmayan oyları düzeltmenize veya tam tersini yapmanıza olanak tanır.',
        'commands' => 'Global komutlar',
    ],

    'sites' => [
        'title' => 'Siteler',
        'edit' => 'Siteyi düzenle :site',
        'create' => 'Site oluştur',

        'enable' => 'Siteyi aktifleştir',
        'delay' => 'Oylar arasındaki gecikme',
        'minutes' => 'dakika',

        'list' => 'Oyların doğrulanabileceği siteler',
        'variable' => 'Oyuncu ismini kullanmak için <code>{player}</code> kullanabilirsin.',

        'verifications' => [
            'title' => 'Doğrulama',
            'enable' => 'Oy doğrulamasını etkinleştirin',

            'disabled' => 'Bu web sitesindeki oylar doğrulanmayacaktır.',
            'auto' => 'Bu sitedeki oylar otomatik olarak doğrulanacaktır.',
            'input' => 'Bu web sitesindeki oylar, aşağıdaki giriş doldurulduğunda doğrulanacaktır.',

            'pingback' => 'Pingback Bağlantısı: :url',
            'secret' => 'Gizli anahtar',
            'server_id' => 'Sunucu Kimliği',
            'token' => 'Token',
            'api_key' => 'API anahtarı',
        ],
    ],

    'rewards' => [
        'title' => 'Ödüller',
        'edit' => 'Ödülü düzenle :reward',
        'create' => 'Ödül oluştur',

        'require_online' => 'Kullanıcı sunucuda çevrimiçi olduğunda komutları çalıştırma (yalnızca AzLink ile kullanılabilir)',
        'enable' => 'Ödülü aktifleştir',

        'commands' => 'Oyuncu ismi için <code>{player}</code>, ödül için <code>{reward}</code> ve oy sitesi için <code>{site}</code> kullanabilirsin. Steam oyunları için ayrıca <code>{steam_id}</code> ve <code>{steam_id_32}</code> kullanılabilir. Komutlar <code>/</code> ile başlamamalı.',
        'monthly' => 'Ay sonunda bu ödülün verileceği kullanıcıların sıralaması',
        'monthly_info' => 'Bu ödülü, ay sonunda, en iyi py verenler sıralamasında verilen pozisyonlardaki kullanıcılara otomatik olarak verin.',
        'cron' => 'Ay sonunda otomatik ödülleri kullanmak için CRON görevlerini ayarlamanız gerekir.',
    ],

    'votes' => [
        'title' => 'Oylar',

        'empty' => 'Bu ay oy yok.',
        'votes' => 'Oyların sayımı',
        'month' => 'Oyların sayımı (bu ay)',
        'week' => 'Oyların sayımı (bu hafta)',
        'day' => 'Oyların sayımı (bugün)',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Oy sitesi oluşturuldu #:id',
            'updated' => 'Oy sitesi güncellendi #:id',
            'deleted' => 'Oy sitesi silindi #:id',
        ],

        'vote-rewards' => [
            'created' => 'Oy ödülü oluşturuldu #:id',
            'updated' => 'Oy ödülü güncellendi #:id',
            'deleted' => 'Oy ödülü silindi #:id',
        ],
    ],
];
