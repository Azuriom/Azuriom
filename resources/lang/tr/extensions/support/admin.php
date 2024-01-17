<?php

return [
    'title' => 'Destek',

    'categories' => [
        'title' => 'Kategoriler',
        'edit' => 'Kategori düzenle #:category',
        'create' => 'Kategori oluştur',

        'delete_empty' => 'Kategoriler destek talebini içerir ve silinemez.',
    ],

    'tickets' => [
        'title' => 'Destek Talepleri',
        'show' => 'Bilet #:ticket - :name',
        'create' => 'Destek talebi oluştur',

        'open' => 'Destek talebini aç',
    ],

    'permissions' => [
        'tickets' => 'Destek taleplerini görüntüle ve yönet',
        'categories' => 'Destek kategorilerini görüntüle ve yönet',
    ],

    'settings' => [
        'title' => 'Destek ayarları',
        'home_message' => 'Ana Sayfa Mesajı',
        'webhook' => 'Discord Webhook URL\'si',
        'webhook_info' => 'Bir kullanıcı destek talebi oluşturduğunda veya bir yorum eklediğinde, webhook\'da bir bildirim oluşturur. Devre dışı bırakmak için boş bırakın',
        'scheduler' => 'CRON görevleri ayarlandığında, biletler belirli bir süre sonra otomatik olarak kapatılabilir.',
        'auto_close' => 'Biletleri otomatik olarak kapatmadan önce gecikme',
        'auto_close_info' => 'Bir bilet bu süre içinde herhangi bir yanıt almazsa, otomatik olarak kapatılacaktır. Devre dışı bırakmak için boş bırakın.',
        'reopen' => 'Kullanıcıların kapalı bir bileti yeniden açmasına izin verin.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Yeniden açılan destek talebi #:id',
            'closed' => 'Kapatılmış destek talebi #:id',
        ],
    ],
];
