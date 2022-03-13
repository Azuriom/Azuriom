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

    'accepted' => 'Le champ :attribute doit être accepté.',
    'accepted_if' => 'Le champ :attribute doit être accepté quand :other est :value.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date après le :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date après ou égale au :date.',
    'alpha' => 'Le champ :attribute doit contenir uniquement des lettres.',
    'alpha_dash' => 'Le champ :attribute doit contenir uniquement des lettres, des chiffres et des tirets.',
    'alpha_num' => 'Le champ :attribute doit contenir uniquement des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date avant le :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date avant ou égale au :date.',
    'between' => [
        'array' => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
        'file' => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être comprise entre :min et :max.',
        'string' => 'Le texte :attribute doit contenir entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Le champ de confirmation :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'La date :attribute doit être une date égale au :date.',
    'date_format' => 'La date :attribute ne correspond pas au format :format.',
    'declined' => 'Le champ :attribute ne doit pas être accepté.',
    'declined_if' => 'Le champ :attribute ne doit pas être accepté quand :other est :value.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions' => 'Les dimensions de l\'image :attribute ne sont pas valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l\'une des valeurs suivantes : :values',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'Le tableau :attribute doit contenir plus de :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure à :value kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être supérieure à :value.',
        'string' => 'Le texte :attribute doit contenir plus de :value caractères.',
    ],
    'gte' => [
        'array' => 'Le tableau :attribute doit contenir au moins :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure ou égale à :value kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être supérieure ou égale à :value.',
        'string' => 'Le texte :attribute doit contenir au moins :value caractères.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ :attribute est invalide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un nombre entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être un document JSON valide.',
    'lt' => [
        'array' => 'Le tableau :attribute doit contenir moins de :value éléments.',
        'file' => 'La taille du fichier de :attribute doit être inférieure à :value kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être inférieure à :value.',
        'string' => 'Le texte :attribute doit contenir moins de :value caractères.',
    ],
    'lte' => [
        'numeric' => 'La valeur du champ :attribute doit être inférieure ou égale à :value.',
        'file' => 'La taille du fichier de :attribute doit être inférieure ou égale à :value kilooctets.',
        'string' => 'Le texte :attribute doit contenir au plus :value caractères.',
        'array' => 'Le tableau :attribute doit contenir au plus :value éléments.',
    ],
    'max' => [
        'array' => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
        'file' => 'La taille du fichier de :attribute ne peut pas dépasser :max kilooctets.',
        'numeric' => 'La valeur du champ :attribute ne peut être supérieure à :max.',
        'string' => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
    ],
    'mac_address' => 'Le champ :attribute doit être une adresse MAC valide.',
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'array' => 'Le tableau :attribute doit contenir au moins :min éléments.',
        'file' => 'La taille du fichier de :attribute doit être supérieure à :min kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être supérieure ou égale à :min.',
        'string' => 'Le texte :attribute doit contenir au moins :min caractères.',
    ],
    'multiple_of' => 'Le champ :attribute doit être un multiple de :value.',
    'not_in' => 'Le champ :attribute sélectionné n\'est pas valide.',
    'not_regex' => 'Le format du champ :attribute n\'est pas valide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute ne peut pas être présent.',
    'prohibited_if' => 'Le champ :attribute ne peut pas être présent quand :other est :value.',
    'prohibited_unless' => 'Le champ :attribute ne peut pas être présent si :other n\'est pas dans :values.',
    'prohibits' => 'Le champ :attribute empêche le champ :other d\'être présent.',
    'regex' => 'Le format du champ :attribute est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_array_keys' => 'Le champ :attribute doit contenir des valeur pour : :values.',
    'required_if' => 'Le champ :attribute est requis quand la valeur de :other est :value.',
    'required_unless' => 'Le champ :attribute est requis sauf si :other est :values.',
    'required_with' => 'Le champ :attribute est requis quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est requis quand :values sont présents.',
    'required_without' => 'Le champ :attribute est requis quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis quand aucun de :values n\'est présent.',
    'same' => 'Les champs :attribute et :other doivent être identiques.',
    'size' => [
        'array' => 'Le tableau :attribute doit contenir :size éléments.',
        'file' => 'La taille du fichier de :attribute doit être de :size kilooctets.',
        'numeric' => 'La valeur du champ :attribute doit être :size.',
        'string' => 'Le texte de :attribute doit contenir :size caractères.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer avec une des valeurs suivantes: :values',
    'string' => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    'uploaded' => 'Le fichier du champ :attribute n\'a pas pu être téléchargé. Celui-ci est peut-être trop lourd.',
    'url' => 'Le champ :attribute n\'est pas une URL valide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',

    'username' => 'Le champ :attribute doit être un pseudo valide.',
    'slug' => 'Le champ :attribute doit être un lien avec seulement des lettres minuscules, des chiffres et des tirets.',
    'color' => 'Le champ :attribute doit être un code couleur hexadécimal.',
    'game_auth' => 'Le champ :attribute doit être un pseudo :game valide.',

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
            'rule-name' => 'message personnalisé',
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
        'email' => 'adresse email',
        'name' => 'nom',
        'title' => 'titre',
        'slug' => 'lien',
        'description' => 'description',
        'content' => 'contenu',
        'image' => 'image',
        'file' => 'fichier',
        'password' => 'mot de passe',
        'role' => 'grade',
        'color' => 'couleur',
        'reason' => 'raison',
        'type' => 'type',
        'address' => 'adresse',
        'money' => 'argent',
    ],

];
