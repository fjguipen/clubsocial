<?

require './db/BD.php';

Class Reserva{

    private $id;
    private $socio;
    private $instalacion;
    private $fecha;
    private $minutos;
    private $penalizacion;


    function __construct($socio,$instalacion,$fecha,$minutos,$penalizacion=null,$id=null){

        $this->socio=$socio;
        $this->instalacion=$instalacion;
        $this->fecha=$fecha;
        $this->minutos=$minutos;
        $this->penalizacion=$penalizacion;
        $this->id=$id;

    }

    static function getReserva($id){
        $sentencia = "SELECT * FROM reservas WHERE $id=$this->id";
        return DB::query($sentencia);
    }

    static function getReservas(){

        $sentencia="SELECT * FROM reservas";
        return DB::query($sentencia);
    }

    static function getReservasSocio($socio) {
        
        $sentencia = "SELECT * FROM reservas WHERE $socio=$this->socio";
        return DB::query($sentencia);
    }

    function confirmarReserva(){
     $sentencia="INSERT INTO reservas(numero_socio,instala,fecha,minutos,penalizacion) VALUES(this->$socio,this->$instalacion,this->$fecha,this->$minutos,this->$penalizacion);
     return DB::query($sentencia);


    }

    function añadirPenalizacion(){


    }

    function instalacionDisponible($instalacion){


    }
}