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
                'mail' => 'Mail',
                'maintenance' => 'Maintenance',
            ],
            'navbar' => 'Navigation',
            'servers' => 'Serveurs',
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
            'update' => 'Mises à jour',
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Profil',
        ],

        'back-website' => 'Retour au site',

        'support' => 'Support',
        'documentation' => 'Documentation'
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
            'background' => 'Background',
            'logo' => 'Logo',
            'timezone' => 'Fuseau horaire',
            'locale' => 'Langue',
            'copyright' => 'Copyright',
            'conditions-url' => 'Liens des CGU',
            'enable-user-registration' => 'Activer l\'inscription des utilisateurs',
            'enable-user-registration-label' => 'Il sera toujours possible de s\'enregistrer via des plugins par exemple.',
            'auth-api' => 'Activer l\'API auth',
            'auth-api-label' => 'Cette API vous permet d\'ajouter une authentification personnalisée à votre serveur de jeu. Pour les serveurs Minecraft utilisant un launcher vous pouvez utiliser <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener">AzAuth</a> pour une intégration simple et rapide.',
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
            'hash-error' => 'Cet algorithme n\'est pas supporté par votre version de PHP.',
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

        'mail' => [
            'title' => 'Paramètres Mail',

            'from-address' => 'Adresse E-Mail utilisée pour envoyer les e-mails.',
            'encryption' => 'Protocol de chiffrement Mail',
            'driver' => 'Type Mail',
            'driver-info' => 'Azuriom supporte le SMTP et Sendmail pour l\'envoie des e-mails. Vous pouvez trouver plus d\'informations sur l\'envoie des mails dans notre <a href="https://azuriom.com/docs" target="_blank" rel="noopener">documentation</a>.',
            'host' => 'Adresse de l\'hôte SMTP',
            'port' => 'Port de l\'hôte SMTP',
            'username' => 'Utilisateur du serveur SMTP',
            'password' => 'Mot de passe du serveur SMTP',

            'sendmail-path' => 'Chemin système vers Sendmail',
            'sendmail-path-info' => 'Le chemin système vers Sendmail sur votre serveur. Il est recommandé de modifier cette valeur que si nécessaire.',
        ],

        'status' => [
            'updated' => 'Les paramètres ont été mis à jour.',
        ]
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Édition l\'élément de la navbar :element',
        'title-create' => 'Ajout d\'un élément dans la navbar',

        'dropdown-info' => 'Vous pourrez ajouter des élements une fois que l\'élément sera sauvegardé.',

        'fields' => [
            'home' => 'Page d\'accueil',
            'link' => 'Lien externe',
            'page' => 'Page',
            'post' => 'Article',
            'posts' => 'Liste des articles',
            'plugin' => 'Plugin',
            'dropdown' => 'Menu déroulant',
            'new-tab' => 'Ouvrir dans un nouvel onglet',
        ],

        'status' => [
            'nav-updated' => 'Navigation mise à jour',

            'created' => 'Élément de la navbar créé.',
            'updated' => 'Élément de le navbar mis à jour.',
            'deleted' => 'Élément de la navbar supprimé.',
        ]
    ],

    'servers' => [
        'title' => 'Serveurs',
        'title-edit' => 'Édition du serveur :server',
        'title-create' => 'Ajout d\'un serveur',

        'ping-no-commands' => 'La liaison par ping ne nécessite pas de plugin, mais cependant vous ne pouvez pas exécuter de commande avec cette liaison.',

        'fields' => [
            'address' => 'Adresse',
            'port' => 'Port',
            'status' => 'Status',

            'rcon-password' => 'Mot de passe Rcon',
            'rcon-port' => 'Port Rcon',

            'azlink-port' => 'Port AzLink',
        ],

        'actions' => [
            'verify-connection' => 'Vérifier la connexion',
        ],

        'azlink' => [
            'link' => 'Pour lier votre serveur Minecraft à votre site Web en utilisant AzLink vous devez:',
            'link-1' => '<a href="https://azuriom.com/azlink">Télécharger le plugin AzLink</a> et l\'installer sur votre serveur.',
            'link-2' => 'Redémarrer votre serveur.',
            'link-3' => 'Exécuter cette commande sur votre serveur: ',

            'link-info' => 'Vous pouvez lier votre serveur Minecraft à votre site web avec la commande: ',
            'port-info' => 'Si vous utilisez un port AzLink différent que celui par défaut, vous devez le configurer avec la commande: ',

            'custom-port' => 'Utiliser un port AzLink personnalisé',
        ],

        'players' => ':count joueur|:count joueurs',
        'offline' => 'Hors-ligne',

        'status' => [
            'created' => 'Le serveur a été ajouté.',
            'updated' => 'Le serveur a été mis à jour.',
            'deleted' => 'Le serveur a été supprimé.',

            'connect-success' => 'La connexion au serveur a été éffectuée avec succès !',
            'connect-error' => 'La connexion au serveur a échouée: :error',

            'not-azlink' => 'Ce serveur n\'est pas connecté via AzLink.',
            'azlink-connect' => 'La connexion au serveur a échouée, l\'ip et/ou le port sont incorrects, ou le port est fermé.',
            'azlink-badresponse' => 'La connexion au serveur a échouée (code :code), le token est invalide ou le serveur est mal configuré. Vous pouvez refaire la commande de link pour y remédier.',
        ],

        'type' => [
            'mc-ping' => 'Ping',
            'mc-rcon' => 'Rcon',
            'mc-azlink' => 'AzLink',
        ]
    ],

    'users' => [
        'title' => 'Utilisateurs',
        'title-edit' => 'Edition de l\'utilisateur :user',
        'title-create' => 'Création d\'un utilisateur',

        'fields' => [
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
            'unban' => 'Débannir',
            'delete' => 'Supprimer',
            'verify-email' => 'Vérifier l\'addresse E-Mail',
            'disable-2fa' => 'Désactiver l\'A2F',
        ],

        'alert-deleted' => 'Cet utilisateur a été supprimé, il ne peut pas être édité.',
        'alert-banned' => [
            'title' => 'Cet utilisateur est actuellement banni:',
            'banned-by' => 'Banni par: :author',
            'reason' => 'Raison: :reason',
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
        'title-edit' => 'Édition du grade :role',
        'title-create' => 'Création d\'un grade',

        'permissions' => 'Permissions',
        'perm-admin' => [
            'label' => 'Administrateur',
            'info' => 'Lorsque le grade est administrateur, il a toutes les permissions.',
        ],

        'info' => [
            'default' => 'Grade par défaut',
            'admin' => 'Grade Administrateur',
        ],

        'status' => [
            'power-updated' => 'Les grades ont été mis à jour.',
            'created' => 'Le grade a été créé.',
            'updated' => 'Le grade a été mis à jour.',
            'deleted' => 'Le grade a été supprimé.',

            'add-admin' => 'Vous ne pouvez pas mettre la permission administrateur à un grade.',
            'remove-admin' => 'Vous ne pouvez pas retirer la permission admin de votre grade.',
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
        'title-edit' => 'Édition de l\'article :post',
        'title-create' => 'Création d\'un article',

        'published-info' => 'Cet article sera visible de facon publique qu\'à partir de cette date.',

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
        'title-edit' => 'Édition de la page :page',
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
        'title-edit' => 'Édition de l\'image :image',
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
            'title' => 'Thème actuel',
            'author' => 'Auteur: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Thèmes installés',
        'no-enabled' => 'Vous n\'avez pas de thème activé, le thème par defaut est automatiquement mis en place.',

        'actions' => [
            'edit-config' => 'Configurer',
            'disable' => 'Désactiver le thème',
        ],

        'status' => [
            'no-config' => 'Ce thème n\'a pas de configuration.',
            'config-updated' => 'La configuration du thème a été mise à jour..',
            'invalid' => 'Ce thème n\'est pas valide.',
            'updated' => 'Le thème a été mis à jour.',
        ]
    ],

    'update' => [
        'title' => 'Mise à jour',

        'subtitle-update' => 'Mise à jour disponible',
        'subtitle-no-update' => 'Pas de mise à jour disponible',

        'update' => 'La version <code>:last-version</code> d\'Azuriom est disponible et vous avez actuellement la version <code>:version</code>.',
        'download' => 'La dernière version d\'Azuriom est prête à être téléchargée.',
        'install' => 'La dernière version d\'Azuriom a été téléchargée et est prête à être installée.',

        'backup-info' => 'Avant de mettre à jour Azuriom, vous devriez faire une sauvegarde de votre site !',

        'up-to-date' => 'Vous utilisez la dernière version d\'Azuriom: <code>:version</code>.',

        'status' => [
            'download-success' => 'La dernière version d\'Azuriom a été téléchargée, vous pouvez maintenant l\'installer.',
            'install-success' => 'La dernière version d\'Azuriom a été installée avec succès.',

            'up-to-date' => 'Vous utilisez la dernière version d\'Azuriom.',
            'error-fetch' => 'Une erreur s\'est produite lors de la vérification de la mise à jour: :error',
            'error-download' => 'Une erreur s\'est produite lors du téléchargement de la mise à jour: :error',
            'error-install' => 'Une erreur s\'est produite lors de l\'installation de la mise à jour: :error',
        ],

        'actions' => [
            'check' => 'Vérifier les mises à jour',
            'install' => 'Installer',
            'download' => 'Télécharger',
        ],
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
