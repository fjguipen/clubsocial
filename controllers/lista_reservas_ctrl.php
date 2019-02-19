<?php
//Requerimiento de acceso a datos usuario.php y reserva.php.
require('./reservas/models/reserva.php');
require('./reservas/models/usuario.php');
	
if (isset($_SESSION["user"])){
	include("./views/lista_reservas.php");
} else {
	include("login.php");
}

?>