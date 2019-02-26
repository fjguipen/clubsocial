<?php

//Requerimiento de acceso a datos usuario.php y reserva.php.
require_once(dirname(__FILE__).'/../models/usuario.php');
require_once(dirname(__FILE__).'/../models/reserva.php');


//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

	


	//Asignación de variables recogida de los campos del formulario del Socio.
	$idSocio = htmlspecialchars($_POST['nSocio']);
	$password = htmlspecialchars($_POST['password']);
	$nuevoSocio = isset($_POST['newSocio']);

	//Asignación de variables recogida de los campos del formulario de Reserva.
	$idInstalacion = htmlspecialchars($_POST['instalacion']);
	$fechaReserva = htmlspecialchars($_POST['fecha']);
	$horaReserva = htmlspecialchars($_POST['hora']);

	//Control de Reserva: 

	if ($nuevoSocio) {

		$nombre = htmlspecialchars($_POST['nombre']);
		$apellidos = htmlspecialchars($_POST['apellidos']);
		$dni = htmlspecialchars($_POST['dni']);
		$email = htmlspecialchars($_POST['email']);
		$cc = htmlspecialchars($_POST['cc']);
		$telefono = htmlspecialchars($_POST['telefono']);
		$dir = htmlspecialchars($_POST['dir']);
		$miembros = htmlspecialchars($_POST['miembros']);

		//crea socio

		$socio = Usuario::darDeAlta($nombre,$apellidos,$dir,$email,$dni,$cc,$telefono,$miembros,$password);

	} else {
		$socio->getSocio($idSocio);
		if ($socio->getPassword($idSocio) != $password){
			echo "La contraseña es incorrecta.";
			$socio = null;
		}
	}

	//Aqui $socio tiene un soci
	if($socio){
		$reserva = new Reserva($socio, Instalacion::getInstalacion($idInstalacion), $fechaReserva, $horaReserva);
		if($reserva->instalacionDisponible()){
			$reserva->confirmarReserva();
			echo "cofirmada";
		} else {
			echo "Instalacion no disponible";
		}
	}

} else {

	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		$instalaciones = Instalacion::getInstalaciones();

		include ('./views/home.php');
	}
	
}

// Si no es un POST te muestra el archivo home.php que es el inicial.


?>