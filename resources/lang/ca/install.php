<?php

return [
    'title' => 'Instal·lació',

    'welcome' => 'Azuriom és el CMS del joc <strong>de propera generació</strong>, és <strong>gratuït</strong> i <strong>de codi obert</strong> i és un <strong>modern, fiable, ràpid i segur< /strong> alternativa al CMS existent perquè pugueu tenir la <strong>millor experiència web possible</strong>.',

    'back' => 'Enrere',

    'requirements' => [
        'php' => 'Versió PHP :version or millor',
        'writable' => 'Permís d\'escriptura',
        'rewrite' => 'URL rewrite habilitat',
        'extension' => 'Extensió :extension',
        'function' => 'Funcio :function habilitada',
        '64bit' => '64-bit PHP',

        'refresh' => 'Refrescar requirements',
        'success' => 'Azuriom està preparat per la configuració!',
        'missing' => 'El teu servidor no té els requirements necessaris per instal·lar Azuriom.',

        'help' => [
            'writable' => 'Pot intentar aquesta comanda per garantir el permís d\'escriptura: <code>:command</code>.',
            'rewrite' => 'Pots seguir les instruccions de la <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">la nostra documentació</a> per habilitar la reescriptura d\'URL.',
            'htaccess' => 'Falta el fitxer <code>.htaccess</code> o <code>public/.htaccess</code>. Assegureu-vos que heu habilitat els fitxers ocults i que el fitxer està present.',
            'extension' => 'Pots provar aquesta ordre per instal·lar les extensions PHP que falten: <code>:command</code>.<br>Un cop feta, reinicia Apache o Nginx.',
            'function' => 'Has d\'habilitar aquesta funció al fitxer php.ini de PHP editant el valor de <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Base de dades',

        'type' => 'Tipus',
        'host' => 'Host',
        'port' => 'Port',
        'database' => 'Base de dades',
        'user' => 'Usuari',
        'password' => 'Contrasenya',

        'warn' => 'Aquest tipus de base de dades no es recomana i només s\'ha d\'utilitzar quan no és possible fer el contrari.',
    ],

    'game' => [
        'title' => 'Joc',

        'locale' => 'Configuració Regional',

        'warn' => 'Vigila, un cop finalitzada la instal·lació, no serà possible canviar-ho sense reinstal·lar Azuriom completament!',

        'install' => 'Instal·lar',

        'user' => [
            'title' => 'Compte de l\'administrador',

            'name' => 'Nom',
            'email' => 'Adreça electrònica',
            'password' => 'Contrasenya',
            'password_confirm' => 'Confirmar contrasenya',
        ],

        'minecraft' => [
            'premium' => 'Iniciar sessió amb compte Microsoft (més segur, però requereix tindre Minecraft comprat)',
        ],

        'steam' => [
            'profile' => 'URL Perfil Steam',
            'profile_info' => 'Aquest usuari Steam serà l\'administrador en aquest lloc web.',

            'key' => 'Clau API Steam',
            'key_info' => 'Pots trobar la teva clau de l\'API de Steam a <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Gràcies per escollir Azuriom!',
        'success' => 'El teu lloc web s\'ha instal·lat correctament, ara pots utilitzar el teu lloc web i fer alguna cosa fantàstica!',
        'go' => 'Començar',
        'support' => 'Si aprecies Azuriom i la feina que oferim, no us oblideu de <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">donar-nos suport</a >.',
    ],
];
