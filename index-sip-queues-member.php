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
            <span class="label label-info"> Queue Member </span>
            <a class="label label-danger" href="add_member-admin.php" data-toggle="tooltip" data-placement="top" title="Agregar Member" >Agregar</a>
        </h3>
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
            <th ></th> 
            <th > ID </th> 
            <th > Membername</th> 
            <th > Queue </th>
            <th > Interface </th>
            <th > Penalty </th>
            <th > Paused </th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
        
        include("database.php");

		$query_search="SELECT * FROM queue_member_table ";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_member-admin.php?uniqueid=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href='dele_member-admin.php?uniqueid=%s' name='eliminar' ><span class='glyphicon glyphicon-remove'></span></a></td>
        </tr>", 
        $listando["uniqueid"],
        $listando["uniqueid"], 
        $listando["membername"], 
        $listando["queue_name"],
        $listando["interface"],
		$listando["penalty"],
        $listando["paused"],
        $listando["uniqueid"]);
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