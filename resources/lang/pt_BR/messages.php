<?php

return [

    'lang' => 'Português do Brasil',

    'date' => [
        'default' => 'j \d\e F \d\e Y',
        'full' => 'j \d\e F \d\e Y \à\s G:i',
        'compact' => 'd/m/Y \à\s g:i',
    ],

    'nav' => [
        'toggle' => 'Alterar navegação',
        'profile' => 'Perfil',
        'admin' => 'Painel Admin',
    ],

    'actions' => [
        'add' => 'Adicionar',
        'back' => 'Voltar',
        'browse' => 'Navegar',
        'cancel' => 'Cancelar',
        'choose_file' => 'Escolha o arquivo',
        'close' => 'Fechar',
        'comment' => 'Comentar',
        'continue' => 'Continuar',
        'copy' => 'Copiar',
        'create' => 'Criar',
        'delete' => 'Deletar',
        'disable' => 'Desabilitar',
        'download' => 'Baixar',
        'duplicate' => 'Duplicar',
        'edit' => 'Editar',
        'enable' => 'Habilitar',
        'generate' => 'Gerar',
        'install' => 'Instalar',
        'refresh' => 'Atualizar',
        'reload' => 'Recarregar',
        'remove' => 'Remover',
        'save' => 'Salvar',
        'search' => 'Buscar',
        'send' => 'Enviar',
        'show' => 'Mostrar',
        'update' => 'Atualizar',
        'upload' => 'Enviar',
    ],

    'fields' => [
        'action' => 'Ações',
        'address' => 'Endereço',
        'author' => 'Autor',
        'category' => 'Categoria',
        'color' => 'Cor',
        'content' => 'Conteúdo',
        'date' => 'Data',
        'description' => 'Descrição',
        'enabled' => 'Habilitado',
        'file' => 'Arquivo',
        'game' => 'Jogo',
        'icon' => 'Ícone',
        'image' => 'Imagem',
        'link' => 'Link',
        'money' => 'Dinheiro',
        'name' => 'Nome',
        'permissions' => 'Permissões',
        'port' => 'Porta',
        'price' => 'Preço',
        'published_at' => 'Publicado em',
        'quantity' => 'Quantidade',
        'role' => 'Cargo',
        'server' => 'Servidor',
        'short_description' => 'Descrição Curta',
        'slug' => 'Slug',
        'status' => 'Status',
        'title' => 'Título',
        'type' => 'Tipo',
        'url' => 'URL',
        'user' => 'Usuário',
        'value' => 'Valor',
        'version' => 'Versão',
    ],

    'status' => [
        'success' => 'A ação foi concluída com sucesso!',
        'error' => 'Ocorreu um erro: :error',
    ],

    'range' => [
        'days' => 'Dias',
        'months' => 'Meses',
    ],

    'loading' => 'Carregando...',

    'yes' => 'Sim',
    'no' => 'Não',
    'unknown' => 'Desconhecido',
    'other' => 'Outro',
    'none' => 'Nenhum',
    'copied' => 'Copiado',
    'icons' => 'Você pode encontrar a lista de ícones disponíveis em <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Ícones Bootstrap</a>.',

    'home' => 'Início',
    'servers' => 'Servidores',
    'news' => 'Notícias',
    'welcome' => 'Bem vindo :name',
    'copyright' => 'Provido por <a href="https://azuriom.com" target="_blank" rel="noopener noreferrer">Azuriom</a>.',

    'maintenance' => [
        'title' => 'Manutenção',
        'message' => 'O site está em manutenção no momento.',
    ],

    'theme' => [
        'light' => 'Tema claro',
        'dark' => 'Tema escuro',
    ],

    'captcha' => 'A verificação do captcha falhou, tente novamente.',

    'notifications' => [
        'notifications' => 'Notificações',
        'read' => 'Marcar como visto',
        'empty' => 'Você não tem novas notificações.',
        'level' => 'Level',
        'info' => 'Informação',
        'warning' => 'Atenção',
        'danger' => 'Perigo',
        'success' => 'Sucesso',
    ],

    'clipboard' => [
        'copied' => 'Copiado!',
        'error' => 'CTRL + C para copiar',
    ],

    'server' => [
        'join' => 'Juntar-se',
        'total' => ':count/:max jogador/:count/:max jogadores online',
        'online' => ':count jogador online|:count jogadores online',
        'offline' => 'Servidor está atualmente offline.',
    ],

    'profile' => [
        'title' => 'Meu Perfil',
        'change_email' => 'Alterar endereço de e-mail',
        'change_password' => 'Mudar a senha',
        'change_name' => 'Alterar nome de usuário',

        'delete' => [
            'btn' => 'Excluir minha conta',
            'title' => 'Exclusão de conta',
            'info' => 'Isto irá apagar permanentemente a sua conta e os dados associados. Esta ação não pode ser desfeita.',
            'email' => 'Enviaremos um e-mail de confirmação para confirmar esta operação.',
            'sent' => 'Um link de confirmação foi enviado para o seu endereço de e-mail.',
            'success' => 'Sua conta foi excluída com sucesso!',
        ],

        'email_verification' => 'Seu e-mail não está verificado, por favor, verifique seu e-mail para um link de verificação.',
        'updated' => 'Seu perfil foi atualizado.',

        'info' => [
            'role' => 'Cargo :role',
            'register' => 'Registrado: :date',
            'money' => 'Dinheiro: :money',
            '2fa' => 'Autenticado de 2° fator (2FA): :2fa',
            'discord' => 'Conta do Discord vinculada: :user',
        ],

        '2fa' => [
            'enable' => 'Habilitar 2FA',
            'disable' => 'Desabilitar 2FA',
            'manage' => 'Gerenciar 2FA',
            'info' => 'Escaneie o código QR acima com um aplicativo de autenticação de dois fatores no seu telefone como <a href="https://authy.com/" target="_blank" rel="noopener norefferer">Authy</a>, <a href="https://outercorner.com/secrets-ios/" target="_blank" rel="noopener norefferer">Secrets</a> ou Google Authenticator.',
            'secret' => 'Chave secreta: :secret',
            'title' => 'Autenticação de Dois Fatores',
            'codes' => 'Mostrar códigos de recuperação',
            'code' => 'Código',
            'enabled' => 'A autenticação em duas etapas está ativada no momento. Não se esqueça de salvar seus códigos de recuperação!',
            'disabled' => 'O fator de autenticação em duas etapas foi desativado.',
        ],

        'discord' => [
            'link' => 'Link para o Discord',
            'unlink' => 'Desvincular do Discord',
            'linked' => 'Sua conta do Discord foi vinculada com sucesso.',
        ],

        'money_transfer' => [
            'title' => 'Transferência de dinheiro',
            'user' => 'O usuário não foi encontrado.',
            'balance' => 'Você não tem dinheiro suficiente para fazer esta transferência.',
            'success' => 'O dinheiro foi enviado com sucesso.',
            'notification' => ':user te enviou :money.',
        ],
    ],

    'posts' => [
        'posts' => 'Postagens',
        'posted' => 'Postado dia :date por :user',
        'unpublished' => 'Esta postagem ainda não foi publicada.',
        'read' => 'Leia mais',
    ],

    'comments' => [
        'create' => 'Deixar um comentário',
        'guest' => 'Você deve estar logado para deixar um comentário.',
        'author' => '<strong>:user</strong> comentou na data :date',
        'content' => 'Seu comentário',
        'delete' => 'Excluir?',
        'delete_confirm' => 'Tem certeza que deseja excluir este comentário?',
    ],

    'likes' => 'Curtidas: :count',

    'markdown' => [
        'init' => 'Anexe arquivos arrastando e soltando ou colando da área de transferência.',
        'drag' => 'Arraste e solte a imagem para enviá-la.',
        'drop' => 'Carregando imagem #images_names#...',
        'progress' => 'Enviando #file_name#: #progress#%',
        'uploaded' => 'Carregado #image_name#',

        'size' => 'A imagem #image_name# é muito grande (#image_size#).\nTamanho máximo do arquivo é #image_max_size#.',
        'error' => 'Algo deu errado ao carregar a imagem #image_name#.',
    ],

    'discord_roles' => [
        'id' => [
            'name' => 'ID do Cargo',
            'description' => 'ID do cargo no site.',
        ],

        'power' => [
            'name' => 'Poder do Cargo',
            'description' => 'Poder do cargo no site igual ou maior que',
        ],
    ],
];
