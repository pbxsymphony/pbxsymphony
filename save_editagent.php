<?php

session_start();
	
if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$users_id=$_POST['users_id'];
$users_type=$_POST['users_type'];
$users_membername=$_POST['users_membername'];
$users_name=$_POST['users_name'];
$users_password=$_POST['users_password'];
$users_password2=$_POST['users_password2'];
$users_mail=$_POST['users_mail'];
$users_phone=$_POST['users_phone']; 
$users_extension=$_POST['users_extension']; 
$users_department=$_POST['users_department']; 

if ( $users_password2 !== $users_password ) { $users_password = md5($users_password2) ; }

include("database.php");

	$sql = sprintf("UPDATE users_agent SET users_type='$users_type',users_membername='$users_membername',users_name='$users_name',users_password='$users_password',users_mail='$users_mail',users_phone='$users_phone',users_extension='$users_extension',users_department='$users_department' WHERE users_id='$users_id'");
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-agents.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-agents.php");
	}
	mysql_close();
?>