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

<h1>INSTRU&Ccedil;&Otilde;ES</h1>
<ol>
<li>Crie a base de dados executando no MySQL o script que est&aacute; em&nbsp;htdocs\api-rt7\sql\scripts.sql</li>
<li>Execute o localhost:&nbsp;<a href="http://localhost/api-rt7/">http://localhost{sua_porta}/api-rt7/</a>. Voc&ecirc; dever&aacute; ver a seguinte mensagem:&nbsp;
<h1>Page Not Found</h1>
<p>The page you are looking for could not be found. Check the address bar to ensure your URL is spelled correctly. If all else fails, you can visit our home page at the link below.</p>
Esta &eacute; uma mensagem t&iacute;pica do Slim e significa que est&aacute; tudo ok. O servidor n&atilde;o encontrou a p&aacute;gina porque n&atilde;o h&aacute; uma rota parametrizada para este link. Se voc&ecirc; digitar:&nbsp;<a href="http://localhost/api-rt7/">http://localhost{sua_porta}/api-rt7/</a>index.php/noticia, voc&ecirc; receber&aacute; um array vazio. Trata-se de uma rota que retorna um json com as not&iacute;cias cadastradas, como n&atilde;o h&aacute; nenhuma ainda, o retorno &eacute; vazio.</li>
<li>Instale um client REST. Sugest&atilde;o:&nbsp;<a href="https://insomnia.rest/download/">https://insomnia.rest/download/</a></li>
<li></li>
</ol>
