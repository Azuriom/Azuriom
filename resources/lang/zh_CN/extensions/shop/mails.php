<?php

return [
    'payment' => [
        'subject' => '感谢您的购买',
        'intro' => ':user, 感谢您的购买! 您的交易已确认，您将在几分钟内收到您的物品.',
        'total' => '总计: :total',
        'transaction' => '交易 ID: :transaction (:gateway)',
        'date' => '日期: :date',
    ],

    'giftcard' => [
        'subject' => '您的礼品卡代码',
        'intro' => '感谢您的购买! 您的礼品卡现已可用.',
        'code' => '代码: :code',
        'balance' => '余额: :balance',
    ],
];
