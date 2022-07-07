<?php

return [
    'title' => 'Installation',

    'welcome' => 'Azuriom is the <strong>next generation</strong> game CMS, it\'s <strong>free</strong> and <strong>open-source</strong>, and is a <strong>modern, reliable, fast and secure</strong> alternative to existing CMS so you can have the <strong>best web experience possible</strong>.',

    'back' => 'Back',

    'requirements' => [
        'php' => 'PHP :version or higher',
        'writable' => 'Write permission',
        'rewrite' => 'URL rewrite enabled',
        'extension' => 'Extension :extension',
        'function' => 'Function :function enabled',
        '64bit' => '64-bit PHP',

        'refresh' => 'Refresh requirements',
        'success' => 'Azuriom is ready to be configured!',
        'missing' => 'Your server doesn\'t have the necessary requirements to install Azuriom.',

        'help' => [
            'writable' => 'You can try this command to grant write permission: <code>:command</code>.',
            'rewrite' => 'You can follow the instructions in <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">our documentation</a> to enable URL rewriting.',
            'htaccess' => 'The file <code>.htaccess</code> or <code>public/.htaccess</code> is missing. Make sure you have enabled hidden files and that the file is present.',
            'extension' => 'You can try this command to install the missing PHP extensions: <code>:command</code>.<br>Once done, restart Apache or Nginx.',
            'function' => 'You need to enable this function in the php.ini file of PHP by editing the value of <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Database',

        'type' => 'Type',
        'host' => 'Host',
        'port' => 'Port',
        'database' => 'Database',
        'user' => 'User',
        'password' => 'Password',

        'warn' => 'This database type is not recommended and should only be used when it is not possible to do otherwise.',
    ],

    'game' => [
        'title' => 'Game',

        'locale' => 'Locale',

        'warn' => 'Be careful, once the installation is finished it will not be possible to change this without reinstalling Azuriom entirely!',

        'install' => 'Install',

        'user' => [
            'title' => 'Admin account',

            'name' => 'Name',
            'email' => 'E-Mail address',
            'password' => 'Password',
            'password_confirm' => 'Confirm password',
        ],

        'minecraft' => [
            'premium' => 'Login with Microsoft account (most secure but requires to have purchased Minecraft)',
        ],

        'steam' => [
            'profile' => 'Steam Profile URL',
            'profile_info' => 'This Steam user will be admin on the site.',

            'key' => 'Steam API Key',
            'key_info' => 'You can find your Steam API Key on <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Thanks for choosing Azuriom !',
        'success' => 'Your website has been successfully installed, you can now use your website and make something awesome !',
        'go' => 'Get started',
        'support' => 'If you appreciate Azuriom and the work we provides, please don\'t forget to <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">support us</a>.',
    ],
];
