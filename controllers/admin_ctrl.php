<?php 
    session_start(); 

    require('../models/administrador.php');

    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $loggout = isset($_GET["logout"]);
        echo "waka";
        if ($loggout){
            unset($_SESSION["user"]);
            header("Location: http://$_SERVER[HTTP_HOST]$_GET[location]");
        }

    } else if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        $email = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $admin = new Administrador($email, $password);
        
        if($email != "" && $password != ""){          
            logInAdmin($admin, $email);
            header("Location: http://$_SERVER[HTTP_HOST]$_GET[location]");
        }
    }

    function logInAdmin($admin, $email){
        
        if ($admin->isAdmin()->num_rows){
            $_SESSION["user"]=password_hash($email, PASSWORD_BCRYPT);
            return true;
        }
        return false;
    }
?>