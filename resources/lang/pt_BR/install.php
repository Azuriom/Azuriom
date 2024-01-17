<?php

return [
    'title' => 'Instalação',

    'welcome' => 'Azuriom é o <strong>da próxima geração</strong> jogo CMS, é <strong>gratuito</strong> e <strong>de código aberto</strong>, e é um <strong>moderno, alternativa confiável, rápida e segura</strong> ao CMS existente para que você tenha a melhor <strong>experiência web possível</strong>.',

    'back' => 'Voltar',

    'requirements' => [
        'php' => 'PHP :version ou superior',
        'writable' => 'Permissão de escrita',
        'rewrite' => 'Reescrita de URL ativada',
        'extension' => 'Extensão :extension',
        'function' => 'Função :function habilitado',
        '64bit' => '64-bit PHP',

        'refresh' => 'Requisitos de atualização',
        'success' => 'O Azuriom está pronto para ser configurado!',
        'missing' => 'Seu servidor não tem os requisitos necessários para instalar o Azuriom.',

        'help' => [
            'writable' => 'Você pode tentar esse comando para conceder permissão de escrita: <code>:command</code>.',
            'rewrite' => 'Você pode seguir as instruções na <a href="https://azuriom.com/docs/installation" target="_blank" rel="noopener noreferrer">nossa documentação</a> para habilitar a reescrita de URL.',
            'htaccess' => 'O arquivo <code>.htaccess</code> ou <code>public/.htaccess</code> está faltando. Certifique-se de que você ativou arquivos ocultos e que o arquivo está presente.',
            'extension' => 'Você pode tentar este comando para instalar as extensões PHP ausentes: <code>:command</code>.<br>Uma vez feito, reinicie o Apache ou Nginx.',
            'function' => 'Você precisa ativar esta função no arquivo php.ini do PHP, editando o valor de <code>disable_functions</code>.',
        ],
    ],

    'database' => [
        'title' => 'Database',

        'type' => 'Tipo',
        'host' => 'Host',
        'port' => 'Porta',
        'database' => 'Database',
        'user' => 'Usuário',
        'password' => 'Senha',

        'warn' => 'Este tipo de banco de dados não é recomendado e só deve ser usado quando não é possível fazer o contrário.',
    ],

    'game' => [
        'title' => 'Jogo',

        'locale' => 'Localidade',

        'warn' => 'Cuidado, uma vez concluída a instalação, não será possível alterar isso sem reinstalar o Azuriom completamente!',

        'install' => 'Instale',

        'user' => [
            'title' => 'Conta do administrador',

            'name' => 'Nome:',
            'email' => 'Endereço de e-mail',
            'password' => 'Senha',
            'password_confirm' => 'Confirme sua senha',
        ],

        'minecraft' => [
            'premium' => 'Login com a conta da Microsoft (mais seguro, mas requer a compra de Minecraft)',
        ],

        'steam' => [
            'profile' => 'URL do perfil Steam',
            'profile_info' => 'Este usuário Steam será administrador do site.',

            'key' => 'Chave da API Steam',
            'key_info' => 'Você pode encontrar sua chave de API Steam no <a href="https://steamcommunity.com/dev/apikey" target="_blank" rel="noopener noreferrer">Steam</a>.',
        ],
    ],

    'success' => [
        'thanks' => 'Obrigado por escolher o Azuriom !',
        'success' => 'Seu site foi instalado com sucesso, agora você pode usar seu site e fazer algo incrível!',
        'go' => 'Começar',
        'support' => 'Se você gostou do Azuriom e do trabalho que nós fornecemos, por favor, não se esqueça de <a href="https://azuriom.com/support-us" target="_blank" rel="noopener noreferrer">nos apoiar</a>.',
    ],
];
