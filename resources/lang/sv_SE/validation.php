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

    'accepted' => ':attribute måste godkännas.',
    'accepted_if' => ':attribute måste accepteras när :other är :value.',
    'active_url' => ':attribute är inte en giltig webbadress.',
    'after' => ':attribute måste vara ett datum efter :date.',
    'after_or_equal' => ':attribute måste vara ett datum efter eller lika med :date.',
    'alpha' => ':attribute får endast innehålla bokstäver.',
    'alpha_dash' => ':attribute får endast innehålla bokstäver, nummer, punkter eller understreck.',
    'alpha_num' => ':attribute får endast innehålla bokstäver eller nummer.',
    'array' => ':attribute måste vara en array.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute måste vara ett datum före :date.',
    'before_or_equal' => ':attribute måste vara ett datum före eller lika med :date.',
    'between' => [
        'array' => ':attribute måste ha mellan :min och :max objekt.',
        'file' => ':attribute måste vara mellan :min och :max kilobyte.',
        'numeric' => ':attribute måste vara mellan :min och :max.',
        'string' => ':attribute måste vara mellan :min och :max characters.',
    ],
    'boolean' => ':attribute fältet måste vara sant eller falskt.',
    'confirmed' => ':attribute bekräftelsen matchar inte.',
    'current_password' => 'Felaktigt lösenord.',
    'date' => ':attribute är inte ett giltigt datum.',
    'date_equals' => ':attribute måste vara ett datum lika med :date.',
    'date_format' => ':attribute matchar inte formatet :format.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => ':attribute måste avvisas.',
    'declined_if' => ':attribute måste avvisas när :other är :value.',
    'different' => ':attribute och :other måste vara olika.',
    'digits' => ':attribute måste vara :digits siffror.',
    'digits_between' => ':attribute måste vara mellan :min och :max siffror.',
    'dimensions' => ':attribute har felaktiga bilddimensioner.',
    'distinct' => 'Fältet :attribute har ett dubbelt värde.',
    'doesnt_start_with' => ':attribute får inte börja med något av följande: :values.',
    'email' => ':attribute måste vara en giltig e-postadress.',
    'ends_with' => ':attribute måste sluta med något av följande: :values.',
    'enum' => 'Det valda :attribute är ogiltigt.',
    'exists' => 'Det valda :attribute är ogiltigt.',
    'file' => ':attribute måste vara en fil.',
    'filled' => ':attribute fältet måste ha ett värde.',
    'gt' => [
        'array' => ':attribute måste ha mer än :value items.',
        'file' => ':attribute måste vara större än :value kilobytes.',
        'numeric' => ':attribute måste vara större än :value.',
        'string' => ':attribute måste vara större än :value characters.',
    ],
    'gte' => [
        'array' => ':attribute måste ha :value objekt eller mer.',
        'file' => ':attribute måste vara större eller lika med :value kilobytes.',
        'numeric' => ':attribute måste vara större eller lika med :value.',
        'string' => ':attribute måste vara större eller lika med :value characters.',
    ],
    'image' => ':attribute måste vara en bild.',
    'in' => 'Det valda :attribute är ogiltigt.',
    'in_array' => 'Fältet :attribute existerar inte i :other.',
    'integer' => ':attribute måste vara ett heltal.',
    'ip' => ':attribute måste vara en giltig IP-adress.',
    'ipv4' => ':attribute måste vara en validerad IPv4 adress.',
    'ipv6' => ':attribute måste vara en validerad IPv6 adress.',
    'json' => ':attribute måste vara en validerad IPv6 adress.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => ':attribute måste ha mindre än :value objekt.',
        'file' => ':attribute måste vara mindre än :value kilobytes.',
        'numeric' => ':attribute måste vara mindre än :value.',
        'string' => ':attribute måste vara mindre än :value tecken.',
    ],
    'lte' => [
        'array' => ':attribute får inte ha mer än :value objekt.',
        'file' => ':attribute måste vara mindre eller lika med :value kilobytes.',
        'numeric' => ':attribute måste vara mindre eller lika med :value.',
        'string' => ':attribute måste vara mindre eller lika med :value characters.',
    ],
    'mac_address' => ':attribute måste vara en giltig IP-adress.',
    'max' => [
        'array' => ':attribute får inte ha mer än :max items.',
        'file' => ':attribute måste vara mindre än :value kilobytes.',
        'numeric' => ':attribute får inte vara större än :max.',
        'string' => ':attribute får inte vara mer än :max characters.',
    ],
    'mimes' => ':attribute måste vara en fil av typen: :values.',
    'mimetypes' => ':attribute måste vara en fil av typen: :values.',
    'min' => [
        'array' => ':attribute måste innehålla minst :min objekt.',
        'file' => ':attribute måste vara minst :min kilobytes.',
        'numeric' => ':attribute måste vara större än :min.',
        'string' => ':attribute måste vara längre än :min tecken.',
    ],
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => ':attributet måste vara en multipel av :värde.',
    'not_in' => 'Det valda :attribute är ogiltigt.',
    'not_regex' => ':attribute måste vara en giltig e-postadress.',
    'numeric' => ':attribute måste vara ett heltal.',
    'password' => [
        'letters' => ':attribute måste innehålla minst en bokstav.',
        'mixed' => ':attribute måste innehålla minst ett versaler och en versal.',
        'numbers' => ':attribute måste innehålla minst ett nummer.',
        'symbols' => ':attribute måste innehålla minst en symbol.',
        'uncompromised' => 'Det angivna :attribute har dykt upp i en dataläcka. Välj ett annat :attribute.',
    ],
    'present' => ':attribute fältet måste vara ifyllt.',
    'prohibited' => 'Fältet :attribute är förbjudet.',
    'prohibited_if' => ':attribute fältet är förbjudet när :other är :value.',
    'prohibited_unless' => ':attribute fältet är förbjudet om inte :other finns i :values.',
    'prohibits' => 'Fältet :attribute förbjuder :other från att vara närvarande.',
    'regex' => ':attribute måste vara en giltig e-postadress.',
    'required' => ':attribute fältet obligatoriskt.',
    'required_array_keys' => 'Fältet :attribute måste innehålla poster för: :values.',
    'required_if' => ':attribute fältet är obligatoriskt när :other är :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':attribute är obligatoriskt när inte :other finns bland :values.',
    'required_with' => ':attribute fältet krävs när :value is present.',
    'required_with_all' => ':attribute fältet krävs när :values are present.',
    'required_without' => ':attribute fältet är obligatoriskt när :values inte är synligt.',
    'required_without_all' => ':attribute är obligatoriskt när ingen av :values är ifyllt.',
    'same' => ':attribute och :other måste matcha.',
    'size' => [
        'array' => ':attribute måste innehålla :size poster.',
        'file' => ':attribute måste vara :size kilobytes.',
        'numeric' => ':attribute måste vara :size.',
        'string' => ':attribute måste vara :size tecken.',
    ],
    'starts_with' => ':attribute måste börja med något av följande: :values.',
    'string' => ':attribute måste vara en sträng.',
    'timezone' => ':attribute måste vara en giltig tidszon.',
    'unique' => ':attribute har redan tagits.',
    'uploaded' => 'Attributet kunde inte laddas upp. Kanske är det för tungt.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => ':attribute måste vara en giltig URL.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => ':attribute måste vara ett giltigt UUID.',

    'username' => ':attribute måste vara ett giltigt användarnamn.',
    'slug' => ':attribute måste vara en slug med endast små bokstäver, siffror och bindestreck.',
    'color' => ':attribute måste vara en hex färgkod.',
    'game_auth' => ':attribute måste vara ett giltigt :game användarnamn.',

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
        'address' => 'address',
        'category_id' => 'kategori',
        'code' => 'rumskod',
        'color' => 'färg',
        'conditions' => 'villkor',
        'content' => 'innehåll',
        'description' => 'beskrivning',
        'email' => 'e-postadress',
        'icon' => 'ikon',
        'image' => 'bilder',
        'join_url' => 'gå med URL',
        'link' => 'länkar',
        'money' => 'pengar',
        'name' => 'namn',
        'page' => 'sida',
        'password' => 'lösenord',
        'plugin' => 'plugin',
        'port' => 'port',
        'post' => 'länkar',
        'price' => 'pris',
        'published_at' => 'publicerat kl',
        'quantity' => 'kvantitet',
        'reason' => 'anledning',
        'role_id' => 'rättigheter',
        'server' => 'server',
        'short_description' => 'kort beskrivning',
        'slug' => 'permalänk',
        'title' => 'titel',
        'type' => 'typ',
        'url' => 'url',
        'user' => 'användare',
        'value' => 'värde',
    ],

];
