<?php

return [
    'title' => 'Tienda',
    'welcome' => '¡Bienvenido a la tienda!',

    'buy' => 'Comprar',

    'free' => 'Gratis',

    'fields' => [
        'balance' => 'Saldo',
        'category' => 'Categoría',
        'code' => 'Código',
        'commands' => 'Comandos',
        'currency' => 'Divisa',
        'discount' => 'Descuento',
        'expire_date' => 'Fecha de expiración',
        'gateways' => 'Métodos de pago',
        'original_balance' => 'Saldo original',
        'package' => 'Paquete',
        'packages' => 'Paquetes',
        'payment_id' => 'ID de pago',
        'payments' => 'Pagos',
        'price' => 'Precio',
        'quantity' => 'Cantidad',
        'required_packages' => 'Paquetes requeridos',
        'required_roles' => 'Rol requerido',
        'role' => 'Rol a establecer después de la compra',
        'servers' => 'Servidores',
        'start_date' => 'Fecha de inicio',
        'status' => 'Estado',
        'total' => 'Total',
        'user_id' => 'ID del usuario',
        'user_limit' => 'Límite de compras por usuario',
    ],

    'actions' => [
        'duplicate' => 'Duplicado',
        'remove' => 'Eliminar',
    ],

    'goal' => [
        'title' => 'Objetivo del mes',
        'progress' => ':count% completado',
    ],

    'recent' => [
        'title' => 'Pagos recientes',
        'empty' => 'No hay pagos recientes',
    ],

    'top' => [
        'title' => 'Top clientes',
    ],

    'cart' => [
        'title' => 'Carrito',
        'success' => 'Su compra se ha completado correctamente.',
        'guest' => 'Debes iniciar sesión para poder realizar compras en la tienda.',
        'empty' => 'Tu carrito de compras está vacío.',
        'checkout' => 'Pagar',
        'remove' => 'Eliminar',
        'clear' => 'Vaciar el carrito',
        'pay' => 'Pagar',
        'back' => 'Volver a la tienda',
        'total' => 'Total: :total',
        'payable_total' => 'Total a pagar: :total',
        'credit' => 'Crédito',

        'confirm' => [
            'title' => '¿Pagar?',
            'price' => '¿Estás seguro de que quieres comprar este carrito por :price?',
        ],

        'errors' => [
            'money' => 'No tienes suficiente dinero para hacer esta compra.',
            'execute' => 'Se ha producido un error inesperado durante el pago, se reembolsará su compra.',
        ],
    ],

    'coupons' => [
        'title' => 'Cupones',
        'add' => 'Añadir un cupón',
        'error' => 'Este cupón no existe, ha caducado o ya no se puede utilizar.',
        'cumulate' => 'No puedes usar este cupón con otro cupón.',
    ],

    'payment' => [
        'title' => 'Pago',
        'manual' => 'Pago manual',

        'empty' => 'Lo sentimos, no hay métodos de pago disponibles; intenta de nuevo más tarde.',

        'info' => 'Compra #:id en el sitio :website',
        'error' => 'Ocurrió un error al procesar tu pago, intenta de nuevo más tarde.',

        'success' => 'Pago completado, recibirás tu compra en el juego en menos de un minuto.',

        'webhook' => 'Nueva compra en la tienda',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Esta categoría está vacía.',
    ],

    'packages' => [
        'limit' => '¡Vaya! Parece que has comprado el máximo de paquetes disponibles por usuario.',
        'requirements' => 'No tienes los requisitos para comprar este paquete.',
    ],

    'offers' => [
        'gateway' => 'Tipo de pago',
        'amount' => 'Cantidad',

        'empty' => 'Lo sentimos, no hay ofertas disponibles actualmente.',
    ],

    'profile' => [
        'payments' => 'Tus pagos',
        'money' => 'Dinero: :balance',
    ],

    'giftcards' => [
        'title' => 'Tarjetas de regalo',
        'success' => ':money ha sido acreditado a su cuenta',
        'error' => 'Esta tarjeta de regalo no existe, ha expirado o ya no puede ser utilizada.',
        'add' => 'Añadir un vale de regalo',
        'notification' => 'Has recibido una tarjeta de regalo, el código es :code (:balance).',
    ],
];
