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

    'accepted' => 'S\'ha d\'acceptar :attribute.',
    'accepted_if' => 'El camp :attribute és obligatori quan :other és :value.',
    'active_url' => ':attribute no és una URL vàlida.',
    'after' => 'El camp :attribute ha de ser una data posterior a :date.',
    'after_or_equal' => 'El camp :attribute ha de ser una data posterior a :date.',
    'alpha' => 'El camp :attribute només pot contenir lletres.',
    'alpha_dash' => 'El camp :attribute només pot contenir lletres, números, guions i guions baixos.',
    'alpha_num' => 'El camp :attribute només pot contenir lletres i números.',
    'array' => ':attribute ha de ser una llista.',
    'before' => 'El camp :attribute ha de ser una data anterior a :date.',
    'before_or_equal' => 'El camp :attribute ha de ser una data anterior o igual a :date.',
    'between' => [
        'array' => 'El camp :attribute ha de tenir entre :min i :max elements.',
        'file' => 'El camp :attribute ha de tenir entre :min i :max kilobytes.',
        'numeric' => 'El camp :attribute ha d\'estar entre :min i :max.',
        'string' => 'El camp :attribute ha de tenir entre :min i :max caràcters.',
    ],
    'boolean' => 'El camp :attribute ha de ser cert o fals.',
    'confirmed' => 'La confirmació del camp :attribute no coincideix.',
    'current_password' => 'La contrasenya no és correcta.',
    'date' => 'El camp :attribute no és una data vàlida.',
    'date_equals' => ':attribute ha de ser una data igual a :date.',
    'date_format' => 'El camp :attribute no coincideix amb el format :format.',
    'declined' => 'S\'ha de negar l\'atribut :attribute.',
    'declined_if' => 'S\'ha de negar l\'atribut :attribute quan :other és :value.',
    'different' => 'Els camps :attribute i :other han de ser diferents.',
    'digits' => 'El camp :attribute ha de tenir :digits dígits.',
    'digits_between' => 'El camp :attribute ha de tenir entre :min i :max dígits.',
    'dimensions' => 'El atribut :attribute té dimensions d\'imatge incorrectes.',
    'distinct' => 'El camp :attribute conté valor duplicat.',
    'email' => 'El camp :attribute ha de ser una adreça electrònica vàlida.',
    'ends_with' => 'El camp :attribute ha d\'acabar amb un dels següents valors: :values.',
    'enum' => 'El camp :attribute no és vàlid.',
    'exists' => 'El camp :attribute no és vàlid.',
    'file' => 'El camp :attribute ha de ser un fitxer.',
    'filled' => 'El camp :attribute ha de contenir un valor.',
    'gt' => [
        'array' => 'El camp :attribute ha de tenir més de :value elements.',
        'file' => 'El camp :attribute ha de tenir més de :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser més gran que :value.',
        'string' => 'El camp :attribute ha de tenir més de :value caràcters.',
    ],
    'gte' => [
        'array' => 'El camp :attribute ha de tenir :value elements o més.',
        'file' => 'El camp :attribute ha de tenir :value kilobytes o més.',
        'numeric' => 'El camp :attribute ha de ser més gran o igual que :value.',
        'string' => 'El camp :attribute ha de tenir :value caràcters o més.',
    ],
    'image' => 'El camp :attribute ha de ser una imatge.',
    'in' => 'El camp :attribute no és vàlid.',
    'in_array' => 'El camp :attribute no existeix en :other.',
    'integer' => 'El camp :attribute ha de ser un enter.',
    'ip' => 'El camp :attribute ha de ser una adreça IP vàlida.',
    'ipv4' => 'El camp :attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6' => 'El camp :attribute ha de ser una adreça IPv6 vàlida.',
    'json' => 'El camp :attribute ha de ser una cadena JSON vàlida.',
    'lt' => [
        'array' => 'El camp :attribute ha de tenir menys de :value elements.',
        'file' => 'El camp :attribute ha de tenir menys de :value kilobytes.',
        'numeric' => 'El camp :attribute ha de ser menor que :value.',
        'string' => 'El camp :attribute ha de tenir menys de :value caràcters.',
    ],
    'lte' => [
        'array' => 'El camp :attribute ha de tenir :value elements o menys.',
        'file' => 'El camp :attribute ha de tenir :value kilobytes o menys.',
        'numeric' => 'El camp :attribute ha de ser més petit o igual que :value.',
        'string' => 'El camp :attribute ha de tenir :value caràcters o menys.',
    ],
    'mac_address' => 'El camp :attribute ha de ser una adreça MAC vàlida.',
    'max' => [
        'array' => 'El camp :attribute no pot tenir més de :max elements.',
        'file' => 'El camp :attribute no pot tenir més de :max kilobytes.',
        'numeric' => 'El camp :attribute no pot ser més gran que :max.',
        'string' => 'El camp :attribute no pot tenir més de :max caràcters.',
    ],
    'mimes' => 'El camp :attribute ha de ser un fitxer del tipus: :values.',
    'mimetypes' => 'El camp :attribute ha de ser un fitxer del tipus: :values.',
    'min' => [
        'array' => 'El camp :attribute no pot tenir menys de :min elements.',
        'file' => 'El camp :attribute no pot tenir menys de :min kilobytes.',
        'numeric' => 'El camp :attribute no pot ser més petit que :min.',
        'string' => 'El camp :attribute no pot tenir menys de :min caràcters.',
    ],
    'multiple_of' => 'El camp :attribute ha de ser multiple de : :value.',
    'not_in' => 'El camp :attribute no és vàlid.',
    'not_regex' => 'El format del camp :attribute no és vàlid.',
    'numeric' => 'El camp :attribute ha de ser un número.',
    'password' => [
        'mixed' => 'El camp :attribute ha de contenir com a mínim una lletra majúscula i una lletra minúscula.',
        'letters' => 'El camp :attribute ha de contenir com a mínim una lletra.',
        'symbols' => 'El camp :attribute ha de contenir com a mínim un símbol.',
        'numbers' => 'El camp :attribute ha de contenir com a mínim un número.',
        'uncompromised' => 'El camp :attribute ha sigut filtrat en una bretxa de dades. Si us plau, escull un altre :attribute.',
    ],
    'present' => 'El camp :attribute ha d\'estar present.',
    'prohibited' => 'El camp :attribute està prohibit.',
    'prohibited_if' => 'El camp :attribute està prohibit quan :other és :value.',
    'prohibited_unless' => 'El camp :attribute està prohibit excepte quan :other és :value.',
    'prohibits' => 'El camp :attribute prohibeix :other.',
    'regex' => 'El format del camp :attribute no és vàlid.',
    'required' => 'El camp :attribute és obligatori.',
    'required_array_keys' => 'El camp :attribute ha de tindre valors de: :values.',
    'required_if' => 'El camp :attribute és obligatori quan :other és :value.',
    'required_unless' => 'El camp :attribute és obligatori excepte quan :other és :value.',
    'required_with' => 'El camp :attribute és obligatori quan hi ha aquest valor: :values.',
    'required_with_all' => 'El camp :attribute és obligatori quan hi ha aquests valors : :values.',
    'required_without' => 'El camp :attribute és obligatori quan no hi ha aquest valor: :values.',
    'required_without_all' => 'El camp :attribute és obligatori quan no hi ha cap d\'aquests valors: :values.',
    'same' => 'Els camps :attribute i :other han de coincidir.',
    'size' => [
        'array' => 'El camp :attribute ha de contenir :size elements.',
        'file' => 'El camp :attribute ha de tenir :size kilobytes.',
        'numeric' => 'El camp :attribute ha de ser :size.',
        'string' => 'El camp :attribute ha de tenir :size caràcters.',
    ],
    'starts_with' => 'El camp :attribute ha d\'acabar amb un dels següents valors: :values.',
    'string' => 'El camp :attribute ha de ser una cadena.',
    'timezone' => 'El camp :attribute ha de ser una zona vàlida.',
    'unique' => 'El camp :attribute ja està ocupat.',
    'uploaded' => 'El camp :attribute ha fallat. Potser pesa massa.',
    'url' => 'El format del camp :attribute no és vàlid.',
    'uuid' => 'El camp :attribute ha de ser un UUID vàlid.',

    'username' => 'El camp :attribute ha de ser un nom d\'usuari vàlid.',
    'slug' => 'El camp :attribute ha de ser un slug amb només lletres minúscules, números i guions.',
    'color' => 'El camp :attribute ha de ser codi color hex vàlid.',
    'game_auth' => 'El camp :attribute ha de ser un nom d\'usuari de :game vàlid.',

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
            'rule-name' => 'custom-message',
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
        'email' => 'Correu electrònic',
        'name' => 'nom',
        'title' => 'títol',
        'slug' => 'slug',
        'description' => 'descripció',
        'content' => 'contingut',
        'image' => 'imatge',
        'file' => 'arxiu',
        'password' => 'contrasenya',
        'role' => 'rol',
        'color' => 'color',
        'reason' => 'raó',
        'type' => 'tipus',
        'address' => 'adreça',
        'money' => 'diners',
    ],

];
