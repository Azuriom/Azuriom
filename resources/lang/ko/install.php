<?php

return [
    'title' => '설치',

    'welcome' => 'Azuriom is the <strong>next generation</strong> game CMS, it\'s <strong>free</strong> and <strong>open-source</strong>, and is a <strong>modern, reliable, fast and secure</strong> alternative to existing CMS so you can have the <strong>best web experience possible</strong>.',

    'back' => '이전',

    'requirements' => [
        'php' => 'PHP :version 또는 이상',
        'writable' => '쓰기 권한',
        'rewrite' => '주소 rewrite 활성화됨',
        'extension' => '확장 :extension',
        'function' => '기능 :function 활성화됨',
        '64bit' => '64-bit PHP',

        'refresh' => '필수 요소 새로고침',
        'success' => 'Azuriom 을 설정할 준비가 되었습니다!',
        'missing' => '서버가 Azuriom을 설치하기 위해 필요한 필수 요소를 갖고 있지 않습니다.',

        'help' => [
            'writable' => '다음 명령어로 쓰기 권한을 부여할 수 있습니다: <code>:command</code>.',
            'rewrite' => '<a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">우리 문서</a> 를 확인해 주소 rewrite를 활성화할 수 있습니다.',
            'htaccess' => '<code>.htaccess</code> 또는 <code>public/.htaccess</code> 파일을  찾을 수 없습니다. 숨김 파일을 표시하고 파일이 제대로 있는지 확인하세요.',
            'extension' => '다음 명령어로 필요한 PHP 확장을 설치할 수 있습니다: <code>:command</code>.<br>설치가 완료되면, Apache 또는 Nginx를 재시작하세요.',
            'function' => 'php.ini 파일을 열고 <code>disable_functions</code> 기능을 활성화해야 합니다.',
        ],
    ],

    'database' => [
        'title' => '데이터베이스',

        'type' => '유형',
        'host' => '호스트',
        'port' => '포트',
        'database' => '데이버베이스',
        'user' => '유저',
        'password' => '비밀번호',

        'warn' => '이 데이터베이스 유형은 권장하지 않으며 다른 방법이 없을때만 이를 사용해야 합니다.',
    ],

    'game' => [
        'title' => '게임',

        'locale' => '언어',

        'warn' => '조심하세요, 한번 설치가 완료되면 Azuriom을 완전히 재설치하지 않는 이상 바꿀 수 없습니다!',

        'install' => '설치',

        'user' => [
            'title' => '관리자 계정',

            'name' => '이름',
            'email' => '이메일 주소',
            'password' => '비밀번호',
            'password_confirm' => '비밀번호 확인',
        ],

        'minecraft' => [
            'premium' => '마이크로소프트 계정으로 로그인합니다. (마인크래프트를 구매한 계정이어야 합니다)',
        ],

        'steam' => [
            'profile' => 'Steam 프로필 주소',
            'profile_info' => '이 스팀 유저가 사이트의 관리자가 됩니다.',

            'key' => 'Steam API 키',
            'key_info' => '<a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>에서 Steam API 키를 찾을 수 있습니다.',
        ],
    ],

    'success' => [
        'thanks' => 'Azuriom 를 선택해주셔서 감사합니다!',
        'success' => '웹사이트가 성공적으로 설치되었습니다, 이제 웹사이트로  멋진 것들을 만들 수 있습니다 !',
        'go' => '시작하기',
        'support' => 'Azuriom 과 우리의 작업들에 만족한다면, <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">우리를 지원</a>할 수 있다는걸 잊지마세요!.',
    ],
];
