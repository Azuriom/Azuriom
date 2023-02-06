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
            'settings' => 'Paramètres',
            'global' => 'Général',
            'security' => 'Sécurité',
            'performances' => 'Performances',
            'seo' => 'SEO',
            'auth' => 'Authentification',
            'mail' => 'Mail',
            'maintenance' => 'Maintenance',
            'social' => 'Réseaux sociaux',
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

        'back' => 'Retour au site',
        'support' => 'Support',
        'documentation' => 'Documentation',
    ],

    'delete' => [
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

        'users' => 'Utilisateurs',
        'posts' => 'Articles',
        'pages' => 'Pages',
        'images' => 'Images',

        'update' => 'Une nouvelle version d\'Azuriom est disponible : :version',
        'http' => 'Votre site n\'utilise pas le protocole https, il est recommandé de l\'activer et de le forcer pour améliorer la sécurité de votre site.',
        'cloudflare' => 'Si vous utilisez Cloudflare, il est recommandé d\'installer le plugin Cloudflare Support.',
        'recent_users' => 'Utilisateurs récents',
        'active_users' => 'Utilisateurs actifs',
        'emails' => 'L\'envoi des mails est désactivé. Si un utilisateur oublie son mot de passe il ne pourra pas le réinitialiser. Vous pouvez activer les mails dans les <a href=":url">paramètres des mails</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Paramètres généraux',

            'name' => 'Nom du site',
            'url' => 'URL du site',
            'description' => 'Description du site',
            'meta' => 'Mots-clés du site',
            'meta_info' => 'Les mots-clés doivent être séparés par une virgule.',
            'favicon' => 'Icône du site',
            'background' => 'Arrière-plan',
            'logo' => 'Logo',
            'timezone' => 'Fuseau horaire',
            'locale' => 'Langue',
            'money' => 'Nom de la monnaie du site',
            'copyright' => 'Copyright',
            'user_money_transfer' => 'Activer le transfert de d\'argent entre les utilisateurs',
            'webhook' => 'URL du webhook Discord pour les articles',
            'webhook_info' => 'Un webhook Discord sera envoyé sur cette URL lors de la création d\'un nouvel article, si la date de publication n\'est pas dans le futur. Laisser vide pour désactiver.',
            'site_key' => 'Clé de site pour azuriom.com',
            'site_key_info' => 'La clé de site d\'azuriom.com est utilisée pour installer les extensions payantes achetées sur le market. Elle peut être obtenue dans votre <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">profil Azuriom</a>.',
        ],

        'security' => [
            'title' => 'Paramètres de sécurité',

            'captcha' => [
                'title' => 'Captcha (protection anti bot)',
                'site_key' => 'Clé du site',
                'secret_key' => 'Clé secrète',
                'recaptcha' => 'Vous pouvez obtenir les clés Google reCaptcha sur le site de <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Google reCaptcha</a>. Vous devez utiliser des clés reCaptcha <strong>v2 invisible</strong>.',
                'hcaptcha' => 'Vous pouvez obtenir les clés hCaptcha sur le site de <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer">hCaptcha</a>.',
                'turnstile' => 'Vous pouvez obtenir les clés Turnstile sur le <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">tableau de bord Cloudflare</a>. Vous devez sélectionner le widget "Géré".',
            ],

            'hash' => 'Algorithme de hachage',
            'hash_error' => 'Cet algorithme n\'est pas supporté par votre version de PHP.',
            'force_2fa' => 'Exiger l\'A2F pour l\'accès au panel admin',
        ],

        'performances' => [
            'title' => 'Paramètres de performance',

            'cache' => [
                'title' => 'Vider le cache',
                'clear' => 'Vider le cache',
                'description' => 'Permet de vider le cache du site.',
                'error' => 'Une erreur est survenue en vidant le cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost permet d\'améliorer les performances de votre site en ajoutant un nouveau système de cache unique.',
                'info' => 'Si vous avez des problèmes après l\'installation d\'une extension vous pouvez recharger AzBoost.',

                'enable' => 'Activer AzBoost',
                'disable' => 'Désactiver AzBoost',
                'reload' => 'Recharger AzBoost',

                'status' => 'AzBoost est actuellement :status.',
                'enabled' => 'activé',
                'disabled' => 'désactivé',

                'error' => 'Une erreur est survenue en activant AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Paramètres SEO',

            'html' => 'Vous pouvez inclure de l\'HTML dans le <code>&lt;head&gt;</code> ou <code>&lt;body&gt;</code> de toutes les pages (par ex. pour une bannière à cookies) en créant un fichier <code>head.blade.php</code> ou <code>body.blade.php</code> dans le dossier <code>resources/views/custom/</code>.',
            'home_message' => 'Message de la page d\'accueil',

            'welcome_alert' => [
                'enable' => 'Activer le popup de bienvenue ?',
                'message' => 'Message du popup de bienvenue',
                'info' => 'Ce popup sera affiché lors de la première visite d\'un utilisateur sur le site.',
            ],
        ],

        'auth' => [
            'title' => 'Authentification',

            'conditions' => 'Lien des CGU',
            'conditions_info' => 'Les utilisateurs devront accepter ces conditions lors de l\'inscription.',
            'registration' => 'Activer l\'inscription des utilisateurs',
            'registration_info' => 'Il sera toujours possible de s\'enregistrer par exemple avec des plugins.',
            'api' => 'Activer l\'API auth',
            'api_info' => 'Cette API vous permet d\'ajouter une authentification personnalisée à votre serveur de jeu. Pour les serveurs Minecraft utilisant un launcher vous pouvez utiliser <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> pour une intégration simple et rapide.',
            'user_change_name' => 'Permettre aux utilisateurs de changer leur pseudo depuis le profil.',
            'user_delete' => 'Permettre aux utilisateurs de supprimer leur compte depuis le profil',
        ],

        'mail' => [
            'title' => 'Paramètres Mail',
            'from' => 'Adresse Email utilisée pour envoyer les emails.',
            'mailer' => 'Type Mail',
            'mailer_info' => 'Azuriom supporte le SMTP et Sendmail pour l\'envoi des emails. Vous pouvez trouver plus d\'informations sur l\'envoi des mails dans notre <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentation</a>.',
            'disabled' => 'Lorsque l\'envoi des emails est désactivé, les utilisateurs ne pourront pas réinitialiser leur mot de passe en cas d\'oubli.',
            'sendmail' => 'Utiliser Sendmail n\'est pas recommandé et il est conseillé d\'utiliser à la place un serveur SMTP lorsque c\'est possible.',
            'smtp' => [
                'host' => 'Adresse de l\'hôte SMTP',
                'port' => 'Port de l\'hôte SMTP',
                'encryption' => 'Protocole de chiffrement',
                'username' => 'Utilisateur du serveur SMTP',
                'password' => 'Mot de passe du serveur SMTP',
            ],
            'verification' => 'Activer la vérification de l\'adresse email des utilisateurs',
            'send' => 'Envoyer un mail de test',
            'sent' => 'Le mail de test a bien été envoyé.',
            'missing' => 'Aucune adresse email n\'a été renseignée sur votre compte',
        ],

        'maintenance' => [
            'title' => 'Maintenance',

            'enable' => 'Activer la maintenance',
            'message' => 'Message de maintenance',
            'global' => 'Activer la maintenance sur tout le site',
            'paths' => 'URLs concernées par la maintenance',
            'info' => 'Vous pouvez utiliser <code>/*</code> pour bloquer toutes les URLs commençant par le même préfixe. Par exemple <code>/news/*</code> va bloquer l\'accès à tous les articles.',
        ],

        'updated' => 'Les paramètres ont été mis à jour.',
    ],

    'navbar_elements' => [
        'title' => 'Navbar',
        'edit' => 'Édition l\'élément de la navbar :element',
        'create' => 'Ajout d\'un élément dans la navbar',

        'restrict' => 'Restreindre la visibilité de cet élément à certain grades',
        'dropdown' => 'Vous pourrez ajouter des éléments une fois que l\'élément sera sauvegardé.',

        'fields' => [
            'home' => 'Page d\'accueil',
            'link' => 'Lien externe',
            'page' => 'Page',
            'post' => 'Article',
            'posts' => 'Liste des articles',
            'plugin' => 'Plugin',
            'dropdown' => 'Menu déroulant',
            'new_tab' => 'Ouvrir dans un nouvel onglet',
        ],

        'updated' => 'Navigation mise à jour',
        'not_empty' => 'Vous ne pouvez pas supprimer un menu déroulant contenant des éléments.',
    ],

    'social_links' => [
        'title' => 'Réseaux sociaux',
        'edit' => 'Édition du réseau social :link',
        'create' => 'Ajouter un réseau social',
    ],

    'servers' => [
        'title' => 'Serveurs',
        'edit' => 'Édition du serveur :server',
        'create' => 'Ajout d\'un serveur',

        'default' => 'Serveur par défaut',
        'default_info' => 'Le nombre de joueurs connectés du serveur par défaut sera affiché sur le site si le thème actuel le supporte.',

        'home_display' => 'Afficher ce serveur sur la page d\'accueil',
        'url' => 'URL du bouton pour rejoindre le serveur',
        'url_info' => 'Laisser vide pour afficher l\'adresse du serveur. Peut par exemple être un lien pour télécharger le jeu/launcher ou une URL pour rejoindre le serveur comme <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'La liaison par ping ne nécessite pas de plugin, mais cependant vous ne pouvez pas exécuter de commande avec cette liaison.',
        'query_info' => 'La liaison par query ne permet pas d\'exécuter de commandes sur le serveur.',

        'query_port_info' => 'Peut être vide si le port est le même que le port du serveur de jeu.',

        'verify' => 'Vérifier la connexion',

        'rcon_password' => 'Mot de passe Rcon',
        'rcon_port' => 'Port Rcon',
        'query_port' => 'Port Source Query',

        'azlink' => [
            'port' => 'Port AzLink',

            'link' => 'Pour lier votre serveur à votre site Web en utilisant AzLink vous devez:',
            'link1' => '<a href="https://azuriom.com/azlink">Télécharger le plugin AzLink</a> et l\'installer sur votre serveur.',
            'link2' => 'Redémarrer votre serveur.',
            'link3' => 'Exécuter cette commande sur votre serveur: ',

            'info' => 'Si vous avez des problèmes avec AzLink en utilisant Cloudflare ou un pare-feu, essayez de suivre les étapes indiquées dans la <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Vous pouvez lier votre serveur à votre site web avec la commande: ',
            'port_command' => 'Si vous utilisez un port AzLink différent que celui par défaut, vous devez le configurer avec la commande: ',
            'ping' => 'Activer les commandes instantanées (nécessite un port ouvert libre sur le serveur)',
            'ping_info' => 'Lorsque les commandes instantanées ne sont pas activées, les commandes seront exécutées avec un délai de 30 secondes à 1 minute.',
            'custom_port' => 'Utiliser un port AzLink personnalisé',

            'error' => 'La connexion au serveur a échoué, l\'adresse et/ou le port sont incorrects, ou le port est fermé.',
            'badresponse' => 'La connexion au serveur a échoué (code :code), le token est invalide ou le serveur est mal configuré. Vous pouvez refaire la commande de link pour y remédier.',
        ],

        'players' => ':count joueur|:count joueurs',
        'offline' => 'Hors-ligne',

        'connected' => 'La connexion au serveur a été effectuée avec succès !',
        'error' => 'La connexion au serveur a échouée: :error',

        'type' => [
            'mc-ping' => 'Minecraft Ping',
            'mc-rcon' => 'Minecraft RCON',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'RCON Source',
            'steam-azlink' => 'AzLink',
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
        'edit' => 'Édition de l\'utilisateur :user',
        'create' => 'Création d\'un utilisateur',

        'registered' => 'Inscrit le',
        'last_login' => 'Dernière connexion',
        'ip' => 'Adresse IP',

        'admin' => 'Admin',
        'banned' => 'Banni',
        'deleted' => 'Supprimé',

        'ban' => 'Bannir',
        'unban' => 'Débannir',
        'delete' => 'Supprimer',

        'alert-deleted' => 'Cet utilisateur a été supprimé, il ne peut pas être édité.',
        'alert-banned' => [
            'title' => 'Cet utilisateur est actuellement banni:',
            'banned-by' => 'Banni par: :author',
            'reason' => 'Raison: :reason',
            'date' => 'Date: :date',
        ],

        'edit_profile' => 'Éditer le profil',

        'info' => 'Informations de l\'utilisateur',

        'ban-title' => 'Bannir :user',
        'ban-description' => 'Êtes-vous sûr de vouloir bannir cet utilisateur ?',

        'email' => [
            'verify' => 'Vérifier l\'adresse email',
            'verified' => 'Adresse Email vérifiée',
            'date' => 'Oui, le :date',
            'verify_success' => 'L\'adresse Email a été vérifiée',
        ],

        '2fa' => [
            'title' => 'Authentification à deux facteurs',
            'disable' => 'Désactiver l\'A2F',
            'disabled' => 'L\'authentification à deux facteurs a été désactivée',
        ],

        'status' => [
            'banned' => 'Utilisateur banni',
            'unbanned' => 'Utilisateur débanni',
        ],

        'notify' => 'Envoyer une notification',
        'notify_info' => 'Envoyer une notification à cet utilisateur',
        'notify_all' => 'Envoyer une notification à tous les utilisateurs',
    ],

    'roles' => [
        'title' => 'Grades',
        'edit' => 'Édition du grade :role',
        'create' => 'Création d\'un grade',

        'default' => 'Grade par défaut',
        'admin' => 'Administrateur',
        'admin_info' => 'Lorsque le grade est administrateur, il a toutes les permissions.',

        'updated' => 'Les grades ont été mis à jour.',
        'unauthorized' => 'Ce grade est plus élevé que votre propre grade.',
        'add_admin' => 'Vous ne pouvez pas mettre la permission administrateur à un grade.',
        'remove_admin' => 'Vous ne pouvez pas retirer la permission admin de votre grade.',
        'delete_default' => 'Ce grade ne peut pas être supprimé.',
        'delete_own' => 'Vous ne pouvez pas supprimer votre grade.',
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

        'by' => 'Banni par',
        'reason' => 'Raison',
        'removed' => 'Supprimé le :date par :user',
    ],

    'posts' => [
        'title' => 'Articles',
        'edit' => 'Édition de l\'article :post',
        'create' => 'Création d\'un article',

        'published_info' => 'Cet article ne sera visible de façon publique qu\'à partir de cette date.',
        'pin' => 'Épingler cet article',
        'pinned' => 'Épinglé',
        'feed' => 'Un flux RSS/Atom pour les articles est disponible sur <code>:rss</code> et <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Pages',
        'edit' => 'Édition de la page :page',
        'create' => 'Création d\'une page',

        'enable' => 'Activer la page',
        'restrict' => 'Limiter les grades qui peuvent accéder à cette page',
    ],

    'redirects' => [
        'title' => 'Redirections',
        'edit' => 'Édition de la redirection :redirect',
        'create' => 'Création d\'une redirection',

        'enable' => 'Activer la redirection',
        'source' => 'Source',
        'destination' => 'Destination',
        'code' => 'Code HTTP',

        '301' => '301 - Redirection permanente',
        '302' => '302 - Redirection temporaire',
    ],

    'images' => [
        'title' => 'Images',
        'edit' => 'Édition de l\'image :image',
        'create' => 'Upload une image',
        'help' => 'Si les images ne s\'affichent pas, essayez de suivre les étapes indiquées dans la <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Acheter pour :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Plugins installés',
        'available' => 'Plugins disponibles',

        'requirements' => [
            'api' => 'La version de ce plugin n\'est pas compatible avec Azuriom v1.0',
            'azuriom' => 'Ce plugin n\'est pas compatible avec votre version d\'Azuriom.',
            'game' => 'Ce plugin n\'est pas compatible avec le jeu :game.',
            'plugin' => 'Le plugin ":plugin" est manquant ou sa version n\'est pas compatible avec ce plugin.',
        ],

        'reloaded' => 'Les plugins ont été rechargés.',
        'enabled' => 'Le plugin a été activé.',
        'disabled' => 'Le plugin a été désactivé.',
        'updated' => 'Le plugin a été mis à jour.',
        'installed' => 'Le plugin a été installé.',
        'deleted' => 'Le plugin a été supprimé.',
        'delete_enabled' => 'Le plugin doit être désactivé avant de pouvoir être supprimé.',
    ],

    'themes' => [
        'title' => 'Thèmes',

        'current' => 'Thème actuel',
        'author' => 'Auteur: :author',
        'version' => 'Version: :version',
        'list' => 'Thèmes installés',
        'available' => 'Thèmes disponibles',
        'no-enabled' => 'Vous n\'avez pas de thème activé, le thème par défaut est automatiquement mis en place.',
        'legacy' => 'La version de ce thème n\'est pas compatible avec Azuriom v1.0',

        'config' => 'Configurer',
        'disable' => 'Désactiver le thème',

        'reloaded' => 'Les thèmes ont été rechargés.',
        'no_config' => 'Ce thème n\'a pas de configuration.',
        'config_updated' => 'La configuration du thème a été mise à jour.',
        'invalid' => 'Ce thème n\'est pas valide (le nom du dossier du thème doit être l\'id du thème).',
        'updated' => 'Le thème a été mis à jour.',
        'installed' => 'Le thème a été installé.',
        'deleted' => 'Le thème a été supprimé.',
        'delete_current' => 'Vous ne pouvez pas supprimer le thème actif.',
    ],

    'update' => [
        'title' => 'Mise à jour',

        'has_update' => 'Mise à jour disponible',
        'no_update' => 'Pas de mise à jour disponible',
        'check' => 'Vérifier les mises à jour',

        'update' => 'La version <code>:last-version</code> d\'Azuriom est disponible et vous avez actuellement la version <code>:version</code>.',
        'changelog' => 'Les notes de mise à jour sont disponibles <a href=":url" target="_blank" rel="noopener noreferrer">ici</a>.',
        'download' => 'La dernière version d\'Azuriom est prête à être téléchargée.',
        'install' => 'La dernière version d\'Azuriom a été téléchargée et est prête à être installée.',

        'backup' => 'Avant de mettre à jour Azuriom, vous devriez faire une sauvegarde de votre site !',

        'latest_version' => 'Vous utilisez la dernière version d\'Azuriom: <code>:version</code>.',
        'latest' => 'Vous utilisez la dernière version d\'Azuriom.',

        'downloaded' => 'La dernière version d\'Azuriom a été téléchargée, vous pouvez maintenant l\'installer.',
        'installed' => 'La dernière version d\'Azuriom a été installée avec succès.',
    ],

    'logs' => [
        'title' => 'Logs',

        'clear' => 'Supprimer les anciens logs (+15 jours)',
        'cleared' => 'Les anciens logs ont été supprimés.',
        'changes' => 'Changements',
        'old' => 'Ancienne valeur',
        'new' => 'Nouvelle valeur',

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

        'redirects' => [
            'created' => 'Création de la redirection #:id',
            'updated' => 'Mise à jour de la redirection #:id',
            'deleted' => 'Suppression de la redirection #:id',
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

            'login' => 'Nouvelle connexion réussie depuis :ip (A2F: :2fa)',
            '2fa' => [
                'enabled' => 'Activation de l\'authentification à deux facteurs',
                'disabled' => 'Désactivation de l\'authentification à deux facteurs',
            ],
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
            'changed' => 'Changement de thème',
            'configured' => 'Configuration du thème',
        ],
    ],

    'errors' => [
        'back' => 'Retour',
        '404' => 'Page Non Trouvée',
        'info' => 'Il semblerait que vous ayez trouvé un bug dans la matrice...',
        '2fa' => 'Vous devez activer l\'authentification à deux facteurs pour avoir accès à cette page.',
    ],
];
