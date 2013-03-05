<?php
	//Generate connection to Database


	// Create connection
	//Data Connection
	$server ="localhost";
	$dataBase = "Taxis";
	$user = "taxis";
	$pass = "GbbJGaam3Whznf9t";
    $conexion = mysql_connect ($server, $user, $pass) or die ('No me puedo conectar a la base de datos porque: '.mysql_error());
   mysql_select_db ($dataBase  ,$conexion);

   //Funcion para realizar la validación del usuario
   //return true = Valido
   //return false = invalido
   function validadUser($user, $pass){
	$sql = "select count(*) as autorizado from TBUSUARIO where us_rut = '$user' and us_clave = '$pass'";
	$result = mysql_query($sql);

	while($row=mysql_fetch_assoc($result)){ 
	   $aut =  $row['autorizado']; 
	}

	if ($aut == 1){
		return true;
	}else{
		return false;
	}
	 
   }



?>