<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
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
    if ( isset($_SESSION['k_username']) ) { include 'head_menu.php'; }
    if ( isset($_SESSION['k_user']) ) { include 'head_menu-agent.php';  }
	?>
    
    <div class="container-fluid">
        <h3>
            <span class="label label-info"> Queue Table</span>  
            <a class="label label-danger" href="add_queue_table.php" data-toggle="tooltip" data-placement="top" title="Agregar Queue" >Agregar</a>
            <a class="label label-warning" href="queue_reload.php" data-toggle="tooltip" data-placement="top" title="Queue Reload" >Queue Reload</a>
            <a class="label label-warning" href="queue_show.php" data-toggle="tooltip" data-placement="top" title="Queue Show" >Queue Show</a>
        </h3> 
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
            <th ></th> 
            <th >ID</th> 
            <th >Name</th> 
            <th >Context</th>
            <th >maxlen</th>
            <th >ringinuse</th>
            <th >strategy</th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
       
        
        include("database.php");
        
		$query_search="SELECT * FROM queue_table ORDER BY name";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_queues_table.php?id=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href='dele_queues_table.php?id=%s' name='eliminar' ><span class='glyphicon glyphicon-remove'></span></a> </td>
        </tr>", 
        $listando["id"],
        $listando["id"], 
        $listando["name"], 
        $listando["context"],
        $listando["maxlen"],
		$listando["ringinuse"],
        $listando["strategy"],
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
  </body>

</html>