<?php

return [

    'lang' => 'Français',

    'copyright' => 'Propulsé par <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'date' => 'j F Y',
    'date-full' => 'j F Y \à G:i',
    'date-compact' => 'd/m/Y \à G:i',

    'nav' => [
        'profile' => 'Profil',
        'admin' => 'Panel administrateur',
    ],

    'actions' => [
        'add' => 'Ajouter',
        'show' => 'Voir',
        'create' => 'Créer',
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
        'money' => 'Argent',
        'color' => 'Couleur',
        'url' => 'URL',
        'status' => 'Status',
        'version' => 'Version',
        'game' => 'Jeu',
    ],

    'yes' => 'Oui',
    'no' => 'Non',
    'unknown' => 'Inconnu(e)',
    'none' => 'Aucun(e)',

    'copied' => 'Copié',

    'home' => 'Accueil',

    'maintenance' => 'Maintenance',
    'maintenance-message' => 'Le site est actuellement en maintenance.',

    'status-error' => 'Une erreur est survenue: :error',

    'catpcha-failed' => 'La vérification du captcha a échouée, merci de réessayer.',

    'profile' => [
        'title' => 'Mon Profil',
        'change-email' => 'Changer l\'adresse e-mail',
        'change-password' => 'Changer le mot de passe',

        'not-verified' => 'Votre adresse mail n\'est pas vérifiée, veuillez vérifier que vous n\'ayez pas reçu un lien de vérification.',

        'updated' => 'Votre profil a été mis à jour.',

        'info' => [
            'role' => 'Rôle: :role',
            'register' => 'Création du compte: :date',
            '2fa' => 'Authentification à deux facteurs (A2F): :2fa',
        ],

        '2fa' => [
            'enable' => 'Activer l\'A2F',
            'disable' => 'Désactiver l\'A2F',
            'info' => 'Scannez le QR code ci-dessus avec une application d\'authentification à deux facteurs sur votre téléphone comme Google Authenticator.',
            'secret' => 'Clé secrète: :secret',
            'title' => 'Activer l\'A2F',
            'code' => 'Code',
            'enabled' => 'Authentification à deux facteurs activée.',
            'disabled' => 'Authentification à deux facteurs désactivée.',
        ],

        'email-not-verified' => 'Votre adresse e-mail n\'est pas vérifiée, veuillez vérifier si vous avez reçu un lien de vérification. Si vous ne l\'avez pas reçu, vous pouvez le renvoyer.',

        'suspended' => 'Ce compte est actuellement banni.',
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
        'author' => '<strong>:user</strong> à commenté le :date',
        'your-comment' => 'Votre commentaire',
        'delete-title' => 'Supprimer ?',
        'delete-description' => 'Êtes-vous sûr de vouloir supprimer ce commentaire ?',
    ],

    'likes' => 'J\'aimes : :count',
];
