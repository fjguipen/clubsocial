<?php
// Requerimiento de acceso a datos factura.php.
require_once(dirname(__FILE__).'/../models/reserva.php');
require_once(dirname(__FILE__).'/../models/usuario.php');

// Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

// Asignación de variables recogida de los campos del formulario 
$idSocio = htmlspecialchars($_POST['nSocio']);
// $mes = htmlspecialchars($_POST['mes']);
// $anio = htmlspecialchars($_POST['anio']);

// $reservas = Reserva::getReservasSocioMes($idSocio, $mes, $anio); 
$reservas = Reserva::getReservasSocioMes($idSocio, '02', '2019'); 

$nombreSocio = $reservas[0]->socio->nombre; // Sacamos el nombre del socio
$dniSocio = $reservas[0]->socio->dni;   // Sacamos el dni del socio
// $nombreSocio = 'Salvador';
// $dniSocio = '32040301T';

/*
contenido [
	$datosSocio [
		nombre
		dni
	]
	$datosReservas[
		reserva
	]
]
*/

//Array para almacenar el nombre y el dni del socio
$datosSocio = Array($nombreSocio, $dniSocio);

// Array que contendra el resultado que usara la vista
$contenido = Array();  

// Array para almacenar todas las reservas de ese usuario.
$datosReservas = Array();

foreach ($reservas as $resultado){
    // Vamos añadiendo en el array los datos que necesitamos para mostrar despues en la vista.
    array_push($datosReservas, Array($resultado->instalacion->nombre,$resultado->instalacion->precio, $resultado->fecha));
}

// Metemos el array socio y reservas dentro de contenido.
array_push($contenido, $datosSocio, $datosReservas);

// Incluimos la vista de factura
include(dirname(__FILE__)."/../views/factura.php");

} else {
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		header("Location: ./");
	}
    
}
?>