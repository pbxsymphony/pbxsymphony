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
		<H2><span class="label label-info">Add Servers</span></H2>
        <form class="form-horizontal" action="save_servers.php" method="post" >
        <fieldset>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Host </label>  
          <div class="col-md-4">
          <input id="Host" name="Host" type="text" placeholder="Host" class="form-control input-md">
          <span class="help-block"> Ejemplo: 200.71.102.221 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callerid"> User </label>  
          <div class="col-md-4">
          <input id="User" name="User" type="text" placeholder="User" class="form-control input-md" value="pbxcliente">
          <span class="help-block"> Ejemplo: pbxcliente </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Password </label>  
          <div class="col-md-4">
          <input id="Password" name="Password" type="text" placeholder="Password " class="form-control input-md" value="p4ssw0rdcl13nt3">
          </div>
        </div>
        
        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-danger">Guardar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-info">Reset</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-success" onclick="location.href='servers.php'" >Cancelar</button>

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