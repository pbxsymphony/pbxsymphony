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
        	$lista = "SELECT * FROM extensions WHERE id='$id'";
			$result = mysql_query($lista);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
			}
	
			while ($row = mysql_fetch_assoc($result)) {
				$context=$row['context'];	
				$exten=$row['exten'];	
				$priority=$row['priority'];
				$app=$row['app'];
				$appdata=$row['appdata'];
			}
			mysql_free_result($result);
			mysql_close();
	     ?>
		<H2><span class="label label-info">Eliminar Routes Extensions</span></H2>
        <form class="form-horizontal" action="save_deleextensions.php" method="post" >
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
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-4">
          <input id="context" name="context" type="text" placeholder="Context " value="<?php  echo $context; ?>" class="form-control input-md">
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="exten"> exten </label>  
          <div class="col-md-4">
          <input id="exten" name="exten" type="text" placeholder="Exten " value="<?php  echo $exten; ?>"  class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="priority"> priority </label>  
          <div class="col-md-4">
          <input id="priority" name="priority" type="text" placeholder="Priority " value="<?php  echo $priority; ?>"  class="form-control input-md">
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="app"> App </label>  
          <div class="col-md-4">
          <input id="app" name="app" type="text" placeholder="App" value="<?php  echo $app; ?>"  class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="appdata"> Appdata </label>  
          <div class="col-md-4">
          <input id="appdata" name="appdata" type="text" placeholder="Appdata" value="<?php  echo $appdata; ?>"  class="form-control input-md">
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