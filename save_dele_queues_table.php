<?php
	session_start();
	if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$id=$_POST['id'];

include("database.php");

	$sql = sprintf("DELETE FROM queue_table WHERE id='$id'");

	$guardar = mysql_query($sql);
	
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-queues.php");
	} else {
	echo "<script>alert('Se Elimina de la Base de Datos');</script>";
	header("Location: index-sip-queues.php");
	}
	mysql_close();
	
?>