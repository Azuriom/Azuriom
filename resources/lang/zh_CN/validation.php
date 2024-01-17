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

    'accepted' => '您必须同意 :attribute',
    'accepted_if' => ':attribute 只有在 :other 为 :value 时才可用',
    'active_url' => ':attribute 不是一个有效的 URL',
    'after' => ':attribute 必须在 :date 之后',
    'after_or_equal' => ':attribute 必须是晚于或等于 :date 的日期',
    'alpha' => ':attribute 只能包含字母',
    'alpha_dash' => ':attribute 只能包含字母、 数字、 破折号和下划线',
    'alpha_num' => ':attribute 只能包含字母和数字',
    'array' => ':attribute 必须是一个数组',
    'ascii' => ':attribute 只能包含单字节字母数字字符和符号.',
    'before' => ':attribute 必须在 :date 之前',
    'before_or_equal' => ':attribute 必须早于或等于 :date 的日期',
    'between' => [
        'array' => ':attribute 必须在 :min 到 :max 项目之间',
        'file' => ':attribute 必须介于 :min 到 :max kb 之间',
        'numeric' => ':attribute 必须介于 :min 和 :max 之间',
        'string' => ':attribute 必须介于 :min 到 :max 字符之间',
    ],
    'boolean' => ':attribute 字段必须为 true 或 false',
    'confirmed' => ':attribute 不匹配',
    'current_password' => '密码不正确.',
    'date' => ':attribute 不是一个有效的日期',
    'date_equals' => ':attribute 必须等于:date',
    'date_format' => ':attribute 与格式 :format 不匹配。',
    'decimal' => ':attribute 必须精确到小数后 :decimal 位.',
    'declined' => '您必须同意 :attribute.',
    'declined_if' => ':attribute 在 :other 是 :value 时不可用.',
    'different' => ':attribute 和 :other 必须不同。',
    'digits' => ':attribute 必须是 :digits 数字',
    'digits_between' => ':attribute 必须介于 :min 到 :max 位数字之间。',
    'dimensions' => ':attribute 图片尺寸不正确',
    'distinct' => ':attribute 具有重复值',
    'doesnt_start_with' => ':attribute 的开头不能是以下内容: :values',
    'email' => ':attribute 必须是一个有效的电子邮件地址',
    'ends_with' => ':attribute 必须以以下一个结尾：:values',
    'enum' => '所选的 :attribute 无效.',
    'exists' => '选中的 :attribute 无效',
    'file' => ':attribute 必须是一个文件',
    'filled' => ':attribute 字段必须有一个值',
    'gt' => [
        'array' => ':attribute 必须超过 :value 项',
        'file' => ':attribute 必须大于 :value kbytes。',
        'numeric' => ':attribute 必须大于 :value',
        'string' => ':attribute 必须大于 :value 字符',
    ],
    'gte' => [
        'array' => ':attribute 必须有 :value 项目或更多',
        'file' => ':attribute 必须大于等于:value kbytes。',
        'numeric' => ':attribute 必须大于等于 :value',
        'string' => ':attribute 必须大于或等于 :value 字符',
    ],
    'image' => ':attribute 必须是一个图像',
    'in' => '选中的 :attribute 无效',
    'in_array' => ':attribute 字段不存在 :other 中',
    'integer' => ':attribute 必须是整数',
    'ip' => ':attribute 必须是一个有效的 IP 地址',
    'ipv4' => ':attribute 必须是一个有效的 IPv4 地址',
    'ipv6' => ':attribute 必须是一个有效的 IPv6 地址',
    'json' => ':attribute 必须是一个有效的 JSON 字符串',
    'lowercase' => ':attribute 必须为小写.',
    'lt' => [
        'array' => ':attribute 必须小于 :value 项',
        'file' => ':attribute 必须小于 :value kb',
        'numeric' => ':attribute 必须小于 :value',
        'string' => ':attribute 必须少于 :value 个字符',
    ],
    'lte' => [
        'array' => ':attribute 不能超过 :value 项',
        'file' => ':attribute 必须小于或等于 :value kbytes',
        'numeric' => ':attribute 必须小于或等于 :value',
        'string' => ':attribute 必须小于或等于 :value 字符',
    ],
    'mac_address' => ':attribute 必须是一个有效的 MAC 地址.',
    'max' => [
        'array' => ':attribute 不能超过 :max 项',
        'file' => ':attribute 不能大于 :max kbytes',
        'numeric' => ':attribute 不能大于 :max',
        'string' => ':attribute 不能大于 :max 字符',
    ],
    'mimes' => ':attribute 必须是一个类型的文件：:values',
    'mimetypes' => ':attribute 必须是一个类型的文件：:values',
    'min' => [
        'array' => ':attribute 必须至少有 :min 项',
        'file' => ':attribute 必须至少 :min 千字节',
        'numeric' => ':attribute 必须至少 :min',
        'string' => ':attribute 必须至少 :min 字符',
    ],
    'missing' => ':attribute 不能填写内容.',
    'missing_if' => '当 :other 为 :value 时, :attribute 不能填写内容.',
    'missing_unless' => '除非 :other 为 :value 时, 否则 :attribute 不能填写内容.',
    'missing_with' => '当 :values 已填写时, :attribute 不能填写内容.',
    'missing_with_all' => '当 :values 已填写时, :attribute 不能填写内容.',
    'multiple_of' => ':attribute 必须是 :value 的倍数',
    'not_in' => '选中的 :attribute 无效',
    'not_regex' => ':attribute 格式不正确',
    'numeric' => ':attribute 必须是一个数字',
    'password' => [
        'letters' => ':attribute 至少需要包含一个字母.',
        'mixed' => ':attribute 至少需要包含一个大写字母和一个小写字母.',
        'numbers' => ':attribute 至少需要包含一个数字.',
        'symbols' => ':attribute 至少需要包含一个符号.',
        'uncompromised' => ':attribute 的值不安全。请输入一个不同的 :attribute.',
    ],
    'present' => ':attribute 字段必须存在',
    'prohibited' => ':attribute 字段是禁止的.',
    'prohibited_if' => '当 :other 为 :value 时, :attribute 字段被禁止',
    'prohibited_unless' => '除非 :other 为 :values，否则 :attribute 字段是禁止的',
    'prohibits' => ':attribute 字段禁止出现 ":other"',
    'regex' => ':attribute 格式不正确',
    'required' => ':attribute 字段是必需的',
    'required_array_keys' => ':attribute 字段必须包含: :values',
    'required_if' => '当 :other 是 :value 时，:attribute 字段是必需的',
    'required_if_accepted' => '当 :other 存在时, :attribute 为必填项.',
    'required_unless' => ':attribute 字段是必需的，除非 :other 是 :values',
    'required_with' => ':attribute 字段是必需的 :values 是存在的',
    'required_with_all' => ':attribute 字段是必需的 :values 是存在的',
    'required_without' => '当 :values 不存在时，:attribute 字段是必需的',
    'required_without_all' => '当没有 :values 不存在时，:attribute 字段是必需的',
    'same' => ':attribute 和 :other 必须匹配',
    'size' => [
        'array' => ':attribute 必须包含 :size 项',
        'file' => ':attribute 必须是 :size kobytes',
        'numeric' => ':attribute 必须是 :size',
        'string' => ':attribute 必须是 :size 字符',
    ],
    'starts_with' => ':attribute 必须以以下一个开始：:values',
    'string' => ':attribute 必须是一个字符串',
    'timezone' => ':attribute 必须是一个有效的区域',
    'unique' => ':attribute 已经被占用',
    'uploaded' => ':attribute 上传失败。也许文件太大',
    'uppercase' => ':attribute 必须为大写.',
    'url' => ':attribute 格式不正确',
    'ulid' => ':attribute 必须是有效的 ULID.',
    'uuid' => ':attribute 必须是一个有效的 UUID',

    'username' => ':attribute 必须是一个有效的用户名',
    'slug' => ':attribute 必须只包含小写字母、数字和连字符',
    'color' => ':attribute 必须是十六进制颜色代码',
    'game_auth' => ':attribute 必须是一个有效的 :game 用户名.',

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
            'rule-name' => '自定义消息',
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
        'address' => '地址',
        'category_id' => '分类',
        'code' => '代码',
        'color' => '颜色',
        'conditions' => '条件',
        'content' => '内容',
        'description' => '描述',
        'email' => '电子邮件地址',
        'icon' => '图标',
        'image' => '图像',
        'join_url' => '加入链接',
        'link' => '链接',
        'money' => '金币',
        'name' => '名称',
        'page' => '页面',
        'password' => '密码',
        'plugin' => '插件',
        'port' => '端口',
        'post' => '链接',
        'price' => '价格',
        'published_at' => '发表时间',
        'quantity' => '数量',
        'reason' => '原因',
        'role_id' => '角色',
        'server' => '服务器',
        'short_description' => '简介',
        'slug' => '缩写',
        'title' => '标题',
        'type' => '类型',
        'url' => 'url',
        'user' => '用户',
        'value' => '值',
    ],

];
