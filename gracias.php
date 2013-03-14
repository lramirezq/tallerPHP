<?php
  require('include/connection.php');
  require('include/menu.php');

  session_start();
  check_user();
  $msg = $_GET[msg];
  pinta_menu();
  echo "<h1>".$msg."</h1>";
?>

