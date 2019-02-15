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

        $sentencia="SELECT * FROM Reserva 
            WHERE $id=$this->id";
        

    }

    static function getReservas(){
        $sentencia="SELECT * FROM Reserva";

    }

    static function getReservas($socio,$fecha,$minutos){
        $sentencia="SELECT * FROM Reserva 
            WHERE $socio=$this->socio 
            AND $fecha=$this->fecha
            AND $minutos=this->minutos";

    }

    function confirmarReserva(){

    }

    function añadirPenalizacion(){

    }

    function instalacionDisponible($instalacion){

    }
    //venga turbo venga
}


>