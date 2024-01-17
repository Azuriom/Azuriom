<?php

return [
    'nav' => [
        'title' => '商店',
        'settings' => '设置',
        'packages' => '包裹',
        'gateways' => '网关',
        'offers' => '报价',
        'coupons' => '优惠券',
        'giftcards' => '礼品卡',
        'discounts' => '折扣',
        'payments' => '交易',
        'purchases' => '购买',
        'statistics' => '统计',
    ],

    'permissions' => [
        'admin' => '管理商店插件',
    ],

    'categories' => [
        'title' => '分类管理',
        'edit' => '编辑分类 :category',
        'create' => '创建分类',

        'parent' => '父级分类',
        'delete_error' => '无法删除包含 包裹 的分类',

        'cumulate' => '统计此分类中的订单',
        'cumulate_info' => '已在此类别购买包裹的用户将获得折扣，只有在购买更昂贵的包裹时才需支付差价.',
        'enable' => '启用此分类',
    ],

    'offers' => [
        'title' => '报价',
        'edit' => '编辑报价 :offer',
        'create' => '创建报价',

        'enable' => '启用此报价',
    ],

    'coupons' => [
        'title' => '优惠券',
        'edit' => '编辑优惠券 :coupon',
        'create' => '创建优惠券',

        'global' => '该优惠券应该在所有的商品都生效吗？',
        'cumulate' => '允许与其他优惠券共同使用',
        'user_limit' => '用户限制',
        'global_limit' => '总限制',
        'active' => '已启用',
        'usage' => '使用限制',
        'enable' => '启用优惠券',
    ],

    'giftcards' => [
        'title' => '礼品卡',
        'edit' => '编辑礼品卡 :giftcard',
        'create' => '创建礼品卡',

        'global_limit' => '总限制',
        'active' => '启用',
        'enable' => '启用礼品卡',
    ],

    'discounts' => [
        'title' => '折扣',
        'edit' => '编辑折扣 :discount',
        'create' => '创建折扣',

        'global' => '是否在所有店铺激活折扣？',
        'active' => '激活',
        'enable' => '启用折扣',
    ],

    'packages' => [
        'title' => '包裹',
        'edit' => '编辑包裹 :package',
        'create' => '创建包裹',

        'updated' => '包裹已更新',

        'money' => '购买后给予用户的金额',
        'giftcard' => '在购买时创建的礼品卡的额度',
        'command' => '指令不能以 <code>/</code> 开头. 您可以使用 <code>{player}</code> 代替玩家名称. 对于 Steam 游戏, 您还可以使用 <code>{steam_id}</code> 与 <code>{steam_id_32}</code>. 其他可用的占位符: :placeholders',

        'custom_price' => '允许用户自行选择要支付的价格 (包裹价格将是最低价格)',
        'require_online' => '当用户在服务器上在线时执行命令 (仅适用于 AzLink)',
        'enable_quantity' => '启用数量',

        'create_category' => '创建分类',
        'create_package' => '创建包裹',

        'enable' => '启用此包裹',
    ],

    'gateways' => [
        'title' => '网关',
        'edit' => '编辑支付网关 :gateway',
        'create' => '添加支付网关',

        'current' => '当前支付网关',
        'add' => '添加新支付网关',
        'info' => '如果您在使用 Cloudflare 或 防火墙 时有遇到了支付相关的问题，请参见 <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">常见问题</a>',

        'country' => '国家',
        'sandbox' => '沙盒',
        'api-key' => 'API 密钥',
        'public-key' => '公共密钥',
        'private-key' => '私钥',
        'secret-key' => '私钥',
        'endpoint-secret' => '签名密钥',
        'service-id' => '服务 ID',
        'client-id' => '客户端 ID',
        'merchant-id' => '商户 ID',
        'project-id' => '项目 ID',
        'env' => '系统环境',

        'paypal_email' => 'PayPal 邮箱地址',
        'paypal_info' => '请确保输入 PayPal 账户的 <strong>主</strong>电子邮件地址。',
        'paysafecard_info' => '为了能够接受 paysafecard 的支付, 你必须是 <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard 合作伙伴</a>. 也有其他方法，但只有这个方法是 paysafecard 允许的.',
        'stripe_info' => '在 Stripe 仪表板上，您需要将 webhook URL 设置为 <code>:url</code> 并选择事件 <code>checkout.session.completed</code>',
        'paymentwall_info' => '在 PaymentWall 仪表板上，您需要将 pingbackURL 设置为 <code>:url</code>',
        'xsolla' => '在 Xsolla 仪表盘上，您需要将 webhook URL 设置为 <code>:url</code>， 在“支付站”设置中启用\'交易外部ID\'，测试网络钩子，然后在“支付站”设置中启用\'结帐\'功能。',

        'enable' => '启用网关',
    ],

    'payments' => [
        'title' => '交易',
        'show' => '订单 #:payment',

        'info' => '交易信息',
        'items' => '已购买物品',

        'card' => '商店交易',

        'status' => [
            'pending' => '待支付',
            'expired' => '已过期',
            'chargeback' => '拒付',
            'completed' => '已完成',
            'refunded' => '已退款',
            'error' => '错误',
        ],
    ],

    'purchases' => [
        'title' => '购买',
    ],

    'settings' => [
        'title' => '店铺设置',
        'enable_home' => '启用商店主页',
        'home_message' => '主页消息',
        'use_site_money' => '启用使用网站货币购买',
        'use_site_money_info' => '如果启用，商店中的包裹只能用网站货币购买。 为了让用户能充钱，您可以在商店中设置报价。',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => '当用户付款时，它将在此 Webhook 上创建一个通知。留空以禁用',
        'commands' => '全局命令',
        'recent_payments' => '在侧边栏显示的最近交易的数量限制 (设置为 0 表示禁用)',
        'display_amount' => '在近期交易与最佳客户中显示消费金额',
        'top_customer' => '在侧边栏显示每月消费最多的玩家',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => '创建网关 #:id',
            'updated' => '更新网关 #:id',
            'deleted' => '已删除网关 #:id',
        ],

        'shop-packages' => [
            'created' => '已创建包裹 #:id',
            'updated' => '已更新包裹 #:id',
            'deleted' => '已删除包裹 #:id',
        ],

        'shop-offers' => [
            'created' => '创建的报价 #:id',
            'updated' => '更新报价 #:id',
            'deleted' => '已删除报价 #:id',
        ],

        'shop-giftcards' => [
            'used' => '使用了礼品卡 #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => '统计',
        'total' => '总计',
        'recent' => '最近交易',
        'count' => '交易数',
        'estimated' => '估计收入',
        'month' => '本月交易',
        'month_estimated' => '本月预计收入',
    ],

];
