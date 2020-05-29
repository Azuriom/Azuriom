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
            'settings' => [
                'settings' => 'Settings',
                'global' => 'Global',
                'security' => 'Security',
                'performances' => 'Performances',
                'seo' => 'SEO',
                'mail' => 'Mail',
                'maintenance' => 'Maintenance',
            ],
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

        'back-website' => 'Go back to website',

        'support' => 'Support',
        'documentation' => 'Documentation',
    ],

    'confirm-delete' => [
        'title' => 'Delete ?',
        'description' => 'Are you sure you want to delete this ? It can\'t be undo !',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel designed by :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Dashboard',

        'new-update' => 'A new version of Azuriom is available: :version',
        'https-warning' => 'Your website is not using https, you should enable and force it for your security and the one of the users.',
        'proxy-warning' => 'If you are using Cloudflare, you should install the Cloudflare Support plugin.',
        'recent-users' => 'Recent users',
        'active-users' => 'Active users',

        'users' => 'Users',
        'posts' => 'Posts',
        'pages' => 'Pages',
        'images' => 'Images',
    ],

    'settings' => [
        'index' => [
            'title' => 'Global settings',

            'site-name' => 'Site Name',
            'site-url' => 'Site URL',
            'site-description' => 'Site Description',
            'favicon' => 'Favicon',
            'background' => 'Background',
            'logo' => 'Logo',
            'timezone' => 'Timezone',
            'locale' => 'Locale',
            'copyright' => 'Copyright',
            'conditions-url' => 'Conditions URL',
            'enable-user-registration' => 'Enable user registration',
            'enable-user-registration-label' => 'It can still be possible to register through plugins.',
            'auth-api' => 'Enable Auth API',
            'auth-api-label' => 'This API allows you to add a custom authentication to your game server. For Minecraft servers using a launcher, you can use <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> for an easy and quick integration.',
            'minecraft-verification' => 'Enable Minecraft username verification with minecraft.net',
            'user-money-transfer' => 'Allow money transfer between users',
            'site-key' => 'Site key for azuriom.com',
            'site-key-label' => 'The azuriom.com site key is required to install premiums extensions purchased on the market. You can obtain your site key in your <a href="https://azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom profile</a>.',
        ],

        'maintenance' => [
            'title' => 'Maintenance settings',

            'enable' => 'Enable maintenance',
            'message' => 'Maintenance message',
        ],

        'security' => [
            'title' => 'Security settings',

            'recaptcha' => 'Enable Google reCaptcha protection',
            'recaptcha-site-key' => 'Site key',
            'recaptcha-secret-key' => 'Secret key',
            'recaptcha-info' => 'You can get reCaptcha keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCaptcha website</a>. You need to use reCaptcha <strong>v2 invisible</strong> keys.',

            'hash' => 'Hash algorithm',
            'hash-info' => 'Argon2id is the most secure algorithm but it requires PHP 7.3 or higher. If you are running PHP 7.2 you should use Argon2i.',
            'hash-error' => 'This hash algorithm is not supported by your current PHP version.',
        ],

        'performances' => [
            'title' => 'Performance settings',

            'cache' => [
                'title' => 'Clear Cache',
                'description' => 'Clear the website cache.',

                'status' => [
                    'cleared' => 'Cache cleared with success.',
                    'clear-error' => 'Error while clearing cache.',
                ],

                'actions' => [
                    'clear' => 'Clear Cache',
                ],
            ],

            'boost' => [
                'title' => 'RocketBooster',
                'description' => 'RocketBooster improves your website performances by adding one more exclusive cache layer.',
                'info' => 'If you have some issues after enabling an extension you should reload the cache.',

                'current' => [
                    'status' => 'RocketBooster is currently :status.',
                    'enabled' => '<span class="text-success">enabled</span>',
                    'disabled' => '<span class="text-danger">disabled</span>',
                ],

                'status' => [
                    'enabled' => 'RocketBooster is now enabled.',
                    'disabled' => 'RocketBooster is now disabled.',
                    'reloaded' => 'RocketBooster was reloaded.',

                    'enable-error' => 'Error while enabling RocketBooster.',
                ],

                'actions' => [
                    'enable' => 'Enable RocketBooster',
                    'disable' => 'Disable RocketBooster',
                    'reload' => 'Reload RocketBooster',
                ],
            ],
        ],

        'seo' => [
            'title' => 'SEO settings',

            'google-analytics' => 'Google Analytics site id',
            'google-analytics-info' => 'You can get the site id on the <a href="https://www.google.com/analytics/web/" target="_blank" rel="noopener noreferrer"> Google Analytics website</a>.',
            'meta' => 'Meta keywords',
            'meta-info' => 'The keywords must be separated with a comma.',

            'html-head-code' => 'HTML code to include in the <head> of all pages.',
            'html-body-code' => 'HTML code to include in the <body> of all pages.',

            'html-code-info' => 'E.g: Cookie banner, etc',

            'welcome-popup' => [
                'enable' => 'Enable welcome popup ?',
                'message' => 'Welcome Popup Message',
                'info' => 'This popup will be displayed the first time a user visits the site.',
            ],
        ],

        'mail' => [
            'title' => 'Mail settings',

            'from-address' => 'E-Mail address used to send e-mails.',
            'driver' => 'E-Mail type',
            'driver-info' => 'Azuriom supports SMTP and Sendmail for sending e-mails. You can find more information on the mail configuration on our <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentation</a>.',
            'smtp' => [
                'host' => 'SMTP Host Address',
                'port' => 'SMTP Host Port',
                'encryption' => 'Encryption Protocol',
                'username' => 'SMTP Server Username',
                'password' => 'SMTP Server Password',
            ],
        ],

        'status' => [
            'updated' => 'The settings have been updated.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Edit navbar element :element',
        'title-create' => 'Create navbar element',

        'dropdown-info' => 'You can add elements to this dropdown when this element is save.',

        'fields' => [
            'home' => 'Home',
            'link' => 'External link',
            'page' => 'Page',
            'post' => 'Post',
            'posts' => 'Posts list',
            'plugin' => 'Plugin',
            'dropdown' => 'Dropdown',
            'new-tab' => 'Open in new tab',
        ],

        'status' => [
            'nav-updated' => 'Navbar updated.',

            'created' => 'The navbar element has been created.',
            'updated' => 'This navbar element has been updated.',
            'deleted' => 'This navbar element has been deleted.',

            'not-empty' => 'You cannot delete dropdown with elements.',
        ],
    ],

    'servers' => [
        'title' => 'Servers',
        'title-edit' => 'Edit server :server',
        'title-create' => 'Add server',

        'default-server' => 'Default server',

        'ping-no-commands' => 'The ping link don\'t need a plugin, but you can\'t execute command with this link.',

        'fields' => [
            'address' => 'Address',
            'port' => 'Port',
            'status' => 'Status',

            'rcon-password' => 'Rcon Password',
            'rcon-port' => 'Rcon Port',
            'query-port' => 'Source Query Port',

            'azlink-port' => 'AzLink Port',
        ],

        'actions' => [
            'verify-connection' => 'Verify the connection',
        ],

        'azlink' => [
            'link' => 'To link Minecraft to your website using AzLink:',
            'link-1' => '<a href="https://azuriom.com/azlink">Download the plugin AzLink</a> and install it on your server.',
            'link-2' => 'Restart the server.',
            'link-3' => 'Execute this command on the server: ',

            'link-info' => 'You can link your Minecraft server to your website with the command: ',
            'port-info' => 'If you are using a different AzLink port than the default, you must configure it with the command: ',

            'custom-port' => 'Use a custom AzLink port',
        ],

        'players' => ':count player|:count players',
        'offline' => 'Offline',

        'status' => [
            'created' => 'The server has been added.',
            'updated' => 'The server has been updated.',
            'deleted' => 'The server has been deleted.',

            'connect-success' => 'The connection to the server has been made successfully!',
            'connect-error' => 'The connection to the server failed: :error',

            'not-azlink' => 'This server is not connected via AzLink.',
            'azlink-connect' => 'The connection to the server has failed, the address and/or port are incorrect, or the port is closed.',
            'azlink-badresponse' => 'The connection to the server has failed (code :code), the token is invalid or the server is misconfigured. You can redo the link command to fix this.',
        ],

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft Rcon',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'Source RCON',
        ],
    ],

    'users' => [
        'title' => 'Users',
        'title-edit' => 'Edit user :user',
        'title-create' => 'Create user',

        'fields' => [
            'register-date' => 'Register at',
            'email-verified' => 'E-Mail Address verified',
            '2fa' => 'Two Factor Authentication',
            'ip' => 'IP Address',
        ],

        'info' => [
            'admin' => 'Admin',
            'banned' => 'Banned',
            'deleted' => 'Deleted',
        ],

        'actions' => [
            'ban' => 'Ban',
            'unban' => 'Unban',
            'delete' => 'Delete',
            'verify-email' => 'Verify email',
            'disable-2fa' => 'Disable 2fa',
        ],

        'alert-deleted' => 'This user is deleted, it can\'t be edited.',
        'alert-banned' => [
            'title' => 'This user is currently banned:',
            'banned-by' => 'Banned by: :author',
            'reason' => 'Reason: :reason',
            'date' => 'Date: :date',
        ],

        'edit-profile' => 'Edit profile',

        'user-info' => 'User information',

        'ban-title' => 'Ban :user',
        'ban-description' => 'Are you sure you want to ban this user ?',

        'status' => [
            'created' => 'The user has been created.',
            'updated' => 'This user has been updated.',
            'deleted' => 'This user has been deleted.',

            'email-verified' => 'The E-Mail Address has been verified.',
            '2fa-disabled' => 'The Two Factor Authentication has been disabled.',

            'banned' => 'This user is now banned.',
            'unbanned' => 'This user has been unbanned.',
        ],
    ],

    'roles' => [
        'title' => 'Roles',
        'title-edit' => 'Edit role :role',
        'title-create' => 'Create role',

        'permissions' => 'Permissions',
        'perm-admin' => [
            'label' => 'Administrator',
            'info' => 'When the group is admin it has all the permissions.',
        ],

        'info' => [
            'default' => 'Default',
            'admin' => 'Admin',
        ],

        'status' => [
            'power-updated' => 'The roles have been updated.',
            'created' => 'The role has been created.',
            'updated' => 'This role has been updated.',
            'deleted' => 'This role has been deleted.',

            'add-admin' => 'You can\'t add the admin permission to a role.',
            'remove-admin' => 'You can\'t remove the admin permission of your role.',
            'permanent-role' => 'This role cannot be deleted.',
            'own-role' => 'You cannot delete your role.',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Comment a post',
        'delete-other-comments' => 'Delete a post comment from another user',
        'admin-access' => 'Access to the admin dashboard',
        'admin-logs' => 'View and manage site logs',
        'admin-images' => 'View and manage images',
        'admin-navbar' => 'View and manage navbar',
        'admin-pages' => 'View and manage pages',
        'admin-posts' => 'View and manage posts',
        'admin-settings' => 'View and manage settings',
        'admin-themes' => 'View and manage themes',
        'admin-plugins' => 'View and manage plugins',
    ],

    'bans' => [
        'title' => 'Bans',

        'fields' => [
            'banned-by' => 'Banned by',
            'reason' => 'Reason',
        ],

        'removed' => 'Removed the :date by :user',
    ],

    'posts' => [
        'title' => 'Posts',
        'title-edit' => 'Edit post :post',
        'title-create' => 'Create post',

        'published-info' => 'This post will not be visible publicly until this date.',

        'fields' => [
            'published-at' => 'Published at',
        ],

        'pin' => 'Pin this post',

        'status' => [
            'created' => 'The post has been created.',
            'updated' => 'This post has been modified.',
            'deleted' => 'This post has been deleted.',
        ],

        'info' => [
            'pinned' => 'Pinned',
        ],
    ],

    'pages' => [
        'title' => 'Pages',
        'title-edit' => 'Edit page #:page',
        'title-create' => 'Create page',

        'enable' => 'Enable the page',

        'status' => [
            'created' => 'The page has been created.',
            'updated' => 'This page has been updated.',
            'deleted' => 'This page has been deleted.',
        ],
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Edit image :image',
        'title-create' => 'Upload image',

        'status' => [
            'created' => 'The image has been created.',
            'updated' => 'This image has been updated.',
            'deleted' => 'This image has been deleted.',
        ],
    ],

    'extensions' => [
        'buy' => 'Buy for :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Installed plugins',
        'available' => 'Available plugins',

        'status' => [
            'reloaded' => 'The plugins have been reloaded.',
            'enabled' => 'The plugin has been enabled.',
            'disabled' => 'The plugin has been disabled.',
            'updated' => 'The plugin has been updated.',
            'installed' => 'The plugin has been installed.',
            'deleted' => 'The plugin has been deleted.',

            'error-delete' => 'The plugin must be disabled before it can be delete.',
        ],
    ],

    'themes' => [
        'title' => 'Themes',

        'current' => [
            'title' => 'Current theme',
            'author' => 'Author: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Installed themes',
        'available' => 'Available themes',
        'no-enabled' => 'You don\'t have any theme enable.',

        'actions' => [
            'edit-config' => 'Edit config',
            'disable' => 'Disable theme',
        ],

        'status' => [
            'reloaded' => 'The themes have been reloaded.',
            'no-config' => 'This theme don\'t have config.',
            'config-updated' => 'The theme config has been updated.',
            'invalid' => 'This theme is invalid.',
            'updated' => 'The theme has been updated.',
            'installed' => 'The theme has been installed.',
            'deleted' => 'The theme has been deleted.',

            'error-delete' => 'You can\'t delete the current theme.',
        ],
    ],

    'update' => [
        'title' => 'Update',

        'subtitle-update' => 'Update available',
        'subtitle-no-update' => 'No updates available',

        'update' => 'The version <code>:last-version</code> of Azuriom is available and you are on version <code>:version</code>.',
        'download' => 'The latest version of Azuriom is ready for download.',
        'install' => 'The latest version of Azuriom has been downloaded and is ready to be installed.',

        'backup-info' => 'Before updating Azuriom, you should make a backup of your site !',

        'up-to-date' => 'You are running the latest version of Azuriom: <code>:version</code>.',

        'status' => [
            'download-success' => 'The latest version has been downloaded, you can now install it.',
            'install-success' => 'The update has been installed successfully.',

            'up-to-date' => 'You are using the latest version of Azuriom.',
            'error-fetch' => 'An error occurred while fetching updates: :error',
            'error-download' => 'An error occurred while downloading: :error',
            'error-install' => 'An error occurred while installing: :error',
        ],

        'actions' => [
            'check' => 'Check updates',
            'install' => 'Install',
            'download' => 'Download',
        ],
    ],

    'logs' => [
        'title' => 'Logs',

        'actions' => [
            'clear' => 'Clear old logs (15d+)',
        ],

        'status' => [
            'cleared' => 'The old logs has been deleted.',
        ],

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
        ],
    ],

    'errors' => [
        'back' => 'Back to Dashboard',
        '404' => 'Page Not Found',
        'info' => 'It looks like you found a glitch in the matrix...',
    ],
];
