<?php

return [
    'title' => 'Mağaza',
    'welcome' => 'Mağazaya Hoş Geldiniz!',

    'buy' => 'Satın Al',

    'free' => 'Ücretsiz',

    'fields' => [
        'balance' => 'Bakiye',
        'category' => 'Kategori',
        'code' => 'Kod',
        'commands' => 'Komutlar',
        'currency' => 'Para Birimi',
        'discount' => 'İndirim',
        'expire_date' => 'Son kullanma tarihi',
        'gateways' => 'Geçitler',
        'original_balance' => 'Orijinal Bakiye',
        'package' => 'Paket',
        'packages' => 'Paketler',
        'payment_id' => 'Ödeme Kimliği',
        'payments' => 'Ödemeler',
        'price' => 'Ücret',
        'quantity' => 'Miktar',
        'required_packages' => 'Gerekli Paketler',
        'required_roles' => 'Gerekli rol',
        'role' => 'Satın aldıktan sonra ayarlanacak rol',
        'servers' => 'Sunucular',
        'start_date' => 'Başlangıç tarihi',
        'status' => 'Durum',
        'total' => 'Toplam',
        'user_id' => 'Kullanıcı Kimliği',
        'user_limit' => 'Kullanıcı satın alma limiti',
    ],

    'actions' => [
        'duplicate' => 'Çoğalt',
        'remove' => 'Kaldır',
    ],

    'goal' => [
        'title' => 'Aylık hedef',
        'progress' => ':count% tamamlandı',
    ],

    'recent' => [
        'title' => 'Son Ödemeler',
        'empty' => 'Son ödemeler yok',
    ],

    'top' => [
        'title' => 'En iyi müşteri',
    ],

    'cart' => [
        'title' => 'Sepet',
        'success' => 'Satın alma işleminiz başarıyla tamamlanmıştır.',
        'guest' => 'Satın almak için giriş yapmalısınız.',
        'empty' => 'Sepetiniz boş.',
        'checkout' => 'Ödeme  yap',
        'remove' => 'Kaldır',
        'clear' => 'Sepeti boşalt',
        'pay' => 'Öde',
        'back' => 'Mağazaya geri dön',
        'total' => 'Toplam :total',
        'payable_total' => 'Ödenecek toplam tutar: :total',
        'credit' => 'Kredi',

        'confirm' => [
            'title' => 'Ödeme?',
            'price' => 'Bu ürünü :price fiyatına almak istediğine emin misin?',
        ],

        'errors' => [
            'money' => 'Satın almayı gereçekleştirmek için yeterli bakiyeye sahip değilsiniz.',
            'execute' => 'Ödeme sırasında beklenmedik bir hata oluştu, satın alma işleminiz iade edildi.',
        ],
    ],

    'coupons' => [
        'title' => 'Kuponlar',
        'add' => 'Bir kupon ekle',
        'error' => 'Bu kupon mevcut değil, süresi dolmuş veya artık kullanılamaz.',
        'cumulate' => 'Bu kuponu başka bir kuponla birlikte kullanamazsınız.',
    ],

    'payment' => [
        'title' => 'Ödeme',
        'manual' => 'Manuel Ödeme',

        'empty' => 'Şu anda mevcut ödeme yöntemi bulunamadı.',

        'info' => '#:id\'yi :website üzerinden satın al',
        'error' => 'Ödeme gerçekleştirilmedi.',

        'success' => 'Ödeme tamamlandığında, satın alma işleminizi bir dakikadan kısa bir süre içinde oyun içinde alacaksınız.',

        'webhook' => 'Mağazada yeni ödeme',
        'webhook_info' => 'Toplam: :total, kimlik: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Bu kategori boş.',
    ],

    'packages' => [
        'limit' => 'Bu paketler için mümkün olan maksimum tutarı satın aldınız.',
        'requirements' => 'Bu paketi satın almak için gerekli koşullara sahip değilsiniz.',
    ],

    'offers' => [
        'gateway' => 'Ödeme türü',
        'amount' => 'Miktar',

        'empty' => 'Şu anda mevcut teklif yok.',
    ],

    'profile' => [
        'payments' => 'Ödemeleriniz',
        'money' => 'Bakiye: :balance',
    ],

    'giftcards' => [
        'title' => 'Hediye kartları',
        'success' => ':money hesabınıza yatırıldı',
        'error' => 'Bu hediye kartı mevcut değildir, süresi dolmuştur veya artık kullanılamaz.',
        'add' => 'Hediye kartı ekle',
        'notification' => 'Bir hediye kartı aldın, kart kodu: :code (:balance:).',
    ],
];
