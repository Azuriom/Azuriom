<?php

return [

    'lang' => 'Anglès',

    'date' => [
        'default' => 'F j, Y',
        'full' => 'F j, Y \a\t g:i A',
        'compact' => 'm/d/Y \a\t g:i A',
    ],

    'nav' => [
        'toggle' => 'Alternar navegació',
        'profile' => 'Perfil',
        'admin' => 'Tauler d\'administració',
    ],

    'actions' => [
        'add' => 'Afegir',
        'show' => 'Mostrar',
        'create' => 'Crear',
        'close' => 'Tancar',
        'edit' => 'Editar',
        'update' => 'Actualitzar',
        'delete' => 'Esborrar',
        'save' => 'Guardar',
        'continue' => 'Continuar',
        'browse' => 'Navegar',
        'choose_file' => 'Sel·leccionar fitxer',
        'download' => 'Baixar',
        'install' => 'Instal·lar',
        'upload' => 'Pujar',
        'cancel' => 'Cancel·lar',
        'enable' => 'Activar',
        'disable' => 'Deshabilitar',
        'copy' => 'Copiar',
        'comment' => 'Comentar',
        'search' => 'Cercar',
        'send' => 'Enviar',
        'reload' => 'Recarregar',
        'refresh' => 'Refrescar',
        'duplicate' => 'Duplicar',
        'remove' => 'Esborrar',
        'back' => 'Enrere',
    ],

    'fields' => [
        'name' => 'Nom',
        'title' => 'Títol',
        'action' => 'Acció',
        'date' => 'Data',
        'slug' => 'Slug',
        'link' => 'Enllaç',
        'enabled' => 'Activar',
        'author' => 'Autor/a',
        'user' => 'Usuari',
        'image' => 'Imatge',
        'type' => 'Tipus',
        'file' => 'Arxiu',
        'description' => 'Descripció',
        'short_description' => 'Descripció breu',
        'content' => 'Contingut',
        'role' => 'Rol',
        'quantity' => 'Quantitat',
        'money' => 'Diners',
        'color' => 'Color',
        'url' => 'URL',
        'status' => 'Estat',
        'category' => 'Categoria',
        'version' => 'Versió',
        'game' => 'Joc',
        'price' => 'Preu',
        'icon' => 'Icona',
        'server' => 'Servidor',
        'value' => 'Valor',
        'published_at' => 'Publicat el',
        'permissions' => 'Permisos',
        'address' => 'Adreça',
        'port' => 'Port',
    ],

    'status' => [
        'success' => 'S\'ha completat l\'acció amb èxit!',
        'error' => 'Ha hagut un error: :error',
    ],

    'range' => [
        'days' => 'Per dia',
        'months' => 'Per mes',
    ],

    'loading' => 'Carregant...',

    'yes' => 'Sí',
    'no' => 'No',
    'unknown' => 'Desconegut',
    'other' => 'Altres',
    'none' => 'Cap',
    'copied' => 'Copiat',
    'icons' => 'Pot trobar una llista de icones en <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.',

    'home' => 'Inici',
    'servers' => 'Servidors',
    'news' => 'Notícies',
    'welcome' => 'Benvingut a :name',
    'copyright' => 'Powered by <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Manteniment',
        'message' => 'El lloc web està sota manteniment.',
    ],

    'theme' => [
        'light' => 'Tema clar',
        'dark' => 'Tema fosc',
    ],

    'captcha' => 'La verificació captcha ha fallat. Si us plau torna\'ho a intentar.',

    'notifications' => [
        'notifications' => 'Notificacions',
        'read' => 'Marca com a llegit',
        'empty' => 'No tens noves notificacions.',
    ],

    'clipboard' => [
        'copied' => 'Copiat!',
        'error' => 'CTRL + C per copiar',
    ],

    'server' => [
        'join' => 'Unir-se',
        'total' => ':count/:max jugador|:count/:max jugadors online',
        'online' => ':count jugador online|:count jugadors online',
        'offline' => 'El servidor esta offline.',
    ],

    'profile' => [
        'title' => 'El meu perfil',
        'change_email' => 'Canviar l\'adreça de correu electrònic',
        'change_password' => 'Canviar Contrasenya',

        'email_verification' => 'El vostre correu electrònic no està verificat. Si us plau, confirmeu la vostra adreça electrònica amb l\'enllaç de verificació que us hem enviat.',
        'updated' => 'El teu perfil s\'ha actualitzat.',

        'info' => [
            'role' => 'Rol: :role',
            'register' => 'Registrat: :date',
            'money' => 'Diners: :money',
            '2fa' => 'Autenticació de dos passos (2FA): :2fa',
        ],

        '2fa' => [
            'enable' => 'Activar 2FA',
            'disable' => 'Desactivar 2FA',
            'manage' => 'Gestionar 2FA',
            'info' => 'Escanegeu el codi QR damunt amb una aplicació d\'autenticació doble factor en el vostre mòbil, com Authy, 1Password o Google Authenticator.',
            'secret' => 'Clau secreta: :secret',
            'title' => 'Autenticació en dos passos',
            'codes' => 'Mostra codis de recuperació',
            'code' => 'Codi',
            'enabled' => 'Autenticació en dos passos està actualment habilitada. No us oblideu de desar els vostres codis de recuperació!',
            'disabled' => 'S\'ha desactivat l\'autenticació de dos passos.',
        ],

        'money_transfer' => [
            'title' => 'Transferir diners',
            'self' => 'No pot enviar diners a si mateix.',
            'balance' => 'No teníu prou diners per fer aquesta transferencia.',
            'success' => 'Els diners s\'ham enviat amb èxit.',
            'notification' => ':user t\'ha enviat :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Entrades',
        'posted' => 'Publicar el :date per :user',
        'unpublished' => 'Aquesta entrada encara no està publicada.',
        'read' => 'Llegir més',
    ],

    'comments' => [
        'create' => 'Deixar un comentari',
        'guest' => 'Heu d\'haver iniciat sessió per afegir comentaris.',
        'author' => '<strong>:user</strong> ha comentat el :date',
        'content' => 'El seu comentari',
        'delete' => 'Eliminar?',
        'delete_confirm' => 'Segur que vol eliminar aquest comentari?',
    ],

    'likes' => 'Likes: :count',
];
