<?php

return [
    'title' => '安装',

    'welcome' => 'Azuriom 是 <strong>新一代</strong> 游戏 CMS, 他是 <strong>免费</strong> 和 <strong>开源</strong>的, 是现有 CMS 更 <strong>现代、可靠、快速和安全</strong> 的替代品, 带给你 <strong>最佳的网络体验</strong>.',

    'back' => '返回',

    'requirements' => [
        'php' => 'PHP :version 或更高',
        'writable' => '写入权限',
        'rewrite' => '启用 URL 重写',
        'extension' => '扩展 :extension',
        'function' => '启用函数 :function',
        '64bit' => '64位 PHP',

        'refresh' => '刷新要求',
        'success' => 'Azuriom 已经准备好进行配置了!',
        'missing' => '你的服务器不具备安装 Azuriom 的必要条件.',

        'help' => [
            'writable' => '你可以尝试此命令授予写权限: <code>:command</code>',
            'rewrite' => '你可以跟随 <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">文档</a> 中的说明以启用 URL 重写.',
            'htaccess' => '缺少文件 <code>.htaccess</code> 或 <code>public/.htaccess</code>. 确保你已经启用了显示隐藏文件, 并且该文件存在.',
            'extension' => '你可以尝试使用此指令安装缺少的 PHP 扩展: <code>:command</code>.<br>完成后请重启 Apache/Nginx.',
            'function' => '你需要在 PHP 的 php.ini 文件中编辑 <code>disable_functions</code> 的值来启用此函数.',
        ],
    ],

    'database' => [
        'title' => '数据库',

        'type' => '类型',
        'host' => '主机',
        'port' => '端口',
        'database' => '数据库名称',
        'user' => '用户名',
        'password' => '密码',

        'warn' => '不建议使用这种数据库类型，只有在无法使用其他方法时再使用.',
    ],

    'game' => [
        'title' => '游戏',

        'locale' => '语言',

        'warn' => '注意，一旦安装完毕, 此选项将无法更改, 除非重新安装 Azuriom.',

        'install' => '安装',

        'user' => [
            'title' => '管理员帐户',

            'name' => '名称',
            'email' => '电子邮箱地址',
            'password' => '密码',
            'password_confirm' => '再次确认密码',
        ],

        'minecraft' => [
            'premium' => '使用微软帐户登录 (最安全，但需要所有玩家购买正版 Minecraft)',
        ],

        'steam' => [
            'profile' => 'Steam 个人资料 URL',
            'profile_info' => '这个 Steam 用户将是网站的管理员.',

            'key' => 'Steam API 密钥',
            'key_info' => '你可以前往 <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam 页面</a> 获取 Steam API 密钥.',
        ],
    ],

    'success' => [
        'thanks' => '感谢选择 Azuriom !',
        'success' => '你的网站已经安装成功，你现在可以用你的网站做出一些超棒的事情了!',
        'go' => '冲冲冲!',
        'support' => '如果您觉得 Azuriom 不错，请不要忘了<a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">支持我们</a>.',
    ],
];
