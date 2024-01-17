<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on the admin dashboard
    |
    */

    'nav' => [
        'dashboard' => '대시보드',
        'settings' => [
            'heading' => '설정',
            'settings' => '설정',
            'global' => '전역',
            'security' => '보안',
            'performances' => '성능',
            'seo' => 'SEO',
            'auth' => '인증',
            'mail' => '메일',
            'maintenance' => '점검',
            'social' => '소셜 링크',
            'navbar' => '메뉴 바',
            'servers' => '서버',
        ],

        'users' => [
            'heading' => '유저',
            'users' => '유저',
            'roles' => '역할',
            'bans' => '차단',
        ],

        'content' => [
            'heading' => '콘텐츠',
            'pages' => '페이지',
            'posts' => '포스트',
            'images' => '이미지',
            'redirects' => '리디렉션',
        ],

        'extensions' => [
            'heading' => '확장',
            'plugins' => '플러그인',
            'themes' => '테마',
        ],

        'other' => [
            'heading' => '기타',
            'update' => '업데이트',
            'logs' => '로그',
        ],

        'profile' => [
            'profile' => '프로필',
        ],

        'back' => '웹사이트로 돌아가기',
        'support' => '지원',
        'documentation' => '문서',
    ],

    'delete' => [
        'title' => '삭제하시겠습니까?',
        'description' => '정말로 삭제하시겠습니까? 돌아갈 수 없습니다!',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel designed by :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => '대시보드',

        'users' => '유저',
        'posts' => '포스트',
        'pages' => '페이지',
        'images' => '이미지',

        'update' => '새 버전의 Azuriom이 존재합니다: :version',
        'http' => '웹사이트가 https를 사용하고 있지 않습니다, 자신과 유저의 보안을 위해서라도 활성화하는 것이 좋습니다.',
        'cloudflare' => '만약 Cloudflare를 사용하고 있다면, Cloudflare 지원 플러그인을 설치해야 합니다.',
        'recent_users' => '최근 유저',
        'active_users' => '액티브 유저',
        'emails' => '이메일이 비활성화되어 있습니다. 만약 유저가 비밀번호를 잊어버린다면 재설정할 수 없습니다. <a href=":url">메일 설정</a>에서 이메일을 활성화할 수 있습니다.',
    ],

    'settings' => [
        'index' => [
            'title' => '전역 설정',

            'name' => '사이트 이름',
            'url' => '사이트 주소',
            'description' => '사이트 설명',
            'meta' => '메타 키워드',
            'meta_info' => '키워드는 쉼표로 구분됩니다.',
            'favicon' => '파비콘',
            'background' => '배경',
            'logo' => '로고',
            'timezone' => '시간대',
            'locale' => '언어',
            'money' => '사이트의 화폐 단위',
            'copyright' => 'Copyright',
            'user_money_transfer' => '유저간 돈 송금 활성화',
            'site_key' => 'azuriom.com 의 사이트 키',
            'site_key_info' => '마켓에서 구매한 프리미엄 확장을 설치하려면 azuriom.com 사이트 키가 필요합니다. 사이트 키는 <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Azuriom 프로필</a>에서 얻을 수 있습니다.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => '보안 설정',

            'captcha' => [
                'title' => '캡차',
                'site_key' => '사이트 키',
                'secret_key' => '비밀 키',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => '<a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha 웹사이트</a>에서 hCaptcha 키를 얻을 수 있습니다.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => '해시 알고리즘',
            'hash_error' => '이 해시 알고리즘은 현재 PHP 버전에서 지원되지 않습니다.',
            'force_2fa' => '관리자 패널 접근에 2단계 인증 요구',
        ],

        'performances' => [
            'title' => '성능 설정',

            'cache' => [
                'title' => '캐시 지우기',
                'clear' => '캐시 지우기',
                'description' => '웹사이트 캐시를 지웁니다.',
                'error' => '캐시를 지우는 도중 오류가 발생했습니다.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost는 캐시 계층을 하나 추가해 웹사이트의 성능을 향상시킵니다.',
                'info' => '만약 확장을 활성화할 때 문제가 생긴다면 캐시를 리로드해야 합니다.',

                'enable' => 'AzBoost 활성화',
                'disable' => 'AzBoost 비활성화',
                'reload' => 'AzBoost 리로드',

                'status' => 'AzBoost가 현재 :status.',
                'enabled' => '활성화됨',
                'disabled' => '비활성화됨',

                'error' => 'AzBoost를 활성화하는 도중 오류가 발생했습니다.',
            ],
        ],

        'seo' => [
            'title' => 'SEO 설정',

            'html' => '<code>resources/views/custom/</code> 폴더에 <code>head.blade.php</code> 또는 <code>body.blade.php</code> 로 된 이름의 파일을 만들어 <code>&lt;head&gt;</code> 에 HTML을 추가하거나 <code>&lt;body&gt;</code> 로 모든 페이지에 추가할 수 있습니다. (예시. 쿠키 배너나 웹사이트 분석)',
            'home_message' => '홈 메시지',

            'welcome_alert' => [
                'enable' => '환영 팝업을 활성화할까요?',
                'message' => '환영 팝업 메시지',
                'info' => '이 팝업은 사이트에 처음 방문한 유저에게 표시됩니다.',
            ],
        ],

        'auth' => [
            'title' => '인증',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => '유저 가입 활성화',
            'registration_info' => '플러그인을 통해서는 여전히 가입할 수 있습니다.',
            'api' => '인증 API 활성화',
            'api_info' => '이 API는 게임 서버에 커스텀 인증을 추가할 수 있도록 합니다. 런처를 사용하는 마인크래프트 서버의 경우, <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> 를 사용해 쉽고 빠르게 통합할 수 있습니다.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => '유저가 계정을 삭제할 수 있게 허용',
        ],

        'mail' => [
            'title' => '메일 설정',
            'from' => '메일을 보낼 때 사용되는 이메일 주소',
            'mailer' => '이메일 유형',
            'mailer_info' => 'Azuriom은 메일을 보내는데 SMTP 와 Sendmail를 지원합니다. 우리 <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">문서</a>에서 메일 설정에 관한 정보를 찾아볼 수 있습니다.',
            'disabled' => '이메일이 비활성화되어 있을 경우, 유저는 비밀번호를 까먹었을 때 비밀번호를 초기화할 수 없습니다.',
            'sendmail' => 'Sendmail을 사용하는 것은 추천되지 않으며 가능한 한 SMTP 서버를 사용해야 합니다.',
            'smtp' => [
                'host' => 'SMTP 호스트 주소',
                'port' => 'SMTP 호스트 포트',
                'encryption' => '암호화 프로토콜',
                'username' => 'SMTP 서버 유저 이름',
                'password' => 'SMTP 서버 비밀번호',
            ],
            'verification' => '유저 이메일 주소 인증 활성화',
            'send' => '테스트 이메일 보내기',
            'sent' => '테스트 메일을 성공적으로 보냈습니다.',
            'missing' => '계정에 지정된 이메일 주소가 없습니다.',
        ],

        'maintenance' => [
            'title' => '점검 설정',

            'enable' => '점검 활성화',
            'message' => '점검 메시지',
            'global' => '모든 사이트에 점검 활성화',
            'paths' => '점검중 차단할 경로',
            'info' => '<code>/*</code> 를 사용해 해당 경로로 시작되는 모든 페이지를 차단할 수 있습니다. 예를들어, <code>/news/*</code> 는 모든 news 에 대한 접근을 차단합니다.',
        ],

        'updated' => '설정이 업데이트되었습니다.',
    ],

    'navbar_elements' => [
        'title' => '메뉴 바',
        'edit' => ':element 메뉴 바 구성 수정',
        'create' => '메뉴 바 구성 생성',

        'restrict' => '이 구성을 볼 수 있는 역할을 제한',
        'dropdown' => '이 구성이 저장된 후 이 드롭다운에 구성을 추가할 수 있습니다.',

        'fields' => [
            'home' => '홈',
            'link' => '외부 링크',
            'page' => '페이지',
            'post' => '포스트',
            'posts' => '포스트 목록',
            'plugin' => '플러그인',
            'dropdown' => '드롭다운',
            'new_tab' => '새 탭으로 열기',
        ],

        'updated' => '메뉴 바 업데이트됨.',
        'not_empty' => '구성이 포함된 드롭다운은 삭제할 수 없습니다.',
    ],

    'social_links' => [
        'title' => '소셜 링크',
        'edit' => ':link 소셜 링크 수정',
        'create' => '소셜 링크 추가',
    ],

    'servers' => [
        'title' => '서버',
        'edit' => ':server 서버 수정',
        'create' => '서버 추가',

        'default' => '기본 서버',
        'default_info' => '테마가 지원할 경우 기본 서버에 접속되어 있는 플레이어 수가 사이트에 표시됩니다.',

        'home_display' => '홈페이지에 이 서버 표시',
        'url' => '접속 버튼 주소',
        'url_info' => '빈칸으로 두면 서버 주소를 표시합니다. <code>steam://connect/&lt;ip&gt;</code> 식으로 링크를 설정해 게임/런처를 다운로드하게 할 수도 있습니다.',

        'ping_info' => '핑은 플러그인을 필요로 하지 않습니다, 하지만 명령어는 실행할 수 없습니다.',
        'query_info' => '쿼리 연결을 사용할 경우, 서버에서 명령어를 실행할 수 없습니다.',

        'query_port_info' => '게임 포트와 같을 경우 빈칸으로 둬도 됩니다.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Rcon 비밀번호',
        'rcon_port' => 'Rcon 포트',
        'query_port' => '소스 쿼리 포트',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLink 포트',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">AzLink 플러그인을 다운로드</a> 하고 서버에 설치하세요.',
            'link2' => '서버를 재시작하세요.',
            'link3' => '다음 명령어를 서버에 실행하세요: ',

            'info' => '만약 Cloudflare 또는 방화벽을 사용중인 상태에서 AzLink에 문제가 있다면, <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>의 절차를 따라해보세요.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => '만약 기본값이 아닌 커스텀 AzLink 포트를 사용중이라면, 다음 명령어로 설정해야 합니다: ',
            'ping' => '즉시 명령어 활성화 (서버에 열린 포트가 필요함)',
            'ping_info' => '즉시 명령어가 활성화되지 않은 경우, 명령어가 30초~1분의 딜레이를 가진 채 실행됩니다.',
            'custom_port' => '커스텀 AzLink 포트 사용',

            'error' => '서버와 연결에 실패했습니다, 주소 또는 포트가 올바르지 않거나 포트가 닫쳐있습니다.',
            'badresponse' => '서버와 연결에 실패했습니다 (코드 :code), 토큰이 잘못됐거나 서버가 잘못 설정되었습니다. 링크 명령어를 다시 실행해 고칠 수 있습니다.',
        ],

        'players' => ':count 플레이어|:count 플레이어',
        'offline' => '오프라인',

        'connected' => '서버와 성공적으로 연결되었습니다!',
        'error' => '서버와 연결에 실패했습니다: :error',

        'type' => [
            'mc-ping' => '마인크래프트 핑',
            'mc-rcon' => '마인크래프트 RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => '소스 Query',
            'source-rcon' => '소스 RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => '베드락 핑',
            'bedrock-rcon' => '베드락 RCON',
            'fivem-status' => 'FiveM 상태',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => '러스트 RCON',
            'flyff-server' => 'Flyff 서버', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => '유저',
        'edit' => ':user 유저 수정',
        'create' => '유저 생성',

        'registered' => '가입일: ',
        'last_login' => '마지막 로그인: ',
        'ip' => 'IP 주소',

        'admin' => '관리자',
        'banned' => '차단됨',
        'deleted' => '삭제됨',

        'ban' => '차단',
        'unban' => '차단 해제',
        'delete' => '삭제',

        'alert-deleted' => '이 유저는 삭제되었습니다, 수정할 수 없습니다.',
        'alert-banned' => [
            'title' => '이 유저가 현재 차단되어 있습니다:',
            'banned-by' => ':author 에 의해 차단됨',
            'reason' => '사유: :reason',
            'date' => '날짜: :date',
        ],

        'edit_profile' => '프로필 수정',

        'info' => '유저 정보',

        'ban-title' => ':user 차단',
        'ban-description' => '이 유저를 차단하시겠습니까?',

        'email' => [
            'verify' => '이메일 인증',
            'verified' => '이메일 주소 인증됨',
            'date' => '네, :date',
            'verify_success' => '이메일 주소가 성공적으로 인증되었습니다.',
        ],

        '2fa' => [
            'title' => '2단계 인증',
            'secured' => '2FA enabled',
            'disable' => '2단계 인증 비활성화',
            'disabled' => '2단계 인증이 비활성화되었습니다.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => '이 유저는 차단되었습니다.',
            'unbanned' => '이 유저의 차단이 해제되었습니다.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => '알림 보내기',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => '역할',
        'edit' => 'Edit role :role (#:id)',
        'create' => '역할 생성',

        'info' => '(ID: :id, Power: :power)',

        'default' => '기본',
        'admin' => '관리자',
        'admin_info' => '그룹이 관리자일 경우 모든 권한을 갖고 있습니다.',

        'updated' => '역할이 업데이트되었습니다.',
        'unauthorized' => '이 역할은 지금 갖고 있는 역할보다 상위입니다.',
        'add_admin' => '역할에 관리자 권한을 추가할 수 없습니다.',
        'remove_admin' => '자신의 역할에 관리자 권한을 뺄 수 없습니다.',
        'delete_default' => '이 역할은 삭제할 수 없습니다.',
        'delete_own' => '자기 자신의 역할은 삭제할 수 없습니다.',

        'discord' => [
            'title' => 'Link Discord roles',
            'enable' => 'Enable Discord roles link',
            'enable_info' => 'Once enabled, edit the role on Discord, and add a requirement in the <b>Links</b> tab. Users can get their Discord role in the server menu, in <b>Linked Roles</b>.',
            'info' => 'You need to create an application on the <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> and set the <b>Linked Role Verification URL</b> to <code>:url</code>',
            'oauth' => 'Then, in <b>OAuth2</b> and in <b>General</b>, you need to add <code>:url</code> in the <b>Redirects</b>.',
            'token_info' => 'The Bot token can be obtained by creating a bot for your application, in the <b>Bot</b> tab on the left of the Discord developer dashboard.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => '댓글 달기',
        'delete-other-comments' => '다른 유저의 댓글 삭제',
        'maintenance-access' => '점검중에 웹사이트에 접근',
        'admin-access' => '관리자 대시보드에 접근',
        'admin-logs' => '사이트 로그 확인 및 관리',
        'admin-images' => '이미지 확인 및 관리',
        'admin-navbar' => '메뉴 바 확인 및 관리',
        'admin-pages' => '페이지 확인 및 관리',
        'admin-redirects' => '리디렉션 확인 및 관리',
        'admin-posts' => '포스트 확인 및 관리',
        'admin-settings' => '설정 확인 및 관리',
        'admin-users' => '유저 확인 및 관리',
        'admin-themes' => '테마 확인 및 관리',
        'admin-plugins' => '플러그인 확인 및 관리',
    ],

    'bans' => [
        'title' => '차단',

        'by' => '차단됨: ',
        'reason' => '사유',
        'removed' => ':user 가 :date 를 삭제함',
    ],

    'posts' => [
        'title' => '포스트',
        'edit' => ':post 포스트 수정',
        'create' => '포스트 생성',

        'published_info' => '이 포스트는 이 날짜가 되기 전까지 공개되지 않습니다.',
        'pin' => '이 포스트 고정',
        'pinned' => '고정됨',
        'feed' => '이 포스트의 RSS/Atom 피드를 <code>:rss</code> 와 <code>:atom</code> 에서 사용할 수 있습니다.',
    ],

    'pages' => [
        'title' => '페이지',
        'edit' => '#:page 페이지 수정',
        'create' => '페이지 생성',

        'enable' => '페이지 활성화',
        'restrict' => '이 페이지를 볼 수 있는 역할을 제한',
    ],

    'redirects' => [
        'title' => '리디렉션',
        'edit' => ':redirect 리디렉션 수정',
        'create' => '리디렉션 생성중',

        'enable' => '리디렉션 활성화',
        'source' => '위치',
        'destination' => '목적지',
        'code' => '상태 코드',

        '301' => '301 - Permanent redirect',
        '302' => '302 - Temporary redirect',
    ],

    'images' => [
        'title' => '이미지',
        'edit' => ':image 이미지 수정',
        'create' => '이미지 업로드',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => ':price 에 구매',
    ],

    'plugins' => [
        'title' => '플러그인',

        'list' => '설치된 플러그인',
        'available' => '사용 가능한 플러그인',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => '이 플러그인은 현재 Azuriom 버전과 호환되지 않습니다.',
            'game' => '이 플러그인은 게임 :game 과 호환되지 않습니다.',
            'plugin' => '":plugin" 플러그인이 없거나 이 플러그인 버전과 호환되지 않습니다.',
        ],

        'reloaded' => '플러그인이 리로드되었습니다.',
        'enabled' => '플러그인이 활성화되었습니다.',
        'disabled' => '플러그인이 비활성화되었습니다.',
        'updated' => '플러그인이 업데이트되었습니다.',
        'installed' => '플러그인이 설치되었습니다.',
        'deleted' => '플러그인이 삭제되었습니다.',
        'delete_enabled' => '플러그인은 삭제하기 전 반드시 비활성화해야 합니다.',
    ],

    'themes' => [
        'title' => '테마',

        'current' => '현재 테마',
        'author' => '제작자: :author',
        'version' => '버전: :version',
        'list' => '설치된 테마',
        'available' => '사용 가능한 테마',
        'no-enabled' => '어떤 테마도 설치되어 있지 않습니다.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => '콘피그 수정',
        'disable' => '테마 비활성화',

        'reloaded' => '테마가 리로드되었습니다.',
        'no_config' => '이 테마는 콘피그를 갖고있지 않습니다.',
        'config_updated' => '테마 콘피그가 업데이트되었습니다.',
        'invalid' => '이 테마는 올바르지 않습니다 (테마 폴더는 반드시 테마 id여야 합니다.).',
        'updated' => '테마가 업데이트되었습니다.',
        'installed' => '테마가 설치되었습니다.',
        'deleted' => '테마가 삭제되었습니다.',
        'delete_current' => '현재 테마는 삭제할 수 없습니다.',
    ],

    'update' => [
        'title' => '업데이트',

        'has_update' => '업데이트 사용 가능',
        'no_update' => '업데이트 없음',
        'check' => '업데이트 확인',

        'update' => 'Azuriom 버전 <code>:last-version</code> 을 사용할 수 있으며 현재 버전은 <code>:version</code> 입니다.',
        'changelog' => '변경점은 <a href=":url" target="_blank" rel="noopener noreferrer">여기에서</a> 찾아볼 수 있습니다.',
        'download' => '최신 버전의 Azuriom 을 다운로드할 수 있습니다.',
        'install' => '최신 버전의 Azuriom 이 다운로드되었으며 설치할 준비가 됐습니다.',

        'backup' => 'Azuriom을 업데이트하기 전에, 사이트 백업을 만들어두세요!',

        'latest_version' => '최신 버전의 Azuriom을 사용하고 있습니다: <code>:version</code>.',
        'latest' => '최신 버전의 Azuriom을 사용하고 있습니다.',

        'downloaded' => '최신 버전이 다운로드되었습니다, 이제 설치할 수 있습니다.',
        'installed' => '업데이트가 성공적으로 설치되었습니다.',
    ],

    'logs' => [
        'title' => '로그',

        'clear' => '오래된 로그 지우기 (15일+)',
        'cleared' => '오래된 로그가 삭제되었습니다.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => '페이지 #:id 생성됨',
            'updated' => '페이지 #:id 업데이트됨',
            'deleted' => '페이지 #:id 삭제됨',
        ],

        'posts' => [
            'created' => '포스트 #:id 생성됨',
            'updated' => '포스트 #:id 업데이트됨',
            'deleted' => '포스트 #:id 삭제됨',
        ],

        'images' => [
            'created' => '이미지 #:id 생성됨',
            'updated' => '이미지 #:id 업데이트됨',
            'deleted' => '이미지 #:id 삭제됨',
        ],

        'redirects' => [
            'created' => '리디렉션 #:id 생성됨',
            'updated' => '리디렉션 #:id 업데이트됨',
            'deleted' => '리디렉션 #:id 삭제됨',
        ],

        'roles' => [
            'created' => '역할 #:id 생성됨',
            'updated' => '역할 #:id 업데이트됨',
            'deleted' => '역할 #:id 삭제됨',
        ],

        'servers' => [
            'created' => '서버 #:id 생성됨',
            'updated' => '서버 #:id 업데이트됨',
            'deleted' => '서버 #:id 삭제됨',
        ],

        'users' => [
            'updated' => '유저 #:id 업데이트됨',
            'deleted' => '유저 #:id 삭제됨',
            'transfer' => '유저 #:id 에게 :money 보냄',

            'login' => ':ip 에서 로그인 성공 (2단계 인증: :2fa)',
            '2fa' => [
                'enabled' => '2단계 인증을 활성화함',
                'disabled' => '2단계 인증을 비활성화함',
            ],
        ],

        'settings' => [
            'updated' => '설정 업데이트됨',
        ],

        'updates' => [
            'installed' => 'Azuriom 업데이트 설치됨',
        ],

        'plugins' => [
            'enabled' => '플러그인 활성화됨',
            'disabled' => '플러그인 비활성화됨',
        ],

        'themes' => [
            'changed' => '테마 변경됨',
            'configured' => '테마 설정이 업데이트됨',
        ],
    ],

    'errors' => [
        'back' => '대시보드로 돌아가기',
        '404' => '페이지를 찾을 수 없음',
        'info' => '보아하니 매트릭스 속에서 버그를 발견한 것 같군요...',
        '2fa' => '이 페이지를 보려면 2단계 인증을 활성화해야 합니다.',
    ],
];
