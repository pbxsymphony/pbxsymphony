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
			mysql_free_result($result);
			mysql_close();
	     ?>
		<H2><span class="label label-info">Eliminar Routes Extensions</span></H2>
        <form class="form-horizontal" action="save_delemember-admin.php" method="post" >
        <fieldset>
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="uniqueid"> uniqueid </label>  
          <div class="col-md-2">
          <input id="uniqueid" name="uniqueid" type="text" placeholder="uniqueid " value="<?php echo $uniqueid; ?>" class="form-control input-md">
         
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="membername"> membername </label>  
          <div class="col-md-4">
          <input id="membername" name="membername" type="text" placeholder="membername " value="<?php  echo $membername; ?>" class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_name"> queue_name </label>  
          <div class="col-md-4">
          <input id="queue_name" name="queue_name" type="text" placeholder="queue_name " value="<?php  echo $queue_name; ?>" class="form-control input-md">
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="interface"> interface </label>  
          <div class="col-md-4">
          <input id="interface" name="interface" type="text" placeholder="interface" value="<?php  echo $interface; ?>"  class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="penalty"> penalty </label>  
          <div class="col-md-1">
          <input id="penalty" name="penalty" type="text" placeholder="penalty" value="<?php  echo $penalty; ?>"  class="form-control input-md">
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="paused"> paused </label>  
          <div class="col-md-1">
          <input id="paused" name="paused" type="text" placeholder="paused" value="<?php  echo $paused; ?>"  class="form-control input-md">
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
            <button id="Submit" name="Submit" type="submit" class="btn btn-warning">Eliminar</button>
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

  </body>

</html>