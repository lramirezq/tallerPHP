<?php
	require('include/connection.php');
	require('include/menu.php'); 
	session_start();
	check_user();
?>
<? pinta_menu();?>
<?=pinta_menu_admin();?>
<h1>Administración de Usuarios</h1>