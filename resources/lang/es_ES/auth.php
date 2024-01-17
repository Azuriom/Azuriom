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

    'failed' => 'Las credenciales no concuerdan con nuestros registros.',
    'throttle' => 'Demasiados intentos de inicio de sesión. Por favor inténtalo de nuevo en :seconds segundos.',

    'register' => 'Registro',
    'login' => 'Iniciar sesión',
    'logout' => 'Cerrar sesión',
    'verify' => 'Verifica tu correo electrónico',
    'passwords' => [
        'confirm' => 'Confirma tu contraseña',
        'reset' => 'Reinicio de contraseña',
        'send' => 'Enviar link de reinicio de contraseña',
    ],
    'fpc' => [
        'title' => 'Cambio de contraseña forzado',
        'line1' => 'Tu cuenta ha sido bloqueada temporalmente por razones de seguridad. Para desbloquearla, por favor cambia tu contraseña.',
        'line2' => 'Si necesita más información o tiene problemas para desbloquear su cuenta, póngase en contacto con el administrador del sitio.',
        'action' => 'Cambiar mi contraseña',
    ],
    'name' => 'Nombre de usuario',
    'email' => 'Correo electrónico',
    'password' => 'Contraseña',
    'confirm_password' => 'Confirmar contraseña',
    'current_password' => 'Contraseña actual',

    'conditions' => 'Acepto las <a href=":url" target="_blank">condiciones</a>.',

    '2fa' => [
        'code' => 'Código de autenticación de dos factores',
        'invalid' => 'Código inválido',
    ],

    'suspended' => 'Esta cuenta está suspendida.',

    'maintenance' => 'El sitio web está actualmente en mantenimiento.',

    'remember' => 'Recuerdame',
    'forgot_password' => '¿Olvidaste tu contraseña?',

    'verification' => [
        'sent' => 'Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.',
        'check' => 'Antes de proceder, por favor revisa tu correo electrónico para ver un enlace de verificación.',
        'request' => 'Si no recibiste el correo electrónico puedes solicitar otro.',
        'resend' => 'Reenviar correo',
    ],

    'confirmation' => 'Por favor, confirme su contraseña antes de continuar.',

    'mail' => [
        'reset' => [
            'subject' => 'Notificación de reinició de contraseña',
            'line1' => 'Usted está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.',
            'action' => 'Reiniciar contraseña',
            'line2' => 'Este enlace de restablecimiento de contraseña caducará en :count minutos.',
            'line3' => 'Si no solicitó un restablecimiento de contraseña, no se requiere ninguna acción adicional.',
        ],

        'verify' => [
            'subject' => 'Verificar correo electrónico',
            'line1' => 'Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.',
            'action' => 'Verificar correo electrónico',
            'line2' => 'Si no ha creado una cuenta, no se requiere ninguna acción adicional.',
        ],
    ],
];
