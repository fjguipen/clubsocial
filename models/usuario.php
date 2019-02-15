<?
require './db/BD.php';
Class Usuario{
    
    private $id;
    private $dni;
    private $nombre;
    private $apellidos;
    private $dir;
    private $email;
    private $password;
    private $cc;
    private $telefono;
    private $miembros;

    function __construct($id,$dni,$nombre,$apellidos,$dir,$email,$password,$cc,$telefono,$miembros){
        $this->id=$id;
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->dir=$dir;
        $this->email=$email;
        $this->password=$password;
        $this->cc=$cc;
        $this->telefono=$telefono;
        $this->miembros=$miembros;
    }
    static function darDeAlta(){
        $db= new DB();
        $sentencia= "INSERT INTO socios(numero_socio,nombre,ape,dir,email,dni,cc,foto,tlf,miembros,password)VALUES ($this->id,$this->nombre,$this->apellidos,$this->dir,$this->email,$this->dni,$this->cc,'',$this->telefono,$this->miembros,$this->password)";
        
       return $db ->query($sentencia);
    }
    static function getSocio($id){
        $db= new DB();
        $sentencia="SELECT * FROM socios
                        WHERE $id=$this->id;";

        return $db ->query($sentencia);
    }


    static function getPassword($id){
        $db= new DB();
        $sentencia="SELECT PASSWORD FROM socios WHERE $id=$this->id";

        return $db ->query($sentencia);
    }
}

?>