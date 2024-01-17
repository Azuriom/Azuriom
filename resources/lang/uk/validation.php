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

    'accepted' => 'Поле :attribute має бути прийнято.',
    'accepted_if' => 'Поле :attribute повинне бути прийняте до :other :value.',
    'active_url' => 'Поле :attribute не є правильним URL.',
    'after' => 'Поле :attribute має містити дату не раніше :date.',
    'after_or_equal' => 'Поле :attribute має містити дату не раніше або дорівнювати :date.',
    'alpha' => 'Поле :attribute має містити лише літери.',
    'alpha_dash' => 'Поле :attribute має містити лише літери, цифри, дефіси та підкреслення.',
    'alpha_num' => 'Поле :attribute має містити лише літери та цифри.',
    'array' => 'Поле :attribute має бути масивом.',
    'ascii' => 'Поле :attribute має містити лише літерно-цифрові символи та символи з одномірні байти.',
    'before' => 'Поле :attribute має містити дату не пізніше :date.',
    'before_or_equal' => 'Поле :attribute має містити дату не пізніше або дорівнювати :date.',
    'between' => [
        'array' => 'Поле :attribute має бути між :min та :max елементами.',
        'file' => 'Розмір :attribute має бути в межах від :min до :max кілобайт.',
        'numeric' => 'Поле :attribute має бути в межах від :min до :max.',
        'string' => 'Текст в полі :attribute має бути не менше :min та не більше :max символів.',
    ],
    'boolean' => 'Поле :attribute має бути true або false.',
    'confirmed' => 'Підтвердження для :attribute не співпадає.',
    'current_password' => 'Неправильний пароль.',
    'date' => 'Поле :attribute не є датою.',
    'date_equals' => 'Поле :attribute має містити дату й дорівнювати :date.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'decimal' => 'Поле :attribute повинне мати :decimal знак.',
    'declined' => 'Поле :attribute має бути відхилене.',
    'declined_if' => 'Поле :attribute повинне бути відхилене, коли :other є :value.',
    'different' => 'Поля :attribute та :other повинні бути різними.',
    'digits' => 'Довжина цифрового поля :attribute повинна дорівнювати :digits.',
    'digits_between' => 'Довжина цифрового поля :attribute повинна бути в межах від :min до :max.',
    'dimensions' => 'Поле :attribute міщує неприпустимі розміри зображення.',
    'distinct' => 'Значення поля :attribute вже існує.',
    'doesnt_start_with' => 'Поле :attribute має починатися з одного з наступних рядків: :values.',
    'email' => 'Поле :attribute повинне містити коректну електронну адресу.',
    'ends_with' => 'Поле :attribute повинне закінчуватися одним з наступних: :values.',
    'enum' => 'Вибране :attribute значення неправильне.',
    'exists' => 'Обрана валюта недійсна.',
    'file' => 'Поле :attribute має містити файл.',
    'filled' => 'Поле :attribute повинно бути заповнене.',
    'gt' => [
        'array' => 'Кількість елементів поля :attribute повинно бути більше :value.',
        'file' => ':attribute повинно бути більше :value кілобайт.',
        'numeric' => 'Поле :attribute повинно бути більше :value.',
        'string' => 'Кількість символів поля :attribute повинно бути більше :value.',
    ],
    'gte' => [
        'array' => 'Кількість елементів поля :attribute повинно бути більше або дорівнювати :value.',
        'file' => ':attribute повинно бути більше або дорівнювати :value кілобайт.',
        'numeric' => 'Поле :attribute повинно бути більше або дорівнювати :value.',
        'string' => 'Кількість символів поля :attribute повинно бути більше :value.',
    ],
    'image' => ':attribute має бути зображенням.',
    'in' => 'Обрана валюта недійсна.',
    'in_array' => 'Значення поля :attribute не існує в :other.',
    'integer' => 'Поле :attribute має містити ціле число.',
    'ip' => 'Поле :attribute має містити IP адресу.',
    'ipv4' => 'Поле :attribute має бути коректною адресою IPv4.',
    'ipv6' => ':attribute має бути коректною адресою IPv6.',
    'json' => 'Дані поля :attribute мають бути в форматі JSON.',
    'lowercase' => ':attribute має бути в нижньому регістрі.',
    'lt' => [
        'array' => 'Кількість елементів поля :attribute повинно бути меньш ніж :value.',
        'file' => ':attribute повинно бути меньш ніж :value кілобайт.',
        'numeric' => 'Поле :attribute повинно бути меньш ніж :value.',
        'string' => 'Кількість символів поля :attribute повинно бути меньш ніж :value.',
    ],
    'lte' => [
        'array' => 'Кількість елементів поля :attribute повинно бути більше :value.',
        'file' => ':attribute повинно бути менше або дорівнювати :value кілобайт.',
        'numeric' => 'Поле :attribute повинно бути менше або дорівнювати :value.',
        'string' => 'Кількість символів поля :attribute повинно бути більше або дорівнювати :value.',
    ],
    'mac_address' => ':attribute має бути дійсною MAC-адресою.',
    'max' => [
        'array' => 'Поле :attribute повинне містити не більше :max елементів.',
        'file' => ':attribute має бути не більше :max кілобайт.',
        'numeric' => 'Поле :attribute має бути не більше :max.',
        'string' => 'Текст в полі :attribute повинен містити не більше, ніж :max символів.',
    ],
    'mimes' => 'Поле :attribute повинне містити файл одного з типів: :values.',
    'mimetypes' => 'Поле :attribute повинне містити файл одного з типів: :values.',
    'min' => [
        'array' => 'Поле :attribute повинне містити не менше :min елементів.',
        'file' => 'Розмір файлу в полі :attribute має бути не меншим :min кілобайт.',
        'numeric' => 'Поле :attribute повинне бути не менше :min.',
        'string' => 'Текст в полі :attribute повинен містити не менше :min символів.',
    ],
    'missing' => 'Поле :attribute повинне бути заповненим.',
    'missing_if' => 'Поле :attribute є обов\'язковим для заповнення, коли :other є :value.',
    'missing_unless' => 'Поле :attribute обов\'язкове, якщо :other не з :values.',
    'missing_with' => 'Поле :attribute є обов\'язковим для заповнення, коли :values вказано.',
    'missing_with_all' => 'Поле :attribute є обов\'язковим для заповнення, коли :values вказано.',
    'multiple_of' => 'Значення :attribute має бути декількома з :value.',
    'not_in' => 'Обрана валюта недійсна.',
    'not_regex' => 'Формат поля :attribute неправильний.',
    'numeric' => 'Поле :attribute має містити число.',
    'password' => [
        'letters' => 'Поле :attribute повинне містити принаймні одну букву.',
        'mixed' => 'Поле :attribute повинне містити принаймні одну велику і одну малу літеру.',
        'numbers' => 'Поле :attribute повинно містити хоча б одну цифру.',
        'symbols' => 'Поле :attribute повинно містити хоча б один символ.',
        'uncompromised' => 'Даний :attribute з\'явився в витоку даних. Будь ласка, виберіть інший :attribute.',
    ],
    'present' => 'Поле :attribute повинне бути заповненим.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, якщо :other є :value.',
    'prohibited_unless' => 'Поле :attribute заборонене, якщо :other не зазначено в :values.',
    'prohibits' => 'Поле :attribute забороняє :other бути присутнім.',
    'regex' => 'Формат поля :attribute неправильний.',
    'required' => 'Поле :attribute є обов\'язковим для заповнення.',
    'required_array_keys' => 'Поле :attribute повинне містити записи для: :values.',
    'required_if' => 'Поле :attribute є обов\'язковим для заповнення, коли :other є :value.',
    'required_if_accepted' => 'Поле :attribute обов\'язкове, коли :other є прийнятим.',
    'required_unless' => 'Поле :attribute обов\'язкове, якщо :other не з :values.',
    'required_with' => 'Поле :attribute є обов\'язковим для заповнення, коли :values вказано.',
    'required_with_all' => 'Поле :attribute є обов\'язковим для заповнення, коли :values вказано.',
    'required_without' => 'Поле :attribute є обов\'язковим для заповнення, коли :values не вказано.',
    'required_without_all' => 'Поле :attribute є обов\'язковим для заповнення, коли :values не вказано.',
    'same' => 'Поля :attribute та :other мають співпадати.',
    'size' => [
        'array' => 'Поле :attribute має містити :size елементів.',
        'file' => ':attribute має бути :size кілобайт.',
        'numeric' => 'Поле :attribute має бути довжиною :size.',
        'string' => ':attribute має бути довжиною :size символів.',
    ],
    'starts_with' => 'Поле :attribute повинне починатися з одного з наступних :values.',
    'string' => 'Поле :attribute повинне містити текст.',
    'timezone' => 'Поле :attribute повинне містити коректну часову зону.',
    'unique' => ':attribute вже використовується.',
    'uploaded' => 'Завантаження :attribute не вдалося. Можливо, це занадто важко.',
    'uppercase' => ':attribute має бути в верхньому регістрі.',
    'url' => 'Формат поля :attribute неправильний.',
    'ulid' => 'Поле :attribute має містити дійсний ULID.',
    'uuid' => 'Поле :attribute має містити дійсний UUID.',

    'username' => 'Поле :attribute повинне містити ім\'я користувача.',
    'slug' => 'Поле :attribute має містити лише малі літери, цифри та дефіси.',
    'color' => 'Поле :attribute має містити шістнадцятковий код кольору.',
    'game_auth' => 'Поле :attribute повинне містити :game ім\'я користувача.',

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
            'rule-name' => 'спеціальне повідомлення',
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
        'address' => 'адреса',
        'category_id' => 'категорія',
        'code' => 'код',
        'color' => 'колір',
        'conditions' => 'умови',
        'content' => 'зміст',
        'description' => 'опис',
        'email' => 'Електронна адреса',
        'icon' => 'значок',
        'image' => 'зображення',
        'join_url' => 'Адреса приєднання ',
        'link' => 'посилання',
        'money' => 'гроші',
        'name' => 'ім\'я',
        'page' => 'сторінка',
        'password' => 'пароль',
        'plugin' => 'плагін',
        'port' => 'порт',
        'post' => 'посилання',
        'price' => 'ціна',
        'published_at' => 'Опубліковано в',
        'quantity' => 'кількість',
        'reason' => 'причина',
        'role_id' => 'роль',
        'server' => 'Сервер',
        'short_description' => 'Короткий опис',
        'slug' => 'slug',
        'title' => 'назва',
        'type' => 'тип',
        'url' => 'URL-адреса',
        'user' => 'користувач',
        'value' => 'значення',
    ],

];
