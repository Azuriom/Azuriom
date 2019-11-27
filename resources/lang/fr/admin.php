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
            'heading' => 'Paramètres',
            'settings' => [
                'settings' => 'Paramètres',
                'global' => 'Général',
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
        'description' => 'Êtes-vous sûr de vouloir supprimer cela ? Vous ne pourrez pas revenir en arrière !',
    ],

    'footer' => 'Propulsé par :azuriom &copy; :year. Panel par :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Panel administrateur',

        'https-warning' => 'Votre site n\'utilise pas le procotole https, il est recommandé de l\'activer et de le forcer pour améliorer la sécurité de votre site.',
        'recent-users' => 'Utilisateurs récents',
        'active-users' => 'Utilisateurs actifs',

        'users' => 'Utilisateurs',
        'posts' => 'Articles',
        'pages' => 'Pages',
        'images' => 'Images',
    ],

    'settings' => [
        'index' => [
            'title' => 'Paramètres généraux',

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
            'title' => 'Maintenance',

            'enable' => 'Activer la maintenance',
            'message' => 'Message de maintenance',
        ],

        'security' => [
            'title' => 'Paramètres de sécurité',

            'recaptcha' => 'Activer la protection par Google reCaptcha',
            'recaptcha-site-key' => 'Clé du site',
            'recaptcha-secret-key' => 'Clé secrète',
            'recaptcha-info' => '<small>Vous pouvez obtenir les clés Google reCaptcha sur la page de <a href="https://www.google.com/recaptcha/" target="_blank">Google reCaptcha</a>.</small> <small>Vous devez utiliser des clés reCaptcha <strong>v2 invisible</strong>.</small>',

            'hash' => 'Algorithme de hachage',
            'hash-info' => 'Argon2id est l\'algorithme le plus sûr mais il nécessite PHP 7.3 ou plus. Si vous utilisez PHP 7.2, vous devriez utiliser Argon2i.',
            'hash-error' => 'Cet algorithme.',
        ],

        'performances' => [
            'title' => 'Paramètres de performance',

            'cache' => [
                'title' => 'Vider le cache',
                'description' => 'Permet de vider le cache du site.',

                'status' => [
                    'cleared' => 'Le cache a bien été vidé.',
                    'clear-error' => 'Une erreur est survenue en vidant le cache.',
                ],

                'actions' => [
                    'clear' => 'Vider le cache',
                ],
            ],

            'boost' => [
                'title' => 'RocketBooster',
                'description' => 'RocketBooster permet d\'améliorer les performances de votre site en ajoutant un nouveau système de cache unique.',
                'info' => 'Si vous avez des problèmes après l\'installation d\'une extension vous pouvez recharger RocketBooster.',

                'current' => [
                    'status' => 'RocketBooster est actuellement :status.',
                    'enabled' => '<span class="text-success">activé</span>',
                    'disabled' => '<span class="text-danger">désactivé</span>',
                ],

                'status' => [
                    'enabled' => 'RocketBooster a été activé.',
                    'disabled' => 'RocketBooster a été désactivé.',
                    'reloaded' => 'RocketBooster a été rechargé.',

                    'enable-error' => 'Une erreur est survenue en activant RocketBooster.',
                    'disable-error' => 'Une erreur est survenue en désactivant RocketBooster.',
                ],

                'actions' => [
                    'enable' => 'Activer RocketBooster',
                    'disable' => 'Désactiver RocketBooster',
                    'reload' => 'Recharger RocketBooster',
                ],
            ],
        ],

        'seo' => [
            'title' => 'Paramètres SEO',

            'google-analytics' => 'Identifiant du site Google Analytics',
            'google-analytics-info' => 'Vous pouvez obtenir l\'identifiant du site sur la page de <a href="https://www.google.com/analytics/web/" target="_blank"> Google Analytics</a>.',
            'meta' => 'Mots-clés du site',
            'meta-info' => 'Les mots-clés doivent être séparés par une virgule.',
        ],

        'status' => [
            'updated' => 'Les paramètres ont été mis à jour.',
        ]
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Éditer l\'élément de la navbar #:id',
        'title-create' => 'Ajout d\'un élément dans la navbar',

        'status' => [
            'nav-updated' => 'Navigation mise à jour',

            'created' => 'Élément de la navbar créé.',
            'updated' => 'Élément de le navbar mis à jour.',
            'deleted' => 'Élément de la navbar supprimé.',
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

        'user-info' => 'Informations de l\'utilisateur',

        'ban-title' => 'Bannir :user',
        'ban-description' => 'Êtes-vous sûr de vouloir bannir cet utilisateur ?',

        'status' => [
            'created' => 'L\'utilisateur a été créé.',
            'updated' => 'L\'utilisateur a été mis à jour.',
            'deleted' => 'L\'utilisateur a été supprimé.',

            'email-verified' => 'L\'adresse E-Mail a été vérifiée',
            '2fa-disabled' => 'L\'authentification à deux facteurs a été désactivée',

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
            'power-updated' => 'Les grades ont été mis à jour.',

            'created' => 'Le grade a été créé.',
            'updated' => 'Le grade a été mis à jour.',
            'deleted' => 'Le grade a été supprimé.',
            'permanent-role' => 'Ce grade ne peut pas être supprimé.',
            'own-role' => 'Vous ne pouvez pas supprimer votre grade.',
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
            'created' => 'L\'article a été créé.',
            'updated' => 'L\'article a été mis à jour.',
            'deleted' => 'L\'article a été supprimé.',
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
            'created' => 'La page a été créée.',
            'updated' => 'La page a été mise à jour.',
            'deleted' => 'La page a été supprimée.',
        ]
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Édition de l\'image #:id',
        'title-create' => 'Upload une image',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Plugins installés',

        'actions' => [
            'reload' => 'Recharger les plugins',
        ],

        'status' => [
            'reloaded' => 'Les plugins ont été rechargés.',
            'enabled' => 'Le plugin a été activé.',
            'disabled' => 'Le plugin a été désactivé.',
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
            'no-config' => 'Ce thème n\'a pas de configuration.',
            'invalid' => 'Ce thème n\'est pas valide.',
            'updated' => 'Le thème a été mis à jour.',
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
            'cleared' => 'Les anciens logs ont été supprimés.',
        ],
    ],
];
