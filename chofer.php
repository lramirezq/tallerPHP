<?php
  require('include/connection.php');
  require('include/menu.php'); 
 session_start();
 check_user();
  //Traer Listado de Choferes
 $sql = "select * from TBCHOFER";
 $rs = mysql_query($sql);
 
 //Agregando Chofers !
 $r = $_POST[rut];
 $n = $_POST[nombre];
 $ap = $_POST[apaterno];
 $am = $_POST[amaterno];
 $d = $_POST[direccion];
 $co = $_POST[comuna];
 $t =  $_POST[telefono];
 

 if(($r != "") && ($n !="") && ($ap != "")){
	$sqlInsert = "insert into TBCHOFER (CH_RUT,CH_NOMBRE,CH_APPAT,CH_APMAT,CH_DIRECCION,CO_CODIGO,CH_TELEFONO) VALUES ('$r', '$n', '$ap', '$am', '$d',$co, '$t')";
	$rs_insert = mysql_query($sqlInsert);
	if (!$rs_insert) {
	    die('Consulta no válida: ' . mysql_error());
	}else{
	   header('Location: chofer.php');
	}
 }

	if ($_SESSION['perfil'] == 'CLI'){
		pinta_menu();
		echo "<h1>Usted no tiene acceso a esta sección </h1>";
		exit;
	}else{
		pinta_menu();
		pinta_menu_admin();
	}
?>
<h1>Administración de Choferes</h1>
<form action="chofer.php" method="POST">
<table>
	<tr>
		<td>RUT</td>
		<td><input id="rut" name="rut" type="text"/></td>
		<td>Nombre</td>
		<td><input id="nombre" name="nombre" type="text" /> </td>
		<td>Apellido Paterno</td>
		<td><input id="apaterno" name="apaterno" type="text" /> </td>
		<td>Apellido Materno</td>
		<td><input id="amaterno" name="amaterno" type="text" /> </td>
	</tr>
	<tr>
		<td>Direccion</td>
		<td><input id="direccion" name="direccion" type="text"/></td>
		<td>Comuna</td>
		<td><?= trae_comunas()?></td>
		<td>Telefono</td>
		<td><input id="telefono" name="telefono" type="text"/></td>
	</tr>
	<tr>
		<td colspan="5"><input type="submit" id="ingresar" value="Ingresar"></td>
	</tr>
</table>
</form>

<h2>Listado de Choferes</h2>
<table border="1"  class='datos'>
  <tr>
	<th>RUT</th>
	<th>NOMBRE</th>
	<th>APELLIDO PATERNO</th>
	<th>APELLIDO MATERNO</th>
	<th>DIRECCION</th>
	<th>COMUNA</th>
	<th>TELEFONO</th>
  </tr>	
  <?php
  	while ($fila = mysql_fetch_assoc($rs)) {
	echo "<tr>";
	echo "<td>$fila[CH_RUT]</td>";
	echo "<td>$fila[CH_NOMBRE]</td>";
	echo "<td>$fila[CH_APPAT]</td>";
	echo "<td>$fila[CH_APMAT]</td>";
	echo "<td>$fila[CH_DIRECCION]</td>";
	echo "<td>".trae_nombre_comuna($fila[CO_CODIGO])."</td>";
	echo "<td>$fila[CH_TELEFONO]</td>";
	echo "</tr>";
		}
  ?>

</table>
