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