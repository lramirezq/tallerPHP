<?php
  require('include/connection.php');
  require('include/menu.php');
  session_start();
  check_user();
  //Traigo Todas las Solicitudes
  $todas = "select * from TBSOLICITUDES";
  $rs = mysql_query($todas);


	if ($_SESSION['perfil'] == 'CLI'){
		pinta_menu();
		echo "<h1>Usted no tiene acceso a esta sección </h1>";
		exit;
	}else{
		pinta_menu();
		pinta_menu_admin();
	}
?>
<h1>Administrador de Solicitudes </h1>
<form name="frm1" action="" method="POST">
<table>
	<tr>
		<td>RUT</td>
		<td><input type="text" id="c_rut" name="c_rut"  size="40"/></td>
		<td>NOMBRE</td>
		<td><input type="text" id="c_nombre" name="c_nombre"   size="40"/></td>
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
		<td>Estado</td>
		<td><?=trae_estados();?></td>
		<td>Vehiculo</td>
		<td><?=trae_vehiculos();?></td>
		<td>Hora Inicio</td>
		<td><input type="text" id="h_inicio" name="h_inicio" size="40"/></td>
	</tr>
	<tr>
		<td>Hora Termino</td>
		<td><input type="text" id="h_termino" name="h_termino" size="40"/></td>
		<td>Valor</td>
		<td><input type="text" id="h_valor" name="h_valor" size="40"/></td>
	</tr>
	<tr>
		<td colspan="6"><center><input type="submit" value="Realizar Solicitud"/></center></td>
	
	</tr>
</table>
<input type="hidden" id="operacion" name="operacion"/>
</form>

<h2>Listado de Solicitudes </h2>
<table border="1" class="datos">
  <tr>
  	<th>Codigo</th>
	<th>Hora Solicitud</th>
	<th>Cliente</th>
	<th>Hora Inicio</th>
	<th>Hora Termino</th>
	<th>Estado</th>
	<th>Origen</th>
	<th>Destino</th>
	<th>Valor</th>
	<th>Patente</th>
	<th>Editar</th>
	<th>Borrar</th>
  </tr>
<?php
  	while ($fila = mysql_fetch_assoc($rs)) {
	echo "<tr>";
	echo "<td>$fila[SO_CODIGO]</td>";
	echo "<td>$fila[SO_HORA_SOL]</td>";
	echo "<td>".trae_nombre_cliente($fila[CL_RUT])."</td>";
	echo "<td>$fila[SO_HORA_INIC]</td>";
	echo "<td>$fila[SO_HORA_TERMINO]</td>";
	echo "<td>".trae_nombre_estado($fila[ES_CODIGO])."</td>";
	echo "<td>$fila[SO_ORIGEN]</td>";
	echo "<td>$fila[SO_DESTINO]</td>";
	echo "<td>$fila[SO_VALOR]</td>";
	echo "<td>$fila[VE_PATENTE]</td>";
	echo "<td>Editar</td>";
	echo "<td>Borrar</td>";
	echo "</tr>";
		}
  ?>

</table>

