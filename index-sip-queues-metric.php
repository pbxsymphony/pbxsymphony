<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

  include("database.php");

  // Variable de Fecha si esta vacia 

  $fecha=date('Y-m-d');
  $fecha_hora=date('Y-m-d H:m:s');

  $refresh=$_GET['refresh'];

  $event=$_GET['event'];
  if ($event =="") { $event ="ABANDON" ;}

  // inicio Query
 
  $queues="SELECT event,count(event) as totalevent FROM queue_log WHERE event in ('ENTERQUEUE','ABANDON','RINGNOANSWER','COMPLETECALLER','COMPLETEAGENT') AND time like '$fecha%' GROUP BY event";
 
  $result = mysql_query($queues);
   
  if (!$result) { $message  = 'Invalid query: ' . mysql_error() . "\n"; $message .= 'Whole query: ' . $result; die($message);   }
 
  $i=0;
  while ($row = mysql_fetch_assoc($result)) {
     
    $queue_log_event[$i][0]=$row['event'];
    $queue_log_event[$i][1]=$row['totalevent'];
    $i=$i+1;
 
  }
 
  //fin
   
  mysql_free_result($result);
  mysql_close();
 

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

    ?> <br>


            <div class="container-fluid" >



              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center;" >
              <font style="font-size:xx-small;"><?php echo $queue_log_event[1][0]; ?></font><h5><?php echo $queue_log_event[1][1]; ?> </h5>
              </div>&nbsp;

              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center;" >
              <font style="font-size:xx-small;"><?php echo $queue_log_event[0][0]; ?></font><h5><?php echo $queue_log_event[0][1]; ?> </h5>
              </div>&nbsp;

              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center;" >
              <font style="font-size:xx-small;"><?php echo $queue_log_event[2][0]; ?></font><h5><?php echo $queue_log_event[2][1]; ?> </h5>
              </div>&nbsp;

              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center;" >
              <font style="font-size:xx-small;"><?php echo $queue_log_event[3][0]; ?></font><h5><?php echo $queue_log_event[3][1]; ?> </h5>
              </div>&nbsp;
            
              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center;" >
              <font style="font-size:xx-small;"><?php echo $queue_log_event[4][0]; ?></font><h5><?php echo $queue_log_event[4][1]; ?> </h5>
              </div>&nbsp;

              <!-- inicio -->
              <div class="col-sm-6 col-md-2 col-lg-1"  style="text-align:center; " >
                  <div class="btn-group">
                      <a  class="label label-success " data-toggle="dropdown" aria-haspopup="true" > Refresh Page <span class="caret"></span> </a>
                      <ul class="dropdown-menu">
                        <li><a href="?refresh=5">5</a></li>
                        <li><a href="?refresh=10">10</a></li>
                        <li><a href="?refresh=15">15</a></li>
                        <li><a href="?refresh=20">20</a></li>
                        <li><a href="?refresh=25">25</a></li>
                        <li><a href="?refresh=30">30</a></li>
                        <li><a href="?refresh=40">40</a></li>
                        <li><a href="?refresh=50">50</a></li>
                        <li><a href="?refresh=60">60</a></li>
                      </ul>
                  </div>
                   
              </div>&nbsp;
              <!-- fin -->

              <!-- inicio -->
              <!-- fin -->

            </div>

       <div class="container-fluid" >
          <div class="row">
          <div class="list-group">

          <!-- inicio -->
          <div class="col-sm-12 col-md-12 col-lg-6 "  >
              <h3><span class="label label-warning">LLAMADAS EN ESPERA</span></h3>
              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                   
                    <th>Fecha y Hora</th>
                    <th>Queue</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];

                $query_search="SELECT * FROM ( SELECT * FROM queue_log WHERE time like '$fecha%' ORDER BY id DESC ) queue_log_temp GROUP BY callid ORDER BY id DESC LIMIT 10";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                if ($listando['event'] == 'ENTERQUEUE' OR $listando['event'] == 'RINGNOANSWER') {
                printf(" <tr >
              
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                 
                substr($listando["time"],1,18),
                $listando["queuename"],
                $listando["data1"],
                $listando["data2"]);
                }
                }  
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>
            </div> 
            <!-- fin -->
  
            <!-- inicio -->
            <div class="col-sm-12 col-md-12 col-lg-6 "  >
              <h3><span class="label label-success">LLAMADAS EN CURSO</span></h3>
              <table class="table table-bordered table-hover table-condensed" style="font-size:small;"> 
                <thead>
                  <tr>
                   
                    <th>Fecha y Hora</th>
                    <th>Queue</th>
                    <th>Agent</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $query_search="SELECT * FROM ( SELECT * FROM queue_log WHERE time like '$fecha%' ORDER BY id DESC ) queue_log_temp GROUP BY callid ORDER BY id DESC LIMIT 10";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                if ($listando['event'] == 'CONNECT' ) {
                printf("<tr >
                 
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                 
                substr($listando["time"],0,19),
                $listando["queuename"],
                $listando["agent"],
                $listando["data2"]);
                }
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>
            </div> 
            <!-- fin -->
          </div>
          </div>

          <div class="row">
          <div class="list-group">

          <!-- inicio -->
          <div class="col-sm-12 col-md-12 col-lg-6" >
             <h3><span class="label label-info">AGENTES EN LINEA</span></h3>
              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                    <th>Agente</th>
                    <th>Queues</th>
                    <th>Extension</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];

                $query_search="SELECT membername , GROUP_CONCAT(queue_name) AS queues, interface FROM queue_member_table  WHERE paused = '0' GROUP BY membername";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                printf("<tr >
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                $listando["membername"],
                $listando["queues"],
                $listando["interface"]);
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>
          </div> 
          <!-- fin -->

          <!-- inicio -->
          <div class="col-sm-12 col-md-12 col-lg-6 "  >
             <h3><span class="label label-warning">AGENTES EN PAUSA</span></h3>
              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                    <th>Agente</th>
                    <th>Queues</th>
                    <th>Extension</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];

                $query_search="SELECT membername , GROUP_CONCAT(queue_name) AS queues, interface FROM queue_member_table  WHERE paused = '1' GROUP BY membername";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                printf("<tr >
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                $listando["membername"],
                $listando["queues"],
                $listando["interface"]);
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>
          </div> 
          <!-- fin -->
          </div>
          </div>

          <div class="row">
          <div class="list-group">        
          <!-- inicio -->
          <div class="col-sm-12 col-md-12 col-lg-12 "  > 

             <h3><span class="label label-danger">LLAMADAS <?php echo $event; ?> </span> &nbsp;

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" >
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="?refresh=<?php echo $refresh; ?>&event=ABANDON">ABANDON</a></li>
                        <li><a href="?refresh=<?php echo $refresh; ?>&event=COMPLETECALLER">COMPLETECALLER</a></li>
                        <li><a href="?refresh=<?php echo $refresh; ?>&event=COMPLETEAGENT">COMPLETEAGENT</a></li>
                        <li><a href="?refresh=<?php echo $refresh; ?>&event=RINGNOANSWER">RINGNOANSWER</a></li>
                        <li><a href="?refresh=<?php echo $refresh; ?>&event=ENTERQUEUE">ENTERQUEUE</a></li>
                      </ul>
                      </div>
             </h3>

              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Time</th>
                    <th>Agent</th>
                    <th>Queue</th>
                    <th>Event</th>
                    <th>Data1</th>
                    <th>Data2</th>
                    <th>Data3</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];

                $query_search="SELECT * FROM queue_log WHERE event LIKE '$event' AND time like '$fecha%'  ORDER BY id DESC LIMIT 10";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                printf("<tr >
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                $listando["callid"],
                substr($listando["time"],0,19),
                $listando["agent"],
                $listando["queuename"],
                $listando["event"],
                $listando["data1"],
                $listando["data2"],
                $listando["data3"]
                );
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>

          </div><!-- fin -->

        </div>
      </div>

    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.bundle.js"></script>

</body>
</html>