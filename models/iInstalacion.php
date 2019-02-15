<?
require './db/BD.php';
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
        $db= new DB();
        $sentencia="SELECT * FROM instalaciones
                        WHERE $id=$this->id;";

        return $db ->query($sentencia);
    }
}
?>