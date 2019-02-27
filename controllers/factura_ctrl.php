<?php
//Requerimiento de acceso a datos factura.php.
require_once(dirname(__FILE__).'/../models/reserva.php');
require_once(dirname(__FILE__).'/../models/usuario.php');

//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//Asignación de variables recogida de los campos del formulario 
$idSocio = htmlspecialchars($_POST['nSocio']);
$mes = htmlspecialchars($_POST['mes']);
$anio = htmlspecialchars($_POST['anio']);

$reservas = Reserva::getReservasSocioMes($idSocio, $mes, $anio); 
$nombreSocio = $reservas[0]->socio->nombre; // Sacamos el nombre del socio
$dniSocio = $reservas[0]->socio->dni;   // Sacamos el dni del socio


$contenido = Array();   // Array que contendra el resultado que usara la vista.

foreach ($reservas as $resultado){
    // Vamos añadiendo en el array los datos que necesitamos para mostrar despues en la vista.
    array_push($contenido, Array($resultado->instalacion->nombre,$resultado->instalacion->precio, $resultado->fecha));
}

// Incluimos la vista de factura
include("./views/factura.php");

} else {

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		header("Location: ./");
	}
    
}
?>