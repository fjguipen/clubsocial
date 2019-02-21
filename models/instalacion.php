<?php

//Requerimiento de acceso a base de datos.
require_once(dirname(__FILE__).'/../db/DB.php');

Class Instalacion{ 

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
        //Debe devolver un objeto Instalación (Ver como se ha hecho en la clase Reserva)
        return DB::query($sentencia);
    }
}
?>