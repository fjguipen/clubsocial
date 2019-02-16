<?php
 session_start();
/*
 Control de ruta. Con este archivo controlamos qué contenido se muestra al cliente en funcion
 de la url.   ##########    Ver .htaccess
*/
    $url = $_SERVER['REQUEST_URI'];
    $url = preg_split("/\//",$url);
    $url = $url[sizeof($url)-1];
   
    switch($url){
        case '':
            include("./views/home.php");
            break;
        case 'reservas':
            include("./views/lista_reservas.php");
            break;
        case 'estadisticas':
            include("./views/estadisticas.php");
            break;    
        default :
            include("./views/404.php");
            break;
    }
?>
