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
                'maintenance' => 'Maintenance',
            ],
            'navbar' => 'Navbar',
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
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Profile',
        ],

        'back-website' => 'Go back to website',
    ],

    'notifications' => [
        'notifications' => 'Notifications',
        'mark-as-read' => 'Mark as read',
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

        'https-warning' => 'Your website is not using https, you should enable and force it for your security and the one of the users.',
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
            'logo' => 'Logo',
            'timezone' => 'Timezone',
            'locale' => 'Locale',
            'copyright' => 'Copyright',
            'conditions-url' => 'Conditions URL',
            'enable-user-registration' => 'Enable user registration',
            'enable-user-registration-label' => 'It can still be possible to register through plugins.',
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
            'recaptcha-info' => '<small>You can get reCaptcha keys on the <a href="https://www.google.com/recaptcha/" target="_blank"> Google reCaptcha website</a>.</small> <small>You need to use reCaptcha <strong>v2 invisible</strong> keys.</small>',

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
                    'disable-error' => 'Error while disabling RocketBooster.',
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
            'google-analytics-info' => 'You can get the site id on the <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics website</a>.',
            'meta' => 'Meta keywords',
            'meta-info' => 'The keywords must be separated with a comma.',
        ],

        'status' => [
            'updated' => 'The settings have been updated.',
        ]
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
            'dropdown' => 'Dropdown',
            'new-tab' => 'Open in new tab',
        ],

        'status' => [
            'nav-updated' => 'Navbar updated.',

            'created' => 'The navbar element has been created.',
            'updated' => 'This navbar element has been updated.',
            'deleted' => 'This navbar element has been deleted.',
        ]
    ],

    'users' => [
        'title' => 'Users',
        'title-edit' => 'Edit user :user',
        'title-create' => 'Create user',

        'fields' => [
            'name' => 'Username',
            'email' => 'E-Mail Address',
            'role' => 'Role',
            'password' => 'Password',
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
        ]
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
        ]
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
        ]
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Edit image :image',
        'title-create' => 'Upload image',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Installed plugins',

        'actions' => [
            'reload' => 'Reload plugins',
        ],

        'status' => [
            'reloaded' => 'The plugins have been reloaded.',
            'enabled' => 'The plugin has been enabled.',
            'disabled' => 'The plugin has been disabled.',
        ]
    ],

    'themes' => [
        'title' => 'Themes',

        'current' => [
            'title' => 'Current theme',
            'author' => 'Author: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Installed themes',
        'no-enabled' => 'You don\'t have any theme enable.',

        'actions' => [
            'edit-config' => 'Edit config',
            'disable' => 'Disable theme',
        ],

        'status' => [
            'no-config' => 'This theme don\'t have config.',
            'invalid' => 'This theme is invalid.',
            'updated' => 'The theme has been updated.',
        ]
    ],

    'logs' => [
        'title' => 'Logs',

        'fields' => [
            'target' => 'Target',
        ],

        'actions' => [
            'clear' => 'Clear old logs (15d+)',
        ],

        'status' => [
            'cleared' => 'The old logs has been deleted.',
        ],
    ],
];
