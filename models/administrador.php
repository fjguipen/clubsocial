<?php

//Requerimiento de acceso a base de datos.
require_once(dirname(__FILE__).'/../db/DB.php');

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