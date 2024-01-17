<?php

return [
    'title' => 'Loja',
    'welcome' => 'Bem-vindo à loja!',

    'buy' => 'Comprar',

    'free' => 'Grátis',

    'fields' => [
        'balance' => 'Saldo',
        'category' => 'Categoria',
        'code' => 'Código',
        'commands' => 'Comandos',
        'currency' => 'Moeda',
        'discount' => 'Desconto',
        'expire_date' => 'Data de fim',
        'gateways' => 'Métodos de Pagamento',
        'original_balance' => 'Saldo Original',
        'package' => 'Pacote',
        'packages' => 'Pacotes',
        'payment_id' => 'ID do Pagamento',
        'payments' => 'Pagamentos',
        'price' => 'Preço',
        'quantity' => 'Quantidade',
        'required_packages' => 'Pacote necessário',
        'required_roles' => 'Função requerida',
        'role' => 'Função a ser definida após a compra',
        'servers' => 'Servidores',
        'start_date' => 'Data de início',
        'status' => 'Status',
        'total' => 'Total',
        'user_id' => 'ID do Usuário',
        'user_limit' => 'Limite de compras por usuário',
    ],

    'actions' => [
        'duplicate' => 'Duplicado',
        'remove' => 'Remover',
    ],

    'goal' => [
        'title' => 'Objetivo do mês',
        'progress' => ':count% concluído',
    ],

    'recent' => [
        'title' => 'Pagamentos Recentes',
        'empty' => 'Não há pagamentos recentes',
    ],

    'top' => [
        'title' => 'Melhor cliente',
    ],

    'cart' => [
        'title' => 'Carrinho',
        'success' => 'Sua compra foi concluída com sucesso.',
        'guest' => 'Você deve estar logado para fazer uma compra.',
        'empty' => 'Seu carrinho está vazio.',
        'checkout' => 'Finalizar compra',
        'remove' => 'Remover',
        'clear' => 'Limpar carrinho',
        'pay' => 'Pagar',
        'back' => 'Voltar a loja',
        'total' => 'Total: :total',
        'payable_total' => 'Total a pagar: :total',
        'credit' => 'Crédito',

        'confirm' => [
            'title' => 'Pagar?',
            'price' => 'Tem certeza que deseja comprar este carrinho por :price.',
        ],

        'errors' => [
            'money' => 'Você não tem dinheiro suficiente para fazer esta compra.',
            'execute' => 'Um erro inesperado ocorreu durante o pagamento, sua compra foi reembolsada.',
        ],
    ],

    'coupons' => [
        'title' => 'Cupons',
        'add' => 'Adicionar um cupom',
        'error' => 'Este cupom não existe, expirou ou não pode mais ser usado.',
        'cumulate' => 'Não é possível usar este cupom com outro cupom.',
    ],

    'payment' => [
        'title' => 'Métodos de Pagamento',
        'manual' => 'Pagamento manual',

        'empty' => 'Nenhum método de pagamento disponível no momento.',

        'info' => 'Compra #:id no site :website',
        'error' => 'Não foi possível completar o pagamento.',

        'success' => 'Pagamento concluído, você receberá a sua compra em jogo em menos de um minuto.',

        'webhook' => 'Novo pagamento na loja',
        'webhook_info' => 'Total: :total, ID: :id (:gateway)',
    ],

    'categories' => [
        'empty' => 'Esta categoria está vazia.',
    ],

    'packages' => [
        'limit' => 'Você comprou o número máximo deste pacote que você pode.',
        'requirements' => 'Você não tem os requisitos para comprar este pacote.',
    ],

    'offers' => [
        'gateway' => 'Método de pagamento',
        'amount' => 'Total',

        'empty' => 'Nenhuma oferta disponível no momento.',
    ],

    'profile' => [
        'payments' => 'Histórico de compras',
        'money' => 'Dinheiro: :balance',
    ],

    'giftcards' => [
        'title' => 'Gift Cards',
        'success' => ':money foi creditado em sua conta',
        'error' => 'Este gift card não existe, expirou ou não pode mais ser usado.',
        'add' => 'Adicionar um gift card',
        'notification' => 'Você recebeu um gift card, o código é :code (:balance).',
    ],
];
