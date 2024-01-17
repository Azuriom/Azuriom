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

    'accepted' => 'Atrybut :attribute musi zostać zaakceptowany.',
    'accepted_if' => ':attribute musi być zaakceptowany, gdy :other jest :value.',
    'active_url' => 'Atrybut :attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą po :date.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub równą :date.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'array' => ':attribute musi zawierać elementy od :min do :max.',
        'file' => ':attribute musi znajdować się w przedziale od :min do :max kilobajtów.',
        'numeric' => ':attribute musi znajdować się w przedziale od :min do :max.',
        'string' => ':attribute musi mieć od :min do :max znaków.',
    ],
    'boolean' => ':attribute atrybut musi mieć wartość prawda lub fałsz.',
    'confirmed' => ':attribute potwierdzenie nie pasuje.',
    'current_password' => 'Hasło jest nieprawidłowe.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :date.',
    'date_format' => ':attribute nie pasuje do formatu :format.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => ':attribute musi zostać odrzucony.',
    'declined_if' => ':attribute musi zostać odrzucony, gdy :other jest :value.',
    'different' => ':attribute i :other muszą być różne.',
    'digits' => ':attribute musi być cyframi :digits.',
    'digits_between' => ':attribute musi zawierać się między :min a :max cyfr.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => ':attribute ma zduplikowaną wartość.',
    'doesnt_start_with' => ':attribute nie może zaczynać się od jednego z następujących elementów: :values.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jednym z następujących wartości :values.',
    'enum' => 'Wybrany :attribute jest nieprawidłowy.',
    'exists' => ':attribute jest nieprawidłowy.',
    'file' => ':attribute musi być plikiem.',
    'filled' => ':attribute musi mieć wartość.',
    'gt' => [
        'array' => ':attribute musi mieć więcej niż :value elementów.',
        'file' => ':attribute musi być większy niż :value kilobajtów.',
        'numeric' => ':attribute musi być większy niż :value.',
        'string' => ':attribute musi być większy niż :value znaków.',
    ],
    'gte' => [
        'array' => ':attribute musi mieć elementy wartości :value lub więcej.',
        'file' => ':attribute musi być większy lub równy :value kilobajtach.',
        'numeric' => ':attribute musi być większy lub równy wartości :value.',
        'string' => ':attribute musi być większy lub równy :value znaków.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany :attribute jest nieprawidłowy.',
    'in_array' => ':attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem JSON.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => ':attribute musi mieć mniej niż :value elementów.',
        'file' => ':attribute musi być mniejszy niż :value kilobajtów.',
        'numeric' => ':attribute musi być mniejszy niż :value.',
        'string' => ':attribute musi mieć mniej niż :value znaków.',
    ],
    'lte' => [
        'array' => ':attribute nie może zawierać więcej niż :value elementów.',
        'file' => ':attribute musi być mniejszy lub równy :value kilobajty.',
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'string' => ':attribute musi być mniejszy lub równy :value znaków.',
    ],
    'mac_address' => ':attribute musi być prawidłowym adresem MAC.',
    'max' => [
        'array' => ':attribute nie może mieć więcej elementów niż :max elementów.',
        'file' => ':attribute nie może być większa niż :max kilobajtów.',
        'numeric' => ':attribute nie może być większy niż :max.',
        'string' => ':attribute nie może być większa niż :max znaków.',
    ],
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'array' => ':attribute musi mieć co najmniej :min elementów.',
        'file' => ':attribute musi mieć co najmniej :min kilobajtów.',
        'numeric' => ':attribute musi wynosić co najmniej :min.',
        'string' => ':attribute musi mieć co najmniej :min znaków.',
    ],
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => ':attribute musi być wielokrotnością :value.',
    'not_in' => ':attribute jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => [
        'letters' => ':attribute musi zawierać co najmniej jedną literę.',
        'mixed' => ':attribute musi zawierać co najmniej jedną wielką literę i jedną małą literę.',
        'numbers' => ':attribute musi zawierać co najmniej jedną liczbę.',
        'symbols' => ':attribute musi zawierać co najmniej jeden symbol.',
        'uncompromised' => 'Podany :attribute pojawił się w wycieku danych. Proszę wybrać inny :attribute.',
    ],
    'present' => 'Pole :attribute musi być obecne.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione, gdy :other to :value.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other znajduje się w :values.',
    'prohibits' => 'Pole :attribute zabrania :other obecności .',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_array_keys' => 'Pole :attribute musi zawierać wpisy dla: :values.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other to :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other znajduje się w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy występuje :values.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy obecne są wartości :values.',
    'required_without' => 'Pole :attribute jest wymagane, gdy nie ma :values.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy nie ma żadnej z :values.',
    'same' => ':attribute i :other muszą być zgodne.',
    'size' => [
        'array' => ':attribute musi zawierać pozycje :size elementów.',
        'file' => ':attribute musi mieć wartość :size kilobajty.',
        'numeric' => ':attribute musi mieć wartość :size.',
        'string' => ':attribute musi zawierać :size znaków.',
    ],
    'starts_with' => ':attribute musi zaczynać się jedną z następujących wartości: :values.',
    'string' => ':attribute musi być łańcuchem.',
    'timezone' => ':attribute musi być prawidłową strefą.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => 'Nie udało się przesłać :attribute. Może ten jest za ciężki.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => 'Format :attribute jest nieprawidłowy.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => ':attribute musi być prawidłowym identyfikatorem UUID.',

    'username' => ':attribute musi być prawidłową nazwą użytkownika.',
    'slug' => ':attribute musi być plikiem informacyjnym zawierającym tylko małe litery, cyfry i myślniki.',
    'color' => ':attribute musi być hex kodem koloru.',
    'game_auth' => ':attribute musi być prawidłową nazwą użytkownika :gry.',

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
            'rule-name' => 'niestandardowy komunikat',
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
        'address' => 'adres Ip/Domena',
        'category_id' => 'kategoria',
        'code' => 'kod',
        'color' => 'kolor',
        'conditions' => 'warunki',
        'content' => 'treść',
        'description' => 'opis',
        'email' => 'adres e-mail',
        'icon' => 'ikona',
        'image' => 'zdjęcie',
        'join_url' => 'URL dołączenia',
        'link' => 'link',
        'money' => 'monety',
        'name' => 'nazwa',
        'page' => 'strona',
        'password' => 'hasło',
        'plugin' => 'wtyczka',
        'port' => 'port',
        'post' => 'link',
        'price' => 'cena',
        'published_at' => 'opublikowano w dniu',
        'quantity' => 'ilość',
        'reason' => 'powód',
        'role_id' => 'ranga',
        'server' => 'serwer',
        'short_description' => 'krótki opis',
        'slug' => 'link',
        'title' => 'temat',
        'type' => 'typ',
        'url' => 'URL',
        'user' => 'użytkownik',
        'value' => 'wartość',
    ],

];
