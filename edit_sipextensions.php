<?php
	session_start();
	if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

?>
			
<!DOCTYPE html>
<html lang="en">
<?php include 'title.php'; ?>
</head>
<body>

	<?php
	include 'head_menu.php'; 
	?>
    
    <div class="container-fluid">
      
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
				$context=$row['context'];
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
        $allow=$row['allow'];
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
		<H2><span class="label label-info">Modificar SIP Extensions</span></H2>
        <form class="form-horizontal" action="save_editsipextensions.php" method="post" >
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
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Defaultuser </label>  
          <div class="col-md-4">
          <input id="defaultuser" name="defaultuser" type="text" placeholder="Defaultuser " value="<?php  echo $defaultuser; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regexten"> Regexten </label>  
          <div class="col-md-4">
          <input id="regexten" name="regexten" type="text" placeholder="Regexten " value="<?php  echo $regexten; ?>" class="form-control input-md">
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="secret"> Secret </label>  
          <div class="col-md-4">
          <input id="secret" name="secret" type="text" placeholder="Secret " value="<?php  echo $secret;?>" class="form-control input-md">
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="mailbox"> Mailbox </label>  
          <div class="col-md-2">
          <input id="mailbox" name="mailbox" type="text" placeholder="mailbox " value="<?php  echo $mailbox ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="accountcode"> Accountcode</label>  
          <div class="col-md-4">
          <input id="accountcode" name="accountcode" type="text" placeholder="accountcode " value="<?php  echo $accountcode; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: Ventas </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-3">
          <input id="context" name="context" type="text" placeholder="context" value="<?php  echo $context; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amaflags"> amaflags</label>  
          <div class="col-md-4">
          <input id="amaflags" name="amaflags" type="text" placeholder="amaflags " value="<?php  echo $amaflags ?>" class="form-control input-md" readonly >
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callgroup"> callgroup</label>  
          <div class="col-md-4">
          <input id="callgroup" name="callgroup" type="text" placeholder="callgroup " value="<?php  echo $callgroup ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 10 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="canreinvite"> canreinvite</label>  
          <div class="col-md-2">
          <input id="canreinvite" name="canreinvite" type="text" placeholder="canreinvite " value="<?php  echo $canreinvite ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: yes </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callgroup"> defaultip</label>  
          <div class="col-md-4">
          <input id="defaultip" name="defaultip" type="text" placeholder="defaultip " value="<?php  echo $defaultip ?>" class="form-control input-md" readonly>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="dtmfmode"> dtmfmode</label>  
          <div class="col-md-3">
          <input id="dtmfmode" name="dtmfmode" type="text" placeholder="dtmfmode " value="<?php  echo $dtmfmode ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: RFC2833 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fromuser"> fromuser</label>  
          <div class="col-md-3">
          <input id="fromuser" name="fromuser" type="text" placeholder="fromuser " value="<?php  echo $fromuser ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fromdomain"> fromdomain</label>  
          <div class="col-md-3">
          <input id="fromdomain" name="fromdomain" type="text" placeholder="fromdomain " value="<?php  echo $fromdomain ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fullcontact"> fullcontact</label>  
          <div class="col-md-4">
          <input id="fullcontact" name="fullcontact" type="text" readonly  placeholder="fullcontact " value="<?php  echo $fullcontact ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="host"> host</label>  
          <div class="col-md-3">
          <input id="host" name="host" type="text" placeholder="host " value="<?php  echo $host ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: dynamic </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="insecure">insecure</label>  
          <div class="col-md-2">
          <input id="insecure" name="insecure" type="text" placeholder="insecure" value="<?php  echo $insecure; ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="language"> language</label>  
          <div class="col-md-2">
          <input id="language" name="language" type="text" placeholder="language " value="<?php  echo $language ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: es/en </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="md5secret"> md5secret</label>  
          <div class="col-md-4">
          <input id="md5secret" name="md5secret" type="text" placeholder="md5secret " value="<?php  echo $md5secret ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nat"> nat </label>  
          <div class="col-md-2">
          <input id="nat" name="nat" type="text" placeholder="nat " value="<?php  echo $nat ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="deny"> deny </label>  
          <div class="col-md-4">
          <input id="deny" name="deny" type="text" placeholder="deny " value="<?php  echo $deny ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="permit"> permit </label>  
          <div class="col-md-4">
          <input id="permit" name="permit" type="text" placeholder="permit " value="<?php  echo $permit ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="mask"> mask </label>  
          <div class="col-md-4">
          <input id="mask" name="mask" type="text" placeholder="mask " value="<?php  echo $mask ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="pickupgroup"> pickupgroup </label>  
          <div class="col-md-2">
          <input id="pickupgroup" name="pickupgroup" type="text" placeholder="pickupgroup " value="<?php  echo $pickupgroup ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="port"> port </label>  
          <div class="col-md-4">
          <input id="port" name="port" type="text" placeholder="port " value="<?php  echo $port ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qualify"> qualify </label>  
          <div class="col-md-2">
          <input id="qualify" name="qualify" type="text" placeholder="qualify " value="<?php  echo $qualify ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="restrictcid"> restrictcid </label>  
          <div class="col-md-4">
          <input id="restrictcid" name="restrictcid" type="text" readonly placeholder="restrictcid " value="<?php  echo $restrictcid ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="rtptimeout"> rtptimeout </label>  
          <div class="col-md-3">
          <input id="rtptimeout" name="rtptimeout" type="text" readonly placeholder="rtptimeout " value="<?php  echo $rtptimeout ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qualify"> rtpholdtimeout </label>  
          <div class="col-md-4">
          <input id="rtpholdtimeout" name="rtpholdtimeout" type="text" readonly placeholder="rtpholdtimeout " value="<?php  echo $rtpholdtimeout ?>"class="form-control input-md">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="type"> type </label>  
          <div class="col-md-3">
          <input id="type" name="type" type="text" placeholder="type " value="<?php  echo $type ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="disallow"> disallow </label>  
          <div class="col-md-2">
          <input id="disallow" name="disallow" type="text" placeholder="disallow " value="<?php  echo $disallow ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: all </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="allow"> allow </label>  
          <div class="col-md-4">
          <input id="allow" name="allow" type="text" placeholder="allow " value="<?php  echo $allow ?>"class="form-control input-md">
          <span class="help-block"> Ejemplo: ulaw;alaw </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="musiconhold"> musiconhold </label>  
          <div class="col-md-4">
          <input id="musiconhold" name="musiconhold" type="text"  placeholder="musiconhold " value="<?php  echo $musiconhold ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regseconds"> regseconds </label>  
          <div class="col-md-4">
          <input id="regseconds" name="regseconds" type="text" readonly placeholder="regseconds " value="<?php  echo $regseconds ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ipaddr"> ipaddr </label>  
          <div class="col-md-4">
          <input id="ipaddr" name="ipaddr" type="text" readonly placeholder="ipaddr " value="<?php  echo $ipaddr ?>"class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cancallforward"> cancallforward </label>  
          <div class="col-md-4">
          <input id="cancallforward" name="cancallforward" type="text" placeholder="cancallforward " value="<?php  echo $cancallforward ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lastms"> lastms </label>  
          <div class="col-md-4">
          <input id="lastms" name="lastms" type="text" readonly placeholder="lastms " value="<?php  echo $lastms ?>" class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="useragent"> useragent </label>  
          <div class="col-md-4">
          <input id="useragent" name="useragent" type="text" readonly placeholder="useragent " value="<?php  echo $useragent ?>"class="form-control input-md">
         </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regserver"> regserver </label>  
          <div class="col-md-4">
          <input id="regserver" name="regserver" type="text" readonly placeholder="regserver " value="<?php  echo $regserver ?>" class="form-control input-md">
         </div>
        </div>

        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-success">Guardar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
        
        </fieldset>
        </form>


    </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

</html>