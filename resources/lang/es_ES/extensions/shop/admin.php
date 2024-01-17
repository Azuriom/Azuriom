<?php

return [
    'nav' => [
        'title' => 'Tienda',
        'settings' => 'Ajustes',
        'packages' => 'Paquetes',
        'gateways' => 'Métodos de pago',
        'offers' => 'Ofertas',
        'coupons' => 'Cupones',
        'giftcards' => 'Tarjetas de regalo',
        'discounts' => 'Descuentos',
        'payments' => 'Pagos',
        'purchases' => 'Compras',
        'statistics' => 'Estadísticas',
    ],

    'permissions' => [
        'admin' => 'Administrar el plugin de la tienda',
    ],

    'categories' => [
        'title' => 'Categorías',
        'edit' => 'Editar categoría :category',
        'create' => 'Crear categoría',

        'parent' => 'Categoría principal',
        'delete_error' => 'Una categoría con paquetes no puede ser eliminada.',

        'cumulate' => 'Recoger compras de esta categoría',
        'cumulate_info' => 'Los usuarios que ya hayan comprado un paquete en esta categoría obtendrán un descuento y sólo pagarán la diferencia al comprar un paquete más caro.',
        'enable' => 'Habilitar la categoría',
    ],

    'offers' => [
        'title' => 'Ofertas',
        'edit' => 'Editar oferta :offer',
        'create' => 'Crear oferta',

        'enable' => 'Habilitar esta oferta',
    ],

    'coupons' => [
        'title' => 'Cupones',
        'edit' => 'Editar cupón :cupón',
        'create' => 'Crear cupón',

        'global' => '¿El cupón debe estar activo en toda la tienda?',
        'cumulate' => 'Permite usar este cupón con otros cupones',
        'user_limit' => 'Límite de usuarios',
        'global_limit' => 'Límite global',
        'active' => 'Activo',
        'usage' => 'Bajo límite de uso',
        'enable' => 'Habilitar el cupón',
    ],

    'giftcards' => [
        'title' => 'Tarjetas de regalo',
        'edit' => 'Editar la tarjeta regalo :giftcard',
        'create' => 'Crear una tarjeta regalo',

        'global_limit' => 'Límite global',
        'active' => 'Activo',
        'enable' => 'Activar la tarjeta regalo',
    ],

    'discounts' => [
        'title' => 'Descuentos',
        'edit' => 'Editar descuento :discount',
        'create' => 'Crear descuento',

        'global' => '¿El descuento debe estar activo en toda la tienda?',
        'active' => 'Activo',
        'enable' => 'Activar el descuento',
    ],

    'packages' => [
        'title' => 'Paquetes',
        'edit' => 'Editar paquete :package',
        'create' => 'Crear paquete',

        'updated' => 'Los paquetes han sido actualizados.',

        'money' => 'Dinero para entregar al usuario después de la compra',
        'giftcard' => 'Saldo de la tarjeta de regalo a crear durante la compra',
        'command' => 'El comando no debe comenzar con <code>/</code>. Puedes usar <code>{player}</code> para el nombre del jugador. Para los juegos de Steam, también puedes usar <code>{steam_id}</code> y <code>{steam_id_32}</code>. Los otros marcadores de posición disponibles son: :placeholders.',

        'custom_price' => 'Permitir al usuario elegir el precio a pagar (el precio del paquete será entonces el mínimo)',
        'require_online' => 'Ejecutar comandos cuando el usuario está conectado en el servidor (sólo disponible con AzLink)',
        'enable_quantity' => 'Habilitar la cantidad',

        'create_category' => 'Crear categoría',
        'create_package' => 'Crear paquete',

        'enable' => 'Habilitar este paquete',
    ],

    'gateways' => [
        'title' => 'Métodos de pago',
        'edit' => 'Editar método de pago :gateway',
        'create' => 'Añadir método de pago',

        'current' => 'Métodos de pago actuales',
        'add' => 'Añadir un nuevo método de pago',
        'info' => 'Si tienes problemas con los pagos al usar Cloudflare o un cortafuegos, intenta seguir los pasos en la <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'País',
        'sandbox' => 'Sandbox',
        'api-key' => 'Clave API',
        'public-key' => 'Clave pública',
        'private-key' => 'Clave privada',
        'secret-key' => 'Clave secreta',
        'endpoint-secret' => 'Firmando secreto',
        'service-id' => 'ID del servicio',
        'client-id' => 'ID del cliente',
        'merchant-id' => 'ID de comerciante',
        'project-id' => 'ID del proyecto',
        'env' => 'Entorno',

        'paypal_email' => 'Dirección de correo de PayPal',
        'paypal_info' => 'Por favor, asegúrate de introducir la <strong>dirección de correo principal</strong> de la cuenta de PayPal.',
        'paysafecard_info' => 'Para poder aceptar pagos por paysafecard, debe ser un socio de <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard</a>. Existen otros métodos pero sólo éste está permitido por paysafecard.',
        'stripe_info' => 'En el panel de control de Stripe, necesita establecer la URL del webhook a <code>:url</code> y seleccionar el evento <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'En el panel de control de PaymentWall necesitas establecer la URL de pingback a <code>:url</code>.',
        'xsolla' => 'En el panel Xsolla necesita establecer la URL del webhook a <code>:url</code>, activa \'ID externo de la transacción\' en la configuración de \'Paga la estación\', prueba los webhooks y luego activa \'Pagar\' en la configuración de \'Pagar Estación\'.',

        'enable' => 'Habilitar la entrada',
    ],

    'payments' => [
        'title' => 'Pagos',
        'show' => 'Pago #:payment',

        'info' => 'Información sobre el pago',
        'items' => 'Artículos comprados',

        'card' => 'Pagos de la tienda',

        'status' => [
            'pending' => 'Pendiente',
            'expired' => 'Expirado',
            'chargeback' => 'Contracargo',
            'completed' => 'Completado',
            'refunded' => 'Reembolsado',
            'error' => 'Error',
        ],
    ],

    'purchases' => [
        'title' => 'Compras',
    ],

    'settings' => [
        'title' => 'Los ajustes de la tienda',
        'enable_home' => 'Habilitar la página de inicio de la tienda',
        'home_message' => 'Mensaje de inicio',
        'use_site_money' => 'Habilitar compras con la moneda del sitio.',
        'use_site_money_info' => 'Cuando se activa, los paquetes de la tienda sólo pueden comprarse con dinero del sitio web. Para que los usuarios acrediten su cuenta, puedes establecer ofertas en la tienda.',
        'webhook' => 'URL del Webbook de Discord',
        'webhook_info' => 'Cuando un usuario realiza un pago, creará una notificación en este webhook. Dejar en blanco para desactivar',
        'commands' => 'Comandos globales',
        'recent_payments' => 'Límite de pagos recientes para mostrar en la barra lateral (establecer en 0 para desactivar)',
        'display_amount' => 'Mostrar la cantidad gastada en pagos recientes y clientes superiores',
        'top_customer' => 'Mostrar los principales clientes mensuales en la barra lateral',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Metodo creado #:id',
            'updated' => 'Método de pago actualizado #:id',
            'deleted' => 'Método de pago eliminado #:id',
        ],

        'shop-packages' => [
            'created' => 'Paquete creado #:id',
            'updated' => 'Paquete actualizado #:id',
            'deleted' => 'Borrar paquete #:id',
        ],

        'shop-offers' => [
            'created' => 'Crear oferta #:id',
            'updated' => 'Oferta actualizada #:id',
            'deleted' => 'Oferta eliminada #:id',
        ],

        'shop-giftcards' => [
            'used' => 'Tarjeta de regalo #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Estadísticas',
        'total' => 'Total',
        'recent' => 'Pagos recientes',
        'count' => 'Contador de pagos',
        'estimated' => 'Ganancias estimadas',
        'month' => 'Pagos durante este mes',
        'month_estimated' => 'Ganancias estimadas en este mes',
    ],

];
