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
        'dashboard' => 'Tableau de bord',
        'settings' => [
            'heading' => 'Configuration',
            'settings' => [
                'settings' => 'Configuration',
                'global' => 'Générale',
                'security' => 'Sécurité',
                'performances' => 'Performances',
                'seo' => 'SEO',
                'maintenance' => 'Maintenance',
            ],
            'navbar' => 'Navigation',
        ],

        'users' => [
            'heading' => 'Utilisateurs',
            'users' => 'Utilisateurs',
            'roles' => 'Grades',
            'bans' => 'Bannissements',
        ],

        'content' => [
            'heading' => 'Contenu',
            'pages' => 'Pages',
            'posts' => 'Articles',
            'images' => 'Images',
        ],

        'extensions' => [
            'heading' => 'Extensions',
            'plugins' => 'Plugins',
            'themes' => 'Thèmes',
        ],

        'other' => [
            'heading' => 'Autres',
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],
    ],

    'notifications' => [
        'notifications' => 'Notifications',
        'mark-as-read' => 'Marquer comme lues',
    ],

    'confirm-delete' => [
        'title' => 'Supprimer ?',
        'description' => 'Vous êtes sûr de vouloir supprimer cela ? Vous ne pourrez pas revenir en arrière !',
    ],

    'footer' => 'Propulsé par :azuriom &copy; :year. Panel par :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'https-warning' => 'Votre site web n\'utilise pas le procotole https, il est recommandé de l\'activer et le forcer pour votre sécurité et celle des utilisateurs.',
        'recent-users' => 'Utilisateurs récents',
        'active-users' => 'Utilisateurs actifs',

        'users' => 'Utilisateurs',
        'posts' => 'Articles',
        'pages' => 'Pages',
        'images' => 'Images',
    ],

    'settings' => [
        'index' => [
            'site-name' => 'Nom du site',
            'site-url' => 'URL du site',
            'site-description' => 'Description du site',
            'favicon' => 'Favicon',
            'logo' => 'Logo',
            'timezone' => 'Fuseau horaire',
            'locale' => 'Langue',
            'copyright' => 'Copyright',
            'conditions-url' => 'Liens des CGU',
            'enable-user-registration' => 'Activer l\'inscription des utilisateurs',
            'enable-user-registration-label' => 'Il sera toujours possible de s\'enregistrer via des plugins par exemple.',
        ],
        'maintenance' => [
            'enable' => 'Activer la maintenance',
            'message' => 'Message de maintenance',
        ],
        'security' => [
            'recaptcha' => 'Activer la protection par Google reCaptcha',
            'recaptcha-site-key' => 'Clé du site',
            'recaptcha-secret-key' => 'Clé secrète',
            'recaptcha-info' => '<small>Vous pouvez obtenir les clés Google reCaptcha sur la page de <a href="https://www.google.com/recaptcha/" target="_blank">Google reCaptcha</a>.</small> <small>Vous devez utiliser des clés reCaptcha <strong>v2 invisible</strong>.</small>',
            'hash' => 'Algorithme de hachage',
            'hash-info' => 'Argon2id est l\'algorithme le plus sûr mais il nécessite PHP 7.3 ou plus. Si vous utilisez PHP 7.2, vous devriez utiliser Argon2i.',
        ],
        'performances' => [
            'cache' => [
                'name' => 'Gestion de la mémoire cache',
                'description' => 'Vider la mémoire cache du site Web permet de faire gagner des performances à votre site.',
                'clear' => 'Vider le cache',
                'error' => 'Une erreur est survenue lors du vidage de la mémoire cache',
                'success' => 'Mémoire cache vidée avec succès',
            ],

            'rocketbooster' => [
                'name' => 'RocketBooster',
                'description' => 'RocketBooster améliore les performances de votre site Web en ajoutant un cache exclusive supplémentaire.',
                'warn' => 'Si vous avez des problèmes après avoir activé une extension, vous devriez recharger le cache.',
                'enable' => 'Activer RocketBooster',
                'disable' => 'Désactiver RocketBooster',
                'reload' => 'Recharger RocketBooster',
                'status' => [
                    'title' => 'RocketBooster est actuellement',
                    'enabled' => 'activé',
                    'disabled' => 'désactivé',
                    'error' => [
                        'enabled' => 'Une erreur est survenue lors de l\'activation de RocketBooster',
                        'disabled' => 'Une erreur est survenue lors de la désactivation de RocketBooster',
                    ],
                    'success' => [
                        'enabled' => 'RocketBooster activé',
                        'disabled' => 'RocketBooster désactivé',
                        'reloaded' => 'RocketBooster rechargé',
                    ]
                ]
            ]
        ],
        'seo' => [
            'google-analytics' => 'Identifiant du site Google Analytics',
            'google-analytics-info' => 'Vous pouvez obtenir l\'identifiant du site sur la page de <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics</a>.',
            'meta' => 'Mots-clés du site',
            'meta-info' => 'Les mots-clés doivent être séparés par une virgule.',
        ],

        'status' => [
            'updated' => 'Paramètres mis à jour.',
        ]
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Éditer l\'élément de la navbar #:id',
        'title-create' => 'Ajout d\'un élément dans la navbar',

        'status' => [
            'nav-updated' => 'Navigation mise à jour',

            'created' => 'Élément de la navbar créé',
            'updated' => 'Élément de le navbar mis à jour',
            'deleted' => 'Élément de la navbar supprimer',
        ]
    ],

    'users' => [
        'fields' => [
            'name' => 'Nom d\'utilisateur',
            'email' => 'Adresse E-Mail',
            'role' => 'Grade',
            'password' => 'Mot de passe',
            'register-date' => 'Inscrit le',
            'email-verified' => 'Adresse E-Mail vérifiée',
            '2fa' => 'Authentification à deux facteurs',
            'ip' => 'Adresse IP',
        ],

        'info' => [
            'admin' => 'Admin',
            'banned' => 'Banni',
            'deleted' => 'Supprimé',
        ],

        'actions' => [
            'ban' => 'Bannir',
            'delete' => 'Supprimer',
            'verify-email' => 'Vérifier l\'addresse E-Mail',
            'disable-2fa' => 'Désactiver l\'A2F',
        ],

        'alert-deleted' => 'Cet utilisateur a été supprimé, il ne peut pas être édité.',
        'alert-banned' => [
            'title' => 'Cet utilisateur est actuellement banni:',
            'banned-by' => 'Banni par: :author',
            'reason' => 'Raison',
            'date' => 'Date: :date',
        ],

        'edit-profile' => 'Éditer le profil',

        'user-info' => 'Informations sur l\'utilisateur',

        'status' => [
            'created' => 'Utilisateur créé',
            'updated' => 'Utilisateur mis à jour',
            'deleted' => 'Utilisateur supprimé',

            'email-verified' => 'Adresse E-Mail vérifiée',
            '2fa-disabled' => 'Authentification à deux facteurs désactivée',

            'banned' => 'Utilisateur banni',
            'unbanned' => 'Utilisateur débanni',
        ],
    ],

    'roles' => [
        'title' => 'Grades',
        'title-edit' => 'Édition du grade #:id',
        'title-create' => 'Création d\'un grade',

        'permissions' => 'Permissions',
        'perm-admin' => [
            'label' => 'Administrateur',
            'info' => 'Lorsque le grade est administrateur, il a toutes les permissions.',
        ],

        'info' => [
            'default' => 'Grade par défaut',
            'permanent' => 'Grade Permanent',
            'admin' => 'Grade Administrateur',
        ],

        'status' => [
            'created' => 'Grade créé',
            'updated' => 'Grade mis à jour',
            'deleted' => 'Grade supprimé',
            'permanent-role' => 'Ce grade ne peut pas être supprimé',
            'own-role' => 'Vous ne pouvez pas supprimer votre grade',
        ]
    ],

    'bans' => [
        'title' => 'Bannissements',

        'fields' => [
            'banned-by' => 'Banni par',
            'reason' => 'Raison',
        ],

        'removed' => 'Supprimé le :date par :user',
    ],

    'posts' => [
        'title' => 'Articles',
        'title-edit' => 'Édition de l\'article #:id',
        'title-create' => 'Création d\'un article',

        'fields' => [
            'published-at' => 'Publié le',
        ],

        'pin' => 'Épingler cet article',

        'status' => [
            'created' => 'Article créé',
            'updated' => 'Article mis à jour',
            'deleted' => 'Article supprimé',
        ],

        'info' => [
            'pinned' => 'Épinglé',
        ]
    ],

    'pages' => [
        'title' => 'Pages',
        'title-edit' => 'Édition de la page #:id',
        'title-create' => 'Création d\'une page',

        'enable' => 'Activer la page',

        'status' => [
            'created' => 'Page créée',
            'updated' => 'Page mise à jour',
            'deleted' => 'Page supprimée',
        ]
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Édition de l\'image #:id',
        'title-create' => 'Upload une image',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Plugin installé',

        'actions' => [
            'reload' => 'Recharger les plugins',
        ],

        'status' => [
            'reloaded' => 'Plugins rechargés',
            'enabled' => 'Plugin activé',
            'disabled' => 'Plugin désactivé',
        ]
    ],

    'themes' => [
        'title' => 'Thèmes',

        'current' => [
            'title' => 'Thèmes actuel',
            'author' => 'Auteur: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Thèmes installé',
        'no-enabled' => 'Vous n\'avez pas de thème activé, le thème par defaut est automatiquement mis en place.',

        'actions' => [
            'edit-config' => 'Configurer',
            'disable' => 'Désactiver le thème',
        ],

        'status' => [
            'no-config' => 'Ce thème n\'a pas de configuration',
            'invalid' => 'Thème invalide',
            'updated' => 'Thème mis à jour',
        ]
    ],

    'logs' => [
        'title' => 'Logs',

        'fields' => [
            'target' => 'Cible',
        ],

        'actions' => [
            'clear' => 'Supprimer les anciens logs (+15 jours)',
        ],

        'status' => [
            'cleared' => 'Les anciens logs ont été supprimés',
        ],
    ],
];
