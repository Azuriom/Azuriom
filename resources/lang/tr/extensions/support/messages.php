<?php

return [
    'title' => 'Destek',

    'fields' => [
        'subject' => 'Konu',
        'category' => 'Kategori',
        'ticket' => 'Destek Talebi',
        'comment' => 'Yorum',
    ],

    'actions' => [
        'create' => 'Yeni bir destek talebi oluşturun',
        'reopen' => 'Yeniden aç',
        'close' => 'Kapat',
    ],

    'state' => [
        'open' => 'Aç',
        'closed' => 'Kapalı',
        'replied' => 'Yanıtlandı',
    ],

    'tickets' => [
        'closed' => 'Bu yardım etiketi kapalı.',

        'open' => 'Destek talebini aç',

        'notification' => 'Destek biletinize yeni bir yanıt yazın.',

        'info' => '<strong>:author</strong> bu destek talebini <strong>:category</strong> kategorisinde şu zamanda açtı: :date.',
    ],

    'webhook' => [
        'ticket' => 'Yeni bir destek talebi oluştur',
        'comment' => 'Destek talebine yeni yorum ekle',
        'closed' => 'Bilet Kapatıldı',
    ],

    'mails' => [
        'comment' => [
            'subject' => 'Destek biletinize yeni bir yanıt yazın',
            'message' => 'Merhaba :user! #:id destek talebinde :author tarafından bir yanıt var.',
            'view' => 'Talebi görüntüle',
        ],
    ],

    'days' => 'günler',
];
