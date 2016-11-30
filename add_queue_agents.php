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
    
    <H2><span class="label label-info"> Add Agent</span></H2>
        <form class="form-horizontal" action="save_agent.php" method="post" >
         <!-- Text input-->
        <fieldset>
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Id </label>  
          <div class="col-md-2">
          <input id="users_id" name="users_id" type="text" readonly  placeholder="id" value="" class="form-control input-md">
         
          </div>
        </div>
         
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="users_type"> Type </label>  
          <div class="col-md-2">

              <select id="users_type" name="users_type" class="form-control input-md" >
              <option value="AGENT" selected >AGENT</option>
              <option value="SUPER">SUPER</option>
              <option value="ADMIN">ADMIN</option>
              </select>

          </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Member </label>  
          <div class="col-md-2">
          <input id="users_membername" name="users_membername" type="text" placeholder="100X" value="" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: 1000 </span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Name </label>  
          <div class="col-md-4">
          <input id="users_name" name="users_name" type="text" placeholder="nombre.apellido" value="" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: rodrigo.otarola </span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Password </label>  
          <div class="col-md-3">
          <input id="users_password" name="users_password" type="password" placeholder="password" value="" class="form-control input-md" required="">
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Mail </label>  
          <div class="col-md-4">
          <input id="users_mail" name="users_mail" type="email" placeholder="nombre.apellido@correo.com" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: rodrigo.otarola@mail.com </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> phone </label>  
          <div class="col-md-3">
          <input id="users_phone" name="users_phone" type="text" placeholder="5622XXXXXXX" value="" class="form-control input-md">
          <span class="help-block"> Ejemplo: 56228877553 </span>
          </div>
        </div>
 
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Extension </label>  
          <div class="col-md-2">
          <input id="users_extension" name="users_extension" type="text" placeholder="XXXX" value="" class="form-control input-md" required="">
          <span class="help-block"> Ejemplo: 1003 </span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Departamento </label>  
          <div class="col-md-4">
          <input id="users_department" name="users_department" type="text" placeholder="department" value="" class="form-control input-md" >
          <span class="help-block"> Ejemplo: ventas </span>
          </div>
        </div>
        </fieldset>
        <fieldset>

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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

</html>