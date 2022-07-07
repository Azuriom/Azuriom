<?php

return [
    'title' => 'Installation',

    'welcome' => 'Azuriom est un CMS de jeux <strong>dernière génération</strong>, <strong>gratuit et open-source</strong>, qui a pour objectif d\'être une alternative <strong>moderne, fiable, rapide et sécurisée</strong> par rapport aux CMS existants afin de vous proposer <strong>la meilleure expérience web</strong> possible pour votre serveur.',

    'back' => 'Retour',

    'requirements' => [
        'php' => 'PHP :version ou plus récent',
        'writable' => 'Droits en écriture',
        'rewrite' => 'Réécriture d\'URL activée',
        'extension' => 'Extension :extension',
        'function' => 'Fonction :function activée',
        '64bit' => 'PHP 64-bit',

        'refresh' => 'Revérifier',
        'success' => 'Azuriom est prêt a être configuré !',
        'missing' => 'Votre serveur n\'a pas les pré-requis nécessaires pour installer Azuriom.',

        'help' => [
            'writable' => 'Vous pouvez essayer de faire cette commande pour autoriser l\'écriture : <code>:command</code>.',
            'rewrite' => 'Vous pouvez suivre les instructions dans <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">notre documentation</a> pour activer la réécriture d\'URL.',
            'htaccess' => 'Le fichier <code>.htaccess</code> or <code>public/.htaccess</code> est manquant. Assurez vous d\'avoir activé les fichiers cachés et que le fichier est bien présent.',
            'extension' => 'Vous pouvez essayer de faire cette commande pour installer les extensions PHP manquantes : <code>:command</code><br>Une fois fait, redémarrez Apache ou Nginx.',
            'function' => 'Vous devez activer cette fonction dans le fichier php.ini de PHP en modifiant la valeur de <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Base de données',

        'type' => 'Type',
        'host' => 'Adresse',
        'port' => 'Port',
        'database' => 'Base de données',
        'user' => 'Utilisateur',
        'password' => 'Mot de passe',

        'warn' => 'Ce type de base de données n\'est pas recommandé et ne devrait être utilisé que lorsqu\'il n\'est pas possible de faire autrement.',
    ],

    'game' => [
        'title' => 'Jeu',

        'locale' => 'Langue',

        'warn' => 'Attention, une fois l\'installation terminée, il ne sera pas possible de changer sans réinstaller entièrement Azuriom !',

        'install' => 'Installer',

        'user' => [
            'title' => 'Compte admin',

            'name' => 'Pseudo',
            'email' => 'Adresse E-Mail',
            'password' => 'Mot de passe',
            'password_confirm' => 'Confirmation du mot de passe',
        ],

        'minecraft' => [
            'premium' => 'Utiliser la connexion avec un compte Microsoft (plus sécurisé mais nécessite d\'avoir acheté Minecraft)',
        ],

        'steam' => [
            'profile' => 'URL du profil Steam',
            'profile_info' => 'Ce compte Steam sera admin sur le site.',

            'key' => 'Clé d\'API Steam',
            'key_info' => 'Vous pouvez obtenir votre clé d\'API Steam sur <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Merci d\'avoir choisi Azuriom !',
        'success' => 'Votre site web a été installé avec succès, vous pouvez maintenant utiliser votre site web et en faire quelque chose de génial !',
        'go' => 'Commencer',
        'support' => 'Si vous appréciez Azuriom et le travail que nous fournissons, vous pouvez <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">nous soutenir</a>.',
    ],
];
