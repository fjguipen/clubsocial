<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.
require_once(dirname(__FILE__).'/../models/reserva.php');
require_once(dirname(__FILE__).'/../models/usuario.php');

//Si existe una sesion activa de administrado (login correcto)
if (isset($_SESSION["user"])){
	
	//Obtenemos todas las reservas y la guardamos en la variable para que sea utilizala en la vista
	$reservas = Reserva::getReservas();
	
	//Obtenemos una lista con todos los socios
	$listaSocios = Usuario::getSocios();
	
	//Preparamos el array donde incluiremos la informacion relevante de cada socio para la utilizar en la vista
	$socios = Array();
	
	//Cargamos la informacion de los socios en $socios
	foreach($listaSocios as $socio){
		$reservas =  Reserva::getReservasSocio($socio["id"]);
		array_push($socios, Array($socio->id, $socio->dni, count($reservas)));
	}
	
	//Incluimos la vista de reservas
	include("./views/lista_reservas.php");

} else {
	
	//No está logeado como admnistrado, mostramos la página de logeo
	include(dirname(__FILE__)."/../views/login.php");
}
?>
