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

    'accepted' => 'Das :attribute muss akzeptiert werden.',
    'accepted_if' => 'Das :attribute muss akzeptiert werden, wenn :other :value ist.',
    'active_url' => 'Das :attribute ist keine gültige URL.',
    'after' => 'Das :attribute muss ein Datum nach :date sein.',
    'after_or_equal' => 'Das :attribute muss ein Datum nach oder gleich dem :date sein.',
    'alpha' => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute muss ein Array sein.',
    'ascii' => 'Das :attribut darf nur alphanumerische Einzelbyte-Zeichen und Symbole enthalten.',
    'before' => 'Das :attribute muss ein Datum vor dem :date sein.',
    'before_or_equal' => 'Das :attribute muss ein Datum vor oder gleich dem :date sein.',
    'between' => [
        'array' => 'Das :attribute muss zwischen :min und :max Elementen liegen.',
        'file' => 'Das :attribute muss zwischen :min und :max Kilobyte liegen.',
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'string' => 'Das :attribute muss zwischen :min und :max Zeichen liegen.',
    ],
    'boolean' => 'Das :attribute muss wahr oder falsch sein.',
    'confirmed' => 'Die Bestätigung des :attribute stimmt nicht überein.',
    'current_password' => 'Das Passwort ist inkorrekt.',
    'date' => 'Das :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das :attribute muss ein Datum sein, das dem :date entspricht.',
    'date_format' => 'Das :attribute stimmt nicht mit dem Format :format überein.',
    'decimal' => 'Das :attribut muss über die Nachkommastellen :decimal verfügen.',
    'declined' => 'Das :attribute muss abgelehnt werden.',
    'declined_if' => 'Das :attribute muss abgelehnt werden, wenn :other :value ist.',
    'different' => 'Das :attribute und :other muss unterschiedlich sein.',
    'digits' => 'Das :attribute muss :digits Ziffern haben.',
    'digits_between' => 'Das :attribute muss zwischen den Ziffern :min und :max liegen.',
    'dimensions' => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das :attribute hat einen doppelten Wert.',
    'doesnt_start_with' => 'Das :attribute darf nicht mit einem der folgenden Werte beginnen: :values.',
    'email' => 'Das :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das :attribute muss mit einem der folgenden Werte enden: :values.',
    'enum' => 'Das ausgewählte :attribute ist ungültig.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'file' => 'Das :attribute muss eine Datei sein.',
    'filled' => 'Das :attribute Feld muss einen Wert haben.',
    'gt' => [
        'array' => 'Das :attribute muss mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute muss größer sein als :value Kilobyte.',
        'numeric' => 'Das :attribute muss größer sein als :value.',
        'string' => 'Das :attribute muss größer sein als :value Zeichen.',
    ],
    'gte' => [
        'array' => 'Das :attribute muss mindestens :value Elemente enthalten.',
        'file' => 'Das :attribute muss größer oder gleich :value Kilobyte sein.',
        'numeric' => 'Das :attribute muss größer oder gleich :value sein.',
        'string' => 'Das :attribute muss größer oder gleich :value Zeichen haben.',
    ],
    'image' => 'Das :attribute muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribute ist ungültig.',
    'in_array' => 'Das :attribute Feld existiert nicht in :other.',
    'integer' => 'Das :attribute muss eine Ganzzahl sein.',
    'ip' => 'Das :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute muss eine gültige JSON-Zeichenfolge sein.',
    'lowercase' => 'Das :attribut muss klein geschrieben werden.',
    'lt' => [
        'array' => 'Das :attribute muss weniger als :value Elemente enthalten.',
        'file' => 'Das :attribute muss kleiner als :value Kilobyte sein.',
        'numeric' => 'Das :attribute muss kleiner sein als :value.',
        'string' => 'Das :attribute muss kleiner sein als :value Zeichen.',
    ],
    'lte' => [
        'array' => 'Das :attribute darf nicht mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute muss kleiner oder gleich als :value Kilobyte sein.',
        'numeric' => 'Das :attribute muss kleiner oder gleich als :value sein.',
        'string' => 'Das :attribute muss kleiner oder gleich als :value Zeichen sein.',
    ],
    'mac_address' => 'Das :attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => 'Das :attribute darf nicht mehr als :max Elemente enthalten.',
        'file' => 'Das :attribute darf nicht größer sein als :max Kilobyte.',
        'numeric' => 'Das :attribute darf nicht größer sein als :max.',
        'string' => 'Das :attribute darf nicht größer als :max Zeichen sein.',
    ],
    'mimes' => 'Das :attribute muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das :attribute muss eine Datei vom Typ: :values sein.',
    'min' => [
        'array' => 'Das :attribute muss mindestens :min Elemente enthalten.',
        'file' => 'Das :attribute muss mindestens :min Kilobyte betragen.',
        'numeric' => 'Das :attribute muss mindestens :min sein.',
        'string' => 'Das :attribute muss mindestens :min Zeichen enthalten.',
    ],
    'missing' => 'Das Feld :attribute muss fehlen.',
    'missing_if' => 'Das Feld :attribute muss fehlen, wenn :other :value ist.',
    'missing_unless' => 'Das Feld :attribute muss fehlen, wenn :other nicht :value ist.',
    'missing_with' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden ist.',
    'missing_with_all' => 'Das Feld :attribut muss fehlen, wenn :values vorhanden sind.',
    'multiple_of' => 'Das :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :attribute ist ungültig.',
    'not_regex' => 'Das :attribute format ist ungültig.',
    'numeric' => 'Das :attribute muss eine Zahl sein.',
    'password' => [
        'letters' => 'Das :attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => 'Das :attribute muss mindestens einen Groß- und einen Kleinbuchstaben enthalten.',
        'numbers' => 'Das :attribute muss mindestens eine Zahl enthalten.',
        'symbols' => 'Das :attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribute ist in einem Datenleck aufgetaucht. Bitte wähle ein anderes :attribute.',
    ],
    'present' => 'Das :attribute Feld muss vorhanden sein.',
    'prohibited' => 'Das Feld :attribute ist verboten.',
    'prohibited_if' => 'Das Feld :attribute ist verboten, wenn :other :value ist.',
    'prohibited_unless' => 'Das Feld :attribute ist verboten, es sei denn, :other ist in :values ​​enthalten.',
    'prohibits' => 'Das Feld :attribute verbietet, dass :other vorhanden ist.',
    'regex' => 'Das :attribute Format ist ungültig.',
    'required' => 'Das :attribute Feld ist erforderlich.',
    'required_array_keys' => 'Das Feld :attribute muss Einträge enthalten für: :values.',
    'required_if' => 'Das :attribute Feld ist erforderlich, wenn :other :value ist.',
    'required_if_accepted' => 'Das Feld :attribute ist erforderlich, wenn :other akzeptiert wird.',
    'required_unless' => 'Das :attribute Feld ist erforderlich, es sei denn :other befindet sich in :values.',
    'required_with' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Das :attribute Feld ist erforderlich, wenn :values nicht vorhanden sind.',
    'required_without_all' => 'Das :attribute Feld ist erforderlich, wenn keiner der :values vorhanden sind.',
    'same' => 'Das :attribute und :other müssen übereinstimmen.',
    'size' => [
        'array' => 'Das :attribute muss :size Elemente enthalten.',
        'file' => 'Das :attribute muss :size Kilobyte sein.',
        'numeric' => 'Das :attribute muss :size sein.',
        'string' => 'Das :attribute muss :size Zeichen sein.',
    ],
    'starts_with' => 'Das :attribute muss mit einem der folgenden Elemente beginnen: :values.',
    'string' => 'Das :attribute muss eine Zeichenfolge sein.',
    'timezone' => 'Das :attribute muss eine gültige Zone sein.',
    'unique' => 'Das :attribute wurde bereits übernommen.',
    'uploaded' => 'Das :attribute konnte nicht hochgeladen werden. Vielleicht ist das zu schwer.',
    'uppercase' => 'Das :attribut muss in Großbuchstaben geschrieben werden.',
    'url' => 'Das :attribute Format: ist ungültig.',
    'ulid' => 'Das :attribut muss eine gültige ULID sein.',
    'uuid' => 'Das :attribute muss eine gültige UUID sein.',

    'username' => 'Das :attribute muss ein gültiger Benutzername sein.',
    'slug' => 'Das :attribute darf ein Slug mit nur Kleinbuchstaben, Zahlen und Bindestrichen sein.',
    'color' => 'Das :attribute muss ein hexadezimaler Farbcode sein.',
    'game_auth' => 'Das :attribute muss ein gültiger :game username sein.',

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
            'rule-name' => 'benutzerdefinierte Nachricht',
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
        'address' => 'Adresse',
        'category_id' => 'Kategorie',
        'code' => 'Code',
        'color' => 'Farbe',
        'conditions' => 'Konditionen',
        'content' => 'Inhalt',
        'description' => 'Beschreibung',
        'email' => 'E-Mail-Adresse',
        'icon' => 'Symbol',
        'image' => 'Bild',
        'join_url' => 'Beitritts-URL',
        'link' => 'Link',
        'money' => 'Guthaben',
        'name' => 'Name',
        'page' => 'Seite',
        'password' => 'Passwort',
        'plugin' => 'Plugin',
        'port' => 'Port',
        'post' => 'Link',
        'price' => 'Preis',
        'published_at' => 'Veröffentlicht unter',
        'quantity' => 'Menge',
        'reason' => 'Grund',
        'role_id' => 'Rolle',
        'server' => 'Server',
        'short_description' => 'Kurzbeschreibung',
        'slug' => 'Slug',
        'title' => 'Titel',
        'type' => 'Typ',
        'url' => 'URL',
        'user' => 'Benutzer',
        'value' => 'Wert',
    ],

];
