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