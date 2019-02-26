<?php

//Requerimiento de acceso a base de datos.
require_once(dirname(__FILE__).'/../db/DB.php');

class Instalacion{ 

    public $id;
    public $nombre;
    public $precio;
    public $tiempo;

    function __construct($id,$nombre,$precio,$tiempo){

        $this->id=$id;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->tiempo=$tiempo;

    }

    static function getInstalacion($id){

        $sentencia = "SELECT * FROM instalaciones WHERE id_instalacion = $id";
        
        $result = mysqli_fetch_array(DB::query($sentencia), MYSQLI_ASSOC);

        //Debe devolver un objeto de tipo Instalacion
        return new Instalacion($result["id_instalacion"],$result["nombre"],$result["precio"],$result["tiempo"]);
        
    }

    static function getInstalaciones(){
        $sentencia = "SELECT * FROM instalaciones";
        $result = mysqli_fetch_all(DB::query($sentencia),MYSQLI_ASSOC);
        $instalaciones = Array();
        foreach($result as $instalacion){
            array_push($instalaciones, new Instalacion($instalacion["id_instalacion"],$instalacion["nombre"],$instalacion["precio"],$instalacion["tiempo"]));
        }

        return $instalaciones;
    }
}
?>