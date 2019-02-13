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
        this->id=$id;
        this->dni=$dni;
        this->nombre=$nombre;
        this->apellidos=$apellidos;
        this->dir=$dir;
        this->email=$email;
        this->password=$password;
        this->cc=$cc;
        this->telefono=$telefono;
        this->miembros=$miembros;
    }
    static bool darDeAlta(){
        $insertado=false;


        

    }


}

?>