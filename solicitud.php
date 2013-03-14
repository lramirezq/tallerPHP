<?php
require('include/connection.php');
require('include/menu.php'); 
session_start();
check_user();
?> 

<link href="styles/estilo.css" rel="stylesheet" type="text/css">
<?= pinta_menu();?>
<h1>Realice su Solicitud </h1>
