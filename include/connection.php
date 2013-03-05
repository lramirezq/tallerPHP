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

function trae_nombre_comuna($id){
	$sql = "select * from TBCOMUNA where CO_CODIGO = '$id'";
	$rs  = mysql_query($sql);
	while ($fila = mysql_fetch_assoc($rs)) {
	   $nombre = $fila['CO_DESCRIPCION'];
	}
	return $nombre;
}

?>