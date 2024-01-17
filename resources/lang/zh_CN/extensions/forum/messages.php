<?php

return [
    'title' => '论坛',

    'fields' => [
        'forum' => '论坛',
        'tags' => '标签',
        'editor' => '编辑器',
    ],

    'actions' => [
        'pin' => '置顶',
        'unpin' => '取消置顶',
        'lock' => '锁定',
        'unlock' => '解锁',
    ],

    'latest' => [
        'title' => '最新帖子',
    ],

    'stats' => [
        'title' => '统计信息',

        'discussions' => '主题: :count',
        'posts' => '帖子: :count',
        'users' => '用户：:count',
    ],

    'online' => [
        'title' => '在线用户',

        'none' => '现在没有在线用户...',
    ],

    'forums' => [
        'discussions' => ':count 个主题',

        'locked' => '此论坛已被锁定',
    ],

    'discussions' => [
        'title' => '主题',
        'create' => '发布主题',
        'edit' => '编辑主题',

        'pin' => '置顶此主题',
        'lock' => '锁定此主题',

        'respond' => '回复',
        'views' => ':count 次查看|:count 次查看',

        'locked' => '锁定',
        'pinned' => '已置顶',

        'locked_info' => '此主题已被锁定.',

        'posts' => ':count 篇帖子',

        'delete' => '您确定要删除这个主题吗？',

        'status' => [
            'created' => '主题已发布.',
            'updated' => '此主题已修改.',
            'deleted' => '此主题已被删除.',

            'pinned' => '此主题已被置顶.',
            'unpinned' => '此主题已被取消置顶.',
            'locked' => '此主题已被锁定.',
            'unlocked' => '此主题已解锁.',
        ],
    ],

    'posts' => [
        'title' => '帖子',
        'edit' => '编辑帖子',

        'delay' => '您可以在 :time 后再次发帖',

        'delete' => '确定要删除这个帖子？',

        'status' => [
            'created' => '帖子已创建',
            'updated' => '此帖已被修改',
            'deleted' => '此帖子已被删除',
        ],
    ],

    'notifications' => [
        'reply' => ':user 回复了您的主题 :discussion',
        'mention' => ':user 在 :discussion 中提到了你',
    ],

    'profile' => [
        'likes' => '喜欢',
        'posts' => '帖子',
        'discussions' => '主题',

        'information' => '信息',
        'edit' => '编辑个人资料',

        'location' => '所在地',
        'website' => '网站',
        'about' => '关于',
        'signature' => '个人签名',
        'registered' => '注册时间',
        'last_seen' => '上次上线',
        'display_last_seen' => '显示上次上线时间',
    ],
];
