<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 


$uniqueid=$_POST['uniqueid'];
$context=$_POST['context'];	
$customer_id=$_POST['customer_id'];	
$mailbox=$_POST['mailbox'];	
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];



include("database.php");

	$sql = sprintf("UPDATE voicemail_users SET context='$context',customer_id='$customer_id',mailbox='$mailbox',password='$password',fullname='$fullname',email='$email'  WHERE uniqueid='$uniqueid'");
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-queues-member.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-queues-member.php");
	}
	mysql_close();
?>