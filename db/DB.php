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
    static string query($sentencia){
        //Abro Conexion
        $mysqli = new mysqli($server, $user, $password, $dbName);
        if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());

        //ejecuto sentencia MariaDB
        if(!$mysqli->$sentencia){
            
        }else{
            $resultado=$mysqli->$sentencia;
        
        }
        //Cierro Conexion
        mysqli_close($mysqli);

        //Devuelvo resultado OBTENIDO de la SENTENCIA dada
        return $resultado;
    }
}
?>