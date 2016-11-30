<?php
	session_start();
	if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

?>
			
<!DOCTYPE html>
<html lang="en">
 <title>PBX Symphony</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/mistyle.css">
</head>
<body>

	<?php
	include 'head_menu.php'; 
	?>
    
    <div class="container">
      
    <?php if($mensaje !=""){ echo '<div class="alert alert-warning">'.$mensaje.'</div>'; } ?> 
	
    <div class="well" >
    	<?php
    		$id=$_GET['id'];
			include("database.php");
        	$lista = "SELECT * FROM sip_buddies WHERE id='$id'";
			$result = mysql_query($lista);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
			}
	
			while ($row = mysql_fetch_assoc($result)) {
				$name=$row['name'];	
				$callerid=$row['callerid'];	
				$defaultuser=$row['defaultuser'];
				$regexten=$row['regexten'];
				$secret=$row['secret'];
				$mailbox=$row['mailbox'];
				$accountcode=$row['accountcode'];
				$contex=$row['contex'];
				$amaflags=$row['amaflags'];
				$callgroup=$row['callgroup'];
				$canreinvite=$row['canreinvite'];
				$defaultip=$row['defaultip'];
				$dtmfmode=$row['dtmfmode'];
				$fromuser=$row['fromuser'];
				$fromdomain=$row['fromdomain'];
				$fullcontact=$row['fullcontact'];
				$host=$row['host'];
				$insecure=$row['insecure'];
				$language=$row['language'];
				$md5secret=$row['md5secret'];
				$nat=$row['nat'];
				$deny=$row['deny'];
				$permit=$row['permit'];
				$mask=$row['mask'];
				$pickupgroup=$row['pickupgroup'];
				$port=$row['port'];
				$qualify=$row['qualify'];
				$restrictcid=$row['restrictcid'];
				$rtptimeout=$row['rtptimeout'];
				$rtpholdtimeout=$row['rtpholdtimeout'];
				$disallow=$row['disallow'];
				$musiconhold=$row['musiconhold'];
				$regseconds=$row['regseconds'];
				$ipaddr=$row['ipaddr'];
				$cancallforward=$row['cancallforward'];
				$lastms=$row['lastms'];
				$useragent=$row['useragent'];
				$regserver=$row['regserver'];
				$check_obs=$row['check_obs'];
			}
			mysql_free_result($result);
			mysql_close();
	     ?>
		<H2><span class="label label-info">Eliminar SIP Extensions</span></H2>
        <form class="form-horizontal" action="save_delesipextensions.php" method="post" >
        <fieldset>
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> ID </label>  
          <div class="col-md-2">
          <input id="name" name="id" type="text" placeholder="Nombre " value="<?php echo $id; ?>" class="form-control input-md">
         
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Nombre Extensions </label>  
          <div class="col-md-4">
          <input id="name" name="name" type="text" placeholder="Nombre " value="<?php  echo $name; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callerid"> Callerid </label>  
          <div class="col-md-4">
          <input id="callerid" name="callerid" type="text" placeholder="Callerid " value="<?php  echo $callerid; ?>"  class="form-control input-md">
          <span class="help-block"> Ejemplo: 56226568753 </span>
          </div>
        </div>

        <?php
	        mysql_free_result($lista);
	        mysql_close(); 
        ?>
        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-danger">Eliminar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-success" onclick="location.href='index-sip-extensions.php'" >Back</button>
          </div>
        </div>
        
        </fieldset>
        </form>

    </div>
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