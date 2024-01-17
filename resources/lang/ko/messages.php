<?php

return [

    'lang' => '한국어',

    'date' => [
        'default' => 'Y/m/d',
        'full' => 'Y/m/d G:i',
        'compact' => 'Y/m/d G:i',
    ],

    'nav' => [
        'toggle' => '네비게이션 토글',
        'profile' => '프로필',
        'admin' => '관리자 대시보드',
    ],

    'actions' => [
        'add' => '추가',
        'back' => '뒤로가기',
        'browse' => '찾아보기',
        'cancel' => '취소',
        'choose_file' => '파일 선택',
        'close' => '닫기',
        'comment' => '댓글',
        'continue' => '계속',
        'copy' => '복사',
        'create' => '생성',
        'delete' => '삭제',
        'disable' => '비활성화',
        'download' => '다운로드',
        'duplicate' => '복제',
        'edit' => '수정',
        'enable' => '활성화',
        'generate' => '생성',
        'install' => '설치',
        'refresh' => '새로고침',
        'reload' => '다시 불러오기',
        'remove' => '삭제',
        'save' => '저장',
        'search' => '검색',
        'send' => '보내기',
        'show' => '보기',
        'update' => '업데이트',
        'upload' => '업로드',
    ],

    'fields' => [
        'action' => '액션',
        'address' => '주소',
        'author' => '작성자',
        'category' => '카테고리',
        'color' => '색상',
        'content' => '내용',
        'date' => '날짜',
        'description' => '설명',
        'enabled' => '활성화됨',
        'file' => '파일',
        'game' => '게임',
        'icon' => '아이콘',
        'image' => '이미지',
        'link' => '링크',
        'money' => '돈',
        'name' => '이름',
        'permissions' => '권한',
        'port' => '포트',
        'price' => '가격',
        'published_at' => '다음 날짜에 게시',
        'quantity' => '수량',
        'role' => '역할',
        'server' => '서버',
        'short_description' => '짧은 설명',
        'slug' => 'Slug',
        'status' => '상태',
        'title' => '제목',
        'type' => '유형',
        'url' => '주소',
        'user' => '유저',
        'value' => '가치',
        'version' => '버전',
    ],

    'status' => [
        'success' => '액션이 성공적으로 완료되었습니다!',
        'error' => '오류가 발생했습니다: :error',
    ],

    'range' => [
        'days' => '일별',
        'months' => '월별',
    ],

    'loading' => '로딩중...',

    'yes' => '네',
    'no' => '아니요',
    'unknown' => '알수없음',
    'other' => '기타',
    'none' => '없음',
    'copied' => '복사됨',
    'icons' => '<a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>에서 사용 가능한 아이콘들을 볼 수 있습니다.',

    'home' => '홈',
    'servers' => '서버',
    'news' => '소식',
    'welcome' => ':name에 오신것을 환영합니다',
    'copyright' => '&copy; :year :name. All rights reserved.',

    'maintenance' => [
        'title' => '점검',
        'message' => '웹사이트가 현재 점검중입니다.',
    ],

    'theme' => [
        'light' => '라이트 테마',
        'dark' => '다크 테마',
    ],

    'captcha' => '캡차 인증에 실패했습니다, 다시 시도해주세요.',

    'notifications' => [
        'notifications' => '알림',
        'read' => '읽음으로 처리',
        'empty' => '읽지 않은 알림이 없습니다.',
        'level' => '레벨',
        'info' => '정보',
        'warning' => '주의',
        'danger' => '위험',
        'success' => '성공',
    ],

    'clipboard' => [
        'copied' => '복사됨!',
        'error' => 'CTRL + C 로 복사',
    ],

    'server' => [
        'join' => '접속',
        'total' => ':count/:max 플레이어|:count/:max 온라인 플레이어',
        'online' => ':count 온라인 플레이어|:count 온라인 플레이어',
        'offline' => '서버가 현재 오프라인입니다.',
    ],

    'profile' => [
        'title' => '내 프로필',
        'change_email' => '이메일 주소 변경',
        'change_password' => '비밀번호 변경',
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => '계정 삭제',
            'title' => '계정 삭제',
            'info' => '이는 당신의 계정과 관련된 데이터를 영구적으로 삭제시킵니다. 이 행동은 돌이킬 수 없습니다.',
            'email' => '이 작업에 관한 확인 메일을 보내드리겠습니다.',
            'sent' => '확인 링크가 이메일로 전송되었습니다.',
            'success' => '계정이 성공적으로 삭제되었습니다!',
        ],

        'email_verification' => '이메일이 인증되지 않았습니다, 메일을 확인해 인증 링크를 찾아보세요.',
        'updated' => '프로필이 업데이트되었습니다.',

        'info' => [
            'role' => '역할: :role',
            'register' => '가입일: :date',
            'money' => '돈: :money',
            '2fa' => '2단계 인증 (2FA): :2fa',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => '2단계 인증 활성화',
            'disable' => '2단계 인증 비활성화',
            'manage' => '2단계 인증 관리',
            'info' => '<a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> 나 구글 인증기같은 2단계 인증 앱으로 위의 QR코드를 스캔하세요.',
            'secret' => '비밀 키: :secret',
            'title' => '2단계 인증',
            'codes' => '복구 코드 보기',
            'code' => '코드',
            'enabled' => '2단계 인증이 활성화되었습니다. 복구 코드를 백업하는걸 잊지마세요!',
            'disabled' => '2단계 인증이 비활성화되었습니다.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => '돈 보내기',
            'user' => 'This user was not found.',
            'balance' => '돈이 부족합니다.',
            'success' => '돈을 성공적으로 보냈습니다.',
            'notification' => ':user 가 :money 를 보냈습니다.',
        ],
    ],

    'posts' => [
        'posts' => '포스트',
        'posted' => ':user가 :date에 게시함',
        'unpublished' => '이 포스트는 아직 발행되지 않았습니다.',
        'read' => '더보기',
    ],

    'comments' => [
        'create' => '댓글 달기',
        'guest' => '로그인해야 댓글을 달 수 있습니다.',
        'author' => '<strong>:user</strong> :date',
        'content' => '내 댓글',
        'delete' => '삭제할까요?',
        'delete_confirm' => '이 댓글을 삭제할까요?',
    ],

    'likes' => '좋아요: :count',

    'markdown' => [
        'init' => 'Attach files by drag and dropping or pasting from clipboard.',
        'drag' => 'Drop image to upload it.',
        'drop' => 'Uploading image #images_names#...',
        'progress' => 'Uploading #file_name#: #progress#%',
        'uploaded' => 'Uploaded #image_name#',

        'size' => 'Image #image_name# is too big (#image_size#).\nMaximum file size is #image_max_size#.',
        'error' => 'Something went wrong when uploading the image #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Role ID',
            'description' => 'ID of the role on the website.',
        ],

        'power' => [
            'name' => 'Role Power',
            'description' => 'Power of the role on the website equal or greater than',
        ],
    ],
];
