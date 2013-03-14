<?php
require('include/connection.php');
require('include/menu.php'); 
//include de la clase Cliente
include("include/class/cliente.php");
session_start();
check_user();
date_default_timezone_set('UTC');
$hora =  date('h:i:s');

// Vamos a hacer el ingreso de la solicitud, si existe el cliente lo actualizo de lo contrario lo creo
//Recibiendo params
$rut = $_POST[c_rut];
$nombre= $_POST[c_nombre];
$telefono= $_POST[c_telefono];
$direccion= $_POST[c_direccion];
$comuna= $_POST[comuna];
$operacion= $_POST[operacion];
$correo= $_POST[c_mail];
$hora_sol= $_POST[s_hora];
$origen= $_POST[s_origen];
$destino= $_POST[s_destino];

$msg = "";
//echo "Datos recibidos".$rut." | ".$nombre." | ".$telefono." | ".$direccion." | ".$comuna." | ".$operacion." | ".$correo." | ".$hora_sol." | ".$origen." | ".$destino;

//Ingreso de Cliente y Solicitud
if ($operacion == "NEW"){
	//Creamos el cliente primero
	$sql_insert_cliente = "insert into TBCLIENTES (CL_RUT,CL_TIPOC,CL_NOMBRE,CL_TELEFONO,CL_CORREO,CL_DIRECCION,CO_CODIGO) values ('$rut', '1','$nombre','$telefono','$correo','$direccion','$comuna')";
	$rs_insert = mysql_query($sql_insert_cliente);
	if (!$rs_insert) {
	    die('Consulta no válida: ' . mysql_error());
	}
	//Ingresamos la solicitud
	
if(($origen !="")&& ($destino !="")){
	$sql_insert_sol = "insert into TBSOLICITUDES (SO_HORA_SOL,CL_RUT,ES_CODIGO,SO_ORIGEN,SO_DESTINO) values ('$hora_sol','$rut','P','$origen','$destino')";
	$rs_insert1 = mysql_query($sql_insert_sol);
	if (!$rs_insert1) {
	    die('Consulta no válida: ' . mysql_error());
	}

  $id = mysql_insert_id();

  $msg =  "Su Solicitud ha sido recibida, y a quedado registrada con el número <b>$id</b> una operadora se contactará con Ud.";
  header("location: gracias.php?msg=".$msg);
  
}	

	
	
}else{ //Actualizamos el Cliente y generamos la solicitud
	$update_cliente = "update TBCLIENTES set CL_NOMBRE = '$nombre', CL_TELEFONO='$telefono', CL_CORREO='$correo', CL_DIRECCION='$direccion', CO_CODIGO='$comuna' WHERE CL_RUT = '$rut'";
	$rs_update = mysql_query($update_cliente);
	if (!$rs_update) {
	    die('Consulta no válida: ' . mysql_error());
	}
	
	
	//Ingresamos la solicitud
	if(($origen !="")&& ($destino !="")){
	$sql_insert_sol = "insert into TBSOLICITUDES (SO_HORA_SOL,CL_RUT,ES_CODIGO,SO_ORIGEN,SO_DESTINO) values ('$hora_sol','$rut','P','$origen','$destino')";
	$rs_insert1 = mysql_query($sql_insert_sol);
	if (!$rs_insert1) {
	    die('Consulta no válida: ' . mysql_error());
	}

  $id = mysql_insert_id();

  $msg =  "Su Solicitud ha sido recibida, y a quedado registrada con el número <b>$id</b> una operadora se contactará con Ud.";
  header("location: gracias.php?msg=".$msg);
	
}	
	
}



?> 

<link href="styles/estilo.css" rel="stylesheet" type="text/css">
<?= pinta_menu();?>
<h1>Realice su solicitud de servicio</h1>

<br/>


<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script>
		$(document).ready(function() {
			//Buscamos cliente en tanto termine la carga de la pagina
			$.getJSON('utils/busca_cliente.php', { rut: $('#c_rut').val() }, function(data) {
				$('#c_nombre').val(data.nombre);
				$('#c_telefono').val(data.telefono);
				$('#c_mail').val(data.correo);
				$('#c_direccion').val(data.direccion);
				$('#comuna').val(data.comuna);
			    if (data.nombre == null){
				  $('#operacion').val("NEW");
				}else{
				  $('#operacion').val("UPDATE");
				}
			});
		
			//Buscamos cliente cuando cambie el Rut 
			$('#c_rut').blur(function() {
				$.getJSON('utils/busca_cliente.php', { rut: $('#c_rut').val() }, function(data) {
					$('#c_nombre').val(data.nombre);
					$('#c_telefono').val(data.telefono);
					$('#c_mail').val(data.correo);
					$('#c_direccion').val(data.direccion);
					$('#comuna').val(data.comuna);
				    if (data.nombre == null){
					  $('#operacion').val("NEW");
					}else{
					  $('#operacion').val("UPDATE");
					}
				});
			});
			
			
		});
	</script>
	
	
<form name="frm1" action="" method="POST">
<table>
	<tr>
		<td>RUT</td>
		<td><input type="text" id="c_rut" name="c_rut" value="<?=$_SESSION[usuario]?>" size="40"/></td>
		<td>NOMBRE</td>
		<td><input type="text" id="c_nombre" name="c_nombre" value="<?=$_SESSION[nombre]?>"  size="40"/></td>
		<td>TELEFONO</td>
		<td><input type="text" id="c_telefono" name="c_telefono"  size="40"></td>
	</tr>
	<tr>
		<td>CORREO</td>
		<td><input type="text" id="c_mail" name="c_mail"  size="40"/></td>
		<td>DIRECCION</td>
		<td><input type="text" id="c_direccion" name="c_direccion"  size="40"/></td>
		<td>COMUNA</td>
		<td><?=trae_comunas();?></td>
	</tr>
	<tr>
		<td>HORA SOLICITUD</td>
		<td><input type="text" id="s_hora" name="s_hora" value="<?=$hora?>"  size="40"/></td>
		<td>ORIGEN</td>
		<td><input type="text" id="s_origen" name="s_origen" size="40" /></td>
		<td>DESTINO</td>
		<td><input type="text" id="s_destino" name="s_destino" size="40"/></td>
	</tr>
	<tr>
		<td colspan="6"><center><input type="submit" value="Realizar Solicitud"/></center></td>
	
	</tr>
</table>
<input type="hidden" id="operacion" name="operacion"/>
</form>
<h1><?=$msg?></h1>


