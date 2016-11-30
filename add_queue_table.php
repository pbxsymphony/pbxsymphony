<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

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
    
		<H2><span class="label label-info">Crear Queue</span></H2>
        <form class="form-horizontal" action="save_queue_table.php" method="post" >
         <fieldset>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="id"> id </label>  
          <div class="col-md-2">
          <input id="id" name="id" type="text" placeholder="id" class="form-control input-md" readonly>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> name </label>  
          <div class="col-md-3">
          <input id="name" name="name" type="text" placeholder="name" class="form-control input-md">
          <span class="help-block"> Ejemplo: queue-ventas</span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="musiconhold"> musiconhold	</label>  
          <div class="col-md-3">
          <input id="musiconhold" name="musiconhold" type="text" placeholder="default" value="default" class="form-control input-md">
          <span class="help-block"> Ejemplo: default </span>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce"> announce </label>  
          <div class="col-md-4">
          <input id="announce" name="announce" type="text" placeholder="announce"  class="form-control input-md">
          </div>
        </div>
          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-3">
          <input id="context" name="context" type="text" placeholder="from-sip" value="from-sip" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="timeout"> timeout </label>  
          <div class="col-md-1">
          <input id="timeout" name="timeout" type="text" placeholder="0" value="0" class="form-control input-md">
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="monitor_join"> monitor_join </label>  
          <div class="col-md-1">
              <select id="monitor_join" name="monitor_join" class="form-control input-md" >
              <option value="yes" selected >yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="monitor_format"> monitor_format </label>  
          <div class="col-md-1">
              <select id="monitor_format" name="monitor_format" class="form-control input-md" >
              <option value="" selected >None</option>
              <option value="wav">wav</option>
              <option value="gsm">gsm</option>
              <option value="wav49">wav49</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="queue_youarenext"> queue_youarenext </label>  
            <div class="col-md-4">
            <input id="queue_youarenext" name="queue_youarenext" type="text" placeholder="" class="form-control input-md">
          </div>       
        </div>
                <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="queue_thereare"> queue_thereare </label>  
            <div class="col-md-4">
            <input id="queue_thereare" name="queue_thereare" type="text" placeholder="" class="form-control input-md">
          </div>       
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_callswaiting"> queue_callswaiting </label>  
          <div class="col-md-2">
              <select id="queue_callswaiting" name="queue_callswaiting" class="form-control input-md" >
              <option value="yes" selected >yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label" for="queue_holdtime"> queue_holdtime </label>  
           <div class="col-md-4">
             <input id="queue_holdtime" name="queue_holdtime" type="text" placeholder="" value="" class="form-control input-md">
           </div>
        </div> 
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_minutes"> queue_minutes </label>  
          <div class="col-md-4">
          <input id="queue_minutes" name="queue_minutes" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_seconds"> queue_seconds </label>  
          <div class="col-md-4">
          <input id="queue_seconds" name="queue_seconds" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_lessthan"> queue_lessthan </label>  
          <div class="col-md-4">
          <input id="queue_lessthan" name="queue_lessthan" type="text" placeholder="" value="" class="form-control input-md">
          </div>  
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_thankyou"> queue_thankyou </label>  
          <div class="col-md-4">
          <input id="queue_thankyou" name="queue_thankyou" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_reporthold"> queue_reporthold </label>  
          <div class="col-md-4">
          <input id="queue_reporthold" name="queue_reporthold" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_frequency"> announce_frequency </label>  
          <div class="col-md-4">
          <input id="announce_frequency" name="announce_frequency" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_round_seconds"> announce_round_seconds </label>  
          <div class="col-md-4">
          <input id="announce_round_seconds" name="announce_round_seconds" type="text" placeholder="" value="" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_holdtime"> announce_holdtime </label>  
          <div class="col-md-1">
              <select id="announce_holdtime" name="announce_holdtime" class="form-control input-md" >
              <option value="yes" selected >yes</option>
              <option value="no">no</option>
              <option value="once">once</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="retry"> retry </label>  
          <div class="col-md-1">
              <select id="retry" name="retry" class="form-control input-md" >
              <option value="0" selected >0</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="45">45</option>
              <option value="50">50</option>
              <option value="55">55</option>
              <option value="60">60</option>
              </select>
          </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="wrapuptime"> wrapuptime </label>  
          <div class="col-md-1">
          <input id="wrapuptime" name="wrapuptime" type="text" placeholder="5" value="5" class="form-control input-md">
          <span class="help-block"> Ejemplo: 5 </span>
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="maxlen"> maxlen </label>  
          <div class="col-md-1">
              <select id="maxlen" name="maxlen" class="form-control input-md" >
              <option value="0" selected >0</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="45">45</option>
              <option value="50">50</option>
              <option value="55">55</option>
              <option value="60">60</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="servicelevel"> servicelevel </label>  
          <div class="col-md-1">
          <input id="servicelevel" name="servicelevel" type="text" placeholder="0" value="0" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="strategy"> strategy </label>  
          <div class="col-md-2">
              <select id="strategy" name="strategy" class="form-control input-md" >
              <option value="ringall" selected >ringall</option>
              <option value="roundrobin">roundrobin</option>
              <option value="leastrecent">leastrecent</option>
              <option value="roundrobin">roundrobin</option>
              <option value="fewestcalls">fewestcalls</option>
              <option value="random">random</option>
              <option value="rrmemory">rrmemory</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="joinempty"> joinempty </label>  
          <div class="col-md-1">
              <select id="joinempty" name="joinempty" class="form-control input-md" >
              <option value="yes" selected >yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="leavewhenempty"> leavewhenempty </label>  
          <div class="col-md-1">
              <select id="leavewhenempty" name="leavewhenempty" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="eventmemberstatus"> eventmemberstatus </label>  
          <div class="col-md-1">
              <select id="eventmemberstatus" name="eventmemberstatus" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="eventwhencalled"> eventwhencalled </label>  
          <div class="col-md-1">
              <select id="eventwhencalled" name="eventwhencalled" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="reportholdtime"> reportholdtime </label>  
          <div class="col-md-1">
              <select id="reportholdtime" name="reportholdtime" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="memberdelay"> memberdelay </label>  
          <div class="col-md-1">
              <select id="memberdelay" name="memberdelay" class="form-control input-md" >
              <option value="0" selected >0</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="weight"> weight </label>  
          <div class="col-md-4">
          <input id="weight" name="weight" type="text" placeholder="" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="timeoutrestart"> timeoutrestart </label>  
          <div class="col-md-1">
              <select id="timeoutrestart" name="timeoutrestart" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="periodic_announce"> periodic_announce </label>  
          <div class="col-md-4">
          <input id="periodic_announce" name="periodic_announce" type="text" placeholder="" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="periodic_announce_frequency"> periodic_announce_frequency </label>  
          <div class="col-md-1">
              <select id="periodic_announce_frequency" name="periodic_announce_frequency" class="form-control input-md" >
              <option value="0" selected >0</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="40">40</option>
              <option value="50">50</option>
              <option value="60">60</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ringinuse"> ringinuse </label>  
          <div class="col-md-1">
              <select id="ringinuse" name="ringinuse" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="setinterfacevar"> setinterfacevar </label>  
          <div class="col-md-1">
              <select id="setinterfacevar" name="setinterfacevar" class="form-control input-md" >
              <option value="no" selected >no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="observation"> observation </label>  
          <div class="col-md-4">
            <textarea class="form-control" rows="5" id="observation" name="observation" ></textarea>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>

</html>