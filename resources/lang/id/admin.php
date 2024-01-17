<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on the admin dashboard
    |
    */

    'nav' => [
        'dashboard' => 'Dashboard',
        'settings' => [
            'heading' => 'Pengaturan',
            'settings' => 'Pengaturan',
            'global' => 'Global',
            'security' => 'Keamanan',
            'performances' => 'Peforma',
            'seo' => 'SEO',
            'auth' => 'Autentikasi',
            'mail' => 'Email',
            'maintenance' => 'Pemeliharaan',
            'social' => 'Sosial Media',
            'navbar' => 'Navigasi',
            'servers' => 'Sever',
        ],

        'users' => [
            'heading' => 'Pengguna',
            'users' => 'Pengguna',
            'roles' => 'Peran',
            'bans' => 'Ban',
        ],

        'content' => [
            'heading' => 'Konten',
            'pages' => 'Halaman',
            'posts' => 'Postingan',
            'images' => 'Gambar',
            'redirects' => 'Pengalihan',
        ],

        'extensions' => [
            'heading' => 'Ekstensi',
            'plugins' => 'Plugins',
            'themes' => 'Tema',
        ],

        'other' => [
            'heading' => 'Lainnya',
            'update' => 'Pembaruan',
            'logs' => 'Riwayat',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Kembali ke Situs Web',
        'support' => 'Dukungan',
        'documentation' => 'Dokumentasi',
    ],

    'delete' => [
        'title' => 'Hapus?',
        'description' => 'Apa kamu yakin ingin menghapus ini? Perubahan ini tidak bisa dikembalikan!',
    ],

    'footer' => 'Powered by :azuriom &copy; :year. Panel designed by :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Dasboard',

        'users' => 'Pengguna',
        'posts' => 'Postingan',
        'pages' => 'Halaman',
        'images' => 'Gambar',

        'update' => 'Tersedia versi baru Azuriom: :version',
        'http' => 'Situs kamu tidak menggunakan protokol https, kamu harus mengaktifkan untuk keamanan kamu dan pengguna lain.',
        'cloudflare' => 'Jika kamu menggunakan Cloudflare, kamu harus memasang Cloudflare Support plugin.',
        'recent_users' => 'Pengguna terbaru',
        'active_users' => 'Pengguna aktif',
        'emails' => 'Email dinonaktifkan. Jika pengguna lupa sandi, maka tidak dapat melakukan reset. Kamu dapat mengaktifkan email di <a href=":url">Pengaturan Email</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Pengaturan Global',

            'name' => 'Nama Situs',
            'url' => 'URL Situs',
            'description' => 'Deskripsi Situs',
            'meta' => 'Kata Kunci Meta',
            'meta_info' => 'Kata kunci harus dipisah menggunakan koma.',
            'favicon' => 'Favicon',
            'background' => 'Latar belakang',
            'logo' => 'Logo',
            'timezone' => 'Zona Waktu',
            'locale' => 'Bahasa',
            'money' => 'Nama mata uang',
            'copyright' => 'Hak Cipta',
            'user_money_transfer' => 'Aktifkan transfer uang antar pengguna',
            'site_key' => 'Lisensi untuk azuriom.com',
            'site_key_info' => 'Lisensi dari azuriom.com diperlukan untuk memasang ekstensi premium. Kamu bisa mendapatkan lisensi di <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">Profil Azuriom</a>.',
            'webhook' => 'Posts Discord Webhook URL',
            'webhook_info' => 'A Discord webhook will be sent to this URL when creating a new post, if the publication date is not in the future. Leave empty to disable.',
        ],

        'security' => [
            'title' => 'Pengaturan keamanan',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Site key',
                'secret_key' => 'Secret key',
                'recaptcha' => 'You can get reCAPTCHA keys on the <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA website</a>. You need to use reCAPTCHA <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'Kamu bisa mendapatkan key hCaptcha di <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">website hCaptcha</a>.',
                'turnstile' => 'You can get Turnstil keys on the <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare dashboard</a>. You must select "Managed" widget.',
            ],

            'hash' => 'Algoritma Hash',
            'hash_error' => 'Algoritma hash ini tidak didukung oleh versi PHP kamu saat ini.',
            'force_2fa' => 'Diperlukan 2FA untuk akses panel admin',
        ],

        'performances' => [
            'title' => 'Pengaturan performa',

            'cache' => [
                'title' => 'Hapus Cache',
                'clear' => 'Hapus Cache',
                'description' => 'Hapus cache database.',
                'error' => 'Terjadi kesalahan ketika menghapus cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost meningkatkan performa website kamu dengan menambahkan satu lagi lapisan cache eksklusif.',
                'info' => 'Jika kamu mengalami beberapa masalah setelah mengaktifkan ekstensi, kamu harus memuat ulang cache.',

                'enable' => 'Aktifkan AzBoost',
                'disable' => 'Nonaktifkan AzBoost',
                'reload' => 'Muat ulang AzBoost',

                'status' => 'AzBoost saat ini :status.',
                'enabled' => 'aktifkan',
                'disabled' => 'dinonaktifkan',

                'error' => 'Terjadi kesalahan mengaktifkan AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Pengaturan SEO',

            'html' => 'Kamu dapat memasukkan HTML di <code>&lt;head&gt;</code> atau <code>&lt;body&gt;</code> dari semua halaman (misalnya untuk banner cookie atau analisis situs web) dengan membuat file bernama <code>head.blade.php</code> atau <code>body.blade.php</code> di folder <code>resources/views/custom/</code>.',
            'home_message' => 'Pesan halaman depan',

            'welcome_alert' => [
                'enable' => 'Aktifkan popup sambutan?',
                'message' => 'Pesan popup sambutan',
                'info' => 'Popup ini akan ditampilkan saat pertama kali pengguna mengunjungi situs.',
            ],
        ],

        'auth' => [
            'title' => 'Autentikasi',

            'conditions' => 'Conditions to be accepted on registration',
            'conditions_info' => 'Links in Markdown format, for example: <code>I accept the [conditions](/conditions-link) and [privacy policy](/privacy-policy)</code>',
            'registration' => 'Aktifkan pendaftaran pengguna',
            'registration_info' => 'Masih dimungkinkan untuk mendaftar melalui plugin.',
            'api' => 'Aktifkan Autentikasi API',
            'api_info' => 'API ini memungkinkan kamu untuk menambahkan autentikasi khusus ke server game kamu. Untuk server Minecraft yang menggunakan launcher, kamu dapat menggunakan <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> untuk integrasi yang mudah dan cepat.',
            'user_change_name' => 'Allow users to change username from their profile',
            'user_delete' => 'Ijinkan user untuk menghapus akun mereka dari profile',
        ],

        'mail' => [
            'title' => 'Pengaturan email',
            'from' => 'Alamat email yang digunakan untuk mengirim email.',
            'mailer' => 'Jenis email',
            'mailer_info' => 'Azuriom mendukung SMTP & Sendmail untuk mengirim email. Kamu bisa menemukan informasi lebih lanjut tentang konfigurasi email di <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">dokumentasi</a> kami.',
            'disabled' => 'Saat email dinonaktifkan, pengguna tidak akan dapat mengatur ulang sandi mereka jika lupa.',
            'sendmail' => 'Menggunakan Sendmail tidak disarankan dan kamu sebaiknya menggunakan server SMTP jika memungkinkan.',
            'smtp' => [
                'host' => 'Alamat Host SMTP',
                'port' => 'Port Host SMTP',
                'encryption' => 'Protokol Enkripsi',
                'username' => 'Nama Pengguna SMTP',
                'password' => 'Sandi SMTP',
            ],
            'verification' => 'Aktifkan verifikasi alamat email pengguna',
            'send' => 'Kirim email percobaan',
            'sent' => 'Email percobaan telah berhasil dikirim.',
            'missing' => 'Tidak ada alamat email yang ditentukan di akunmu.',
        ],

        'maintenance' => [
            'title' => 'Pengaturan pemeliharaan',

            'enable' => 'Aktifkan pemeliharaan',
            'message' => 'Pesan pemeliharaan',
            'global' => 'Aktifkan pemeliharaan di semua situs web',
            'paths' => 'Jalur yang harus diblokir selama pemeliharaan',
            'info' => 'Kamu dapat menggunakan <code>/*</code> untuk memblokir semua halaman yang dimulai dengan jalur yang sama. Misalnya, <code>/news/*</code> akan memblokir akses ke semua berita.',
        ],

        'updated' => 'Pengaturan sudah diperbarui.',
    ],

    'navbar_elements' => [
        'title' => 'Navigasi',
        'edit' => 'Ubah navigasi elemen :element',
        'create' => 'Buat navigasi elemen',

        'restrict' => 'Batasi peran yang dapat melihat elemen ini',
        'dropdown' => 'Kamu dapat menambahkan elemen ke dropdown ini saat elemen ini sudah disimpan.',

        'fields' => [
            'home' => 'Beranda',
            'link' => 'Tautan eksternal',
            'page' => 'Halaman',
            'post' => 'Posting',
            'posts' => 'Daftar postingan',
            'plugin' => 'Plugin',
            'dropdown' => 'Dropdown',
            'new_tab' => 'Buka di tab baru',
        ],

        'updated' => 'Navigasi diperbarui.',
        'not_empty' => 'Kamu tidak bisa menghapus dropdown dengan elemen.',
    ],

    'social_links' => [
        'title' => 'Sosial Media',
        'edit' => 'Ubah link sosial media :link',
        'create' => 'Tambah link sosial media',
    ],

    'servers' => [
        'title' => 'Server',
        'edit' => 'Ubah server :server',
        'create' => 'Tambah server',

        'default' => 'Server standar',
        'default_info' => 'Jumlah pemain yang terhubung dari server standar akan ditampilkan di halaman website jika tema saat ini mendukungnya.',

        'home_display' => 'Tampilkan server ini di halaman depan',
        'url' => 'URL tombol bergabung',
        'url_info' => 'Biarkan kosong untuk menampilkan alamat server. Bisa berupa link untuk mendownload game/launcher atau URL untuk bergabung dengan server seperti <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'Tautan ping tidak memerlukan plugin, tetapi Anda tidak dapat menjalankan perintah.',
        'query_info' => 'Dengan tautan kueri, tidak mungkin untuk menjalankan perintah di server.',

        'query_port_info' => 'Bisa dikosongkan jika sama dengan port game.',

        'verify' => 'Test instant commands',

        'rcon_password' => 'Rcon Password',
        'rcon_port' => 'Rcon Port',
        'query_port' => 'Sumber Kueri Port',
        'unturned_info' => 'You need to use SRCDS RCON type in OpenMod. RocketMod RCON is not compatible!',

        'azlink' => [
            'port' => 'AzLink Port',

            'link' => 'To link your server to your website using AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Unduh plugin AzLink </a> dan pasang di server kamu.',
            'link2' => 'Mulai ulang server.',
            'link3' => 'Jalankan perintah ini di server: ',

            'info' => 'Jika kamu memiliki masalah dengan AzLink saat menggunakan Cloudflare atau firewall, coba ikuti beberapa langkah pada <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'You can link your server to your website with the command: ',
            'port_command' => 'Jika kamu menggunakan port AzLink yang berbeda dari port default, kamu harus mengonfigurasinya dengan perintah: ',
            'ping' => 'Aktifkan perintah instan (memerlukan port terbuka di server)',
            'ping_info' => 'Jika perintah instan tidak diaktifkan, perintah akan dijalankan dengan penundaan selama 30 detik hingga 1 menit.',
            'custom_port' => 'Gunakan port AzLink kustom',

            'error' => 'Sambungan ke server gagal, alamat dan/atau port salah, atau port ditutup.',
            'badresponse' => 'Sambungan ke server gagal (kode :code), token tidak valid atau server salah konfigurasi. Kamu dapat mengulangi perintah tautan untuk memperbaikinya.',
        ],

        'players' => ':count pemain|:count pemain',
        'offline' => 'Offline',

        'connected' => 'Koneksi ke server telah berhasil dibuat!',
        'error' => 'Sambungan ke server gagal: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Sumber Kueri',
            'source-rcon' => 'Sumber RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM status',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff Server', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Pengguna',
        'edit' => 'Edit pengguna :user',
        'create' => 'Buat pengguna',

        'registered' => 'Terdaftar pada',
        'last_login' => 'Login terakhir pada',
        'ip' => 'Alamat IP',

        'admin' => 'Admin',
        'banned' => 'Blokir',
        'deleted' => 'Dihapus',

        'ban' => 'Blokir',
        'unban' => 'Buka Blokir',
        'delete' => 'Hapus',

        'alert-deleted' => 'Pengguna ini dihapus, tidak dapat diedit.',
        'alert-banned' => [
            'title' => 'Pengguna ini sedang diblokir:',
            'banned-by' => 'Diblokir oleh: :author',
            'reason' => 'Alasan: :reason',
            'date' => 'Tanggal: :date',
        ],

        'edit_profile' => 'Ubah profil',

        'info' => 'Informasi pengguna',

        'ban-title' => 'Blokir :user',
        'ban-description' => 'Apa kamu yakin ingin memblokir pengguna ini?',

        'email' => [
            'verify' => 'Verifikasi email',
            'verified' => 'Alamat email diverifikasi',
            'date' => 'Ya, pada :date',
            'verify_success' => 'Alamat email telah diverifikasi.',
        ],

        '2fa' => [
            'title' => 'Otentikasi Dua Faktor',
            'secured' => '2FA enabled',
            'disable' => 'Nonaktifkan 2FA',
            'disabled' => 'Autentikasi dua faktor telah dinonaktifkan.',
        ],

        'password' => [
            'title' => 'Last password change',
            'force' => 'Force change',
            'forced' => 'Must change password',
        ],

        'status' => [
            'banned' => 'Pengguna ini sedang diblokir.',
            'unbanned' => 'Pengguna ini telah dibatalkan pemblokirannya.',
        ],

        'discord' => 'Linked Discord account',

        'notify' => 'Kirim notifikasi',
        'notify_info' => 'Send a notification to this user',
        'notify_all' => 'Send a notification to all users',
    ],

    'roles' => [
        'title' => 'Peran',
        'edit' => 'Edit role :role (#:id)',
        'create' => 'Buat peran',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Bawaan',
        'admin' => 'Admin',
        'admin_info' => 'Jika grup adalah admin, grup tersebut memiliki semua izin.',

        'updated' => 'Peran telah diperbarui.',
        'unauthorized' => 'Peran ini lebih tinggi dari peran kamu sendiri.',
        'add_admin' => 'Kamu tidak dapat menambahkan izin admin ke peran.',
        'remove_admin' => 'Kamu tidak dapat menghapus izin admin dari peran kamu.',
        'delete_default' => 'Peran ini tidak dapat dihapus.',
        'delete_own' => 'Kamu tidak dapat menghapus peranmu sendiri.',

        'discord' => [
            'title' => 'Link Discord roles',
            'enable' => 'Enable Discord roles link',
            'enable_info' => 'Once enabled, edit the role on Discord, and add a requirement in the <b>Links</b> tab. Users can get their Discord role in the server menu, in <b>Linked Roles</b>.',
            'info' => 'You need to create an application on the <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> and set the <b>Linked Role Verification URL</b> to <code>:url</code>',
            'oauth' => 'Then, in <b>OAuth2</b> and in <b>General</b>, you need to add <code>:url</code> in the <b>Redirects</b>.',
            'token_info' => 'The Bot token can be obtained by creating a bot for your application, in the <b>Bot</b> tab on the left of the Discord developer dashboard.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Komentari postingan',
        'delete-other-comments' => 'Hapus komentar postingan dari pengguna lain',
        'maintenance-access' => 'Akses website selama pemeliharaan',
        'admin-access' => 'Akses ke dasbor admin',
        'admin-logs' => 'Lihat dan kelola log situs',
        'admin-images' => 'Lihat dan kelola gambar',
        'admin-navbar' => 'Lihat dan kelola navigasi',
        'admin-pages' => 'Lihat dan kelola halaman',
        'admin-redirects' => 'Lihat dan kelola pengalihan',
        'admin-posts' => 'Lihat dan kelola postingan',
        'admin-settings' => 'Lihat dan kelola pengaturan',
        'admin-users' => 'Lihat dan kelola pengguna',
        'admin-themes' => 'Lihat dan kelola tema',
        'admin-plugins' => 'Lihat dan kelola plugin',
    ],

    'bans' => [
        'title' => 'Blokir',

        'by' => 'Diblokir oleh',
        'reason' => 'Alasan',
        'removed' => 'Menghapus :date oleh :user',
    ],

    'posts' => [
        'title' => 'Postingan',
        'edit' => 'Edit postingan :post',
        'create' => 'Buat postingan',

        'published_info' => 'Posting ini tidak akan terlihat untuk umum sampai tanggal ini.',
        'pin' => 'Sematkan postingan ini',
        'pinned' => 'Disematkan',
        'feed' => 'Umpan RSS/Atom untuk posting tersedia di <code>:rss</code> dan <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Halaman',
        'edit' => 'Edit halaman #:page',
        'create' => 'Buat halaman',

        'enable' => 'Aktifkan halaman',
        'restrict' => 'Batasi peran yang dapat akses ke halaman ini',
    ],

    'redirects' => [
        'title' => 'Pengalihan',
        'edit' => 'Edit pengalihan :redirect',
        'create' => 'Buat pengalihan',

        'enable' => 'Aktifkan pengalihan',
        'source' => 'Sumber',
        'destination' => 'Tujuan',
        'code' => 'Status kode',

        '301' => '301 - Pengalihan permanen',
        '302' => '302 - Pengalihan sementara',
    ],

    'images' => [
        'title' => 'Gambar',
        'edit' => 'Edit gambar :image',
        'create' => 'Unggah gambar',
        'help' => 'If images are not loading, try following the steps in the <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Beli dengan harga :price',
    ],

    'plugins' => [
        'title' => 'Plugin',

        'list' => 'Plugin terpasang',
        'available' => 'Plugin tersedia',

        'requirements' => [
            'api' => 'This plugin version is not compatible with Azuriom v:version.',
            'azuriom' => 'Plugin ini tidak kompatibel dengan versi Azuriom kamu.',
            'game' => 'Plugin ini tidak kompatibel dengan permainan :game.',
            'plugin' => 'Plugin ":plugin" tidak ada atau versi tidak kompatibel dengan plugin ini.',
        ],

        'reloaded' => 'Plugin telah dimuat ulang.',
        'enabled' => 'Plugin telah diaktifkan.',
        'disabled' => 'Plugin telah dinonaktifkan.',
        'updated' => 'Plugin telah diperbarui.',
        'installed' => 'Plugin telah dipasang.',
        'deleted' => 'Plugin telah dihapus.',
        'delete_enabled' => 'Plugin harus dinonaktifkan terlebih dahulu sebelum bisa dihapus.',
    ],

    'themes' => [
        'title' => 'Tema',

        'current' => 'Tema sekarang',
        'author' => 'Penulis: :author',
        'version' => 'Versi: :version',
        'list' => 'Tema terpasang',
        'available' => 'Tema tersedia',
        'no-enabled' => 'Kamu tidak mempunyai tema yang aktif.',
        'legacy' => 'This theme version is not compatible with Azuriom v:version.',

        'config' => 'Edit konfigurasi',
        'disable' => 'Nonaktifkan tema',

        'reloaded' => 'Tema telah dimuat ulang.',
        'no_config' => 'Tema ini tidak memiliki konfigurasi.',
        'config_updated' => 'Konfirgurasi tema ini telah diperbarui.',
        'invalid' => 'Tema ini tidak valid (nama folder tema harus id tema).',
        'updated' => 'Tema telah diperbarui.',
        'installed' => 'Tema telah dipasang.',
        'deleted' => 'Tema telah dihapus.',
        'delete_current' => 'Kamu tidak dapat menghapus tema sekarang.',
    ],

    'update' => [
        'title' => 'Diperbarui',

        'has_update' => 'Pembaruan tersedia',
        'no_update' => 'Pembaruan belum tersedia',
        'check' => 'Periksa pembaruan',

        'update' => 'Versi <code>:last-version</code> dari Azuriom tersedia dan kamu menggunakan versi <code>:version</code>.',
        'changelog' => 'Log perubahan tersedia <a href=":url" target="_blank" rel="noopener noreferrer">di sini</a>.',
        'download' => 'Versi terbaru Azuriom siap diunduh.',
        'install' => 'Versi terbaru Azuriom telah diunduh dan siap untuk dipasang.',

        'backup' => 'Sebelum memperbarui Azuriom, kamu harus membuat cadangan!',

        'latest_version' => 'Kamu menjalankan Azuriom versi terbaru: <code>:version</code>.',
        'latest' => 'Kamu menggunakan Azuriom versi terbaru.',

        'downloaded' => 'Versi terbaru telah diunduh, sekarang kamu dapat memasangnya.',
        'installed' => 'Pembaruan telah berhasil dipasang.',
    ],

    'logs' => [
        'title' => 'Riwayat',

        'clear' => 'Hapus riwayat lama (15 hari+)',
        'cleared' => 'Riwayat lama telah dihapus.',
        'changes' => 'Changes',
        'old' => 'Old value',
        'new' => 'New value',

        'pages' => [
            'created' => 'Halaman dibuat #:id',
            'updated' => 'Halaman diperbarui #:id',
            'deleted' => 'Halaman dihapus #:id',
        ],

        'posts' => [
            'created' => 'Postingan dibuat #:id',
            'updated' => 'Postingan diperbarui #:id',
            'deleted' => 'Postingan dihapus #:id',
        ],

        'images' => [
            'created' => 'Gambar dibuat #:id',
            'updated' => 'Gambar diperbarui #:id',
            'deleted' => 'Gambar dihapus #:id',
        ],

        'redirects' => [
            'created' => 'Buat pengalihan #:id',
            'updated' => 'Perbarui pengalihan #:id',
            'deleted' => 'Hapus pengalihan #:id',
        ],

        'roles' => [
            'created' => 'Peran dibuat #:id',
            'updated' => 'Peran diperbarui #:id',
            'deleted' => 'Peran dihapus #:id',
        ],

        'servers' => [
            'created' => 'Server dibuat #:id',
            'updated' => 'Server diperbarui #:id',
            'deleted' => 'Server dihapus #:id',
        ],

        'users' => [
            'updated' => 'Pengguna diperbarui #:id',
            'deleted' => 'Pengguna dihapus #:id',
            'transfer' => 'Kirim uang :money ke pengguna #:id',

            'login' => 'Berhasil masuk dari :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Otentikasi dua faktor diaktifkan',
                'disabled' => 'Otentikasi dua faktor dinonaktifkan',
            ],
        ],

        'settings' => [
            'updated' => 'Pengaturan diperbarui',
        ],

        'updates' => [
            'installed' => 'Pembaruan Azuriom yang dipasang',
        ],

        'plugins' => [
            'enabled' => 'Aktifkan plugin',
            'disabled' => 'Nonaktifkan plugin',
        ],

        'themes' => [
            'changed' => 'Ubah tema',
            'configured' => 'Konfigurasi tema diperbarui',
        ],
    ],

    'errors' => [
        'back' => 'Kembali ke Dasbor',
        '404' => 'Halaman tidak ditemukan',
        'info' => 'Sepertinya kamu menemukan kesalahan pada matriks...',
        '2fa' => 'Kamu harus mengaktifkan otentikasi dua faktor untuk mengakses halaman ini.',
    ],
];
