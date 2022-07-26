<?php 
namespace App\Controllers;

class ExampleController extends BaseController{

    public function redirect($request, $response){
       return $response->withRedirect($this->c->router->pathFor('home'));
    }

    public function landing($request, $response){
         return 'To here';
    }

}
  