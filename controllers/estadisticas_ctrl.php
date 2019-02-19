<?
require './db/BD.php';
 Class Estadisticas_ctrl{
    private $reservas;

    function __construct($objReserva){
        $this->reservas=$objReserva;
    }

    static function generarEstadisticas($instalaciones){ 
        $informacion = Array();
        foreach($instalaciones as $instalacion){
            $id = $instalacion->id;
            $name = $instalacion->nombre;

            $sentencia="SELECT COUNT(*) FROM reservas
                        WHERE id=$instalacion;";
            $numReservas ->query($sentencia);
            
            array_push($informacion, Array("id"=>$id, "nommbre"=>$name,"reservas"=>$numReservas));
       }
       
       
            
       return $informacion;

       

    }
    
    static function calculaRecomendacion(){
        
        $instalaciones;

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