<?php
require('include/connection.php');
$val_user = validadUser($_POST["us_log"], $_POST["us_pas"]);

	if($val_user){
		echo "Wena !!";
	}else{
		header('Location: login.php');
	}





?> 

