<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
?>
                  
<!DOCTYPE html>
<html lang="es">
<head>
 <title>PBX Symphony</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/mistyle.css">

</head>

<body role="document">

      <?php
      include 'head_menu.php'; 
      ?>
    <div class="container-fluid">
      <br/><pre>
<?php
$command_asterisk ="voicemail reload";
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