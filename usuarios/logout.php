<?php 
	//Se restaura la sesion para eliminarla inmediatamente
	session_start();
	session_destroy();
	
	//Se limpia la memoria de sesion
	$_SESSION = array();

	//Se le da al usuario la oportunidad de logearse de nuevo
	header("location: /inventario/usuarios/login.php");
?>