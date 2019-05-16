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
<li>Configure a conex&atilde;o em env.php e seta a chave em JWT_SECRET_KEY;</li>
<li>Use o sistema de gerador de hash com Argon2i do php 7.2 executando:
<ul>
<li>echo password_hash('teste123', PASSWORD_ARGON2I);</li>
</ul>
</li>
<li>Insira o novo usu&aacute;rio no banco de dados executando:
<ol>
<li>INSERT INTO usuarios (<br />&nbsp; &nbsp; usr_nome,<br />&nbsp; &nbsp; usr_email,<br />&nbsp; &nbsp; usr_senha<br />) VALUES (<br />&nbsp; &nbsp; 'User 01',<br />&nbsp; &nbsp; 'user@gmail.com',<br />&nbsp; &nbsp; 'sua_senha_hash_gerada'<br />);</li>
</ol>
</li>
<li>Instale um client REST. Sugest&atilde;o:&nbsp;<a href="https://insomnia.rest/download/">https://insomnia.rest/download/</a></li>
<li>Gere uma Secret Key executando:<br />
<ul>
<li>echo sha1('sua_palavra_chave');</li>
</ul>
</li>
<li>Acesse&nbsp;<a href="https://jwt.io/">https://jwt.io/</a>&nbsp;e cole sua secret key no campo espec&iacute;fico em "VERIFY SIGNATURE". Esta chave secreta &eacute; uma seguran&ccedil;a a mais para a autentica&ccedil;&atilde;o JWT e deve ser guardada com a m&aacute;xima seguran&ccedil;a.</li>
<li>Copie o conte&uacute;do de "ENCODED" e configure o ambiente no Insomnia da seguinte maneira:
<ul>
<li>Na configura&ccedil;&atilde;o de ambiente (Ctrl+E), cole este json:
<ul>
<li>{<br /> "baseURL": "http://localhost/api-rt7/index.php",<br /> "token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.vHZa5iIEZgzRwhuyszE_UQhnu-Mc84yfQLP4mA4dHe8"<br />}</li>
<li>onde:
<ul>
<li>baseURL: url da sua aplica&ccedil;&atilde;o no localhost (com o index.php);</li>
<li>token: a chave codificada gerada em&nbsp;jwt.io</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li>Ainda no Insomnia:
<ol>
<li>Crie uma nova pasta (Ctrl+Shift+N) e nomeie como "Autentica&ccedil;&atilde;o";</li>
<li>Dentro da pasta, crie uma nova requisi&ccedil;&atilde;o (Ctrl+N);</li>
</ol>
</li>
</ol>
