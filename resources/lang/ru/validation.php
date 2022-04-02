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

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равен :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, тире и подчёркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой до :date.',
    'before_or_equal' => ':attribute должен быть датой до или равен :date.',
    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайт.',
        'string' => ':attribute должен содержать между :min и :max символами.',
        'array' => ':attribute должен содержать между :min и :max элементами.',
    ],
    'boolean' => ':attribute должен иметь значение true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должен содержать цифры :digits.',
    'digits_between' => ':attribute должен быть между :min и :max цифр.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values.',
    'exists' => 'Выбранный :attribute является недействительным.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должен быть больше, чем :value.',
        'file' => ':attribute должен быть больше, чем :value килобайт.',
        'string' => ':attribute должен содержать более :value символов.',
        'array' => ':attribute должен содержать больше, чем :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'string' => ':attribute должен содержать не менее :value символов.',
        'array' => ':attribute должен содержать :value или более элементов.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute является недействительным.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше, чем :value.',
        'file' => ':attribute должен быть меньше, чем :value килобайт.',
        'string' => ':attribute должен содержать меньше, чем :value символов.',
        'array' => ':attribute должен содержать меньше, чем :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'file' => ':attribute должен быть меньше или равен :value килобайт.',
        'string' => ':attribute должен содержать не более :value символов.',
        'array' => ':attribute не должен содержать больше, чем :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше, чем :value.',
        'file' => ':attribute не может быть больше, чем :value килобайт.',
        'string' => ':attribute не может содержать более :value символов.',
        'array' => ':attribute не может содержать больше, чем :value элементов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен содержать не менее :min символов.',
        'array' => ':attribute должен содержать не менее :min элементов.',
    ],
    'multiple_of' => ':attribute должен быть кратным :value.',
    'not_in' => 'Выбранный :attribute является недействительным.',
    'not_regex' => ':attribute имеет недопустимый формат.',
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Неверный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => ':attribute имеет недопустимый формат.',
    'required' => 'Поле :attribute обязательно.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно, если :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :value.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательно, когда не присутствуют :values.',
    'required_without_all' => 'Поле :attribute обязательно, когда присутствует одно из значений :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть равен :size.',
        'file' => ':attribute должен быть равен :size килобайтам.',
        'string' => ':attribute должен быть равен :size символам.',
        'array' => ':attribute должен содержать :size элементов.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих значений: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимым часовым поясом.',
    'unique' => ':attribute уже используется.',
    'uploaded' => 'Не удалось загрузить :attribute. Может быть, он слишком тяжёлый.',
    'url' => ':attribute имеет недопустимый формат.',
    'uuid' => ':attribute должен быть действительным UUID.',

    'username' => ':attribute должен быть действительным именем пользователя.',
    'slug' => ':attribute должен быть ссылкой только со строчными буквами, цифрами и тире.',
    'color' => ':attribute должен быть шестнадцатеричным цветовым кодом.',
    'game-auth' => ':attribute должен быть действительным именем пользователя :game.',

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
            'rule-name' => 'пользовательское сообщение',
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
        'email' => 'Почтовый адрес',
        'name' => 'название',
        'title' => 'заголовок',
        'slug' => 'ссылка',
        'description' => 'описание',
        'content' => 'содержание',
        'image' => 'изображение',
        'file' => 'файл',
        'password' => 'пароль',
        'role' => 'роль',
        'color' => 'цвет',
        'reason' => 'причина',
        'type' => 'тип',
        'address' => 'адрес',
        'money' => 'деньги',
    ],

];
