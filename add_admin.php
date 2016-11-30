<?php
session_start();
if ( isset($_SESSION['k_username']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
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
  ?>

    
    <div class="container-fluid">
    
    <H2><span class="label label-info"> Add Admin</span></H2>
        <form class="form-horizontal" action="save_admin.php" method="post" >
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