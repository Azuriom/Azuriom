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
    'accepted_if' => 'Значение :attribute должно быть принято, когда :other равно :value.',
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
        'array' => ':attribute должен содержать между :min и :max элементами.',
        'file' => ':attribute должен быть между :min и :max килобайт.',
        'numeric' => ':attribute должен быть между :min и :max.',
        'string' => ':attribute должен содержать между :min и :max символами.',
    ],
    'boolean' => ':attribute должен иметь значение true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'Неверный пароль.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'declined' => ':attribute должен быть отклонен.',
    'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должен содержать цифры :digits.',
    'digits_between' => ':attribute должен быть между :min и :max цифр.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values.',
    'enum' => 'Выбранный :attribute неверен.',
    'exists' => 'Выбранный :attribute является недействительным.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'array' => ':attribute должен содержать больше, чем :value элементов.',
        'file' => ':attribute должен быть больше, чем :value килобайт.',
        'numeric' => ':attribute должен быть больше, чем :value.',
        'string' => ':attribute должен содержать более :value символов.',
    ],
    'gte' => [
        'array' => ':attribute должен содержать :value или более элементов.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'numeric' => ':attribute должен быть больше или равен :value.',
        'string' => ':attribute должен содержать не менее :value символов.',
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
        'array' => ':attribute должен содержать меньше, чем :value элементов.',
        'file' => ':attribute должен быть меньше, чем :value килобайт.',
        'numeric' => ':attribute должен быть меньше, чем :value.',
        'string' => ':attribute должен содержать меньше, чем :value символов.',
    ],
    'lte' => [
        'array' => ':attribute не должен содержать больше, чем :value элементов.',
        'file' => ':attribute должен быть меньше или равен :value килобайт.',
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'string' => ':attribute должен содержать не более :value символов.',
    ],
    'mac_address' => ':attribute должен быть корректным MAC-адресом.',
    'max' => [
        'array' => ':attribute не может содержать больше, чем :value элементов.',
        'file' => ':attribute не может быть больше, чем :value килобайт.',
        'numeric' => ':attribute не может быть больше, чем :value.',
        'string' => ':attribute не может содержать более :value символов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ':attribute должен содержать не менее :min элементов.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'numeric' => ':attribute должен быть не менее :min.',
        'string' => ':attribute должен содержать не менее :min символов.',
    ],
    'multiple_of' => ':attribute должен быть кратным :value.',
    'not_in' => 'Выбранный :attribute является недействительным.',
    'not_regex' => ':attribute имеет недопустимый формат.',
    'numeric' => ':attribute должен быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute недоступно, когда :other — :value.',
    'prohibited_unless' => 'Поле :attribute недоступно, если :other не в :values.',
    'prohibits' => 'Поле :attribute делает :other недопустимым.',
    'regex' => ':attribute имеет недопустимый формат.',
    'required' => 'Поле :attribute обязательно.',
    'required_array_keys' => 'Поле :attribute должно иметь записи для: :values.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно, если :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :value.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательно, когда не присутствуют :values.',
    'required_without_all' => 'Поле :attribute обязательно, когда присутствует одно из значений :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'array' => ':attribute должен содержать :size элементов.',
        'file' => ':attribute должен быть равен :size килобайтам.',
        'numeric' => ':attribute должен быть равен :size.',
        'string' => ':attribute должен быть равен :size символам.',
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
    'game_auth' => ':attribute должен быть действительным именем пользователя :game.',

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
        'email' => 'адрес электронной почты',
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
