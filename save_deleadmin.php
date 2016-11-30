<?php
session_start();
if ( isset($_SESSION['k_username']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$users_id=$_POST['users_id'];

include("database.php");

	$sql = sprintf("DELETE FROM users WHERE users_id='$users_id'");

	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: users_maintenance.php");
	} else {
	echo "<script>alert('Se Elimina de la Base de Datos');</script>";
	header("Location: users_maintenance.php");
	}
	mysql_close();
	
?>