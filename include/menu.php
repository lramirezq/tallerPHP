<?php
//UTF-8
header('Content-Type: text/html; charset=UTF-8');
//función que imprime menu superior
function pinta_menu(){
	if ( !isset ($_SESSION['usuario']) && !isset ($_SESSION['clave']))  
	{
		$mensaje = "Ud. no ha iniciado sesión";
		$sw = 0;
	}else{
		$mensaje = "Bienvenido : ".$_SESSION['nombre'];
		$sw = 1;
	}
	echo "<link href='styles/menu.css' rel='stylesheet' type='text/css'><ul class='menu1'><link href='styles/estilo.css' rel='stylesheet' type='text/css'>
	<li><a href='index.php'><b>Home</b></a></li>
	<li><a href='solicitud.php'><b>Solicitud de Servicio</b></a></li>
	<li><a href='administrar.php'><b>Administraci&oacute;n</b></a></li>";
	
	if ($sw==1){
	 	echo "<li><a href='salir.php'><b>Cerrar Sesión</b></a></li></ul><h7>$mensaje</h7>";
	}else{
		echo "</ul><h7>$mensaje</h7>";
	}
}

function pinta_menu_admin(){
	echo "<ul class='menu1'>
	<li><a href='solicitud.php'><b>Solicitudes</b></a></li>
	<li><a href='chofer.php'><b>Choferes</b></a></li>
	<li><a href='vehiculo.php'><b>Vehiculos</b></a></li>
	<li><a href='usuario.php'><b>Usuarios</b></a></li>
	<li><a href='horario.php'><b>Horarios</b></a></li></ul>";
	
}

?>