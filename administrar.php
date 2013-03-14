<?php
	require('include/connection.php');
	require('include/menu.php'); 
	session_start();
	check_user();
	if ($_SESSION['perfil'] == 'CLI'){
		pinta_menu();
		echo "<h1>Usted no tiene acceso a esta sección </h1>";
	}else{
		pinta_menu();
		pinta_menu_admin();
	}
?>

