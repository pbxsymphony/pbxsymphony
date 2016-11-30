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
        <div class="col-sm-12 col-md-12 col-lg-12"  >
            <h3>
                <span class="label label-info">Version Asterisk</span>  
            </h3> 

            <h4>
            <a class="label label-warning" href="core_show_version.php" data-toggle="tooltip" data-placement="top" title="core show version" >core show version</a>
            </h4>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-12"  >
            <h3>
                <span class="label label-info">Uptime</span>  
            </h3> 

            <h4>
            <a class="label label-warning" href="core_show_uptime.php" data-toggle="tooltip" data-placement="top" title="core show uptime" >core show uptime</a>
            </h4>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-6"  >
            <h3>
                <span class="label label-info">Channels</span>  
            </h3> 

            <h4>
            <a class="label label-warning" href="sip_show_channels.php" data-toggle="tooltip" data-placement="top" title="Sip Channels" >sip show channels</a>
            </h4>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-6"  >
            <h3>
                <span class="label label-info">Extensions</span>  
            </h3> 

            <h4>
            <a class="label label-warning" href="sip_show_peers.php" data-toggle="tooltip" data-placement="top" title="Sip show peers" >sip show peers</a>
            <a class="label label-warning" href="sip_reload.php" data-toggle="tooltip" data-placement="top" title="Sip reload" >sip reload</a>
            </h4>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6"  >
            <h3>
                <span class="label label-info">Rutes</span>  
            </h3> 
            <h4>
            <a class="label label-warning" href="dialplan_reload.php" data-toggle="tooltip" data-placement="top" title="Dialplan Reload" >DialPlan Reload</a>
            </h4>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6"  >
            <h3>
                <span class="label label-info">Voicemail</span>  
            </h3> 
            <h4>
            <a class="label label-warning" href="voicemail_reload.php" data-toggle="tooltip" data-placement="top" title="Voicemail Reload" >Voicemail Reload</a>
            <a class="label label-warning" href="voicemail_show_users.php" data-toggle="tooltip" data-placement="top" title="Voicemail show" >Voicemail show users</a>
            </h4>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6"  >
            <h3>
                <span class="label label-info">Queues</span>  
            </h3> 
            <h4>
            <a class="label label-warning" href="queue_reload.php" data-toggle="tooltip" data-placement="top" title="queue reload" >Queue Reload</a>
            <a class="label label-warning" href="queue_show.php" data-toggle="tooltip" data-placement="top" title="queue show" >queue show</a>
            </h4>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12"  >
            <h3>
                <span class="label label-info">Restart Asterisk</span>  
            </h3> 
            <h4>
            <a class="label label-danger" href="core_restart_now.php" data-toggle="tooltip" data-placement="top" title="core restart now" >core restart now</a>
            </h4>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-12"  >
            <h3>
                <span class="label label-info">Restart Asterisk gracefully</span>  
            </h3> 
            <h4>
            <a class="label label-warning" href="core_restart_gracefully.php" data-toggle="tooltip" data-placement="top" title="core restart gracefully" >core restart gracefully</a>
            </h4>

        </div>




    </div>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
</body>

</html>
