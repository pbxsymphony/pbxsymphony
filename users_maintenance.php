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
            <span class="label label-info">Usuarios</span>  
            <a class="label label-danger" href="add_admin.php" data-toggle="tooltip" data-placement="top" title="Agregar Usuarios" >Agregar</a>
        </h3> 
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
            <th ></th> 
            <th >ID</th> 
            <th >Name</th>
            <th >Email</th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
        
        include("database.php");
        
        $query_search="SELECT * FROM users ORDER BY users_id";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
        <td><a class='btn btn-success btn-xs' href='edit_admin.php?users_id=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td><a class='btn btn-danger btn-xs' href='dele_admin.php?users_id=%s' name='eliminar' ><span class='glyphicon glyphicon-remove'></span></a> </td>
        </tr>", 
        $listando["users_id"],
        $listando["users_id"], 
        $listando["users_name"],
        $listando["users_mail"],
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
</body>

</html>
