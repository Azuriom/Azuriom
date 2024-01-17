<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on the admin dashboard
    |
    */

    'nav' => [
        'dashboard' => 'Inicio',
        'settings' => [
            'heading' => 'Ajustes',
            'settings' => 'Ajustes',
            'global' => 'Global',
            'security' => 'Seguridad',
            'performances' => 'Rendimiento',
            'seo' => 'SEO',
            'auth' => 'Autenticación',
            'mail' => 'Correo',
            'maintenance' => 'Mantenimiento',
            'social' => 'Redes Sociales',
            'navbar' => 'Navegación',
            'servers' => 'Servidores',
        ],

        'users' => [
            'heading' => 'Usuarios',
            'users' => 'Usuarios',
            'roles' => 'Roles',
            'bans' => 'Baneos',
        ],

        'content' => [
            'heading' => 'Contenido',
            'pages' => 'Páginas',
            'posts' => 'Publicaciones',
            'images' => 'Imágenes',
            'redirects' => 'Redirecciones',
        ],

        'extensions' => [
            'heading' => 'Extensiones',
            'plugins' => 'Complementos',
            'themes' => 'Temas',
        ],

        'other' => [
            'heading' => 'Otros',
            'update' => 'Actualizar',
            'logs' => 'Registros',
        ],

        'profile' => [
            'profile' => 'Perfil',
        ],

        'back' => 'Volver al sitio web',
        'support' => 'Soporte',
        'documentation' => 'Documentación',
    ],

    'delete' => [
        'title' => '¿Eliminar?',
        'description' => '¿Estás seguro que quieres eliminar esto? ¡No puedes deshacer los cambios!',
    ],

    'footer' => 'Desarrollado por: azuriom &copy; : año. Panel diseñado por: startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Tablero',

        'users' => 'Usuarios',
        'posts' => 'Publicaciones',
        'pages' => 'Páginas',
        'images' => 'Imágenes',

        'update' => 'Hay una nueva versión de Azuriom disponible: :version',
        'http' => 'Tu sitio web no está utilizando Https, es recomendable habilitarlo y forzarlo para procurar la seguridad de los usuarios.',
        'cloudflare' => 'Si estás utilizando Cloudflare, deberás instalar el plugin para soporte de Cloudflare.',
        'recent_users' => 'Usuarios recientes',
        'active_users' => 'Usuarios activos',
        'emails' => 'Los correos electrónicos están deshabilitados. En caso de que un usuario olvide su contraseña, no podrá restablecerla por éste medio. Puedes habilitar nuevamente los correos electrónicos en los <a href=":url">ajustes de correo</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Configuración global',

            'name' => 'Nombre del sitio',
            'url' => 'URL del sitio',
            'description' => 'Descripción del sitio',
            'meta' => 'Palabras clave meta',
            'meta_info' => 'Las palabras deben están separadas por una coma.',
            'favicon' => 'Favicon',
            'background' => 'Fondo',
            'logo' => 'Logo',
            'timezone' => 'Zona horaria',
            'locale' => 'Local',
            'money' => 'Nombre de la moneda del sitio
