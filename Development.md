#1º bug - php artisan serve não funciona. foi necessário o $ php artisan serve --host 0.0.0.0 

#2º verbos http

    GET - solicita a representação de um recurso específico. Requisições utilizando o método GET devem retornar apenas dados.

    POST - é utilizado para submeter uma entidade a um recurso específico, frequentemente causando uma mudança no estado do recurso ou efeitos colaterais no servidor.

    PUT - substitui todas as atuais representações do recurso de destino pela carga de dados da requisição.

    DELETE - remove um recurso específico.

    PATCH - é utilizado para aplicar modificações parciais em um recurso.

#3 Migrations são controles de versão do banco de dados e permite que adicione tabelas e colunas no seu banco sem muita dificuldade

#4 fui verificar meu phpMyAdmin e está dando as seguintes falhas:
 
mysqli_real_connect(): (HY000/1045): Access denied for user 'phpmyadmin'@'localhost' (using password: YES)
A conexão para o controle do usuário, como definida nas configurações, falhou.(ainda não sei como resolver)

#5 linux é chato com segurança, terei que saber como ter permissão para alterar a pasta para resolver o phpMyAdmin

#6 é necessário ter acesso as pastas pelo terminal e não faço ideia de como entrar numa pasta raiz pelo terminal

#7 vou deixar esse problema como está, por hora. 
 
#8º criando a migration contats. database/migrations/contacts.php

#9º antes > configurando banco de dados
    - mysql -u -root -p
    \g CREATE DATA BASE migration  -> esse comando deu erro. -> criei o banco de dados migration na mão pelo myadmin


#10º configurando o .env

#11 criando a model. - A model é usada para interagir com as tabelas. /app/Models/contact.php

#12 criando os controllers. - lógica das requisições em uma única classe    /app/http/controllers/ContactController (FALTA!!!)

#13 instalando o pacote laravel/ui - $ composer require laravel/ui

#14 instalando o Vue e o esqueleto básico de autentaticação 
(
    php artisan ui vue --auth
    npm install
    npm run dev
)

#15 comando $ npm run dev deu bug, pois meu node estava desatualizado (Error: You are using an unsupported version of Node. Please update to at least Node v12.14)

#16 instalando o nvm para resolver a questão com o node. Now using node v16.7.0

#17 erro com o comando "npm run dev" persiste, mesmo com a atualização do node

#18 preparando rota e template para utilizar o vue.js  /routes/web.php

#19 criando pasta na resources/views o arquivo de nome vue-teste.blade.php

#20 criando componente /resource/js/components/lista/lista.vue

#21 editar o arquivo /resource/js/componentes/app.js, incluindo a seguinte linha :Vue.component('janela-modal', require('./components/lista/lista.vue').default);

#22 o comando (npm run dev) continua a dar erro. preciso utilizar esse comando para "compilar" o código do componente

#23 bug resolvido. aparentemente eu ainda precisava efetuar algumas atualizações no node para que funcionasse.

#24 faltam{
    - Funções do Controller
    - Páginas no vue.js
    - verificar conexão com banco com as migrations (FEITO)
    - lembrar que tem uma problema em rodar o php artisan serve, pois a porta http://127.0.0.1:8000 não está funcionando. Portanto 
    o que está sendo usado é microserviço com o comando (php artisan serve --host 0.0.0.0)  - RESOLVIDO
}

#25 testando a migration ($ php artisan migrate) 

#26 resolvendo o bug da migration. Acredito que o erro foi porque criei o banco manualmente -- vou excluir o banco

#27 exluí migration contact que havia criado, já que na execução do comando (php artisan migrate) foi criado automaticamente uma migration create_contacts_table. e populei as informações que estavam no antigo contact nessa nova migration criado

#28 agora deu esse erro:
SQLSTATE[42S01]: Base table or view already exists: 1050 Table 'users' already exists (SQL: create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `email_verified_at` timestamp null, `password` varchar(255) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci')

aparentemente, o comando (php artisan migrate) está direcionando para outra tabela do banco de dados chamada users.

acho que não deveria ter excluído a migration contact

#29 criando novamente a migration contacts (php artisan make:migration create_table)

#30 criei o migrate "create_table_diary.php" - acredito que agora deva funcionar

#31 o erro persiste. acredito que seja pq existem migrations baixados do próprio laravel que estão impedindo a minha aplicação criar a tabela e inserir informações nela. Apaguei a migration

- create_useres
- create_password_resets_table
- create_personal_access_tokens_table
- create_table

#32 o erro está apontando para um if de uma pasta do vendor que trata de métodos que não existem: 

   BadMethodCallException 

  Method Illuminate\Database\Schema\Blueprint::int does not exist.

  at vendor/laravel/framework/src/Illuminate/Macroable/Traits/Macroable.php:103
     99▕      */
    100▕     public function __call($method, $parameters)
    101▕     {
    102▕         if (! static::hasMacro($method)) {
  ➜ 103▕             throw new BadMethodCallException(sprintf(
    104▕                 'Method %s::%s does not exist.', static::class, $method
    105▕             ));
    106▕         }
    107▕ 

  • Bad Method Call: Did you mean Illuminate\Database\Schema\Blueprint::point() ? 

  1   database/migrations/2021_08_25_040208_create_table_diary.php:20
      Illuminate\Database\Schema\Blueprint::__call()

      +4 vendor frames 
  6   database/migrations/2021_08_25_040208_create_table_diary.php:22
      Illuminate\Support\Facades\Facade::__callStatic()


#33 acredito que o erro está em eu ter definido o tipo da propriedade 'number' como int, deveria ter colocado interger

#34 RESOLVEU!!! 

#34 agora vou para o teste das funções do controller  (agrupa requisições relacionadas, manipulando sua lógica em uma única classe)

    index – Lista os dados da tabela
    show – Mostra um item específco
    create – Retorna a View para criar um item da tabela
    store – Salva o novo item na tabela
    edit – Retorna a View para edição do dado
    update – Salva a atualização do dado
    destroy – Remove o dado


#35 estou tendo dificuldade com a função:
    public function index()
    {
        $contacts = contact::orderBy('created_at', 'desc')->paginate(10);
        return view('contacts.index',['contacts' => $contacts]);
    }

    Aparentemente, quando define a rota: 
    
    Route::get('/home', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');  no /routes/web.php o browser conseguiu entrar até a função index do ContactContoller, no entanto, não está aparecendo o determinado erro:

    Error
Class 'App\contact' not found 

o curioso é que em momento nenhum tive a intenção que a função fosse buscar uma classe App\contact

#36 o erro era a direção no ContactController

#37 ao chamar a função index no ContactController aparece o seguinte erro:

SQLSTATE[42S02]: Base table or view not found: 1146 Table 'migration.contact' doesn't exist (SQL: select count(*) as aggregate from `contact`) 

#38 resolvido. o problema era o nome da migration, estava no plural

#39 deu esse erro agora:

InvalidArgumentException
View [contact.index] not found. 

Falta (
    - Funções do Controller
    - Páginas no vue.js
)



LEMBRETE - verificar resources depois

