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

    'accepted' => ':attribute on hyväksyttävä.',
    'accepted_if' => ':attribute kenttä tulee hyväksyä kun :other on :value.',
    'active_url' => ':attribute ei ole kelvollinen URL-osoite.',
    'after' => ':attribute päiväyksen tulee olla jälkeen :date.',
    'after_or_equal' => ':attribute päiväyksen tulee olla sama tai jälkeen :date.',
    'alpha' => ':attribute voi sisältää ainoastaan kirjaimia.',
    'alpha_dash' => ':attribute voi sisältää ainoastaan kirjaimia, numeroita, viivoja ja alaviivoja.',
    'alpha_num' => ':attribute voi sisältää ainoastaan kirjaimia ja numeroita.',
    'array' => ':attribute on oltava taulukko.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute päiväyksen tulee olla ennen :date.',
    'before_or_equal' => ':attribute päiväyksen tulee olla sama tai ennen :date.',
    'between' => [
        'array' => ':attribute on oltava :min ja :max välillä.',
        'file' => ':attribute on oltava vähintään :min ja enintään :max kilotavua.',
        'numeric' => ':attribute on oltava vähintään :min ja enintään :max.',
        'string' => ':attribute on oltava vähintään :min ja enintään :max merkkiä.',
    ],
    'boolean' => ':attribute kentän tulee olla tosi tai epätosi.',
    'confirmed' => ':attribute vahvistus ei täsmää.',
    'current_password' => 'Salasana on virheellinen.',
    'date' => ':attribute ei ole oikea päivämäärä.',
    'date_equals' => ':attribute päiväyksen tulee olla sama kuin :date.',
    'date_format' => ':attribute ei täsmää :format kanssa.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => ':attribute tulee olla hylätty.',
    'declined_if' => ':attribute tulee olla hylätty, kun :other on :value.',
    'different' => ':attribute ja :other on oltava erilaisia.',
    'digits' => ':attribute tulee olla :digits numeroa pitkä.',
    'digits_between' => ':attribute tulee olla numero väliltä :min ja :max.',
    'dimensions' => ':attribute kuvan mitat ovat virheelliset.',
    'distinct' => ':attribute kentässä on duplikaatti arvo.',
    'doesnt_start_with' => ':attribute ei saa alkaa jollakin seuraavista: :values.',
    'email' => ':attribute on oltava kelvollinen sähköpostiosoite.',
    'ends_with' => ':attribute arvon tulee päättyä johonkin seuraavista: :values.',
    'enum' => 'Valittu :attribute on virheellinen.',
    'exists' => 'Valittu :attribute on virheellinen.',
    'file' => ':attribute tulee olla tiedosto.',
    'filled' => ':attribute kentässä on oltava arvo.',
    'gt' => [
        'array' => ':attribute täytyy sisältää enemmän, kuin :value kohteita.',
        'file' => ':attribute tulee olla suurempi kuin :value kilobytes.',
        'numeric' => ':attribute tulee olla suurempi kuin :value.',
        'string' => ':attribute tulee olla suurempi kuin :value merkkiä.',
    ],
    'gte' => [
        'array' => ':attribute pitää sisältää vähintään :value kohdetta tai enemmän.',
        'file' => ':attribute täytyy olla isompi tai yhtä suuri, kuin :value kilotavua.',
        'numeric' => ':attribute täytyy olla isompi tai yhtä suuri, kuin :value.',
        'string' => ':attribute täytyy olla isompi tai yhtä suuri, kuin :value merkkiä.',
    ],
    'image' => ':attribute on oltava kuva.',
    'in' => 'Valittu :attribute on virheellinen.',
    'in_array' => ':attribute ei ole olemassa :other.',
    'integer' => ':attribute on oltava kokonaisluku.',
    'ip' => ':attribute on oltava kelvollinen IP-osoite.',
    'ipv4' => ':attribute täytyy olla IPv4 -osoite.',
    'ipv6' => ':attribute täytyy olla IPv6 -osoite.',
    'json' => ':attribute on oltava kelvollinen JSON-merkkijono.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => ':attribute täytyy sisältää vähemmän, kuin :value kohteita.',
        'file' => ':attribute on oltava pienempi kuin :value kilotavua.',
        'numeric' => ':attribute täytyy olla vähemmän, kuin :values.',
        'string' => ':attribute täytyy sisältää vähemmän, kuin :value merkkiä.',
    ],
    'lte' => [
        'array' => ':attribute ei saa sisältää yli :value kohteita.',
        'file' => ':attribute on oltava pienempi tai samansuuruinen kuin :value kilotavua.',
        'numeric' => ':attribute täytyy olla vähemmän tai yhtä suuri, kuin :value.',
        'string' => ':attribute täytyy olla vähemmän tai yhtä suuri, kuin :value merkkiä.',
    ],
    'mac_address' => ':attribute on oltava kelvollinen MAC-osoite.',
    'max' => [
        'array' => ':attribute ei saa olla enempää kuin :max kohteita.',
        'file' => ':attribute ei saa olla yli :max kilotavua.',
        'numeric' => ':attribute ei saa olla suurempi kuin :max.',
        'string' => ':attribute ei saa olla pidempi kuin :max merkkiä.',
    ],
    'mimes' => ':attribute tulee olla tyypiltään :values.',
    'mimetypes' => ':attribute tulee olla tyypiltään :values.',
    'min' => [
        'array' => ':attribute tulee sisältää vähintään :min kohtaa.',
        'file' => ':attribute tulee olla vähintään :min kilotavua.',
        'numeric' => ':attribute tulee olla vähintään :min.',
        'string' => ':attribute on oltava vähintään :min merkkiä pitkä.',
    ],
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => ':attribute tulee olla moninkertainen arvoon :value nähden.',
    'not_in' => 'Valittu :attribute on virheellinen.',
    'not_regex' => ':attribute muoto on virheellinen.',
    'numeric' => ':attribute tulee olla numero.',
    'password' => [
        'letters' => ':attribute täytyy sisältää ainakin yksi kirjain.',
        'mixed' => ':attribute täytyy sisältää vähintään yksi iso kirjain ja yksi pieni kirjain.',
        'numbers' => ':attribute täytyy sisältää ainakin yksi numero.',
        'symbols' => ':attribute täytyy sisältää ainakin yksi symboli.',
        'uncompromised' => ':attribute on esiintynyt tietovuodossa. Ole hyvä ja valitse toinen :attribute.',
    ],
    'present' => ':attribute kenttä täytyy olla valittu.',
    'prohibited' => ':attribute kenttä on kielletty.',
    'prohibited_if' => ':attribute kenttä on kielletty, kun :other on :value.',
    'prohibited_unless' => ':attribute kenttä on kielletty, ellei :other ole :values.',
    'prohibits' => ':attribute kenttä estää :other olemasta määritettynä.',
    'regex' => ':attribute muoto on virheellinen.',
    'required' => ':attribute kenttä täytyy olla täytetty.',
    'required_array_keys' => ':attribute täytyy sisältää syötöt :values.',
    'required_if' => ':attribute kenttä on pakollinen kun :other on :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':attribute kenttä on pakollinen ellei :other ole :value.',
    'required_with' => ':attribute on vaadittu kun :values on määritettynä.',
    'required_with_all' => ':attribute kenttä on täytettävä, jos :values on valittuna.',
    'required_without' => ':attribute kenttä vaaditaan kun :values on määrittämättä.',
    'required_without_all' => ':attribute kenttä vaaditaan kun mitään arvoista :values ei ole annettu.',
    'same' => ':attribute ja :other tulee täsmätä.',
    'size' => [
        'array' => ':attribute täytyy sisältää :size kohdetta.',
        'file' => ':attribute on oltava :size kilotavua.',
        'numeric' => ':attribute on oltava :size.',
        'string' => ':attribute on oltava :size merkkiä.',
    ],
    'starts_with' => ':attribute pitää alkaa jollain seuraavista: :values.',
    'string' => ':attribute on oltava merkkijono.',
    'timezone' => ':attribute tulee olla oikealla aikavyöhykkeellä.',
    'unique' => ':attribute on jo käytössä.',
    'uploaded' => ':attribute lataaminen epäonnistui. Ehkä tämä on liian suuri.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => ':attribute on oltava kelvollinen URL-osoite.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => ':attribute on oltava kelvollinen UUID.',

    'username' => ':attribute on oltava kelvollinen käyttäjätunnus.',
    'slug' => ':attribute täytyy olla tunniste ainoastaan pienillä kirjaimilla, numeroilla ja väliviivoilla.',
    'color' => ':attribute tulee olla hex väri koodi.',
    'game_auth' => ':attribute on oltava kelvollinen :game käyttäjätunnus.',

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
            'rule-name' => 'mukautettu viesti',
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
        'address' => 'osoite',
        'category_id' => 'kategoria',
        'code' => 'koodi',
        'color' => 'väri',
        'conditions' => 'ehdot',
        'content' => 'sisältö',
        'description' => 'kuvaus',
        'email' => 'sähköpostiosoite',
        'icon' => 'kuvake',
        'image' => 'kuva',
        'join_url' => 'liittymisen URL osoite',
        'link' => 'linkki',
        'money' => 'varat',
        'name' => 'nimi',
        'page' => 'sivu',
        'password' => 'salasana',
        'plugin' => 'lisäosa',
        'port' => 'portti',
        'post' => 'linkki',
        'price' => 'hinta',
        'published_at' => 'julkaistu',
        'quantity' => 'määrä',
        'reason' => 'syy',
        'role_id' => 'rooli',
        'server' => 'palvelin',
        'short_description' => 'lyhyt kuvaus',
        'slug' => 'tunniste',
        'title' => 'otsikko',
        'type' => 'tyyppi',
        'url' => 'url',
        'user' => 'käyttäjä',
        'value' => 'arvo',
    ],

];
