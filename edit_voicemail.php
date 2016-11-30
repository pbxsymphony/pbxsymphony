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
	include 'head_menu-agent.php'; 
	?>
    
    <div class="container-fluid">
      	
    <div class="well" >
    	<?php
          $uniqueid=$_GET['id'];
          include("database.php");
            $lista = "SELECT * FROM voicemail_users WHERE uniqueid='$uniqueid'";
            $result = mysql_query($lista);

            if (!$result) {
            	$message  = 'Invalid query: ' . mysql_error() . "\n";
            	$message .= 'Whole query: ' . $query;
            	die($message);
            }

            while ($row = mysql_fetch_assoc($result)) {

                $context=$row['context']; 
                $customer_id=$row['customer_id']; 
                $mailbox=$row['mailbox']; 
                $password=$row['password'];
                $fullname=$row['fullname'];
                $email=$row['email'];

            }

            mysql_free_result($result);
            mysql_close();
	     ?>
		<H2><span class="label label-info">Modificar Queue Member</span></H2>
        <form class="form-horizontal" action="save_editvoicemail.php" method="post" >
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
          <label class="col-md-4 control-label" for="context"> Context </label>  
          <div class="col-md-4">
          <input id="context" name="context" type="text"  placeholder="context " value="<?php  echo $context; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="customer_id"> Customer ID </label>  
            <div class="col-md-4">
                <input id="customer_id" name="customer_id" type="text"  placeholder="customer_id " value="<?php  echo $customer_id; ?>" class="form-control input-md">
                <span class="help-block"> Ejemplo: 1000 </span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="mailbox"> Mailbox </label>  
            <div class="col-md-4">
                <input id="mailbox" name="mailbox" type="text"  placeholder="mailbox " value="<?php  echo $mailbox; ?>" class="form-control input-md">
                <span class="help-block"> Ejemplo: 1000 </span>
            </div>
        </div>        

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password"> Password </label>  
            <div class="col-md-4">
                <input id="password" name="password" type="text"  placeholder="password" value="<?php  echo $password; ?>" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname"> fullname </label>  
            <div class="col-md-4">
                <input id="fullname" name="fullname" type="text"  placeholder="fullname" value="<?php  echo $fullname; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: Rodrigo Otarola </span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email"> email </label>  
            <div class="col-md-4">
                <input id="email" name="email" type="text"  placeholder="email" value="<?php  echo $email; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: rodrigo.otarola@correo.com </span>
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