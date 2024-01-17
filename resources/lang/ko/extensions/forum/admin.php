<?php

return [

    'nav' => [
        'settings' => '설정',
        'forums' => '포럼',
        'tags' => '태그',
    ],

    'settings' => [
        'title' => '포럼 설정',
        'home_message' => 'Home message',
        'webhook' => 'Discord Webhook URL',
        'webhook_info' => 'A notification will be sent on this webhook when a new message is posted. Leave empty to disable',
    ],

    'categories' => [
        'title' => '카테고리',
        'edit' => 'Edit category :category',
        'create' => 'Create category',

        'delete_error' => 'This category contain forums and can\'t be deleted.',
    ],

    'forums' => [
        'title' => '포럼',
        'create' => 'Create forum',
        'edit' => 'Edit forum :forum',

        'create_category' => 'Create category',
        'create_forum' => 'Create forum',

        'parent' => 'Parent forum',
        'restricted' => '이 포럼을 특정 역할만 접근할 수 있게 제한',
        'default_tags' => '기본 태그',
        'lock' => '이 포럼 잠그기',
        'lock_info' => 'Users who are not admin will not be able to create discussions.',
        'private' => 'Private forum',
        'private_info' => 'Users can only see their own discussions and pinned ones.',

        'updated' => 'Forums order updated.',
        'delete_error' => 'A forum with discussions or sub-forums can\'t be deleted.',
    ],

    'discussions' => [
        'card' => '포럼 토론',
    ],

    'posts' => [
        'card' => '포럼 포스트',

        'recent' => 'Recent posts in home',
        'delay' => '포스트 간 딜레이',
        'seconds' => '초',
    ],

    'tags' => [
        'title' => '태그',
        'create' => '태그 생성',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => '토론 #:id 삭제됨',
            'pinned' => '토론 #:id 고정됨',
            'unpinned' => '토론 #:id 고정 해제됨',
            'locked' => '토론 #:id 고정됨',
            'unlocked' => '토론 #:id 고정 해제됨',
        ],

        'forum-posts' => [
            'deleted' => '포스트 #:id 삭제됨',
        ],

        'forum-categories' => [
            'created' => '포럼 카테고리 #:id 생성됨',
            'updated' => '포럼 카테고리 #:id 업데이트됨',
            'deleted' => '포럼 카테고리 #:id 삭제됨',
        ],

        'forum-forums' => [
            'created' => '포럼 #:id 생성됨',
            'updated' => '포럼 #:id 업데이트됨',
            'deleted' => '포럼 #:id 삭제됨',
        ],
    ],

    'permissions' => [
        'forums' => '포럼과 카테고리 관리',
        'discussions' => '포럼 토론 관리 (이동, 수정, 삭제, 고정, 잠금)',
        'private' => 'View discussions from others users in private forums',
        'delete_own_posts' => 'Delete own forum posts',
        'locked' => 'Create a discussion in a locked forum'
    ],
];
