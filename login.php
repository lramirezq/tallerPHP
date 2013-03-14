<?php 
  require('include/menu.php'); 
  require('include/connection.php'); 

//obtencion del usuario y la clave ingresados en la pagina principal        
$user=($HTTP_POST_VARS['us_log']); 
$var2=($HTTP_POST_VARS['us_pas']);
$pass= md5($var2); 

//iniciamos sesion para almacenar los datos de la validacion
if(!isset($_SESSION))
{
    session_start();
}

$sql = "select * from TBUSUARIO where us_rut = '$user' and us_clave = '$pass'";
$result = mysql_query($sql);

while($row=mysql_fetch_assoc($result)){ 
	    $_SESSION['usuario'] = $row['US_RUT'];
	    $_SESSION['clave'] = $row[$var2];
		$_SESSION['nombre'] = $row['US_NOMBRE'];
		$_SESSION['perfil'] = $row['TU_CODIGO'];
		$sw = 1;
}

if ($sw == 1){
		$msg = "Sesión Iniciada con Exito... ";
}


	
?>
<?= pinta_menu();?>
<?if ($sw == 0){?>
<h1>Ingreso de Usuarios </h1>
<br/>
<p><?=$msg?>
<form action="login.php" method="post">
	<table align="center" class="login">
		<tr>
			<td>Usuario</td>
			<td><input id="us_log" name="us_log" type="text"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input id="us_pas" name="us_pas" type="password"/></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="submit" value="Enviar" /></center></td>
		</tr>
	</table>
	
</form>
<p>Si UD. es un usuario nuevo favor registrese <a href="registrar.php">AQUI</a>	
<?}else{?>
	<h1><?=$msg?></h1>
<?}?>	
	