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

    'hello' => 'Olá!',
    'whoops' => 'Ooppss!',

    'regards' => 'Att,',

    'link' => "Se você estiver tendo problemas para clicar no botão \":actionText\", copie e cole o URL abaixo em seu navegador da Web: [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Todos os direitos reservados.',

    'test' => [
        'subject' => 'Email de teste em :name',
        'content' => 'Se você consegue ver este email, isso significa que o envio de emails de :name está funcionando!',
    ],

    'delete' => [
        'subject' => 'Solicitação de exclusão de conta',
        'line1' => 'Você está recebendo este email porque recebemos um pedido de exclusão da sua conta.',
        'action' => 'Excluir minha conta',
        'line2' => 'Esta ação não pode ser desfeita. Isto irá apagar permanentemente a sua conta e os dados associados. Este link irá expirar em :count minutos.',
        'line3' => 'Se você não solicitou a exclusão da sua conta, certifique-se de rever suas configurações de segurança.',
    ],
];
