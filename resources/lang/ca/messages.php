<?php

return [

    'lang' => 'Català',

    'date' => [
        'default' => 'j F \d\e Y',
        'full' => 'j F \d\e Y G:i',
        'compact' => 'd/m/Y G:i',
    ],

    'nav' => [
        'toggle' => 'Alternar navegació',
        'profile' => 'Perfil',
        'admin' => 'Tauler d\'administració',
    ],

    'actions' => [
        'add' => 'Afegir',
        'back' => 'Enrere',
        'browse' => 'Navegar',
        'cancel' => 'Cancel·lar',
        'choose_file' => 'Sel·leccionar fitxer',
        'close' => 'Tancar',
        'comment' => 'Comentar',
        'continue' => 'Continuar',
        'copy' => 'Copiar',
        'create' => 'Crear',
        'delete' => 'Esborrar',
        'disable' => 'Deshabilitar',
        'download' => 'Baixar',
        'duplicate' => 'Duplicar',
        'edit' => 'Editar',
        'enable' => 'Activar',
        'generate' => 'Generate',
        'install' => 'Instal·lar',
        'refresh' => 'Refrescar',
        'reload' => 'Recarregar',
        'remove' => 'Esborrar',
        'save' => 'Guardar',
        'search' => 'Cercar',
        'send' => 'Enviar',
        'show' => 'Mostrar',
        'update' => 'Actualitzar',
        'upload' => 'Pujar',
    ],

    'fields' => [
        'action' => 'Acció',
        'address' => 'Adreça',
        'author' => 'Autor/a',
        'category' => 'Categoria',
        'color' => 'Color',
        'content' => 'Contingut',
        'date' => 'Data',
        'description' => 'Descripció',
        'enabled' => 'Activar',
        'file' => 'Arxiu',
        'game' => 'Joc',
        'icon' => 'Icona',
        'image' => 'Imatge',
        'link' => 'Enllaç',
        'money' => 'Diners',
        'name' => 'Nom',
        'permissions' => 'Permisos',
        'port' => 'Port',
        'price' => 'Preu',
        'published_at' => 'Publicat el',
        'quantity' => 'Quantitat',
        'role' => 'Rol',
        'server' => 'Servidor',
        'short_description' => 'Descripció breu',
        'slug' => 'Slug',
        'status' => 'Estat',
        'title' => 'Títol',
        'type' => 'Tipus',
        'url' => 'URL',
        'user' => 'Usuari',
        'value' => 'Valor',
        'version' => 'Versió',
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
        'level' => 'Level',
        'info' => 'Information',
        'warning' => 'Warning',
        'danger' => 'Danger',
        'success' => 'Success',
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
        'change_name' => 'Change Username',

        'delete' => [
            'btn' => 'Delete my account',
            'title' => 'Account deletion',
            'info' => 'This will permanently delete your account and associated data. This action cannot be undone.',
            'email' => 'We will send you a confirmation e-mail to confirm this operation.',
            'sent' => 'A confirmation link has been sent to your email address.',
            'success' => 'Your account has been successfully deleted!',
        ],

        'email_verification' => 'El vostre correu electrònic no està verificat. Si us plau, confirmeu la vostra adreça electrònica amb l\'enllaç de verificació que us hem enviat.',
        'updated' => 'El teu perfil s\'ha actualitzat.',

        'info' => [
            'role' => 'Rol: :role',
            'register' => 'Registrat: :date',
            'money' => 'Diners: :money',
            '2fa' => 'Autenticació de dos passos (2FA): :2fa',
            'discord' => 'Linked Discord account: :user',
        ],

        '2fa' => [
            'enable' => 'Activar 2FA',
            'disable' => 'Desactivar 2FA',
            'manage' => 'Gestionar 2FA',
            'info' => 'Scan the QR code above with a two-factor authentication app on your phone like <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://secrets.app/" target="_blank" rel="noopener norefferer">Secrets</a> or Google Authenticator.',
            'secret' => 'Clau secreta: :secret',
            'title' => 'Autenticació en dos passos',
            'codes' => 'Mostra codis de recuperació',
            'code' => 'Codi',
            'enabled' => 'Autenticació en dos passos està actualment habilitada. No us oblideu de desar els vostres codis de recuperació!',
            'disabled' => 'S\'ha desactivat l\'autenticació de dos passos.',
        ],

        'discord' => [
            'link' => 'Link to Discord',
            'unlink' => 'Unlink from Discord',
            'linked' => 'Your Discord account has been linked successfully.',
        ],

        'money_transfer' => [
            'title' => 'Transferir diners',
            'user' => 'This user was not found.',
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

    'markdown' => [
        'init' => 'Attach files by drag and dropping or pasting from clipboard.',
        'drag' => 'Drop image to upload it.',
        'drop' => 'Uploading image #images_names#...',
        'progress' => 'Uploading #file_name#: #progress#%',
        'uploaded' => 'Uploaded #image_name#',

        'size' => 'Image #image_name# is too big (#image_size#).\nMaximum file size is #image_max_size#.',
        'error' => 'Something went wrong when uploading the image #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'Role ID',
            'description' => 'ID of the role on the website.',
        ],

        'power' => [
            'name' => 'Role Power',
            'description' => 'Power of the role on the website equal or greater than',
        ],
    ],
];
