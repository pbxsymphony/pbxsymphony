<?php
$id=$_POST['id'];

include("database.php");

	$sql = sprintf("DELETE FROM sip_buddies WHERE id='$id'");

	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-extensions.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-extensions.php");
	}
	mysql_close();
?>