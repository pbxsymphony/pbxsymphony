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

$sql = sprintf( "INSERT INTO queue_member_table (membername,queue_name,interface,penalty,paused) VALUES ('%s','%s','%s','%s','%s')",$membername,$queue_name,$interface,$penalty,$paused);

	$guardar = mysql_query($sql);
	if(!$guardar) {
	 echo "<script>alert('Error en Insert validar con Administracion');</script>";
	 die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-queues-member.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-queues-member.php");
	}
	mysql_close();

?>