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
        'dashboard' => 'Painel de Controle',
        'settings' => [
            'heading' => 'Configurações',
            'settings' => 'Configurações',
            'global' => 'Globais',
            'security' => 'Segurança',
            'performances' => 'Desempenho',
            'seo' => 'SEO',
            'auth' => 'Autenticação',
            'mail' => 'E-mail',
            'maintenance' => 'Manutenção',
            'social' => 'Links Sociais',
            'navbar' => 'Barra de Navegação',
            'servers' => 'Servidores',
        ],

        'users' => [
            'heading' => 'Usuários',
            'users' => 'Usuários',
            'roles' => 'Cargos',
            'bans' => 'Banimentos',
        ],

        'content' => [
            'heading' => 'Conteúdo',
            'pages' => 'Páginas',
            'posts' => 'Postagens',
            'images' => 'Imagens',
            'redirects' => 'Redirecionamentos',
        ],

        'extensions' => [
            'heading' => 'Extensões',
            'plugins' => 'Plugins',
            'themes' => 'Temas',
        ],

        'other' => [
            'heading' => 'Outros',
            'update' => 'Atualização',
            'logs' => 'Logs',
        ],

        'profile' => [
            'profile' => 'Perfil',
        ],

        'back' => 'Voltar ao site',
        'support' => 'Suporte',
        'documentation' => 'Documentação',
    ],

    'delete' => [
        'title' => 'Excluir?',
        'description' => 'Tem certeza de que deseja excluir isso? Você não vai conseguir voltar!',
    ],

    'footer' => 'Criado por :azuriom &copy; :year. Design por :startbootstrap.',

    /*
    |
    | Admin pages
    |
    */

    'dashboard' => [
        'title' => 'Painel de Controle',

        'users' => 'Usuários',
        'posts' => 'Postagens',
        'pages' => 'Páginas',
        'images' => 'Imagens',

        'update' => 'Uma nova versão do Azuriom está disponível: :version',
        'http' => 'Seu site não está usando https, você deve habilitá-lo e forçá-lo para sua segurança e a dos usuários.',
        'cloudflare' => 'Se estiver usando Cloudflare, você deve instalar o plugin Cloudflare Support.',
        'recent_users' => 'Usuários recentes',
        'active_users' => 'Usuários ativos',
        'emails' => 'Os e-mails estão desativados. Se um usuário esquecer sua senha, ele não poderá redefini-la. Você pode habilitar e-mails nas <a href=":url">configurações de e-mail</a>.',
    ],

    'settings' => [
        'index' => [
            'title' => 'Configurações globais',

            'name' => 'Nome do Site',
            'url' => 'URL do Site',
            'description' => 'Descrição do Site',
            'meta' => 'Palavras-chave meta',
            'meta_info' => 'As palavras-chave devem ser separadas por uma vírgula.',
            'favicon' => 'Favicon',
            'background' => 'Fundo do site',
            'logo' => 'Sua logo',
            'timezone' => 'Fuso horário',
            'locale' => 'Localidade',
            'money' => 'Nome da moeda do site',
            'copyright' => 'Direitos autorais',
            'user_money_transfer' => 'Habilitar transferência de dinheiro entre usuários',
            'site_key' => 'Chave do site para azuriom.com',
            'site_key_info' => 'A chave do site azuriom.com é necessária para instalar as extensões premium adquiridas no mercado. Você pode obter sua chave de site no seu <a href="https://market.azuriom.com/profile" target="_blank" rel="noopener norefferer">perfil Azuriom</a>.',
            'webhook' => 'Postar URL Webhook Discord',
            'webhook_info' => 'Um webhook do Discord será enviado para este URL ao criar uma nova postagem, se a data de publicação não estiver no futuro. Deixe em branco para desativar.',
        ],

        'security' => [
            'title' => 'Configurações de segurança',

            'captcha' => [
                'title' => 'Captcha',
                'site_key' => 'Chave do site',
                'secret_key' => 'Chave secreta',
                'recaptcha' => 'Você pode obter chaves reCAPTCHA no site <a href="https://www.google.com/recaptcha/" target="_blank" rel="noopener noreferrer"> Google reCAPTCHA</a>. Você precisa usar chaves reCAPTCHA <strong>v2 invisível</strong>.',
                'hcaptcha' => 'Você pode obter chaves hCaptcha no <a href="https://www.hcaptcha.com/" target="_blank" rel="noopener noreferrer"> site hCaptcha</a>.',
                'turnstile' => 'É possível obter Chaves de Ativação no <a href="https://dash.cloudflare.com/?to=/:account/turnstile" target="_blank" rel="noopener noreferrer">Painel do Cloudflare</a>. Você deve selecionar o widget "Gerenciado".',
            ],

            'hash' => 'Algorítimo hash',
            'hash_error' => 'Este algoritmo de hash não é suportado pela sua versão atual do PHP.',
            'force_2fa' => 'Exigir 2FA para acesso ao painel de administração',
        ],

        'performances' => [
            'title' => 'Configurações de performance',

            'cache' => [
                'title' => 'Limpar Cache',
                'clear' => 'Limpar Cache',
                'description' => 'Limpar o cache do site.',
                'error' => 'Erro ao limpar o cache.',
            ],

            'boost' => [
                'title' => 'AzBoost',
                'description' => 'AzBoost melhora a performance do seu site ao adicionar mais uma camada de cache exclusivo.',
                'info' => 'Se você encontrar alguns problemas após ativar uma extensão, você deve recarregar o cache.',

                'enable' => 'Habilitar AzBoost',
                'disable' => 'Desativar AzBoost',
                'reload' => 'Recarregar AzBoost',

                'status' => 'O AzBoost é atualmente :status.',
                'enabled' => 'ativado',
                'disabled' => 'desativado',

                'error' => 'Erro ao ativar o AzBoost.',
            ],
        ],

        'seo' => [
            'title' => 'Configurações de SEO',

            'html' => 'Você pode incluir HTML no <code>&lt;head&gt;</code> ou <code>&lt;body&gt;</code> de todas as páginas (ex. para cookie banner ou análise do site) criando um arquivo chamado <code>head.blade.php</code> ou <code>body.blade.php</code> na pasta <code>resources/views/custom//</code>.',
            'home_message' => 'Mensagem de boas vindas',

            'welcome_alert' => [
                'enable' => 'Ativar pop-up de boas-vindas?',
                'message' => 'Mensagem Popup de Boas-vindas',
                'info' => 'Este pop-up será exibido na primeira vez que um usuário visita o site.',
            ],
        ],

        'auth' => [
            'title' => 'Autenticação',

            'conditions' => 'Condições a serem aceitas no registro',
            'conditions_info' => 'Links no formato Markdown, por exemplo: <code>Eu aceito as [condições](/conditions-link)) e a [política de privacidade](/privacy-policy)</code>',
            'registration' => 'Habilitar registro de usuário',
            'registration_info' => 'Ainda pode ser possível se registrar através de plugins.',
            'api' => 'Ativar API de Autenticação',
            'api_info' => 'Esta API permite que você adicione uma autenticação personalizada ao seu servidor de jogo. Para servidores do Minecraft usando um launcher, você pode usar o <a href="https://github.com/Azuriom/AzAuth" target="_blank" rel="noopener noreferrer">AzAuth</a> para uma integração fácil e rápida.',
            'user_change_name' => 'Permitir que os usuários mudem de nome de usuário a partir do seu perfil',
            'user_delete' => 'Permitir que os usuários excluam sua conta do seu perfil',
        ],

        'mail' => [
            'title' => 'Configurações de e-mail',
            'from' => 'Endereço de e-mail usado para enviar e-mails.',
            'mailer' => 'Tipo de E-Mail',
            'mailer_info' => 'O Azuriom suporta SMTP e o Sendmail para enviar emails. Você pode encontrar mais informações sobre as configurações de e-mail em nossa <a href="https://azuriom.com/docs" target="_blank" rel="noopener noreferrer">documentação</a>.',
            'disabled' => 'Quando os e-mails estão desativados, usuários não poderão redefinir a sua senha se a esquecerem.',
            'sendmail' => 'Usar o Sendmail não é recomendado e você deve, em vez disso, usar um servidor SMTP quando possível.',
            'smtp' => [
                'host' => 'Endereço do Host SMTP',
                'port' => 'Porta do Host SMTP',
                'encryption' => 'Protocolo de Criptografia',
                'username' => 'Usuário do Servidor SMTP',
                'password' => 'Senha do Servidor SMTP',
            ],
            'verification' => 'Ativar verificação de endereço de e-mail do usuário',
            'send' => 'Enviar um e-mail de teste',
            'sent' => 'O e-mail de teste foi enviado com sucesso.',
            'missing' => 'Nenhum endereço de e-mail foi especificado em sua conta.',
        ],

        'maintenance' => [
            'title' => 'Configurações de manutenção',

            'enable' => 'Habilitar manutenção',
            'message' => 'Mensagem de manutenção',
            'global' => 'Habilitar manutenção em todo o site',
            'paths' => 'Caminhos para bloquear durante a manutenção',
            'info' => 'Você pode usar <code>/*</code> para bloquear todas as páginas que começam com o mesmo caminho. Por exemplo, <code>/news/*</code> irá bloquear o acesso a todas as notícias.',
        ],

        'updated' => 'As configurações foram atualizadas.',
    ],

    'navbar_elements' => [
        'title' => 'Barra de Navegação',
        'edit' => 'Editar elemento :elemento da barra de navegação',
        'create' => 'Criar elemento na barra de navegação',

        'restrict' => 'Limite os cargos que poderão ver este elemento',
        'dropdown' => 'Você pode adicionar elementos a esta lista suspensa quando este elemento for salvo.',

        'fields' => [
            'home' => 'Página Inicial',
            'link' => 'Link externo',
            'page' => 'Página',
            'post' => 'Post',
            'posts' => 'Lista de posts',
            'plugin' => 'Plugin',
            'dropdown' => 'Lista suspensa',
            'new_tab' => 'Abrir em uma nova aba',
        ],

        'updated' => 'Barra de navegação atualizada.',
        'not_empty' => 'Você não pode excluir dropdown com elementos.',
    ],

    'social_links' => [
        'title' => 'Links sociais',
        'edit' => 'Editar link social :link',
        'create' => 'Adicionar link social',
    ],

    'servers' => [
        'title' => 'Servidores',
        'edit' => 'Editar servidor:server',
        'create' => 'Adicionar servidor',

        'default' => 'Servidor padrão',
        'default_info' => 'O número de jogadores conectados do servidor padrão será exibido no site se o tema atual o suporta.',

        'home_display' => 'Exibir este servidor na página inicial',
        'url' => 'URL do botão Juntar-se',
        'url_info' => 'Deixe em branco para exibir o endereço do servidor. Pode ser um link para baixar o jogo/launcher ou uma URL para entrar no servidor como <code>steam://connect/&lt;ip&gt;</code>.',

        'ping_info' => 'O link ping não precisa de um plugin, mas você não pode executar comandos com ele.',
        'query_info' => 'Com o link query, não é possível executar comandos no servidor.',

        'query_port_info' => 'Pode estar vazio se é o mesmo que a porta do jogo.',

        'verify' => 'Testar comandos instantâneos',

        'rcon_password' => 'Senha Rcon',
        'rcon_port' => 'Porta do Rcon',
        'query_port' => 'Source Query Porta',
        'unturned_info' => 'Você precisa usar o tipo RCON SRCDS no OpenMod. RCON do RocketMod não é compatível!',

        'azlink' => [
            'port' => 'Porta do AzLink',

            'link' => 'Para vincular seu servidor ao seu site usando o AzLink:',
            'link1' => '<a href="https://azuriom.com/azlink">Baixe o plugin AzLink</a> e instale-o no seu servidor.',
            'link2' => 'Reinicie o servidor.',
            'link3' => 'Executar esse comando no servidor: ',

            'info' => 'Se você estiver tendo problemas com o AzLink ao usar o Cloudflare ou um firewall, tente seguir as etapas do <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
            'command' => 'Você pode vincular seu servidor ao seu site com o comando: ',
            'port_command' => 'Se você estiver usando uma porta AzLink diferente do padrão, você deve configurá-la com o comando: ',
            'ping' => 'Ativar comandos instantâneos (requer uma porta aberta no servidor)',
            'ping_info' => 'Quando os comandos instantâneos não estão habilitados, os comandos serão executados com um atraso de 30 segundos para 1 minuto.',
            'custom_port' => 'Use uma porta AzLink personalizada',

            'error' => 'A conexão com o servidor falhou, o endereço e/ou porta estão incorretos ou a porta está fechada.',
            'badresponse' => 'Falha na conexão com o servidor (código :code), o token é inválido ou o servidor está mal configurado. Você pode refazer o comando do link para corrigir isso.',
        ],

        'players' => ':count jogador|:count jogadores',
        'offline' => 'Offline',

        'connected' => 'A conexão com o servidor foi feita com sucesso!',
        'error' => 'A conexão com o servidor falhou: :error',

        'type' => [
            'mc-ping' => 'Ping Minecraft',
            'mc-rcon' => 'RCON Minecraft',
            'mc-azlink' => 'AzLink',
            'source-query' => 'Source Query',
            'source-rcon' => 'RCON Source',
            'steam-azlink' => 'AzLink',
            'bedrock-ping' => 'Bedrock Ping',
            'bedrock-rcon' => 'Bedrock RCON',
            'fivem-status' => 'FiveM status',
            'fivem-rcon' => 'FiveM RCON',
            'rust-rcon' => 'RCON do Rust',
            'flyff-server' => 'Servidor de Flyff', // TODO make this dynamic
        ],
    ],

    'users' => [
        'title' => 'Usuários',
        'edit' => 'Editar usuário :user',
        'create' => 'Criar usuário',

        'registered' => 'Registrado em',
        'last_login' => 'Ultimo login em',
        'ip' => 'Endereço IP',

        'admin' => 'Admin',
        'banned' => 'Banido',
        'deleted' => 'Excluído',

        'ban' => 'Banir',
        'unban' => 'Desbanir',
        'delete' => 'Deletar',

        'alert-deleted' => 'Este usuário foi excluído, não pode ser editado.',
        'alert-banned' => [
            'title' => 'Este usuário está banido no momento:',
            'banned-by' => 'Banido por: :author',
            'reason' => 'Motivo: :reason',
            'date' => 'Data: :date',
        ],

        'edit_profile' => 'Editar perfil',

        'info' => 'Informação do usuário',

        'ban-title' => 'Banir :user',
        'ban-description' => 'Você tem certeza que quer banir este usuário?',

        'email' => [
            'verify' => 'Verificar e-mail',
            'verified' => 'Endereço de e-mail verificado',
            'date' => 'Sim, em :date',
            'verify_success' => 'O endereço de e-mail foi verificado.',
        ],

        '2fa' => [
            'title' => 'Autenticação de Dois Fatores',
            'secured' => '2FA habilitado',
            'disable' => 'Desativar 2FA',
            'disabled' => 'A Autenticação de Dois Fatores foi desativada.',
        ],

        'password' => [
            'title' => 'Última alteração de senha',
            'force' => 'Forçar alteração',
            'forced' => 'É necessário alterar a senha',
        ],

        'status' => [
            'banned' => 'O usuário está banido agora.',
            'unbanned' => 'O usuário está desbanido agora.',
        ],

        'discord' => 'Vincular Conta do Discord',

        'notify' => 'Enviar uma notificação',
        'notify_info' => 'Enviar uma notificação para este usuário',
        'notify_all' => 'Enviar uma notificação para todos os usuários',
    ],

    'roles' => [
        'title' => 'Cargos',
        'edit' => 'Editar cargo :role (#:id)',
        'create' => 'Criar cargo',

        'info' => '(ID: :id, Poder: :power)',

        'default' => 'Padrão',
        'admin' => 'Admin',
        'admin_info' => 'Quando o grupo é administrador, ele tem todas as permissões.',

        'updated' => 'Os cargos foram atualizados.',
        'unauthorized' => 'Este cargo é maior que o seu próprio cargo.',
        'add_admin' => 'Você não pode adicionar a permissão de administrador a um cargo.',
        'remove_admin' => 'Você não pode remover a permissão de administrador do seu cargo.',
        'delete_default' => 'Este cargo não pode ser deletado.',
        'delete_own' => 'Você não pode deletar seu cargo.',

        'discord' => [
            'title' => 'Vincular Cargos do Discord',
            'enable' => 'Ativar link de cargos do Discord',
            'enable_info' => 'Uma vez ativado, edite o cargo no Discord e adicione um requisito na guia <b>Links</b>. Os usuários podem obter suas funções no menu do servidor, em <b>Funções Vinculadas</b>.',
            'info' => 'Você precisa criar um aplicativo no <a href="https://discord.com/developers/applications" target="_blank">Discord developer dashboard</a> e definir o <b>Linked Role Verification URL</b> para <code>:url</code>',
            'oauth' => 'Então, no <b>OAuth2</b> e no <b>General</b>, você precisa adicionar <code>:url</code> no <b>Redirects</b>.',
            'token_info' => 'O token do Bot pode ser obtido criando um bot para sua aplicação, na guia <b>Bot</b> à esquerda do painel de desenvolvedores do Discord.',

            'token' => 'Discord Bot Token',
            'client_id' => 'Discord Client ID',
            'client_secret' => 'Discord Client Secret',
        ],
    ],

    'permissions' => [
        'create-comments' => 'Comentar em uma postagem',
        'delete-other-comments' => 'Deletar um comentário de postagem de outro usuário',
        'maintenance-access' => 'Acessar o site durante uma manutenção',
        'admin-access' => 'Acesso ao painel de administração',
        'admin-logs' => 'Visualize e gerencie os registros do site',
        'admin-images' => 'Ver e gerenciar imagens',
        'admin-navbar' => 'Ver e gerenciar a barra de navegação',
        'admin-pages' => 'Ver e gerenciar páginas',
        'admin-redirects' => 'Visualizar e gerenciar redirecionamentos',
        'admin-posts' => 'Ver e gerenciar postagens',
        'admin-settings' => 'Ver e gerenciar configurações',
        'admin-users' => 'Ver e gerenciar usuários',
        'admin-themes' => 'Ver e gerenciar temas',
        'admin-plugins' => 'Ver e gerenciar plugins',
    ],

    'bans' => [
        'title' => 'Banimentos',

        'by' => 'Banido por',
        'reason' => 'Motivo',
        'removed' => 'Removido :date por :user',
    ],

    'posts' => [
        'title' => 'Postagens',
        'edit' => 'Editar publicação :post',
        'create' => 'Criar publicação',

        'published_info' => 'Esta postagem não será visível publicamente até esta data.',
        'pin' => 'Fixar esta postagem',
        'pinned' => 'Fixado',
        'feed' => 'Um feed RSS/Atom para os posts está disponível em <code>:rss</code> e <code>:atom</code>.',
    ],

    'pages' => [
        'title' => 'Páginas',
        'edit' => 'Editar página #:page',
        'create' => 'Criar página',

        'enable' => 'Habilitar a página',
        'restrict' => 'Limitar cargos que poderão acessar esta página',
    ],

    'redirects' => [
        'title' => 'Redirecionamentos',
        'edit' => 'Editando redirecionamento :redirect',
        'create' => 'Criando redirecionamento',

        'enable' => 'Ativar redirecionamento',
        'source' => 'Fonte',
        'destination' => 'Destino',
        'code' => 'Código de status',

        '301' => '301 - Redirecionamento permanente',
        '302' => '302 - Redirecionamento temporário',
    ],

    'images' => [
        'title' => 'Imagens',
        'edit' => 'Editar imagem :image',
        'create' => 'Enviar imagem',
        'help' => 'Se as imagens não estiverem carregando, tente seguir as etapas do <a href="https://azuriom.com/docs/faq" target="_blank" rel="noopener norefferer">FAQ</a>.',
    ],

    'extensions' => [
        'buy' => 'Compre por :price',
    ],

    'plugins' => [
        'title' => 'Plugins',

        'list' => 'Plugins instalados',
        'available' => 'Plugins disponíveis',

        'requirements' => [
            'api' => 'Esta versão do plugin não é compatível com Azuriom v:version.',
            'azuriom' => 'Esse plugin não é compatível com a sua versão do Azuriom.',
            'game' => 'Este plugin não é compatível com o jogo :game.',
            'plugin' => 'O plugin ":plugin" está ausente ou sua versão não é compatível com este plugin.',
        ],

        'reloaded' => 'Os plugins foram recarregados.',
        'enabled' => 'O plugin foi ativado.',
        'disabled' => 'O plugin foi desativado.',
        'updated' => 'O plugin foi atualizado.',
        'installed' => 'O plugin foi instalado.',
        'deleted' => 'O plugin foi deletado.',
        'delete_enabled' => 'O plugin deve ser desativado antes de poder ser excluído.',
    ],

    'themes' => [
        'title' => 'Temas',

        'current' => 'Tema atual',
        'author' => 'Autor: :author',
        'version' => 'Versão: :version',
        'list' => 'Temas instalados',
        'available' => 'Temas disponíveis',
        'no-enabled' => 'Você não tem nenhum tema ativado.',
        'legacy' => 'Esta versão do tema não é compatível com o Azuriom v:version.',

        'config' => 'Editar configuração',
        'disable' => 'Desativar tema',

        'reloaded' => 'Os temas foram recarregados.',
        'no_config' => 'Este tema não tem configurações.',
        'config_updated' => 'A configuração do tema foi atualizada.',
        'invalid' => 'Este tema é inválido (o nome da pasta do tema deve ser o id do tema).',
        'updated' => 'O tema foi atualizado.',
        'installed' => 'O tema foi instalado.',
        'deleted' => 'O tema foi deletado.',
        'delete_current' => 'Você não pode excluir o tema atual.',
    ],

    'update' => [
        'title' => 'Atualizar',

        'has_update' => 'Atualização disponível',
        'no_update' => 'Não há atualizações disponíveis',
        'check' => 'Verificar atualizações',

        'update' => 'A versão <code>:last-version</code> do Azuriom está disponível e você está na versão <code>:version</code>.',
        'changelog' => 'O changelog está disponível <a href=":url" target="_blank" rel="noopener noreferrer">aqui</a>.',
        'download' => 'A última versão do Azuriom está pronta para baixar.',
        'install' => 'A última versão do Azuriom foi baixada e está pronta para ser instalada.',

        'backup' => 'Antes de atualizar o Azuriom, você deve fazer um backup do seu site!',

        'latest_version' => 'Você está executando a última versão do Azuriom: <code>:version</code>.',
        'latest' => 'Você está usando a última versão do Azuriom.',

        'downloaded' => 'A versão mais recente foi baixada, você pode instalá-la.',
        'installed' => 'A atualização foi instalada com sucesso.',
    ],

    'logs' => [
        'title' => 'Logs',

        'clear' => 'Limpar logs antigos (15d+)',
        'cleared' => 'Os logs antigos foram excluídos.',
        'changes' => 'Mudanças',
        'old' => 'Valor antigo',
        'new' => 'Novo valor',

        'pages' => [
            'created' => 'Página criada #:id',
            'updated' => 'Página atualizada #:id',
            'deleted' => 'Página excluída #:id',
        ],

        'posts' => [
            'created' => 'Postagem criada #:id',
            'updated' => 'Postagem atualizada #:id',
            'deleted' => 'Postagem deletada #:id',
        ],

        'images' => [
            'created' => 'Imagem criada #:id',
            'updated' => 'Imagem atualizada #:id',
            'deleted' => 'Imagem deletada #:id',
        ],

        'redirects' => [
            'created' => 'Redirecionamento criado #:id',
            'updated' => 'Redirecionamento atualizado #:id',
            'deleted' => 'Redirecionamento excluído #:id',
        ],

        'roles' => [
            'created' => 'Cargo criado #:id',
            'updated' => 'Cargo atualizado #:id',
            'deleted' => 'Cargo deletado #:id',
        ],

        'servers' => [
            'created' => 'Servidor criado #:id',
            'updated' => 'Servidor atualizado #:id',
            'deleted' => 'Servidor deletado #:id',
        ],

        'users' => [
            'updated' => 'Usuário atualizado #:id',
            'deleted' => 'Usuário deletado #:id',
            'transfer' => 'Envie dinheiro :money para o usuário #:id',

            'login' => 'Login bem-sucedido de :ip (2FA: :2fa)',
            '2fa' => [
                'enabled' => 'Ativar autenticação de dois fatores',
                'disabled' => 'Desativar a autenticação de dois fatores',
            ],
        ],

        'settings' => [
            'updated' => 'Configurações atualizadas',
        ],

        'updates' => [
            'installed' => 'Atualização instalada do Azuriom',
        ],

        'plugins' => [
            'enabled' => 'Plugin habilitado',
            'disabled' => 'Plugin desativado',
        ],

        'themes' => [
            'changed' => 'Tema alterado',
            'configured' => 'Configuração do tema atualizada',
        ],
    ],

    'errors' => [
        'back' => 'Voltar para o Painel',
        '404' => 'Página não encontrada',
        'info' => 'Parece que você encontrou uma falha na matrix...',
        '2fa' => 'Você deve habilitar a autenticação de dois fatores para acessar esta página.',
    ],
];
