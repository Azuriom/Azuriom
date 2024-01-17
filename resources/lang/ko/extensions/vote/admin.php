<?php

return [
    'nav' => [
        'title' => '추천',
        'settings' => '설정',
        'sites' => '사이트',
        'rewards' => '보상',
        'votes' => '추천',
    ],

    'permission' => '추천 플러그인 관리',

    'settings' => [
        'title' => '추천 페이지 설정',

        'count' => '최고 플레이어 수',
        'display-rewards' => '추천 페이지에 보상 표',
        'ip_compatibility' => 'IPv4/IPv6 호환 활성화',
        'ip_compatibility_info' => '이 옵션은 IPv6를 받지 않는 추천 사이트에서 확인되지 않은 투표를 정정할 수 있게 합니다.',
        'commands' => '글로벌 명령어',
    ],

    'sites' => [
        'title' => '사이트',
        'edit' => ':site 사이트 수정',
        'create' => '사이트 생성',

        'enable' => '사이트 활성화',
        'delay' => '추천 간 딜레이',
        'minutes' => '분',

        'list' => '추천을 확인할 수 있는 사이트',
        'variable' => '<code>{player}</code> 를 사용해 플레이어 이름을 사용할 수 있습니다.',

        'verifications' => [
            'title' => '인증',
            'enable' => '추천 인증 활성화',

            'disabled' => '이 웹사이트의 추천이 확인되지 않습니다.',
            'auto' => '이 사이트의 추천이 웹사이트의 추천이 자동으로 확인됩니다.',
            'input' => '이 사이트의 추천이 웹사이트의 추천이 아래 필드가 입력될 때 자동으로 확인됩니다.',

            'pingback' => '핑백 주소: :url',
            'secret' => '비밀 키',
            'server_id' => '서버 ID',
            'token' => '토큰',
            'api_key' => 'API 키',
        ],
    ],

    'rewards' => [
        'title' => '보상',
        'edit' => ':reward 보상 수정',
        'create' => '보상 생성',

        'require_online' => '유저가 온라인일 때 명령어 실행 (AzLink를 사용중일때만 가능)',
        'enable' => '보상 활성화',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => '추천',

        'empty' => '이번달의 추천이 없습니다.',
        'votes' => '추천수',
        'month' => '이번달의 추천수',
        'week' => '이번주의 추천수',
        'day' => '오늘의 추천수',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => '#:id 추천 사이트 생성됨',
            'updated' => '#:id 추천 사이트 업데이트됨',
            'deleted' => '#:id 추천 사이트 삭제됨',
        ],

        'vote-rewards' => [
            'created' => '#:id 추천 보상 생성됨',
            'updated' => '#:id 추천 보상 업데이트됨',
            'deleted' => '#:id 추천 보상 삭제됨',
        ],
    ],
];
