<?php
  require('include/connection.php');
  //Realizamos el registro del nuevo usuario
  $u = $_POST[rut];
  $n =  $_POST[nombre];
  $p = $_POST[password];
  $p1 =  $_POST[password1];

  if(($p != "") && ($u != "") && ($n !="")){
	if($p == $p1){
		$sql = "insert into TBUSUARIO (US_RUT, US_NOMBRE, US_CLAVE) VALUES ('$u','$n','$p1')";
		$rs = mysql_query($sql);
		if (!$rs) {
		    die('Consulta no válida: ' . mysql_error());
		}
		header('Location: solicitud.php');
    }else{
	   echo "Las Passwords no coinciden !!";
	}
  }

?>
<p><a href="index.php">HOME</a>
<p>Para poder realizar la Solicitud del Servicio es necesario que se registre...
<form action="registrar.php" method="POST">
	<table>
		<tr>
			<td>Rut</td>
			<td><input id="rut" name="rut" type="text"/></td>
			<td>Nombre</td>
			<td><input id="nombre" name="nombre" type="text"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input id="password" name="password" type="text"/></td>
			<td>Repita Password</td>
			<td><input id="password1" name="password1" type="text"/></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" id="boton" value="Ingresar Usuario"></td>
		</tr>
	</table>
</form>