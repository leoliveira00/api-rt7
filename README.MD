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
<ol>
<li>Ainda no Insomnia:
<ul>
<li>Crie uma nova pasta (Ctrl+Shift+N) e nomeie como "Autentica&ccedil;&atilde;o";</li>
<li>Dentro da pasta, crie uma nova requisi&ccedil;&atilde;o do tipo POST (Ctrl+N) e nomeie como "POST login";
<ul>
<li>Na requisi&ccedil;&atilde;o criada, passe um JSON parecido com este:
<ul>
<li>{ "usr_email": "user@gmail.com" ,"usr_senha": "teste123" ,"expire_date": "2019-05-20 00:00:00"}</li>
</ul>
</li>
<li>Em Bearer, passe o Token criado no Ambiente</li>
<li>Execute a requisi&ccedil;&atilde;o. Voc&ecirc; receber&aacute; de volta o token e um refresh_token. Configure o refresh_token no Ambiente ficando parecido com isto:
<ul>
<li>{<br /> "baseURL": "http://localhost/api-rt7/index.php",<br /> "refresh_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InVzZXJAZ21haWwuY29tIiwicmFtZG9tIjoiNWNkZGVmMWIyNWU2NCJ9.qSl7ElyDrMi6WVrrWajLnOJiCu0QSMFRLkq9Nr0cuR0",<br /> "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsIm5hbWUiOiJVc2VyIDAxIiwiZW1haWwiOiJ1c2VyQGdtYWlsLmNvbSIsImV4cGlyZWRfYXQiOiIyMDE5LTA1LTIwIDAwOjAwOjAwIn0.EBRqgOzldRcN6c6Ows7pT52XditAJQjboJrRuSAdONg"<br />}</li>
<li>Cuidado com as posi&ccedil;&otilde;es invertidas de token e refresh_token neste json</li>
</ul>
</li>
<li>Pronto. Voc&ecirc; est&aacute; autentidado.</li>
</ul>
</li>
<li>Agora, no Insomnia, crie uma pasta "Eventos" e dentro dela, crie as requisi&ccedil;&otilde;es GET, POST, PUT e DEL. N&atilde;o esque&ccedil;a de passar a baseURL/evento e o tokem em Bearer, onde voc&ecirc; pode tamb&eacute;m desabilitar o token para testar a autentica&ccedil;&atilde;o.
<ul>
<li>Exemplo de POST:
<ul>
<li>{ "evt_data":"10/05/2019" ,"evt_descr":"evento teste" ,"evt_flg_ativo":"S"}</li>
</ul>
</li>
<li>Exemplo de PUT:
<ul>
<li>{ "evt_id": 1 ,"evt_data":"10/05/2019" ,"evt_descr":"evento teste 2" ,"evt_flg_ativo":"S"}</li>
</ul>
</li>
<li>Exemplo de DEL:
<ul>
<li>{ evt_id": 5}</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
</ol>
<p>O mesmo procedimento dos eventos pode ser feito para as not&iacute;cias colocando-se "/noticia" na url, por&eacute;m a requisi&ccedil;&atilde;o "GET noticias" n&atilde;o necessita autentica&ccedil;&atilde;o.</p>
<ul>
<li>Exemplo de "PUT noticia":
<ul>
<li>{ "ntc_id":"1" ,"ntc_titulo":"asdf" ,"ntc_subtitulo":"teste" ,"ntc_texto":"fdsa" ,"ntc_data":"asdf"}</li>
</ul>
</li>
<li>Exemplo de "DEL noticia":
<ul>
<li>{ "ntc_id":1}</li>
</ul>
</li>
<li>Para o "POST noticias", crie uma requisi&ccedil;&atilde;o estruturada do tipo Multipart Form e passe por exemplo:
<ul>
<li>imagem -&gt; um file (imagem)</li>
<li>ntc_titulo -&gt; "T&iacute;tulo teste"</li>
<li>ntc_subtitulo -&gt; "subtitulo teste"</li>
<li>ntc_texto -&gt; um Text(Multi-line)</li>
<li>ntc_data -&gt; "2019-12-05 20:45:00"</li>
</ul>
</li>
</ul>
