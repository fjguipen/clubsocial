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
       $recomendacion=calculaRecomendacion($informacion);
       array_push($informacion, Array("id"=>$id, "nombre"=>$name,"reservas"=>$numReservas,"recomendacion"=>$recomendacion));
            
       return $informacion;

       

    }
    
    private static function calculaRecomendacion($informaciones){
    
        $numMax=0;
        $name;
        foreach( $informaciones as $informacion){
            $numReservas=$informacion["reservas"];
            if($numReservas > $numMax){
                $numMax=$numReservas;
                $name=$informacion["nombre"];
            }
        }

        return $name;
        }  
    }
?>