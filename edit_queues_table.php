<?php
	session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

?>
			
<!DOCTYPE html>
<html lang="en">
<?php include 'title.php'; ?></head>
<body>

	<?php
	include 'head_menu.php'; 
	?>
    
    <div class="container">
      
    	<?php
    	$id=$_GET['id'];
			include("database.php");
      $lista = "SELECT * FROM queue_table WHERE id='$id'";
			$result = mysql_query($lista);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
			}
	
			while ($row = mysql_fetch_assoc($result)) {

          $id=$row['id'];
          $name=$row['name'];
          $musiconhold=$row['musiconhold']; 
          $announce=$row['announce']; 
          $context=$row['context'];
          $timeout=$row['timeout'];
          $monitor_join=$row['monitor_join'];
          $monitor_format=$row['monitor_format'];
          $queue_youarenext=$row['queue_youarenext'];
          $queue_thereare=$row['queue_thereare'];
          $queue_callswaiting=$row['queue_callswaiting'];
          $queue_holdtime=$row['queue_holdtime'];
          $queue_minutes=$row['queue_minutes'];
          $queue_seconds=$row['queue_seconds'];
          $queue_lessthan=$row['queue_lessthan'];
          $queue_thankyou=$row['queue_thankyou'];
          $queue_reporthold=$row['queue_reporthold'];
          $announce_frequency=$row['announce_frequency'];
          $announce_round_seconds=$row['announce_round_seconds'];
          $announce_holdtime=$row['announce_holdtime'];
          $retry=$row['retry'];
          $wrapuptime=$row['wrapuptime'];
          $maxlen=$row['maxlen'];
          $servicelevel=$row['servicelevel'];
          $strategy=$row['strategy'];
          $joinempty=$row['joinempty'];
          $leavewhenempty=$row['leavewhenempty'];
          $eventmemberstatus=$row['eventmemberstatus'];
          $eventwhencalled=$row['eventwhencalled'];
          $reportholdtime=$row['reportholdtime'];
          $memberdelay=$row['memberdelay'];
          $weight=$row['weight'];
          $timeoutrestart=$row['timeoutrestart'];
          $periodic_announce=$row['periodic_announce'];
          $periodic_announce_frequency=$row['periodic_announce_frequency'];
          $ringinuse=$row['ringinuse'];
          $setinterfacevar=$row['setinterfacevar'];
          $observation=$row['observation'];

			}
			mysql_free_result($result);
			mysql_close();
	  ?>
		<H2><span class="label label-info">Editar Queue</span></H2>
        <form class="form-horizontal" action="save_edit_queues_table.php" method="post" >
        <fieldset>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="id"> id </label>  
          <div class="col-md-2">
          <input id="id" name="id" type="text" placeholder="id" class="form-control input-md" value="<?php  echo $id; ?>" readonly>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> name </label>  
          <div class="col-md-3">
          <input id="name" name="name" type="text" placeholder="name" class="form-control input-md" value="<?php  echo $name; ?>" >
          <span class="help-block"> Ejemplo: queue-ventas</span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="musiconhold"> musiconhold  </label>  
          <div class="col-md-3">
          <input id="musiconhold" name="musiconhold" type="text" placeholder="default" value="<?php  echo $musiconhold; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: default </span>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce"> announce </label>  
          <div class="col-md-4">
          <input id="announce" name="announce" type="text" placeholder="announce" value="<?php  echo $announce; ?>" class="form-control input-md">
          </div>
        </div>
          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-3">
          <input id="context" name="context" type="text" placeholder="from-sip" value="<?php  echo $context; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="timeout"> timeout </label>  
          <div class="col-md-1">
          <input id="timeout" name="timeout" type="text" placeholder="0" value="<?php  echo $timeout; ?>" class="form-control input-md">
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="monitor_join"> monitor_join </label>  
          <div class="col-md-1">
              <select id="monitor_join" name="monitor_join" class="form-control input-md" >
              <option value="<?php  echo $monitor_join; ?>" selected ><?php  echo $monitor_join; ?></option>
              <option value="yes">yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="monitor_format"> monitor_format </label>  
          <div class="col-md-1">
              <select id="monitor_format" name="monitor_format" class="form-control input-md" >
              <option value="<?php  echo $monitor_format; ?>" selected ><?php  echo $monitor_format; ?></option>
              <option value="">None</option>
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
            <input id="queue_youarenext" name="queue_youarenext" type="text" placeholder="" value="<?php  echo $queue_youarenext; ?>" class="form-control input-md">
          </div>       
        </div>
                <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="queue_thereare"> queue_thereare </label>  
            <div class="col-md-4">
            <input id="queue_thereare" name="queue_thereare" type="text" placeholder="" value="<?php  echo $queue_thereare; ?>" class="form-control input-md" >
          </div>       
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_callswaiting"> queue_callswaiting </label>  
          <div class="col-md-2">
              <select id="queue_callswaiting" name="queue_callswaiting" class="form-control input-md" >
              <option value="<?php  echo $queue_callswaiting; ?>" selected ><?php  echo $queue_callswaiting; ?></option>
              <option value="yes">yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label" for="queue_holdtime"> queue_holdtime </label>  
           <div class="col-md-4">
             <input id="queue_holdtime" name="queue_holdtime" type="text" placeholder="" value="<?php  echo $queue_holdtime; ?>" class="form-control input-md">
           </div>
        </div> 
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_minutes"> queue_minutes </label>  
          <div class="col-md-4">
          <input id="queue_minutes" name="queue_minutes" type="text" placeholder="" value="<?php  echo $queue_minutes; ?>" class="form-control input-md">
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_seconds"> queue_seconds </label>  
          <div class="col-md-4">
          <input id="queue_seconds" name="queue_seconds" type="text" placeholder="" value="<?php  echo $queue_seconds; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_lessthan"> queue_lessthan </label>  
          <div class="col-md-4">
          <input id="queue_lessthan" name="queue_lessthan" type="text" placeholder="" value="<?php  echo $queue_lessthan; ?>" class="form-control input-md">
          </div>  
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_thankyou"> queue_thankyou </label>  
          <div class="col-md-4">
          <input id="queue_thankyou" name="queue_thankyou" type="text" placeholder="" value="<?php  echo $queue_thankyou; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_reporthold"> queue_reporthold </label>  
          <div class="col-md-4">
          <input id="queue_reporthold" name="queue_reporthold" type="text" placeholder="" value="<?php  echo $queue_reporthold; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_frequency"> announce_frequency </label>  
          <div class="col-md-4">
          <input id="announce_frequency" name="announce_frequency" type="text" placeholder="" value="<?php  echo $announce_frequency; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_round_seconds"> announce_round_seconds </label>  
          <div class="col-md-4">
          <input id="announce_round_seconds" name="announce_round_seconds" type="text" placeholder="" value="<?php  echo $announce_round_seconds; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="announce_holdtime"> announce_holdtime </label>  
          <div class="col-md-1">
              <select id="announce_holdtime" name="announce_holdtime" class="form-control input-md" >
              <option value="<?php  echo $announce_holdtime; ?>" selected ><?php  echo $announce_holdtime; ?></option>
              <option value="yes">yes</option>
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
              <option value="<?php  echo $retry; ?>" selected ><?php  echo $retry; ?></option>
              <option value="0">0</option>
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
          <input id="wrapuptime" name="wrapuptime" type="text" placeholder="5" value="<?php  echo $wrapuptime; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 5 </span>
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="maxlen"> maxlen </label>  
          <div class="col-md-1">
              <select id="maxlen" name="maxlen" class="form-control input-md" >
              <option value="<?php  echo $maxlen; ?>" selected ><?php  echo $maxlen; ?></option>
              <option value="0">0</option>
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
          <input id="servicelevel" name="servicelevel" type="text" placeholder="0" value="<?php  echo $servicelevel; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="strategy"> strategy </label>  
          <div class="col-md-2">
              <select id="strategy" name="strategy" class="form-control input-md" >
              <option value="<?php  echo $strategy; ?>" selected ><?php  echo $strategy; ?></option>
              <option value="ringall">ringall</option>
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
              <option value="<?php  echo $joinempty; ?>" selected ><?php  echo $joinempty; ?></option>
              <option value="yes">yes</option>
              <option value="no">no</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="leavewhenempty"> leavewhenempty </label>  
          <div class="col-md-1">
              <select id="leavewhenempty" name="leavewhenempty" class="form-control input-md" >
              <option value="<?php  echo $leavewhenempty; ?>" selected ><?php  echo $leavewhenempty; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="eventmemberstatus"> eventmemberstatus </label>  
          <div class="col-md-1">
              <select id="eventmemberstatus" name="eventmemberstatus" class="form-control input-md" >
              <option value="<?php  echo $eventmemberstatus; ?>" selected ><?php  echo $eventmemberstatus; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="eventwhencalled"> eventwhencalled </label>  
          <div class="col-md-1">
              <select id="eventwhencalled" name="eventwhencalled" class="form-control input-md" >
              <option value="<?php  echo $eventwhencalled; ?>" selected ><?php  echo $eventwhencalled; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="reportholdtime"> reportholdtime </label>  
          <div class="col-md-1">
              <select id="reportholdtime" name="reportholdtime" class="form-control input-md" >
              <option value="<?php  echo $reportholdtime; ?>" selected ><?php  echo $reportholdtime; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="memberdelay"> memberdelay </label>  
          <div class="col-md-1">
              <select id="memberdelay" name="memberdelay" class="form-control input-md" >
              <option value="<?php  echo $memberdelay; ?>" selected ><?php  echo $memberdelay; ?></option>
              <option value="0">0</option>
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
          <input id="weight" name="weight" type="text" placeholder="" value="<?php  echo $weight; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="timeoutrestart"> timeoutrestart </label>  
          <div class="col-md-1">
              <select id="timeoutrestart" name="timeoutrestart" class="form-control input-md" >
              <option value="<?php  echo $timeoutrestart; ?>" selected ><?php  echo $timeoutrestart; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="periodic_announce"> periodic_announce </label>  
          <div class="col-md-4">
          <input id="periodic_announce" name="periodic_announce" type="text" placeholder="" value="<?php  echo $periodic_announce; ?>" class="form-control input-md">
          </div>
        </div> 
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="periodic_announce_frequency"> periodic_announce_frequency </label>  
          <div class="col-md-1">
              <select id="periodic_announce_frequency" name="periodic_announce_frequency" class="form-control input-md" >
              <option value="<?php  echo $periodic_announce_frequency; ?>" selected ><?php  echo $periodic_announce_frequency; ?></option>
              <option value="0">0</option>
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
              <option value="<?php  echo $ringinuse; ?>" selected ><?php  echo $ringinuse; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Select input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="setinterfacevar"> setinterfacevar </label>  
          <div class="col-md-1">
              <select id="setinterfacevar" name="setinterfacevar" class="form-control input-md" >
              <option value="<?php  echo $setinterfacevar; ?>" selected ><?php  echo $setinterfacevar; ?></option>
              <option value="no">no</option>
              <option value="yes">yes</option>
              </select>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="observation"> observation </label>  
          <div class="col-md-4">
            <textarea class="form-control" rows="5" id="observation" name="observation" ><?php  echo $observation; ?></textarea>
          </div>
        </div> 

        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-danger">Modificar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-success" onclick="location.href='index-sip-queues'" >Cancelar</button>
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>