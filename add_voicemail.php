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
    



        <form class="form-horizontal" action="save_voicemail.php" method="post" >
        
        <fieldset>
       <div class="form-group">
           <label class="col-md-4 control-label" for="uniqueid"> <h3><span class="label label-info"> SIP VOICEMAIL </span></h3> </label>  
       </div>
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="uniqueid"> uniqueid </label>  
          <div class="col-md-2">
          <input id="uniqueid" name="uniqueid" type="text" readonly placeholder="uniqueid" value="" class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="context"> context </label>  
          <div class="col-md-3">
          <input id="context" name="context" type="text" placeholder="context" value="from-sip" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="customer_id"> customer_id </label>  
          <div class="col-md-3">
          <input id="customer_id" name="customer_id" type="text" placeholder="customer_id" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="mailbox"> mailbox </label>  
          <div class="col-md-4">
          <input id="mailbox" name="mailbox" type="text" placeholder="mailbox" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password"> password </label>  
          <div class="col-md-2">
          <input id="password" name="password" type="text" placeholder="password" value="" class="form-control input-md">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fullname"> fullname </label>  
          <div class="col-md-4">
          <input id="fullname" name="fullname" type="text" placeholder="fullname" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: Rodrigo Otarola </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="email"> email </label>  
          <div class="col-md-4">
          <input id="email" name="email" type="text" placeholder="email" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: rodrigo.otarola@correo.com </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-success">Guardar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
        
        </form>
      </fieldset>
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