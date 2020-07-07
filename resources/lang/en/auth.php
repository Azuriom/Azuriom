<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'register' => 'Register',
    'login' => 'Login',
    'logout' => 'Logout',
    'verify' => 'Verify Your Email Address',
    'passwords' => [
        'confirm' => 'Confirm password',
        'reset' => 'Reset Password',
        'send' => 'Send Password Reset Link',
    ],

    'name' => 'Username',
    'email' => 'Email Address',
    'password' => 'Password',
    'confirm-password' => 'Confirm Password',
    'current-password' => 'Current password',

    'conditions' => 'I accept the <a href=":url" target="_blank">conditions</a>.',

    '2fa-code' => 'Two Factor Auth Code',
    '2fa-invalid' => 'Invalid code',

    'suspended' => 'This account is suspended.',

    'maintenance' => 'The website is under maintenance.',

    'remember-me' => 'Remember Me',
    'forgot-password' => 'Forgot Your Password?',

    'verify-sent' => 'A fresh verification link has been sent to your email address.',
    'verify-check' => 'Before proceeding, please check your email for a verification link.',
    'verify-request' => 'If you did not receive the email you can request another.',
    'verify-resend' => 'Resend mail',

    'need-confirm' => 'Please confirm your password before continuing.',

    'mail' => [
        'reset' => [
            'subject' => 'Reset Password Notification',
            'line-1' => 'You are receiving this email because we received a password reset request for your account.',
            'action' => 'Reset Password',
            'line-2' => 'This password reset link will expire in :count minutes.',
            'line-3' => 'If you did not request a password reset, no further action is required.',
        ],

        'verify' => [
            'subject' => 'Verify Email Address',
            'line-1' => 'Please click the button below to verify your email address.',
            'action' => 'Verify Email Address',
            'line-2' => 'If you did not create an account, no further action is required.',
        ],
    ],
];
