<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$users_type=$_POST['users_type'];
$users_membername=$_POST['users_membername'];
$users_name=$_POST['users_name'];
$users_password=md5($_POST['users_password']);
$users_mail=$_POST['users_mail'];
$users_phone=$_POST['users_phone']; 
$users_extension=$_POST['users_extension']; 
$users_department=$_POST['users_department']; 

include("database.php");

$sql = sprintf( "INSERT INTO users_agent (users_type,users_membername,users_name,users_password,users_mail,users_phone,users_extension,users_department) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",$users_type,$users_membername,$users_name,$users_password,$users_mail,$users_phone,$users_extension,$users_department);

	$guardar = mysql_query($sql);
	if(!$guardar) {
	 echo "<script>alert('Error en Insert validar con Administracion');</script>";
	 die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-agents.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-agents.php");
	}
	mysql_close();
?>