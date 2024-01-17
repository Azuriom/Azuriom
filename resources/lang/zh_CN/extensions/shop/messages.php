<?php

return [
    'title' => '商店',
    'welcome' => '欢迎来到商店!',

    'buy' => '购买',

    'free' => '免费',

    'fields' => [
        'balance' => '余额',
        'category' => '分类',
        'code' => '代码',
        'commands' => '命令',
        'currency' => '货币',
        'discount' => '折扣',
        'expire_date' => '过期日期',
        'gateways' => '网关',
        'original_balance' => '原始余额',
        'package' => '包裹',
        'packages' => '包裹',
        'payment_id' => '订单 ID',
        'payments' => '交易',
        'price' => '价格',
        'quantity' => '数量',
        'required_packages' => '必需的包裹',
        'required_roles' => '所需的角色',
        'role' => '购买后要设置的角色',
        'servers' => '服务器',
        'start_date' => '开始日期',
        'status' => '状态',
        'total' => '总计',
        'user_id' => '用户 ID',
        'user_limit' => '用户购买限制',
    ],

    'actions' => [
        'duplicate' => '复制',
        'remove' => '移除',
    ],

    'goal' => [
        'title' => '本月目标',
        'progress' => ':count% 达成',
    ],

    'recent' => [
        'title' => '近期交易',
        'empty' => '无最近交易',
    ],

    'top' => [
        'title' => '最佳客户',
    ],

    'cart' => [
        'title' => '购物车',
        'success' => '您的购买已完成.',
        'guest' => '您必须登录才能购买',
        'empty' => '您的购物车是空的',
        'checkout' => '支付',
        'remove' => '删除',
        'clear' => '清空购物车',
        'pay' => '付款',
        'back' => '回到商店',
        'total' => '总计: :total',
        'payable_total' => '总计: :total',
        'credit' => '购买货币',

        'confirm' => [
            'title' => '确认付款?',
            'price' => '您确定要花费 :price 购买吗?',
        ],

        'errors' => [
            'money' => '你没有足够的余额来进行这笔交易.',
            'execute' => '交易过程中发生了一个意外的错误，您的购买将得到退款.',
        ],
    ],

    'coupons' => [
        'title' => '优惠券',
        'add' => '添加优惠券',
        'error' => '此优惠券不存在，已过期或无法再使用.',
        'cumulate' => '此优惠券不能与其他优惠券一起使用.',
    ],

    'payment' => [
        'title' => '付款',
        'manual' => '人工支付',

        'empty' => '目前没有可用的付款方法',

        'info' => '购买 #:id 在 :website',
        'error' => '交易未能完成',

        'success' => '感谢您的购买, 交易确认后，相应的商品将在一分钟内发送给您。',

        'webhook' => '商店新交易',
        'webhook_info' => '总计: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => '此分类为空',
    ],

    'packages' => [
        'limit' => '你已经购买了这个包裹的最大数量.',
        'requirements' => '你不符合购买此包裹的要求.',
    ],

    'offers' => [
        'gateway' => '支付方式',
        'amount' => '金额',

        'empty' => '目前没有可用的报价',
    ],

    'profile' => [
        'payments' => '您的交易',
        'money' => '余额: :balance',
    ],

    'giftcards' => [
        'title' => '礼品卡',
        'success' => ':money 已兑换到您的帐户',
        'error' => '此礼品卡不存在、已过期或无法再使用',
        'add' => '添加礼品卡',
        'notification' => '您收到了一张礼品卡, 代码是 :code (:balance).',
    ],
];
