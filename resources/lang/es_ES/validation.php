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

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => ':attribute no es una dirección web valida.',
    'after' => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => ':attribute solo puede contener letras.',
    'alpha_dash' => 'La :attribute solo puede contener letras, números, guiones y guion bajo.',
    'alpha_num' => ':attribute solo puede contener letras y numeros.',
    'array' => 'El :attribute debe ser una secuencia.',
    'ascii' => ':attribute sólo debe contener caracteres y símbolos alfanuméricos de un solo byte.',
    'before' => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => ':attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'La tabla :attribute debe estar entre :min y :max items.',
        'file' => 'El tamaño del archivo :atributte debe estar entre :min y :max kilobytes.',
        'numeric' => ':attribute debe estar entre :min y :max.',
        'string' => 'El texto :attribute debe estar entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La :attribute confirmación no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => ':attribute no es una fecha valida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => ':attribute no corresponde al formato :format.',
    'decimal' => 'El campo :attribute debe tener :decimal decimales.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
    'different' => ':attribute y :other deben ser diferentes.',
    'digits' => ':attribute debe contener :digits digits.',
    'digits_between' => ':attribute debe estar entre :min y :max digitos.',
    'dimensions' => 'Las dimensiones de la imagen :attribute no son validas.',
    'distinct' => 'El campo :attribute tiene valores duplicados.',
    'doesnt_start_with' => 'El campo :attribute no debe iniciar con uno de los siguientes: :values.',
    'email' => ':attribute debe ser una dirección de correo valida.',
    'ends_with' => ':attribute debe terminar con uno de los siguientes: :valores.',
    'enum' => 'El :attribute seleccionado no es válido.',
    'exists' => 'El :attribute seleccionado es invalido.',
    'file' => ':attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => ':attribute debe tener más de :value items.',
        'file' => 'El tamaño del archivo :attribute debe ser más grande que :value kilobytes.',
        'numeric' => ':attribute debe ser mayor que :value.',
        'string' => 'El tamaño del texto :attribute debe ser mayor a :value caracteres.',
    ],
    'gte' => [
        'array' => 'El campo :attribute debe tener como mínimo :value elementos.',
        'file' => 'El campo :attribute debe tener como mínimo :value kilobytes.',
        'numeric' => ':attribute debe ser mayor o igual a :value.',
        'string' => 'El campo :attribute debe ser mayor o igual que :value.',
    ],
    'image' => 'El campo :attribute debe ser una imágen.',
    'in' => 'El campo :attribute es incorrecto.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'ip' => 'El campo :attribute debe ser una dirección ip válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPV4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPV6 válida.',
    'json' => 'El campo :attribute debe ser un formato JSON válido.',
    'lowercase' => ':attribute debe estar en minúsculas.',
    'lt' => [
        'array' => 'El campo :attribute debe ser menor que :value objetos.',
        'file' => 'El campo :attribute debe ser menor que :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string' => 'El campo :attribute debe ser menor que :value caracteres.',
    ],
    'lte' => [
        'array' => 'El campo :attribute no debe tener más de :value objetos.',
        'file' => 'El campo :attribute debe ser menor o igual que :vallue kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'string' => 'El campo :attribute debe ser menor o igual que :value caracteres.',
    ],
    'mac_address' => ':attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El campo :attribute no debe tener más de :max objetos.',
        'file' => 'El campo :attribute no debe ser más grande que :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser más grande que :max.',
        'string' => 'El campo :attribute no debe ser mayor a :max caracteres.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo del tipo :value.',
    'mimetypes' => 'El campo :attribute debe ser un archivo del tipo: :values.',
    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min objetos.',
        'file' => 'El campo :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'missing' => 'El campo :attribute debe estar ausente.',
    'missing_if' => 'El campo :attribute debe faltar cuando :other es :value.',
    'missing_unless' => 'El campo :attribute debe estar ausente a menos que :other sea :value.',
    'missing_with' => 'El campo :attribute debe estar ausente cuando :values está presente.',
    'missing_with_all' => 'El campo :attribute debe estar ausente cuando :values están presentes.',
    'multiple_of' => ':attribute debe ser un múltiplo de :value.',
    'not_in' => 'El campo :attribute es incorrecto.',
    'not_regex' => 'El formato del archivo :attribute es incorrecto.',
    'numeric' => 'El valor de :attribute debe ser un número.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El :attribute debe contener al menos una letra.',
        'symbols' => 'El :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El campo :attribute ha aparecido en una fuga de datos. Por favor, elige un :attribute diferente.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
    'regex' => 'El formato :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_if_accepted' => 'El campo :attribute es obligatorio cuando :other es aceptado.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values están presentes.',
    'same' => ':attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El campo :attribute debe contener :size items.',
        'file' => ':attribute debe ser :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe tener :size caracteres.',
    ],
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El campo :attribute debe ser una cadena.',
    'timezone' => ':attribute debe ser una zona válida.',
    'unique' => 'El atributo :attribute ya está en uso.',
    'uploaded' => 'El atributo :attribute no se pudo cargar. Tal vez este uno demasiado pesado.',
    'uppercase' => 'El campo :attribute debe tener mayúsculas.',
    'url' => 'El formato :attribute no es válido.',
    'ulid' => ':attribute debe ser un ULID válido.',
    'uuid' => ':attribute debe ser un UUID válido.',

    'username' => ':attribute debe ser un nombre de usuario válido.',
    'slug' => ':attribute debe ser un slug con sólo letras minúsculas, números y guiones.',
    'color' => ':attribute debe ser un código de color hexadecimal.',
    'game_auth' => 'El campo :attribute debe ser válido :game usuario.',

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
            'rule-name' => 'mensaje personalizado',
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
        'address' => 'dirección',
        'category_id' => 'categoría',
        'code' => 'código',
        'color' => 'color',
        'conditions' => 'condiciones',
        'content' => 'contenido',
        'description' => 'descripción',
        'email' => 'dirección de correo electrónico',
        'icon' => 'ícono',
        'image' => 'imagen',
        'join_url' => 'url de unión',
        'link' => 'enlace',
        'money' => 'dinero',
        'name' => 'nombre',
        'page' => 'página',
        'password' => 'contraseña',
        'plugin' => 'complemento',
        'port' => 'puerto',
        'post' => 'enlace',
        'price' => 'precio',
        'published_at' => 'publicado en',
        'quantity' => 'cantidad',
        'reason' => 'razón',
        'role_id' => 'rol',
        'server' => 'servidor',
        'short_description' => 'descripción corta',
        'slug' => 'slug',
        'title' => 'título',
        'type' => 'tipo',
        'url' => 'url',
        'user' => 'usuario',
        'value' => 'valor',
    ],

];
