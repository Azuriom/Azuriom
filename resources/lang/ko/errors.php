<?php

return [
    'error' => '오류',
    'code' => '오류 :code',
    'home' => '홈으로 돌아가기',
    'whoops' => '이런!',

    '401' => [
        'title' => '권한 없음',
        'message' => '이 페이지를 볼 수있는 권한이 없습니다.',
    ],
    '403' => [
        'title' => '거부됨',
        'message' => '이 페이지를 볼 수 없습니다.',
    ],
    '404' => [
        'title' => '찾을 수 없음',
        'message' => '원하는 페이지를 찾지 못했습니다.',
    ],
    '419' => [
        'title' => '페이지 만료됨',
        'message' => '세션이 만료되었습니다. 새로 고침 후 다시 시도해 주세요.',
    ],
    '429' => [
        'title' => '너무 많은 요청',
        'message' => '서버에 너무 자주 요청하고 있습니다. 나중에 다시 시도해주세요.',
    ],
    '500' => [
        'title' => '서버 오류',
        'message' => '이런, 서버에 문제가 발생했습니다. 나중에 다시 시도해주세요.',
    ],
    '503' => [
        'title' => '사용할 수 없음',
        'message' => '점검이 진행중입니다. 잠시뒤 다시 확인해주세요.',
    ],

    'fallback' => [
        'message' => '오류가 발생했습니다. 다시 시도해주세요.',
    ],
];
