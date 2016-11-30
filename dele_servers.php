<?php
$Host=$_GET['Host'];
$User=$_GET['User'];
include("database.php");

	$sql = sprintf("DROP USER '$User'@'$Host';");

	$file = fopen("dele_iptables.sh", "a");
	fwrite($file, "iptables -D INPUT $(iptables -nL --line-number | grep $Host | awk '{ print $1}')" . PHP_EOL);
	fclose($file);

	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
	header("Location: servers.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
	header("Location: servers.php");
	}
	mysql_close();
?>