<?php

return [

    'lang' => 'Français',

    'copyright' => 'Propulsé par <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'date' => 'j F Y',
    'date-full' => 'j F Y \à G:i',
    'date-compact' => 'd/m/Y \à G:i',

    'nav' => [
        'toggle' => 'Afficher/Masquer la navbar',
        'profile' => 'Profil',
        'admin' => 'Panel administrateur',
    ],

    'actions' => [
        'add' => 'Ajouter',
        'show' => 'Voir',
        'create' => 'Créer',
        'close' => 'Fermer',
        'edit' => 'Éditer',
        'update' => 'Mettre à jour',
        'delete' => 'Supprimer',
        'save' => 'Sauvegarder',
        'continue' => 'Continuer',
        'browse' => 'Parcourir',
        'choose-file' => 'Choisir le fichier',
        'download' => 'Télécharger',
        'upload' => 'Uploader',
        'cancel' => 'Annuler',
        'enable' => 'Activer',
        'disable' => 'Désactiver',
        'copy' => 'Copier',
        'comment' => 'Commenter',
        'search' => 'Rechercher',
        'send' => 'Envoyer',
        'reload' => 'Recharger',
        'refresh' => 'Rafraîchir',
        'duplicate' => 'Dupliquer',
        'remove' => 'Retirer',
        'back' => 'Retour',
    ],

    'fields' => [
        'name' => 'Nom',
        'title' => 'Titre',
        'action' => 'Action',
        'date' => 'Date',
        'slug' => 'Lien',
        'link' => 'Lien',
        'enabled' => 'Activé',
        'author' => 'Auteur',
        'user' => 'Utilisateur',
        'image' => 'Image',
        'type' => 'Type',
        'file' => 'Fichier',
        'description' => 'Description',
        'short-description' => 'Description courte',
        'content' => 'Contenu',
        'role' => 'Rôle',
        'quantity' => 'Quantité',
        'money' => 'Argent',
        'color' => 'Couleur',
        'url' => 'URL',
        'status' => 'Statut',
        'category' => 'Catégorie',
        'version' => 'Version',
        'game' => 'Jeu',
        'price' => 'Prix',
        'icon' => 'Icône',
        'server' => 'Serveur',
    ],

    'range' => [
        'days' => 'Par jours',
        'months' => 'Par mois',
    ],

    'loading' => 'Chargement...',

    'yes' => 'Oui',
    'no' => 'Non',
    'unknown' => 'Inconnu(e)',
    'none' => 'Aucun(e)',
    'copied' => 'Copié',

    'home' => 'Accueil',
    'welcome' => 'Bienvenue sur :name',

    'maintenance' => 'Maintenance',
    'maintenance-message' => 'Le site est actuellement en maintenance.',

    'status-success' => 'L\'action a été effectuée avec succès !',
    'status-error' => 'Une erreur est survenue: :error',

    'theme' => [
        'light' => 'Thème clair',
        'dark' => 'Thème sombre',
    ],

    'captcha' => 'La vérification du captcha a échouée, merci de réessayer.',

    'notifications' => [
        'notifications' => 'Notifications',
        'read' => 'Marquer comme lues',
        'empty' => 'Vous n\'avez pas de notifications non lues.',
    ],

    'clipboard' => [
        'copied' => 'Copié !',
        'error' => 'CTRL + C pour copier',
    ],

    'server' => [
        'online' => ':count joueur en ligne|:count joueurs en ligne',
        'offline' => 'Le serveur est actuellement éteint.',
    ],

    'profile' => [
        'title' => 'Mon Profil',
        'change-email' => 'Changer l\'adresse email',
        'change-password' => 'Changer le mot de passe',
        'set-password-first' => 'Veuillez enregistrer un mot de passe avant de changer l\'addresse e-mail',

        'not-verified' => 'Votre adresse mail n\'est pas vérifiée, veuillez vérifier que vous n\'ayez pas reçu un lien de vérification.',

        'updated' => 'Votre profil a été mis à jour.',

        'info' => [
            'role' => 'Rôle: :role',
            'register' => 'Inscription: :date',
            'money' => 'Argent: :money',
            '2fa' => 'Authentification à deux facteurs (A2F): :2fa',
        ],

        '2fa' => [
            'enable' => 'Activer l\'A2F',
            'disable' => 'Désactiver l\'A2F',
            'info' => 'Scannez le QR code ci-dessus avec une application d\'authentification à deux facteurs sur votre téléphone comme Authy, 1Password, ou Google Authenticator.',
            'secret' => 'Clé secrète: :secret',
            'title' => 'Activation de l\'authentification à deux facteurs',
            'code' => 'Code',
            'enabled' => 'Authentification à deux facteurs activée.',
            'disabled' => 'Authentification à deux facteurs désactivée.',
        ],

        'email-not-verified' => 'Votre adresse email n\'est pas vérifiée, veuillez vérifier si vous avez reçu un lien de vérification. Si vous ne l\'avez pas reçu, vous pouvez le renvoyer.',

        'money-transfer' => [
            'title' => 'Transfert d\'argent',
            'self' => 'Vous ne pouvez pas vous envoyer d\'argent à vous même.',
            'not-enough' => 'Vous n\'avez pas assez d\'argent pour faire ce transfert.',
            'success' => 'L\'argent a été envoyé avec succès.',
            'notification' => ':user vous a envoyé :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Articles',
        'posted' => 'Posté le :date par :user',
        'not-published' => 'Cet article n\'est pas encore publié.',
        'read' => 'Lire la suite',
    ],

    'comments' => [
        'create' => 'Laisser un commentaire',
        'guest' => 'Vous devez être connecté pour laisser un commentaire.',
        'author' => '<strong>:user</strong> a commenté le :date',
        'your-comment' => 'Votre commentaire',
        'delete-title' => 'Supprimer ?',
        'delete-description' => 'Êtes-vous sûr de vouloir supprimer ce commentaire ?',
    ],

    'likes' => 'J\'aimes : :count',
];
