<?php
session_start();
if ( isset($_SESSION['k_username']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
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

  ?>
    <div class="container-fluid">
      <br/><pre>
<?php
      
      $command_asterisk ="file convert prompts/".$_GET['file']." prompts/".substr($_GET['file'],0,-3).$_GET['ext'];

      $socket = fsockopen("127.0.0.1","5038", $errno, $errstr, 10);
      if (!$socket){
	echo "$errstr ($errno)\n";
	}else{
            fputs($socket, "Action: Login\r\n");
            fputs($socket, "UserName: myusername\r\n");
            fputs($socket, "Secret: mypassword\r\n\r\n");

            fputs($socket, "Action: Command\r\n");
            fputs($socket, "Command: $command_asterisk\r\n\r\n");
 
//            fputs($socket, "Command: dialplan reload\r\n\r\n");
//            fputs($socket, "Command: sip show peers\r\n\r\n");
            fputs($socket, "Action: Logoff\r\n\r\n");
            while (!feof($socket)){
               echo fgets($socket).'<br>';
            }
            fclose($socket);
            }
?></pre>
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