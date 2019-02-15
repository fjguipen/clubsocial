<?
require './db/BD.php';
Class Socio{
    
    $id;
    $dni;
    $nombre;
    $apellidos;
    $dir;
    $email;
    $password;
    $cc;
    $telefono;
    $miembros;

    function __construct($id,$dni,$nombre,$apellidos,$dir,$email,$password,$cc,$telefono,$miembros){
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
    static function darDeAlta(){
        $insertado=false;

        $sentemcia="INSERT INTO socios(numero_socio,nombre,ape,dir,email,dni,cc,foto,tlf,miembros,password)
                    VALUES ($this->id,$this->nombre,$this->apellidos,$this->dir,$this->email,$this->dni,$this->cc,"",$this->telefono,$this->miembros,$this->password))";
        
        //conectar y hacer query con la funcion de DB 
    }
    static function getSocio($id){

        $sentencia="SELECT * FROM socios
                        WHERE $id=$this->id;";

        //conectar y hacer query con la funcion de DB 
    }

    static isValidPassword($id,$password){

        $sentencia="SELECT PASSWORD FROM socios 
                        WHERE $id=$this->id
                        and $password=$this->";
    }
}

?>