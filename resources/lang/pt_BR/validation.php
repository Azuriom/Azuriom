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

    'accepted' => 'O :attribute deve ser aceito.',
    'accepted_if' => 'O :attribute deve ser aceito quando :other é :value.',
    'active_url' => 'O :attribute não é um URL válido.',
    'after' => 'O :attribute deve ser uma data após :date.',
    'after_or_equal' => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O :attribute só pode conter letras.',
    'alpha_dash' => 'O :attribute só pode conter letras, números, traços e sublinhados.',
    'alpha_num' => 'O :attribute pode conter apenas letras e números.',
    'array' => 'O :attribute deve ser uma matriz.',
    'ascii' => 'O :attribute deve conter apenas caracteres alfanuméricos e símbolos.',
    'before' => 'O :attribute deve ser uma data antes de :date.',
    'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'array' => 'O :attribute deve estar entre :min e :max itens.',
        'file' => 'O :attribute deve estar entre :min e :max kilobytes.',
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'string' => 'O :attribute deve estar entre :min e :max caracteres.',
    ],
    'boolean' => 'O :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação de :attribute não corresponde.',
    'current_password' => 'A senha está incorreta.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao formato :format.',
    'decimal' => 'O :attribute deve ter  :decimal posições decimal.',
    'declined' => 'O :attribute deve ser recusado.',
    'declined_if' => 'O :attribute deve ser recusado quando :other é :value.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ser :digits dígitos.',
    'digits_between' => 'O :attribute deve ter entre :min e :max dígitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O :attribute tem um valor duplicado.',
    'doesnt_start_with' => 'O :attribute não pode começar com um dos seguintes: :values.',
    'email' => 'O :attribute deve ser um endereço de e-mail válido.',
    'ends_with' => 'O :attribute deve terminar com um dos seguintes: :values.',
    'enum' => 'O :attribute selecionado é inválido.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O :attribute deve ter um valor.',
    'gt' => [
        'array' => 'O :attribute deve ter mais que :value itens.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'numeric' => 'O :attribute deve ser maior que :value.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
    ],
    'gte' => [
        'array' => 'O :attribute deve ter :value itens ou mais.',
        'file' => 'O :attribute deve ser maior ou igual que :value kilobytes.',
        'numeric' => 'O :attribute deve ser maior ou igual que :value.',
        'string' => 'O :attribute deve ser maior ou igual que :value caracteres.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'O :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um número inteiro.',
    'ip' => 'O :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma cadeia de caracteres JSON válida.',
    'lowercase' => 'O :attribute deve estar em minúsculas.',
    'lt' => [
        'array' => 'O :attribute deve ser menor que :value itens.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'numeric' => 'O :attribute deve ser menor que :value.',
        'string' => 'O :attribute deve ser menor que :value caracteres.',
    ],
    'lte' => [
        'array' => 'O :attribute não deve ter mais do que :value itens.',
        'file' => 'O :attribute deve ser menor ou igual que :value kilobytes.',
        'numeric' => 'O :attribute deve ser menor ou igual que :value.',
        'string' => 'O :attribute deve ser menor ou igual que :value caracteres.',
    ],
    'mac_address' => 'O :attribute deve ser um endereço MAC válido.',
    'max' => [
        'array' => 'O :attribute não pode ser maior que :max itens.',
        'file' => 'O :attribute não pode ser maior que :max kilobytes.',
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'string' => 'O :attribute não pode ser maior que :max caracteres.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'array' => 'O :attribute deve ter pelo menos :min itens.',
        'file' => 'O :attribute deve ter pelo menos :min kilobytes.',
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'string' => 'O :attribute deve ter pelo menos :min caracteres.',
    ],
    'missing' => 'O campo :attribute deve estar faltando.',
    'missing_if' => 'O campo :attribute deve estar faltando quando :other é :value.',
    'missing_unless' => 'O campo :attribute deve estar faltando a menos que :other seja :value.',
    'missing_with' => 'O campo :attribute deve estar faltando quando :values está presente.',
    'missing_with_all' => 'O campo :attribute deve estar faltando quando :values estão presentes.',
    'multiple_of' => 'O :attribute deve ser um múltiplo de :value.',
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato do :attribute é inválido.',
    'numeric' => 'O :attribute deve ser um número.',
    'password' => [
        'letters' => 'O :attribute deve conter pelo menos uma letra.',
        'mixed' => 'O :attribute deve conter pelo menos uma letra maiúscula e uma minúscula.',
        'numbers' => 'O :attribute deve conter pelo menos um número.',
        'symbols' => 'O :attribute deve conter pelo menos um símbolo.',
        'uncompromised' => 'O :attribute apareceu em uma vazamento de dados. Por favor, escolha outro :attribute.',
    ],
    'present' => 'O :attribute deve estar presente.',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'O campo :attribute é proibido a não ser que :other esteja em :values.',
    'prohibits' => 'O campo :attribute proíbe :other de estar presente.',
    'regex' => 'O formato do :attribute é inválido.',
    'required' => 'O :attribute é necessário.',
    'required_array_keys' => 'O campo :attribute deve conter postagens para: :values.',
    'required_if' => 'O :attribute é necessário quando :other é :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other é aceito.',
    'required_unless' => 'O :attribute é necessário a menos que :other está em :values.',
    'required_with' => 'O :attribute é necessário quando :values é presente.',
    'required_with_all' => 'O :attribute é necessário quando :values estão presentes.',
    'required_without' => 'O :attribute é necessário quando :values não está presente.',
    'required_without_all' => 'O :attribute é necessário quando nenhum dos :values estão presentes.',
    'same' => 'O :attribute e :other devem corresponder.',
    'size' => [
        'array' => 'O :attribute deve conter :size itens.',
        'file' => 'O :attribute deve ser :size kilobytes.',
        'numeric' => 'O :attribute deve ser :size.',
        'string' => 'O :attribute deve ser :size caracteres.',
    ],
    'starts_with' => 'O :attribute deve começar com um dos seguintes: :values.',
    'string' => 'O :attribute deve ser uma cadeia de caracteres.',
    'timezone' => 'O :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já foi tomado.',
    'uploaded' => 'O :attribute falhou ao carregar. Talvez este seja muito pesado.',
    'uppercase' => 'O :attribute deve ser maiúsculo.',
    'url' => 'O formato do :attribute é inválido.',
    'ulid' => 'O :attribute deve ser um ULID válido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

    'username' => 'O :attribute deve ser um nome de usuário válido.',
    'slug' => 'O :attribute deve ser um slug com apenas letras minúsculas, números e traços.',
    'color' => 'O :attribute deve ser um código de cor hexadecimal.',
    'game_auth' => 'O :attribute deve ser um nome de usuário :game válido.',

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
            'rule-name' => 'mensagem personalizada',
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
        'address' => 'endereço',
        'category_id' => 'categoria',
        'code' => 'código',
        'color' => 'cor',
        'conditions' => 'condições',
        'content' => 'conteúdo',
        'description' => 'descrição',
        'email' => 'endereço de e-mail',
        'icon' => 'ícone',
        'image' => 'imagem',
        'join_url' => 'join URL',
        'link' => 'link',
        'money' => 'dinheiro',
        'name' => 'nome',
        'page' => 'página',
        'password' => 'senha',
        'plugin' => 'plugin',
        'port' => 'porta',
        'post' => 'link',
        'price' => 'preço',
        'published_at' => 'publicado em',
        'quantity' => 'quantidade',
        'reason' => 'rasão',
        'role_id' => 'cargo',
        'server' => 'servidor',
        'short_description' => 'descrição curta',
        'slug' => 'slug',
        'title' => 'título',
        'type' => 'tipo',
        'url' => 'url',
        'user' => 'usuário',
        'value' => 'valor',
    ],

];
