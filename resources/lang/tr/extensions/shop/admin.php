<?php

return [
    'nav' => [
        'title' => 'Mağaza',
        'settings' => 'Ayarlar',
        'packages' => 'Paketler',
        'gateways' => 'Geçitler',
        'offers' => 'Teklifler',
        'coupons' => 'Kuponlar',
        'giftcards' => 'Hediye Kartları',
        'discounts' => 'İndirimler',
        'payments' => 'Ödemeler',
        'purchases' => 'Satın Alımlar',
        'statistics' => 'İstatistikler',
    ],

    'permissions' => [
        'admin' => 'Mağaza eklentisini yönet',
    ],

    'categories' => [
        'title' => 'Kategoriler',
        'edit' => 'Kategoriyi düzenle :category',
        'create' => 'Kategori oluştur',

        'parent' => 'Ana kategori',
        'delete_error' => 'Paketleri olan bir kategori silinemez.',

        'cumulate' => 'Bu kategorideki satın alımları toplayın',
        'cumulate_info' => 'Bu kategoride daha önce bir paket satın almış olan kullanıcılar indirim alacak ve farkı yalnızca daha pahalı bir paket satın alırken ödeyeceklerdir.',
        'enable' => 'Kategoriyi etkinleştirin',
    ],

    'offers' => [
        'title' => 'Teklifler',
        'edit' => 'Teklifi düzenleyin :offer',
        'create' => 'Teklif oluştur',

        'enable' => 'Teklifi etkinleştirin',
    ],

    'coupons' => [
        'title' => 'Kuponlar',
        'edit' => 'Kuponu düzenleyin :coupon',
        'create' => 'Kupon oluştur',

        'global' => 'Kupon tüm mağazalarda aktif olmalı mı?',
        'cumulate' => 'Bu kuponu diğer kuponlarla birlikte kullanmasına izin ver',
        'user_limit' => 'Kullanıcı Limiti',
        'global_limit' => 'Genel Limit',
        'active' => 'Aktif',
        'usage' => 'Kullanım sınırının altında',
        'enable' => 'Kuponu etkinleştirin',
    ],

    'giftcards' => [
        'title' => 'Hediye Kartları',
        'edit' => 'Hediye kartını düzenle :giftcard',
        'create' => 'Hediye kartı oluşturun',

        'global_limit' => 'Genel Limit',
        'active' => 'Aktif',
        'enable' => 'Hediye kartını etkinleştirin',
    ],

    'discounts' => [
        'title' => 'İndirimler',
        'edit' => 'İndirimi düzenleyin :discount',
        'create' => 'İndirim oluştur',

        'global' => 'İndirim tüm mağazalarda etkin olmalı mı?',
        'active' => 'Aktif',
        'enable' => 'İndirimi etkinleştirin',
    ],

    'packages' => [
        'title' => 'Paketler',
        'edit' => 'Paketi düzenle :package',
        'create' => 'Paket oluştur',

        'updated' => 'Paketler güncellendi.',

        'money' => 'Satın alma işleminden sonra kullanıcıya verilecek para',
        'giftcard' => 'Satın alma sırasında oluşturulacak hediye kartının bakiyesi',
        'command' => 'Komutlar <code>/</code> ile başlamamalı. Oyuncu ismi için <code>{player}</code>, Steam oyunları için ayrıca <code>{steam_id}</code> ve <code>{steam_id_32}</code> kullanılabilir. Kullanılabilir diğer yer tutucular şunlardır: :placeholders.',

        'custom_price' => 'Kullanıcının ödeyeceği fiyatı seçmesine izin verin (paket fiyatı daha sonra minimum olacaktır)',
        'require_online' => 'Kullanıcı sunucuda çevrimiçi olduğunda komutları çalıştırma (yalnızca AzLink ile kullanılabilir)',
        'enable_quantity' => 'Miktarı etkinleştirin',

        'create_category' => 'Kategori oluştur',
        'create_package' => 'Paket oluştur',

        'enable' => 'Bu paketi etkinleştir',
    ],

    'gateways' => [
        'title' => 'Geçitler',
        'edit' => 'Ödeme yöntemini düzenle :gateway',
        'create' => 'Ödeme yöntemi ekle',

        'current' => 'Şuanki ödeme yöntemi',
        'add' => 'Yeni bir ödeme yöntemi ekle',
        'info' => 'Cloudflare veya bir güvenlik duvarı kullanırken ödemelerle ilgili sorun yaşıyorsanız, <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">SSS</a>\'deki adımları izlemeyi deneyin.',

        'country' => 'Ülke',
        'sandbox' => 'Test Modu',
        'api-key' => 'API anahtarı',
        'public-key' => 'Genel Anahtar',
        'private-key' => 'Özel Anahtar',
        'secret-key' => 'Gizli Anahtar',
        'endpoint-secret' => 'Gizi imzalama',
        'service-id' => 'Servis Kimliği',
        'client-id' => 'İstemci Kimliği',
        'merchant-id' => 'Tüccar Kimliği',
        'project-id' => 'Proje Kimliği',
        'env' => 'Çevre',

        'paypal_email' => 'PayPal E-posta Adresi',
        'paypal_info' => 'Lütfen PayPal hesabının <strong>ana</strong> e-posta adresini girdiğinizden emin olun.',
        'paysafecard_info' => 'Paysafecard ile ödeme kabul edebilmek için <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard ortağı</a> olmanız gerekir. Başka yöntemler de mevcuttur ancak paysafecard yalnızca bu yönteme izin vermektedir.',
        'stripe_info' => 'Stripe kontrol panelinde webhook URL\'sini <code>:url</code> olarak ayarlamanız ve <code>checkout.session.completed</code> olayını seçmeniz gereklidir.',
        'paymentwall_info' => 'PaymentWall kontrol panelinde pingback URL\'sini <code>:url</code> olarak ayarlamanız gerekir.',
        'xsolla' => 'Xsolla kontrol panelinde webhook URL\'sini <code>:url</code> olarak ayarlamanız, \'Ödeme istasyonu\' ayarlarında \'İşlem harici kimliği\'ni etkinleştirmeniz, web kancalarını test etmeniz ve ardından \'Ödeme İstasyonu\' ayarlarında \'Ödeme\'yi etkinleştirmeniz gerekir.',

        'enable' => 'Ödeme yöntemini etkinleştir',
    ],

    'payments' => [
        'title' => 'Ödemeler',
        'show' => 'Ödeme #:payment',

        'info' => 'Ödeme bilgileri',
        'items' => 'Satın alınan ürünler',

        'card' => 'Mağaza ödemeleri',

        'status' => [
            'pending' => 'Bekliyor',
            'expired' => 'Süresi doldu',
            'chargeback' => 'Geri ödeme',
            'completed' => 'Tamamlandı',
            'refunded' => 'İade edildi',
            'error' => 'Hata',
        ],
    ],

    'purchases' => [
        'title' => 'Satın Alımlar',
    ],

    'settings' => [
        'title' => 'Mağaza ayarları',
        'enable_home' => 'Mağaza\'nın ana sayfasını aktifleştir',
        'home_message' => 'Ana Sayfa Mesajı',
        'use_site_money' => 'Bakiye ile satın alımı aktifleştir.',
        'use_site_money_info' => 'Etkinleştirildiğinde, mağazadaki paketler yalnızca web sitesi parasıyla satın alınabilir. Kullanıcıların hesaplarını kredilendirmeleri için mağazada teklifler oluşturabilirsiniz.',
        'webhook' => 'Discord Webhook URL\'si',
        'webhook_info' => 'Bir kullanıcı bir ödeme yaptığında (web sitesi parası ile yapılan alışverişler hariç!), bu web kancasında bir bildirim oluşturacaktır. Devre dışı bırakmak için boş bırakın.',
        'commands' => 'Global komutlar',
        'recent_payments' => 'Kenar çubuğunda görüntülenecek son ödemeler sınırı (devre dışı bırakmak için 0 olarak ayarlayın)',
        'display_amount' => 'Son ödemelerdeki harcama tutarını ve en iyi müşteriyi görüntüleyin',
        'top_customer' => 'En yüksek aylık müşteriyi kenar çubuğunda gösterme',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Oluşturulan ödeme yöntemi #:id',
            'updated' => 'Güncellenen ödeme yöntemi #:id',
            'deleted' => 'Silinen ödeme yöntemi #:id',
        ],

        'shop-packages' => [
            'created' => 'Paket oluşturuldu #:id',
            'updated' => 'Paket güncellendi #:id',
            'deleted' => 'Paket silindi #:id',
        ],

        'shop-offers' => [
            'created' => 'Teklif oluşturuldu #:id',
            'updated' => 'Teklif güncellendi #:id',
            'deleted' => 'Teklif silindi #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Kullanılan hediye kartı #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'İstatistikler',
        'total' => 'Toplam',
        'recent' => 'Son ödemeler',
        'count' => 'Ödeme sayısı',
        'estimated' => 'Toplam kazanç',
        'month' => 'Bu ay içindeki ödemeler',
        'month_estimated' => 'Bu ayki tahmini kazançlar',
    ],

];
