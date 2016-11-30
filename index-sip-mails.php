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

<script src="js/Chart.js"></script>

</head>
<body>

    <?php
    if ( isset($_SESSION['k_username']) ) { include 'head_menu.php'; }
    if ( isset($_SESSION['k_user']) ) { include 'head_menu-agent.php';  }

    ?> 
    <div class="container-fluid">
        <h3>
            <span class="label label-info"> SIP VOICEMAIL</span> 
            <a class="label label-danger" href="add_voicemail.php" data-toggle="tooltip" data-placement="top" title="Agregar Logsbooks" >Agregar</a>
            <a class="label label-warning" href="voicemail_reload.php" data-toggle="tooltip" data-placement="top" title="Voicemail Reload" >Voicemail Reload</a>
            <a class="label label-warning" href="voicemail_show_users.php" data-toggle="tooltip" data-placement="top" title="Voicemail show" >Voicemail show users</a>
        </h3>
        <table class="table table-bordered table-hover table-condensed" >   
        <thead>
        <tr > <!-- customer_id,     context,    mailbox,    PASSWORD,   fullname,   email !-->

            <th ></th> 
            <th >UniqueID</th> 
            <th >Customer_id</th> 
            <th >Context</th> 
            <th >Mailbox</th>
            <th >Fullname</th>
            <th >Email</th>
            <th ></th>
        </tr> 
        </thead> 
        <tbody>
        <?php 
       
        
        include("database.php");
        
		$query_search="SELECT * FROM voicemail_users ORDER BY Mailbox";
        $lista = mysql_query($query_search);
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr >
		<td><a class='btn btn-success btn-xs' href='edit_voicemail.php?id=%s' ><span class=\"glyphicon glyphicon-edit\"></span></a></td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
		<td> %s </td>
		<td><a class='btn btn-danger btn-xs' href='dele_voicemail.php?id=%s' ><span class='glyphicon glyphicon-remove'></a> </td>
        </tr>", 
        $listando["uniqueid"],
        $listando["uniqueid"],
        $listando["customer_id"], 
        $listando["context"], 
        $listando["mailbox"],
		$listando["fullname"],
        $listando["email"],
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>