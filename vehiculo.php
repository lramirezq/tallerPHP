<?php
  require('include/connection.php');
  require('include/menu.php');

  session_start();
  check_user();
  //VE_PATENTE 	VE_MARCA 	VE_AÑO 	VE_COLOR 	VE_CAPAC 	CH_RUT 
  //Listado de Vehiculos
  $sql = "select * from TBVEHICULO";
  $rs = mysql_query($sql);

  //Ingreso de Vehiculo
  $p = $_POST[patente];
  $m = $_POST[marca];
  $a = $_POST[anno];
  $c = $_POST[color];
  $cap = $_POST[capacidad];
  $ch = $_POST[chofer];
 if(($p!="")&&($m!="")&&($c!="")){ 
  $sqlinsert="insert into TBVEHICULO(VE_PATENTE,VE_MARCA,VE_ANNO, VE_COLOR, VE_CAPAC, CH_RUT) VALUES ('$p','$m',$a,'$c',$cap,'$ch')";
  
  $rs_insert=mysql_query($sqlinsert);
  	if (!$rs_insert) {
	    die('Consulta no válida: ' . mysql_error());
	}else{
	   header('Location: vehiculo.php');
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

<h1>Administración de Vehiculos</h1>
<form action="" method="POST">
<table>
	<tr>
		<td>PATENTE</td>
		<td><input id="patente" name="patente" type="text"></td>
		<td>MARCA</td>
		<td><input id="marca" name="marca" type="text"></td>
		<td>AÑO</td>
		<td><input id="anno" name="anno" type="text"></td>
	</tr>
	<tr>
		<td>COLOR</td>
		<td><input id="color" name="color" type="text"></td>
		<td>CAPACIDAD</td>
		<td><input id="capacidad" name="capacidad" type="text"></td>
		<td>CHOFER</td>
		<td><?=trae_choferes();?></td>
	</tr>
	</tr>
	<td colspan="5"><input type="submit" value="Ingresar Vehiculo"></td>
	</tr>
</table>
</form>
<h2>Listado de Vehiculos </h2>
<table border="1" class='datos'>
	<tr>
		<th>PATENTE</th>
		<th>MARCA</th>
		<th>AÑO</th>
		<th>COLOR</th>
		<th>CAPACIDAD</th>
		<th>CHOFER</th>
	</tr>
	<?php
  	while ($fila = mysql_fetch_assoc($rs)) {
	echo "<tr>";
	echo "<td>$fila[VE_PATENTE]</td>";
	echo "<td>$fila[VE_MARCA]</td>";
	echo "<td>$fila[VE_ANNO]</td>";
	echo "<td>$fila[VE_COLOR]</td>";
	echo "<td>$fila[VE_CAPAC]</td>";
	echo "<td>".trae_nombre_chofer($fila[CH_RUT])."</td>";
	echo "</tr>";
		}
  ?>
	
</table>