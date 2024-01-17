<?php

return [
    'nav' => [
        'title' => '投票',
        'settings' => '设置',
        'sites' => '站点',
        'rewards' => '奖励',
        'votes' => '投票数',
    ],

    'permission' => '管理投票插件',

    'settings' => [
        'title' => '投票页面设置',

        'count' => '顶级玩家计数',
        'display-rewards' => '在投票页面显示奖励',
        'ip_compatibility' => '启用 IPv4/IPv6 兼容',
        'ip_compatibility_info' => '该选项允许你纠正那些不接受 IPv6 而你的网站接受的投票网站上未被验证的投票, 反之亦然.',
        'commands' => '全局命令',
    ],

    'sites' => [
        'title' => '站点',
        'edit' => '编辑站点',
        'create' => '创建站点',

        'enable' => '启用站点',
        'delay' => '投票之间的延迟',
        'minutes' => '分钟',

        'list' => '可以验证投票的网站',
        'variable' => '你可以使用 <code>{player}</code> 代替玩家名称.',

        'verifications' => [
            'title' => '验证',
            'enable' => '启用投票验证',

            'disabled' => '本网站上的投票将不会被核实',
            'auto' => '本网站上的投票将被自动核实.',
            'input' => '本网站上的投票将在下面的内容填写完毕后得到验证.',

            'pingback' => 'Pingback URL: :url',
            'secret' => '密钥',
            'server_id' => '服务器 ID',
            'token' => '令牌',
            'api_key' => 'API 密钥',
        ],
    ],

    'rewards' => [
        'title' => '奖励',
        'edit' => '编辑奖励 :reward',
        'create' => '创建奖励',

        'require_online' => '当用户在服务器上在线时执行命令 (仅适用于 AzLink)',
        'enable' => '启用奖励',

        'commands' => '您可以使用 <code>{player}</code> 代替玩家名称, <code>{reward}</code> 代替奖励名称, <code>{site}</code> 代替投票站点. 对于 Steam 游戏, 您还可以使用 <code>{steam_id}</code> 与 <code>{steam_id_32}</code>. 指令不能以 <code>/</code> 结尾.',
        'monthly' => '月末给予该奖励的用户排名',
        'monthly_info' => '在月末，自动给处于最佳客户排名中给定位置的用户提供此奖品.',
        'cron' => '你必须设置 CRON 任务, 以便在月末使用自动奖励.',
    ],

    'votes' => [
        'title' => '投票数',

        'empty' => '本月无票',
        'votes' => '所得票数',
        'month' => '本月所得票数',
        'week' => '本周所得票数',
        'day' => '今日所得票数',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => '已创建投票网站 #:id',
            'updated' => '已更新投票网站 #:id',
            'deleted' => '已删除投票网站 #:id',
        ],

        'vote-rewards' => [
            'created' => '已创建投票奖励 #:id',
            'updated' => '已更新投票奖励 #:id',
            'deleted' => '已删除投票奖励 #:id',
        ],
    ],
];
