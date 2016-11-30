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
            <span class="label label-info">Queue Agents </span>  
            <a class="label label-danger" href="add_queue_agents.php" data-toggle="tooltip" data-placement="top" title="Agregar Queue" >Agregar</a>
        </h3> 
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
            <th ></th> 
            <th >ID</th> 
            <th >Type</th> 
            <th >Membername</th> 
            <th >Name</th>
            <th >Email</th>
            <th >Phone</th>
            <th >Ext.</th>
            <th >Department</th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
        
        include("database.php");
        
		$query_search="SELECT * FROM users_agent ORDER BY users_membername";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_agent.php?users_id=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href='dele_agent.php?users_id=%s' name='eliminar' ><span class='glyphicon glyphicon-remove'></span></a> </td>
        </tr>", 
        $listando["users_id"],
        $listando["users_id"], 
        $listando["users_type"], 
        $listando["users_membername"], 
        $listando["users_name"],
        $listando["users_mail"],
		$listando["users_phone"],
        $listando["users_extension"],
        $listando["users_department"],
        $listando["users_id"]);
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
  </body>

</html>