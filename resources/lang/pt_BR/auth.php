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

    'failed' => 'As credenciais não batem com nossos registros.',
    'throttle' => 'Muitas tentativas de login. Por favor, tente novamente em :seconds segundos.',

    'register' => 'Registrar',
    'login' => 'Login',
    'logout' => 'Sair',
    'verify' => 'Verifique seu endereço de e-mail',
    'passwords' => [
        'confirm' => 'Confirme sua senha',
        'reset' => 'Resete seu senha',
        'send' => 'Enviar link para redefinição de senha',
    ],
    'fpc' => [
        'title' => 'Forçar alteração de senha',
        'line1' => 'Sua conta foi temporariamente bloqueada por motivos de segurança. Para desbloqueá-la, por favor, altere sua senha.',
        'line2' => 'Se você precisar de mais informações ou tiver problemas para desbloquear sua conta, entre em contato com o administrador do site.',
        'action' => 'Alterar minha senha',
    ],
    'name' => 'Usuário',
    'email' => 'Endereço de E-mail',
    'password' => 'Senha',
    'confirm_password' => 'Confirmar senha',
    'current_password' => 'Senha atual',

    'conditions' => 'Eu aceito as <a href=":url" target="_blank">condições</a>.',

    '2fa' => [
        'code' => 'Código de Autenticação de Dois Fatores',
        'invalid' => 'Código inválido',
    ],

    'suspended' => 'Essa conta foi suspensa.',

    'maintenance' => 'O site está em manutenção.',

    'remember' => 'Lembrar de mim',
    'forgot_password' => 'Esqueceu sua senha?',

    'verification' => [
        'sent' => 'Um link de verificação foi enviado para o seu endereço de e-mail.',
        'check' => 'Antes de prosseguir, verifique seu e-mail para um link de verificação.',
        'request' => 'Se você não recebeu o e-mail, pode solicitar outro.',
        'resend' => 'Reenviar email',
    ],

    'confirmation' => 'Por favor, confirme sua senha antes de continuar.',

    'mail' => [
        'reset' => [
            'subject' => 'Notificação de senha alterada',
            'line1' => 'Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.',
            'action' => 'Redefinir a senha',
            'line2' => 'Este link de redefinição de senha expirará em :count minutos.',
            'line3' => 'Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.',
        ],

        'verify' => [
            'subject' => 'Verificar endereço de e-mail',
            'line1' => 'Por favor, clique no botão abaixo para verificar seu endereço de e-mail.',
            'action' => 'Verificar endereço de e-mail',
            'line2' => 'Se você não criou uma conta, nenhuma ação adicional é necessária.',
        ],
    ],
];
