<?php
 session_start();
/*
 Control de ruta. Con este archivo controlamos qué contenido se muestra al cliente en funcion
 de la url.   ##########    Ver .htaccess
*/
    $url = $_SERVER['REQUEST_URI']; // Traerte la URL completa.
    $url = preg_split("/\//",$url); // Parte el String por barras y te crea un Array con la direccion URL.
    $url = $url[sizeof($url)-1]; // Coje la ultima posicion del Array que seria el final de la URL.
   
    switch($url){
        case '':
            include("./controllers/home_ctrl.php");
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
