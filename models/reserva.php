<?

require './db/BD.php';

Class Reserva{

    $id;
    $socio;
    $instalacion;
    $fecha;
    $minutos;
    $penalizacion;


    public __construct($socio,$instalacion,$fecha,$minutos,$penalizacion=null,$id=null){
        
        this->socio=$socio;
        this->instalacion=$instalacion;
        this->fecha=$fecha;
        this->minutos=$minutos;
        this->penalizacion=$penalizacion;
        this->id=$id;

    }

    static function getReserva($id){

    }

    static function getReservas(){

    }

    static function getReservas($socio,$fecha,$minutos){

    }

    function confirmarReserva(){

    }

    function añadirPenalizacion(){
        
    }


    
    static function instalacionDisponible($instalacion,){

    }
    
}


>