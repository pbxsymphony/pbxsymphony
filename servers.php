<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
?>
			
<!DOCTYPE html>
<html lang="es">
<head>
<?php
include 'title.php';
?>

</head>

<body role="document">

	<?php
	include 'head_menu.php'; 
	?>
    <div class="container">
        <h2><span class="label label-info">Servers Clients</span> <a class="label label-success" href="add_servers.php" data-toggle="tooltip" data-placement="top" title="Agregar Logsbooks" >Agregar</a></h2>
        <table class="table table-bordered table-hover" >   
        <thead>
        <tr >
        <th width="100" >Host</th> 
        <th width="200">User</th> 
        <th width="6%" ></th>  
        </tr> 
        </thead> 
        <tbody>
        <?php 
        include("database.php");
		$userid=$_SESSION["k_userid"];
		$query_search_decks="select Host,User,Password from mysql.user WHERE User != 'root';";
        $lista = mysql_query($query_search_decks);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
        <td> %s </td>
        <td> %s </td>
		<td><a class='btn btn-danger' href=\"dele_servers.php?Host=%s&User=%s\" >Eliminar</a> </td>
        </tr>", 
        $listando["Host"], 
        $listando["User"],
        $listando["Host"],$listando["User"]);
        }
        mysql_free_result($lista);
        mysql_close(); 
        
        ?>
        </tbody>
        </table>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>