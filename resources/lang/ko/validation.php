<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute에 반드시 동의해야 합니다.',
    'accepted_if' => '":other"가 :value일땐 ":attribute"에 반드시 동의해야 합니다.',
    'active_url' => ':attribute 가 올바른 주소가 아닙니다.',
    'after' => ':attribute 는 :date 이후의 날짜여야 합니다.',
    'after_or_equal' => ':attribute 는 반드시 :date 와 같거나 이후의 날짜여야 합니다.',
    'alpha' => ':attribute 는 문자만 포함할 수 있습니다.',
    'alpha_dash' => ':attribute 는 문자,숫자,작대기와 밑줄만 포함할 수 있습니다.',
    'alpha_num' => ':attribute 는 반드시 문자와 숫자를 포함해야 합니다.',
    'array' => ':attribute 는 반드시 배열이여야 합니다.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute 는 반드시 :date 이전의 날짜여야 합니다.',
    'before_or_equal' => ':attribute 는 반드시 :date와 같거나 이전의 날짜여야 합니다.',
    'between' => [
        'array' => ':attribute 는 반드시 :min 과 :max 사이여야 합니다.',
        'file' => ':attribute 는 반드시 :min 과 :max 킬로바이트 사이여야 합니다.',
        'numeric' => ':attribute 는 반드시 :min 에서 :max 사이여야 합니다.',
        'string' => ':attribute 는 반드시 :min 과 :max 문자 범위에 있어야 합니다.',
    ],
    'boolean' => ':attribute 필드는 반드시 true 나 false여야 합니다.',
    'confirmed' => ':attribute 확인이 일치하지 않습니다.',
    'current_password' => '비밀번호가 맞지 않습니다.',
    'date' => ':attribute 는 올바른 날짜가 아닙니다.',
    'date_equals' => ':attribute 는 :date와 같은 날짜여야 합니다.',
    'date_format' => ':attribute 가 포맷 :format 에 맞지 않습니다.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => ':attribute 는 반드시 거절되어야 합니다.',
    'declined_if' => ':attribute 는 :other 가 :value가 일때때 반드시 거절되어야 합니다.',
    'different' => ':attribute 와 :other 는 반드시 달라야 합니다.',
    'digits' => ':attribute 는 반드시 :digits 숫자여야 합니다.',
    'digits_between' => ':attribute 는 반드시 :min 과 :max 숫자 사이여야 합니다.',
    'dimensions' => ':attribute 가 잘못된 이미지 크기를 갖고있습니다.',
    'distinct' => ':attribute 필드가 중복된 값을 갖고있습니다.',
    'doesnt_start_with' => ':attribute 는 다음과 같은 값으로 시작되면 안됩니다: :values.',
    'email' => ':attribute 는 반드시 올바른 이메일 주소여야 합니다.',
    'ends_with' => ':attribute 는 반드시 다음과 같은 값으로 끝나야 합니다: :values.',
    'enum' => '선택된 :attribute 가 올바르지 않습니다.',
    'exists' => '선택된 :attribute 가 올바르지 않습니다.',
    'file' => ':attribute 는 반드시 파일이어야 합니다.',
    'filled' => ':attribute 필드는 반드시 값을 갖고있어야 합니다.',
    'gt' => [
        'array' => ':attribute 는 반드시 :value 아이템보다 많아야 합니다.',
        'file' => ':attribute 는 반드시 :value 킬로바이트보다 커야합니다.',
        'numeric' => ':attribute 는 반드시 :value보다 커야합니다.',
        'string' => ':attribute 는 반드시 :value 글자보다 많아야 합니다.',
    ],
    'gte' => [
        'array' => ':attribute 는 반드시 :value 아이템과 같거나 많아야 합니다.',
        'file' => ':attribute 는 반드시 :value 킬로바이트와 같거나 커야합니다.',
        'numeric' => ':attribute 는 반드시 :value 보다 같거나 커야합니다.',
        'string' => ':attribute 는 반드시 :value 글자보다 같거나 많아야 합니다.',
    ],
    'image' => ':attribute 는 반드시 이미지여야 합니다.',
    'in' => '선택된 :attribute 가 올바르지 않습니다.',
    'in_array' => ':attribute 필드가 :other 에 존재하지 않습니다.',
    'integer' => ':attribute 는 반드시 숫자여야 합니다.',
    'ip' => ':attribute 는 반드시 올바른 IP 주소여야 합니다.',
    'ipv4' => ':attribute 는 반드시 올바른 IPv4 주소여야 합니다.',
    'ipv6' => ':attribute 는 반드시 올바른 IPv4 주소여야 합니다.',
    'json' => ':attribute 는 반드시 올바른 JSON 값이어야 합니다.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => ':attribute 는 반드시 :value 아이템보다 적어야 합니다.',
        'file' => ':attribute 는 반드시 :value 킬로바이트보다 작아야 합니다.',
        'numeric' => ':attribute 는 반드시 :value 보다 작아야 합니다.',
        'string' => ':attribute 는 반드시 :value 글자보다 적어야 합니다.',
    ],
    'lte' => [
        'array' => ':attribute 는 :value 아이템보다 많아서는 안됩니다.',
        'file' => ':attribute 는 :value 킬로바이트보다 같거나 작어야합니다.',
        'numeric' => ':attribute 는 반드시 :value보다 같거나 작아야합니다.',
        'string' => ':attribute 는 반드시 :value 글자보다 같거나 적어야합니다.',
    ],
    'mac_address' => ':attribute 는 반드시 올바른 MAC 주소여야 합니다.',
    'max' => [
        'array' => ':attribute 는 반드시 :max 아이템보다 많아서는 안됩니다.',
        'file' => ':attribute 는 반드시 :max 킬로바이트보다 커서는 안됩니다.',
        'numeric' => ':attribute 는 반드시 :max보다 커서는 안됩니다.',
        'string' => ':attribute 는 :max 글자보다 많아서는 안됩니다.',
    ],
    'mimes' => ':attribute 는 반드시 다음과 같은 파일 유형이어야 합니다: :values.',
    'mimetypes' => ':attribute 는 반드시 다음과 같은 파일 유형이어야 합니다: :values.',
    'min' => [
        'array' => ':attribute 는 반드시 적어도 :min 이어야 합니다.',
        'file' => ':attribute 는 반드시 적어도 :min 킬로바이트여야 합니다.',
        'numeric' => ':attribute 는 반드시 적어도 :min 이어야 합니다.',
        'string' => ':attribute 는 반드시 적어도 :min 글자여야 합니다.',
    ],
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => ':attribute 는 반드시 다수의 :value 여야 합니다.',
    'not_in' => '선택된 :attribute 가 올바르지 않습니다.',
    'not_regex' => ':attribute 포맷이 올바르지 않습니다.',
    'numeric' => ':attribute 는 반드시 숫자여야 합니다.',
    'password' => [
        'letters' => ':attribute 는 반드시 1개 이상의 문자가 포함되야 합니다.',
        'mixed' => ':attribute 는 반드시 1개 이상의 대문자와 소문자가 포함되야 합니다.',
        'numbers' => ':attribute 는 반드시 1개 이상의 숫자가 포함되야 합니다.',
        'symbols' => ':attribute 는 반드시 1개 이상의 특수문자가 포함되야 합니다.',
        'uncompromised' => '주어진 :attribute 가 데이터 유출로 보입니다. 다른 :attribute 를 선택해주세요.',
    ],
    'present' => ':attribute 필드는 반드시 주어져야 합니다.',
    'prohibited' => ':attribute 필드는 금지되었습니다.',
    'prohibited_if' => ':attribute 필드는 :other 가 :value 일때 금지됩니다.',
    'prohibited_unless' => ':attribute 필드는 :other가 :value안에 있지 않은 한 금지됩니다.',
    'prohibits' => ':attribute 필드는 :other 가 지정될 때 금지됩니다.',
    'regex' => ':attribute 포맷이 올바르지 않습니다.',
    'required' => ':attribute 필드가 필요합니다.',
    'required_array_keys' => ':attribute 필드는 반드시 :values 엔트리에 포함되어야 합니다.',
    'required_if' => ':attribute 필드는 :other 가 :value 안에 있을 때 필요합니다.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':attribute 필드는 :other 가 :values 안에 있지 않는 이상 필요합니다.',
    'required_with' => ':attribute 필드는 :values 가 지정되었을 때 필요합니다.',
    'required_with_all' => ':attribute 필드는 :values 가 지정되었을 때 필요합니다.',
    'required_without' => ':attribute 필드는 :values 가 지정되지 않았을 때 필요합니다.',
    'required_without_all' => ':attribute 필드는 :values 가 지정되지 않았을 때 필요합니다.',
    'same' => ':attribute 와 :other 가 맞지 않습니다.',
    'size' => [
        'array' => ':attribute 는 :size 아이템를 포함하고 있어야 합니다.',
        'file' => ':attribute 는 반드시 :size 킬로바이트여야 합니다.',
        'numeric' => ':attribute 는 반드시 :size 크기여야 합니다.',
        'string' => ':attribute 는 반드시 :size 글자 크기여야 합니다.',
    ],
    'starts_with' => ':attribute 는 반드시 다음으로 시작해야 합니다: :values.',
    'string' => ':attribute 는 반드시 문자열이어야 합니다.',
    'timezone' => ':attribute 는 올바른 시간대여야 합니다.',
    'unique' => ':attribute 가 이미 있습니다.',
    'uploaded' => ':attribute 가 업로드에 실패했습니다. 이 파일이 너무 무거울 수도 있습니다.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => ':attribute 는 반드시 올바른 주소여야 하빈다.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => ':attribute 는 반드시 올바른 UUID여야 합니다.',

    'username' => ':attribute 는 반드시 올바른 유저이름이어야 합니다.',
    'slug' => ':attribute 는 반드시 소문자,숫자와 작대기가 포함된 slug여야 합니다.',
    'color' => ':attribute 는 반드시 헥스 색상값이어야 합니다.',
    'game_auth' => ':attribute 는 반드시 :game 유저이름이어야 합니다.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '커스텀-메시지',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address' => '주소',
        'category_id' => '카테고리',
        'code' => '코드',
        'color' => '색상',
        'conditions' => '상태',
        'content' => '콘텐츠',
        'description' => '설명',
        'email' => '이메일 주소',
        'icon' => '아이콘',
        'image' => '이미지',
        'join_url' => '접속 주소',
        'link' => '링크',
        'money' => '돈',
        'name' => '이름',
        'page' => '페이지',
        'password' => '비밀번호',
        'plugin' => '플러그인',
        'port' => '포트',
        'post' => '링크',
        'price' => '가격',
        'published_at' => '게시됨: ',
        'quantity' => '수량',
        'reason' => '사유',
        'role_id' => '역할',
        'server' => '서버',
        'short_description' => '짧은 설명',
        'slug' => 'slug',
        'title' => '제목',
        'type' => '유형',
        'url' => '주소',
        'user' => '유저',
        'value' => '가치',
    ],

];
