<?php

return [

    'lang' => 'Türkçe',

    'date' => [
        'default' => 'j F Y',
        'full' => 'j F Y, G:i',
        'compact' => 'd.m.Y, j F Y',
    ],

    'nav' => [
        'toggle' => 'Navigasyonu aç/kapat',
        'profile' => 'Profil',
        'admin' => 'Admin Paneli',
    ],

    'actions' => [
        'add' => 'Ekle',
        'back' => 'Geri Dön',
        'browse' => 'Ara',
        'cancel' => 'İptal Et',
        'choose_file' => 'Dosya seç',
        'close' => 'Kapat',
        'comment' => 'Yorum Yap',
        'continue' => 'Devam Et',
        'copy' => 'Kopyala',
        'create' => 'Oluştur',
        'delete' => 'Sil',
        'disable' => 'Deaktif Et',
        'download' => 'İndir',
        'duplicate' => 'Çiftle',
        'edit' => 'Düzenle',
        'enable' => 'Aktif Et',
        'generate' => 'Oluştur',
        'install' => 'Yükle',
        'refresh' => 'Yenile',
        'reload' => 'Yeniden Yükle',
        'remove' => 'Kaldır',
        'save' => 'Kaydet',
        'search' => 'Ara',
        'send' => 'Gönder',
        'show' => 'Göster',
        'update' => 'Güncelle',
        'upload' => 'Yükle',
    ],

    'fields' => [
        'action' => 'Eylem',
        'address' => 'Adres',
        'author' => 'Yaratıcı',
        'category' => 'Kategori',
        'color' => 'Renk',
        'content' => 'İçerik',
        'date' => 'Tarih',
        'description' => 'Açıklama',
        'enabled' => 'Aktif',
        'file' => 'Dosya',
        'game' => 'Oyun',
        'icon' => 'İkon',
        'image' => 'Resim',
        'link' => 'Bağlantı',
        'money' => 'Para',
        'name' => 'İsim',
        'permissions' => 'Yetkiler',
        'port' => 'Port',
        'price' => 'Ücret',
        'published_at' => 'Şu tarihte yayınlandı',
        'quantity' => 'Miktar',
        'role' => 'Rol',
        'server' => 'Sunucu',
        'short_description' => 'Kısa Açıklama',
        'slug' => 'Bağlantı',
        'status' => 'Durum',
        'title' => 'Başlık',
        'type' => 'Tür',
        'url' => 'URL',
        'user' => 'Kullanıcı',
        'value' => 'Değer',
        'version' => 'Versiyon',
    ],

    'status' => [
        'success' => 'Aktarım başarıyla tamamlandı!',
        'error' => 'Bir hata oluştu: :error',
    ],

    'range' => [
        'days' => 'Günlere göre',
        'months' => 'Aylara göre',
    ],

    'loading' => 'Yükleniyor...',

    'yes' => 'Evet',
    'no' => 'Hayır',
    'unknown' => 'Bilinmeyen',
    'other' => 'Diğer',
    'none' => 'Yok',
    'copied' => 'Kopyalandı',
    'icons' => 'Kullanılabilir simgelerin listesini <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer"> Önyükleme Simgeleri</a>.',

    'home' => 'Ana Sayfa',
    'servers' => 'Sunucular',
    'news' => 'Haberler',
    'welcome' => 'Hoşgeldiniz:name',
    'copyright' => '<a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a> tarafından desteklenmektedir.',

    'maintenance' => [
        'title' => 'Bakım',
        'message' => 'İnternet sitemiz şu anda bakım altındadır.',
    ],

    'theme' => [
        'light' => 'Aydınlık tema',
        'dark' => 'Karanlık tema',
    ],

    'captcha' => 'Captcha doğrulaması başarısız oldu, lütfen tekrar deneyin.',

    'notifications' => [
        'notifications' => 'Bildirimler',
        'read' => 'Okundu olarak işaretle',
        'empty' => 'Yeni bir bildiriminiz yok.',
        'level' => 'Seviye',
        'info' => 'Bilgi',
        'warning' => 'Uyarı',
        'danger' => 'Tehlike',
        'success' => 'Başarılı',
    ],

    'clipboard' => [
        'copied' => 'Kopyalandı!',
        'error' => 'Kopyalamak için: CTRL + C',
    ],

    'server' => [
        'join' => 'Katıl',
        'total' => ':count çevrimiçi oyuncu| çevrimiçi oyuncuları say',
        'online' => ':count çevrimiçi oyuncu| çevrimiçi oyuncuları say',
        'offline' => 'Sunucu şu anda çevrim dışı.',
    ],

    'profile' => [
        'title' => 'Profilim',
        'change_email' => 'E-posta Adresini Değiştir',
        'change_password' => 'Şifre Değiştir',
        'change_name' => 'Kullanıcı Adını değiştir',

        'delete' => [
            'btn' => 'Hesabımı sil',
            'title' => 'Hesap silme',
            'info' => 'Bu, hesabınızı ve ilişkili verilerinizi kalıcı olarak silecektir. Bu eylem geri alınamaz.',
            'email' => 'Bu işlemi onaylamak için size bir onay e-postası göndereceğiz.',
            'sent' => 'E-posta adresinize bir onay e-postası gönderildi.',
            'success' => 'Hesabınız başarıyla silindi!',
        ],

        'email_verification' => 'E-postanız doğrulanmadı, lütfen doğrulama bağlantısı için e-postanızı kontrol edin.',
        'updated' => 'Profiliniz güncellendi.',

        'info' => [
            'role' => 'Rol: :role',
            'register' => 'Kayıt Tarihi: :date',
            'money' => 'Para: :money',
            '2fa' => 'İki Faktörlü Kimlik Doğrulama (2FA): :2fa',
            'discord' => 'Bağlı Discord hesabı: :user',
        ],

        '2fa' => [
            'enable' => '2FA\'yı Etkinleştir',
            'disable' => '2FA\'yı Devre Dışı Bırak',
            'manage' => '2FA\'yı Yönet',
            'info' => 'Aşağıdaki QR kodunu telefonunuzda yüklü olan <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://secrets.app/" target="_blank" rel="noopener norefferer">Secrets</a> veya Google Authenticator uygulamalarından biri üzerinden taratın.',
            'secret' => 'Gizli anahtar: :secret',
            'title' => 'İki Aşamalı Doğrulama',
            'codes' => 'Kurtarma kodlarını göster',
            'code' => 'Kod',
            'enabled' => 'İki Aşamalı Doğrulama şuan devredışı. Kurtarma kodlarınızı kaydetmeyi unutmayın!',
            'disabled' => 'İki Aşamalı Doğrulama devre dışı.',
        ],

        'discord' => [
            'link' => 'Discord\'a bağla',
            'unlink' => 'Discord bağlantısını kaldır',
            'linked' => 'Hesabın Discord ile başarıyla bağlandı.',
        ],

        'money_transfer' => [
            'title' => 'Bakiye transferi',
            'user' => 'Bu kullanıcı bulunamadı.',
            'balance' => 'Bu aktarımı gerçekleştirmek için yeterli bakiyeniz bulunmuyor.',
            'success' => 'Bakiye başarıyla gönderildi.',
            'notification' => ':user sana :money gönderdi.',
        ],
    ],

    'posts' => [
        'posts' => 'Gönderiler',
        'posted' => ':date tarihinde :user tarafından paylaşıldı',
        'unpublished' => 'Bu gönderi henüz yayınlanmamış.',
        'read' => 'Daha fazla okuyun',
    ],

    'comments' => [
        'create' => 'Bir yorum bırak',
        'guest' => 'Yorum yapabilmek için giriş yapmalısınız.',
        'author' => '<strong>:user</strong>, :date tarihinde yorum yaptı',
        'content' => 'Yorumunuz',
        'delete' => 'Sil?',
        'delete_confirm' => 'Bu yorumu silmek istediğinizden emin misiniz?',
    ],

    'likes' => 'Beğeniler :count',

    'markdown' => [
        'init' => 'Dosyaları eklemek için pano\'dan kopyalayabilir veya sürükle-bırak yapabilirsiniz.',
        'drag' => 'Yüklemek için görseli sürükle.',
        'drop' => '#images_names# - görsel yükleniyor...',
        'progress' => '#file_name# yükleniyor: #progress#%',
        'uploaded' => '#image_name# yüklendi',

        'size' => '#image_name# görseli çok büyük (#image_size#).\nMaksimum dosya boyutu #image_max_size#.',
        'error' => '#image_name# görseli yüklenirken bir şeyler ters gitti.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Rol kimliği',
            'description' => 'Web sitedeki rolün kimliği.',
        ],

        'power' => [
            'name' => 'Rol Gücü',
            'description' => 'Web sitesindeki rolün gücü, eşit veya daha büyük',
        ],
    ],
];
