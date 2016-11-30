<?php
session_start();
include("database.php");
function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

//echo $usuario." ".$password ;
if(trim($usuario)!= "" && trim($password) != "")
{
	//$usuario = strtolower(htmlentities($HTTP_POST_VARS["usuario"], ENT_QUOTES));
	//$password = $HTTP_POST_VARS["password"];
	$result = mysql_query('SELECT * FROM users WHERE users_name=\''.$usuario.'\'');
	if($row = mysql_fetch_array($result)){
		if($row["users_password"] == $password){
			$_SESSION["k_username"] = $row['users_name'];
			$_SESSION["k_userid"] = $row['users_id'];
			?>
			<SCRIPT LANGUAGE="javascript">location.href = "index-menu.php" </SCRIPT>
            <?php
		}else{
			$mensaje='Password incorrecto';
      ?>
      <SCRIPT LANGUAGE="javascript">location.href = "index.php" </SCRIPT>
      <?php
		}
	}else{
 		
		$mensaje='Usuario no existente en la base de datos';
          ?>
      <SCRIPT LANGUAGE="javascript">location.href = "index.php" </SCRIPT>
      <?php
	}
	mysql_free_result($result);
}else{
	//echo $usuario." ".$password;
	$mensaje='Debe especificar un usuario y password';

        ?>
      <SCRIPT LANGUAGE="javascript">location.href = "index.php" </SCRIPT>
      <?php
}
mysql_close();
?>
