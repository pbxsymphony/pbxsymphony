<?php
session_start();
if ( isset($_SESSION['k_username']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$users_id=$_POST['users_id'];
$users_name=$_POST['users_name'];
$users_password=$_POST['users_password'];
$users_password2=$_POST['users_password2'];
$users_mail=$_POST['users_mail'];
$users_phone=$_POST['users_phone']; 

if ( $users_password2 !== $users_password ) { $users_password = md5($users_password2) ; }

include("database.php");

	$sql = sprintf("UPDATE users SET users_name='$users_name',users_password='$users_password',users_mail='$users_mail',users_phone='$users_phone' WHERE users_id='$users_id'");
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: users_maintenance.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: users_maintenance.php");
	}
	mysql_close();
?>