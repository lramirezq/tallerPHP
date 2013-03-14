<?php
  require('include/connection.php');
  require('include/menu.php');

  session_start();
  check_user();
  
  //Listado de Horarios
  $sql = "select * from TBHORARIOS";
  $rs = mysql_query($sql);

	
  //Ingreso de Vehiculo
  
  $inicio = $_POST[ho_inicio];
  $termino = $_POST[ho_termino];
  $dia = $_POST[dia];
  $chofer = $_POST[chofer];
 
 if(($inicio!="")&&($termino!="")&&($dia!="")){ 
  $sqlinsert="insert into TBHORARIOS(HO_INICIO,HO_TERMINO,DD_CODIGO, CH_RUT) VALUES ('$inicio','$termino',$dia,'$chofer')";
  
  $rs_insert=mysql_query($sqlinsert);
  	if (!$rs_insert) {
	    die('Consulta no válida: ' . mysql_error());
	}else{
	   header('Location: horario.php');
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

<h1>Administración de Horarios</h1>
<form action="" method="POST">
<table>
	<tr>
		<td>Horario de Inicio</td>
		<td><input id="ho_inicio" name="ho_inicio" type="text"></td>
		<td>Horario de Termino</td>
		<td><input id="ho_termino" name="ho_termino" type="text"></td>
		<td>DIA</td>
		<td><?=trae_dias();?></td>
		<td>CHOFER</td>
		<td><?=trae_choferes()?></td>
		
	</tr>
	</tr>
	<td colspan="5"><input type="submit" value="Ingresar Horario"></td>
	</tr>
</table>
</form>
<h2>Listado de Horarios </h2>
<table border="1" class='datos'>
	<tr>
		<th>CODIGO</th>
		<th>HORA INICIO</th>
		<th>HORA TERMINO</th>
		<th>DIA</th>
		<th>CHOFER</th>
	</tr>
	<?php
  	while ($fila = mysql_fetch_assoc($rs)) {
	echo "<tr>";
	echo "<td>$fila[HO_CODIGO]</td>";
	echo "<td>$fila[HO_INICIO]</td>";
	echo "<td>$fila[HO_TERMINO]</td>";
	echo "<td>".trae_nombre_dia($fila[DD_CODIGO])."</td>";
	echo "<td>".trae_nombre_chofer($fila[CH_RUT])."</td>";
	echo "</tr>";
		}
  ?>


	
</table>