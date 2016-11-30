<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$load_avg_01=exec("uptime | cut -d':' -f5 | awk -F\",\" '{ print $1}'");
$load_avg_02=exec("uptime | cut -d':' -f5 | awk -F\",\" '{ print $2}'");
$load_avg_03=exec("uptime | cut -d':' -f5 | awk -F\",\" '{ print $3}'");


$mem_01=exec("free -m | grep Mem | awk '{ print $3}'");
$mem_02=exec("free -m | grep Mem | awk '{ print $4}'");
$mem_03=exec("free -m | grep Mem | awk '{ print $5}'");
$mem_04=exec("free -m | grep Mem | awk '{ print $6}'");
$mem_05=exec("free -m | grep Mem | awk '{ print $7}'");

// Monitoreo de Temperatura para Raspberry 
$temp_01=exec("/opt/vc/bin/vcgencmd measure_temp | awk -F\"=\" '{print $2}' | awk -F\"'\" '{print $1}'");
$temp_02=100-$temp_01;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PBX Symphony</title>
    <script src="js/Chart.js"></script>
  <script type="text/javascript" src="js/jquery.tempgauge.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/mistyle.css">

</head>
<body>

	<?php
	include 'head_menu.php'; 
	?> <br/>
  <div class="container-fluid" >

          <div class="col-sm-6 col-md-6 col-lg-2 text-center" style="background:#F2F2F2">
               <h5>CPU Load Average</h5>
              <canvas id="myChartbar" width="100" height="100"></canvas>
              <script>
              var ctx1 = document.getElementById("myChartbar");
              var myChartbar = new Chart(ctx1, {
                  type: 'bar',
                  data: {
                      labels: ["Load 1", "Load 2", "Load 3"],
                      datasets: [{
                          label: 'Load Average',
                          data: ["<?php echo $load_avg_01; ?>", "<?php echo $load_avg_02; ?>", "<?php echo $load_avg_03; ?>" ],
                          backgroundColor: [
                              '#FF6384',
                              '#FFCE56',
                              '#F5A9F2'
                          ],
                          borderColor: [
                              '#FF6384',
                              '#FFCE56',
                              '#F5A9F2'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
              </script>
           
            <p class="text-justify"> </p>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-2 text-center" style="background:#F2F2F2">
              <h5>Memory Mb</h5>
              <canvas id="myChartpie" width="100" height="100"></canvas>
              <script>
              var ctx2 = document.getElementById("myChartpie");
              var myChartpie = new Chart(ctx2,{
                  type: 'doughnut',
                  data: {
                          labels: [
                              "Used",
                              "Free",
                              "Shared",
                              "Buffers",
                              "Cached"
                          ],
                          datasets: [
                              {
                                  data: [ "<?php echo $mem_01; ?>", "<?php echo $mem_02; ?>", "<?php echo $mem_03; ?>","<?php echo $mem_04; ?>","<?php echo $mem_05; ?>",],
                                  backgroundColor: [
                                      "#FF6384",
                                      "#01DF01",
                                      "#F5A9F2",
                                      "#36A2EB",
                                      "#FFCE56"
                                  ],
                                  hoverBackgroundColor: [
                                      "#FF6384",
                                      "#01DF01",
                                      "#F5A9F2",
                                      "#36A2EB",
                                      "#FFCE56"
                                  ]
                              }]



                        }
                  });
              </script>
            
            <p class="text-justify"> </p>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-2 text-center" style="background:#F2F2F2">
              <h5>Temperatura</h5>
              <canvas id="myChartpie3" width="100" height="100"></canvas>
              <script>
              var ctx3 = document.getElementById("myChartpie3");
              var myChartpie3 = new Chart(ctx3,{
                  type: 'doughnut',
                  data: {
                          labels: [
                              "Temperatura",
                              " "
                          ],
                          datasets: [
                              {
                                  data: [ "<?php echo $temp_01; ?>", "<?php echo $temp_02; ?>" ],
                                  backgroundColor: [
                                      "#36A2EB",
                                      "#FFCE56"
                                  ],
                                  hoverBackgroundColor: [
                                      "#36A2EB",
                                      "#FFCE56"
                                  ]
                              }]



                        }
                  });
              </script>
            
            <p class="text-justify"> </p>
          </div>


    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.bundle.js"></script>

</body>
</html>