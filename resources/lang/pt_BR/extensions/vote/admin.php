<?php

return [
    'nav' => [
        'title' => 'Votar',
        'settings' => 'Configurações',
        'sites' => 'Sites',
        'rewards' => 'Recompensa',
        'votes' => 'Votos',
    ],

    'permission' => 'Gerenciar plugin de voto',

    'settings' => [
        'title' => 'Configurações da página de votações',

        'count' => 'Contagem de Top Jogadores',
        'display-rewards' => 'Mostrar recompensa da página de votação',
        'ip_compatibility' => 'Ativar compatibilidade IPv4/IPv6',
        'ip_compatibility_info' => 'Esta opção permite que você corrija votos que não são verificados em sites de votação que não aceitam IPv6 enquanto seu site faz ou vice-versa.',
        'commands' => 'Comandos globais',
    ],

    'sites' => [
        'title' => 'Sites',
        'edit' => 'Editar Site: Site',
        'create' => 'Criar site',

        'enable' => 'Ativar o site',
        'delay' => 'Tempo entre votos',
        'minutes' => 'minutos',

        'list' => 'Sites nos quais os votos podem ser verificados',
        'variable' => 'Você pode usar <code>{player}</code> para usar o nome do jogador.',

        'verifications' => [
            'title' => 'Verificação',
            'enable' => 'Habilitar verificação de votos',

            'disabled' => 'As votações neste sítio Web não serão verificadas.',
            'auto' => 'As votações neste local serão verificadas automaticamente.',
            'input' => 'Os votos neste site serão verificados quando a entrada abaixo for preenchida.',

            'pingback' => 'URL de Pingback: :url',
            'secret' => 'Chave secreta',
            'server_id' => 'ID do Server',
            'token' => 'Token',
            'api_key' => 'Chave API',
        ],
    ],

    'rewards' => [
        'title' => 'Recompensa',
        'edit' => 'Editar recompensa :reward',
        'create' => 'Criar recompensa',

        'require_online' => 'Execute comandos quando o usuário estiver online no servidor (somente disponível com o AzLink)',
        'enable' => 'Habilitar prêmios',

        'commands' => 'Você pode usar <code>{player}</code> para usar o nome do jogador, <code>{reward}</code> pelo nome da recompensa e <code>{site}</code> pelo site da votação. Para jogos Steam, você também pode usar <code>{steam_id}</code> e <code>{steam_id_32}</code>. O comando não pode começar com <code>/</code>.',
        'monthly' => 'Classificação dos usuários para dar essa recompensa no final do mês',
        'monthly_info' => 'Dê automaticamente esta recompensa, no final do mês, aos usuários nas posições indicadas no ranking de melhores votantes.',
        'cron' => 'Você deve configurar as tarefas CRON para usar recompensas automáticas no final do mês.',
    ],

    'votes' => [
        'title' => 'Votos',

        'empty' => 'Sem votos este mês.',
        'votes' => 'Contagem de votos',
        'month' => 'Votos contados esse mês',
        'week' => 'Votos contados essa semana',
        'day' => 'Votos contados hoje',
    ],

    'logs' => [
        'vote-sites' => [
            'created' => 'Criado site de votação #:id',
            'updated' => 'Site de voto atualizado #:id',
            'deleted' => 'Site de votação excluído #:id',
        ],

        'vote-rewards' => [
            'created' => 'Criado recompensa de voto #:id',
            'updated' => 'Atualização de recompensa de voto #:id',
            'deleted' => 'Recompensa de voto excluída #:id',
        ],
    ],
];
