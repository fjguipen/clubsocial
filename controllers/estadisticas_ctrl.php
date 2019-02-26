<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.
require_once(dirname(__FILE__).'/../models/reserva.php');

if (isset($_SESSION["user"])){

    //Obtenemos todas las reservas y la guardamos en la variable para que sea utilizala en la vista
    $arrayReservas = Reserva::getReservaMes();

    //Preparamos el array donde incluiremos la informacion relevante de cada socio para la utilizar en la vista
    $reservas = Array();

    foreach($arrayReservas as $reserva){
		
		array_push($reservas, Array($reserva->id, $reserva->fecha));
	}
} else {
	
	//No está logeado como admnistrado, mostramos la página de logeo
	include(dirname(__FILE__)."/../views/login.php");
}
?>