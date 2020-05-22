<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Ces identifiants ne correspondent pas à nos données.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',

    'register' => 'Inscription',
    'login' => 'Connexion',
    'logout' => 'Déconnexion',
    'verify' => 'Vérifiez votre adresse e-mail',
    'passwords' => [
        'confirm' => 'Confirmer le mot de passe',
        'reset' => 'Réinitialiser le mot de passe',
        'send' => 'Envoyer',
    ],

    'name' => 'Pseudo',
    'email' => 'Adresse E-Mail ',
    'password' => 'Mot de passe',
    'confirm-password' => 'Confirmation du mot de passe',
    'current-password' => 'Mot de passe actuel',

    'conditions' => 'J\'accepte les <a href=":url" target="_blank">conditions</a>.',

    '2fa-code' => 'Code d\'authentification à deux facteurs',
    '2fa-invalid' => 'Code invalide',

    'suspended' => 'Ce compte est actuellement banni.',
    'maintenance' => 'Le site est actuellement en maintenance.',

    'remember-me' => 'Se souvenir de moi',
    'forgot-password' => 'Mot de passe oublié ?',

    'verify-sent' => 'Un nouveau lien de vérification a été envoyé à votre adresse e-mail.',
    'verify-check' => 'Avant de continuer, veuillez vérifier si vous n\'avez pas reçu de lien de vérification par e-mail.',
    'verify-request' => 'Si vous n\'avez pas reçu le mail vous pouvez en demander un autre.',
    'verify-resend' => 'Renvoyer',

    'need-confirm' => 'Merci de vérifier votre mot de passe avant de continuer.',

    'mail' => [
        'reset' => [
            'subject' => 'Notification de réinitialisation du mot de passe',
            'line-1' => 'Vous recevez cet email parce que nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.',
            'action' => 'Réinitialiser le mot de passe',
            'line-2' => 'Ce lien expirera dans :count minutes.',
            'line-3' => 'Si vous n\'avez pas demandé une réinitialisation de mot de passe, vous pouvez ignorer cet email.',
        ],

        'verify' => [
            'subject' => 'Vérification de l\'adresse email',
            'line-1' => 'Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.',
            'action' => 'Verifier l\'adresse email',
            'line-2' => 'Si vous n\'avez pas créé de compte, vous pouvez ignorer cet email.',
        ],
    ],
];
