<?php
require('include/connection.php');
$val_user = validadUser($_POST["us_log"], $_POST["us_pas"]);

	if($val_user){
		echo "Aqui Ingresaremos la solicitud !!";
	}else{
		header('Location: login.php');
	}





?> 
<p><a href="index.php">HOME</a>
