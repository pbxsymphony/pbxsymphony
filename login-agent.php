<?php
session_start();
include("database.php");
function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
$agent = $_POST['agent'];
$passwordagent = md5($_POST['passwordagent']);

//echo $usuario." ".$password ;
if(trim($agent)!= "" && trim($passwordagent) != "")
{
	//$usuario = strtolower(htmlentities($HTTP_POST_VARS["usuario"], ENT_QUOTES));
	//$password = $HTTP_POST_VARS["password"];
	$result = mysql_query('SELECT * FROM users_agent WHERE users_name=\''.$agent.'\'');
	if($row = mysql_fetch_array($result)){
		if($row["users_password"] == $passwordagent){
			$_SESSION["k_user"] = $row['users_name'];
			$_SESSION["k_membername"] = $row['users_membername'];
			$_SESSION["k_extension"] = $row['users_extension'];
			$_SESSION["k_type"] = $row['users_type'];
			
			?>
			<SCRIPT LANGUAGE="javascript">location.href = "index-menu-agent.php" </SCRIPT>
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
