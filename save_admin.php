<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$users_name=$_POST['users_name'];
$users_password=md5($_POST['users_password']);
$users_mail=$_POST['users_mail'];
$users_phone=$_POST['users_phone']; 

include("database.php");

$sql = sprintf( "INSERT INTO users (users_name,users_password,users_mail,users_phone) VALUES ('%s','%s','%s','%s')", $users_name,$users_password,$users_mail,$users_phone);

	$guardar = mysql_query($sql);
	if(!$guardar) {
	 echo "<script>alert('Error en Insert validar con Administracion');</script>";
	 die("<script>alert('Verificar informacion');</script>");
	header("Location: users_maintenance.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: users_maintenance.php");
	}
	mysql_close();
?>