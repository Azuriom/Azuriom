<?php

return [
    'title' => 'Toko',
    'welcome' => 'Selamat datang!',

    'buy' => 'Beli',

    'free' => 'Gratis',

    'fields' => [
        'balance' => 'Balance',
        'category' => 'Kategori',
        'code' => 'Kode',
        'commands' => 'Perintah',
        'currency' => 'Mata uang',
        'discount' => 'Diskon',
        'expire_date' => 'Sampai tanggal',
        'gateways' => 'Gateway',
        'original_balance' => 'Original Balance',
        'package' => 'Paket',
        'packages' => 'Paket',
        'payment_id' => 'ID Pembayaran',
        'payments' => 'Payments',
        'price' => 'Harga',
        'quantity' => 'Kuantitas',
        'required_packages' => 'Paket yang dibutuhkan',
        'required_roles' => 'Role dibutuhkan',
        'role' => 'Peran yang akan ditetapkan setelah pembelian',
        'servers' => 'Server',
        'start_date' => 'Mulai tanggal',
        'status' => 'Status',
        'total' => 'Jumlah',
        'user_id' => 'ID Pengguna',
        'user_limit' => 'Batas pembelian pengguna',
    ],

    'actions' => [
        'duplicate' => 'Duplikat',
        'remove' => 'Hapus',
    ],

    'goal' => [
        'title' => 'Target bulan ini',
        'progress' => ':count% selesai',
    ],

    'recent' => [
        'title' => 'Pembayaran Terakhir',
        'empty' => 'Tidak ada pembayaran terakhir',
    ],

    'top' => [
        'title' => 'Top user',
    ],

    'cart' => [
        'title' => 'Troli',
        'success' => 'Pembelian kamu berhasil diselesaikan.',
        'guest' => 'Kamu harus login untuk melakukan pembelian.',
        'empty' => 'Troli kamu kosong.',
        'checkout' => 'Lanjut ke pembayaran',
        'remove' => 'Hapus',
        'clear' => 'Bersihkan troli',
        'pay' => 'Bayar',
        'back' => 'Kembali ke toko',
        'total' => 'Jumlah: :total',
        'payable_total' => 'Total to pay: :total',
        'credit' => 'Kredit',

        'confirm' => [
            'title' => 'Bayar?',
            'price' => 'Apa kamu yakin ingin membeli semua yang ada di troli ini dengan harga :price.',
        ],

        'errors' => [
            'money' => 'Kamu tidak memiliki cukup uang untuk melakukan pembelian ini.',
            'execute' => 'Terjadi kesalahan saat proses pembayaran, pembelianmu mendapatkan refund.',
        ],
    ],

    'coupons' => [
        'title' => 'Kupon',
        'add' => 'Tambah kupon',
        'error' => 'Kupon ini tidak ada, kawaluwarsa, atau tidak dapat digunakan lagi.',
        'cumulate' => 'Kamu tidak dapat menggukan kupon ini dengan kupon lain.',
    ],

    'payment' => [
        'title' => 'Pembayaran',
        'manual' => 'Pembayaran manual',

        'empty' => 'Tidak ada metode pembayaran yang tersedia.',

        'info' => 'Membeli #:id di :website',
        'error' => 'Pembayaran tidak dapat diselesaikan.',

        'success' => 'Pembayaran berhasil, kamu akan mendapatkan barang didalam game kurang dari satu menit.',

        'webhook' => 'Pembayaran baru di toko',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Kategori ini kosong.',
    ],

    'packages' => [
        'limit' => 'Kamu telah membeli semaksimal mungkin untuk paket ini.',
        'requirements' => 'Kamu tidak memiliki persyaratan untuk membeli paket ini.',
    ],

    'offers' => [
        'gateway' => 'Jenis pembayaran',
        'amount' => 'Jumlah',

        'empty' => 'Tidak ada promo yang tersedia saat ini.',
    ],

    'profile' => [
        'payments' => 'Pembayaran kamu',
        'money' => 'Uang: :balance',
    ],

    'giftcards' => [
        'title' => 'Giftcards',
        'success' => ':money telah dikreditkan ke akun kamu',
        'error' => 'Giftcard ini tidak ada, kedaluwarsa, atau tidak dapat digunakan lagi.',
        'add' => 'Add a gift card',
        'notification' => 'You received a giftcard, the code is :code (:balance).',
    ],
];
