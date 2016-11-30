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
	
    <div class="well" >
    	<?php
      
      $users_id=$_GET['users_id'];

			include("database.php");

      $lista = "SELECT * FROM users_agent WHERE users_id='$users_id'";
			$result = mysql_query($lista);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $result;
				die($message);
			}
	
			while ($row = mysql_fetch_assoc($result)) {

        $users_id=$row['users_id']; 
        $users_type=$row['users_type'];
        $users_membername=$row['users_membername'];
        $users_name=$row['users_name'];
        $users_password=$row['users_password'];
        $users_mail=$row['users_mail'];
        $users_phone=$row['users_phone']; 
        $users_extension=$row['users_extension']; 
        $users_department=$row['users_department']; 

			}

			mysql_free_result($result);
			mysql_close();

	    ?>
		  <H2><span class="label label-info">Modificar Agent</span></H2>
      
      <form class="form-horizontal" action="save_editagent.php" method="post" >

        <fieldset >
        

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_id"> Id </label>  
          <div class="col-md-2">
          <input id="users_id" name="users_id" type="text" readonly  placeholder="id" value="<?php echo $users_id; ?>" class="form-control input-md">
         
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_type"> Type </label>  
          <div class="col-md-2">

              <select id="users_type" name="users_type" class="form-control input-md" >
              <option value="<?php echo $users_type; ?>" selected ><?php echo $users_type; ?></option>
              <option value="AGENT" >AGENT</option>
              <option value="SUPER">SUPER</option>
              <option value="ADMIN">ADMIN</option>
              </select>

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_membername"> Member </label>  
          <div class="col-md-2">
          <input id="users_membername" name="users_membername" type="text" placeholder="100X" value="<?php echo $users_membername; ?>" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_name"> Name </label>  
          <div class="col-md-4">
          <input id="users_name" name="users_name" type="text" placeholder="nombre.apellido" value="<?php echo $users_name; ?>" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: rodrigo.otarola </span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_password"> Password </label>  
          <div class="col-md-3">
          <input id="users_password2" name="users_password2" type="password" placeholder="password" value="<?php echo $users_password; ?>" class="form-control input-md" required="">
          <input id="users_password" name="users_password" type="hidden" placeholder="password" value="<?php echo $users_password; ?>" class="form-control input-md" >

          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_mail"> Mail </label>  
          <div class="col-md-4">
          <input id="users_mail" name="users_mail" type="email" placeholder="nombre.apellido@correo.com" value="<?php echo $users_mail; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: rodrigo.otarola@mail.com </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_phone"> phone </label>  
          <div class="col-md-3">
          <input id="users_phone" name="users_phone" type="text" placeholder="5622XXXXXXX" value="<?php echo $users_phone; ?>" class="form-control input-md">
          <span class="help-block"> Ejemplo: 56228877553 </span>
          </div>
        </div>
 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_extension"> Extension </label>  
          <div class="col-md-2">
          <input id="users_extension" name="users_extension" type="text" placeholder="XXXX" value="<?php echo $users_extension; ?>" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: 1003 </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_department"> Departamento </label>  
          <div class="col-md-4">
          <input id="users_department" name="users_department" type="text" placeholder="department" value="<?php echo $users_department; ?>" class="form-control input-md" >
          <span class="help-block"> Ejemplo: ventas </span>
          </div>
        </div>
        </fieldset>
        <fieldset>

        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-warning">Guardar</button>
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