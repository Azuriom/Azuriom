<?php

return [

    'lang' => '简体中文',

    'date' => [
        'default' => 'Y/m/d',
        'full' => 'Y/m/d G:i',
        'compact' => 'Y/m/d G:i',
    ],

    'nav' => [
        'toggle' => '切换导航',
        'profile' => '用户资料',
        'admin' => '管理面板',
    ],

    'actions' => [
        'add' => '添加',
        'back' => '返回',
        'browse' => '浏览',
        'cancel' => '取消',
        'choose_file' => '选择文件',
        'close' => '关闭',
        'comment' => '评论',
        'continue' => '继续',
        'copy' => '复制',
        'create' => '新建',
        'delete' => '删除',
        'disable' => '关闭',
        'download' => '下载',
        'duplicate' => '复制',
        'edit' => '编辑',
        'enable' => '启用',
        'generate' => '生成',
        'install' => '安装',
        'refresh' => '刷新',
        'reload' => '重载',
        'remove' => '移除',
        'save' => '保存',
        'search' => '搜索',
        'send' => '发送',
        'show' => '显示',
        'update' => '更新',
        'upload' => '上传',
    ],

    'fields' => [
        'action' => '操作',
        'address' => '地址',
        'author' => '作者',
        'category' => '分类',
        'color' => '颜色',
        'content' => '内容',
        'date' => '日期',
        'description' => '描述',
        'enabled' => '已启用',
        'file' => '文件',
        'game' => '游戏',
        'icon' => '图标',
        'image' => '图像',
        'link' => '链接',
        'money' => '货币',
        'name' => '名称',
        'permissions' => '权限',
        'port' => '端口',
        'price' => '价格',
        'published_at' => '发表时间',
        'quantity' => '数量',
        'role' => '角色',
        'server' => '服务器',
        'short_description' => '简要说明',
        'slug' => '缩写',
        'status' => '状态',
        'title' => '标题',
        'type' => '类型',
        'url' => '链接',
        'user' => '用户',
        'value' => '值',
        'version' => '版本',
    ],

    'status' => [
        'success' => '操作已完成!',
        'error' => '发生错误：:error',
    ],

    'range' => [
        'days' => '按天',
        'months' => '按月',
    ],

    'loading' => '正在加载...',

    'yes' => '是',
    'no' => '否',
    'unknown' => '未知',
    'other' => '其他',
    'none' => '无',
    'copied' => '已复制',
    'icons' => '您可以在 <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap 图标</a> 上找到可用图标列表。',

    'home' => '主页',
    'servers' => '服务器',
    'news' => '新闻',
    'welcome' => '欢迎来到 :name',
    'copyright' => '由 <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a> 强力驱动.',

    'maintenance' => [
        'title' => '系统维护',
        'message' => '该网站正在维护中',
    ],

    'theme' => [
        'light' => '亮色主题',
        'dark' => '暗色主题',
    ],

    'captcha' => '验证码无效，请重试',

    'notifications' => [
        'notifications' => '通知',
        'read' => '标记为已读',
        'empty' => '您没有未读通知。',
        'level' => '级别',
        'info' => '信息',
        'warning' => '警告',
        'danger' => '严重',
        'success' => '成功',
    ],

    'clipboard' => [
        'copied' => '已复制！',
        'error' => 'CTRL + C 以复制',
    ],

    'server' => [
        'join' => '加入',
        'total' => ':count/:max 玩家|:count/:max 在线玩家',
        'online' => ':count 名在线玩家|:count 名在线玩家',
        'offline' => '服务器离线.',
    ],

    'profile' => [
        'title' => '我的资料',
        'change_email' => '更改邮箱地址',
        'change_password' => '修改密码',
        'change_name' => '更改用户名',

        'delete' => [
            'btn' => '删除我的帐户',
            'title' => '删除帐户',
            'info' => '这将永久删除您的帐户和所有相关数据。此操作无法撤消。',
            'email' => '我们将向您发送一封确认电子邮件以确认此操作。',
            'sent' => '确认链接已发送至您的邮箱.',
            'success' => '你的帐户已删除!',
        ],

        'email_verification' => '您的邮箱尚未确认，请检查您邮箱中的激活邮件。',
        'updated' => '您的资料已更新。',

        'info' => [
            'role' => '角色：:role',
            'register' => '注册于：:date',
            'money' => '余额: :money',
            '2fa' => '两步验证（2FA）：:2fa',
            'discord' => '链接的 Discord 账号: :user',
        ],

        '2fa' => [
            'enable' => '启用两步验证',
            'disable' => '禁用两步验证',
            'manage' => '管理两步验证 (2FA)',
            'info' => '使用您手机上的两步验证应用 (如 <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> 或 Google Authenticator) 扫描上方的二维码.',
            'secret' => '密钥: :secret',
            'title' => '两步验证',
            'codes' => '显示恢复码',
            'code' => '代码',
            'enabled' => '两步验证目前已启用。别忘了保存您的恢复码！',
            'disabled' => '双重身份验证已禁用',
        ],

        'discord' => [
            'link' => '绑定 Discord',
            'unlink' => '解绑 Discord',
            'linked' => '您已成功绑定 Discord 账号.',
        ],

        'money_transfer' => [
            'title' => '转账',
            'user' => '未找到该用户.',
            'balance' => '您没有足够的资金进行这笔转账。',
            'success' => '转账成功.',
            'notification' => ':user 转账给您 :money.',
        ],
    ],

    'posts' => [
        'posts' => '帖子',
        'posted' => '由 :user 于 :date 发布',
        'unpublished' => '此帖子尚未发布。',
        'read' => '阅读更多',
    ],

    'comments' => [
        'create' => '发表评论',
        'guest' => '您必须登录才能留言。',
        'author' => '<strong>:user</strong> 评论于 :date',
        'content' => '您的评论',
        'delete' => '删除?',
        'delete_confirm' => '您确定要删除该条评论吗？',
    ],

    'likes' => '赞：:count',

    'markdown' => [
        'init' => '通过拖放或粘贴添加文件.',
        'drag' => '拖放上传的图像.',
        'drop' => '正在上传图像 #images_names#...',
        'progress' => '正在上传#file_name#: #progress#%',
        'uploaded' => '已上传 #image_name#',

        'size' => '图像 #image_name#(#image_size#) 过大.\n大小不应超过 #image_max_size#.',
        'error' => '上传图像 #image_name# 时出错.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => '角色 ID',
            'description' => '网站中的角色 ID',
        ],

        'power' => [
            'name' => '角色权重',
            'description' => '网站上角色的权重大于等于',
        ],
    ],
];
