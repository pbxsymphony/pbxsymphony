<?php
session_start();
	
if (isset($_SESSION['k_user'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 


$uniqueid=$_POST['uniqueid'];

include("database.php");

	$sql = sprintf("DELETE FROM queue_member_table WHERE uniqueid='$uniqueid'");

	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-queues-agent.php");
	} else {
	echo "<script>alert('Se Elimina de la Base de Datos');</script>";
	header("Location: index-sip-queues-agent.php");
	}
	mysql_close();
	
?>