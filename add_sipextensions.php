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
    
    <div class="container">
    <?php if($mensaje !=""){ echo '<div class="alert alert-warning">'.$mensaje.'</div>'; } ?> 
    
    <div class="well" >
		<H2><span class="label label-info">Crear SIP Extensions</span></H2>
        <form class="form-horizontal" action="save_sipextensions.php" method="post" >
        <fieldset>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Nombre Extensions </label>  
          <div class="col-md-4">
          <input id="name" name="name" type="text" placeholder="Nombre " class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callerid"> Callerid </label>  
          <div class="col-md-4">
          <input id="callerid" name="callerid" type="text" placeholder="Callerid " class="form-control input-md">
          <span class="help-block"> Ejemplo: 56226568753 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Defaultuser </label>  
          <div class="col-md-4">
          <input id="defaultuser" name="defaultuser" type="text" placeholder="Defaultuser " class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regexten"> Regexten </label>  
          <div class="col-md-4">
          <input id="regexten" name="regexten" type="text" placeholder="Regexten " class="form-control input-md">
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="secret"> Secret </label>  
          <div class="col-md-4">
          <input id="secret" name="secret" type="text" placeholder="Secret " class="form-control input-md">
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="mailbox"> Mailbox </label>  
          <div class="col-md-4">
          <input id="mailbox" name="mailbox" type="text" placeholder="mailbox " class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="accountcode"> Accountcode</label>  
          <div class="col-md-4">
          <input id="accountcode" name="accountcode" type="text" placeholder="accountcode " class="form-control input-md">
          <span class="help-block"> Ejemplo: Ventas </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-4">
          <input id="context" name="context" type="text" placeholder="context " class="form-control input-md" value="from-sip">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amaflags"> amaflags</label>  
          <div class="col-md-4">
          <input id="amaflags" name="amaflags" type="text" placeholder="amaflags " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callgroup"> callgroup</label>  
          <div class="col-md-4">
          <input id="callgroup" name="callgroup" type="text" placeholder="callgroup " class="form-control input-md">
          <span class="help-block"> Ejemplo: 10 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="canreinvite"> canreinvite</label>  
          <div class="col-md-4">
          <input id="canreinvite" name="canreinvite" type="text" placeholder="canreinvite " class="form-control input-md" value="no">
          <span class="help-block"> Ejemplo: yes </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callgroup"> defaultip</label>  
          <div class="col-md-4">
          <input id="defaultip" name="defaultip" type="text" placeholder="defaultip " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="dtmfmode"> dtmfmode</label>  
          <div class="col-md-4">
          <input id="dtmfmode" name="dtmfmode" type="text" placeholder="dtmfmode " class="form-control input-md" value="rfc2833">
          <span class="help-block"> Ejemplo: RFC2833 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fromuser"> fromuser</label>  
          <div class="col-md-4">
          <input id="fromuser" name="fromuser" type="text" placeholder="fromuser " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fromdomain"> fromdomain</label>  
          <div class="col-md-4">
          <input id="fromdomain" name="fromdomain" type="text" placeholder="fromdomain " class="form-control input-md" >
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fullcontact"> fullcontact</label>  
          <div class="col-md-4">
          <input id="fullcontact" name="fullcontact" type="text" readonly="yes" placeholder="fullcontact " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="host"> host</label>  
          <div class="col-md-4">
          <input id="host" name="host" type="text" placeholder="host " class="form-control input-md" value="dynamic">
          <span class="help-block"> Ejemplo: dynamic </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="insecure"> insecure</label>  
          <div class="col-md-4">
          <input id="insecure" name="insecure" type="text" placeholder="insecure " class="form-control input-md" value="no" >
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="language"> language</label>  
          <div class="col-md-4">
          <input id="language" name="language" type="text" placeholder="language " class="form-control input-md">
          <span class="help-block"> Ejemplo: es/en </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="md5secret"> md5secret</label>  
          <div class="col-md-4">
          <input id="md5secret" name="md5secret" type="text" placeholder="md5secret " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nat"> nat </label>  
          <div class="col-md-4">
          <input id="nat" name="nat" type="text" placeholder="nat " class="form-control input-md" value="yes" >
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="deny"> deny </label>  
          <div class="col-md-4">
          <input id="deny" name="deny" type="text" placeholder="deny " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="permit"> permit </label>  
          <div class="col-md-4">
          <input id="permit" name="permit" type="text" placeholder="permit " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="mask"> mask </label>  
          <div class="col-md-4">
          <input id="mask" name="mask" type="text" placeholder="mask " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="pickupgroup"> pickupgroup </label>  
          <div class="col-md-4">
          <input id="pickupgroup" name="pickupgroup" type="text" placeholder="pickupgroup " class="form-control input-md">
          <span class="help-block"> Ejemplo: 1 </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="port"> port </label>  
          <div class="col-md-4">
          <input id="port" name="port" type="text" placeholder="port " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qualify"> qualify </label>  
          <div class="col-md-4">
          <input id="qualify" name="qualify" type="text" placeholder="qualify " class="form-control input-md" value="yes" >
          <span class="help-block"> Ejemplo: yes/no </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="restrictcid"> restrictcid </label>  
          <div class="col-md-4">
          <input id="restrictcid" name="restrictcid" type="text" placeholder="restrictcid " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="rtptimeout"> rtptimeout </label>  
          <div class="col-md-4">
          <input id="rtptimeout" name="rtptimeout" type="text" placeholder="rtptimeout " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qualify"> rtpholdtimeout </label>  
          <div class="col-md-4">
          <input id="rtpholdtimeout" name="rtpholdtimeout" type="text" placeholder="rtpholdtimeout " class="form-control input-md">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="type"> type </label>  
          <div class="col-md-4">
          <input id="type" name="type" type="text" placeholder="type " class="form-control input-md" value="friend" >
          </div>
        </div>
        

        
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="disallow"> disallow </label>  
          <div class="col-md-4">
          <input id="disallow" name="disallow" type="text" placeholder="disallow " class="form-control input-md" value="all">
          <span class="help-block"> Ejemplo: all </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="allow"> allow </label>  
          <div class="col-md-4">
          <input id="allow" name="allow" type="text" placeholder="allow " class="form-control input-md" value="ulaw;alaw" >
          <span class="help-block"> Ejemplo: ulaw;alaw </span>
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="musiconhold"> musiconhold </label>  
          <div class="col-md-4">
          <input id="musiconhold" name="musiconhold" type="text" placeholder="musiconhold " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regseconds"> regseconds </label>  
          <div class="col-md-4">
          <input id="regseconds" name="regseconds" type="text" placeholder="regseconds " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ipaddr"> ipaddr </label>  
          <div class="col-md-4">
          <input id="ipaddr" name="ipaddr" type="text" readonly="yes" placeholder="ipaddr " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cancallforward"> cancallforward </label>  
          <div class="col-md-4">
          <input id="cancallforward" name="cancallforward" type="text" placeholder="cancallforward " class="form-control input-md" value="yes">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lastms"> lastms </label>  
          <div class="col-md-4">
          <input id="lastms" name="lastms" type="text" placeholder="lastms " class="form-control input-md">
          </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="useragent"> useragent </label>  
          <div class="col-md-4">
          <input id="useragent" name="useragent" type="text" readonly="yes" placeholder="useragent " class="form-control input-md">
         </div>
        </div>
                        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regserver"> regserver </label>  
          <div class="col-md-4">
          <input id="regserver" name="regserver" type="text" readonly="yes" placeholder="regserver " class="form-control input-md">
         </div>
        </div>



       <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="checks_obs">Observaciones</label>
          <div class="col-md-4">                     
            <textarea class="form-control" id="checks_obs" name="checks_obs" placeholder="Observaci&oacute;n " ></textarea>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>