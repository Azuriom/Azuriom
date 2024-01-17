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
        'dashboard' => 'Gösterge Paneli',
        'settings' => [
            'heading' => 'Ayarlar',
            'settings' => 'Ayarlar',
            'global' => 'Genel',
            'security' => 'Güvenlik',
            'performances' => 'Performans',
            'seo' => 'SEO',
            'auth' => 'Yetkilendirme',
            'mail' => 'Mail',
            'maintenance' => 'Bakım',
            'social' => 'Sosyal Medya',
            'navbar' => 'Gezinti Çubuğu',
            'servers' => 'Sunucular',
        ],

        'users' => [
            'heading' => 'Oyuncular',
            'users' => 'Oyuncular',
            'roles' => 'Rol',
            'bans' => 'Banlar',
        ],

        'content' => [
            'heading' => 'İçerik',
            'pages' => 'Sayfalar',
            'posts' => 'Gönderiler',
            'images' => 'Resimler',
            'redirects' => 'Yönlendirme',
        ],

        'extensions' => [
            'heading' => 'Uzantılar',
            'plugins' => 'Eklentiler',
            'themes' => 'Temalar',
        ],

        'other' => [
            'heading' => 'Diğer',
            'update' => 'Güncelleme',
            'logs' => 'Loglar',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back' => 'Ana Sayfaya Dön',
        'support' => 'Destek',
        'documentation' => 'Belgeleme',
    ],

    'delete' => [
        'title' => 'Sil?',
        'description' => 'Silmek istediğinizden eminmisin? bu işlem geri alınamayacaktır!',
    ],

    'footer' => 'Rarafından desteklenmektedir :azuriom &copy; :year. Panel tasarımı :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Gösterge Paneli',

        'users' => 'Oyuncular',
        'posts' => 'Gönderiler',
        'pages' => 'Sayfalar',
        'images' => 'Resimler',

        'update' => 'Azuriom :version Güncellemesi Mevcut',
        'http' => 'Websiteniz https yönlendirmesini kullanmıyor. Kullanıcıların güvenliği için yönlendirmeyi aktif ve zorunlu kılmalısınız.',
        'cloudflare' => 'Sitenize Cloudflare ile bağlanılıyorsa Cloudflare Destek eklentinisi kurmalısınız.',
        'recent_users' => 'En Son Kullanıcılar',
        'active_users' => 'Çevrim İçi Kullanıcılar',
        'emails' => 'E-postalar devre dışı bırakıldı. Bir kullanıcı şifresini unutursa sıfırlayamaz. E-postaları şuradan etkinleştirebilirsiniz: <a href=":url">Posta Ayarları</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Genel ayarlar',

            'name' => 'Sitenin Adı',
            'url' => 'Sitenizin URL\'si',
            'description' => 'Site Açıklaması',
            'meta' => 'Anahtar Kelimeler',
            'meta_info' => 'Anahtar kelimeleri virgül ile ayırmalısınız.',
            'favicon' => 'Favicon',
            'background' => 'Arkaplan',
            'logo' => 'Logo',
            'timezone' => 'Saat Dilimi',
            'locale' => 'Yerel',
            'money' => 'Site para biriminin adı',
            'copyright' => 'Telif Hakkı',
            'user_money_transfer' => 'Kullanıcılar arasında para transferini etkinleştir',
            'site_key' => 'Azuriom.com site anahtarınız',
            'site_key_info' => 'Piyasadan satın alınan prim uzantılarını yüklemek için azuriom.com site anahtarı gerekir. Site anahtarınızı <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer"> Azuriom Profili</a>.',
            'webhook' => 'Discord Webhook URL\'si',
            'webhook_info' => 'Yayın tarihi gelecekte değilse, yeni bir gönderi oluştururken bu URL\'ye bir Discord web kancası gönderilecektir. Devre dışı bırakmak için boş bırakın.',
        ],

        'security' => [
            'title' => 'Güvenlik Ayarları',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Sitenizin Anahtarı',
                'secret_key' => 'Gizli anahtar',
                'recaptcha' => 'ReCAPTCHA anahtarlarını <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">
Google reCAPTCHA web sitesi</a>. ReCAPTCHA kullanmanız gerekiyor <strong>v2 görünmez</strong> anahtarlar.',
                'hcaptcha' => 'Hcaptcha Doğrulama Anahtarınını <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha websitesi </a> üzerinden alabilirsiniz.',
                'turnstile' => 'Turnstil anahtarlarını<a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare gösterge tablosu</a>. "Yönetilen" widget\'ı seçmelisiniz.',
            ],

            'hash' => 'Karma algoritma',
            'hash_error' => 'Şifreleme Türünüz PHP Sürümüyle Uyuşmuyor.',
            'force_2fa' => 'Yönetici panel erişimi için 2FA doğrulama gerekir',
        ],

        'performances' => [
            'title' => 'Performans ayarları',

            'cache' => [
                'title' => 'Önbelleği Temizle',
                'clear' => 'Önbelleği Temizle',
                'description' => 'Web sitesi önbelleğini temizleyin.',
                'error' => 'Önbelleği temizlenirken hata oluştu.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost, özel bir önbellek katmanı ekleyerek web sitenizin performansını artırır.',
                'info' => 'Uzantıları aktifleştirdikten sonra problemler yaşıyorsanız, önbelleği yenilemelisiniz.',

                'enable' => 'AzBoost\'u Etkinleştir',
                'disable' => 'AzBoost\'u Devre Dışı Bırak',
                'reload' => 'AzBoost\'u Yeniden Başlat',

                'status' => 'AzBoost şu anda :status.',
                'enabled' => 'etkinleştirildi',
                'disabled' => 'devre dışı bırakıldı',

                'error' => 'AzBoost etkinleştirilirken hata oluştu.',
            ],
        ],

        'seo' => [
            'title' => 'SEO ayarları',

            'html' => 'HTML\'yi tüm sayfaların <code>&lt;head&gt;</code> veya <code>&lt;body&gt;</code> öğelerine (ör. Çerez başlığı veya web sitesi analizi için) bir dosya oluşturarak ekleyebilirsiniz.<code>head.blade.php</code> yada <code>body.blade.php</code> içinde <code>resources/views/custom/</code>.',
            'home_message' => 'Ana Sayfa Mesajı',

            'welcome_alert' => [
                'enable' => 'Hoş Geldin açılır penceresi etkinleştirilsin mi?',
                'message' => 'Hoşgeldin Popup Mesajı',
                'info' => 'Popup kullanıcı ilk kez siteye girdiğinde karşısına çıkıcak.',
            ],
        ],

        'auth' => [
            'title' => 'Doğrulama',

            'conditions' => 'Kayıt olmak için koşullar kabul edilmelidir',
            'conditions_info' => 'Bağlantılar Markdown formatı ile yazılabilir, örneğin: <code>[conditions](/conditions-link) ve [privacy policy](/privacy-policy) nı kabul ediyorum.</code>',
            'registration' => 'Kullanıcı kaydını etkinleştir',
            'registration_info' => 'Eklentiler aracılığıyla kayıt olmak hala mümkün olabilir.',
            'api' => 'Auth API\'yi etkinleştir',
            'api_info' => 'Bu API, oyun sunucunuza özel bir kimlik doğrulama eklemenize olanak tanır. Launcher kullanan Minecraft sunucuları için şunları kullanabilirsiniz <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> kolay ve hızlı entegrasyon için.',
            'user_change_name' => 'Kullanıcıların kullanıcı adlarını profillerinden değiştirmelerine izin ver',
            'user_delete' => 'Kullanıcıların kullanıcı adlarını profillerinden değiştirmelerine izin ver',
        ],

        'mail' => [
            'title' => 'Posta ayarları',
            'from' => 'E-posta göndermek için kullandığınız e-posta adresi.',
            'mailer' => 'E-posta türü',
            'mailer_info' => 'Azuriom email göndermek için SMTP ve Sendmail destekliyor. Daha fazla bilgiyi <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">belgeleme</a> burada bulabilirsin.',
            'disabled' => 'E-postalar devre dışı bırakıldığında, kullanıcılar şifrelerini unutursa sıfırlayamazlar.',
            'sendmail' => 'Sendmail\'in kullanılması önerilmez ve mümkünse bunun yerine bir SMTP sunucusu kullanmanız gerekir.',
            'smtp' => [
                'host' => 'SMTP Host Adresi',
                'port' => 'SMTP Host Portu',
                'encryption' => 'Şifreleme Protokolü',
                'username' => 'SMTP Sunucu Kullanıcı Adı',
                'password' => 'SMTP Sunucu Şifresi',
            ],
            'verification' => 'Kullanıcıların e-posta adresinin doğrulamasını etkinleştirin',
            'send' => 'Bir test e-postası gönderin',
            'sent' => 'Test postası başarıyla gönderildi.',
            'missing' => 'Hesabınıza hiçbir e-posta adresi bağlanmadı.',
        ],

        'maintenance' => [
            'title' => 'Bakım Ayarları',

            'enable' => 'Bakım etkinleştir',
            'message' => 'Bakım mesajı',
            'global' => 'Tüm web sitesinde bakımı etkinleştirin',
            'paths' => 'Bakım süresince erişime engellenecek sayfalar',
            'info' => 'Aynı yoldan başlayan tüm sayfaları engellemek için <code>/*</code> kullanabilirsiniz. Örneğin, <code>/news/*</code> tüm haberlere erişimi engeller.',
        ],

        'updated' => 'Ayarlar güncellendi.',
    ],

    'navbar_elements' => [
        'title' => 'Gezinti Çubuğu',
        'edit' => 'Geçinti çubuğu elementini düzenle :element',
        'create' => 'Bir gezinti çubuğu elementi yarat',

        'restrict' => 'Bu öğeyi görebilecek rolleri sınırlayın',
        'dropdown' => 'Bu kaydırma menüsüne bu element kaydedilmişken ekleyebilirsin.',

        'fields' => [
            'home' => 'Ana Sayfa',
            'link' => 'Harici Bağlantı',
            'page' => 'Sayfa',
            'post' => 'İleti',
            'posts' => 'İleti Listesi',
            'plugin' => 'Eklenti',
            'dropdown' => 'Açılır menü',
            'new_tab' => 'Yeni bir sekmede aç',
        ],

        'updated' => 'Gezinti çubuğu güncellendi.',
        'not_empty' => 'Kaydırma menüsünü elementlerle silemezsin.',
    ],

    'social_links' => [
        'title' => 'Sosyal Medya',
        'edit' => 'Sosyal bağlantıyı düzenle :link',
        'create' => 'Sosyal bağlantı ekle',
    ],

    'servers' => [
        'title' => 'Sunucular',
        'edit' => 'Sunucuyu Düzenle :server',
        'create' => 'Sunucu Ekle',

        'default' => 'Varsayılan sunucu',
        'default_info' => 'Mevcut tema destekliyorsa, varsayılan sunucudan bağlanan oyuncuların sayısı sitede görüntülenecektir.',

        'home_display' => 'Bu sunucuyu ana sayfada görüntüle',
        'url' => 'Katıl düğmesi URL\'si',
        'url_info' => 'Sunucu adresini görüntülemek için boş bırakın. Oyunu / başlatıcıyı indirmek için bir bağlantı veya sunucuya katılmak için <code>steam://connect/&lt;ip&gt;</code> gibi bir URL olabilir.',

        'ping_info' => 'Ping bağlantısı bir eklentiye ihtiyacı yok ancak bu bağlantı ile komut gerçekleştiremezsin.',
        'query_info' => 'Sorgu bağlantısı (query link) ile sunucuda komut çalıştırmak mümkün değildir.',

        'query_port_info' => 'Oyun portu aynıysa boş olabilir.',

        'verify' => 'Anlık komutları test edin',

        'rcon_password' => 'Rcon Şifresi',
        'rcon_port' => 'Rcon Portu',
        'query_port' => 'Kaynak Sorgu Bağlantı Noktası',
        'unturned_info' => 'OpenMod\'da SRCDS RCON tipini kullanmalısınız. RocketMod RCON uyumlu değil!',

        'azlink' => [
            'port' => 'AzLink Portu',

            'link' => 'Minecraft\'ı web sitenize bağlamak için Azlink:',
            'link1' => '<a href="https://azuriom.com/azlink">AzLink eklentisini indir</a> ve sunucuna yükle.',
            'link2' => 'Sunucuyu yeniden başlat.',
            'link3' => 'Bu komutu sunucunda uygula: ',

            'info' => 'Resimler yüklenmiyorsa, aşağıdaki adımları izlemeyi deneyin: <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">Sıkça Sorulan Sorular</a>.',
            'command' => 'İnternet sitene Minecraft sunucunu şu ile bağlayabilirsin komut: ',
            'port_command' => 'Eğer varsayılan protu yerine başka bir AzLink protu kullanıyorsanız şu komut ile ayarlamanız gerekir: ',
            'ping' => 'Anında komutları etkinleştirin (sunucuda açık bir port gerektirir)',
            'ping_info' => 'Anlık komutlar etkinleştirilmediğinde, komutlar 30 saniye ile 1 dakika arasında bir gecikmeyle yürütülür.',
            'custom_port' => 'Özel bir AzLink portu kullan',

            'error' => 'Sunucuyla bağlantı başarısız, adres ve/veya port yanlış veya port kapalı.',
            'badresponse' => 'Sunucu bağlantısı başarısız oldu (code :code), belirteç geçersiz veya sunucu yanlış yapılandırılmış. Bunu düzeltmek için bağlantı komutunu yeniden yapabilirsiniz.',
        ],

        'players' => ':count player|: oyuncuları say',
        'offline' => 'Çevrimdışı',

        'connected' => 'Sunucuya bağlantı başarıyla kuruldu!',
        'error' => 'Sunucuya bağlantı hata verdi :error',

        'type' => [
            'mc-ping' => 'Minecraft Bağlantı Hızı',
            'mc-rcon' => 'Minecraft RCON
',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Kaynak Sorgu Bağlantı Noktası',
            'source-rcon' => 'Kaynak RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM durumu',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Flyff Sunucusu', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Kullanıcılar',
        'edit' => 'Kullanıcıyı Düzenle :user',
        'create' => 'Kullanıcı oluştur',

        'registered' => 'Kayıtlı',
        'last_login' => 'Son giriş',
        'ip' => 'IP Adresi',

        'admin' => 'Admin',
        'banned' => 'Yasaklı',
        'deleted' => 'Silinmiş',

        'ban' => 'Yasakla',
        'unban' => 'Yasağı Aç',
        'delete' => 'Sil',

        'alert-deleted' => 'Bu kullanıcı silinmiş. Düzenlenemez.',
        'alert-banned' => [
            'title' => 'Bu kullanıcı şu anda banned:',
            'banned-by' => ':author tarafından yasaklanmış',
            'reason' => 'Sebep :reason',
            'date' => 'Tarih :date',
        ],

        'edit_profile' => 'Profili düzenle',

        'info' => 'Kullanıcı bilgisi',

        'ban-title' => ':user\'i yasakla',
        'ban-description' => 'Bu kullanıcıyı yasaklamak istediğinize emin misiniz ?',

        'email' => [
            'verify' => 'E-maili doğrula',
            'verified' => 'E-posta adresi doğrulandı',
            'date' => 'Evet, şu tarihte :date',
            'verify_success' => 'E-posta adresi başarıyla doğrulandı.',
        ],

        '2fa' => [
            'title' => 'İki Faktörlü Doğrulama',
            'secured' => '2FA Etkin',
            'disable' => '2FA\'yı Devre Dışı Bırak',
            'disabled' => 'İki Faktorlü Doğrulama devre dışı bırakıldı.',
        ],

        'password' => [
            'title' => 'Son şifre değişikliği',
            'force' => 'Değişime zorla',
            'forced' => 'Şifre değiştirilmeli',
        ],

        'status' => [
            'banned' => 'Kullanıcı yasaklandı.',
            'unbanned' => 'Kullanıcının yasağı kaldırıldı.',
        ],

        'discord' => 'Bağlı Discord hesabı',

        'notify' => 'Bir bildirim gönder',
        'notify_info' => 'Bu kullanıcıya bir bildirim gönder',
        'notify_all' => 'Tüm kullanıcılara bildirim gönder',
    ],

    'roles' => [
        'title' => 'Roller',
        'edit' => 'Rolü düzenle :role (#:id)',
        'create' => 'Rol oluştur',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Varsayılan',
        'admin' => 'Admin',
        'admin_info' => 'Grup admin olduğu zaman tüm yetkileri bulunsun.',

        'updated' => 'Roller güncellendi.',
        'unauthorized' => 'Bu rol, kendi rolünüzden daha yüksek.',
        'add_admin' => 'Bir role admin yetkileri veremezsin.',
        'remove_admin' => 'Rolünden admin izinlerini kaldıramazsın.',
        'delete_default' => 'Bu rol silinemez.',
        'delete_own' => 'Kendi rolünü silemezsin.',

        'discord' => [
            'title' => 'Discord rollerini bağla',
            'enable' => 'Discord rollerini bağlamayı etkinleştir',
            'enable_info' => 'Etkinleştirildiğinde rolü Discord üzerinde düzenle ve <b>Bağlantılar<b> sekmesinde bir gereksinim ekle. Üyeler rollerini <b>Bağlı Roller<b> kısmından edinebilirler.',
            'info' => '<a href="https://discord.com/developers/applications" target="_blank">Discord Geliştirici Portalı</a> üzerinden bir uygulama oluşturmalısın ve <b>Linked Role Verification URL</b>\'yi <code>:url</code> kısmına eklemelisin.',
            'oauth' => 'Ardından, <b>OAuth2</b> sekmesinde <b>General</b> sayfasında <b>Redirects</b> bölümüne <code>:url</code> kodunu eklemelisin.',
            'token_info' => 'Bot tokeni, Discord geliştirici kontrol panelinin solundaki <b>Bot</b> sekmesinde bir bot oluşturarak elde edilebilir.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Bir iletiye yorum yap',
        'delete-other-comments' => 'Başka bir kullanıcının gönderi yorumunu silme',
        'maintenance-access' => 'Bakım sırasında web sitesine erişin',
        'admin-access' => 'Admin gösterge paneline eriş',
        'admin-logs' => 'Site kayıtlarını görüntüle ve yönet',
        'admin-images' => 'Resimleri görüntüle ve yönet',
        'admin-navbar' => 'Gezinti çubuğunu görüntüle ve yönet',
        'admin-pages' => 'Sayfaları görüntüle ve yönet',
        'admin-redirects' => 'Yönlendirmeleri görüntüleme ve yönetme',
        'admin-posts' => 'İletileri görüntüle ve yönet',
        'admin-settings' => 'Ayarları görüntüle ve yönet',
        'admin-users' => 'Kullanıcıları görüntüleyin ve yönetin',
        'admin-themes' => 'Temaları görüntüle ve yönet',
        'admin-plugins' => 'Eklentileri görüntüle ve yönet',
    ],

    'bans' => [
        'title' => 'Yasaklamalar',

        'by' => 'Tarafından Yasaklandı',
        'reason' => 'Sebep',
        'removed' => ':date\'i şu kullanıcı tarafından :user kaldır',
    ],

    'posts' => [
        'title' => 'İletiler',
        'edit' => 'İletiyi düzenle :post',
        'create' => 'İleti oluştur',

        'published_info' => 'Bu gönderi, bu tarihe kadar herkes tarafından görülemeyecek.',
        'pin' => 'Bu iletiyi işaretle',
        'pinned' => 'Sabitlendi',
        'feed' => 'Gönderiler için bir RSS/Atom yayını <code>:rss</code> ve <code>:atom</code> adreslerinde mevcuttur.',
    ],

    'pages' => [
        'title' => 'Sayfalar',
        'edit' => 'Sayfayı düzenle #:page',
        'create' => 'Sayfa oluştur',

        'enable' => 'Sayfayı aktifleştir',
        'restrict' => 'Bu öğeyi görebilecek rolleri sınırlayın',
    ],

    'redirects' => [
        'title' => 'Yönlendirmeler',
        'edit' => 'Yeniden yönlendirmeyi düzenleme :redirect',
        'create' => 'Yeniden yönlendirme yol oluşturma',

        'enable' => 'Yönlendirmeleri Etkinleştir',
        'source' => 'Kaynak',
        'destination' => 'Hedef',
        'code' => 'Durum kodu',

        '301' => 'Kalıcı Yönlendirme',
        '302' => 'Geçici Yönlendirme',
    ],

    'images' => [
        'title' => 'Resimler',
        'edit' => 'Fotoğrafı düzenle :image',
        'create' => 'Resim Yükle',
        'help' => 'Resimler yüklenmiyorsa, aşağıdaki adımları izlemeyi deneyin: <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">Sıkça Sorulan Sorular</a>.',
    ],

    'extensions' => [
        'buy' => ':price fiyatına satın al',
    ],

    'plugins' => [
        'title' => 'Eklentiler',

        'list' => 'Yüklenmiş Eklentiler',
        'available' => 'Mevcut eklentiler',

        'requirements' => [
            'api' => 'Bu eklenti sürümü, Azuriom sürümünüz ile uyumlu değil.',
            'azuriom' => 'Bu eklenti, Azuriom sürümünüzle uyumlu değil.',
            'game' => 'Eklenti bu oyun ile uyumlu değil: :game.',
            'plugin' => 'Eklenti ":plugin" kısmında eksik veya sürümü bu eklenti ile uyumlu değil.',
        ],

        'reloaded' => 'Eklentiler yenilendi.',
        'enabled' => 'Eklenti aktifleştirildi.',
        'disabled' => 'Ekelnti devre dışı bırakıldı.',
        'updated' => 'Eklenti güncellendi.',
        'installed' => 'Eklenti yüklendi.',
        'deleted' => 'Eklenti silindi.',
        'delete_enabled' => 'Eklenti deaktif olmadan silinemez.',
    ],

    'themes' => [
        'title' => 'Temalar',

        'current' => 'Kullanılan tema',
        'author' => 'Yazar :author',
        'version' => 'Sürüm: :version',
        'list' => 'Yüklenen temalar',
        'available' => 'Mevcut temalar',
        'no-enabled' => 'Herhangi bir tema aktif değil.',
        'legacy' => 'Bu tema sürümü, Azuriom v:version sürümünüz ile uyumlu değil.',

        'config' => 'Konfigürasyonu düzenle',
        'disable' => 'Temayı devre dışı bırak',

        'reloaded' => 'Temalar yenilendi.',
        'no_config' => 'Bu tema konfigürasyona sahip değil.',
        'config_updated' => 'Tema konfigürasyonu güncellendi.',
        'invalid' => 'Bu tema geçersiz (tema klasörü adı, tema kimliği (id) olmalıdır).',
        'updated' => 'Tema güncellendi.',
        'installed' => 'Tema yüklendi.',
        'deleted' => 'Tema silindi.',
        'delete_current' => 'Kullanılan temayı silemezsin.',
    ],

    'update' => [
        'title' => 'Güncelle',

        'has_update' => 'Güncelleme mevcut',
        'no_update' => 'Güncelleme mevcut değil',
        'check' => 'Güncellemeleri kontrol et',

        'update' => 'Azuriom\'un <code>:last-version</code> sürümü erişilebilir ve şuanda <code>:version</code> sürümünü kullanıyorsunuz.',
        'changelog' => 'Değişiklik günlüğüne <a href=":url" target="_blank" rel="noopener noreferrer">buradan</a> erişilebilir.',
        'download' => 'Azuriom\'un son sürümü indirilmeye hazır.',
        'install' => 'Azuriom\'un en son sürümü indirildi ve kurulmaya hazır.',

        'backup' => 'Azuriom\'u güncellemeden önce sitenizin yedeğini almalısınız!',

        'latest_version' => 'Azuriom\'un en son sürümünü kullanıyorsunuz: <code>:version</code>.',
        'latest' => 'Azuriom\'un en son versiyonunu kullanıyorsun.',

        'downloaded' => 'En son sürüm indirildi, şimdi kurabilirsiniz.',
        'installed' => 'Güncelleme başarıyla yüklendi.',
    ],

    'logs' => [
        'title' => 'Kayıtlar',

        'clear' => 'Eski kayıtları sil (15gün+)',
        'cleared' => 'Eski kayıtlar silindi.',
        'changes' => 'Değişiklikler',
        'old' => 'Eski değer',
        'new' => 'Yeni değer',

        'pages' => [
            'created' => 'Sayfa oluşturuldu #:id',
            'updated' => 'Sayfa güncellendi #:id',
            'deleted' => 'Sayfa silindi #:id',
        ],

        'posts' => [
            'created' => 'İleti oluşturuldu #:id',
            'updated' => 'İleti güncellendi #:id',
            'deleted' => 'İleti silindi #:id',
        ],

        'images' => [
            'created' => 'Resim oluşturuldu #:id',
            'updated' => 'Resim güncellendi #:id',
            'deleted' => 'Resim silindi #:id',
        ],

        'redirects' => [
            'created' => 'Yönlendirme oluşturuldu #:id',
            'updated' => 'Yönlendirme güncellendi #:id',
            'deleted' => 'Yönlendirme silindi #:id',
        ],

        'roles' => [
            'created' => 'Rol oluşturuldu #:id',
            'updated' => 'Rol güncellendi #:id',
            'deleted' => 'Rol silindi #:id',
        ],

        'servers' => [
            'created' => 'Sunucu oluşturuldu #:id',
            'updated' => 'Sunucu güncellendi #:id',
            'deleted' => 'Sunucu silindi #:id',
        ],

        'users' => [
            'updated' => 'Kullanıcı güncellendi #:id',
            'deleted' => 'Kullanıcı silindi #:id',
            'transfer' => 'Toplam :money parayı #:id adlı kullanıcıya gönderin',

            'login' => ':ip (2FA: :2fa) tarafından başarılı giriş',
            '2fa' => [
                'enabled' => 'İki aşamalı doğrulama etkinleştirildi',
                'disabled' => 'İki faktörlü doğrulama devre dışı bırakıldı',
            ],
        ],

        'settings' => [
            'updated' => 'Ayarlar güncellendi',
        ],

        'updates' => [
            'installed' => 'Azuriom güncellemesi yüklendi',
        ],

        'plugins' => [
            'enabled' => 'Eklenti aktifleştirildi',
            'disabled' => 'Eklenti deaktifleştirildi',
        ],

        'themes' => [
            'changed' => 'Tema değiştirildi',
            'configured' => 'Tema konfigürasyonu güncellendi',
        ],
    ],

    'errors' => [
        'back' => 'Gösterge Paneline Geri Git',
        '404' => 'Sayfa Bulunamadı',
        'info' => 'Görünüşe bakılırsa matrixin içinde bir aksaklık buldun...',
        '2fa' => 'İki aşamalı doğrulamayı etkinleştirmeden bu sayfaya erişemezsiniz.',
    ],
];
