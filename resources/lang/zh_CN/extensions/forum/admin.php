<?php

return [

    'nav' => [
        'settings' => '设置',
        'forums' => '论坛',
        'tags' => '标签',
    ],

    'settings' => [
        'title' => '论坛设置',
        'home_message' => '主页信息',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => '当有新消息发布时, 将在此webhook上发送通知. 留空则禁用.',
    ],

    'categories' => [
        'title' => '分类管理',
        'edit' => '编辑分类 :category',
        'create' => '创建分类',

        'delete_error' => '此分类存在板块, 暂时无法删除.',
    ],

    'forums' => [
        'title' => '论坛',
        'create' => '创建板块',
        'edit' => '编辑板块 :forum',

        'create_category' => '创建分类',
        'create_forum' => '创建板块',

        'parent' => '父板块',
        'restricted' => '限制对此论坛的访问仅限于某些角色',
        'default_tags' => '默认标签',
        'lock' => '锁定此论坛',
        'lock_info' => '非管理员用户将无法发布主题.',
        'private' => '私有板块',
        'private_info' => '用户只能看到自己的主题和 pinnedones.',

        'updated' => '板块顺序已更新',
        'delete_error' => '存在主题或子版块的板块无法被删除.',
    ],

    'discussions' => [
        'card' => '论坛主题',
    ],

    'posts' => [
        'card' => '论坛帖子',

        'recent' => '最近的帖子',
        'delay' => '帖子之间的延迟',
        'seconds' => '秒',
    ],

    'tags' => [
        'title' => '标签',
        'create' => '创建标签',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => '已删除主题 #:id',
            'pinned' => '置顶了主题 #:id',
            'unpinned' => '取消置顶了主题 #:id',
            'locked' => '锁定了主题 #:id',
            'unlocked' => '解锁了主题 #:id',
        ],

        'forum-posts' => [
            'deleted' => '已删除帖子 #:id',
        ],

        'forum-categories' => [
            'created' => '创建论坛分类 #:id',
            'updated' => '创建论坛分类 #:id',
            'deleted' => '删除论坛分类 #:id',
        ],

        'forum-forums' => [
            'created' => '创建论坛 #:id',
            'updated' => '更新论坛 #:id',
            'deleted' => '删除论坛 #:id',
        ],
    ],

    'permissions' => [
        'forums' => '管理版块与分类',
        'discussions' => '管理论坛主题 (移动、编辑、删除、置顶、锁定)',
        'private' => '查看私有板块中其他用户的主题',
        'delete_own_posts' => '删除自己的帖子',
        'locked' => '在已锁定的论坛中创建一个新讨论'
    ],
];
