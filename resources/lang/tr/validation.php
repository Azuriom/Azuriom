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

    'accepted' => ':attribute kabul edilmelidir.',
    'accepted_if' => ':other, :value olduğunda :attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL değil.',
    'after' => ':attribute tarihi :date tarihinden sonra olmalı.',
    'after_or_equal' => ':attribute tarihi :date tarihinden sonra veya tarihine eşit olmalıdır.',
    'alpha' => ':attribute yalnızca harf içermelidir.',
    'alpha_dash' => ':attribute yalnızca harfler, rakamlar, tireler ve alt çizgiler içermelidir.',
    'alpha_num' => ':attribute yalnızca harfler ve rakamlar içermelidir.',
    'array' => ':attribute bir dizi olmalıdır.',
    'ascii' => ':attribute yalnızca tek baytlık alfanümerik karakterler ve semboller içermelidir.',
    'before' => ':attribute, :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihi ile aynı veya sonraki bir tarih olmalıdır.',
    'between' => [
        'array' => ':attribute en az :min en fazla :max maddeye sahip olmalı.',
        'file' => ':attribute, :min ve :max kilobyte boyutları arasında olmalıdır.',
        'numeric' => ':attribute min ve max arasında olmalıdır.',
        'string' => ':attribute, :min ve :max karakter arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru ya da yanlış olmalı.',
    'confirmed' => ':attribute doğrulaması eşleşmedi.',
    'current_password' => 'Hatalı parola.',
    'date' => ':attribute geçerli bir tarih değil.',
    'date_equals' => ':attribute, :date tarihinden sonraki bir tarih olmalıdır.',
    'date_format' => ':attribute :format biçimi ile eşleşmiyor.',
    'decimal' => ':attribute, :decimal ondalık basamağa sahip olmalıdır.',
    'declined' => ':attribute reddedilmelidir.',
    'declined_if' => ':attribute alanı, :other :value değerine sahip olduğunda zorunludur.',
    'different' => ':attribute ve :other birbirinden farklı olmalıdır.',
    'digits' => ':attribute :digits rakam olmalıdır.',
    'digits_between' => ':attribute, en az :min en fazla :max rakamdan oluşmalı.',
    'dimensions' => ':attribute geçersiz görüntü boyutlarına sahip.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'doesnt_start_with' => ':attribute şunlardan biriyle başlamalıdır: :values.',
    'email' => ':attribute geçerli bir e-posta adresi olmalı.',
    'ends_with' => ':attribute aşağıdakilerden biriyle bitmelidir: :values.',
    'enum' => ':attribute seçim geçersiz.',
    'exists' => ':attribute seçim geçersiz.',
    'file' => ':attribute reddedilmelidir.',
    'filled' => ':attribute alanının doldurulması zorunludur.',
    'gt' => [
        'array' => ':attribute :value öğelerinden daha fazlasına sahip olması gerekir.',
        'file' => ':attribute, :value kilobayttan fazla olmalıdır.',
        'numeric' => ':attribute :value \'dan büyük olmalıdır.',
        'string' => ':attribute, :value karakterden fazla olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute, :value veya daha fazla öğe içermelidir.',
        'file' => ':attribute :value kilobyte büyük veya eşit olmalıdır.',
        'numeric' => ':attribute, :value değerinden büyük veya eşit olmalı.',
        'string' => ':attribute, en az :value karakter içermelidir.',
    ],
    'image' => ':attribute bir görsel olmalı.',
    'in' => ':attribute seçim geçersiz.',
    'in_array' => ':attribute değeri :other içinde mevcut değil.',
    'integer' => ':attribute tamsayý olmalýdýr.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute, geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON dizini olmalıdır.',
    'lowercase' => ':attribute küçük karakterli olmalıdır.',
    'lt' => [
        'array' => ':attribute, :value ögeden az olmalıdır.',
        'file' => ':attribute, :value kilobayttan fazla olmalıdır.',
        'numeric' => ':attribute, :value değerinden küçük olmalıdır.',
        'string' => ':attribute :value az karaktere sahip olmalı.',
    ],
    'lte' => [
        'array' => ':attribute, :value öğeden fazla öğe içermemelidir.',
        'file' => ':attribute, :value kilobayttan küçük ya da eşit olmalıdır.',
        'numeric' => ':attribute, :value değerinden küçük veya eşit olmalıdır.',
        'string' => ':attribute, :value karakterden az veya buna eşit olmalıdır.',
    ],
    'mac_address' => ':attribute geçerli bir IP adresi olmalıdır.',
    'max' => [
        'array' => ':attribute, :max değerine kıyasla fazla öğeye sahip olmamalıdır.',
        'file' => ':attribute değeri :max kilobayttan büyük olmamalıdır.',
        'numeric' => ':attribute değeri :max değerinden büyük olmamalıdır.',
        'string' => ':attribute, :max karakterinden büyük olmamalıdır.',
    ],
    'mimes' => ':attribute, şu dosya tiplerinde olmalıdır: :values.',
    'mimetypes' => ':attribute, şu dosya tiplerinde olmalıdır: :values.',
    'min' => [
        'array' => ':attribute en az :min nesneye sahip olmalıdır.',
        'file' => ':attribute :min Kb tan küçük olmalı.',
        'numeric' => ':attribute en az :min olmalıdır.',
        'string' => ':attribute en az :min karakter içermelidir.',
    ],
    'missing' => ':attribute eksik olmalıdır.',
    'missing_if' => ':other, :value olduğunda :attribute alanı eksik olmalıdır.',
    'missing_unless' => ':other, :value olmadığı sürece :attribute alanı eksik olmalıdır.',
    'missing_with' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'missing_with_all' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'multiple_of' => ':attribute, :values türünde bir dosya olmalıdır.',
    'not_in' => 'Seçili :attribute değeri geçersiz.',
    'not_regex' => ':attribute formatı geçersiz.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'password' => [
        'letters' => ':attribute en az bir harf içermelidir.',
        'mixed' => ':attribute en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers' => ':attribute en az bir sayı içermelidir.',
        'symbols' => ':attribute en az bir sembol içermelidir.',
        'uncompromised' => 'Girilen :attribute bir veri sızıntısında ortaya çıktı. Lütfen farklı bir :attribute seçin.',
    ],
    'present' => ':attribute alanı dolu olmalı.',
    'prohibited' => ':attribute alanı zorunludur.',
    'prohibited_if' => ':other :value iken :attribute alanı gereklidir.',
    'prohibited_unless' => ':attribute alanı, :other alanı :value değerlerinden birine sahip olmadığında zorunludur.',
    'prohibits' => ':attribute alanı :other değerinin mevcut olmasını yasaklar.',
    'regex' => ':attribute formatı geçersiz.',
    'required' => ':attribute alanı zorunludur.',
    'required_array_keys' => ':attribute alanı aşağıdakiler için girişler içermelidir: :values.',
    'required_if' => ':other :value iken :attribute alanı gereklidir.',
    'required_if_accepted' => ':other kabul edildiğinde :attribute alanı gereklidir.',
    'required_unless' => ':attribute alanı, :other alanı :value değerlerinden birine sahip olmadığında zorunludur.',
    'required_with' => ':values varsa :attribute alanı zorunludur.',
    'required_with_all' => ':values mevcut ise :attribute alanları zorunludur.',
    'required_without' => ':values mevcut değilken :attribute alanı zorunludur.',
    'required_without_all' => 'Herhangi bir :values değeri mevcut olmadığında :attribute alanına değer girilmesi zorunludur.',
    'same' => ':attribute ve :other aynı olmalıdır.',
    'size' => [
        'array' => ':attribute :size nesneye sahip olmalıdır.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'numeric' => ':attribute, :size boyutunda olmalıdır.',
        'string' => ':attribute en az :size karakter olmalıdır.',
    ],
    'starts_with' => ':attribute şunlardan biriyle başlamalıdır: :values.',
    'string' => ':attribute bir dizi olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklenemedi. Belki bu çok ağırdır.',
    'uppercase' => ':attribute büyük karakterli olmalıdır.',
    'url' => ':attribute geçerli bir URL olmalıdır.',
    'ulid' => ':attribute geçerli bir ULID olmalıdır.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',

    'username' => ':attribute geçerli bir kullanıcı adı olmalıdır.',
    'slug' => ':attribute sadece küçük harf, rakam ve tire içermelidir.',
    'color' => ':attribute hex renk kodu olmalıdır.',
    'game_auth' => ':attribute geçerli bir :game kullanıcı adı olmalıdır.',

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
            'rule-name' => 'özel-mesaj',
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
        'address' => 'adres',
        'category_id' => 'kategori',
        'code' => 'kod',
        'color' => 'renk',
        'conditions' => 'koşullar',
        'content' => 'i̇çerik',
        'description' => 'açıklama',
        'email' => 'e-posta Adresi',
        'icon' => 'simge',
        'image' => 'resim',
        'join_url' => 'uRL ile Katıl',
        'link' => 'bağlantı',
        'money' => 'para',
        'name' => 'i̇sim',
        'page' => 'sayfa',
        'password' => 'şifre',
        'plugin' => 'eklenti',
        'port' => 'port',
        'post' => 'bağlantı',
        'price' => 'ücret',
        'published_at' => 'şu tarihte yayınlandı',
        'quantity' => 'miktar',
        'reason' => 'sebep',
        'role_id' => 'rol',
        'server' => 'sunucu',
        'short_description' => 'kısa Açıklama',
        'slug' => 'bağlantı',
        'title' => 'başlık',
        'type' => 'tür',
        'url' => 'url',
        'user' => 'kullanıcı',
        'value' => 'değer',
    ],

];
