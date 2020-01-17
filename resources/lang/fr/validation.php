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
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date aprés le :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date aprés ou égale au :date.',
    'alpha' => 'Le champ :attribute doit contenir uniquement des lettres.',
    'alpha_dash' => 'Le champ :attribute doit contenir uniquement des lettres, des chiffres, des tirets et des underscores.',
    'alpha_num' => 'Le champ :attribute doit contenir uniquement des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date avant le :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date avant ou égale au :date.',
    'between' => [
        'numeric' => 'Le champ :attribute doit être entre :min et :max.',
        'file' => 'Le fichier :attribute doit faire entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute doit faire entre :min et :max caractères.',
        'array' => 'Le champ :attribute doit avoir entre :min et :max élements.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'date' => 'La date :attribute n\'est pas une date valide.',
    'date_equals' => 'La date :attribute doit être une date égale au :date.',
    'date_format' => 'La date :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit faire :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit faire entre :min et :max chiffres.',
    'dimensions' => 'Les dimensions de l\'image :attribute ne sont pas valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l\'une des valeurs suivantes: :values',
    'exists' => 'Le champ selectionné :attribute n\'est pas valide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file' => 'Le fichier :attribute doit faire plus de :value kilobytes.',
        'string' => 'Le champ :attribute doit faire plus de :value caractères.',
        'array' => 'Le champ :attribute doit avoir plus de :value élements.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égale à :value.',
        'file' => 'Le fichier :attribute doit faire :value kilobytes ou plus.',
        'string' => 'Le champ :attribute doit faire :value caractères ou plus.',
        'array' => 'Le champ :attribute doit avoir :value élements ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'La valeur du champ :attribute n\'est pas valide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un nombre entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être un JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le fichier :attribute doit faire moins de :value kilobytes.',
        'string' => 'Le champ :attribute doit faire moins de :value caractères.',
        'array' => 'Le champ :attribute doit avoir moins de :value élements.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égale à :value.',
        'file' => 'Le fichier :attribute doit faire :value kilobytes ou moins.',
        'string' => 'Le champ :attribute doit faire :value caractères ou moins.',
        'array' => 'Le champ :attribute doit avoir :value élements ou moins.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'file' => 'Le fichier :attribute ne doit pas faire plus de :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas faire plus de :max caractères.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :max élements.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'file' => 'Le fichier :attribute ne doit pas faire moins :min kilobytes.',
        'string' => 'Le champ :attribute ne doit pas faire moins :min caractères.',
        'array' => 'Le champ :attribute doit avoir au moins :min élements.',
    ],
    'not_in' => 'Le champ selectionné :attribute n\'est pas valide.',
    'not_regex' => 'Le champ :attribute n\'a pas un format valide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => 'Le champ :attribute n\'a pas un format valide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis quand le champ :other a pour valeur :value.',
    'required_unless' => 'Le champ :attribute est requis à moins que la valeur du champ :other soit comprise dans :values.',
    'required_with' => 'Le champ :attribute est requis quand les valeurs :values sont présentes.',
    'required_with_all' => 'Le champ :attribute est requis quand toutes les valeurs :values sont présentes.',
    'required_without' => 'Le champ :attribute est requis quand les valeurs :values ne sont pas présentes.',
    'required_without_all' => 'Le champ :attribute est requis quand aucunes des valeurs :values sont présentes.',
    'same' => 'Le champ :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit faire :size.',
        'file' => 'Le fichier :attribute doit faire :size kilobytes.',
        'string' => 'Le champ :attribute doit faire :size caractères.',
        'array' => 'Le champ :attribute doit avoir :size élements.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer par l\'une des valeurs suivantes: :values',
    'string' => 'Le champ :attribute doit être une ligne.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'Le champ :attribute a déjà été pris.',
    'uploaded' => 'Le champ :attribute n\'a pas été téléchargé.',
    'url' => 'Le champ :attribute n\'a pas un format valide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',

    'username' => 'Le champ :attribute doit être un nom un pseudo valide.',
    'slug' => 'Le champ :attribute doit être un lien avec seulement des lettres minuscules, des chiffres et des tirets.',
    'color' => 'Le champ :attribute doit être un code couleur hexadécimal.',
    'current-password' => 'Votre mot de passe actuel est incorrect.',

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
        'email' => 'adresse e-mail',
        'name' => 'nom',
        'title' => 'titre',
        'slug' => 'lien',
        'content' => 'contenu',
        'image' => 'fichier',
        'password' => 'mot de passe',
        'role' => 'grade',
        'color' => 'couleur',
        'reason' => 'raison',
    ],

];
