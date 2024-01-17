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

    'accepted' => ':attribute harus diterima.',
    'accepted_if' => ':attribute harus diterima jika :other adalah :value.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus setelah tanggal :date.',
    'after_or_equal' => ':attribute harus sama atau setelah tanggal :date.',
    'alpha' => ':attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa larik.',
    'ascii' => 'The :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute harus sebelum tanggal :date.',
    'before_or_equal' => ':attribute harus sebelum atau sama dengan tanggal :date.',
    'between' => [
        'array' => ':attribute harus di antara :min dan :max item.',
        'file' => ':attribute harus di antara :min dan :max kb.',
        'numeric' => ':attribute harus di antara :min dan :max.',
        'string' => ':attribute harus di antara :min dan :max karakter.',
    ],
    'boolean' => ':attribute bidang harus benar atau salah.',
    'confirmed' => ':attribute konfirmasi tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus sama dengan tanggal :date.',
    'date_format' => ':attribute tidak sesuai dengan format :format.',
    'decimal' => 'The :attribute must have :decimal decimal places.',
    'declined' => ':attribute harus ditolak.',
    'declined_if' => ':attribute harus ditolak jika :other adalah :value.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus :digits angka.',
    'digits_between' => ':attribute harus di antara :min dan :max angka.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute bidang memiliki nilai duplikat.',
    'doesnt_start_with' => ':attribute tidak boleh dimulai dengan salah satu dari berikut ini: :values.',
    'email' => ':attribute harus alamat email yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'enum' => ':attribute yang dipilih tidak valid.',
    'exists' => ':attribute dipilih tidak valid.',
    'file' => ':attribute harus berupa file.',
    'filled' => ':attribute bidang harus memiliki nilai.',
    'gt' => [
        'array' => ':attribute harus lebih dari :value item.',
        'file' => ':attribute harus lebih besar dari :value kb.',
        'numeric' => ':attribute harus lebih besar dari :value.',
        'string' => ':attribute harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => ':attribute harus memiliki :value item atau lebih.',
        'file' => ':attribute harus lebih besar dari atau sama dengan :value kb.',
        'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
        'string' => ':attribute harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute dipilih tidak valid.',
    'in_array' => ':attribute bidang tidak ada di :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus alamat IP yang valid.',
    'ipv4' => ':attribute harus alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus alamat IPv6 yang valid.',
    'json' => ':attribute harus berupa string JSON yang valid.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => ':attribute harus kurang dari :value item.',
        'file' => ':attribute harus kurang dari :value kb.',
        'numeric' => ':attribute harus kurang dari :value.',
        'string' => ':attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => ':attribute tidak boleh lebih dari :value item.',
        'file' => ':attribute harus kurang atau sama dengan :value kb.',
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'string' => ':attribute harus kurang atau sama dengan :value karakter.',
    ],
    'mac_address' => ':attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => ':attribute mungkin tidak lebih besar dari :max item.',
        'file' => ':attribute mungkin tidak lebih besar dari :max kb.',
        'numeric' => ':attribute mungkin tidak lebih besar dari :max.',
        'string' => ':attribute mungkin tidak lebih besar dari :max karakter.',
    ],
    'mimes' => ':attribute harus berupa file bertipe: :values.',
    'mimetypes' => ':attribute harus berupa file bertipe: values.',
    'min' => [
        'array' => ':attribute harus memiliki setidaknya :min item.',
        'file' => ':attribute setidaknya harus :min kb.',
        'numeric' => ':attribute setidaknya harus :min.',
        'string' => ':attribute setidaknya harus :min karakter.',
    ],
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => ':attribute harus kelipatan :value.',
    'not_in' => ':attribute dipilih tidak valid.',
    'not_regex' => ':attribute format tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => [
        'letters' => ':atribut harus mengandung setidaknya satu huruf.',
        'mixed' => ':attribute harus berisi setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => ':attribute harus mengandung setidaknya satu angka.',
        'symbols' => ':attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Silahkan pilih :attribute yang lain.',
    ],
    'present' => ':attribute bidang harus ada.',
    'prohibited' => 'Bidang :attribute dilarang.',
    'prohibited_if' => 'Bidang :attribute dilarang jika :other adalah :value.',
    'prohibited_unless' => 'Bidang :attribute dilarang kecuali :other ada di :values.',
    'prohibits' => 'Bidang :attribute melarang :other hadir.',
    'regex' => ':attribute format tidak valid.',
    'required' => ':attribute harus diisi.',
    'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :values.',
    'required_if' => ':attribute bidang harus diisi jika :other sebagai :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':attribute bidang harus diisi kecuali :other sebagai :values.',
    'required_with' => ':attribute bidang harus diisi jika ada :values.',
    'required_with_all' => ':attribue harus diisi jika ada :values.',
    'required_without' => ':attribute bidang harus diisi jika tidak ada :values.',
    'required_without_all' => ':attribute bidang harus diisi jika tidak ada :values.',
    'same' => ':attribute dan :other harus cocok.',
    'size' => [
        'array' => ':attribute harus mengandung :size item.',
        'file' => ':attribute harus :size kb.',
        'numeric' => ':attribute harus :size.',
        'string' => ':attribute harus :size karakter.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus merupakan zona waktu yang valid.',
    'unique' => ':attribute sudah ada.',
    'uploaded' => ':attribute gagal mengunggah. Mungkin yang ini terlalu berat.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => ':attribute format tidak valid.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => ':attribute UUID harus valid.',

    'username' => ':attribute nama pengguna harus valid.',
    'slug' => ':attribute harus berupa slug hanya dengan huruf kecil, angka, dan tanda hubung.',
    'color' => ':attribute harus berupa kode warna hex.',
    'game_auth' => ':attribute harus berupa nama pengguna :game yang valid.',

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
            'rule-name' => 'pesan-khusus',
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
        'address' => 'alamat',
        'category_id' => 'kategori',
        'code' => 'kode',
        'color' => 'warna',
        'conditions' => 'kondisi',
        'content' => 'konten',
        'description' => 'deskripsi',
        'email' => 'alamat email',
        'icon' => 'ikon',
        'image' => 'gambar',
        'join_url' => 'URL bergabung',
        'link' => 'tautan',
        'money' => 'uang',
        'name' => 'nama',
        'page' => 'halaman',
        'password' => 'kata sandi',
        'plugin' => 'plugin',
        'port' => 'port',
        'post' => 'tautan',
        'price' => 'harga',
        'published_at' => 'dipublikasi pada',
        'quantity' => 'Qty',
        'reason' => 'alasan',
        'role_id' => 'peran',
        'server' => 'server',
        'short_description' => 'deskripsi singkat',
        'slug' => 'slug',
        'title' => 'judul',
        'type' => 'jenis',
        'url' => 'url',
        'user' => 'pengguna',
        'value' => 'nilai',
    ],

];
