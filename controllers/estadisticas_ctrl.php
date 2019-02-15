<?
require './db/BD.php';
 Class Estadisticas_ctrl{
    private $reservas=new array();

    function __construct($objReserva){
        $this->reservas=$objReserva;
    }

    static function generarEstadisticas($instalaciones){ 
        //
       foreach($instalaciones as $instalacion){
            //sacas id instalacion y lom mete dentro array
            //sacas nombre instalacion y lommm mete array

            $sentencia="SELECT COUNT(*) FROM reservas
                        WHERE id=$instalacion;";
           /*array*/ $db ->query($sentencia);

       }
    }
?>