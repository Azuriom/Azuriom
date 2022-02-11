<?php

return [

    'lang' => 'Français',

    'date' => [
        'default' => 'j F Y',
        'full' => 'j F Y \à G:i',
        'compact' => 'd/m/Y \à G:i',
    ],

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
        'choose_file' => 'Choisir le fichier',
        'download' => 'Télécharger',
        'install' => 'Installer',
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
        'short_description' => 'Description courte',
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
        'value' => 'Valeur',
        'published_at' => 'Publié le',
        'permissions' => 'Permissions',
        'address' => 'Adresse',
        'port' => 'Port',
    ],

    'status' => [
        'success' => 'L\'action a été effectuée avec succès !',
        'error' => 'Une erreur est survenue: :error',
    ],

    'range' => [
        'days' => 'Par jours',
        'months' => 'Par mois',
    ],

    'loading' => 'Chargement...',

    'yes' => 'Oui',
    'no' => 'Non',
    'unknown' => 'Inconnu(e)',
    'autre' => 'Autre',
    'none' => 'Aucun(e)',
    'copied' => 'Copié',
    'fontawesome' => 'Vous pouvez avoir la liste des icônes disponibles sur <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank" rel="noopener noreferrer">FontAwesome</a>.',
    'copyright' => 'Propulsé par <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'home' => 'Accueil',
    'welcome' => 'Bienvenue sur :name',

    'maintenance' => [
        'title' => 'Maintenance',
        'message' => 'Le site est actuellement en maintenance.',
    ],

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
        'change_email' => 'Changer l\'adresse email',
        'change_password' => 'Changer le mot de passe',

        'email_verification' => 'Votre adresse mail n\'est pas vérifiée, veuillez vérifier que vous n\'ayez pas reçu un lien de vérification.',
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
            'manage' => 'Gérer l\'A2F',
            'info' => 'Scannez le QR code ci-dessus avec une application d\'authentification à deux facteurs sur votre téléphone comme Authy, 1Password, ou Google Authenticator.',
            'secret' => 'Clé secrète: :secret',
            'title' => 'Activation de l\'authentification à deux facteurs',
            'codes' => 'Afficher les codes de récupération',
            'code' => 'Code',
            'enabled' => 'L\'authentification à deux facteurs est activée. N\'oubliez pas de sauvegarder vos codes de récupération!',
            'disabled' => 'Authentification à deux facteurs désactivée.',
        ],

        'money_transfer' => [
            'title' => 'Transfert d\'argent',
            'self' => 'Vous ne pouvez pas vous envoyer d\'argent à vous même.',
            'balance' => 'Vous n\'avez pas assez d\'argent pour faire ce transfert.',
            'success' => 'L\'argent a été envoyé avec succès.',
            'notification' => ':user vous a envoyé :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Articles',
        'posted' => 'Posté le :date par :user',
        'unpublished' => 'Cet article n\'est pas encore publié.',
        'read' => 'Lire la suite',
    ],

    'comments' => [
        'create' => 'Laisser un commentaire',
        'guest' => 'Vous devez être connecté pour laisser un commentaire.',
        'author' => '<strong>:user</strong> a commenté le :date',
        'content' => 'Votre commentaire',
        'delete' => 'Supprimer ?',
        'delete_confirm' => 'Êtes-vous sûr de vouloir supprimer ce commentaire ?',
    ],

    'likes' => 'J\'aimes : :count',
];
