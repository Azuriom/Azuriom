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

    'failed' => '정보가 일치하지 않습니다.',
    'throttle' => '너무 잦은 로그인 시도가 감지되었습니다. :seconds 초 뒤에 다시 시도해주세요.',

    'register' => '가입',
    'login' => '로그인',
    'logout' => '로그아웃',
    'verify' => '이메일 인증',
    'passwords' => [
        'confirm' => '비밀번호 확인',
        'reset' => '비밀번호 초기화',
        'send' => '비밀번호 초기화 링크 보내기',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => '이름',
    'email' => '이메일 주소',
    'password' => '비밀번호',
    'confirm_password' => '비밀번호 확인',
    'current_password' => '현재 비밀번호',

    'conditions' => '<a href=":url" target="_blank">약관</a>에 동의합니다.',

    '2fa' => [
        'code' => '2단계 인증 코드',
        'invalid' => '잘못된 코드',
    ],

    'suspended' => '이 계정은 정지되었습니다.',

    'maintenance' => '웹사이트가 현재 점검 중입니다.',

    'remember' => '기억하기',
    'forgot_password' => '비밀번호를 잊으셨나요?',

    'verification' => [
        'sent' => '새 인증 링크가 이메일로 전송되었습니다.',
        'check' => '진행하기 전에, 이메일로 인증 링크가 왔는지 확인해주세요.',
        'request' => '만약 이메일을 받지 못했다면 다시 요청할 수 있습니다.',
        'resend' => '메일 재전송',
    ],

    'confirmation' => '진행하기 전에 비밀번호를 확인해주세요.',

    'mail' => [
        'reset' => [
            'subject' => '비밀번호 초기화 알림',
            'line1' => '비밀번호 초기화 요청이 들어와 이 메일이 전송되었습니다.',
            'action' => '비밀번호 초기화',
            'line2' => '이 비밀번호 초기화 링크는 :count 분 뒤에 만료됩니다.',
            'line3' => '만약 자신이 비밀번호 초기화를 요청한게 아니라면, 무시해도 됩니다.',
        ],

        'verify' => [
            'subject' => '이메일 주소 인증',
            'line1' => '아래 버튼을 클릭해 이메일 주소를 인증하세요.',
            'action' => '이메일 주소 인증',
            'line2' => '만약 자신이 계정을 만든게 아니라면, 무시해도 됩니다.',
        ],
    ],
];
