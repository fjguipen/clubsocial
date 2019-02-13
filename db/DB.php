<? 

Class DB{
    $server;
    $dbName;
    $user;
    $password;

    
    public DB{
        this->$server='localhost';
        this->$dbName='club_social_eusa';
        this->$user='root';
        this->$password='';
    }
    //Conecta y cierra con la base de datos
    static function query($sentencia){
        //Abro Conexion
        $conexion=mysqli_connect($server, $user, $password, $dbName);
        //ejecuto sentencia MariaDB
        mysqli_query( $conexion,$sentencia);
        //Cierro Conexion
        mysqli_close($conexion);

        //Devuelvo resultado OBTENIDO de la SENTENCIA dada
        return $resultado;
    }
        //Se usa SELF:: para llamar metodos estaticos en la misma clase
        //self::query($sentencia);

    
}
?>