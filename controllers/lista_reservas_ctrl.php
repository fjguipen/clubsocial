<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.
require($_SERVER['DOCUMENT_ROOT']."/reservas/models/reserva.php");
	
//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$reserva = Array();
	//Guardamos en el Array todas las reservas llamando al método de Reserva.
	$reserva->getReserva();

	//Generamos la penalización correspondiente llamando al método de Reserva.
	$reserva->añadirPenalizacion($idReserva);
}
?>