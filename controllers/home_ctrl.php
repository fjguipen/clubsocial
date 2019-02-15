<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.
require($_SERVER['DOCUMENT_ROOT']."/reservas/models/usuario.php");
require($_SERVER['DOCUMENT_ROOT']."/reservas/models/reserva.php");
	
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
	$instalacion = htmlspecialchars($_POST['instalacion']);
	$fechaReserva = htmlspecialchars($_POST['fecha']);
	$horaReserva = htmlspecialchars($_POST['hora']);
	$penalizacion = htmlspecialchars($_POST['penalizacion']);
	$nuevoReservaChecked = isset($_POST['newReserva']); /*--> Comprobación de existencia de Reserva.*/

	$actualSocio = new Socio($idSocio, $dni, $nombre, $apellidos, $email, $password, $cc, $telefono, $miembros);

	//Comprobación de que el Socio esté registrado o no.
	$esSocio = $actualSocio->esSocio();

	if($nuevoSocioChecked) {
		//Si el socio no existe.
		if(!$esSocio) {
			$reserva = new Reserva(Socio($idSocio), Socio($password), $instalacion, $fechaReserva, $horaReserva);
			if($reserva->instalacionDisponible()) {
				if($actualSocio->crearSocio() && $reserva->confirmarReserva()) {
					echo "Socio y reserva creados correctamente.";
				}
			}else {
				echo "Pista ocupada.";
			}
		}else {
			echo "El socio ya existe.";
		}
	}else {
		if($esSocio) {
			$reserva = new Reserva(Socio($idSocio), Socio($password), $instalacion, $fechaReserva, $horaReserva);
			if($reserva->instalacionDisponible() && $reserva->confirmarReserva()) {
				echo "Reserva creada.";
			}else {
				echo "Pista ocupada.";
			}
		}else {
			echo "El socio no existe.";
		}
	}
}
?>