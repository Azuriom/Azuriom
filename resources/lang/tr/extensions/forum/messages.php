<?php

return [
    'title' => 'Forum',

    'fields' => [
        'forum' => 'Forum',
        'tags' => 'Etiketler',
        'editor' => 'Editör',
    ],

    'actions' => [
        'pin' => 'Tuttur',
        'unpin' => 'Tutturmayı Çek',
        'lock' => 'Kitle',
        'unlock' => 'Kilidi Aç',
    ],

    'latest' => [
        'title' => 'En Sonki İletiler',
    ],

    'stats' => [
        'title' => 'İstatistikler',

        'discussions' => 'Tartışmalar :count',
        'posts' => 'Gönderiler :count',
        'users' => 'Kullanıcılar :count',
    ],

    'online' => [
        'title' => 'Çevrimiçi Kullanıcılar',

        'none' => 'Çevrimiçi kullanıcı yok...',
    ],

    'forums' => [
        'discussions' => ':count tartışma|:count tartışmalar',

        'locked' => 'Bu forum kilitli.',
    ],

    'discussions' => [
        'title' => 'Tartışmalar',
        'create' => 'Tartışma oluştur',
        'edit' => 'Tartışmayı düzenle',

        'pin' => 'Tartışmayı sabitle',
        'lock' => 'Tartışmayı kilitle',

        'respond' => 'Yanıtla',
        'views' => ':count görüntüleme|:count görüntülemeler',

        'locked' => 'Kilitli',
        'pinned' => 'Sabitlendi',

        'locked_info' => 'Bu tartışma kilitlendi.',

        'posts' => ':count gönderi|:count gönderiler',

        'delete' => 'Bu tartışmayı silmek istediğinize emin misiniz ?',

        'status' => [
            'created' => 'Tartışma oluşturuldu.',
            'updated' => 'Tartışma değişikliğe uğradı.',
            'deleted' => 'Tartışma silindi.',

            'pinned' => 'Tartışma sabitlendi.',
            'unpinned' => 'Tartışmanın sabitlenmesi kaldırıldı.',
            'locked' => 'Tartışma kilitlendi.',
            'unlocked' => 'Tartışma\'nın kilidi kaldırıldı.',
        ],
    ],

    'posts' => [
        'title' => 'Gönderiler',
        'edit' => 'Gönderiyi düzenle',

        'delay' => ':time süre sonra tekrar gönderi oluşturabilirsin.',

        'delete' => 'Bu makaleyi silmek istediğinizden emin misin ?',

        'status' => [
            'created' => 'Gönder, oluşturuldu.',
            'updated' => 'Gönderi düzenlendi.',
            'deleted' => 'Gönderi silindi.',
        ],
    ],

    'notifications' => [
        'reply' => ':user, tartışmanı (:discussion) cevapladı',
        'mention' => ':user, seni :discussion tartışmasına etiketledi',
    ],

    'profile' => [
        'likes' => 'Beğeniler',
        'posts' => 'Gönderiler',
        'discussions' => 'Tartışmalar',

        'information' => 'Bilgi',
        'edit' => 'Profili düzenle',

        'location' => 'Konum',
        'website' => 'Web sitesi',
        'about' => 'Hakkında',
        'signature' => 'İmza',
        'registered' => 'Kayıt olduğu tarih',
        'last_seen' => 'Son görülme',
        'display_last_seen' => 'Son görülmeyi görüntüle',
    ],
];
