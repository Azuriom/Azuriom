<?php

return [
    'nav' => [
        'title' => 'Hlasování',
        'settings' => 'Nastavení',
        'sites' => 'Stránky',
        'rewards' => 'Odměny',
        'votes' => 'Hlasy',
    ],

    'permission' => 'Spravovat hlasovací doplněk',

    'settings' => [
        'title' => 'Nastavení hlasovací stránky',

        'count' => 'Počet nejlepších hráčů',
        'display-rewards' => 'Zobrazit odměny na hlasovací stránce',
        'ip_compatibility' => 'Povolit kompatibilitu IPv4/IPv6',
        'ip_compatibility_info' => 'Tato možnost vám umožňuje opravit hlasy, které nebyly ověřeny na hlasovacích webech, které nepodporují IPv6 zatímco váš web ano, nebo naopak.',
        'commands' => 'Globální příkazy',
    ],

    'sites' => [
        'title' => 'Stránky',
        'edit' => 'Úprava stránky :site',
        'create' => 'Vytvořit stránku',

        'enable' => 'Povolit stránku',
        'delay' => 'Zpoždění mezi hlasy',
        'minutes' => 'minut',

        'list' => 'Stránky, na kterých lze ověřit hlasování',
        'variable' => 'Pro použití jména hráče můžete použít <code>{player}</code>.',

        'verifications' => [
            'title' => 'Ověření',
            'enable' => 'Povolit ověřování hlasů',

            'disabled' => 'Hlasy na tomto webu nebudou ověřeny.',
            'auto' => 'Hlasy na tomto webu budou automaticky ověřeny.',
            'input' => 'Hlasy na tomto webu budou ověřeny při vyplnění pole níže.',

            'pingback' => 'URL Pingback: :url',
            'secret' => 'Tajný klíč',
            'server_id' => 'ID serveru',
            'token' => 'Token',
            'api_key' => 'Klíč API',
        ],
    ],

    'rewards' => [
        'title' => 'Odměny',
        'edit' => 'Upravit odměnu :reward',
        'create' => 'Vytvořit odměnu',

        'require_online' => 'Vykonávání příkazů, když je uživatel online na serveru (dostupné pouze s AzLink)',
        'enable' => 'Povolit odměnu',

        'commands' => 'Pro jméno hráče můžete použít <code>{player}</code>, pro název odměny <code>{reward}</code> a pro web hlasování <code>{site}</code>. Pro hry ze služby Steam můžete také použít <code>{steam_id}</code> a <code>{steam_id_32}</code>. Příkaz nesmí začínat znakem <code>/</code>.',
        'monthly' => 'Hodnocení uživatelů, kterým má být na konci měsíce uložena tato odměna',
        'monthly_info' => 'Automaticky udělit tuto odměnu na konci měsíce všem uživatelům na určitých pozicích v žebříčku nejlepších hlasujících.',
        'cron' => 'Pro použití automatických odměn na konci měsíce musíte nastavit úlohy CRON.',
    ],

    'votes' => [
        'title' => 'Hlasy',

        'empty' => 'Žádné hlasy tento měsíc.',
        'votes' => 'Počet hlasů',
        'month' => 'Počet hlasů tento měsíc',
        'week' => 'Počet hlasů tento týden',
        'day' => 'Počet hlasů dnes',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Vytvořena hlasovací stránka č. :id',
            'updated' => 'Aktualizována hlasovací stránka č. :id',
            'deleted' => 'Odstraněna hlasovací stránka č. :id',
        ],

        'vote-rewards' => [
            'created' => 'Vytvořena odměna za hlasování č. :id',
            'updated' => 'Aktualizována odměna za hlasování č. :id',
            'deleted' => 'Odstraněna odměna za hlasování č. :id',
        ],
    ],
];
