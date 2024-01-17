<?php

return [
    'error' => 'Erro',
    'code' => 'Erro :code',
    'home' => 'Voltar a página inicial',
    'whoops' => 'Oopss !',

    '401' => [
        'title' => 'Acesso negado',
        'message' => 'Você não está autorizado a acessar esta página.',
    ],
    '403' => [
        'title' => 'Proibido(a)',
        'message' => 'Você não tem acesso a acessar esta página.',
    ],
    '404' => [
        'title' => 'Não encontrado',
        'message' => 'A página que você procura não foi encontrada.',
    ],
    '419' => [
        'title' => 'Página expirou',
        'message' => 'Sua sessão expirou. Favor atualizar e tentar novamente.',
    ],
    '429' => [
        'title' => 'Muitos pedidos',
        'message' => 'Você está requisitando muito de nosso servidor. Favor tente novamente mais tarde.',
    ],
    '500' => [
        'title' => 'Erro de servidor',
        'message' => 'Ooopps, alguma coisa não está certa em nossos servidores. Favor tente novamente mais tarde.',
    ],
    '503' => [
        'title' => 'Serviço indisponível',
        'message' => 'Nós estamos fazendo uma manutenção. Voltaremos em breve.',
    ],

    'fallback' => [
        'message' => 'Ocorreu um erro. Por favor aguarde.',
    ],
];
