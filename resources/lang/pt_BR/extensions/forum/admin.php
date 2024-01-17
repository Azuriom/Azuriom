<?php

return [

    'nav' => [
        'settings' => 'Configurações',
        'forums' => 'Fórum',
        'tags' => 'Etiquetas',
    ],

    'settings' => [
        'title' => 'Configurações do fórum',
        'home_message' => 'Mensagem de boas vindas',
        'webhook' => 'URL Webhook Discord',
        'webhook_info' => 'Uma notificação será enviada neste webhook quando uma nova mensagem for publicada. Deixe em branco para desativar',
    ],

    'categories' => [
        'title' => 'Categorias',
        'edit' => 'Editar categoria :category',
        'create' => 'Criar categoria',

        'delete_error' => 'Esta categoria contém fóruns e não pode ser excluída.',
    ],

    'forums' => [
        'title' => 'Fórum',
        'create' => 'Criar fórum',
        'edit' => 'Editar fórum :forum',

        'create_category' => 'Criar categoria',
        'create_forum' => 'Criar fórum',

        'parent' => 'Fórum principal',
        'restricted' => 'Restringir acesso a este fórum apenas a certos papéis',
        'default_tags' => 'Tags padrão',
        'lock' => 'Trancar este fórum',
        'lock_info' => 'Os usuários que não são admin não poderão criar discussões.',
        'private' => 'Fórum privado',
        'private_info' => 'Os usuários só podem ver suas próprias discussões e pinedones.',

        'updated' => 'Ordem dos fóruns atualizada.',
        'delete_error' => 'Um fórum com discussões ou sub-fóruns não pode ser excluído.',
    ],

    'discussions' => [
        'card' => 'Uma discussão no fórum',
    ],

    'posts' => [
        'card' => 'Posts no fórum',

        'recent' => 'Postagens recentes na tela inicial',
        'delay' => 'Tempo entre posts',
        'seconds' => 'segundos',
    ],

    'tags' => [
        'title' => 'Etiquetas',
        'create' => 'Criar etiqueta',
    ],

    'logs' => [
        'forum-discussions' => [
            'deleted' => 'Discussão #:id deletada',
            'pinned' => 'Dicussão #:id está fixada agora',
            'unpinned' => 'Discussão #:id não está mais fixada',
            'locked' => 'Discussão #:id está trancada',
            'unlocked' => 'Discussão #:id destrancada',
        ],

        'forum-posts' => [
            'deleted' => 'Postagem deletada #:id',
        ],

        'forum-categories' => [
            'created' => 'Categoria #:id do fórum criada',
            'updated' => 'Categoria #:id do fórum atualizada',
            'deleted' => 'Categoria #:id do fórum deletada',
        ],

        'forum-forums' => [
            'created' => 'Fórum #:id criado',
            'updated' => 'Fórum #:id atualizado',
            'deleted' => 'Fórum #:id deletado',
        ],
    ],

    'permissions' => [
        'forums' => 'Gerenciar categorias de fórum',
        'discussions' => 'Gerenciar as discussões do fórum (mover, editar, excluir, pin, bloquear)',
        'private' => 'Ver discussões de outros usuários em fóruns privados',
        'delete_own_posts' => 'Excluir os próprios posts do fórum',
        'locked' => 'Criar uma discussão em um fórum bloqueado'
    ],
];
