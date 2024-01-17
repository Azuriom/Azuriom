<?php

return [
    'title' => '포럼',

    'fields' => [
        'forum' => '포럼',
        'tags' => '태그',
        'editor' => '편집기',
    ],

    'actions' => [
        'pin' => '고정',
        'unpin' => '고정 해제',
        'lock' => '잠금',
        'unlock' => '잠금해제',
    ],

    'latest' => [
        'title' => '최신 포스트',
    ],

    'stats' => [
        'title' => '상태',

        'discussions' => '토론: :count',
        'posts' => '포스트: :count',
        'users' => '유저 수: :count',
    ],

    'online' => [
        'title' => '접속 중인 유저',

        'none' => '지금 온라인인 유저가 없습니다...',
    ],

    'forums' => [
        'discussions' => ':count discussion|:count discussions',

        'locked' => '이 포럼은 잠겨있습니다.',
    ],

    'discussions' => [
        'title' => '토론',
        'create' => 'Create discussion',
        'edit' => 'Edit discussion',

        'pin' => '이 토론 고정',
        'lock' => '이 토론 잠금',

        'respond' => '답변',
        'views' => ':count 조회수|:count 조회수',

        'locked' => '잠김',
        'pinned' => '고정됨',

        'locked_info' => 'This discussion is locked.',

        'posts' => ':count post|:count posts',

        'delete' => '이 토론을 삭제할까요?',

        'status' => [
            'created' => '토론이 생성되었습니다.',
            'updated' => '이 토론이 수정되었습니다.',
            'deleted' => '이 토론이 삭제되었습니다.',

            'pinned' => '이 토론이 고정되었습니다.',
            'unpinned' => '이 토론이 고정 해제되었습니다.',
            'locked' => '이 토론이 잠겼습니다.',
            'unlocked' => '이 토론의 잠금이 해제되었습니다.',
        ],
    ],

    'posts' => [
        'title' => '포스트',
        'edit' => 'Edit post',

        'delay' => ':time 에 다시 올릴 수 있습니다.',

        'delete' => '이 포스트를 삭제할까요?',

        'status' => [
            'created' => '포스트가 생성되었습니다.',
            'updated' => '이 포스트가 수정되었습니다.',
            'deleted' => '이 포스트가 삭제되었습니다.',
        ],
    ],

    'notifications' => [
        'reply' => ':user 가 당신의 토론 :discussion 에 답변했습니다.',
        'mention' => ':user 가 :discussion에서 당신을 언급했습니다.',
    ],

    'profile' => [
        'likes' => '좋아요',
        'posts' => '포스트',
        'discussions' => '토론',

        'information' => '정보',
        'edit' => '프로필 수정',

        'location' => '위치',
        'website' => '웹사이트',
        'about' => '정보',
        'signature' => '서명',
        'registered' => 'Registered',
        'last_seen' => 'Last seen',
        'display_last_seen' => 'Display last visit',
    ],
];
