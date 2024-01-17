<?php

return [
    'nav' => [
        'title' => '상점',
        'settings' => '설정',
        'packages' => '패키지',
        'gateways' => '게이트웨이',
        'offers' => '제안',
        'coupons' => '쿠폰',
        'giftcards' => '기프트 카드',
        'discounts' => '할인',
        'payments' => '결제',
        'purchases' => '구매',
        'statistics' => '통계',
    ],

    'permissions' => [
        'admin' => '상점 플러그인 관리',
    ],

    'categories' => [
        'title' => '카테고리',
        'edit' => ':category 카테고리 수정',
        'create' => '카테고리 생성',

        'parent' => '상위 카테고리',
        'delete_error' => '패키지가 포함된 카테고리는 지울 수 없습니다.',

        'cumulate' => '이 카테고리의 누적 구매',
        'cumulate_info' => '이 카테고리에서 이미 패키지를 구매했던 유저의 경우 더 비싼 패키지를 구입할 때 할인을 받고 차액만 지불하게 됩니다.',
        'enable' => '카테고리 활성화',
    ],

    'offers' => [
        'title' => '제안',
        'edit' => ':offer 제안 수정',
        'create' => '제안 생성',

        'enable' => '이 제안 활성화',
    ],

    'coupons' => [
        'title' => '쿠폰',
        'edit' => ':coupon 쿠폰 수정',
        'create' => '쿠폰 생성',

        'global' => '쿠폰이 모든 상점에서 사용될 수 있도록 할까요?',
        'cumulate' => '이 쿠폰을 다른 쿠폰과 같이 사용할 수 있게 허용',
        'user_limit' => '유저 제한',
        'global_limit' => '글로벌 제한',
        'active' => '액티브',
        'usage' => 'Under usage limit',
        'enable' => '쿠폰 활성화',
    ],

    'giftcards' => [
        'title' => '기프트 카드',
        'edit' => ':giftcard 기프트 카드 수정',
        'create' => '기프트 카드 생성',

        'global_limit' => '글로벌 제한',
        'active' => '액티브',
        'enable' => '기프트 카드 활성화',
    ],

    'discounts' => [
        'title' => '할인',
        'edit' => ':discount 할인 수정',
        'create' => '할인 생성',

        'global' => '할인이 모든 상점에서 사용될 수 있도록 할까요?',
        'active' => '활성',
        'enable' => '할인 활성화',
    ],

    'packages' => [
        'title' => '패키지',
        'edit' => ':package 패키지 수정',
        'create' => '패키지 생성',

        'updated' => '패키지가 업데이트되었습니다.',

        'money' => 'Money to give to the user after purchase',
        'giftcard' => 'Balance of the giftcard to create during the purchase',
        'command' => 'The command must not start with <code>/</code>. You can use <code>{player}</code> for the player name. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The others available placeholders are: :placeholders.',

        'custom_price' => 'Allow the user to choose the price to pay (the package price will then be the minimum)',
        'require_online' => '유저가 온라인일 때 명령어 실행 (AzLink를 사용중일때만 가능)',
        'enable_quantity' => '수량 활성화',

        'create_category' => '카테고리 생성',
        'create_package' => '패키지 생성',

        'enable' => '페키지 활성화',
    ],

    'gateways' => [
        'title' => '게이트웨이',
        'edit' => ':gateway 게이트웨이 수정',
        'create' => '게이트웨이 추가',

        'current' => '현재 게이트웨이',
        'add' => '새 게이트웨이 추가',
        'info' => '만약 Cloudflare 또는 방화벽을 사용중인 상태에서 구매에 문제가 있다면, <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>의 절차를 따라해보세요.',

        'country' => '국가',
        'sandbox' => '샌드박스',
        'api-key' => 'API 키',
        'public-key' => '공개 키',
        'private-key' => '개인 키',
        'secret-key' => '비밀 키',
        'endpoint-secret' => 'Signing Secret',
        'service-id' => '서비스 ID',
        'client-id' => '클라이언트 ID',
        'merchant-id' => '가맹점 ID',
        'project-id' => '프로젝트 ID',
        'env' => '환경',

        'paypal_email' => 'PayPal 이메일 주소',
        'paypal_info' => 'Please make sure to input the <strong>main</strong> email address of the PayPal account.',
        'paysafecard_info' => 'paysafecard로 결제를 받길 원한다면, <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard 파트너</a>가 되어야 합니다. 다른 방법도 존재하지만 이 방법만이 paysafecard가 허용하는 방법입니다.',
        'stripe_info' => 'Stripe 대시보드에서 웹훅 주소를 <code>:url</code>로 설정하고 <code>checkout.session.completed</code> 이벤트를 선택해야 합니다.',
        'paymentwall_info' => 'PaymentWall 대시보드에서 핑백 주소를 <code>:url</code>로 설정해야 합니다.',
        'xsolla' => 'Xsola 대시보드에서 웹훅 주소를 <code>:url</code>로 설정하고, \'Paystation\' 설정에서 \'Transaction external ID\'를 활성화하고, 웹훅을 테스트한 다음, \'PayStation\' 설정에서 \'Checkout\'을 활성화해야 합니다.',

        'enable' => '게이트웨이 활성화',
    ],

    'payments' => [
        'title' => '결제',
        'show' => '#:payment 결제',

        'info' => '결제 정보',
        'items' => '구매한 아이템',

        'card' => '상점 결제',

        'status' => [
            'pending' => '대기중',
            'expired' => '만료됨',
            'chargeback' => '지불거절',
            'completed' => '완료됨',
            'refunded' => '환불됨',
            'error' => '오류',
        ],
    ],

    'purchases' => [
        'title' => '구매',
    ],

    'settings' => [
        'title' => '상점 설정',
        'enable_home' => '상점의 홈페이지 활성화',
        'home_message' => '홈 메시지',
        'use_site_money' => '사이트 화폐로 구매 활성화.',
        'use_site_money_info' => '활성화되면, 상점에 있는 패키지는 웹사이트의 돈으로만 구매할 수 있습니다. 유저가 계정에 재화를 넣기 위해 상점에 제안을 설정할 수 있습니다.',
        'webhook' => '디스코드 웹훅 주소',
        'webhook_info' => '유저가 구매할 때 웹훅으로 알림이 갑니다. 빈칸으로 두면 비활성화됩니다.',
        'commands' => '글로벌 명령어',
        'recent_payments' => '사이드바에 표시될 최근 구매 표시 갯수를 제한 (0으로 설정해 비활성화)',
        'display_amount' => 'Display amount spend in recent payments and top customer',
        'top_customer' => '월별 최고 고객을 사이드바에 표시',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => '#:id 게이트웨이 생성됨',
            'updated' => '#:id 게이트웨이 업데이트됨',
            'deleted' => '#:id 게이트웨이 삭제됨',
        ],

        'shop-packages' => [
            'created' => '#:id 패키지 생성됨',
            'updated' => '#:id 패키지 업데이트됨',
            'deleted' => '#:id 패키지 삭제됨',
        ],

        'shop-offers' => [
            'created' => '#:id 제안 생성됨',
            'updated' => '#:id 제안 업데이트됨',
            'deleted' => '#:id 제안 삭제됨',
        ],

        'shop-giftcards' => [
            'used' => 'Used giftcard #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => '통계',
        'total' => '총합',
        'recent' => '최근 결재',
        'count' => '결제 횟수',
        'estimated' => '예상 수입',
        'month' => '이번달의 결제',
        'month_estimated' => '이번달의 예상 수입',
    ],

];
