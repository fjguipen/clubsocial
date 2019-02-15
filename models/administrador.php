<?
require './db/BD.php';

class Administrador {
    
    private $email;
    private $password;

    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function isAdmin() {
        
        $sentencia = "SELECT * FROM administradores WHERE email='$this->email' AND password='$this->password'";
        DB::query($sentencia);
    }

}

?>