<?php
session_start();
if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$app=$_POST['app'];	
$appdata=$_POST['appdata'];	
$context=$_POST['context'];
$exten=$_POST['exten'];
$priority=$_POST['priority'];

include("database.php");

$sql = sprintf("INSERT INTO extensions (app,appdata,context,exten,priority) VALUES ('%s','%s','%s','%s','%s') ",$app,$appdata,$context,$exten,$priority);
	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: index-sip-routes.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: index-sip-routes.php");
	}
	mysql_close();
?>
