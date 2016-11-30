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
    if ( isset($_SESSION['k_user']) ) { include 'head_menu-agent.php';  }

    ?>
    
    <div class="container-fluid">
      
    <?php if($mensaje !=""){ echo '<div class="alert alert-warning">'.$mensaje.'</div>'; } ?> 
	
    <div class="well" >
    	<?php
    		$uniqueid=$_GET['uniqueid'];
			include("database.php");
        	$lista = "SELECT * FROM queue_member_table WHERE uniqueid='$uniqueid'";
			$result = mysql_query($lista);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
			}
	
			while ($row = mysql_fetch_assoc($result)) {
				$uniqueid=$row['uniqueid'];	
				$membername=$row['membername'];	
				$queue_name=$row['queue_name'];
				$interface=$row['interface'];
				$penalty=$row['penalty'];
				$paused=$row['paused'];
			}

      $queues="SELECT * FROM queue_table ";

      $result = mysql_query($queues);
      
      if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $result;
        die($message);
      }
      $i=0;
      while ($row = mysql_fetch_assoc($result)) {
        
        $i=$i+1;
        $queue_table_name[$i]=$row['name'];
        
      }

			mysql_free_result($result);
			mysql_close();
	     ?>
		<H2><span class="label label-info">Modificar Queue Member</span></H2>
        <form class="form-horizontal" action="save_editmember-admin.php" method="post" >
        <fieldset >
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> ID </label>  
          <div class="col-md-2">
          <input id="uniqueid" name="uniqueid" type="text" readonly placeholder="uniqueid " value="<?php echo $uniqueid; ?>" class="form-control input-md">
         
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Member </label>  
          <div class="col-md-4">
          <input id="membername" name="membername" type="text" readonly placeholder="membername " value="<?php  echo $membername; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

                <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callerid"> Queue </label>  
          <div class="col-md-4">

            <select id="queue_name" name="queue_name" class="form-control" readonly >
              <option selected value="<?php  echo $queue_name; ?>"><?php  echo $queue_name; ?></option>
            <?php 
            foreach($queue_table_name as $cc => $name) {
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
          </div>
        </div>

                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> interface </label>  
          <div class="col-md-4">
          <input id="interface" name="interface" type="text" readonly="yes"  placeholder="interface " value="<?php  echo $interface; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regexten"> Penalty </label>  
          <div class="col-md-1">

              <select id="penalty" name="penalty" class="form-control input-md" placeholder="penalty"  >
              <option selected value="<?php  echo $penalty; ?>" ><?php  echo $penalty; ?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>

          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="secret"> paused </label>  
          <div class="col-md-1">
              <select id="paused" name="paused" class="form-control input-md" placeholder="paused"  >
              <option selected value="<?php  echo $paused; ?>" ><?php  echo $paused; ?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              </select>

          </div>
        </div>

        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="submit" name="submit" type="submit" class="btn btn-warning">Guardar</button>
            <button id="reset" name="reset" type="reset" class="btn btn-info">Reset</button>
            <button id="cancel" name="cancel" type="reset" class="btn btn-success" onclick="window.history.back();" >Cancelar</button>
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