<?php
  session_start();
  if (isset($_SESSION['k_user'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include 'title.php'; ?>

</head>

<body role="document">

  <?php
  include 'head_menu-agent.php'; 
  ?>
    <br/>
    <div class="container-fluid">
        <div class="well" >
        <h2>
            <span class="label label-info"> CDR </span> 
        </h2><br/>

        <table class="table table-bordered table-hover" >  
          <thead>
              <tr> 
                  <th >id</th> 
              	  <th >time</th> 
                  <th >queuename</th>
                  <th >event </th>
                  <th >data1</th>
                  <th >data2</th>
                  <th >data3</th>
              </tr> 
          </thead> 
          <?php 
          include("database.php");

          // Variable de Fecha si esta vacia 

          $fecha=date('Y-m-d');
          $membername=$_SESSION["k_membername"];
        
          $query=mysql_query("SELECT  * FROM queue_log WHERE  time like '$fecha%' and  agent = '$membername' AND event in ('COMPLETEAGENT','COMPLETECALLER') ");
          echo $queues;
          while ($listando = mysql_fetch_array($query)) {
          printf("<tr >
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td></tr>", 
          $listando["id"], 
          $listando["time"], 
          $listando["queuename"],
          $listando["event"],
          $listando["data1"],
          $listando["data2"],
          $listando["data3"]);
          }

          mysql_free_result($query);
          mysql_close(); 
          ?>
          </table>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/Chart.js"></script>

	</script>
</body>
</html>