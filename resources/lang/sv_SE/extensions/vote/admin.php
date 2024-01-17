<?php

return [
    'nav' => [
        'title' => 'Rösta',
        'settings' => 'Inställningar',
        'sites' => 'Platser',
        'rewards' => 'Belöningar',
        'votes' => 'Röster',
    ],

    'permission' => 'Hantera rösttillägg',

    'settings' => [
        'title' => 'Inställningar för röstsida',

        'count' => 'Antal toppspelare',
        'display-rewards' => 'Visa belöningar på röstsidan',
        'ip_compatibility' => 'Aktivera IPv4/IPv6-kompatibilitet',
        'ip_compatibility_info' => 'Det här alternativet låter dig korrigera röster som inte verifieras på röstningsställen som inte accepterar IPv6 medan din webbplats gör det, eller tvärtom.',
        'commands' => 'Globala kommandon',
    ],

    'sites' => [
        'title' => 'Platser',
        'edit' => 'Redigera sajt :site',
        'create' => 'Skapa webbplats',

        'enable' => 'Aktivera sajten',
        'delay' => 'Fördröjning mellan röster',
        'minutes' => 'minuter',

        'list' => 'Webbplatser där röster kan verifieras',
        'variable' => 'Du kan använda <code>{player}</code> för att använda spelarens namn.',

        'verifications' => [
            'title' => 'Verifiering',
            'enable' => 'Aktivera verifiering av röster',

            'disabled' => 'Rösterna på denna webbplats kommer inte att verifieras.',
            'auto' => 'Rösterna på denna webbplats kommer att verifieras automatiskt.',
            'input' => 'Rösterna på denna webbplats kommer att verifieras när inmatningen nedan fylls.',

            'pingback' => 'Pingback URL: :url',
            'secret' => 'Hemlig nyckel',
            'server_id' => 'Server-ID',
            'token' => 'Tecken',
            'api_key' => 'API-nyckel',
        ],
    ],

    'rewards' => [
        'title' => 'Belöningar',
        'edit' => 'Redigera belöning :reward',
        'create' => 'Skapa belöning',

        'require_online' => 'Utför kommandon när användaren är online på servern (endast tillgänglig med AzLink)',
        'enable' => 'Aktivera belöningen',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking av användare för att ge denna belöning till i slutet av månaden',
        'monthly_info' => 'Ge automatiskt denna belöning, i slutet av månaden, till användarna på de givna positionerna i den bästa väljarna rankning.',
        'cron' => 'Du måste ställa in CRON uppgifter för att använda automatiska belöningar i slutet av månaden.',
    ],

    'votes' => [
        'title' => 'Röster',

        'empty' => 'Inga röster denna månad.',
        'votes' => 'Antal röster',
        'month' => 'Antal röster denna månad',
        'week' => 'Antal röster denna vecka',
        'day' => 'Antal röster idag',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Skapad röstsajt #:id',
            'updated' => 'Uppdaterad röstsida #:id',
            'deleted' => 'Borttagen röstsida #:id',
        ],

        'vote-rewards' => [
            'created' => 'Skapad röstbelöning #:id',
            'updated' => 'Uppdaterad röstbelöning #:id',
            'deleted' => 'Röstbelöning borttagen #:id',
        ],
    ],
];
