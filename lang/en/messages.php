<?php

return [

    'lang' => 'English',

    'date' => [
        'default' => 'F j, Y',
        'full' => 'F j, Y \a\t g:i A',
        'compact' => 'm/d/Y \a\t g:i A',
    ],

    'nav' => [
        'toggle' => 'Toggle navigation',
        'profile' => 'Profile',
        'admin' => 'Admin dashboard',
    ],

    'actions' => [
        'add' => 'Add',
        'show' => 'Show',
        'create' => 'Create',
        'close' => 'Close',
        'edit' => 'Edit',
        'update' => 'Update',
        'delete' => 'Delete',
        'save' => 'Save',
        'continue' => 'Continue',
        'browse' => 'Browse',
        'choose_file' => 'Choose file',
        'download' => 'Download',
        'install' => 'Install',
        'upload' => 'Upload',
        'cancel' => 'Cancel',
        'enable' => 'Enable',
        'disable' => 'Disable',
        'copy' => 'Copy',
        'comment' => 'Comment',
        'search' => 'Search',
        'send' => 'Send',
        'reload' => 'Reload',
        'refresh' => 'Refresh',
        'duplicate' => 'Duplicate',
        'remove' => 'Remove',
        'back' => 'Back',
    ],

    'fields' => [
        'name' => 'Name',
        'title' => 'Title',
        'action' => 'Action',
        'date' => 'Date',
        'slug' => 'Slug',
        'link' => 'Link',
        'enabled' => 'Enabled',
        'author' => 'Author',
        'user' => 'User',
        'image' => 'Image',
        'type' => 'Type',
        'file' => 'File',
        'description' => 'Description',
        'short_description' => 'Short Description',
        'content' => 'Content',
        'role' => 'Role',
        'quantity' => 'Quantity',
        'money' => 'Money',
        'color' => 'Color',
        'url' => 'URL',
        'status' => 'Status',
        'category' => 'Category',
        'version' => 'Version',
        'game' => 'Game',
        'price' => 'Price',
        'icon' => 'Icon',
        'server' => 'Server',
        'value' => 'Value',
        'published_at' => 'Published at',
        'permissions' => 'Permissions',
        'address' => 'Address',
        'port' => 'Port',
    ],

    'status' => [
        'success' => 'The action was successfully completed!',
        'error' => 'An error occurred: :error',
    ],

    'range' => [
        'days' => 'By days',
        'months' => 'By months',
    ],

    'loading' => 'Loading...',

    'yes' => 'Yes',
    'no' => 'No',
    'unknown' => 'Unknown',
    'other' => 'Other',
    'none' => 'None',
    'copied' => 'Copied',
    'icons' => 'You can find the list of available icons on <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.',

    'home' => 'Home',
    'servers' => 'Servers',
    'news' => 'News',
    'welcome' => 'Welcome on :name',
    'copyright' => 'Powered by <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Maintenance',
        'message' => 'The website is currently under maintenance.',
    ],

    'theme' => [
        'light' => 'Light theme',
        'dark' => 'Dark theme',
    ],

    'captcha' => 'The captcha verification failed, please try again.',

    'notifications' => [
        'notifications' => 'Notifications',
        'read' => 'Mark as read',
        'empty' => 'You have no unread notifications.',
    ],

    'clipboard' => [
        'copied' => 'Copied!',
        'error' => 'CTRL + C to copy',
    ],

    'server' => [
        'join' => 'Join',
        'total' => ':count/:max player|:count/:max online players',
        'online' => ':count online player|:count online players',
        'offline' => 'The server is currently offline.',
    ],

    'profile' => [
        'title' => 'My Profile',
        'change_email' => 'Change Email Address',
        'change_password' => 'Change Password',

        'email_verification' => 'Your email is not verified, please check your email for a verification link.',
        'updated' => 'Your profile has been updated.',

        'info' => [
            'role' => 'Role: :role',
            'register' => 'Registered: :date',
            'money' => 'Money: :money',
            '2fa' => 'Two-Factor Authentication (2FA): :2fa',
        ],

        '2fa' => [
            'enable' => 'Enable 2FA',
            'disable' => 'Disable 2FA',
            'manage' => 'Manage 2FA',
            'info' => 'Scan the QR code above with an two-factor authentication app on your phone like Authy, 1Password or Google Authenticator.',
            'secret' => 'Secret key: :secret',
            'title' => 'Two-Factor Authentication',
            'codes' => 'Show recovery codes',
            'code' => 'Code',
            'enabled' => 'Two-Factor Authentication is currently enabled. Don\'t forget to save your recovery codes!',
            'disabled' => 'Two-Factor Authentication disabled.',
        ],

        'money_transfer' => [
            'title' => 'Money transfer',
            'self' => 'You can\'t send money to yourself.',
            'balance' => 'You don\'t have enough money to make this transfer.',
            'success' => 'The money was successfully sent.',
            'notification' => ':user sent you :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Posts',
        'posted' => 'Posted on :date by :user',
        'unpublished' => 'This post is not published yet.',
        'read' => 'Read more',
    ],

    'comments' => [
        'create' => 'Leave a comment',
        'guest' => 'You must be logged in to leave a comment.',
        'author' => '<strong>:user</strong> commented on :date',
        'content' => 'Your comment',
        'delete' => 'Delete?',
        'delete_confirm' => 'Are you sure you want to delete this comment?',
    ],

    'likes' => 'Likes: :count',
];
