<?php

return [
    'title' => '상점',
    'welcome' => '상점에 오신것을 환영합니다!',

    'buy' => '구매',

    'free' => '무료',

    'fields' => [
        'balance' => 'Balance',
        'category' => '카테고리',
        'code' => '코드',
        'commands' => '명령어',
        'currency' => '화폐',
        'discount' => '할인',
        'expire_date' => '만료일',
        'gateways' => '게이트웨이',
        'original_balance' => 'Original Balance',
        'package' => '패키지',
        'packages' => '패키지',
        'payment_id' => '결제 ID',
        'payments' => 'Payments',
        'price' => '가격',
        'quantity' => '수량',
        'required_packages' => '필요한 패키지',
        'required_roles' => '필요한 역할',
        'role' => '구매 후 설정할 역할',
        'servers' => '서버',
        'start_date' => '시작일',
        'status' => '상태',
        'total' => '총합',
        'user_id' => '유저 ID',
        'user_limit' => '유저 구매 횟수',
    ],

    'actions' => [
        'duplicate' => '복사',
        'remove' => '삭제',
    ],

    'goal' => [
        'title' => '이번달의 목표',
        'progress' => ':count% 완료됨',
    ],

    'recent' => [
        'title' => '최근 구매',
        'empty' => '최근 구매 기록 없음',
    ],

    'top' => [
        'title' => '최고 구매',
    ],

    'cart' => [
        'title' => '장바구니',
        'success' => '구매가 성공적으로 완료되었습니다.',
        'guest' => '구매하려면 로그인해야 합니다.',
        'empty' => '장바구니가 비어 있습니다.',
        'checkout' => '주문',
        'remove' => '삭제',
        'clear' => '장바구니 비우기',
        'pay' => '결제',
        'back' => '상점으로 돌아가기',
        'total' => '총합: :total',
        'payable_total' => 'Total to pay: :total',
        'credit' => '크레딧',

        'confirm' => [
            'title' => '결제하시겠습니까?',
            'price' => ':price에 이 장바구니를 구매하시겠습니까?',
        ],

        'errors' => [
            'money' => '이 결제를 진행할 돈이 부족합니다.',
            'execute' => '결제 도중 알 수 없는 오류가 발생했습니다, 결제가 환불되었습니다.',
        ],
    ],

    'coupons' => [
        'title' => '쿠폰',
        'add' => '쿠폰 추가',
        'error' => '쿠폰이 존재하지 않거나, 만료되었거나 더이상 사용할 수 없습니다.',
        'cumulate' => '이 쿠폰은 다른 쿠폰과 같이 사용할 수 없습니다.',
    ],

    'payment' => [
        'title' => '결제',
        'manual' => '수동 결제',

        'empty' => '사용할 수 있는 결제 수단이 없습니다.',

        'info' => ':website 에서의 #:id 결제',
        'error' => '결제를 완료할 수 없습니다.',

        'success' => '결제가 완료되었습니다, 1분 안에 인게임에서 구매한 물품을 받을 수 있습니다.',

        'webhook' => '상점에 새로운 주문이 들어왔습니다',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => '카테고리가 비어있습니다.',
    ],

    'packages' => [
        'limit' => '이 패키지를 구매할 수 있는 수량 한도에 도달했습니다.',
        'requirements' => '조건이 맞지 않아 이 패키지를 구입할 수 없습니다.',
    ],

    'offers' => [
        'gateway' => '결제 수단',
        'amount' => '수량',

        'empty' => '제안이 존재하지 않습니다.',
    ],

    'profile' => [
        'payments' => '주문',
        'money' => '돈: :balance',
    ],

    'giftcards' => [
        'title' => 'Giftcards',
        'success' => ':money 가 계정에 추가되었습니다.',
        'error' => '기프트 카드가 존재하지 않거나, 만료되었거나 더이상 사용할 수 없습니다.',
        'add' => 'Add a gift card',
        'notification' => 'You received a giftcard, the code is :code (:balance).',
    ],
];
