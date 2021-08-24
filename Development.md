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
    - verificar conexão com banco com as migrations
    - lembrar que tem uma problema em rodar o php artisan serve, pois a porta http://127.0.0.1:8000 não está funcionando. Portanto 
    o que está sendo usado é microserviço com o comando (php artisan serve --host 0.0.0.0)
}