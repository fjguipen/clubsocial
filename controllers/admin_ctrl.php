<?php 
    session_start(); 

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $loggout = isset($_POST["loggout"]);

        if ($loggout){
            $_SESSION["user"]="";
        }

        $user = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        if($user != "" && $password != ""){
            //$token = logInAdmin();
            //crearSersion($token);
            $_SESSION["user"]=Array("username"=>$user,"token"=>$token);
            
            header("Location: http://$_SERVER[HTTP_HOST]$_GET[location]");

        }
    }
?>