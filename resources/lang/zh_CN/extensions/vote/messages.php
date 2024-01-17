<?php

return [
    'title' => '投票',

    'sections' => [
        'vote' => '投票',
        'top' => '热门投票',
        'rewards' => '奖励',
    ],

    'fields' => [
        'chances' => '概率',
        'commands' => '命令',
        'reward' => '奖励',
        'rewards' => '奖励',
        'servers' => '服务器',
        'site' => '站点',
        'votes' => '所得票数',
    ],

    'errors' => [
        'user' => '用户不存在!',
        'site' => '目前没有可用的投票站点.',
        'delay' => '你已经投过票了，你可以在 :time 后再次投票!',
    ],

    'success' => '您的投票已被记录, 您很快会收到您的奖励 « :reward »!',
];
