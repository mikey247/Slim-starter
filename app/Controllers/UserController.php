<?php 

namespace App\Controllers;
use App\Models\User;

use PDO;

class UserController extends BaseController{

    public function index ($request, $response){
        $users = $this->c->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_CLASS, User::class);
        
        return $this->c->view->render($response,"users/index.twig",compact('users'));
    }
    

    public function show($request, $response,$args){
        $statement = $this->c->db->prepare("SELECT * FROM users WHERE id = :id");
           $statement->execute([
              'id'=> $args['id']
           ]);
    
           $user = $statement->fetch(PDO::FETCH_ASSOC);
    
           if ($user===false){
            return "User not found";
           }
    
        return $this->c->view->render($response, 'users/profile.twig',compact('user'));
       }

} 