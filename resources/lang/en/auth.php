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
    'confirm_password' => 'Confirm Password',
    'current_password' => 'Current password',

    'conditions' => 'I accept the <a href=":url" target="_blank">conditions</a>.',

    '2fa' => [
        'code' => 'Two Factor Auth Code',
        'invalid' => 'Invalid code',
    ],

    'suspended' => 'This account is suspended.',

    'maintenance' => 'The website is under maintenance.',

    'remember' => 'Remember Me',
    'forgot_password' => 'Forgot Your Password?',

    'verification' => [
        'sent' => 'A fresh verification link has been sent to your email address.',
        'check' => 'Before proceeding, please check your email for a verification link.',
        'request' => 'If you did not receive the email you can request another.',
        'resend' => 'Resend mail',
    ],

    'confirmation' => 'Please confirm your password before continuing.',

    'mail' => [
        'reset' => [
            'subject' => 'Reset Password Notification',
            'line1' => 'You are receiving this email because we received a password reset request for your account.',
            'action' => 'Reset Password',
            'line2' => 'This password reset link will expire in :count minutes.',
            'line3' => 'If you did not request a password reset, no further action is required.',
        ],

        'verify' => [
            'subject' => 'Verify Email Address',
            'line1' => 'Please click the button below to verify your email address. This link is valid for :count minutes.',
            'action' => 'Verify Email Address',
            'line2' => 'If you did not create an account, no further action is required.',
        ],
    ],
];
