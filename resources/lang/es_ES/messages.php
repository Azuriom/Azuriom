<?php

return [

    'lang' => 'Español',

    'date' => [
        'default' => 'j \d\e F \d\e Y',
        'full' => 'j \d\e F \d\e Y \a \l\a\s G:i',
        'compact' => 'd/m/Y \d\e Y \a \l\a\s G:i',
    ],

    'nav' => [
        'toggle' => 'Cambiar la navegación',
        'profile' => 'Perfil',
        'admin' => 'Panel de administración',
    ],

    'actions' => [
        'add' => 'Añadir',
        'back' => 'Regresar',
        'browse' => 'Vistazo',
        'cancel' => 'Cancelar',
        'choose_file' => 'Elegir archivo',
        'close' => 'Cerrar',
        'comment' => 'Comentario',
        'continue' => 'Continuar',
        'copy' => 'Copiar',
        'create' => 'Crear',
        'delete' => 'Eliminar',
        'disable' => 'Desactivar',
        'download' => 'Descargar',
        'duplicate' => 'Duplicar',
        'edit' => 'Editar',
        'enable' => 'Habilitar',
        'generate' => 'Generar',
        'install' => 'Instalar',
        'refresh' => 'Actualizar',
        'reload' => 'Recargar',
        'remove' => 'Remover',
        'save' => 'Guardar',
        'search' => 'Buscar',
        'send' => 'Enviar',
        'show' => 'Mostrar',
        'update' => 'Actualización',
        'upload' => 'Subir',
    ],

    'fields' => [
        'action' => 'Acción',
        'address' => 'Dirección',
        'author' => 'Autor',
        'category' => 'Categoría',
        'color' => 'Color',
        'content' => 'Contenido',
        'date' => 'Fecha',
        'description' => 'Descripción',
        'enabled' => 'Habilitado',
        'file' => 'Archivo',
        'game' => 'Juego',
        'icon' => 'Ícono',
        'image' => 'Imagen',
        'link' => 'Enlace',
        'money' => 'Dinero',
        'name' => 'Nombre',
        'permissions' => 'Permisos',
        'port' => 'Puerto',
        'price' => 'Precio',
        'published_at' => 'Publicado el',
        'quantity' => 'Cantidad',
        'role' => 'Rol',
        'server' => 'Servidor',
        'short_description' => 'Descripción corta',
        'slug' => 'Slug',
        'status' => 'Estado',
        'title' => 'Título',
        'type' => 'Tipo',
        'url' => 'URL',
        'user' => 'Usuario',
        'value' => 'Valor',
        'version' => 'Versión',
    ],

    'status' => [
        'success' => '¡La acción se completó con éxito!',
        'error' => 'Se ha producido un error: :error',
    ],

    'range' => [
        'days' => 'Por días',
        'months' => 'Por meses',
    ],

    'loading' => 'Cargando...',

    'yes' => 'Si',
    'no' => 'No',
    'unknown' => 'Desconocido',
    'other' => 'Otro',
    'none' => 'Ninguno',
    'copied' => 'Copiado',
    'icons' => 'Puede encontrar la lista de iconos disponibles en <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">iconos de Bootstrap</a>.',

    'home' => 'Inicio',
    'servers' => 'Servidores',
    'news' => 'Noticias',
    'welcome' => 'Bienvenido a :name',
    'copyright' => 'Impulsado por <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Mantenimiento',
        'message' => 'El sitio web está actualmente en mantenimiento.',
    ],

    'theme' => [
        'light' => 'Tema claro',
        'dark' => 'Tema oscuro',
    ],

    'captcha' => 'La verificación del captcha falló, por favor inténtelo de nuevo.',

    'notifications' => [
        'notifications' => 'Notificaciones',
        'read' => 'Marcar como leído',
        'empty' => 'No tienes notificaciones no leídas.',
        'level' => 'Nivel',
        'info' => 'Información',
        'warning' => 'Advertencia',
        'danger' => 'Peligro',
        'success' => 'Éxito',
    ],

    'clipboard' => [
        'copied' => '¡Copiado!',
        'error' => 'CTRL + C para copiar',
    ],

    'server' => [
        'join' => 'Unirse',
        'total' => ':count/:max jugador|:count/:max jugadores en línea',
        'online' => ':count jugador online|:count jugadores online',
        'offline' => 'El servidor está actualmente desconectado.',
    ],

    'profile' => [
        'title' => 'Mi perfil',
        'change_email' => 'Cambiar dirección de email',
        'change_password' => 'Cambiar contraseña',
        'change_name' => 'Cambiar nombre de usuario',

        'delete' => [
            'btn' => 'Eliminar mi cuenta',
            'title' => 'Eliminar cuenta',
            'info' => 'Esto eliminará permanentemente tu cuenta y los datos asociados. Esta acción no se puede deshacer.',
            'email' => 'Le enviaremos un e-mail de confirmación para confirmar esta operación.',
            'sent' => 'Se ha enviado un enlace de confirmación a su dirección de correo electrónico.',
            'success' => '¡Su cuenta ha sido eliminada con éxito!',
        ],

        'email_verification' => 'Tu correo electrónico no está verificado, por favor revisa tu correo electrónico para ver un enlace de verificación.',
        'updated' => 'Su perfil ha sido actualizado.',

        'info' => [
            'role' => 'Rol: :role',
            'register' => 'Se registró: :date',
            'money' => 'Dinero: :money',
            '2fa' => 'Autenticación de dos factores (2FA): :2fa',
            'discord' => 'Vincular una cuenta de Discord',
        ],

        '2fa' => [
            'enable' => 'Habilitar el 2FA',
            'disable' => 'Desactivar 2FA',
            'manage' => 'Administrar 2FA',
            'info' => 'Escanea el código QR de arriba con una aplicación móvil de autenticación en dos factores como <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secretos</a> o Google Authenticator.',
            'secret' => 'Clave secreta: :secret',
            'title' => 'Autenticación de dos factores',
            'codes' => 'Mostrar códigos de recuperación',
            'code' => 'Código',
            'enabled' => 'La autenticación de dos factores está activada. ¡No olvide guardar sus códigos de recuperación!',
            'disabled' => 'Autenticación de dos factores desactivada.',
        ],

        'discord' => [
            'link' => 'Vincular a Discord',
            'unlink' => 'Desvincular de Discord',
            'linked' => 'Tu cuenta de Discord ha sido vinculada con éxito.',
        ],

        'money_transfer' => [
            'title' => 'Transferencia de dinero',
            'user' => 'Este usuario no fue encontrado.',
            'balance' => 'No tienes suficiente dinero para hacer esta transferencia.',
            'success' => 'El dinero se ha enviado correctamente.',
            'notification' => ':user te envió :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Publicaciones',
        'posted' => 'Publicado el :date por :user',
        'unpublished' => 'Esta publicación no se ha publicado todavía.',
        'read' => 'Leer más',
    ],

    'comments' => [
        'create' => 'Deje un comentario',
        'guest' => 'Debes estar conectado para dejar un comentario.',
        'author' => '<strong>:user</strong> comentó el :date',
        'content' => 'Tu comentario',
        'delete' => '¿Eliminar?',
        'delete_confirm' => '¿Está seguro que desea eliminar este comentario?',
    ],

    'likes' => 'Me gusta: :count',

    'markdown' => [
        'init' => 'Adjuntar archivos arrastrando y soltando o pegando desde el portapapeles.',
        'drag' => 'Soltar imagen para subirla.',
        'drop' => 'Subiendo imagen #images_names#...',
        'progress' => 'Subiendo #file_name#: #progreso#%',
        'uploaded' => 'Subido #image_name#',

        'size' => 'Imagen #image_name# es demasiado grande (#image_size#).\nEl tamaño máximo de archivo es #image_max_size#.',
        'error' => 'Algo salió mal al subir la imagen #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'ID del Rol',
            'description' => 'ID del rol en el sitio web.',
        ],

        'power' => [
            'name' => 'Poder del Rol',
            'description' => 'Potencia del rol en el sitio web igual o mayor que',
        ],
    ],
];
