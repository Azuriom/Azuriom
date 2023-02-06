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
        'back' => 'Retour',
        'browse' => 'Parcourir',
        'cancel' => 'Annuler',
        'choose_file' => 'Choisir le fichier',
        'close' => 'Fermer',
        'comment' => 'Commenter',
        'continue' => 'Continuer',
        'copy' => 'Copier',
        'create' => 'Créer',
        'delete' => 'Supprimer',
        'disable' => 'Désactiver',
        'download' => 'Télécharger',
        'duplicate' => 'Dupliquer',
        'edit' => 'Éditer',
        'enable' => 'Activer',
        'generate' => 'Générer',
        'install' => 'Installer',
        'refresh' => 'Rafraîchir',
        'reload' => 'Recharger',
        'remove' => 'Retirer',
        'save' => 'Sauvegarder',
        'search' => 'Rechercher',
        'send' => 'Envoyer',
        'show' => 'Voir',
        'update' => 'Mettre à jour',
        'upload' => 'Uploader',
    ],

    'fields' => [
        'action' => 'Action',
        'address' => 'Adresse',
        'author' => 'Auteur',
        'category' => 'Catégorie',
        'color' => 'Couleur',
        'content' => 'Contenu',
        'date' => 'Date',
        'description' => 'Description',
        'enabled' => 'Activé',
        'file' => 'Fichier',
        'game' => 'Jeu',
        'icon' => 'Icône',
        'image' => 'Image',
        'link' => 'Lien',
        'money' => 'Argent',
        'name' => 'Nom',
        'permissions' => 'Permissions',
        'port' => 'Port',
        'price' => 'Prix',
        'published_at' => 'Publié le',
        'quantity' => 'Quantité',
        'role' => 'Grade',
        'server' => 'Serveur',
        'short_description' => 'Description courte',
        'slug' => 'Lien',
        'status' => 'Statut',
        'title' => 'Titre',
        'type' => 'Type',
        'url' => 'URL',
        'user' => 'Utilisateur',
        'value' => 'Valeur',
        'version' => 'Version',
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
    'other' => 'Autre',
    'none' => 'Aucun(e)',
    'copied' => 'Copié',
    'icons' => 'Vous pouvez avoir la liste des icônes disponibles sur <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.',

    'home' => 'Accueil',
    'servers' => 'Serveurs',
    'news' => 'Nouveautés',
    'welcome' => 'Bienvenue sur :name',
    'copyright' => 'Propulsé par <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

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
        'level' => 'Niveau',
        'info' => 'Information',
        'warning' => 'Avertissement',
        'danger' => 'Danger',
        'success' => 'Succès',
    ],

    'clipboard' => [
        'copied' => 'Copié !',
        'error' => 'CTRL + C pour copier',
    ],

    'server' => [
        'join' => 'Rejoindre',
        'total' => ':count/:max connecté|:count/:max connectés',
        'online' => ':count joueur en ligne|:count joueurs en ligne',
        'offline' => 'Le serveur est actuellement éteint.',
    ],

    'profile' => [
        'title' => 'Mon Profil',
        'change_email' => 'Changer l\'adresse email',
        'change_password' => 'Changer le mot de passe',
        'change_name' => 'Changer le pseudo',

        'delete' => [
            'btn' => 'Supprimer mon compte',
            'title' => 'Suppression du compte',
            'info' => 'Cela supprimera votre compte et l\'ensemble des données associées. Cette action est définitive et il n\'est pas possible de revenir en arrière.',
            'email' => 'Nous vous enverrons un e-mail pour confirmer cette opération.',
            'sent' => 'Un lien de confirmation a été envoyé à votre adresse email.',
            'success' => 'Votre compte a bien été supprimé!',
        ],

        'email_verification' => 'Votre adresse mail n\'est pas vérifiée, veuillez vérifier que vous n\'ayez pas reçu un lien de vérification.',
        'updated' => 'Votre profil a été mis à jour.',

        'info' => [
            'role' => 'Grade: :role',
            'register' => 'Inscription: :date',
            'money' => 'Argent: :money',
            '2fa' => 'Authentification à deux facteurs (A2F): :2fa',
        ],

        '2fa' => [
            'enable' => 'Activer l\'A2F',
            'disable' => 'Désactiver l\'A2F',
            'manage' => 'Gérer l\'A2F',
            'info' => 'Scannez le QR code ci-dessus avec une application d\'authentification à deux facteurs sur votre téléphone comme <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a>, ou Google Authenticator.',
            'secret' => 'Clé secrète: :secret',
            'title' => 'Authentification à deux facteurs',
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

    'markdown' => [
        'init' => 'Joignez des images par glisser-déposer ou depuis le presse-papier.',
        'drag' => 'Déposez pour télécharger.',
        'drop' => 'Téléchargement de #images_names#...',
        'progress' => 'Téléchargement de #file_name# : #progress#%',
        'uploaded' => 'Téléchargement de #image_name# terminé.',

        'size' => 'L\'image #image_name# est trop lourde (#image_size#).\nLa taille maximum est #image_max_size#.',
        'error' => 'Une erreur est survenue lors du téléchargement de l\'image #image_name#.',
    ],
];
