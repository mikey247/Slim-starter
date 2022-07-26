<?php
namespace App\Middleware;

use Psr\Container\ContainerInterface;
use Slim\Interfaces\RouteInterface;


class RedirectIfUnauthenticated{
    //getttin access to the container through slims container interface
    protected $router;

    public function __construct($router){
        $this->router = $router;
    }

    public function __invoke($request, $response ,$next){

    if(!isset($_SESSION['user_id'])) {
        $response = $response->withRedirect($this->router->pathFor('login'));
        }
        
        return $next($request, $response);
    }
}