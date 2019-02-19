<?php

require_once('./db/DB.php');

Class Reserva{

    private $id;
    private $socio;
    private $instalacion;
    private $fecha;
    private $minutos;
    private $penalizacion;


    function __construct($socio,$instalacion,$fecha,$minutos,$penalizacion=null,$id=null){

        $this->socio=$socio; // Objeto socio
        $this->instalacion=$instalacion; // Objeto instalacion
        $this->fecha=$fecha;
        $this->minutos=$minutos;
        $this->penalizacion=$penalizacion;
        $this->id=$id;

    }

    static function getReserva($id){
        $sentencia = "SELECT * FROM reservas WHERE num_reserva = $id";
        // Devolvemos un objeto Reserva con los datos recojidos de la base de datos.
        return new Reserva(Usuario::getSocio($result['numero_socio']),Instalacion::getInstalacion($result ['id_instalacion']),$result['fecha'],$result['minutos'],$result['penalizacion'],$result['num_reserva']);
    }

    static function getReservas(){
        $sentencia="SELECT * FROM reservas";
        $result = DB::query($sentencia);    // Guardamos la consulta a la base de datos en la variable $result.
        $arrayReservas = Array();   // Array que guarda los objetos Reserva que se van a extraer de la base de datos.

        // Foreach para crear un objeto con cada fila extraida de las reservas y guardarlo en el Array.
        foreach($result as $resultado) {
            $object = new Reserva(Usuario::getSocio($result['numero_socio']),Instalacion::getInstalacion($result ['id_instalacion']),$result['fecha'],$result['minutos'],$result['penalizacion'],$result['num_reserva']);
            array_push($arrayReservas, $object);    // Añadimos el nuevo objeto al Array.
        }

        return $arrayReservas;  // Devolvemos el Array.
    }

    static function getReservasSocio($socio) {
        $sentencia = "SELECT * FROM reservas WHERE id_socio = $socio->id";
        $result = DB::query($sentencia);
        $arrayReservas = Array();   // Array para guardar los objetos Reservas.

        // Foreach para crear un objeto con cada fila extraida de las reservas y guardarlo en el Array.
        foreach($result as $resultado) {
            $object = new Reserva(Usuario::getSocio($result['numero_socio']),Instalacion::getInstalacion($result ['id_instalacion']),$result['fecha'],$result['minutos'],$result['penalizacion'],$result['num_reserva']);
            array_push($arrayReservas, $object);    // Añadimos el nuevo objeto al Array.
        }

        return $arrayReservas;  // Devolvemos el Array.
    }

    function confirmarReserva(){
     $sentencia="INSERT INTO reservas(numero_socio,instala,fecha,minutos,penalizacion) VALUES(this->$socio,this->$instalacion,this->$fecha,this->$minutos,this->$penalizacion)";
     return DB::query($sentencia);
    }

    static function añadirPenalizacion($num_reserva){
        $sentencia = "UPDATE reservas SET penalizacion = true WHERE num_reserva = $num_reserva"; // Sentencia para insertar la penalizacion en la reserva.
        return DB::query($sentencia);
    }

    function instalacionDisponible(){
        $idInstalacion = $this->instalacion->id;    // Extraemos el ID de la instalacion que queremos comprobar si esta reservada o no.
        $sentencia = "SELECT * FROM reservas WHERE id_instalacion=$idInstalacion AND fecha=$this->fecha AND minutos=$this->minutos";
        $query = DB::query($sentencia); // Ejecuto la sentencia.
        $filas = $query->num_rows;  // Obtengo el numero de filas que devuelve la sentencia.
        return !$filas > 0; // Si el numero de columnas es mayor que 0 la instalacion no esta disponible y devolvemos un false.
    }
}