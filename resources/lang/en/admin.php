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
            'logout' => 'Logout',
        ],

    ],

    'notifications' => [
        'notifications' => 'Notifications',
        'mark-as-read' => 'Mark as read',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel designed by :startbootstrap.',

    'actions' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'delete' => 'Delete',
        'save' => 'Save',
        'browse' => 'Browse',
        'choose-file' => 'Choose file',
        'upload' => 'Upload',
        'cancel' => 'Cancel',
        'enable' => 'Enable',
        'disable' => 'Disable',
    ],

    'fields' => [
        'name' => 'Name',
        'title' => 'Title',
        'action' => 'Action',
        'date' => 'Date',
        'slug' => 'Slug',
        'enabled' => 'Enabled',
        'author' => 'Author',
        'user' => 'User',
        'image' => 'Image',
        'type' => 'Type',
        'file' => 'File',
        'description' => 'Description',
        'content' => 'Content',
        'color' => 'Color',
    ],

    /*
    |
    | Admin pages
    |
    */
    'dashboard' => [
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
            'enable' => 'Enable maintenance',
            'message' => 'Maintenance message',
        ],
        'security' => [
            'recaptcha' => 'Enable Google reCaptcha protection',
            'recaptcha-site-key' => 'Site key',
            'recaptcha-secret-key' => 'Secret key',
            'recaptcha-info' => '<small>You can get reCaptcha keys on the <a href="https://www.google.com/recaptcha/" target="_blank"> Google reCaptcha website</a>.</small> <small>You need to use reCaptcha <strong>v2 invisible</strong> keys.</small>',
            'hash' => 'Hash algorithm',
            'hash-info' => 'Argon2id is the most secure algorithm but it requires PHP 7.3 or higher. If you are running PHP 7.2 you should use Argon2i.',
        ],
        'seo' => [
            'google-analytics' => 'Google Analytics site id',
            'google-analytics-info' => 'You can get the site id on the <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics website</a>.',
            'meta' => 'Meta keywords',
            'meta-info' => 'The keywords must be separated with a comma.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Edit navbar element #:id',
        'title-create' => 'Create navbar element',
    ],

    'users' => [
        'fields' => [
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'password' => 'Password',
            'register-date' => 'Register at',
            'email-verified' => 'Email verified',
            '2fa' => 'Two Factor Auth verification',
            'ip' => 'IP Address',
        ],

        'actions' => [
            'ban' => 'Ban',
            'delete' => 'Delete account',
            'verify-email' => 'Verify email',
            'disable-2fa' => 'Disable 2fa',
        ],

        'alert-deleted' => 'This user is deleted, it can\'t be edited.',
        'alert-banned' => [
            'title' => 'This user is currently banned:',
            'banned-by' => 'Banned by: :author',
            'reason' => 'Reason',
            'date' => 'Date: :date',
        ],

        'edit-profile' => 'Edit profile',

        'user-info' => 'User information',
    ],

    'roles' => [
        'title' => 'Roles',
        'title-edit' => 'Edit role #:id',
        'title-create' => 'Create role',

        'permissions' => 'Permissions',
        'perm-admin' => [
            'label' => 'Administrator',
            'info' => 'When the group is admin it has all the permissions.',
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
        'title-edit' => 'Edit post #:id',
        'title-create' => 'Create post',

        'fields' => [
            'published-at' => 'Published at',
        ],

        'pin' => 'Pin this post',

    ],

    'pages' => [
        'title' => 'Pages',
        'title-edit' => 'Edit page #:id',
        'title-create' => 'Create page',

        'enable' => 'Enable the page',
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Edit image #:id',
        'title-create' => 'Upload image',
    ],

    'extensions' => [
        'plugins' => 'Plugins',
        'themes' => 'Themes',

        'installed-plugins' => 'Installed plugins',

        'current-theme' => [
            'title' => 'Current theme',
            'author' => 'Author: :author',
            'version' => 'Version: :version',
        ],
        'installed-themes' => 'Installed themes',

        'no-theme' => 'You don\'t have any theme enable.',

        'actions' => [
            'reload-plugins' => 'Reload plugins',
            'edit-theme-config' => 'Edit config',
            'disable-theme' => 'Disable theme',
        ],

        'fields' => [
            'version' => 'Version',
        ],
    ],

    'logs' => [
        'title' => 'Logs',

        'fields' => [
            'target' => 'Target',
        ],

        'actions' => [
            'clear' => 'Clear old logs (15d+)',
        ],
    ],
];
