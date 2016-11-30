<?php
	session_start();
	if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$uniqueid=$_POST['uniqueid'];
$membername=$_POST['membername'];
$queue_name=$_POST['queue_name'];
$interface=$_POST['interface'];
$penalty=$_POST['penalty']; 
$paused=$_POST['paused']; 


include("database.php");

	$sql = sprintf("UPDATE queue_member_table SET membername='$membername',queue_name='$queue_name',interface='$interface',penalty='$penalty',paused='$paused' WHERE uniqueid='$uniqueid'");
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-queues-agent.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-queues-agent.php");
	}
	mysql_close();
?>