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
        'back' => 'Back',
        'browse' => 'Browse',
        'cancel' => 'Cancel',
        'choose_file' => 'Choose file',
        'close' => 'Close',
        'comment' => 'Comment',
        'continue' => 'Continue',
        'copy' => 'Copy',
        'create' => 'Create',
        'delete' => 'Delete',
        'disable' => 'Disable',
        'download' => 'Download',
        'duplicate' => 'Duplicate',
        'edit' => 'Edit',
        'enable' => 'Enable',
        'generate' => 'Generate',
        'install' => 'Install',
        'refresh' => 'Refresh',
        'reload' => 'Reload',
        'remove' => 'Remove',
        'save' => 'Save',
        'search' => 'Search',
        'send' => 'Send',
        'show' => 'Show',
        'update' => 'Update',
        'upload' => 'Upload',
    ],

    'fields' => [
        'action' => 'Action',
        'address' => 'Address',
        'author' => 'Author',
        'category' => 'Category',
        'color' => 'Color',
        'content' => 'Content',
        'date' => 'Date',
        'description' => 'Description',
        'enabled' => 'Enabled',
        'file' => 'File',
        'game' => 'Game',
        'icon' => 'Icon',
        'image' => 'Image',
        'link' => 'Link',
        'money' => 'Money',
        'name' => 'Name',
        'permissions' => 'Permissions',
        'port' => 'Port',
        'price' => 'Price',
        'published_at' => 'Published at',
        'quantity' => 'Quantity',
        'role' => 'Role',
        'server' => 'Server',
        'short_description' => 'Short Description',
        'slug' => 'Slug',
        'status' => 'Status',
        'title' => 'Title',
        'type' => 'Type',
        'url' => 'URL',
        'user' => 'User',
        'value' => 'Value',
        'version' => 'Version',
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
        'level' => 'Level',
        'info' => 'Information',
        'warning' => 'Warning',
        'danger' => 'Danger',
        'success' => 'Success',
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
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => 'Delete my account',
            'title' => 'Account deletion',
            'info' => 'This will permanently delete your account and associated data. This action cannot be undone.',
            'email' => 'We will send you a confirmation e-mail to confirm this operation.',
            'sent' => 'A confirmation link has been sent to your email address.',
            'success' => 'Your account has been successfully deleted!',
        ],

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
            'info' => 'Scan the QR code above with a two-factor authentication app on your phone like <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> or Google Authenticator.',
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

    'markdown' => [
        'init' => 'Attach files by drag and dropping or pasting from clipboard.',
        'drag' => 'Drop image to upload it.',
        'drop' => 'Uploading image #images_names#...',
        'progress' => 'Uploading #file_name#: #progress#%',
        'uploaded' => 'Uploaded #image_name#',

        'size' => 'Image #image_name# is too big (#image_size#).\nMaximum file size is #image_max_size#.',
        'error' => 'Something went wrong when uploading the image #image_name#.',
    ],
];
