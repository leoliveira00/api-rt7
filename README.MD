Api REST com PHP + Slim Framework
Dependências:
•	Apache + PHP + MySql: Xampp: https://www.apachefriends.org/pt_br/index.html
•	Composer: https://getcomposer.org/
•	Slim Framework: http://www.slimframework.com/docs/v3/start/installation.html Na pasta raiz do projeto execute: composer require slim\slim "^3.12"
•	Insomnia (ou outro REST client): https://insomnia.rest/download/
•	Dumpautoload: Na pasta raiz do projeto execute: composer dumpautoload -o
•	JWT documentação: https://jwt.io/
•	Middleware de autenticação: Na pasta raiz do projeto execute: composer require tuupola/slim-jwt-auth
•	Gerar chave de assinatura ex.: echo sha1('minha_chave'); Setar a chave gerada em JWT_SECRET_KEY
•	Configurar demais parâmetros de env.php
