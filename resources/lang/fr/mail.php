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

    'hello' => 'Bonjour !',
    'whoops' => 'Oups !',

    'regards' => 'Cordialement,',

    'link' => "Si vous avez des difficultés à cliquer sur le bouton \":actionText\", copiez-collez l'URL ci-dessous dans votre navigateur web : [:displayableActionUrl](:actionURL)",

    'copyright' => '&copy; :year :name. Tous droits réservés.',

    'test' => [
        'subject' => 'Mail de test sur :name',
        'content' => 'Comme vous voyez ce mail, cela veut dire que l\'envoie des mails sur :name fonctionne !',
    ],

    'delete' => [
        'subject' => 'Demande de suppression de compte',
        'line1' => 'Vous recevez cet email parce que nous avons reçu une demande de suppression de votre compte.',
        'action' => 'Supprimer mon compte',
        'line2' => 'Cette action est définitive et il n\'est pas possible de revenir en arrière. Cela supprimera votre compte et l\'ensemble des données associées. Ce lien expirera dans :count minutes.',
        'line3' => 'Si vous n\'avez pas demandé la suppression de votre compte, veuillez vérifier vos paramètres de sécurité.',
    ],
];
