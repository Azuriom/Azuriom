<?php

return [
    'error' => '错误',
    'code' => '错误代码 :code',
    'home' => '返回首页',
    'whoops' => '抱歉！',

    '401' => [
        'title' => '未授权',
        'message' => '您无权访问此页面',
    ],
    '403' => [
        'title' => '禁止使用',
        'message' => '您被禁止访问此页面',
    ],
    '404' => [
        'title' => '未找到',
        'message' => '找不到您正在寻找的页面',
    ],
    '419' => [
        'title' => '页面已过期',
        'message' => '您的会话已过期。请刷新并重试',
    ],
    '429' => [
        'title' => '请求太多',
        'message' => '您向我们的服务器提出了太多的请求。请稍后再试',
    ],
    '500' => [
        'title' => '服务器错误',
        'message' => '哎呀，我们的服务器发生了一些错误。请稍后再试',
    ],
    '503' => [
        'title' => '服务不可用',
        'message' => '我们正在进行一些维护。请稍后再试',
    ],

    'fallback' => [
        'message' => '发生了错误，请再试一次。',
    ],
];
