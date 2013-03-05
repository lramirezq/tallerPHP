<?php
	//Generate connection to Database

function connecToDB(){
	// Create connection
	//Data Connection
	$server ="localhost";
	$dataBase = "Taxis";
	$user = "taxis";
	$pass = "GbbJGaam3Whznf9t";
   $conexion = mysql_connect ($server, $user, $pass) or die ('No me puedo conectar a la base de datos porque: ' . mysql_error());
   mysql_select_db ($dataBase ,$conexion);
   return $conexion;
}


?>