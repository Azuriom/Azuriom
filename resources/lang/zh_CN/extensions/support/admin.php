<?php

return [
    'title' => '支持',

    'categories' => [
        'title' => '分类管理',
        'edit' => '编辑分类 #:category',
        'create' => '创建分类',

        'delete_empty' => '此分类下存在工单, 暂时无法删除.',
    ],

    'tickets' => [
        'title' => '工单',
        'show' => '工单 #:ticket - :name',
        'create' => '创建工单',

        'open' => '打开工单',
    ],

    'permissions' => [
        'tickets' => '查看和管理支持票',
        'categories' => '查看和管理工单分类',
    ],

    'settings' => [
        'title' => '支持设置',
        'home_message' => '主页信息',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => '当用户创建工单或添加评论时，它将在此 Webhook 上创建一个通知。留空则禁用',
        'scheduler' => '如果已经设置 CRON 任务, 工单可以在一定时间后自动关闭.',
        'auto_close' => '一定时间后自动关闭工单',
        'auto_close_info' => '当工单在此期间没有收到任何回复时, 它将自动关闭. 留空则禁用.',
        'reopen' => '允许用户重新开启已关闭的工单.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => '重新开启工单 #:id',
            'closed' => '已关闭工单 #:id',
        ],
    ],
];
