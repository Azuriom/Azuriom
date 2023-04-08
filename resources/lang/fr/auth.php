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
    'verify' => 'Vérifiez votre adresse email',
    'passwords' => [
        'confirm' => 'Confirmer le mot de passe',
        'reset' => 'Réinitialiser le mot de passe',
        'send' => 'Envoyer',
    ],

    'name' => 'Pseudo',
    'email' => 'Adresse Email ',
    'password' => 'Mot de passe',
    'confirm_password' => 'Confirmation du mot de passe',
    'current_password' => 'Mot de passe actuel',

    'conditions' => 'J\'accepte les <a href=":url" target="_blank">conditions</a>.',

    '2fa' => [
        'code' => 'Code d\'authentification à deux facteurs',
        'invalid' => 'Code invalide',
    ],

    'suspended' => 'Ce compte est actuellement banni.',

    'maintenance' => 'Le site est actuellement en maintenance.',

    'remember' => 'Se souvenir de moi',
    'forgot_password' => 'Mot de passe oublié ?',

    'verification' => [
        'sent' => 'Un nouveau lien de vérification a été envoyé à votre adresse email.',
        'check' => 'Avant de continuer, veuillez vérifier si vous n\'avez pas reçu de lien de vérification par email.',
        'request' => 'Si vous n\'avez pas reçu le mail vous pouvez en demander un autre.',
        'resend' => 'Renvoyer',
    ],

    'confirmation' => 'Merci de vérifier votre mot de passe avant de continuer.',

    'mail' => [
        'reset' => [
            'subject' => 'Notification de réinitialisation du mot de passe',
            'line1' => 'Vous recevez cet email parce que nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.',
            'action' => 'Réinitialiser le mot de passe',
            'line2' => 'Ce lien expirera dans :count minutes.',
            'line3' => 'Si vous n\'avez pas demandé une réinitialisation de mot de passe, vous pouvez ignorer cet email.',
        ],

        'verify' => [
            'subject' => 'Vérification de l\'adresse email',
            'line1' => 'Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email. Ce lien est valable pendant :count minutes.',
            'action' => 'Verifier l\'adresse email',
            'line2' => 'Si vous n\'avez pas créé de compte, vous pouvez ignorer cet email.',
        ],
    ],
];
