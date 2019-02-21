<?php 

//Requerimiento de acceso a base de datos.
require_once(dirname(__FILE__).'/../db/DB.php');


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
        //Las contraseñas nunca se guardan tal cual en la base de datos, deberían guardarse encriptadas
        $sentencia = "INSERT INTO socios(numero_socio,nombre,ape,dir,email,dni,cc,foto,tlf,miembros,password) VALUES ($this->id,$this->nombre,$this->apellidos,$this->dir,$this->email,$this->dni,$this->cc,'',$this->telefono,$this->miembros,$this->password)";
        
        return DB::query($sentencia);
    }
    
    static function getSocio($id) {
        $sentencia = "SELECT * FROM socios WHERE numero_socio = $id";
        //mysqli_fetch_array devuelve la primera fila de la consulta sql
        $result = mysqli_fetch_array(DB::query($sentencia), MYSQLI_ASSOC);

        //Debe devolver un objeto de tipo Usuario
        return new Usuario($result["numero_socio"],$result["dni"],$result["nombre"],$result["ape"],$result["dir"],$result["email"],$result["password"],$result["cc"],$result["tlf"],$result["miembros"]);
    }

    static function getSocios() {
        $sentencia = "SELECT * FROM socios";
        //Extraemos los datos del resultado de consulta sql en un array asociativo
        $result = mysqli_fetch_all(DB::query($sentencia), MYSQLI_ASSOC);
        $socios = Array();

        //Recorremos el array asocativo y creamos un objeto Usuario con cada usuario devuelto
        foreach($result as $socio){
            array_push($socios, new Usuario($socio["numero_socio"],$socio["dni"],$socio["nombre"],$socio["ape"],$socio["dir"],$socio["email"],$socio["password"],$socio["cc"],$socio["tlf"],$socio["miembros"])); 
        }

        //Debe devolver un array de objetos de tipo Usuario
        return $socios;
    }

    function getPassword() {
        //Aquí se desencriptaría la contraseña, en caso de haber sido encriptada
        $sentencia="SELECT password FROM socios WHERE numero_socio = $this->id";

        return DB::query($sentencia);
    }
}

?>