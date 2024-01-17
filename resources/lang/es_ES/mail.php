<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the mail library to build
    | the mails layout.
    |
    */

    'hello' => '¡Hola!',
    'whoops' => '¡Whoops!',

    'regards' => 'Saludos,',

    'link' => "Si tienes problemas para hacer clic en el \":actionText\" copie y pegue la siguiente URL en su navegador web: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Todos los derechos reservados.',

    'test' => [
        'subject' => 'Correo de prueba de :name',
        'content' => 'Si puedes visualizar éste e-mail, significa que tu configuración para envío de correo electrónico desde :name ha funcionado',
    ],

    'delete' => [
        'subject' => 'Solicitud de eliminación de la cuenta',
        'line1' => 'Está recibiendo este correo electrónico porque hemos recibido una solicitud de eliminación de su cuenta.',
        'action' => 'Eliminar mi cuenta',
        'line2' => 'Esta acción no se puede deshacer. Esto eliminará permanentemente tu cuenta y los datos asociados. Este enlace expirará en :count minutes.',
        'line3' => 'Si no ha solicitado la eliminación de su cuenta, asegúrese de revisar su configuración de seguridad.',
    ],
];
