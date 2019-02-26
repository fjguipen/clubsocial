<?php
//Requerimiento de acceso a datos factura.php.
require_once(dirname(__FILE__).'/../models/reserva.php');

//Validación del método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//Asignación de variables recogida de los campos del formulario 
$idSocio = htmlspecialchars($_POST['nSocio']);

} else {

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		include ('./views/home.php');
	}
    
}
?>