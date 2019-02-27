<?php

//Requerimiento de acceso a datos usuario.php y reserva.php.
require_once(dirname(__FILE__).'/../models/usuario.php');
require_once(dirname(__FILE__).'/../models/reserva.php');
require_once(dirname(__FILE__).'/../models/instalacion.php');


//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

	
	
	$idSocio = htmlspecialchars($_POST['nSocio']);
	$password = htmlspecialchars($_POST['password']);
	$nuevoSocio = isset($_POST['newSocio']);

	
	$idInstalacion = htmlspecialchars($_POST['instalacion']);
	$fechaReserva = htmlspecialchars($_POST['fecha']);
	$horaReserva = htmlspecialchars($_POST['hora']);

	$respuesta = "";

	if ($nuevoSocio) {

		$nombre = htmlspecialchars($_POST['nombre']);
		$apellidos = htmlspecialchars($_POST['apellidos']);
		$dni = htmlspecialchars($_POST['dni']);
		$email = htmlspecialchars($_POST['email']);
		$cc = htmlspecialchars($_POST['cc']);
		$telefono = htmlspecialchars($_POST['telefono']);
		$dir = htmlspecialchars($_POST['dir']);
		$miembros = htmlspecialchars($_POST['miembros']);

		$socio = Usuario::darDeAlta($nombre,$apellidos,$dir,$email,$dni,$cc,$telefono,$miembros,$password);

	} else {
		$socio = Usuario::getSocio($idSocio);

		if (!$socio || $socio->getPassword($idSocio) != $password){
			$respuesta = "La contraseña es incorrecta.";
			$socio = null;
		}
	}

	//Aqui $socio tiene un socio
	if($socio){
		$reserva = new Reserva($socio, Instalacion::getInstalacion($idInstalacion), $fechaReserva, $horaReserva);
		
		if($reserva->instalacionDisponible()){
			
			if ($reserva->confirmarReserva()){
				$respuesta = "Reserva cofirmada para el socio nº $socio->id";
			} else {
				$respuesta = "Se ha producido un error, por favor, inténtelo más tarde.";
			}
			
		} else {
			$respuesta =  "La instalación no está disponible en esa fecha";
		}
	} else {
		$respuesta = "Hubo un error al crear el socio, puede ya exista";
	}

	include('./views/confirmacion_reserva.php');

} else {

	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		$instalaciones = Instalacion::getInstalaciones();

		include('./views/home.php');
	}
	
}
?>