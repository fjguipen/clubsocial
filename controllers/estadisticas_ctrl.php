<?
require './db/BD.php';
 Class Estadisticas_ctrl{
    private $reservas=new array();

    function __construct($objReserva){
        $this->reservas=$objReserva;
    }

    static function generarEstadisticas($instalaciones){ 
        private $informacion =new array();
       foreach($instalaciones as $instalacion){
                $informacion=$id;
                $informacion=$nombre;               
        
                $sentencia="SELECT COUNT(*) FROM reservas
                         WHERE id=$instalacion;";
                $informacion= $numReservas ->query($sentencia);
                
       }        
        return $informacion;
       }
    static function calculaRecomendacion(){
        
        $instalaciones = new array();

        $instalaciones= generarEstadisticas();
        $numMax=0;
        foreach( $instalacones as $numReservas){
            if($numReservas>$numMax){
                $numMax=$numReservas;
            }
        }

        $instalaciones= $numMax;
        return $instalaciones;
        }
    }   
    }
?>