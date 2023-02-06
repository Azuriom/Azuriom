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
        'dashboard' => 'Dashboard',
        'settings' => [
            'heading' => 'Settings',
            'settings' => 'Settings',
            'global' => 'Global',
            'security' => 'Security',
            'performances' => 'Performance',
            'seo' => 'SEO',
            'auth' => 'Authentication',
            'mail' => 'Mail',
            'maintenance' => 'Maintenance',
            'social' => 'Social links',
            'navbar' => 'Navbar',
            'servers' => 'Servers',
        ],

        'users' => [
            'heading' => 'Users',
            'users' => 'Users',
            'roles' => 'Roles',
            'bans' => 'Bans',
        ],

        'content' => [
            'heading' => 'Content',
            'pages' => 'Pages',
            'posts' => 'Posts',
            'images' => 'Images',
            'redirects' => 'Redirections',
        ],

        'extensions' => [
            'heading' => 'Extensions',
            'plugins' => 'Plugins',
            'themes' => 'Themes',
        ],

        'other' => [
            'heading' => 'Other',
            'update' => 'Update',
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Profile',
        ],

        'back' => 'Go back to website',
        'support' => 'Support',
        'documentation' => 'Documentation',
    ],

    'delete' => [
        'title' => 'Delete?',
        'description' => 'Are you sure you want to delete this? You won\'t be able to go back!',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel designed by :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Dashboard',

        'users' => 'Users',
        'posts' => 'Posts',
        'pages' => 'Pages',
        'images' => 'Images',

        'update' => 'A new version of Azuriom is available: :version',
        'http' => 'Your website is not using https, you should enable and force it for your security and the one of the users.',
        'cloudflare' => 'If you are using Cloudflare, you should install the Cloudflare Support plugin.',
        'recent_users' => 'Recent users',
        'active_users' => 'Active users',
        'emails' => 'Emails are disabled. If a user forgets his password he will not be able to reset it. You can enable emails in the <a href=":url">mail settings</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Global settings',

            'name' => 'Site Name',
            'url' => 'Site URL',
            'description' => 'Site Description',
            'meta' => 'Meta keywords',
            'meta_info' => 'The keywords must be separated with a comma.',
            'favicon' => 'Favicon',
            'background' => 'Background',
            'logo' => 'Logo',
            'timezone' => 'Timezone',
            'locale' => 'Locale',
            'money' => 'Name of the site\'s currency',
            'copyright' => 'Copyright',
            'user_money_transfer' => 'Enable money transfer between users',
            'site_key' => 'Site key for azuriom.com',
            'site_key_info' => 'The azuriom.com site key is required to install premium extensions purchased on the market. You can obtain your site key in your <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom profile</a>.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => 'Security settings',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Site key',
                'secret_key' => 'Secret key',
                'recaptcha' => 'You can get reCaptcha keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCaptcha website</a>. You need to use reCaptcha <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'You can get hCaptcha keys on the <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha website</a>.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Hash algorithm',
            'hash_error' => 'This hash algorithm is not supported by your current PHP version.',
            'force_2fa' => 'Require 2FA for admin panel access',
        ],

        'performances' => [
            'title' => 'Performance settings',

            'cache' => [
                'title' => 'Clear Cache',
                'clear' => 'Clear Cache',
                'description' => 'Clear the website cache.',
                'error' => 'Error while clearing cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost improves your website performances by adding one more exclusive cache layer.',
                'info' => 'If you have some issues after enabling an extension you should reload the cache.',

                'enable' => 'Enable AzBoost',
                'disable' => 'Disable AzBoost',
                'reload' => 'Reload AzBoost',

                'status' => 'AzBoost is currently :status.',
                'enabled' => 'enabled',
                'disabled' => 'disabled',

                'error' => 'Error while enabling AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'SEO settings',

            'html' => 'You can include HTML in the <code>&lt;head&gt;</code> or <code>&lt;body&gt;</code> of all pages (e.g. for cookie banner or website analytics) by creating a file named <code>head.blade.php</code> or <code>body.blade.php</code> in the <code>resources/views/custom/</code> folder.',
            'home_message' => 'Home message',

            'welcome_alert' => [
                'enable' => 'Enable welcome popup?',
                'message' => 'Welcome Popup Message',
                'info' => 'This popup will be displayed the first time a user visits the site.',
            ],
        ],

        'auth' => [
            'title' => 'Authentication',

            'conditions' => 'Conditions URL',
            'conditions_info' => 'Users will have to accept these conditions when registering.',
            'registration' => 'Enable user registration',
            'registration_info' => 'It can still be possible to register through plugins.',
            'api' => 'Enable Auth API',
            'api_info' => 'This API allows you to add a custom authentication to your game server. For Minecraft servers using a launcher, you can use <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> for an easy and quick integration.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => 'Allow users to delete their account from their profile',
        ],

        'mail' => [
            'title' => 'Mail settings',
            'from' => 'Email address used to send emails.',
            'mailer' => 'Email type',
            'mailer_info' => 'Azuriom supports SMTP and Sendmail for sending emails. You can find more information on the mail configuration on our <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentation</a>.',
            'disabled' => 'When emails are disabled, users will not be able to reset their password if they forget it.',
            'sendmail' => 'Using Sendmail is not recommended and you should instead use an SMTP server when possible.',
            'smtp' => [
                'host' => 'SMTP Host Address',
                'port' => 'SMTP Host Port',
                'encryption' => 'Encryption Protocol',
                'username' => 'SMTP Server Username',
                'password' => 'SMTP Server Password',
            ],
            'verification' => 'Enable user email address verification',
            'send' => 'Send a test email',
            'sent' => 'The test mail has been successfully sent.',
            'missing' => 'No email address has been specified on your account.',
        ],

        'maintenance' => [
            'title' => 'Maintenance settings',

            'enable' => 'Enable maintenance',
            'message' => 'Maintenance message',
            'global' => 'Enable maintenance on all the website',
            'paths' => 'Paths to block during maintenance',
            'info' => 'You can use <code>/*</code> to block all pages beginning with the same path. For example, <code>/news/*</code> will block access to all news.',
        ],

        'updated' => 'The settings have been updated.',
    ],

    'navbar_elements' => [
        'title' => 'Navbar',
        'edit' => 'Edit navbar element :element',
        'create' => 'Create navbar element',

        'restrict' => 'Limit roles that will be able to see this element',
        'dropdown' => 'You can add elements to this dropdown when this element is saved.',

        'fields' => [
            'home' => 'Home',
            'link' => 'External link',
            'page' => 'Page',
            'post' => 'Post',
            'posts' => 'Posts list',
            'plugin' => 'Plugin',
            'dropdown' => 'Dropdown',
            'new_tab' => 'Open in new tab',
        ],

        'updated' => 'Navbar updated.',
        'not_empty' => 'You cannot delete dropdown with elements.',
    ],

    'social_links' => [
        'title' => 'Social links',
        'edit' => 'Edit social link :link',
        'create' => 'Add social link',
    ],

    'servers' => [
        'title' => 'Servers',
        'edit' => 'Edit server :server',
        'create' => 'Add server',

        'default' => 'Default server',
        'default_info' => 'The number of players connected from the default server will be displayed on the site if the current theme supports it.',

        'home_display' => 'Display this server on the homepage',
        'url' => 'Join button URL',
        'url_info' => 'Leave empty to display server address. Can be a link to download the game/launcher or a URL to join the server like <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'The ping link doesn\'t need a plugin, but you can\'t execute commands with it.',
        'query_info' => 'With query link, it\'s not possible to execute commands on the server.',

        'query_port_info' => 'Can be empty if it\'s the same as the game port.',

        'verify' => 'Verify the connection',

        'rcon_password' => 'Rcon Password',
        'rcon_port' => 'Rcon Port',
        'query_port' => 'Source Query Port',

        'azlink' => [
            'port' => 'AzLink Port',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Download the plugin AzLink</a> and install it on your server.',
            'link2' => 'Restart the server.',
            'link3' => 'Execute this command on the server: ',

            'info' => 'If you are having problems with AzLink when using Cloudflare or a firewall, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => 'If you are using a different AzLink port than the default, you must configure it with the command: ',
            'ping' => 'Enable instant commands (require an open port on the server)',
            'ping_info' => 'When instant commands are not enabled, commands will be executed with a delay of 30 seconds to 1 minute.',
            'custom_port' => 'Use a custom AzLink port',

            'error' => 'The connection to the server has failed, the address and/or port are incorrect, or the port is closed.',
            'badresponse' => 'The connection to the server has failed (code :code), the token is invalid or the server is misconfigured. You can redo the link command to fix this.',
        ],

        'players' => ':count player|:count players',
        'offline' => 'Offline',

        'connected' => 'The connection to the server has been made successfully!',
        'error' => 'The connection to the server failed: :error',

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
            'flyff-server' => 'Flyff Server', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Users',
        'edit' => 'Edit user :user',
        'create' => 'Create user',

        'registered' => 'Registered at',
        'last_login' => 'Last login at',
        'ip' => 'IP Address',

        'admin' => 'Admin',
        'banned' => 'Banned',
        'deleted' => 'Deleted',

        'ban' => 'Ban',
        'unban' => 'Unban',
        'delete' => 'Delete',

        'alert-deleted' => 'This user is deleted, it can\'t be edited.',
        'alert-banned' => [
            'title' => 'This user is currently banned:',
            'banned-by' => 'Banned by: :author',
            'reason' => 'Reason: :reason',
            'date' => 'Date: :date',
        ],

        'edit_profile' => 'Edit profile',

        'info' => 'User information',

        'ban-title' => 'Ban :user',
        'ban-description' => 'Are you sure you want to ban this user?',

        'email' => [
            'verify' => 'Verify email',
            'verified' => 'Email Address verified',
            'date' => 'Yes, at :date',
            'verify_success' => 'The Email Address has been verified.',
        ],

        '2fa' => [
            'title' => 'Two Factor Authentication',
            'disable' => 'Disable 2FA',
            'disabled' => 'The Two Factor Authentication has been disabled.',
        ],

        'status' => [
            'banned' => 'This user is now banned.',
            'unbanned' => 'This user has been unbanned.',
        ],

        'notify' => 'Send a notification',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Roles',
        'edit' => 'Edit role :role',
        'create' => 'Create role',

        'default' => 'Default',
        'admin' => 'Admin',
        'admin_info' => 'When the group is admin it has all the permissions.',

        'updated' => 'The roles have been updated.',
        'unauthorized' => 'This role is higher than your own role.',
        'add_admin' => 'You can\'t add the admin permission to a role.',
        'remove_admin' => 'You can\'t remove the admin permission of your role.',
        'delete_default' => 'This role cannot be deleted.',
        'delete_own' => 'You cannot delete your role.',
    ],

    'permissions' => [
        'create-comments' => 'Comment a post',
        'delete-other-comments' => 'Delete a post comment from another user',
        'maintenance-access' => 'Access the website during a maintenance',
        'admin-access' => 'Access to the admin dashboard',
        'admin-logs' => 'View and manage site logs',
        'admin-images' => 'View and manage images',
        'admin-navbar' => 'View and manage navbar',
        'admin-pages' => 'View and manage pages',
        'admin-redirects' => 'View and manage redirections',
        'admin-posts' => 'View and manage posts',
        'admin-settings' => 'View and manage settings',
        'admin-users' => 'View and manage users',
        'admin-themes' => 'View and manage themes',
        'admin-plugins' => 'View and manage plugins',
    ],

    'bans' => [
        'title' => 'Bans',

        'by' => 'Banned by',
        'reason' => 'Reason',
        'removed' => 'Removed the :date by :user',
    ],

    'posts' => [
        'title' => 'Posts',
        'edit' => 'Edit post :post',
        'create' => 'Create post',

        'published_info' => 'This post will not be visible publicly until this date.',
        'pin' => 'Pin this post',
        'pinned' => 'Pinned',
        'feed' => 'An RSS/Atom feed for the posts is available on <code>:rss</code> and <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Pages',
        'edit' => 'Edit page #:page',
        'create' => 'Create page',

        'enable' => 'Enable the page',
        'restrict' => 'Limit roles that will be able to access this page',
    ],

    'redirects' => [
        'title' => 'Redirections',
        'edit' => 'Editing redirection :redirect',
        'create' => 'Creating redirection',

        'enable' => 'Enable redirection',
        'source' => 'Source',
        'destination' => 'Destination',
        'code' => 'Status code',

        '301' => '301 - Permanent redirect',
        '302' => '302 - Temporary redirect',
    ],

    'images' => [
        'title' => 'Images',
        'edit' => 'Edit image :image',
        'create' => 'Upload image',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Buy for :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Installed plugins',
        'available' => 'Available plugins',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v1.0.',
            'azuriom' => 'This plugin is not compatible with your Azuriom version.',
            'game' => 'This plugin is not compatible with the game :game.',
            'plugin' => 'The plugin ":plugin" is missing or its version is not compatible with this plugin.',
        ],

        'reloaded' => 'The plugins have been reloaded.',
        'enabled' => 'The plugin has been enabled.',
        'disabled' => 'The plugin has been disabled.',
        'updated' => 'The plugin has been updated.',
        'installed' => 'The plugin has been installed.',
        'deleted' => 'The plugin has been deleted.',
        'delete_enabled' => 'The plugin must be disabled before it can be deleted.',
    ],

    'themes' => [
        'title' => 'Themes',

        'current' => 'Current theme',
        'author' => 'Author: :author',
        'version' => 'Version: :version',
        'list' => 'Installed themes',
        'available' => 'Available themes',
        'no-enabled' => 'You don\'t have any themes enabled.',
        'legacy' => 'This theme version is not compatible with Azuriom v1.0.',

        'config' => 'Edit config',
        'disable' => 'Disable theme',

        'reloaded' => 'The themes have been reloaded.',
        'no_config' => 'This theme doesn\'t have config.',
        'config_updated' => 'The theme config has been updated.',
        'invalid' => 'This theme is invalid (the theme folder name must be the theme id).',
        'updated' => 'The theme has been updated.',
        'installed' => 'The theme has been installed.',
        'deleted' => 'The theme has been deleted.',
        'delete_current' => 'You can\'t delete the current theme.',
    ],

    'update' => [
        'title' => 'Update',

        'has_update' => 'Update available',
        'no_update' => 'No updates available',
        'check' => 'Check updates',

        'update' => 'The version <code>:last-version</code> of Azuriom is available and you are on version <code>:version</code>.',
        'changelog' => 'The changelog is available <a href=":url" target="_blank" rel="noopener noreferrer">here</a>.',
        'download' => 'The latest version of Azuriom is ready for download.',
        'install' => 'The latest version of Azuriom has been downloaded and is ready to be installed.',

        'backup' => 'Before updating Azuriom, you should make a backup of your site!',

        'latest_version' => 'You are running the latest version of Azuriom: <code>:version</code>.',
        'latest' => 'You are using the latest version of Azuriom.',

        'downloaded' => 'The latest version has been downloaded, you can now install it.',
        'installed' => 'The update has been installed successfully.',
    ],

    'logs' => [
        'title' => 'Logs',

        'clear' => 'Clear old logs (15d+)',
        'cleared' => 'The old logs has been deleted.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => 'Created page #:id',
            'updated' => 'Updated page #:id',
            'deleted' => 'Deleted page #:id',
        ],

        'posts' => [
            'created' => 'Created post #:id',
            'updated' => 'Updated post #:id',
            'deleted' => 'Deleted post #:id',
        ],

        'images' => [
            'created' => 'Created image #:id',
            'updated' => 'Updated image #:id',
            'deleted' => 'Deleted image #:id',
        ],

        'redirects' => [
            'created' => 'Created redirection #:id',
            'updated' => 'Updated redirection #:id',
            'deleted' => 'Deleted redirection #:id',
        ],

        'roles' => [
            'created' => 'Created role #:id',
            'updated' => 'Updated role #:id',
            'deleted' => 'Deleted role #:id',
        ],

        'servers' => [
            'created' => 'Created server #:id',
            'updated' => 'Updated server #:id',
            'deleted' => 'Deleted server #:id',
        ],

        'users' => [
            'updated' => 'Updated user #:id',
            'deleted' => 'Deleted user #:id',
            'transfer' => 'Send money :money to user #:id',

            'login' => 'Successful login from :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Enabled two-factor authentication',
                'disabled' => 'Disabled two-factor authentication',
            ],
        ],

        'settings' => [
            'updated' => 'Updated settings',
        ],

        'updates' => [
            'installed' => 'Installed Azuriom update',
        ],

        'plugins' => [
            'enabled' => 'Enabled plugin',
            'disabled' => 'Disabled plugin',
        ],

        'themes' => [
            'changed' => 'Changed theme',
            'configured' => 'Updated theme configuration',
        ],
    ],

    'errors' => [
        'back' => 'Back to Dashboard',
        '404' => 'Page Not Found',
        'info' => 'It looks like you found a glitch in the matrix...',
        '2fa' => 'You must enable two-factor auth to access this page.',
    ],
];
