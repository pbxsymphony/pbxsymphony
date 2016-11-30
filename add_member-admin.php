<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

  include("database.php");

  $queues="SELECT name FROM queue_table ";

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



  $queues_agent="SELECT users_membername FROM users_agent ";

  $result = mysql_query($queues_agent);
  
  if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $result;
    die($message);
  }
  $i=0;
  while ($row = mysql_fetch_assoc($result)) {
    
    $i=$i+1;
    $users_membername[$i]=$row['users_membername'];
    
  }

  mysql_free_result($result);
  mysql_close();


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

    <H2><span class="label label-info"> Add Queue Member</span></H2>
        <form class="form-horizontal" action="save_member-admin.php" method="post" >
         <!-- Text input-->
        <fieldset>
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> ID </label>  
          <div class="col-md-2">
          <input id="uniqueid" name="uniqueid" type="text" readonly  placeholder="uniqueid " value="" class="form-control input-md">
         
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="membername"> Member </label>  
          <div class="col-md-2">
            <select id="membername" name="membername" class="form-control">
            <?php 
            foreach($users_membername as $cc => $name) {
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="queue_name"> Queue </label>  
          <div class="col-md-4">
            <select id="queue_name" name="queue_name" class="form-control">
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
          <div class="col-md-2">
          <input id="interface" name="interface" type="text" placeholder="SIP/XXXX " value="" class="form-control input-md" required >
          <span class="help-block"> Ejemplo: SIP/1001 </span>
          </div>
        </div>
        </fieldset>
        <fieldset>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regexten"> Penalty </label>  
          <div class="col-md-1">

              <select id="penalty" name="penalty" class="form-control input-md" placeholder="penalty"  >
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