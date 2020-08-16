<?php

return [

    'lang' => 'English',

    'copyright' => 'Powered by <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'date' => 'F j, Y',
    'date-full' => 'F j, Y \a\t g:i A',
    'date-compact' => 'm/d/Y \a\t g:i A',

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
        'choose-file' => 'Choose file',
        'download' => 'Download',
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
        'short-description' => 'Short Description',
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
    ],

    'range' => [
      'days' => 'By days',
      'months' => 'By months',
    ],

    'loading' => 'Loading...',

    'yes' => 'Yes',
    'no' => 'No',
    'unknown' => 'Unknown',
    'none' => 'None',
    'copied' => 'Copied',

    'home' => 'Home',
    'welcome' => 'Welcome on :name',

    'maintenance' => 'Maintenance',
    'maintenance-message' => 'The website is currently under maintenance.',

    'status-success' => 'The action was successfully completed!',
    'status-error' => 'An error occurred: :error',

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
        'online' => ':count online player|:count online players',
        'offline' => 'The server is currently offline.',
    ],

    'profile' => [
        'title' => 'My Profile',
        'change-email' => 'Change Email Address',
        'change-password' => 'Change Password',

        'not-verified' => 'Your email is not verified, please check your email for a verification link.',

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
            'info' => 'Scan the QR code above with an two-factor authentication app on your phone like Authy or Google Authenticator.',
            'secret' => 'Secret key: :secret',
            'title' => 'Enable Two-Factor Authentication',
            'code' => 'Code',
            'enabled' => 'Two-Factor Authentication enabled.',
            'disabled' => 'Two-Factor Authentication disabled.',
        ],

        'email-not-verified' => 'Your email is not verified, please check your email for a verification link. If you did not receive the email you can resend it',

        'money-transfer' => [
            'title' => 'Money transfer',
            'self' => 'You can\'t send money to yourself.',
            'not-enough' => 'You don\'t have enough money to make this transfer.',
            'success' => 'The money was successfully sent.',
            'notification' => ':user sent you :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Posts',
        'posted' => 'Posted on :date by :user',
        'not-published' => 'This post is not published yet.',
        'read' => 'Read more',
    ],

    'comments' => [
        'create' => 'Leave a comment',
        'guest' => 'You must be logged in to leave a comment.',
        'author' => '<strong>:user</strong> commented on :date',
        'your-comment' => 'Your comment',
        'delete-title' => 'Delete ?',
        'delete-description' => 'Are you sure you want to delete this comment ?',
    ],

    'likes' => 'Likes: :count',
];
