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

    'accepted' => 'Je potřeba přijmout :attribute.',
    'accepted_if' => 'Hodnota :attribute musí být přijata, když je hodnota :other :value.',
    'active_url' => ':attribute není platnou adresou URL.',
    'after' => ':attribute musí být datum po :date.',
    'after_or_equal' => ':attribute musí být datum po nebo rovné :date.',
    'alpha' => ':attribute může obsahovat pouze písmena.',
    'alpha_dash' => ':attribute může obsahovat pouze písmena, čísla, pomlčky a podtržítka.',
    'alpha_num' => ':attribute může obsahovat pouze písmena a čísla.',
    'array' => ':attribute musí být textové pole.',
    'before' => ':attribute musí být datum před :date.',
    'before_or_equal' => ':attribute musí být datum před nebo rovné :date.',
    'between' => [
        'array' => ':attribute musí mít mezi :min a :max položkami.',
        'file' => ':attribute musí mít velikost :min až :max kilobajtů.',
        'numeric' => ':attribute musí být mezi :min a :max.',
        'string' => ':attribute musí obsahovat :min až :max znaků.',
    ],
    'boolean' => ':attribute musí mít hodnotu pravda nebo nepravda.',
    'confirmed' => 'Potvrzení :attribute se neshoduje.',
    'current_password' => 'Heslo není správné.',
    'date' => ':attribute není platné datum.',
    'date_equals' => ':attribute musí být datum shodné s :date.',
    'date_format' => ':attribute neodpovídá formátu :format.',
    'declined' => 'Hodnota :attribute musí být zamítnuta.',
    'declined_if' => 'Hodnota :attribute musí být zamítnuta, když je hodnota :other :value.',
    'different' => ':attribute a :other musí být jiné.',
    'digits' => ':attribute musí být :digits čísel dlouhé.',
    'digits_between' => ':attribute musí mít mezi :min a :max čísly.',
    'dimensions' => ':attribute má neplatné rozměry obrázku.',
    'distinct' => 'Pole :attribute má duplicitní hodnotu.',
    'email' => ':attribute musí být platná e-mailová adresa.',
    'ends_with' => ':attribute musí končit jedním z následujících: :values.',
    'enum' => 'Zvolená hodnota :attribute není platná.',
    'exists' => 'Zvolená hodnota :attribute není platná.',
    'file' => ':attribute musí být soubor.',
    'filled' => 'Pole :attribute musí mít hodnotu.',
    'gt' => [
        'array' => ':attribute musí mít více než :value položek.',
        'file' => ':attribute musí být větší než :value kilobajtů.',
        'numeric' => ':attribute musí být více než :value.',
        'string' => ':attribute musí mít více než :value znaků.',
    ],
    'gte' => [
        'array' => ':attribute musí mít :value nebo více položek.',
        'file' => ':attribute musí mít stejně nebo více než :value kilobajtů.',
        'numeric' => ':attribute musí být větší nebo stejný jako :value.',
        'string' => ':attribute musí mít stejně nebo více než :value znaků.',
    ],
    'image' => ':attribute musí být obrázek.',
    'in' => 'Zvolená hodnota :attribute není platná.',
    'in_array' => ':attribute není v :other.',
    'integer' => ':attribute musí být celé číslo.',
    'ip' => ':attribute musí být platná IP adresa.',
    'ipv4' => ':attribute musí být platná IPv4 adresa.',
    'ipv6' => ':attribute musí být platná IPv6 adresa.',
    'json' => ':attribute musí být platný řetězec JSON.',
    'lt' => [
        'array' => ':attribute musí mít méně než :value položek.',
        'file' => ':attribute musí být menší než :value kilobajtů.',
        'numeric' => ':attribute musí být méně než :value.',
        'string' => ':attribute musí mít méně než :value znaků.',
    ],
    'lte' => [
        'array' => ':attribute nesmí mít více než :value položek.',
        'file' => ':attribute musí mít stejně nebo méně než :value kilobajtů.',
        'numeric' => ':attribute musí být menší nebo stejný jako :value.',
        'string' => ':attribute musí mít stejně nebo méně než :value znaků.',
    ],
    'mac_address' => 'Hodnota :attribute musí být platná MAC adresa.',
    'max' => [
        'array' => ':attribute nesmí mít více než :max položek.',
        'file' => ':attribute nesmí být větší než :max kilobajtů.',
        'numeric' => ':attribute nesmí být více než :max.',
        'string' => ':attribute nesmí mít více než :max znaků.',
    ],
    'mimes' => ':attribute musí být soubor typu: :values.',
    'mimetypes' => ':attribute musí být soubor typu: :values.',
    'min' => [
        'array' => ':attribute musí mít alespoň :min položek.',
        'file' => ':attribute musí mít alespoň :min kilobajtů.',
        'numeric' => ':attribute musí být alespoň :min.',
        'string' => ':attribute musí mít alespoň :min znaků.',
    ],
    'multiple_of' => ':attribute musí být násobek :value.',
    'not_in' => 'Zvolená hodnota :attribute není platná.',
    'not_regex' => 'Formát hodnoty :attribute je neplatný.',
    'numeric' => ':attribute musí být číslo.',
    'present' => ':attribute je vyžadováno.',
    'prohibited' => 'Pole :attribute je zakázáno.',
    'prohibited_if' => 'Pole :attribute je zakázání, když je :other :value.',
    'prohibited_unless' => 'Pole :attribute je zakázáno, pokud není :other v :values.',
    'prohibits' => 'Pole :attribute zakazuje přítomnost hodnoty :other.',
    'regex' => 'Formát hodnoty :attribute je neplatný.',
    'required' => 'Pole :attribute je vyžadováno.',
    'required_array_keys' => 'Pole :attribute musí obsahovat záznamy pro: :values.',
    'required_if' => 'Pole :attribute je požadováno, když je :other :value.',
    'required_unless' => 'Pole :attribute je požadováno, pokud :other není v :values.',
    'required_with' => 'Pole :attribute je požadováno, pokud je přítomné :values.',
    'required_with_all' => 'Pole :attribute je požadováno, pokud je :values k dispozici.',
    'required_without' => 'Pole :attribute je požadováno, pokud není přítomno :values.',
    'required_without_all' => 'Pole :attribute je požadováno, pokud není přítomno ani jedno z :values.',
    'same' => ':attribute a :other se musí shodovat.',
    'size' => [
        'array' => ':attribute musí obsahovat :size položek.',
        'file' => ':attribute musí mít velikost :size kilobajtů.',
        'numeric' => ':attribute musí mít velikost :size.',
        'string' => ':attribute musí mít :size znaků.',
    ],
    'starts_with' => ':attribute musí začínat jedním z následujících: :values.',
    'string' => ':attribute musí být řetězec.',
    'timezone' => ':attribute musí být platná zóna.',
    'unique' => ':attribute byl již použit.',
    'uploaded' => ':attribute se nepodařilo nahrát. Možná je moc velký.',
    'url' => 'Formát :attribute je neplatný.',
    'uuid' => ':attribute musí být platné UUID.',

    'username' => ':attribute musí být platné uživatelské jméno.',
    'slug' => ':attribute musí obsahovat pouze malá písmena, čísla a pomlčky.',
    'color' => ':attribute musí být barevný kód HEX.',
    'game_auth' => 'Pole :attribute musí být platné uživatelské jméno hry :game.',

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
            'rule-name' => 'vlastni-zprava',
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
        'email' => 'E-mailová adresa',
        'name' => 'název',
        'title' => 'nadpis',
        'slug' => 'trvalý odkaz',
        'description' => 'popis',
        'content' => 'obsah',
        'image' => 'obrázek',
        'file' => 'soubor',
        'password' => 'heslo',
        'role' => 'role',
        'color' => 'barva',
        'reason' => 'důvod',
        'type' => 'typ',
        'address' => 'adresa',
        'money' => 'peníze',
    ],

];
