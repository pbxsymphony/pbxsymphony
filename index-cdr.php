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
            <form class="form-inline" action="index-cdr.php" method="post">
              <div class="form-group">
              <span class="label label-info"> CDR </span> &nbsp; 
              </div>
              <div class="form-group">
              <a class="label label-warning" href="download_cdr.php?hoy=<?php echo $fecha; ?>&hoy2=<?php echo $fecha2; ?>">Descargar CDR</a> 
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

          <table class="table table-bordered table-hover table-condensed" style="font-size:small;"> 
          <thead>
              <tr> 
                  <th >Calldate</th> 
                  <th >Src</th>
                  <th >Dst</th>
                  <th >dcontext</th>
                  <th >lastapp</th>
                  <th >lastdata</th>
                  <th >Duration</th>
                  <th >Billsec</th>
                  <th >Disposition</th>
                  <th >Uniqueid</th>
                  <th >Sequence</th>
              </tr> 
          </thead> 
          <?php 
          include("database.php");

          $lista = mysql_query("SELECT * FROM bit_cdr WHERE calldate >= '$fecha 00:00:00' AND calldate <='$fecha2 23:59:59' ");

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
          <td> %s </td>
          <td> %s </td>
          <td> %s </td></tr>", 
          $listando["calldate"], 
          $listando["src"],
          $listando["dst"],
          $listando["dcontext"],
          $listando["lastapp"],
          $listando["lastdata"],
          $listando["duration"],
          $listando["billsec"],
          $listando["disposition"],
          $listando["uniqueid"],
          $listando["sequence"]);
          }
          mysql_free_result($lista);
          mysql_close(); 
          ?>
          </table>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

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