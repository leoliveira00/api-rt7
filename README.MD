<h1>Api REST com PHP + Slim Framework</h1>
<h3>Depend&ecirc;ncias:</h3>
<ul>
<li>Apache + PHP + MySql:
<ul>
<li>Xampp:&nbsp;<a href="https://www.apachefriends.org/pt_br/index.html">https://www.apachefriends.org/pt_br/index.html</a></li>
</ul>
</li>
<li>Composer:&nbsp;<a href="https://getcomposer.org/">https://getcomposer.org/</a></li>
<li>Slim Framework:&nbsp;
<ul>
<li><a href="http://www.slimframework.com/docs/v3/start/installation.html">http://www.slimframework.com/docs/v3/start/installation.html</a></li>
<li>Na pasta raiz do projeto execute: composer require slim\slim "^3.12"</li>
</ul>
</li>
<li>Insomnia (ou outro REST client):&nbsp;
<ul>
<li><a href="https://insomnia.rest/download/">https://insomnia.rest/download/</a></li>
</ul>
</li>
<li>Dumpautoload:
<ul>
<li>Na pasta raiz do projeto execute: composer dumpautoload -o</li>
</ul>
</li>
<li>JWT documenta&ccedil;&atilde;o:&nbsp;<a href="https://jwt.io/">https://jwt.io/</a></li>
<li>Middleware de autentica&ccedil;&atilde;o:
<ul>
<li>Na pasta raiz do projeto execute: composer require tuupola/slim-jwt-auth</li>
</ul>
</li>
<li>Gerar chave de assinatura ex.: echo sha1('minha_chave');
<ul>
<li>Setar a chave gerada em JWT_SECRET_KEY (env.php)</li>
</ul>
</li>
<li>Configurar demais par&acirc;metros de env.php</li>
</ul>
