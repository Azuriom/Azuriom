<?php

return [
    'title' => '지원',

    'fields' => [
        'subject' => '주제',
        'category' => '카테고리',
        'ticket' => '티켓',
        'comment' => '댓글',
    ],

    'actions' => [
        'create' => '새 티켓 열기',
        'reopen' => '다시 열기',
        'close' => '닫기',
    ],

    'state' => [
        'open' => '열림',
        'closed' => '닫침',
        'replied' => 'Replied',
    ],

    'tickets' => [
        'closed' => '이 티켓은 닫쳤습니다.',

        'open' => '티켓 열기',

        'notification' => '지원 티켓에 새로운 답변이 있습니다.',

        'info' => '<strong>:author</strong> 가 :date에 <strong>:category</strong>에 관한 티켓을 열었습니다.',
    ],

    'webhook' => [
        'ticket' => '지원에 새 티켓이 있습니다.',
        'comment' => '지원에 새 댓글이 있습니다.',
        'closed' => '티켓이 닫쳤습니다',
    ],

    'mails' => [
        'comment' => [
            'subject' => '지원 티켓에 새로운 답변이 달렸습니다.',
            'message' => '안녕하세요 :user, 지원 티켓 #:id에 :author가 답변을 달았습니다.',
            'view' => '티켓 보기',
        ],
    ],

    'days' => 'days',
];
