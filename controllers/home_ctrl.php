<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.

if (strpos($_SERVER['PHP_SELF'],"index.php") ){
	require('./models/usuario.php');
	require('./models/reserva.php');
} else {
	require('../models/usuario.php');
	require('../models/reserva.php');
}




//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$socio;
	$reserva;
	
	//Campos registro Socio.
	$campoSocioId;
	$campoSocioDNI;
	$campoSocioNombre;
	$campoSocioApellido;
	$campoSocioDireccion;
	$campoSocioEmail;
	$campoSocioPassword;
	$campoSocioCC;
	$campoSocioTelefono;
	$campoSocioMiembros;
	//$campoSocioFoto; --> No se usa.

	//Campos Reserva pista.
	$campoReservaId;
	$campoReservaSocio;
	//$campoReservaPassword; --> FrontEnd
	$campoReservaInstalacion;
	$campoReservaFecha;
	$campoReservaHora;
	$campoReservaPenalizacion;

	//Asignación de variables recogida de los campos del formulario del Socio.
	$idSocio = htmlspecialchars($_POST['id']);
	$dni = htmlspecialchars($_POST['dni']);
    $nombre = htmlspecialchars($_POST['nombre']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$dir = htmlspecialchars($_POST['direccion']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$cc = htmlspecialchars($_POST['cc']);
	$telefono = htmlspecialchars($_POST['telefono']);
	$miembros = htmlspecialchars($_POST['miembros']);
	//$foto = htmlspecialchars($_POST['foto']);
	$nuevoSocioChecked = isset($_POST['newSocio']); /*--> Comprobación de existencia de Socio.*/

	//Asignación de variables recogida de los campos del formulario de Reserva.
	$idReserva = htmlspecialchars($_POST['id']);
	$socio = htmlspecialchars($_POST['socio']);
	$idInstalacion = htmlspecialchars($_POST['instalacion']);
	$fechaReserva = htmlspecialchars($_POST['fecha']);
	$horaReserva = htmlspecialchars($_POST['hora']);
	$penalizacion = htmlspecialchars($_POST['penalizacion']);
	$nuevoReservaChecked = isset($_POST['newReserva']); /*--> Comprobación de existencia de Reserva.*/

	//Control de Reserva: 

	if ($nuevoSocioChecked) {

	}else {
		//Comprobación de Socio & Llamada funcion getSocio del modelo usuario.php
		if($socio->getSocio($idSocio)) {
		//Comprobación de Contraseña de Socio para Realización de Reserva
		//Llamada a funcion getPassword del modelo usuario.php
			if($socio->getPassword($idSocio) == $password) {
				//Creación de la Reserva:
				$reserva = new Reserva(Socio, Instalacion::getInstalacion($idInstalacion), $fechaReserva, $horaReserva);
				//Comprobación de Instalación Disponible Para Finalizar la Reserva
				//Llamada a función instalacionDisponible del modelo reserva.php
				if($reserva->instalacionDisponible()) { 
					$reserva->confirmarReserva();	// Llamamos a confirmar reserva para crear la reserva en la Base de datos.
					echo "Reserva creada.";		//Si Instalación Disponible es Correcta -> Reserva Creada
				}else {
					echo "Pista ocupada.";		//Si no -> Pista Ocupada
				}
			}else {
				echo "La contraseña es incorrecta.";	//Si la Contraseña no es Correcta -> Muestra Mensaje	
			}
		}else {
			echo "El socio no existe."; //Si Comprobación de Socio es Incorrecta -> Socio no existe
			$socio = new Socio($idSocio, $nombre, $apellidos, $dir, $email, $dni, $cc, $telefono, $miembros, $password);
			$socio->darDeAlta($socio);
		}
	}
} else {
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		include ('./views/home.php');
	}
	
}

// Si no es un POST te muestra el archivo home.php que es el inicial.


?>