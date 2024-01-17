<?php

return [

    'nav' => [
        'settings' => 'Nastavení',
        'forums' => 'Fóra',
        'tags' => 'Štítky',
    ],

    'settings' => [
        'title' => 'Nastavení fóra',
        'home_message' => 'Zpráva na domovské obrazovce',
        'webhook' => 'URL Discord webhooku',
        'webhook_info' => 'Na tento webhook bude odesláno upozornění při zveřejnění nové zprávy. Ponechte prázdné pro zakázání',
    ],

    'categories' => [
        'title' => 'Kategorie',
        'edit' => 'Úprava kategorie :category',
        'create' => 'Vytvořit kategorii',

        'delete_error' => 'Kategorie obsahuje fóra a nemůže být odstraněna.',
    ],

    'forums' => [
        'title' => 'Fóra',
        'create' => 'Vytvořit fórum',
        'edit' => 'Úprava fóra :forum',

        'create_category' => 'Vytvořit kategorii',
        'create_forum' => 'Vytvořit fórum',

        'parent' => 'Nadřazené fórum',
        'restricted' => 'Omezit přístup k tomuto fóru pouze na určité role',
        'default_tags' => 'Výchozí štítky',
        'lock' => 'Uzamknout tuto fórum',
        'lock_info' => 'Uživatelé, kteří nejsou správci, nebudou moci vytvářet diskuze.',
        'private' => 'Soukromé fórum',
        'private_info' => 'Uživatelé mohou vidět pouze své vlastní diskuse a připnutí.',

        'updated' => 'Řazení fór aktualizováno.',
        'delete_error' => 'Fóra s diskuzemi a podfóra nelze odstranit.',
    ],

    'discussions' => [
        'card' => 'Diskuze ve fóru',
    ],

    'posts' => [
        'card' => 'Příspěvky ve fóru',

        'recent' => 'Nedávné příspěvky na domovské stránce',
        'delay' => 'Zpoždění mezi příspěvky',
        'seconds' => 'sekund',
    ],

    'tags' => [
        'title' => 'Štítky',
        'create' => 'Vytvořit štítek',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Odstraněna diskuze #:id',
            'pinned' => 'Připnuta diskuze #:id',
            'unpinned' => 'Odepnuta diskuze #:id',
            'locked' => 'Uzamknuta diskuze #:id',
            'unlocked' => 'Odemknuta diskuze #:id',
        ],

        'forum-posts' => [
            'deleted' => 'Odstraněn příspěvek #:id',
        ],

        'forum-categories' => [
            'created' => 'Vytvořena kategorie fóra #:id',
            'updated' => 'Upravena kategorie fóra #:id',
            'deleted' => 'Odstraněna kategorie fóra #:id',
        ],

        'forum-forums' => [
            'created' => 'Vytvořeno fórum #:id',
            'updated' => 'Upraveno fórum #:id',
            'deleted' => 'Odstraněno fórum #:id',
        ],
    ],

    'permissions' => [
        'forums' => 'Spravovat fóra a kategorie',
        'discussions' => 'Spravovat diskuze fóra (přesouvat, upravovat, mazat, připínat, uzamknout)',
        'private' => 'Zobrazit diskuze ostatních uživatelů v soukromých fórech',
        'delete_own_posts' => 'Odstraňovat vlastní příspěvky na fóru',
        'locked' => 'Vytvořit diskuzi v uzamčeném fóru'
    ],
];
