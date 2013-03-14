<?php
   include('../include/connection.php');
   //include de la clase Cliente
   include("../include/class/cliente.php");
   //Este archivo realiza la busqueda de los datos de un cliente
	$rut = $_GET[rut];
	$sql = "select * from TBCLIENTES where CL_RUT = '$rut'";

	$rs  = mysql_query($sql);
	$my_cliente = new cliente();
	while ($fila = mysql_fetch_assoc($rs)) {
			$my_cliente->setRut($fila[CL_RUT]); 
			$my_cliente->setTcliente($fila[CL_TIPOC]); 
			$my_cliente->setNombre($fila[CL_NOMBRE]); 
			$my_cliente->setTelefono($fila[CL_TELEFONO]); 
			$my_cliente->setCorreo($fila[CL_CORREO]); 
			$my_cliente->setDireccion($fila[CL_DIRECCION]); 	
			$my_cliente->setComuna($fila[CO_CODIGO]); 
			$my_cliente->setCodsol($fila[CL_CODSOLIC]); 
	}
	
	echo json_encode($my_cliente);

?>