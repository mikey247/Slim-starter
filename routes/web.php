<?php 

use App\Models\User; 
use App\Controllers\TopicController;
use App\Controllers\UserController;
use App\Controllers\ExampleController;
use App\Middleware\RedirectIfUnauthenticated;


// $authenticated = function ($request,$response,$next) use($container){
//    if(!isset($_SESSION['user_id'])) {
//       $response = $response->withRedirect($container->router->pathFor('login'));
//    }
     
//    return $next($request, $response);
// };


$token =function ($request,$response,$next){
    $request = $request->withAttribute('token', 'abc123');
    return $next($request, $response);
};



// $app->get('/', TopicController::class.':index');

$app->get('/', ExampleController::class. ':redirect' ); 
$app->get('/landing', ExampleController::class. ':landing' )->setName('landing'); 


$app->group('/users', function(){
   $this->get('', UserController::class. ':index' ); 
   $this->get('/{id}', UserController::class. ':show'); 
});

$app->get('/topics', TopicController::class. ':index' )->setName('home'); 

// MIDDLEWARE GROUPS
$app->group('',function(){
   $this->get('/topics/create', TopicController::class. ':create' )->setName('topics.create');
   $this->get('/topics/{id}', TopicController::class. ':show' )->setName('topics.show');
})
->add(new RedirectIfUnauthenticated($container['router']))
->add($token)
// ->add($authenticated)
;

$app->get('/login', function(){
   return 'Login';
})->setName('login');