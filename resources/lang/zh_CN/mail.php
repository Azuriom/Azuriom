<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the mail library to build
    | the mails layout.
    |
    */

    'hello' => '你好～',
    'whoops' => '糟糕...',

    'regards' => '此致',

    'link' => "如果您在单击“:actionText”按钮时遇到问题，复制并粘贴以下URL到您的浏览器：[:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. 保留所有权利',

    'test' => [
        'subject' => '在 :name 上测试邮件',
        'content' => '如果您可以看到这封电子邮件，恭喜您！这意味着 :name 的发送电子邮件功能是有效的！',
    ],

    'delete' => [
        'subject' => '帐户删除请求',
        'line1' => '您收到此邮件是因为您申请删除您的帐户。',
        'action' => '删除我的帐户',
        'line2' => '此操作无法撤消。这将永久删除您的帐户以及相关数据(真的很久!)。此链接将在 :count 分钟后过期。',
        'line3' => '如果您没有请求删除您的帐户，请检查您的安全设置。',
    ],
];
