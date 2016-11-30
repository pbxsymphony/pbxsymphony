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
    <div class="container-fluid">
        <h3>
            <span class="label label-info"> SIP Routes</span> 
            <a class="label label-danger" href="add_extensions.php" data-toggle="tooltip" data-placement="top" title="Agregar Logsbooks" >Agregar</a>
            <a class="label label-warning" href="dialplan_reload.php" data-toggle="tooltip" data-placement="top" title="Dialplan Reload" >DialPlan Reload</a>
        </h3>
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
            <th ></th> 
            <th >ID</th> 
            <th >Context</th> 
            <th >Exten</th>
            <th >Priority</th>
            <th >APP</th>
            <th >Appdata</th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
       
        
        include("database.php");
        
		$query_search="SELECT * FROM extensions ORDER BY context,exten, priority";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_extensions.php?id=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href='dele_extensions.php?id=%s' name='eliminar' ><span class='glyphicon glyphicon-remove'></span></a></td>
        </tr>", 
        $listando["id"],
        $listando["id"], 
        $listando["context"], 
        $listando["exten"],
        $listando["priority"],
		$listando["app"],
        $listando["appdata"],
        $listando["id"]);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>