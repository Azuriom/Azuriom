<?php

return [

    'nav' => [
        'settings' => 'Ayarlar',
        'forums' => 'Forumlar',
        'tags' => 'Etiketler',
    ],

    'settings' => [
        'title' => 'Forum ayarları',
        'home_message' => 'Ana Sayfa Mesajı',
        'webhook' => 'Discord Webhook URL\'si',
        'webhook_info' => 'Yeni bir mesaj gönderildiğinde bu webhook üzerinden bir bildirim gönderilecektir. Devre dışı bırakmak için boş bırakın',
    ],

    'categories' => [
        'title' => 'Kategoriler',
        'edit' => 'Kategoriyi düzenle :category',
        'create' => 'Kategori oluştur',

        'delete_error' => 'Bu kategori forumları içerir ve silinemez.',
    ],

    'forums' => [
        'title' => 'Forumlar',
        'create' => 'Forum Oluştur',
        'edit' => 'Forumu düzenle :forum',

        'create_category' => 'Kategori oluştur',
        'create_forum' => 'Forum Oluştur',

        'parent' => 'Üst forum',
        'restricted' => 'Bu foruma erişimi yalnızca belirli rollerle kısıtlayın',
        'default_tags' => 'Varsayılan etiketler',
        'lock' => 'Bu Forumu Kilitle',
        'lock_info' => 'Yönetici olmayan kullanıcılar tartışma oluşturamayacaktır.',
        'private' => 'Özel Forum',
        'private_info' => 'Kullanıcılar yalnızca kendi tartışmalarını ve sabitlenmiş olanları görebilir.',

        'updated' => 'Forum sırası güncellendi.',
        'delete_error' => 'Tartışmalar veya alt forumlar içeren bir forum silinemez.',
    ],

    'discussions' => [
        'card' => 'Forum tartışmaları',
    ],

    'posts' => [
        'card' => 'Forum mesajları',

        'recent' => 'Anasayfa\'daki son gönderiler',
        'delay' => 'Gönderiler arası gecikme',
        'seconds' => 'saniye',
    ],

    'tags' => [
        'title' => 'Etiketler',
        'create' => 'Etiket oluştur',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Silinmiş tartışma #:id',
            'pinned' => 'Sabitlenmiş tartışma #:id',
            'unpinned' => 'Tartışmanın sabitlemesi kaldırıldı #:id',
            'locked' => 'Kilitlenmiş tartışma #:id',
            'unlocked' => 'Tartışmanın kilidi açıldı #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Silinmiş gönderi #:id',
        ],

        'forum-categories' => [
            'created' => 'Forum kategorisi oluşturuldu #:id',
            'updated' => 'Forum kategorisi güncellendi #:id',
            'deleted' => 'Forum kategorisi silindi #:id',
        ],

        'forum-forums' => [
            'created' => 'Forum oluşturuldu #:id',
            'updated' => 'Forum güncellendi #:id',
            'deleted' => 'Forum silindi #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Forum ve kategorileri yönet',
        'discussions' => 'Forum tartışmalarını yönet (yerini değiştir, düzenle, sil, sabitle, kilitle)',
        'private' => 'Diğer kullanıcıların özel forumlarında tartışmaları görüntüle',
        'delete_own_posts' => 'Kendi forum gönderilerini silme',
        'locked' => 'Kilitli bir forumda tartışma oluşturma'
    ],
];
