<?php
  require('include/connection.php');
  require('include/menu.php');

  //Realizamos el registro del nuevo usuario
  $u = $_POST[rut];
  $n =  $_POST[nombre];
  $p = $_POST[password];
  $p1 =  $_POST[password1];
  $sw = 0;
  if(($p != "") && ($u != "") && ($n !="")){
	if($p == $p1){
		$pass = md5($p1);
		$sql = "insert into TBUSUARIO (US_RUT, US_NOMBRE, US_CLAVE, TU_CODIGO) VALUES ('$u','$n','$pass', 'CLI')";
		$rs = mysql_query($sql);
		if (!$rs) {
		    die('Consulta no válida: ' . mysql_error());
		}
		//Envio Alert y redirecciono a la página de Login
		echo "<script>alert('Usuario Ingresado Exitosamente');location.href='login.php';</script>";
	}else{
	   echo "Las Passwords no coinciden !!";
	}
  }

?>
<?= pinta_menu();?>
<p>Para poder realizar la Solicitud del Servicio es necesario que se registre...
<form action="registrar.php" method="POST">
	<table align="center">
		<tr>
			<td>Rut</td>
			<td><input id="rut" name="rut" type="text"/></td>
			<td>Nombre</td>
			<td><input id="nombre" name="nombre" type="text"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input id="password" name="password" type="password"/></td>
			<td>Repita Password</td>
			<td><input id="password1" name="password1" type="password"/></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" id="boton" value="Ingresar Usuario"></td>
		</tr>
	</table>
</form>
