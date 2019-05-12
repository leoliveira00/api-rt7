<?php

use function src\{
    slimConfiguration,
    jwtAuth
};
use App\Controllers\{
    EventoController,
    LoginController,
    NoticiaController
};
use App\Middlewares\JwtDateTimeMiddleware;


$app = new \Slim\App(slimConfiguration());

$app->get('/teste', function($request, $response) {
    echo "<pre>";
    var_dump($request->getAttribute('jwt'));    
})->add(new JwtDateTimeMiddleware())
  ->add(jwtAuth());

/**
 * Login e refresh token
 * (só é permitido refresh token uma vez)
 */
$app->post('/login', LoginController::Class . ':login');
$app->post('/refresh_token', LoginController::Class . ':refreshToken');

/**
 * A aplicação de Eventos e o CRUD de notícias só são permitidos para usuário autenticado
 */
$app->group('', function() use($app){

  $app->get('/evento', EventoController::class . ':getEventos');
  $app->post('/evento', EventoController::class . ':insertEvento');
  $app->put('/evento', EventoController::class . ':updateEvento');
  $app->delete('/evento', EventoController::class . ':deleteEvento');
  
  $app->post('/noticia', NoticiaController::class . ':insertNoticia');
  $app->put('/noticia', NoticiaController::class . ':updateNoticia');
  $app->delete('/noticia', NoticiaController::class . ':deleteNoticia');

})->add(new JwtDateTimeMiddleware())
->add(jwtAuth());

/**
 * A Visualização de Notícias não necessita login
 */
$app->get('/noticia', NoticiaController::class . ':getNoticias');

$app->run();