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

    'failed' => '用户名或密码错误',
    'throttle' => '您的登录次数过多，请在 :seconds 秒后重试',

    'register' => '注册',
    'login' => '登录',
    'logout' => '登出',
    'verify' => '验证您的电子邮件地址',
    'passwords' => [
        'confirm' => '再次确认密码',
        'reset' => '重置密码',
        'send' => '发送密码重置链接',
    ],
    'fpc' => [
        'title' => '强制更换密码',
        'line1' => '由于安全原因, 您的账号已被暂时冻结. 要解除冻结, 请修改您的密码.',
        'line2' => '了解更多信息或在操作时遇到问题, 请联系网站管理员.',
        'action' => '更改我的密码',
    ],
    'name' => '用户名',
    'email' => '电子邮件地址',
    'password' => '密码',
    'confirm_password' => '确认密码',
    'current_password' => '当前密码',

    'conditions' => '我接受 <a href=":url" target="_blank">条件</a>。',

    '2fa' => [
        'code' => '两步验证码',
        'invalid' => '验证码无效',
    ],

    'suspended' => '此帐户已停用',

    'maintenance' => '该网站正在维护中',

    'remember' => '保持登录状态',
    'forgot_password' => '忘记密码？',

    'verification' => [
        'sent' => '一条新的验证链接已经发送到您的邮箱.',
        'check' => '在继续之前，请检查电子邮件的验证链接',
        'request' => '如果您没有收到电子邮件，您可以再次请求发送.',
        'resend' => '重新发送邮件',
    ],

    'confirmation' => '请确认您的密码以继续',

    'mail' => [
        'reset' => [
            'subject' => '重置密码通知',
            'line1' => '您收到此邮件是因为我们收到了您帐户的密码重置请求',
            'action' => '重置密码',
            'line2' => '此密码重置链接将在 :count 分钟后过期.',
            'line3' => '如果您没有请求重置密码，请忽略这封邮件。',
        ],

        'verify' => [
            'subject' => '验证电子邮件地址',
            'line1' => '请点击下面的按钮来验证您的电子邮件地址',
            'action' => '验证电子邮件地址',
            'line2' => '如果您没有在我们的网站注册帐户，请忽略这封邮件.',
        ],
    ],
];
