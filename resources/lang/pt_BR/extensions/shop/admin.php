<?php

return [
    'nav' => [
        'title' => 'Loja',
        'settings' => 'Configurações',
        'packages' => 'Produtos',
        'gateways' => 'Métodos de Pagamento',
        'offers' => 'Ofertas',
        'coupons' => 'Cupons',
        'giftcards' => 'Gift Cards',
        'discounts' => 'Descontos',
        'payments' => 'Pagamentos',
        'purchases' => 'Compras',
        'statistics' => 'Estatísticas',
    ],

    'permissions' => [
        'admin' => 'Gerenciar plugin da loja',
    ],

    'categories' => [
        'title' => 'Categorias',
        'edit' => 'Editar categoria :category',
        'create' => 'Criar categoria',

        'parent' => 'Categoria parental',
        'delete_error' => 'Uma categoria com produtos não pode ser excluída.',

        'cumulate' => 'Acumular compras nesta categoria',
        'cumulate_info' => 'Os usuários que já compraram um produto nesta categoria receberão um desconto e só pagarão a diferença na compra de um produto mais caro.',
        'enable' => 'Habilitar categoria',
    ],

    'offers' => [
        'title' => 'Ofertas',
        'edit' => 'Editar a oferta :offer',
        'create' => 'Criar oferta',

        'enable' => 'Habilitar oferta',
    ],

    'coupons' => [
        'title' => 'Cupons',
        'edit' => 'Editar cupom :coupon',
        'create' => 'Criar cupom',

        'global' => 'Os cupons devem estar ativos para toda a loja?',
        'cumulate' => 'Permitir usar este cupom com outros cupons',
        'user_limit' => 'Limite de usuários',
        'global_limit' => 'Limites globais',
        'active' => 'Ativo',
        'usage' => 'Abaixo do limite de uso',
        'enable' => 'Habilitar cupom',
    ],

    'giftcards' => [
        'title' => 'Gift Cards',
        'edit' => 'Editar gift card :giftcard',
        'create' => 'Criar um gift card',

        'global_limit' => 'Limite global',
        'active' => 'Ativo',
        'enable' => 'Habilitar gift card',
    ],

    'discounts' => [
        'title' => 'Descontos',
        'edit' => 'Editar desconto :discount',
        'create' => 'Criar desconto',

        'global' => 'Os descontos devem estar ativos para toda a loja?',
        'active' => 'Ativo',
        'enable' => 'Ativar o desconto',
    ],

    'packages' => [
        'title' => 'Produtos',
        'edit' => 'Editar produto :pacote',
        'create' => 'Criar produto',

        'updated' => 'Os produtos foram atualizados.',

        'money' => 'Dinheiro para dar ao usuário após a compra',
        'giftcard' => 'Saldo do cartão de presente a ser criado durante a compra',
        'command' => 'O comando não pode começar com <code>/</code>. Você pode usar <code>{player}</code> para o nome do jogador. Para jogos do Steam, você também pode usar <code>{steam_id}</code> e <code>{steam_id_32}</code>. Os outros espaços reservados disponíveis são: :placeholders.',

        'custom_price' => 'Permitir que o usuário escolha o preço a pagar (o preço do pacote será o mínimo)',
        'require_online' => 'Execute comandos quando o usuário estiver online no servidor (somente disponível com o AzLink)',
        'enable_quantity' => 'Habilitar a quantidade',

        'create_category' => 'Criar categoria',
        'create_package' => 'Criar produto',

        'enable' => 'Habilitar produto',
    ],

    'gateways' => [
        'title' => 'Métodos de Pagamento',
        'edit' => 'Editar gateway :gateway',
        'create' => 'Adicionar gateway',

        'current' => 'Gateways atuais',
        'add' => 'Adicionar um novo gateway',
        'info' => 'Se você estiver tendo problemas com os pagamentos ao usar o Cloudflare ou um firewall, tente seguir as etapas do <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',

        'country' => 'País/região',
        'sandbox' => 'Sandbox',
        'api-key' => 'Chave API',
        'public-key' => 'Chave pública',
        'private-key' => 'Chave privada',
        'secret-key' => 'Chave de segurança',
        'endpoint-secret' => 'Segredo de assinatura',
        'service-id' => 'ID do serviço',
        'client-id' => 'ID do cliente',
        'merchant-id' => 'ID do comerciante',
        'project-id' => 'Projeto ID',
        'env' => 'Ambiente',

        'paypal_email' => 'Endereço de Email PayPal',
        'paypal_info' => 'Por favor, certifique-se de inserir o endereço de e-mail <strong>principal</strong> da conta PayPal.',
        'paysafecard_info' => 'Para poder aceitar pagamentos por paysafecard, você deve ser um parceiro de <a href="https://www.paysafecard.com/en/business/" target="_blank" rel="noopener noreferrer">paysafecard</a>. Existem outros métodos, mas só este é permitido pelo paysafecard.',
        'stripe_info' => 'No painel do Stripe você precisa definir a URL do webhook para <code>:url</code> e selecionar o evento <code>checkout.session.completed</code>.',
        'paymentwall_info' => 'No painel PaymentWall você precisa definir a URL pingback para <code>:url</code>.',
        'xsolla' => 'No painel Xsolla você deve setar o link webhook para <code>:url</code>, habilitar \'ID externo da transação\' nas configurações da \'estação de pagamento\', testar o webhook e então habilitar \'retirada\' nas configurações \'estação de pagamento\'.',

        'enable' => 'Habilitar entradas',
    ],

    'payments' => [
        'title' => 'Pagamentos',
        'show' => 'Pagamento #:pagamento',

        'info' => 'Informações do pagamento',
        'items' => 'Itens comprados',

        'card' => 'Pagamentos da loja',

        'status' => [
            'pending' => 'Pendente',
            'expired' => 'Expirado',
            'chargeback' => 'Chargeback',
            'completed' => 'Concluído',
            'refunded' => 'Reembolsado',
            'error' => 'Erro',
        ],
    ],

    'purchases' => [
        'title' => 'Compras',
    ],

    'settings' => [
        'title' => 'Configurações da loja',
        'enable_home' => 'Habilitar a página inicial da loja',
        'home_message' => 'Mensagem de boas vindas',
        'use_site_money' => 'Permite compras com a moeda do site.',
        'use_site_money_info' => 'Quando ativado, os produtos da loja só podem ser adquiridos com dinheiro do site. Para que os usuários adicionem créditos em sua conta, você pode configurar ofertas na loja.',
        'webhook' => 'Webhook URL do Discord',
        'webhook_info' => 'Quando um usuário faz um pagamento (exceto compras com dinheiro do site!), ele irá criar uma notificação neste webhook. Deixe em branco para desativar.',
        'commands' => 'Comandos globais',
        'recent_payments' => 'Limite de pagamentos recentes a serem exibidos na barra lateral (defina 0 para desativar)',
        'display_amount' => 'Exibir o valor gasto nos pagamentos recentes e no top cliente',
        'top_customer' => 'Exibir os melhores clientes mensais na barra lateral',
    ],

    'logs' => [
        'shop-gateways' => [
            'created' => 'Entrada criada #:id',
            'updated' => 'Entrada #:id atualizada',
            'deleted' => 'Entrada #:id deletada',
        ],

        'shop-packages' => [
            'created' => 'Produto #:id criado',
            'updated' => 'Produto #:id atualizado',
            'deleted' => 'Produto #:id deletado',
        ],

        'shop-offers' => [
            'created' => 'Oferta #:id criada',
            'updated' => 'Oferta #:id atualizada',
            'deleted' => 'Oferta #:id deletada',
        ],

        'shop-giftcards' => [
            'used' => 'Gift card usado #:id (:amount)',
        ],
    ],

    'statistics' => [
        'title' => 'Estatísticas',
        'total' => 'Total',
        'recent' => 'Pagamentos recentes',
        'count' => 'Contagem de pagamentos',
        'estimated' => 'Ganhos estimados',
        'month' => 'Pagamentos durante este mês',
        'month_estimated' => 'Ganhos estimados deste mês',
    ],

];
