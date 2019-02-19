<?php

require_once('../db/DB.php');

class Administrador {
    
    private $email;
    private $password;

    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function isAdmin() {
        
        $sentencia = "SELECT * FROM administradores WHERE email='$this->email' AND password='$this->password'";
        $result = DB::query($sentencia);
        return $result;
    }

}

?>