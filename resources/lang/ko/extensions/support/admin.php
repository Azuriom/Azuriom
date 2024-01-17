<?php

return [
    'title' => '지원',

    'categories' => [
        'title' => '카테고리',
        'edit' => '#:category 카테고리 수정',
        'create' => '카테고리 생성',

        'delete_empty' => '카테고리가 티켓을 포함하고 있어 삭제할 수 없습니다.',
    ],

    'tickets' => [
        'title' => '티켓',
        'show' => '티켓 #:ticket - :name',
        'create' => '티켓 만들기',

        'open' => '티켓 열기',
    ],

    'permissions' => [
        'tickets' => '티켓 확인 및 관리',
        'categories' => '지원 카테고리 확인 및 관리',
    ],

    'settings' => [
        'title' => '지원 설정',
        'home_message' => 'Home message',
        'webhook' => '디스코드 웹훅 주소',
        'webhook_info' => '유저가 티켓을 만들거나 댓글을 달 때 웹훅으로 알림이 갑니다. 빈칸으로 두면 비활성화됩니다',
        'scheduler' => 'When CRON tasks are setup, tickets can be automatically closed after a certain time.',
        'auto_close' => 'Delay before automatically closing tickets',
        'auto_close_info' => 'When a ticket doesn\'t receive any answer during this time, it will be automatically closed. Leave empty to disable.',
        'reopen' => 'Allow users to reopen a closed ticket.',
    ],

    'logs' => [
        'tickets' => [
            'reopened' => 'Reopened ticket #:id',
            'closed' => '#:id 티켓 닫침',
        ],
    ],
];
