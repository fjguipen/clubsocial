<?php
require_once(dirname(__FILE__).'/../models/usuario.php');
require_once(dirname(__FILE__).'/../models/instalacion.php');
require_once(dirname(__FILE__).'/../models/administrador.php');
require_once(dirname(__FILE__).'/../models/reserva.php');

if($_SERVER['RESQUEST_METHOD'] == 'POST'){
    $action = htmlspecialchars($_GET["action"]);

    
    switch ($action){
        case "getUser":
            
        break;
        default:
            
        break;
    }
} else {
    header("Location: /clubsocial");
}

?>