',
            'copyright' => 'Derechos de autor',
            'user_money_transfer' => 'Habilitar la transferencia de dinero entre usuarios',
            'site_key' => 'Clave del sitio de Azuriom.com',
            'site_key_info' => 'La clave de sitio de Azuriom es requerida para poder instalar extensiones de pago, compradas directamente desde el mercado del sitio. Puedes obtener tu clave en tu <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">perfil de Azuriom</a>.',
            'webhook' => 'URL del Webbook de Discord',
            'webhook_info' => 'Un webhook de Discord será enviado a esta URL cuando se cree un nuevo post, si la fecha de publicación no es en el futuro. Dejar en blanco para desactivar.',
        ],

        'security' => [
            'title' => 'Configuración de seguridad',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Clave del sitio',
                'secret_key' => 'Clave secreta',
                'recaptcha' => 'Puedes obtener claves reCaptcha en el <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer">Sitio Web de Google reCaptcha</a>.Necesitas usar reCaptcha <strong>v2 invisible</strong> keys.',
                'hcaptcha' => 'Puede obtener las claves hCaptcha en el sitio web <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> hCaptcha</a>.',
                'turnstile' => 'Puede obtener las teclas Turnstil en el panel de control <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Cloudflare</a>. Debe seleccionar el widget "Administrado".',
            ],

            'hash' => 'Algoritmo hash',
            'hash_error' => 'Este algoritmo de encriptado no está soportado por tu versión actual de PHP.',
            'force_2fa' => 'Requerir autenticación de doble factor para acceder al panel de administración',
        ],

        'performances' => [
            'title' => 'Configuración de rendimiento',

            'cache' => [
                'title' => 'Limpiar Cache',
                'clear' => 'Eliminar caché',
                'description' => 'Limpiar el cache del sitio web.',
                'error' => 'Ocurrió un error al borrar el caché.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'RocketBooster mejora el rendimiento del sitio web añadiendo una capa exclusiva para cache.',
                'info' => 'Si tienes problemas después de activar una extensión debes recargar el cache.',

                'enable' => 'Habilitar AzBoost',
                'disable' => 'Deshabilitar AzBoost',
                'reload' => 'Recargar AzBoost',

                'status' => 'AzBoost actualmente está :status.',
                'enabled' => 'habilitado',
                'disabled' => 'deshabilitado',

                'error' => 'Ocurrió un error al inicializar AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Ajustes de SEO',

            'html' => 'Puedes agregar código HTML en la etiqueta <code>&lt;head&gt;</code> o <code>&lt;body&gt;</code> de todas las páginas. (Por ejemplo para seguimiento de cookies o analíticas). Creando un archivo llamado <code>head.blade.php</code> o <code>body.blade.php</code> en la carpeta <code>resources/views/custom/</code>.',
            'home_message' => 'Mensaje de inicio',

            'welcome_alert' => [
                'enable' => '¿Habilitar el popup de bienvenida?',
                'message' => 'Mensaje de inicio',
                'info' => 'Esta ventana emergente se mostrará la primera vez que un usuario visite el sitio.',
            ],
        ],

        'auth' => [
            'title' => 'Autenticación',

            'conditions' => 'Condiciones para ser aceptadas en el registro',
            'conditions_info' => 'Enlaces en formato Markdown, por ejemplo: <code>Acepto el [conditions](/conditions-link) y [política de privacidad](/privacy-policy)</code>',
            'registration' => 'Habilitar registro de usuarios',
            'registration_info' => 'Los usuarios podrán registrarse mediante aplicaciones de terceros.',
            'api' => 'Activar Auth API',
            'api_info' => 'La API te permite agregar un sistema de autenticación personalizado a tu servidor de juegos. Para servidores de minecraft utilizando un launcher, puedes hacer uso de <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> para una integración fácil y rápida.',
            'user_change_name' => 'Permitir a los usuarios cambiar el nombre de usuario de su perfil',
            'user_delete' => 'Permitir a los usuarios eliminar su cuenta desde su perfil',
        ],

        'mail' => [
            'title' => 'Configuraciones de correo',
            'from' => 'Correo utilizado para enviar emails.',
            'mailer' => 'Tipo de correo',
            'mailer_info' => 'Azuriom soporta el uso de SMTP y Sendmail para el envío de correos. Puedes encontrar más información en la página de configuración de correo en nuestra <a href="https://Azurita.com/docs" target="_blank" rel="noopener noreferrer">documentación</a>.',
            'disabled' => 'Cuando los correos están desactivados, los usuarios no podrán solicitar el restablecimiento de su contraseña en caso de que la hayan olvidado.',
            'sendmail' => 'No recomendamos el uso de Sendmail, en su defecto; recomendamos utilizar SMTP en caso de que sea posible.',
            'smtp' => [
                'host' => 'Dirección de host SMTP',
                'port' => 'Puerto de host SMTP',
                'encryption' => 'Protocolo de cifrado',
                'username' => 'Nombre de usuario del servidor SMTP',
                'password' => 'Contraseña del servidor SMTP',
            ],
            'verification' => 'Habilitar la verificación de usuarios por correo',
            'send' => 'Enviar un correo de prueba',
            'sent' => 'El correo electrónico ha sido enviado con éxito.',
            'missing' => 'No se ha especificado dirección de correo alguna en su cuenta.',
        ],

        'maintenance' => [
            'title' => 'Ajustes de mantenimiento',

            'enable' => 'Activar mantenimiento',
            'message' => 'Mensaje de mantenimiento',
            'global' => 'Habilitar el modo mantenimiento del sitio',
            'paths' => 'Sitios a bloquear durante el mantenimiento',
            'info' => 'Puedes utilizar un <code>/*</code> para bloquear todas las páginas que estén en el mismo directorio. Por ejemplo; <code>/news/*</code> bloqueará todo el acceso a las noticias.',
        ],

        'updated' => 'La configuración ha sido actualizada.',
    ],

    'navbar_elements' => [
        'title' => 'Navegación',
        'edit' => 'Editar botón :element de la barra de navegación',
        'create' => 'Crear botón de navegación',

        'restrict' => 'Limitar los roles que podrán ver éste botón',
        'dropdown' => 'Podrás agregar más botones a éste menú cuando haya sido guardado.',

        'fields' => [
            'home' => 'Inicio',
            'link' => 'Enlace externo',
            'page' => 'Página',
            'post' => 'Publicación',
            'posts' => 'Lista de publicaciones',
            'plugin' => 'Plugin',
            'dropdown' => 'Menú desplegable',
            'new_tab' => 'Abrir en una nueva pestaña',
        ],

        'updated' => 'Navegación actualizada.',
        'not_empty' => 'No puedes eliminar un menú desplegable que contiene otros botones.',
    ],

    'social_links' => [
        'title' => 'Redes sociales',
        'edit' => 'Editar red social :link',
        'create' => 'Agregar red social',
    ],

    'servers' => [
        'title' => 'Servidores',
        'edit' => 'Editar servidor :server',
        'create' => 'Agregar servidor',

        'default' => 'Servidor predeterminado',
        'default_info' => 'Se mostrará el número de jugadores coenctados en el servidor principal, en caso de que el tema seleccionado de Azuriom lo soporte.',

        'home_display' => 'Mostrar servidor en la página principal',
        'url' => 'Link de botón promocional',
        'url_info' => 'Dejar vacío para mostrar la dirección del servidor. Puede ser un enlace para descargar el juego/lanzador o una URL para unirse al servidor como <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'El enlace de ping no necesita un plugin, pero no puede ejecutar comandos con él.',
        'query_info' => 'Con el link de la query, no es posible ejecutar comandos en el servidor.',

        'query_port_info' => 'Puede estar vacío si es el mismo puerto que el juego.',

        'verify' => 'Comandos instantáneos de prueba',

        'rcon_password' => 'Contraseña de Rcon',
        'rcon_port' => 'Puerto de Rcon',
        'query_port' => 'Origen del puerto Query',
        'unturned_info' => 'Necesitas usar el tipo RCON SRCDS en OpenMod. RocketMod RCON no es compatible!',

        'azlink' => [
            'port' => 'Puerto de AzLink',

            'link' => 'Para vincular Minecraft a su sitio web utilizando AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Descarga el plugin AzLink</a> e instálalo en tu servidor.',
            'link2' => 'Reiniciar el servidor.',
            'link3' => 'Ejecutar este comando en el servidor: ',

            'info' => 'Si tienes problemas con AzLink al usar Cloudflare o un cortafuegos, intenta seguir los pasos en la <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Puedes vincular tu servidor de Minecraft a tu sitio web con el comando: ',
            'port_command' => 'Si está utilizando un puerto AzLink diferente al predeterminado, debe configurarlo con el comando: ',
            'ping' => 'Habilitar comandos instantáneos (requiere un puerto abierto en el servidor)',
            'ping_info' => 'Cuando los comandos instantáneos no están habilitados, los comandos se ejecutarán con un retraso de 30 segundos a 1 minuto.',
            'custom_port' => 'Utiliza un puerto personalizado para AzLink',

            'error' => 'La conexión al servidor ha fallado, la dirección y/o el puerto son incorrectos, o el puerto está cerrado.',
            'badresponse' => 'La conexión al servidor ha fallado (código :code), el token no es válido o el servidor está mal configurado. Puedes rehacer el comando link para arreglar esto.',
        ],

        'players' => ':count jugador|:count jugadores',
        'offline' => 'Offline',

        'connected' => '¡La conexión con el servidor se ha hecho con éxito!',
        'error' => 'La conexión con el servidor ha fallado: :error',

        'type' => [
            'mc-ping' => 'Ping de Minecraft',
            'mc-rcon' => 'RCON de Minecraft',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'Source RCON',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Ping desde Bedrock',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'Estado de FiveM',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'Rust RCON',
            'flyff-server' => 'Servidor Flyff', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Usuarios',
        'edit' => 'Editar usuario :user',
        'create' => 'Crear usuario',

        'registered' => 'Registrado en',
        'last_login' => 'Último acceso el',
        'ip' => 'Dirección IP',

        'admin' => 'Admin',
        'banned' => 'Baneado',
        'deleted' => 'Eliminado',

        'ban' => 'Banear',
        'unban' => 'Desbanear',
        'delete' => 'Eliminar',

        'alert-deleted' => 'Este usuario fue eliminado, no puede ser editado.',
        'alert-banned' => [
            'title' => 'Este usuario está actualmente baneado:',
            'banned-by' => 'Prohibido por: :author',
            'reason' => 'Razón: :reason',
            'date' => 'Fecha: :date',
        ],

        'edit_profile' => 'Editar perfil',

        'info' => 'Información del usuario',

        'ban-title' => 'Banear :user',
        'ban-description' => '¿estas seguro de que quieres banear a este usuario?',

        'email' => [
            'verify' => 'Verificar email',
            'verified' => 'Dirección de correo verificada',
            'date' => 'Sí, en :date',
            'verify_success' => 'La dirección de correo electrónico ha sido verificada.',
        ],

        '2fa' => [
            'title' => 'Autenticación de dos factores',
            'secured' => '2FA activada',
            'disable' => 'Desactivar 2FA',
            'disabled' => 'La Autenticación de Dos Factores ha sido desactivada.',
        ],

        'password' => [
            'title' => 'Último cambio de contraseña',
            'force' => 'Forzar cambio',
            'forced' => 'Debe cambiar la contraseña',
        ],

        'status' => [
            'banned' => 'Este usuario ha sido baneado.',
            'unbanned' => 'Este usuario ha sido desbaneado.',
        ],

        'discord' => 'Vincular una cuenta de Discord',

        'notify' => 'Enviar notificación',
        'notify_info' => 'Enviar una notificación a este usuario',
        'notify_all' => 'Enviar una notificación a todos los usuarios',
    ],

    'roles' => [
        'title' => 'Roles',
        'edit' => 'Editar rol :role (#:id)',
        'create' => 'Crear rol',

        'info' => '(ID: :id, Power: :power)',

        'default' => 'Defecto',
        'admin' => 'Admin',
        'admin_info' => 'Cuando el grupo es administrador, tiene todos los permisos.',

        'updated' => 'Los roles han sido actualizados.',
        'unauthorized' => 'Este rol es superior que el tuyo.',
        'add_admin' => 'No puede agregar el permiso de administrador a un rol.',
        'remove_admin' => 'No puedes eliminar el permiso de administrador de tu rol.',
        'delete_default' => 'Este rol no puede ser eliminado.',
        'delete_own' => 'No puedes eliminar tu rol.',

        'discord' => [
            'title' => 'Vincular roles de Discord',
            'enable' => 'Activar enlace de roles de Discord',
            'enable_info' => 'Una vez activado, edite el rol en Discord, y agregue un requisito en la pestaña <b>Enlaces</b> . Los usuarios pueden obtener su rol de Discord en el menú del servidor, en <b>Rol enlazado</b>.',
            'info' => 'Necesitas crear una aplicación en el panel de control de desarrollador <a href="https://discord.com/developers/applications" target="_blank">de Discord</a> y establecer la URL <b>de Verificación de Rol Enlazado</b> a <code>:url</code>',
            'oauth' => 'Luego, en <b>OAuth2</b> y en <b>General</b>, tienes que añadir <code>:url</code> en la <b>Redirecciones</b>.',
            'token_info' => 'El token de bot se puede obtener creando un bot para tu aplicación, en la pestaña <b>Bot</b> a la izquierda del panel de desarrolladores de Discord.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Cliente ID',
            'client_secret' => 'Discord Cliente Secreto',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Comentar la publicación',
        'delete-other-comments' => 'Borrar el comentario de otro usuario',
        'maintenance-access' => 'Acceder al sitio web durante un mantenimiento',
        'admin-access' => 'Acceder al panel de administración',
        'admin-logs' => 'Ver y gestionar los logs del sitio',
        'admin-images' => 'Ver y gestionar imágenes',
        'admin-navbar' => 'Ver y gestionar la barra de navegación',
        'admin-pages' => 'Ver y gestionar las páginas',
        'admin-redirects' => 'Ver y administrar redirecciones',
        'admin-posts' => 'Ver y gestionar las publicaciones',
        'admin-settings' => 'Ver y gestionar las configuraciones',
        'admin-users' => 'Ver y gestionar usuarios',
        'admin-themes' => 'Ver y gestionar los temas',
        'admin-plugins' => 'Ver y gestionar los plugins',
    ],

    'bans' => [
        'title' => 'Baneos',

        'by' => 'Bloqueado por',
        'reason' => 'Razón',
        'removed' => 'Removido el :date por :user',
    ],

    'posts' => [
        'title' => 'Publicaciones',
        'edit' => 'Editar publicación :post',
        'create' => 'Crear publicación',

        'published_info' => 'Esta publicación no será visible públicamente hasta esta fecha.',
        'pin' => 'Fijar esta publicación',
        'pinned' => 'Fijado',
        'feed' => 'Un feed de tipo RSS/Atom para las publicaciones está disponible en <code>:rss</code> and <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Páginas',
        'edit' => 'Editar página #:page',
        'create' => 'Crear página',

        'enable' => 'Habilitar la página',
        'restrict' => 'Limitar los roles que podrán acceder a esta página',
    ],

    'redirects' => [
        'title' => 'Redirecciones',
        'edit' => 'Editando la redirección :redirect',
        'create' => 'Creando redirección',

        'enable' => 'Activar redirección',
        'source' => 'Fuente',
        'destination' => 'Destino',
        'code' => 'Código de estado',

        '301' => '301 - Redirección permanente',
        '302' => '302 - Redirección temporal',
    ],

    'images' => [
        'title' => 'Imágenes',
        'edit' => 'Editar imagen :image',
        'create' => 'Subir imagen',
        'help' => 'Si las imágenes no están cargando, intente seguir los pasos en la <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Comprar por: :price',
    ],

    'plugins' => [
        'title' => 'Complementos',

        'list' => 'Complementos instalados',
        'available' => 'Complementos disponibles',

        'requirements' => [
            'api' => 'Esta versión de plugin no es compatible con Azuriom v:version.',
            'azuriom' => 'Este plugin no es compatible con tu versión Azuriom.',
            'game' => 'Este plugin no es compatible con el juego :game.',
            'plugin' => 'Falta el plugin ":plugin" o su versión no es compatible con este plugin.',
        ],

        'reloaded' => 'Los plugins han sido recargados.',
        'enabled' => 'El plugin ha sido habilitado.',
        'disabled' => 'El plugin ha sido desactivado.',
        'updated' => 'El plugin ha sido actualizado.',
        'installed' => 'El plugin ha sido instalado.',
        'deleted' => 'El plugin ha sido eliminado.',
        'delete_enabled' => 'El plugin debe ser desactivado antes de poder ser eliminado.',
    ],

    'themes' => [
        'title' => 'Temas',

        'current' => 'Tema actual',
        'author' => 'Autor: :author',
        'version' => 'Versión: :version',
        'list' => 'Temas instalados',
        'available' => 'Temas disponibles',
        'no-enabled' => 'No tienes ningún tema habilitado.',
        'legacy' => 'Esta versión del tema no es compatible con Azuriom v:version.',

        'config' => 'Editar configuración',
        'disable' => 'Desactivar tema',

        'reloaded' => 'Los temas han sido recargados.',
        'no_config' => 'Este tema no tiene configuración.',
        'config_updated' => 'La configuración del tema ha sido actualizada.',
        'invalid' => 'Este tema no es válido (el nombre de la carpeta del tema debe ser el id del tema).',
        'updated' => 'El tema ha sido actualizado.',
        'installed' => 'Temas instalados',
        'deleted' => 'El tema ha sido eliminado.',
        'delete_current' => 'No se puede eliminar el tema actual.',
    ],

    'update' => [
        'title' => 'Actualizar',

        'has_update' => 'Actualización disponible',
        'no_update' => 'No hay actualizaciones disponibles',
        'check' => 'Comprobar actualizaciones',

        'update' => 'La versión <code>:last-version</code> de Azuriom está disponible, actualmente estás en la versión <code>:version</code>.',
        'changelog' => 'El registro de cambios está disponible <a href=":url" target="_blank" rel="noopener noreferrer">aquí</a>.',
        'download' => 'La última versión de Azuriom está lista para ser descargada.',
        'install' => 'La última versión de Azuriom ha sido descargada y está lista para ser instalada.',

        'backup' => '¡Antes de actualizar Azuriom, debe hacer una copia de seguridad de su sitio!',

        'latest_version' => 'Estás ejecutando la última versión de Azuriom: <code>:version</code>.',
        'latest' => 'Estás usando la última versión de Azuriom.',

        'downloaded' => 'La última versión ha sido descargada, ahora puedes instalarla.',
        'installed' => 'La actualización se ha instalado correctamente.',
    ],

    'logs' => [
        'title' => 'Registros',

        'clear' => 'Borrar registros antiguos (15d+)',
        'cleared' => 'Los registros antiguos han sido eliminados.',
        'changes' => 'Cambios',
        'old' => 'Valor antiguo',
        'new' => 'Nuevo valor',

        'pages' => [
            'created' => 'Página creada #:id',
            'updated' => 'Página actualizada #:id',
            'deleted' => 'Página eliminada #:id',
        ],

        'posts' => [
            'created' => 'Publicación creada #:id',
            'updated' => 'Publicación actualizada #:id',
            'deleted' => 'Publicación eliminada #:id',
        ],

        'images' => [
            'created' => 'Imagen creada #:id',
            'updated' => 'Imagen actualizada #:id',
            'deleted' => 'Imagen eliminada #:id',
        ],

        'redirects' => [
            'created' => 'Redirección creada #:id',
            'updated' => 'Redirección actualizada #:id',
            'deleted' => 'Redirección eliminada #:id',
        ],

        'roles' => [
            'created' => 'Rol creado #:id',
            'updated' => 'Rol actualizado #:id',
            'deleted' => 'Rol eliminado #:id',
        ],

        'servers' => [
            'created' => 'Servidor creado #:id',
            'updated' => 'Servidor actualizado #:id',
            'deleted' => 'Servidor eliminado #:id',
        ],

        'users' => [
            'updated' => 'Usuario actualizado #:id',
            'deleted' => 'Usuario eliminado #:id',
            'transfer' => 'Enviar dinero :money al usuario #:id',

            'login' => 'Inicio de sesión exitoso de :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Autenticación de doble factor habilitada',
                'disabled' => 'Autenticación de doble factor desactivada',
            ],
        ],

        'settings' => [
            'updated' => 'Configuración actualizada',
        ],

        'updates' => [
            'installed' => 'Actualización de Azuriom instalada',
        ],

        'plugins' => [
            'enabled' => 'Plugin activo',
            'disabled' => 'Plugin desactivado',
        ],

        'themes' => [
            'changed' => 'Tema cambiado',
            'configured' => 'Configuración del tema actualizada',
        ],
    ],

    'errors' => [
        'back' => 'Volver al panel',
        '404' => 'Pagina no encontrada',
        'info' => 'Parece que has encontrado un bug en la matrix...',
        '2fa' => 'Debe habilitar la autenticación de dos factores para acceder a esta página.',
    ],
];
