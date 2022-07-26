<?php 
namespace App\Controllers;
use App\Models\Topic;
use PDO;


class TopicController extends BaseController {

   public function index($request , $response){
       return 'Topic Index';
   }

   public function show($request , $response , $args){
      return $request->getAttribute('token');
      // die();
      // return $args['id'];
   }

   public function create($request , $response , $args){
      return 'Create Index';
   }

// public function index($request , $response){
//     $topics = $this->c->db->query('SELECT * FROM topics')->fetchAll(PDO::FETCH_CLASS, Topic::class);

//     return $this->c->view->render($response, 'topics/index.twig',compact('topics'));
     
//     //Sending JSON data
//     // return $response->withHeader('Content-type','application/json')->write(json_encode($topics));

//     // if(true){
//     //     return $response->withJson([
//     //         'error'=>'Topic does not exist'
//     //     ], 404);
//     // }

//    //  return $response->withJson($topics);
// }

//    public function index($request , $response){
//     $topics = $this->c->db->query('SELECT * FROM topics')->fetchAll(PDO::FETCH_ASSOC);
//     return $this->c->view->render($response, 'topics/index.twig',compact('topics'));
//    }

   // public function show($request, $response,$args){
   //  $statement = $this->c->db->prepare("SELECT * FROM topics WHERE id = :id");
   //     $statement->execute([
   //        'id'=> $args['id']
   //     ]);

   //     $topic = $statement->fetch(PDO::FETCH_ASSOC);

   //     if ($topic===false){
   //      return $this->render404($response);
   //  }

   //  return $this->c->view->render($response, 'topics/detail.twig',compact('topic'));
   // }










} 