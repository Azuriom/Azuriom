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
            'redirects' => 'Redirections',
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
        'documentation' => 'Documentation',
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

        'new-update' => 'Une nouvelle version d\'Azuriom est disponible : :version',
        'https-warning' => 'Votre site n\'utilise pas le protocole https, il est recommandé de l\'activer et de le forcer pour améliorer la sécurité de votre site.',
        'proxy-warning' => 'Si vous utilisez Cloudflare, il est recommandé d\'installer le plugin Cloudflare Support.',
        'recent-users' => 'Utilisateurs récents',
        'active-users' => 'Utilisateurs actifs',
        'emails-disabled' => 'L\'envoie des mails est désactivés. Si un utilisateur oublie son mot de passe il ne pourra pas le réinitialiser. Vous pouvez activer les mails dans les <a href=":url">paramètres des mails</a>.',
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
            'meta' => 'Mots-clés du site',
            'meta-info' => 'Les mots-clés doivent être séparés par une virgule.',
            'favicon' => 'Favicon',
            'background' => 'Background',
            'logo' => 'Logo',
            'timezone' => 'Fuseau horaire',
            'locale' => 'Langue',
            'copyright' => 'Copyright',
            'money' => 'Nom de la monnaie du site',
            'user-money-transfer' => 'Activer le transfert de d\'argent entre les utilisateurs',
            'site-key' => 'Clé de site pour azuriom.com',
            'site-key-label' => 'La clé de site d\'azuriom.com est utilisée pour installer les extensions payantes achetées sur le market. Elle peut être obtenue dans votre <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">profil Azuriom</a>.',
        ],

        'security' => [
            'title' => 'Paramètres de sécurité',

            'captcha' => [
                'title' => 'Captcha (protection anti bot)',
                'site-key' => 'Clé du site',
                'secret-key' => 'Clé secrète',
                'recaptcha' => 'Vous pouvez obtenir les clés Google reCaptcha sur la site de <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCaptcha</a>. Vous devez utiliser des clés reCaptcha <strong>v2 invisible</strong>.',
                'hcaptcha' => 'Vous pouvez obtenir les clés hCaptcha sur la site de <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">hCaptcha</a>.',
            ],

            'hash' => 'Algorithme de hachage',
            'hash-info' => 'Argon2id est l\'algorithme le plus sécurisé mais il nécessite PHP 7.3 ou plus. Si vous utilisez PHP 7.2, vous devriez utiliser Argon2i.',
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
                'title' => 'AzBoost',
                'description' => 'AzBoost permet d\'améliorer les performances de votre site en ajoutant un nouveau système de cache unique.',
                'info' => 'Si vous avez des problèmes après l\'installation d\'une extension vous pouvez recharger AzBoost.',

                'current' => [
                    'status' => 'AzBoost est actuellement :status.',
                    'enabled' => '<span class="text-success">activé</span>',
                    'disabled' => '<span class="text-danger">désactivé</span>',
                ],

                'status' => [
                    'enabled' => 'AzBoost a été activé.',
                    'disabled' => 'AzBoost a été désactivé.',
                    'reloaded' => 'AzBoost a été rechargé.',

                    'enable-error' => 'Une erreur est survenue en activant AzBoost.',
                ],

                'actions' => [
                    'enable' => 'Activer AzBoost',
                    'disable' => 'Désactiver AzBoost',
                    'reload' => 'Recharger AzBoost',
                ],
            ],
        ],

        'seo' => [
            'title' => 'Paramètres SEO',

            'html-head-code' => 'Code HTML à inclure dans le <head> de toutes les pages.',
            'html-body-code' => 'Code HTML à inclure dans le <body> de toutes les pages.',

            'html-code-info' => 'Exemple: Bannière cookies, Google Analytics, etc',

            'welcome-popup' => [
                'enable' => 'Activer le popup de bienvenue ?',
                'message' => 'Message du popup de bienvenue',
                'info' => 'Ce popup sera affiché lors de la première visite d\'un utilisateur sur le site.',
            ],
        ],

        'auth' => [
            'title' => 'Authentification',

            'conditions-url' => 'Lien des CGU',
            'conditions-info' => 'Les utilisateurs devront accepter ces conditions lors de l\'inscription.',
            'enable-user-registration' => 'Activer l\'inscription des utilisateurs',
            'enable-user-registration-label' => 'Il sera toujours possible de s\'enregistrer par exemple avec des plugins.',
            'auth-api' => 'Activer l\'API auth',
            'auth-api-label' => 'Cette API vous permet d\'ajouter une authentification personnalisée à votre serveur de jeu. Pour les serveurs Minecraft utilisant un launcher vous pouvez utiliser <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> pour une intégration simple et rapide.',
            'minecraft-verification' => 'Activer la vérification des pseudos Minecraft avec minecraft.net',
        ],

        'mail' => [
            'title' => 'Paramètres Mail',
            'from-address' => 'Adresse Email utilisée pour envoyer les emails.',
            'driver' => 'Type Mail',
            'driver-info' => 'Azuriom supporte le SMTP et Sendmail pour l\'envoi des emails. Vous pouvez trouver plus d\'informations sur l\'envoi des mails dans notre <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentation</a>.',
            'disabled-warn' => 'Lorsque l\'envoi des emails est désactivé, les utilisateurs ne pourront pas réinitialiser leur mot de passe en cas d\'oubli.',
            'sendmail-warn' => 'Utiliser Sendmail n\'est pas recommandé et il est conseillé d\'utiliser à la place un serveur SMTP lorsque c\'est possible.',
            'smtp' => [
                'host' => 'Adresse de l\'hôte SMTP',
                'port' => 'Port de l\'hôte SMTP',
                'encryption' => 'Protocole de chiffrement',
                'username' => 'Utilisateur du serveur SMTP',
                'password' => 'Mot de passe du serveur SMTP',
            ],
            'enable-users-verification' => 'Activer la vérification de l\'adresse email des utilisateurs',
            'send' => 'Envoyer un mail de test',
            'sent' => 'Le mail de test a bien été envoyé.',
        ],

        'maintenance' => [
            'title' => 'Maintenance',

            'enable' => 'Activer la maintenance',
            'message' => 'Message de maintenance',
        ],

        'status' => [
            'updated' => 'Les paramètres ont été mis à jour.',
        ],
    ],

    'navbar-elements' => [
        'title' => 'Navbar',
        'title-edit' => 'Édition l\'élément de la navbar :element',
        'title-create' => 'Ajout d\'un élément dans la navbar',

        'restrict' => 'Restreindre la visibilité de cet élément à certain grades',
        'dropdown-info' => 'Vous pourrez ajouter des éléments une fois que l\'élément sera sauvegardé.',

        'fields' => [
            'home' => 'Page d\'accueil',
            'link' => 'Lien externe',
            'page' => 'Page',
            'post' => 'Article',
            'posts' => 'Liste des articles',
            'plugin' => 'Plugin',
            'dropdown' => 'Menu déroulant',
            'new-tab' => 'Ouvrir dans un nouvel onglet',
            'roles' => 'Grades',
        ],

        'status' => [
            'nav-updated' => 'Navigation mise à jour',

            'created' => 'Élément de la navbar créé.',
            'updated' => 'Élément de le navbar mis à jour.',
            'deleted' => 'Élément de la navbar supprimé.',

            'not-empty' => 'Vous ne pouvez pas supprimer un menu déroulant contenant des éléments.',
        ],
    ],

    'servers' => [
        'title' => 'Serveurs',
        'title-edit' => 'Édition du serveur :server',
        'title-create' => 'Ajout d\'un serveur',

        'default' => 'Serveur par défaut',
        'default-info' => 'Le nombre de joueurs connectés du serveur par défaut sera affiché sur le site si le thème actuel le supporte.',

        'ping-no-commands' => 'La liaison par ping ne nécessite pas de plugin, mais cependant vous ne pouvez pas exécuter de commande avec cette liaison.',
        'query-no-commands' => 'La liaison par query ne permet pas d\'exécuter de commandes sur le serveur.',

        'query-port-info' => 'Peut être vide si le port est le même que le port du serveur de jeu.',

        'fields' => [
            'address' => 'Adresse',
            'port' => 'Port',

            'rcon-password' => 'Mot de passe Rcon',
            'rcon-port' => 'Port Rcon',
            'query-port' => 'Port Source Query',

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

            'enable-ping' => 'Activer les commandes instantanées (nécessite un port ouvert libre sur le serveur)',
            'ping-info' => 'Lorsque les commandes instantanées ne sont pas activées, les commandes seront exécutées avec un délai de 30 secondes à 1 minute.',
            'custom-port' => 'Utiliser un port AzLink personnalisé',
        ],

        'players' => ':count joueur|:count joueurs',
        'offline' => 'Hors-ligne',

        'status' => [
            'created' => 'Le serveur a été ajouté.',
            'updated' => 'Le serveur a été mis à jour.',
            'deleted' => 'Le serveur a été supprimé.',

            'connect-success' => 'La connexion au serveur a été effectuée avec succès !',
            'connect-error' => 'La connexion au serveur a échouée: :error',

            'not-azlink' => 'Ce serveur n\'est pas connecté via AzLink.',
            'azlink-connect' => 'La connexion au serveur a échoué, l\'adresse et/ou le port sont incorrects, ou le port est fermé.',
            'azlink-badresponse' => 'La connexion au serveur a échoué (code :code), le token est invalide ou le serveur est mal configuré. Vous pouvez refaire la commande de link pour y remédier.',
        ],

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'RCON Source',
            'bedrock-ping' => 'Ping Bedrock',
            'bedrock-rcon' => 'RCON Bedrock',
            'fivem-status' => 'Statut FiveM',
            'fivem-rcon' => 'RCON FiveM',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Serveur Flyff',
        ],
    ],

    'users' => [
        'title' => 'Utilisateurs',
        'title-edit' => 'Édition de l\'utilisateur :user',
        'title-create' => 'Création d\'un utilisateur',

        'fields' => [
            'register-date' => 'Inscrit le',
            'email-verified' => 'Adresse Email vérifiée',
            'last-login' => 'Dernière connexion',
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
            'verify-email' => 'Vérifier l\'adresse email',
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

            'email-verified' => 'L\'adresse Email a été vérifiée',
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

            'unauthorized' => 'Ce grade est plus élevé que votre propre grade.',
            'add-admin' => 'Vous ne pouvez pas mettre la permission administrateur à un grade.',
            'remove-admin' => 'Vous ne pouvez pas retirer la permission admin de votre grade.',
            'permanent-role' => 'Ce grade ne peut pas être supprimé.',
            'own-role' => 'Vous ne pouvez pas supprimer votre grade.',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Commenter un article',
        'delete-other-comments' => 'Supprimer un commentaire d\'un autre utilisateur',
        'maintenance-access' => 'Accéder au site pendant une maintenance',
        'admin-access' => 'Accéder au panel administrateur',
        'admin-logs' => 'Voir et gérer les logs du site',
        'admin-images' => 'Voir et gérer les images',
        'admin-navbar' => 'Voir et gérer la navbar',
        'admin-pages' => 'Voir et gérer les pages',
        'admin-redirects' => 'Voir et gérer les redirections',
        'admin-posts' => 'Voir et gérer les articles',
        'admin-settings' => 'Voir et gérer les paramètres',
        'admin-users' => 'Voir et gérer les utilisateurs',
        'admin-themes' => 'Voir et gérer les thèmes',
        'admin-plugins' => 'Voir et gérer les plugins',
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

        'published-info' => 'Cet article ne sera visible de façon publique qu\'à partir de cette date.',

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
        ],
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
        ],
    ],

    'redirects' => [
        'title' => 'Redirections',
        'title-edit' => 'Édition de la redirection :redirect',
        'title-create' => 'Création d\'une redirection',

        'enable' => 'Activer la redirection',
        'source' => 'Source',
        'destination' => 'Destination',
        'code' => 'Code HTTP',

        '301' => '301 - Redirection permanente',
        '302' => '302 - Redirection temporaire',

        'status' => [
            'created' => 'La redirection a été créée.',
            'updated' => 'La redirection a été mise à jour.',
            'deleted' => 'La redirection a été supprimée.',
        ],
    ],

    'images' => [
        'title' => 'Images',
        'title-edit' => 'Édition de l\'image :image',
        'title-create' => 'Upload une image',

        'status' => [
            'created' => 'L\'image a été créée.',
            'updated' => 'L\'image a été mise à jour.',
            'deleted' => 'L\'image a été supprimée.',
        ],
    ],

    'extensions' => [
        'buy' => 'Acheter pour :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'installed' => 'Plugins installés',
        'available' => 'Plugins disponibles',

        'azuriom-requirement' => 'Ce plugin n\'est pas compatible avec votre version d\'Azuriom.',
        'game-requirement' => 'Ce plugin n\'est pas compatible avec le jeu :game.',
        'plugin-requirement' => 'Le plugin ":plugin" est manquant ou sa version n\'est pas compatible avec ce plugin.',

        'status' => [
            'reloaded' => 'Les plugins ont été rechargés.',
            'enabled' => 'Le plugin a été activé.',
            'disabled' => 'Le plugin a été désactivé.',
            'updated' => 'Le plugin a été mis à jour.',
            'installed' => 'Le plugin a été installé.',
            'deleted' => 'Le plugin a été supprimé.',

            'error-delete' => 'Le plugin doit être désactivé avant de pouvoir être supprimé.',
        ],
    ],

    'themes' => [
        'title' => 'Thèmes',

        'current' => [
            'title' => 'Thème actuel',
            'author' => 'Auteur: :author',
            'version' => 'Version: :version',
        ],
        'installed' => 'Thèmes installés',
        'available' => 'Thèmes disponibles',
        'no-enabled' => 'Vous n\'avez pas de thème activé, le thème par défaut est automatiquement mis en place.',

        'actions' => [
            'edit-config' => 'Configurer',
            'disable' => 'Désactiver le thème',
        ],

        'status' => [
            'reloaded' => 'Les thèmes ont été rechargés.',
            'no-config' => 'Ce thème n\'a pas de configuration.',
            'config-updated' => 'La configuration du thème a été mise à jour.',
            'invalid' => 'Ce thème n\'est pas valide (le nom du dossier du thème doit être l\'id du thème).',
            'updated' => 'Le thème a été mis à jour.',
            'installed' => 'Le thème a été installé.',
            'deleted' => 'Le thème a été supprimé.',

            'error-delete' => 'Vous ne pouvez pas supprimer le thème actif.',
        ],
    ],

    'update' => [
        'title' => 'Mise à jour',

        'subtitle-update' => 'Mise à jour disponible',
        'subtitle-no-update' => 'Pas de mise à jour disponible',

        'update' => 'La version <code>:last-version</code> d\'Azuriom est disponible et vous avez actuellement la version <code>:version</code>.',
        'changelog' => 'Les notes de mise à jour sont disponibles <a href=":url" target="_blank" rel="noopener noreferrer">ici</a>.',
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

        'actions' => [
            'clear' => 'Supprimer les anciens logs (+15 jours)',
        ],

        'status' => [
            'cleared' => 'Les anciens logs ont été supprimés.',
        ],

        'pages' => [
            'created' => 'Création de la page #:id',
            'updated' => 'Mise à jour de la page #:id',
            'deleted' => 'Suppression de la page #:id',
        ],

        'posts' => [
            'created' => 'Création de l\'article #:id',
            'updated' => 'Mise à jour de l\'article #:id',
            'deleted' => 'Suppression de l\'article #:id',
        ],

        'images' => [
            'created' => 'Création de l\'image #:id',
            'updated' => 'Mise à jour de l\'image #:id',
            'deleted' => 'Suppression de l\'image #:id',
        ],

        'roles' => [
            'created' => 'Création du grade #:id',
            'updated' => 'Mise à jour du grade #:id',
            'deleted' => 'Suppression du grade #:id',
        ],

        'servers' => [
            'created' => 'Création du serveur #:id',
            'updated' => 'Mise à jour du serveur #:id',
            'deleted' => 'Suppression du serveur #:id',
        ],

        'users' => [
            'updated' => 'Mise à jour de l\'utilisateur #:id',
            'deleted' => 'Suppression de l\'utilisateur #:id',
            'transfer' => 'Envoi d\'argent de :money à l\'utilisateur #:id',
        ],

        'settings' => [
            'updated' => 'Mise à jour des paramètres',
        ],

        'updates' => [
            'installed' => 'Installation d\'une mise à jour d\'Azuriom',
        ],

        'plugins' => [
            'enabled' => 'Activation de plugin',
            'disabled' => 'Désactivation de plugin',
        ],

        'themes' => [
            'changed' => 'Changement de theme',
        ],
    ],

    'errors' => [
        'back' => 'Retour',
        '404' => 'Page Non Trouvée',
        'info' => 'Il semblerait que vous avez trouvé un bug dans la matrice...',
    ],

    'translations' => [
        'add' => 'Ajouter une traduction',
    ],
];
