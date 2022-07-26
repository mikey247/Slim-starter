<?php 
namespace App\Models;

class User{

    public function fullName(){
        return "{$this->firstName} {$this->lastName}";
    }

}