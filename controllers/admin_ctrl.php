<?php 
    session_start(); 

    require('./models/administrador.php');

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $loggout = isset($_POST["loggout"]);

        if ($loggout){
            $_SESSION["user"]="";
        } else {
            $user = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);

            $admin = new Administrador($ermail, $password);
            
            if($email != "" && $password != ""){          
                logInAdmin($admin);
                header("Location: http://$_SERVER[HTTP_HOST]$_GET[location]");
            }
        }
    }

    function logInAdmin($admin){
        if ($admin->isAdmin()){
            $_SESSION["user"]=password_hash($email, PASSWORD_BCRYPT);
        }
    }
?>