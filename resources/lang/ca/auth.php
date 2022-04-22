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

    'failed' => 'Aquestes credencials no es corresponen a les que tenim registrades.',
    'throttle' => 'Massa intents d\'inici de sessió. Si us plau, prova-ho en :seconds segons.',

    'register' => 'Registrar-se',
    'login' => 'Iniciar sessió',
    'logout' => 'Tanca sessió',
    'verify' => 'Verifiqueu el vostra correu electrònic',
    'passwords' => [
        'confirm' => 'Confirma la contrasenya',
        'reset' => 'Restablir Contrasenya',
        'send' => 'Envia l\'enllaç per reinicialitzar la contrasenya',
    ],

    'name' => 'Nom d\'usuari',
    'email' => 'Correu electrònic',
    'password' => 'Contrasenya',
    'confirm_password' => 'Confirmar contrasenya',
    'current_password' => 'Contrasenya actual',

    'conditions' => 'Accepto les <a href=":url" target="_blank">condicions</a>.',

    '2fa' => [
        'code' => 'Codi de dos factors',
        'invalid' => 'Codi no vàlid',
    ],

    'suspended' => 'Aquest compte està suspès.',

    'maintenance' => 'El lloc web està sota manteniment.',

    'remember' => 'Recordar-me',
    'forgot_password' => 'Has oblidat la teva contrasenya?',

    'verification' => [
        'sent' => 'S\'ha enviat un nou enllaç de verificació a la vostra adreça electrònica.',
        'check' => 'Abans de continuar, si us plau, confirma la teva adreça electrònica amb l\'enllaç de verificació que t\'hem enviat.',
        'request' => 'Si no hsa rebut un e-mail, pots demanar un altre.',
        'resend' => 'Reenviar correu electrònic',
    ],

    'confirmation' => 'Si us plau, confirma la teva contrasenya abans de continuar.',

    'mail' => [
        'reset' => [
            'subject' => 'Notificació de restabliment de contrasenya',
            'line1' => 'Heu rebut aquest correu electrònic perquè s\'ha sol·licitat el restabliment de la contrasenya per al vostre compte.',
            'action' => 'Restablir contrasenya',
            'line2' => 'Aquest enllaç de restabliment de contrasenya caducarà en :count minuts.',
            'line3' => 'Si no heu demanat restablir la contrasenya, no cal que prengueu cap acció.',
        ],

        'verify' => [
            'subject' => 'Verifiqueu l\'adreça de correu electrònic',
            'line1' => 'Si us plau, feu clic al botó inferior per verificar la vostra adreça electrònica.',
            'action' => 'Verifiqueu l\'adreça de correu electrònic',
            'line2' => 'Si no heu creat cap compte, no es requereix cap acció adicional.',
        ],
    ],
];
