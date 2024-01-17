<?php

return [
    'nav' => [
        'title' => 'Głosowanie',
        'settings' => 'Ustawienia',
        'sites' => 'Strony internetowe',
        'rewards' => 'Nagrody',
        'votes' => 'Głosy',
    ],

    'permission' => 'Zarządzaj wtyczką do głosowania',

    'settings' => [
        'title' => 'Ustawienia strony głosowania',

        'count' => 'Liczba najlepszych graczy',
        'display-rewards' => 'Pokaż nagrody na stronie głosowania',
        'ip_compatibility' => 'Włącz kompatybilność IPv4/IPv6',
        'ip_compatibility_info' => 'Ta opcja pozwala na poprawienie głosów, które nie są weryfikowane na stronach głosowania, które nie akceptują IPv6 w czasie trwania witryny lub odwrotnie.',
        'commands' => 'Globalne komendy',
    ],

    'sites' => [
        'title' => 'Strony internetowe',
        'edit' => 'Edytuj witrynę :site',
        'create' => 'Utwórz witrynę',

        'enable' => 'Włączyć stronę',
        'delay' => 'Opóźnienie między głosowaniami',
        'minutes' => 'minuty',

        'list' => 'Witryny, na których można zweryfikować głosy',
        'variable' => 'Możesz użyć <code>{player}</code> , aby użyć nazwy gracza.',

        'verifications' => [
            'title' => 'Weryfikacja',
            'enable' => 'Włącz weryfikację głosów',

            'disabled' => 'Głosy na tej stronie nie będą weryfikowane.',
            'auto' => 'Głosy na tej stronie zostaną automatycznie zweryfikowane.',
            'input' => 'Głosy na tej stronie zostaną zweryfikowane po wypełnieniu poniższego wpisu.',

            'pingback' => 'URL Pingback: :url',
            'secret' => 'Tajny klucz',
            'server_id' => 'Identyfikator serwera',
            'token' => 'Token',
            'api_key' => 'API key',
        ],
    ],

    'rewards' => [
        'title' => 'Nagrody',
        'edit' => 'Edytuj nagrodę :reward',
        'create' => 'Utwórz nagrodę',

        'require_online' => 'Wykonaj polecenia, gdy użytkownik jest online na serwerze (dostępne tylko dla AzLink)',
        'enable' => 'Włączyć nagrodę',

        'commands' => 'You can use <code>{player}</code> to use the player name, <code>{reward}</code> for the reward name and <code>{site}</code> for the vote website. For Steam games, you can also use <code>{steam_id}</code> and <code>{steam_id_32}</code>. The command must not start with <code>/</code>.',
        'monthly' => 'Ranking of users to give this reward to at the end of the month',
        'monthly_info' => 'Automatically give this reward, at the end of the month, to the users at the given positions in the best voters ranking.',
        'cron' => 'You must set up CRON tasks to use automatic rewards at the end of the month.',
    ],

    'votes' => [
        'title' => 'Głosy',

        'empty' => 'Brak głosów w tym miesiącu.',
        'votes' => 'Liczba głosów',
        'month' => 'Licznik głosów w tym miesiącu',
        'week' => 'Licznik głosów w tym tygodniu',
        'day' => 'Licznik głosów dzisiaj',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Utworzono stronę głosowań #:id',
            'updated' => 'Zaktualizowano stronę głosowania #:id',
            'deleted' => 'Usunięto witrynę głosowań #:id',
        ],

        'vote-rewards' => [
            'created' => 'Utworzono nagrodę za głos #:id',
            'updated' => 'Zaktualizowano nagrodę za głos #:id',
            'deleted' => 'Nagroda za głos usunięta #:id',
        ],
    ],
];
