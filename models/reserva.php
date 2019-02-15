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
        $sentencia = "SELECT * FROM Reserva WHERE $id=$this->id";
        return DB::query($sentencia);
    }

    static function getReservas(){

        $sentencia="SELECT * FROM Reserva";
        return DB::query($sentencia);
    }

    static function getReservasSocio($socio) {
        
        $sentencia = "SELECT * FROM reservas WHERE $socio=$this->socio";
        return DB::query($sentencia);
    }

    function confirmarReserva(){
        


    }

    function añadirPenalizacion(){

    }

    function instalacionDisponible($instalacion){

    }
}