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
            <span class="label label-info"> SIP Extensions</span> 
            <a class="label label-danger" href="add_sipextensions.php" data-toggle="tooltip" data-placement="top" title="Agregar Extensions" >Agregar</a>
            <a class="label label-warning" href="sip_show_peers.php" data-toggle="tooltip" data-placement="top" title="Sip show peers" >sip show peers</a>
            <a class="label label-warning" href="sip_reload.php" data-toggle="tooltip" data-placement="top" title="Sip reload" >sip reload</a>
        </h3>
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr >
        <th >Edit</th>  
        <th >Info</th>  
        <th >ID</th>    

        <th >Name</th> 
        <th >CallerID</th>
        <th >Defaultuser</th>
        <th >Remove</th>  
        </tr> 
        </thead> 
        <tbody>
        <?php 
        include("database.php");
		$userid=$_SESSION["k_userid"];;
		$query_search_decks="SELECT * FROM sip_buddies ORDER BY name";
        $lista = mysql_query($query_search_decks);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_sipextensions.php?id=%s' ><span class='glyphicon glyphicon-edit'></span></a></td>
        <td><a class='btn btn-warning btn-xs' href='sip_show_peer.php?extension=%s' ><span class=\"glyphicon glyphicon-info-sign\"></span> </a></td>
        <td> %s </td> 
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href=\"dele_sipextensions.php?id=%s\" ><span class='glyphicon glyphicon-remove'></span></a> </td>
        </tr>", 
        $listando["id"],$listando["name"], 
        $listando["id"], 
        $listando["name"],
        $listando["callerid"],
        $listando["defaultuser"],
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