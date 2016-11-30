<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
?>
			
<!DOCTYPE html>
<html lang="es">
<head>
 <title>PBX Symphony</title>
 <META HTTP-EQUIV="REFRESH" CONTENT="5;URL=sip_register.php"> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/mistyle.css">

</head>

<body role="document">

	<?php
	include 'head_menu.php'; 
	?>
    <div class="container">
        <div class="well" >
        <h2><span class="label label-info"> SIP Register</span></h2>
        <table class="table table-bordered table-hover" >   
        <thead>
        <tr >
        <th width="100" >ID</th> 
        <th width="200">Name</th> 
        <th width="300">ipaddr</th>
        <th width="200">useragent</th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
        include("database.php");
		$userid=$_SESSION["k_userid"];;
		$query_search_decks="SELECT * FROM sip_buddies WHERE ipaddr!='' AND ipaddr is NOT null OR useragent!='' AND useragent is NOT null ORDER BY name";
        $lista = mysql_query($query_search_decks);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
        </tr>", 
        $listando["id"], 
        $listando["name"], 
        $listando["ipaddr"],
        $listando["useragent"]);
        }
        mysql_free_result($lista);
        mysql_close(); 
        
        ?>
        </tbody>
        </table>
    	</div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

</html>