<?php 

session_start();

//  manually setting this session to test middleware
// $_SESSION['user_id'] = 1;

// unset($_SESSION['user_id']);

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$configuration = [
   'settings' => [
       'displayErrorDetails' => true,
       'outputBuffering' => false,
   ],
];


$app = new \Slim\App($configuration);

$container = $app->getContainer();

$container['db'] = function (){
   return new PDO('mysql:host=localhost;port=3306;dbname=users','root','');
};

$container['view'] = function ($container) {

   $view = new \Slim\Views\Twig('../views', [
       'cache' => false
   ]);

   // Instantiate and add Slim specific extension
   $router = $container->get('router');
   $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
   $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

   return $view;
};

// $middleware = function($request, $response, $next){
//    $response->getBody()->write('Before');
//    return $next($request, $response);
// };


$middleware = function($request, $response, $next){
   $response->getBody()->write('Before');
   $response = $next($request, $response);
   $response->getBody()->write('After');

   return $response;
};

require __DIR__.'/../routes/web.php';