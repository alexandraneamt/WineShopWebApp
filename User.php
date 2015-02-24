<?php
class User { 
    private $username; //declaring private variables
    private $password;
    
    public function __construct($u, $p){ 
    //constructing a function which stores two parameters
        $this->username = $u; 
        $this->password = $p;
    }
    
    public function getUsername() {
    //creating function called getUsername with a default constructer
        return $this->username;
    }

    public function getPassword() {
    //creating function getPassword with a default constructer   
        return $this->password; 
    }    
}
