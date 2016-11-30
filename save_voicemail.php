<?php
session_start();
if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$context=$_POST['context'];	
$customer_id=$_POST['customer_id'];	
$mailbox=$_POST['mailbox'];	
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];

include("database.php");

$sql = sprintf("INSERT INTO voicemail_users (context,customer_id,mailbox,password,fullname,email) VALUES ('%s','%s','%s','%s','%s','%s') ",$context,$customer_id,$mailbox,$password,$fullname,$email);
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-mails.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-mails.php");
	}
	mysql_close();
?>
