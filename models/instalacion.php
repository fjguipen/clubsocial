<?php

//Requerimiento de acceso a base de datos.
require_once(dirname(__FILE__).'/../db/DB.php');

class Instalacion{ 

    private $id;
    private $nombre;
    private $precio;
    private $tiempo;

    function __construct($id,$nombre,$precio,$tiempo){

        $this->id=$id;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->tiempo=$tiempo;

    }

    static function getInstalacion($id){
        $sentencia = "SELECT * FROM instalaciones WHERE id_instalacion = $id";
        
        $result = mysqli_fetch_array(DB::query($sentencia), MYSQLI_ASSOC);

        //Debe devolver un objeto de tipo Usuario
        return new Instalacion($result["id_instalacion"],$result["nombre"],$result["precio"],$result["tiempo"]);
    }
}
?>