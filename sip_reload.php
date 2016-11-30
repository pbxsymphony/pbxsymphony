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
      <br/><pre>
      <?php
      $command_asterisk ="sip reload";

      $socket = fsockopen("127.0.0.1","5038", $errno, $errstr, 10);
      if (!$socket){
          	echo "$errstr ($errno)\n";
    	}else{
            fputs($socket, "Action: Login\r\n");
            fputs($socket, "UserName: myusername\r\n");
            fputs($socket, "Secret: mypassword\r\n\r\n");

            fputs($socket, "Action: Command\r\n");
            fputs($socket, "Command: $command_asterisk\r\n\r\n");
 
            fputs($socket, "Action: Logoff\r\n\r\n");
            while (!feof($socket)){
               echo fgets($socket).'<br>';
            }
      fclose($socket);
      }

      include("database.php");
      $query="SELECT * FROM sip_buddies";

      $result = mysql_query($query);

      if (!$result) {
          $message  = 'Invalid query: ' . mysql_error() . "\n";
          $message .= 'Whole query: ' . $query;
          die($message);
      }

      while ($row = mysql_fetch_assoc($result)) {

        $command_asterisk ="sip show peer ".$row['name']." load";
        echo $command_asterisk."<br>";
        $socket2 = fsockopen("127.0.0.1","5038", $errno, $errstr, 10);
        if (!$socket2){
              echo "$errstr ($errno)\n";
        }else{
              fputs($socket2, "Action: Login\r\n");
              fputs($socket2, "UserName: myusername\r\n");
              fputs($socket2, "Secret: mypassword\r\n\r\n");

              fputs($socket2, "Action: Command\r\n");
              fputs($socket2, "Command: $command_asterisk\r\n\r\n");

              fputs($socket2, "Action: Logoff\r\n\r\n");

              while (!feof($socket2)){
                 fgets($socket2);
              }
              fclose($socket2);
        }

      }
      mysql_free_result($lista);
      mysql_close(); 

?>

</pre>
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