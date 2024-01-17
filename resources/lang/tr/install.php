<?php

return [
    'title' => 'Kurulum',

    'welcome' => 'Azuriom <strong>yeni nesil</strong> oyun yönetim sistemi web sitesidir. <strong>Ücretsiz</strong> ve <strong>açık kaynak kodludur</strong>. Diğer oyun yönetim sistemlerine kıyasla <strong>modern, güvenilir ve hızlıdır</strong> ve böylece <strong>olabilecek en iyi web deneyimini</strong> yaşayabilirsiniz.',

    'back' => 'Geri Dön',

    'requirements' => [
        'php' => 'PHP :version veya daha yükseği',
        'writable' => 'İzin yaz',
        'rewrite' => 'URL yönlendirmesi aktif',
        'extension' => 'Eklenti :extension',
        'function' => 'Fonksiyon :function aktifleştirildi',
        '64bit' => '64-bit PHP',

        'refresh' => 'Gereksinimleri yenileyin',
        'success' => 'Azuriom konfigüre edilmeye hazır!',
        'missing' => 'Sunucunuz Azuriom\'u yüklemek için gerekli gereksinimlere sahip değil.',

        'help' => [
            'writable' => 'İzin yazabilmek için <code>:command</code> komutunu deneyebilirsin.',
            'rewrite' => 'URL yönlendirmesini aktifleştirmek için <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">dokümantasyon</a> sayfasındaki talimatları izleyebilirsin.',
            'htaccess' => '<code>.htaccess</code> veya <code>public/.htaccess</code> dosyası bulunamadı. Gizli dosyaları etkinleştirdiğinizden ve dosyanın mevcut olduğundan emin olun.',
            'extension' => 'Eksik PHP eklentilerini yüklemek için şu komutu deneyebilirsiniz: <code>{command}</code>. <br>Tamamlandığında, Apache veya Nginx\'i yeniden başlatın.',
            'function' => 'Bu fonksiyon <code>disable_functions</code> değerini php.ini dosyası üzerinde düzenleyerek aktif edilebilir.',
        ],
    ],

    'database' => [
        'title' => 'Veritabanı',

        'type' => 'Tip',
        'host' => 'Makine',
        'port' => 'Port',
        'database' => 'Veritabanı',
        'user' => 'Kullanıcı',
        'password' => 'Şifre',

        'warn' => 'Bu veritabanı türü tavsiye edilmez ve yalnızca başka türlü yapılması mümkün olmadığında kullanılmalıdır.',
    ],

    'game' => [
        'title' => 'Oyun',

        'locale' => 'Yerel',

        'warn' => 'Dikkatli olun, kurulum tamamlandıktan sonra Azuriom\'u tamamen yeniden yüklemeden bunu değiştirmek mümkün olmayacaktır!',

        'install' => 'Yükle',

        'user' => [
            'title' => 'Yönetici Hesabı',

            'name' => 'İsim',
            'email' => 'E-posta Adresi',
            'password' => 'Parola',
            'password_confirm' => 'Şifreyi Onayla',
        ],

        'minecraft' => [
            'premium' => 'Microsoft hesabı ile giriş yapın (en güvenlisi ancak Minecraft\'ı satın almış olmanız gerekir)',
        ],

        'steam' => [
            'profile' => 'Steam Profil Bağlantısı',
            'profile_info' => 'Bu Steam kullanıcısı sitede yönetici olacaktır.',

            'key' => 'Steam API Anahtarı',
            'key_info' => 'Steam API Anahtarınızı <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">bağlantı</a> üzerinden bulabilirsiniz.',
        ],
    ],

    'success' => [
        'thanks' => 'Azuriom\'u seçtiğiniz için teşekkürler!',
        'success' => 'Web siteniz başarıyla kuruldu, artık web sitenizi kullanabilir ve harika bir şeyler yapabilirsiniz!',
        'go' => 'Başlarken',
        'support' => 'Azuriom\'u ve sunduğumuz çalışmaları takdir ediyorsanız, lütfen <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">bizi desteklemeyi</a> unutmayın.',
    ],
];
