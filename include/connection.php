<?php
	//UTF-8
	header('Content-Type: text/html; charset=UTF-8');


	// Create connection
	//Data Connection
	$server ="localhost";
	$dataBase = "Taxis";
	$user = "taxis";
	$pass = "GbbJGaam3Whznf9t";
    $conexion = mysql_connect ($server, $user, $pass) or die ('No me puedo conectar a la base de datos porque: '.mysql_error());
   mysql_select_db ($dataBase  ,$conexion);



//Function que realiza Check de Sesión de User
function check_user(){
	if ( !isset ($_SESSION['usuario']) && !isset ($_SESSION['clave']))  
	{
		session_destroy();
		header("Location: login.php");
	}
}



//Function que devuelve el ComboBox de Comunas !
function trae_comunas(){
	$sql = "select * from TBCOMUNA";
	$rs  = mysql_query($sql);
	$combo = "<select name='comuna' id='comuna'>";
	$combo = $combo."<option value=''>Seleccione...</option>";
	
	while ($fila = mysql_fetch_assoc($rs)) {
			$combo = $combo."<option value='".$fila['CO_CODIGO']."'>".$fila['CO_DESCRIPCION']."</option>";
	}
		$combo=$combo."</select>";
		return $combo;
}

//Funcion que devuelve el nombre de una comuna dependiendo de su ID
function trae_nombre_comuna($id){
	$sql = "select * from TBCOMUNA where CO_CODIGO = '$id'";
	$rs  = mysql_query($sql);
	while ($fila = mysql_fetch_assoc($rs)) {
	   $nombre = $fila['CO_DESCRIPCION'];
	}
	return $nombre;
}

//Funcion para crear combobox de Choferes
function trae_choferes(){
	$sql = "select * from TBCHOFER";
	$rs  = mysql_query($sql);
	$combo = "<select name='chofer' id='chofer'>";
	$combo = $combo."<option value=''>Seleccione...</option>";
	
	while ($fila = mysql_fetch_assoc($rs)) {
			$combo = $combo."<option value='".$fila['CH_RUT']."'>".$fila['CH_NOMBRE']." ".$fila['CH_APPAT']."</option>";
	}
		$combo=$combo."</select>";
		return $combo;
}

//Funcion que devuelve el nombre de un chofer dependiendo de su ID
function trae_nombre_chofer($id){
	$sql = "select * from TBCHOFER where CH_RUT = '$id'";
	$rs  = mysql_query($sql);
	while ($fila = mysql_fetch_assoc($rs)) {
	   $nombre = $fila['CH_NOMBRE']." ".$fila['CH_APPAT'];
	}
	return $nombre;
}

?>