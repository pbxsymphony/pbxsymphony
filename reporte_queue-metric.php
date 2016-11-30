<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 


$fecha=$_POST['hoy'];

if ( $fecha == "" ) { 
  $fecha=date("Y-m-d");
} 

$fecha2=$_POST['hoy2'];

if ( $fecha2 == "" ) { 
  $fecha2=date("Y-m-d");
}  


?>
<!DOCTYPE html>

<html lang="es">
<head>
<?php
include 'title.php';
?>
    <link href="css/datepicker.css" rel="stylesheet">

</head>

<body role="document">

  <?php
    if ( isset($_SESSION['k_username']) ) { include 'head_menu.php'; }
    if ( isset($_SESSION['k_user']) ) { include 'head_menu-agent.php';  }

  ?>

    <div class="container-fluid">

        <h3>
            <form class="form-inline" action="reporte_queue-metric.php" method="post">
              <div class="form-group">
              <span class="label label-info"> Reporte de Actividades </span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="hoy" name="hoy" value="<?php echo $fecha; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="hoy2" name="hoy2" value="<?php echo $fecha2; ?>">
              </div>
              <button type="submit" class="btn btn-primary">OK</button>
            </form>

        </h3>

          <div class="col-sm-12 col-md-12 col-lg-12 "  > 

             <h3><span class="label label-danger">SUMARY AGENT</span> &nbsp;

             </h3>

              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                    <th>AGENT</th>
                    <th>CONNECT</th>
                    <th>COMPLETECALLER</th>
                    <th>COMPLETEAGENT</th>
                    <th>RINGNOANSWER</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];

                $query_search="SELECT agent, sum(if(event='CONNECT',1,0)) CONNECT, sum(if(event='COMPLETECALLER',1,0)) COMPLETECALLER, sum(if(event='COMPLETEAGENT',1,0)) COMPLETEAGENT, sum(if(event='RINGNOANSWER',1,0)) RINGNOANSWER FROM queue_log WHERE time >= '$fecha 00:00:00' AND time <='$fecha2 23:59:59' AND agent*0 != agent  GROUP BY agent ";
                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                printf("<tr >
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                $listando["agent"],
                $listando["CONNECT"],
                $listando["COMPLETECALLER"],
                $listando["COMPLETEAGENT"],
                $listando["RINGNOANSWER"]
                );
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>

          </div><!-- fin -->



          <div class="col-sm-12 col-md-12 col-lg-12 "  > 

             <h3><span class="label label-danger">AGENT LOGIN</span> &nbsp;

             </h3>

              <table class="table table-bordered table-hover table-condensed" style="font-size:small;">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Time</th>
                    <th>Agent</th>
                    <th>Queue</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
 
                include("database.php");

                $membername=$_SESSION["k_membername"];
                
                $query_search="SELECT * FROM queue_log WHERE callid='REALTIME' AND event in ('ADDMEMBER','REMOVEMEMBER') AND time >= '$fecha 00:00:00' AND time <='$fecha2 23:59:59' GROUP BY agent ORDER BY id DESC ";

                $lista = mysql_query($query_search);
                while ($listando = mysql_fetch_array($lista)) {
                printf("<tr >
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
                </tr>", 
                $listando["callid"],
                substr($listando["time"],0,19),
                $listando["agent"],
                $listando["queuename"]
                );
                }
                mysql_free_result($lista);
                mysql_close(); 
                
                ?>
                </tbody>
              </table>

          </div><!-- fin -->

          <!-- inicio -->
          <div class="col-sm-12 col-md-12 col-lg-12 "  > 

          <h3><span class="label label-success"> Reporte de Actividad </span></h3>
          <table class="table table-bordered table-hover table-condensed" style="font-size:small;"> 
          <thead>
              <tr> 
                  <th >Uniqueid</th>
                  <th >Calldate</th> 
                  <th >Src</th>
                  <th >Dst</th>
                  <th >dcontext</th>
                  <th >lastapp</th>
                  <th >agent</th>
                  <th >lastdata</th>
                  <th >Duration</th>
                  <th >Billsec</th>
                  <th >Disposition</th>
                  <th >Event</th>
              </tr> 
          </thead> 
          <?php 
          include("database.php");

          $lista = mysql_query("SELECT * FROM bit_cdr,queue_log WHERE calldate >= '$fecha 00:00:00' AND calldate <='$fecha2 23:59:59'  AND lastapp='Queue' AND event in ('COMPLETECALLER','COMPLETEAGENT') AND bit_cdr.uniqueid=queue_log.callid GROUP BY uniqueid ORDER BY calldate DESC ");
          while ($listando = mysql_fetch_array($lista)) {
          printf("<tr >
          <td> <a href='monitor/%s.wav' ><span class='glyphicon glyphicon-volume-up'></span></a> %s</td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td></tr>", 
          $listando["uniqueid"],$listando["uniqueid"],
          $listando["calldate"], 
          $listando["src"],
          $listando["dst"],
          $listando["dcontext"],
          $listando["lastapp"],
          $listando["agent"],
          $listando["lastdata"],
          $listando["duration"],
          $listando["billsec"],
          $listando["disposition"],
          $listando["event"]);
          }
          mysql_free_result($lista);
          mysql_close(); 
          ?>
          </table>
	     </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/Chart.js"></script>
    <script>
      $('#hoy').datepicker({
                format: 'yyyy-mm-dd'
    });
      $('#hoy2').datepicker({
                format: 'yyyy-mm-dd'
    });
    </script>
</body>
</html>