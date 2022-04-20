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
        'numeric' => ':attribute musí být mezi :min a :max.',
        'file' => ':attribute musí mít velikost :min až :max kilobajtů.',
        'string' => ':attribute musí obsahovat :min až :max znaků.',
        'array' => ':attribute musí mít mezi :min a :max položkami.',
    ],
    'boolean' => ':attribute musí mít hodnotu pravda nebo nepravda.',
    'confirmed' => 'Potvrzení :attribute se neshoduje.',
    'date' => ':attribute není platné datum.',
    'date_equals' => ':attribute musí být datum shodné s :date.',
    'date_format' => ':attribute neodpovídá formátu :format.',
    'different' => ':attribute a :other musí být jiné.',
    'digits' => ':attribute musí být :digits čísel dlouhé.',
    'digits_between' => ':attribute musí mít mezi :min a :max čísly.',
    'dimensions' => ':attribute má neplatné rozměry obrázku.',
    'distinct' => 'Pole :attribute má duplicitní hodnotu.',
    'email' => ':attribute musí být platná e-mailová adresa.',
    'ends_with' => ':attribute musí končit jedním z následujících: :values.',
    'exists' => 'Zvolená hodnota :attribute není platná.',
    'file' => ':attribute musí být soubor.',
    'filled' => 'Pole :attribute musí mít hodnotu.',
    'gt' => [
        'numeric' => ':attribute musí být více než :value.',
        'file' => ':attribute musí být větší než :value kilobajtů.',
        'string' => ':attribute musí mít více než :value znaků.',
        'array' => ':attribute musí mít více než :value položek.',
    ],
    'gte' => [
        'numeric' => ':attribute musí být větší nebo stejný jako :value.',
        'file' => ':attribute musí mít stejně nebo více než :value kilobajtů.',
        'string' => ':attribute musí mít stejně nebo více než :value znaků.',
        'array' => ':attribute musí mít :value nebo více položek.',
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
        'numeric' => ':attribute musí být méně než :value.',
        'file' => ':attribute musí být menší než :value kilobajtů.',
        'string' => ':attribute musí mít méně než :value znaků.',
        'array' => ':attribute musí mít méně než :value položek.',
    ],
    'lte' => [
        'numeric' => ':attribute musí být menší nebo stejný jako :value.',
        'file' => ':attribute musí mít stejně nebo méně než :value kilobajtů.',
        'string' => ':attribute musí mít stejně nebo méně než :value znaků.',
        'array' => ':attribute nesmí mít více než :value položek.',
    ],
    'max' => [
        'numeric' => ':attribute nesmí být více než :max.',
        'file' => ':attribute nesmí být větší než :max kilobajtů.',
        'string' => ':attribute nesmí mít více než :max znaků.',
        'array' => ':attribute nesmí mít více než :max položek.',
    ],
    'mimes' => ':attribute musí být soubor typu: :values.',
    'mimetypes' => ':attribute musí být soubor typu: :values.',
    'min' => [
        'numeric' => ':attribute musí být alespoň :min.',
        'file' => ':attribute musí mít alespoň :min kilobajtů.',
        'string' => ':attribute musí mít alespoň :min znaků.',
        'array' => ':attribute musí mít alespoň :min položek.',
    ],
    'multiple_of' => ':attribute musí být násobek :value.',
    'not_in' => 'Zvolená hodnota :attribute není platná.',
    'not_regex' => 'Formát hodnoty :attribute je neplatný.',
    'numeric' => ':attribute musí být číslo.',
    'present' => ':attribute je vyžadováno.',
    'regex' => 'Formát hodnoty :attribute je neplatný.',
    'required' => 'Pole :attribute je vyžadováno.',
    'required_if' => 'Pole :attribute je požadováno, když je :other :value.',
    'required_unless' => 'Pole :attribute je požadováno, pokud :other není v :values.',
    'required_with' => 'Pole :attribute je požadováno, pokud je přítomné :values.',
    'required_with_all' => 'Pole :attribute je požadováno, pokud je :values k dispozici.',
    'required_without' => 'Pole :attribute je požadováno, pokud není přítomno :values.',
    'required_without_all' => 'Pole :attribute je požadováno, pokud není přítomno ani jedno z :values.',
    'same' => ':attribute a :other se musí shodovat.',
    'size' => [
        'numeric' => ':attribute musí mít velikost :size.',
        'file' => ':attribute musí mít velikost :size kilobajtů.',
        'string' => ':attribute musí mít :size znaků.',
        'array' => ':attribute musí obsahovat :size položek.',
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
    'game-auth' => 'Pole :attribute musí být platné uživatelské jméno hry :game.',

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
