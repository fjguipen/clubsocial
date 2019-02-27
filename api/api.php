<?php
require_once(dirname(__FILE__).'/../models/usuario.php');
require_once(dirname(__FILE__).'/../models/instalacion.php');
require_once(dirname(__FILE__).'/../models/administrador.php');
require_once(dirname(__FILE__).'/../models/reserva.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = htmlspecialchars($_POST["action"]);
    $respuesta = "";
    switch ($action){

        case "registrar":

        $password = htmlspecialchars($_POST['password']);
        $nombre = htmlspecialchars($_POST['nombre']);
		$apellidos = htmlspecialchars($_POST['apellidos']);
		$dni = htmlspecialchars($_POST['dni']);
		$email = htmlspecialchars($_POST['email']);
		$cc = htmlspecialchars($_POST['cc']);
		$telefono = htmlspecialchars($_POST['telefono']);
		$dir = htmlspecialchars($_POST['dir']);
		$miembros = htmlspecialchars($_POST['miembros']);

        $socio = Usuario::darDeAlta($nombre,$apellidos,$dir,$email,$dni,$cc,$telefono,$miembros,$password);
        
        echo $socio ? reservar($socio) : "No se ha podido dar de alta, puede que el socio ya exista";

        break;

        case "reservar":

        $idSocio = htmlspecialchars($_POST['nSocio']);
	    $password = htmlspecialchars($_POST['password']);
        
        $socio = Usuario::getSocio($idSocio);

		if (!$socio || $socio->getPassword($idSocio) != $password){
			$respuesta = "La contraseña es incorrecta.";
			$socio = null;
		}

        echo $socio ? reservar($socio) : "nose ha podido reservar";

        break;

        default:
            header("Location: /clubsocial");
        break;
    }
} else {
    header("Location: /clubsocial");
}


function reservar($socio){
    $idInstalacion = htmlspecialchars($_POST['instalacion']);
	$fechaReserva = htmlspecialchars($_POST['fecha']);
	$horaReserva = htmlspecialchars($_POST['hora']);

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
		$respuesta = "Hubo un error al crear el socio";
    }

    return $respuesta;
}
?>