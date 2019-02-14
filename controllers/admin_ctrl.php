<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $user = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        if($user != "" && $password != ""){
            
        }
    }
?>