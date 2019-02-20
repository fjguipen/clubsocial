<?php 
if (strpos($_SERVER['PHP_SELF'],"index.php") ){
    require_once('./db/DB.php');
} else {
    require_once('../db/DB.php');
}



class Usuario {
    
    private $id;
    private $dni;
    private $nombre;
    private $apellidos;
    private $dir;
    private $email;
    private $password;
    private $cc;
    private $telefono;
    private $miembros;

    function __construct($id,$dni,$nombre,$apellidos,$dir,$email,$password,$cc,$telefono,$miembros) {

        $this->id=$id;
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->dir=$dir;
        $this->email=$email;
        $this->password=$password;
        $this->cc=$cc;
        $this->telefono=$telefono;
        $this->miembros=$miembros;

    }

    function darDeAlta() {
        $sentencia = "INSERT INTO socios(numero_socio,nombre,ape,dir,email,dni,cc,foto,tlf,miembros,password) VALUES ($this->id,$this->nombre,$this->apellidos,$this->dir,$this->email,$this->dni,$this->cc,'',$this->telefono,$this->miembros,$this->password)";
        
        return DB::query($sentencia);
    }
    
    static function getSocio($id) {
        $sentencia = "SELECT * FROM socios WHERE id=$id";

        return DB::query($sentencia);
    }

    static function getSocios() {
        $sentencia = "SELECT * FROM socios";
        return DB::query($sentencia);
    }

    function getPassword() {
        $sentencia="SELECT password FROM socios WHERE id=$this->id";

        return DB::query($sentencia);
    }
}

?>