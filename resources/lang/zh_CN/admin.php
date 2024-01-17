<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on the admin dashboard
    |
    */

    'nav' => [
        'dashboard' => '仪表盘',
        'settings' => [
            'heading' => '设置',
            'settings' => '设置',
            'global' => '全局配置',
            'security' => '安全',
            'performances' => '性能',
            'seo' => '搜索引擎优化',
            'auth' => '身份认证',
            'mail' => '邮件系统',
            'maintenance' => '维护公告',
            'social' => '社交链接',
            'navbar' => '导航栏',
            'servers' => '服务器',
        ],

        'users' => [
            'heading' => '用户',
            'users' => '用户',
            'roles' => '角色',
            'bans' => '封禁',
        ],

        'content' => [
            'heading' => '内容',
            'pages' => '页面',
            'posts' => '帖子',
            'images' => '图像',
            'redirects' => '重定向设置',
        ],

        'extensions' => [
            'heading' => '扩展',
            'plugins' => '插件',
            'themes' => '主题',
        ],

        'other' => [
            'heading' => '其他',
            'update' => '更新',
            'logs' => '日志',
        ],

        'profile' => [
            'profile' => '档案',
        ],

        'back' => '返回首页',
        'support' => '支持',
        'documentation' => '文档',
    ],

    'delete' => [
        'title' => '是否删除？',
        'description' => '删除后，无法恢复，确认删除？',
    ],

    'footer' => '由 :azuriom 强力驱动 &copy; :year，面板由 :startbootstrap 设计.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => '仪表盘',

        'users' => '用户',
        'posts' => '帖子',
        'pages' => '页面',
        'images' => '图像',

        'update' => '有新版本的 Azuriom 可用: :version',
        'http' => '您的站点未使用 https，您应使用并强制 https 以提升站点安全性。',
        'cloudflare' => '若您需要使用 Cloudflare，您应安装 Cloudflare 支持插件。',
        'recent_users' => '近期用户',
        'active_users' => '活跃用户',
        'emails' => '电子邮件已被禁用。若用户忘记了密码，其将无法重置。您可在<a href=":url">邮件设置</a>中启用电子邮件。',
    ],

    'settings' => [
        'index' => [
            'title' => '全局设置',

            'name' => '站点名称',
            'url' => '站点地址',
            'description' => '站点描述',
            'meta' => '网页关键词',
            'meta_info' => '关键词必须使用英文逗号 (,) 分隔。',
            'favicon' => '图标',
            'background' => '背景',
            'logo' => '图标',
            'timezone' => '时区',
            'locale' => '语言',
            'money' => '网站使用的货币名称',
            'copyright' => '版权信息',
            'user_money_transfer' => '启用用户间转账功能',
            'site_key' => 'Azuriom.com 站点密钥',
            'site_key_info' => '已购买的付费插件需要 azuriom.com 站点密钥才能安装。您可在您的 <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom 个人资料</a> 中获取站点密钥。',
            'webhook' => '帖子 Discord Webhook URL',
            'webhook_info' => '当创建新帖子时, Discord webhook 到此 URL (如果发布时间不是未来). 留空则禁用.',
        ],

        'security' => [
            'title' => '安全设置',

            'captcha' => [
                'title' => '验证码',
                'site_key' => '站点密钥',
                'secret_key' => '密钥',
                'recaptcha' => '您可在 <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCAPTCHA 网站</a> 获取 reCAPTCHA 密钥。您需要使用 reCAPTCHA <strong>v2 隐形</strong> 密钥。',
                'hcaptcha' => '您可在 <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">hCaptcha 网站</a> 上获取 hCaptcha 密钥。',
                'turnstile' => '你可以在 <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare 管理面板</a> 获取 Turnstil 密钥. 小组件类型必须选择 "托管".',
            ],

            'hash' => '加密算法',
            'hash_error' => '您当前的 PHP 版本不支持此加密算法。',
            'force_2fa' => '访问管理面板需要启用两步认证 (2FA)',
        ],

        'performances' => [
            'title' => '性能设置',

            'cache' => [
                'title' => '清除缓存',
                'clear' => '清除缓存',
                'description' => '清除网站缓存。',
                'error' => '清除缓存时出错。',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost 通过添加额外的专用缓存层来提高您的网站性能。',
                'info' => '若启用某拓展后出现问题，您应重载缓存。',

                'enable' => '启用 AzBoost',
                'disable' => '禁用 AzBoost',
                'reload' => '重载 AzBoost',

                'status' => 'AzBoost 目前 :status.',
                'enabled' => '已启用',
                'disabled' => '已禁用',

                'error' => '启用 AzBoost 时出错。',
            ],
        ],

        'seo' => [
            'title' => 'SEO 设置',

            'html' => '你可以在所有页面的 <code>&lt;head&gt;</code> 或 <code>&lt;body&gt;</code> 中添加 HTML (例如 cookie 提示或网站分析) 只需要在 <code>resources/views/custom/</code> 文件夹下创建 <code>head.blade.php</code> 或 <code>body.blade.php</code>',
            'home_message' => '主页信息',

            'welcome_alert' => [
                'enable' => '是否启用欢迎弹窗',
                'message' => '欢迎弹窗信息',
                'info' => '此弹窗将在用户首次访问网站时弹出。',
            ],
        ],

        'auth' => [
            'title' => '认证',

            'conditions' => '注册时需要接受的条款',
            'conditions_info' => '链接使用 Markdown 格式, 例如: <code>我同意 [服务条款](/conditions-link) 与 [隐私政策](/privacy-policy)</code>',
            'registration' => '允许新用户注册',
            'registration_info' => '但仍可能通过插件注册。',
            'api' => '启用认证 API',
            'api_info' => '此 API 为您的游戏服务器添加自定义认证。对于使用启动器的 Minecraft 服务器，您可使用 <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> 进行简单集成。',
            'user_change_name' => '允许用户在个人资料中更改自己的用户名',
            'user_delete' => '允许用户在个人资料中删除自己的帐户',
        ],

        'mail' => [
            'title' => '邮箱设置',
            'from' => '用于发送邮件的电子邮件地址。',
            'mailer' => '邮件类型',
            'mailer_info' => 'Azuriom 支持 SMTP 和 Sendmail 发送电子邮件。 您可以在我们的 <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">文档</a> 中找到有关邮件配置的更多信息.',
            'disabled' => '当电子邮件被禁用时，用户如果忘记密码，将无法重置密码',
            'sendmail' => '不推荐使用 Sendmail ，您应该尽可能使用 SMTP 服务器',
            'smtp' => [
                'host' => 'SMTP 主机地址',
                'port' => 'SMTP 主机端口',
                'encryption' => '加密协议',
                'username' => 'SMTP 服务器用户名',
                'password' => 'SMTP 服务器密码',
            ],
            'verification' => '启用用户邮箱验证',
            'send' => '发送测试电子邮件',
            'sent' => '测试邮件已成功发送',
            'missing' => '您的帐户上没有设定电子邮件地址。',
        ],

        'maintenance' => [
            'title' => '维护设置',

            'enable' => '启用维护',
            'message' => '维护消息',
            'global' => '全局启用维护',
            'paths' => '维护期间要屏蔽的路径',
            'info' => '您可以使用 <code>/*</code> 屏蔽所有以相同路径开头的页面。 例如， <code>/news/*</code> 将阻止所有 news 目录下的访问。',
        ],

        'updated' => '设置已更新.',
    ],

    'navbar_elements' => [
        'title' => '导航栏',
        'edit' => '编辑导航栏元素 :element',
        'create' => '创建导航栏元素',

        'restrict' => '限制能够看到此元素的角色',
        'dropdown' => '当此元素被保存时，您可以将元素添加到这个下拉列表中',

        'fields' => [
            'home' => '首页',
            'link' => '外部链接',
            'page' => '页面',
            'post' => '帖子',
            'posts' => '帖子列表',
            'plugin' => '插件',
            'dropdown' => '下拉列表',
            'new_tab' => '在新标签页中打开',
        ],

        'updated' => '导航栏已更新.',
        'not_empty' => '您不能删除带元素的下拉菜单',
    ],

    'social_links' => [
        'title' => '社区链接',
        'edit' => '编辑社区链接',
        'create' => '添加社区链接',
    ],

    'servers' => [
        'title' => '服务器',
        'edit' => '编辑服务器 :server',
        'create' => '添加服务器',

        'default' => '默认服务器',
        'default_info' => '如果当前主题支持，则默认服务器的在线玩家数量将显示在网站上.',

        'home_display' => '在主页上显示此服务器',
        'url' => '加入按钮链接',
        'url_info' => '留空以显示服务器地址。 可以是下载游戏/启动器的链接，也可以是连接服务器的URL，如 <code>steam://connect/&lt;ip&gt;</code>。',

        'ping_info' => 'Ping 连接不需要插件，但是你不能用它执行命令',
        'query_info' => '使用 query 连接，无法在服务器上执行命令.',

        'query_port_info' => '如果与游戏端口相同，可以为空.',

        'verify' => '测试即时指令',

        'rcon_password' => 'Rcon 密码',
        'rcon_port' => 'Rcon 端口',
        'query_port' => 'Query 端口',
        'unturned_info' => 'SRCDS RCON 类型仅适用于 OpenMod. 不兼容 RocketMod RCON.',

        'azlink' => [
            'port' => 'AzLink 端口',

            'link' => '使用 AzLink 将您的服务器与网站连接:',
            'link1' => '<a href="https://azuriom.com/azlink">下载 AzLink</a> 并安装在您的 Minecraft 服务器上.',
            'link2' => '重启服务器',
            'link3' => '在服务器上执行此命令： ',

            'info' => '如果您在使用 AzLink 遇到了问题并且使用了 Cloudflare 或 防火墙，请参见 <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">常见问题</a>',
            'command' => '您可以使用指令进行连接: ',
            'port_command' => '如果您使用了非 AzLink 默认的端口，您必须用命令配置它： ',
            'ping' => '启用即时命令 (需要在服务器上打开端口)',
            'ping_info' => '当未启用即时命令时，命令将在 30 秒到 1 分钟内执行。',
            'custom_port' => '使用自定义 AzLink 端口',

            'error' => '服务器连接失败，地址和/或端口不正确，或端口已关闭。',
            'badresponse' => '服务器连接失败 (代码 :code), 令牌无效或服务器配置错误。 您可以重新使用连接命令来解决这个问题',
        ],

        'players' => ':count 玩家 |:count 玩家',
        'offline' => '离线',

        'connected' => '已成功连接到服务器！',
        'error' => '连接服务器失败，请稍后重试。:error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'Source RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM status',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff 服务器', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => '用户',
        'edit' => '编辑用户 :user',
        'create' => '创建用户',

        'registered' => '注册时间',
        'last_login' => '上次登录',
        'ip' => 'IP 地址',

        'admin' => '管理员',
        'banned' => '已封禁',
        'deleted' => '已删除',

        'ban' => '封禁',
        'unban' => '解除封禁',
        'delete' => '删除',

        'alert-deleted' => '此用户已被删除，无法编辑',
        'alert-banned' => [
            'title' => '此用户目前被禁止：',
            'banned-by' => '封禁人: :author',
            'reason' => '原因：:reason',
            'date' => '日期: :date',
        ],

        'edit_profile' => '编辑资料',

        'info' => '用户信息',

        'ban-title' => '禁止用户 :user',
        'ban-description' => '您确定要封禁此用户吗？',

        'email' => [
            'verify' => '验证电子邮箱',
            'verified' => '电子邮件地址已验证',
            'date' => '已于 :date 验证',
            'verify_success' => '电子邮件地址验证成功.',
        ],

        '2fa' => [
            'title' => '两步验证',
            'secured' => '2FA 已启用',
            'disable' => '禁用两步验证 (2FA)',
            'disabled' => '两步验证已禁用.',
        ],

        'password' => [
            'title' => '上次密码修改时间',
            'force' => '强制更换',
            'forced' => '必须修改密码',
        ],

        'status' => [
            'banned' => '此用户已被禁止',
            'unbanned' => '此用户已被取消封禁',
        ],

        'discord' => '已连接 Discord 账号',

        'notify' => '发送通知',
        'notify_info' => '向此用户发送通知',
        'notify_all' => '向所有用户发送通知',
    ],

    'roles' => [
        'title' => '角色',
        'edit' => '编辑角色 :role (#:id)',
        'create' => '创建角色',

        'info' => '(ID: :id, 权重: :power)',

        'default' => '默认​​​​​',
        'admin' => '管理员',
        'admin_info' => '当该组是管理员时，将拥有所有权限',

        'updated' => '角色已更新.',
        'unauthorized' => '权限等级不足.',
        'add_admin' => '您不能将管理员权限添加到角色.',
        'remove_admin' => '您不能删除您角色的管理员权限.',
        'delete_default' => '此角色不能被删除.',
        'delete_own' => '您不能删除自己的角色.',

        'discord' => [
            'title' => '链接 Discord 角色',
            'enable' => '启用 Discord 角色链接',
            'enable_info' => '启用后, 在 Discord 编辑角色, 并在 <b>Links</b> 栏中添加一个 Requirement. 用户可以在服务器菜单 <b>Linked Roles</b> 中获取到他们的 Discord 角色,',
            'info' => '您需要前往 <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> 创建一个 Application，并设置 <b>Linked Role Verification URL</b> 为 <code>:url</code>',
            'oauth' => '然后前往 <b>OAuth2 -> General</b>, 您需要将 <code>:url</code> 添加到 <b>Redirects</b>.',
            'token_info' => 'Bot token 可以通过在 Application 中创建一个 Bot 获取, 您只需要前往 Discord 开发者面板 左侧的 <b>Bot</b> 栏.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => '评论一个帖子',
        'delete-other-comments' => '从另一个用户删除一个帖子评论',
        'maintenance-access' => '维护期间访问网站',
        'admin-access' => '访问管理员控制面板',
        'admin-logs' => '查看和管理站点日志',
        'admin-images' => '查看和管理图像',
        'admin-navbar' => '查看和管理导航栏',
        'admin-pages' => '查看和管理页面',
        'admin-redirects' => '查看与管理重定向',
        'admin-posts' => '查看和管理帖子',
        'admin-settings' => '查看和管理设置',
        'admin-users' => '查看和管理用户',
        'admin-themes' => '查看和管理主题',
        'admin-plugins' => '查看和管理插件',
    ],

    'bans' => [
        'title' => '封禁',

        'by' => '封禁者:',
        'reason' => '理由',
        'removed' => '由 :user 删除 :date',
    ],

    'posts' => [
        'title' => '帖子',
        'edit' => '编辑帖子 :post',
        'create' => '创建贴子',

        'published_info' => '此帖子将在此日期之前不会公开.',
        'pin' => '置顶此条帖子',
        'pinned' => '已置顶',
        'feed' => '帖子的 RSS/Atom 订阅分别在 <code>:rss</code> 和 <code>:atom</code> 上。',
    ],

    'pages' => [
        'title' => '页面',
        'edit' => '编辑页面 #:page',
        'create' => '创建页面',

        'enable' => '启用页面',
        'restrict' => '限制能看到此页面的角色',
    ],

    'redirects' => [
        'title' => '重定向',
        'edit' => '编辑重定向 :redirect',
        'create' => '创建重定向',

        'enable' => '启用重定向',
        'source' => '源',
        'destination' => '目标',
        'code' => '状态码',

        '301' => '301 - 永久重定向',
        '302' => '302 - 临时重定向',
    ],

    'images' => [
        'title' => '图片',
        'edit' => '编辑图像 :image',
        'create' => '上传图片',
        'help' => '如果图像未加载, 请尝试 <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a> 中提供的步骤.',
    ],

    'extensions' => [
        'buy' => '购买 :price',
    ],

    'plugins' => [
        'title' => '插件',

        'list' => '已安装的插件',
        'available' => '可用插件',

        'requirements' => [
            'api' => '此插件版本与 Azuriom v:version 不兼容.',
            'azuriom' => '此插件与您的 Azuriom 版本不兼容.',
            'game' => '此插件与游戏 :game 不兼容',
            'plugin' => '插件 ":plugin" 缺失或其版本不兼容此插件',
        ],

        'reloaded' => '插件已重新加载.',
        'enabled' => '插件已启用.',
        'disabled' => '插件已禁用.',
        'updated' => '插件已更新.',
        'installed' => '插件安装成功.',
        'deleted' => '插件已删除.',
        'delete_enabled' => '必须先禁用插件才能删除.',
    ],

    'themes' => [
        'title' => '主题',

        'current' => '当前主题',
        'author' => '作者：:author',
        'version' => '版本: :version',
        'list' => '已安装的主题',
        'available' => '可用主题',
        'no-enabled' => '您没有启用任何主题',
        'legacy' => '此主题版本与 Azuriom v:version 不兼容.',

        'config' => '编辑配置',
        'disable' => '禁用主题',

        'reloaded' => '主题已重新加载.',
        'no_config' => '此主题没有配置文件.',
        'config_updated' => '主题配置已更新.',
        'invalid' => '此主题无效 (主题文件夹名称必须是主题 id)。',
        'updated' => '主题已更新.',
        'installed' => '主题安装成功.',
        'deleted' => '主题已删除.',
        'delete_current' => '您不能删除当前主题.',
    ],

    'update' => [
        'title' => '更新',

        'has_update' => '发现新版本',
        'no_update' => '暂无更新',
        'check' => '检查更新',

        'update' => 'Azuriom的版本 <code>:last-version</code> 可用，您目前的版本 <code>:version</code>',
        'changelog' => '<a href=":url" target="_blank" rel="noopener noreferrer">点击查看更新日志</a>',
        'download' => 'Azuriom的最新版本已准备好下载。',
        'install' => 'Azuriom的最新版本已下载，已准备就绪。',

        'backup' => '在更新 Azuriom 之前，您应该备份您的网站！',

        'latest_version' => '您正在运行最新版本的 Azuriom: <code>:version</code>。',
        'latest' => '您正在使用最新版本的 Azuriom.',

        'downloaded' => '最新版本已下载，现可安装.',
        'installed' => '更新安装成功.',
    ],

    'logs' => [
        'title' => '日志',

        'clear' => '清除旧日志 (15 天前)',
        'cleared' => '旧日志已删除.',
        'changes' => '变更',
        'old' => '原值',
        'new' => '新值',

        'pages' => [
            'created' => '创建页面 #:id',
            'updated' => '更新页面 #:id',
            'deleted' => '删除页面 #:id',
        ],

        'posts' => [
            'created' => '创建帖子 #:id',
            'updated' => '更新帖子 #:id',
            'deleted' => '已删除的帖子',
        ],

        'images' => [
            'created' => '创建图像 #:id',
            'updated' => '更新图像 #:id',
            'deleted' => '删除图像 #:id',
        ],

        'redirects' => [
            'created' => '已创建重定向 #:id',
            'updated' => '已更新重定向 #:id',
            'deleted' => '已删除重定向 #:id',
        ],

        'roles' => [
            'created' => '创建角色 #:id',
            'updated' => '更新角色 #:id',
            'deleted' => '删除角色 #:id',
        ],

        'servers' => [
            'created' => '创建服务器 #:id',
            'updated' => '更新服务器 #:id',
            'deleted' => '删除服务器 #:id',
        ],

        'users' => [
            'updated' => '新用户 #:id',
            'deleted' => '删除用户 #:id',
            'transfer' => '向用户 #:id 发送货币 :money',

            'login' => '成功登录于 :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => '已启用两步验证',
                'disabled' => '已禁用两步验证',
            ],
        ],

        'settings' => [
            'updated' => '更新设置',
        ],

        'updates' => [
            'installed' => '已安装 Azuriom 更新',
        ],

        'plugins' => [
            'enabled' => '启用插件',
            'disabled' => '禁用插件',
        ],

        'themes' => [
            'changed' => '更改主题',
            'configured' => '已更新主题配置',
        ],
    ],

    'errors' => [
        'back' => '返回仪表板',
        '404' => '找不到网页',
        'info' => '看起来你在矩阵中发现了一处小暗色...',
        '2fa' => '您必须启用两步验证才能访问此页面.',
    ],
];
