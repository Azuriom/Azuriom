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

    'hello' => '안녕하세요!',
    'whoops' => '웁스!',

    'regards' => '경의를 담아서,',

    'link' => "\":actionText\" 버튼을 누르는데 문제가 있다면, 이  링크를 복사해 브라우저에 붙여넣기하세요: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. All rights reserved.',

    'test' => [
        'subject' => ':name 의 테스트 메일',
        'content' => '만약 이 이메일을 볼 수 있다면, :name 에게서 메일 보내기가 잘 동작하고 있음을 의미합니다!',
    ],

    'delete' => [
        'subject' => '게정 삭제 요청',
        'line1' => '우리는 귀하의 계정에 대한 삭제 요청을 받았기 때문에 이 이메일을 발송하였습니다.',
        'action' => '내 계정 삭제',
        'line2' => '이 행동은 되돌릴 수 없습니다. 계정에 연관된 데이터와 계정이 영구적으로 삭제됩니다. 이 링크는 :count 분 뒤에 만료됩니다.',
        'line3' => '계정 삭제를 요청하지 않았다면, 보안 설정을 다시 검토해주세요.',
    ],
];
