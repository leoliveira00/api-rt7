<h1>Api REST com PHP + Slim Framework</h1>
<h3>Depend&ecirc;ncias:</h3>
<ul>
<li>Apache + PHP + MySql: Xampp:&nbsp;<a href="https://www.apachefriends.org/pt_br/index.html">https://www.apachefriends.org/pt_br/index.html</a></li>
<li>Composer:&nbsp;<a href="https://getcomposer.org/">https://getcomposer.org/</a></li>
<li>Slim Framework:&nbsp;<a href="http://www.slimframework.com/docs/v3/start/installation.html">http://www.slimframework.com/docs/v3/start/installation.html</a>Na pasta raiz do projeto execute: composer require slim\slim "^3.12"</li>
<li>Insomnia (ou outro REST client):&nbsp;<a href="https://insomnia.rest/download/">https://insomnia.rest/download/</a></li>
<li>Dumpautoload: Na pasta raiz do projeto execute: composer dumpautoload -o</li>
<li>JWT documenta&ccedil;&atilde;o:&nbsp;<a href="https://jwt.io/">https://jwt.io/</a></li>
<li>Middleware de autentica&ccedil;&atilde;o: Na pasta raiz do projeto execute: composer require tuupola/slim-jwt-auth</li>
<li>Gerar chave de assinatura ex.: echo sha1('minha_chave'); Setar a chave gerada em JWT_SECRET_KEY</li>
<li>Configurar demais par&acirc;metros de env.php</li>
</ul>
