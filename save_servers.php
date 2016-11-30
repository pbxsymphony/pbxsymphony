<?php
session_start();
if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
	
$Host=$_POST['Host'];
$User=$_POST['User'];	
$Password=$_POST['Password'];	

include("database.php");

	$sql = sprintf("GRANT ALL ON *.* TO '$User'@'$Host' IDENTIFIED BY '$Password';");

	$file = fopen("rule_iptables.sh", "a");
	fwrite($file, "iptables -I INPUT -s $Host -p tcp --dport 3306 -j ACCEPT " . PHP_EOL);
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